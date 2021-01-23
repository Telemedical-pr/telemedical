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


        // Prescription Form
    $('#prescriptionForm').submit(e=>{
        e.preventDefault();
        let symptom_id = $("#symptom_id").val()
        let prescription = $("textarea#prescription").val()
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
                document.getElementById('prescriptionForm').reset()
                location.reload(true)
            }else{
                Toast.fire({
                    title:'Hmmmmm....',
                    text:res.data,
                    icon:'warning'
                })
            }
        }).catch((err) => {
            for(const [key,value] of Object.entries(err.response.data.errors)){
                Toast.fire({
                    title:'Error',
                    text:value[0],
                    icon:'error'
                })
            }
            console.log( err.response.data.errors)
        });




    });

    // Symptoms Form
    $('#symptomForm').submit(e=>{
        e.preventDefault();
        let doctor = $("select#doctor_id").val()
        let symptom = $("#symptom_text").val()
        const form = new FormData
        if (doctor === null || symptom === null ) {
            console.log(`${doctor}, ${symptom}`)
            return Toast.fire({

                title:'Warning!',
                icon:'warning',
                text: 'Fill in all your Fields'
            })
        }
        form.append('doctor', doctor)
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
                document.getElementById('symptomForm').reset()
                location.reload(true)
            }else{
                Toast.fire({
                    title:'Hmmmmm....',
                    text:res.data,
                    icon:'warning'
                })
            }
        }).catch((err) => {
            for(const [key,value] of Object.entries(err.response.data.errors)){
                Toast.fire({
                    title:'Error',
                    text:value[0],
                    icon:'error'
                })
            }

        });
    })

        // Appointment Form
    $('#appointmentForm').submit(e=>{
        e.preventDefault();
        let doctor = $("select#doctor_id2").val()
        let reason = $("#reason_text").val()
        let date = $("#date1").val()
        const form = new FormData
        if (doctor === null || symptom === null ) {
            console.log(`${doctor}, ${symptom}`)
            return Toast.fire({

                title:'Warning!',
                icon:'warning',
                text: 'Fill in all your Fields'
            })
        }
        form.append('doctor', doctor)
        form.append('reason', reason)
        form.append('appointment_dateTime', date)
        Axios.post('/api/visits', form)
        .then((res) => {
            if(res.status === 200){
                Toast.fire({
                    title:'success',
                    text:res.data,
                    icon:'success'
                })

                $('#appointmentFormModal').modal('hide')
                document.getElementById('appointmentForm').reset()
                location.reload(true)
            }else{
                Toast.fire({
                    title:'Hmmmmm....',
                    text:res.data,
                    icon:'warning'
                })
            }
        }).catch((err) => {
            for(const [key,value] of Object.entries(err.response.data.errors)){
                Toast.fire({
                    title:'Error',
                    text:value[0],
                    icon:'error'
                })
            }

        });
    })


})(jQuery)
