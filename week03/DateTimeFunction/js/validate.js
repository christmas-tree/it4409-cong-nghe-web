// validation
$(document).ready(function () {
    $('.form').validate({
        rules: {
            name1: {
                required: true
            },
            name2: {
                required: true
            },
            birthday1: {
                required: true
            },
            birthday2: {
                required: true
            },
        },
        messages: {
            name1: {
                required: 'Please enter the name'
            },
            name2: {
                required: 'Please enter the name'
            },
            birthday1: {
                required: 'Please enter birthday'
            },
            birthday2: {
                required: 'Please enter birthday'
            },
        }
    });
});
