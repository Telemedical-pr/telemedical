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


    // Diagnosis Form
    $('#diagnosisForm').submit(e=>{
        e.preventDefault();
        let visit_id = $("#visit_id").val()
        let diagnosis = $("textarea#diagnosis").val()
        const form = new FormData
        if (diagnosis == null || visit_id == null) {
            return Toast.fire({
                title:'Warning!',
                icon:'warning',
                text: 'Fill in all your Fields'
            })
        }
        form.append('visit_id' ,visit_id)
        form.append('diagnosis', diagnosis)
        Axios.post('/api/diagnosis', form)
        .then((res) => {
            if(res.status === 200){
                Toast.fire({
                    title:'success',
                    text:res.data,
                    icon:'success'
                })
                $('#diagnosisFormModal').modal('hide')
                document.getElementById('diagnosisForm').reset()
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
        if (doctor === null || reason === null || date === null) {
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
    });


    // Patient Profile Form
    $('#patientProfile').submit(e=>{
        e.preventDefault()
        let gender = $('select#gender').val()
        let DOB = $('input#DOB').val()
        let last_temp = $('input#last_temp').val()
        let last_weight = $('input#last_weight').val()
        let last_height = $('input#last_height').val()
        let unit_weight = $('select#unit_weight').val()
        let unit_height = $('select#unit_height').val()
        let image = $('input#profileImage')[0].files[0]

        let form = new FormData
        if(gender) form.append('gender', gender)
        if(DOB) form.append('DOB', DOB)
        if(last_temp) form.append('last_temp', last_temp)
        if(last_weight) form.append('last_weight', last_weight)
        if(last_height) form.append('last_height', last_height)
        if(unit_weight) form.append('unit_weight', unit_weight)
        if(unit_height) form.append('unit_height', unit_height)
        if(image) form.append('image', image)

        Axios.post('/api/patient_update', form)
        .then((res) => {
            if(res.status === 200){
                Toast.fire({
                    title:'success',
                    text:res.data,
                    icon:'success'
                })
                document.getElementById('patientProfile').reset()
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
    });


    // Doctor's Profile
    $('#doctorProfile').submit(e=>{
        e.preventDefault()
        let institution = $('input#institution').val()
        let start_year = $('input#start_year').val()
        let image = $('input#profileImage2')[0].files[0]

        let form = new FormData
        if(institution) form.append('institution', institution)
        if(start_year) form.append('start_year', start_year)
        if(image) form.append('image', image)

        Axios.post('/api/doctor_update', form)
        .then((res) => {
            if(res.status === 200){
                Toast.fire({
                    title:'success',
                    text:res.data,
                    icon:'success'
                })
                document.getElementById('doctorProfile').reset()
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
    });



})(jQuery)
