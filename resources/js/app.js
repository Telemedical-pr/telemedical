const { default: Axios } = require('axios');
const { default: Swal } = require('sweetalert2');


const Toast = Swal.mixin({
    toast:true,
    position:'top-right',
    timer:5000,
    timerProgressBar:false
})

require('./bootstrap');


(function($){
    'use strict'

// Logo Form
    $('#logoForm').submit((e)=>{
            e.preventDefault()
            const form = new FormData
            form.append('logo',$('input#logo')[0].files[0])
            Axios.post('/api/logo-upload',form)
            .then((res) => {
                if(res.status === 200){
                    Toast.fire({
                        title:'success',
                        text:res.data,
                        icon:'success'
                    })
                    $('#modelId').modal('hide')
                }else{
                    Toast.fire({
                        title:'Hmmmmm....',
                        text:res.data,
                        icon:'warning'
                    })
                }
            }).catch((err) => {
                Toast.fire({
                    title:'Error',
                    text:err.response.data.errors.logo[0],
                    icon:'error'
                })
            });
        })

    $('#prescriptionForm').submit(e=>{
        e.preventDefault();
        let symptom_id = $("#symptom_id").val
        let prescription = $("textarea#prescription").val
        const form = new FormData
        if (prescription == null || symptom_id == null) {
            return Toast.fire({
                title:'Warning!',
                icon:'warning',
                text: 'Fill in all your Fields'
            })
        }
        form.append('symptom_id' ,symptom_id)
        form.append('prescription', prescription)
        Axios.post('/api/prescriptions', form)
        .then((res) => {
            if(res.status === 200){
                Toast.fire({
                    title:'success',
                    text:res.data,
                    icon:'success'
                })
                $('#prescriptionsFormModal').modal('hide')
            }else{
                Toast.fire({
                    title:'Hmmmmm....',
                    text:res.data,
                    icon:'warning'
                })
        }).catch((err) => {
            Toast.fire({
                title:'Error',
                text:err.response.data.errors.msg,
                icon:'error'
            })
            console.log( err.response.data.errors)
        });




    })
    $('#symptomForm').submit(e=>{
        e.preventDefault();
        let user_id = $("input#user_id").val
        let doctor_id = $("select#doctor_id").val
        let symptom = $("textarea#syptom").val
        const form = new FormData
        if (doctor_id == null || symptom == null) {
            return Toast.fire({
                title:'Warning!',
                icon:'warning',
                text: 'Fill in all your Fields'
            })
        }
        form.append('user_id' ,user_id)
        form.append('doctor_id', doctor_id)
        form.append('symptom', symptom)
        Axios.post('/api/symptoms', form)
        .then((res) => {
            if(res.status === 200){
                Toast.fire({
                    title:'success',
                    text:res.data,
                    icon:'success'
                })
                $('#symptomFormModal').modal('hide')
            }else{
                Toast.fire({
                    title:'Hmmmmm....',
                    text:res.data,
                    icon:'warning'
                })
        }).catch((err) => {
            Toast.fire({
                title:'Error',
                text:err.response.data.errors.msg,
                icon:'error'
            })
            console.log( err.response.data.errors)
        });




    })



})(jQuery)
