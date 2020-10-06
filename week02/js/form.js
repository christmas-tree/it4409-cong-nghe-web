$(document).ready(function () {
    $('.form').validate({
        rules: {
            name: {
                required: true
            },
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            class: {
                required: true
            },
            address: {
                required: true
            },
            university: {
                required: true
            }
        },
        messages: {
            name: 'Please enter your name',
            username: 'Please enter your username',
            email: {
                required: 'Please enter your email',
                email: 'not an email'
            },
            class: {
                required: 'Please enter your class'
            },
            address: {
                required: 'Please enter your address'
            },
            university: {
                required: 'Please choose your university'
            }
        }
    });
});
