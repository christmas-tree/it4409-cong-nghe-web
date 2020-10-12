// validation
$(document).ready(function () {
    $('.form').validate({
        rules: {
            value: {
                required: true,
                number: true,
            },
        },
        messages: {
            value: {
                required: 'Please enter value',
                number: 'Please enter a valid number',
            },
        }
    });
});
