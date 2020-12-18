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


    $('#logoForm').submit((e)=>{
            e.preventDefault()
            const form = new FormData
            form.append('logo',$('input#logo')[0].files[0])
            Axios.post('api/logo-upload',form)
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

})(jQuery)
