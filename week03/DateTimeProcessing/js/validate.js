// validation
$(document).ready(function () {
    $('.form').validate({
        rules: {
            name: {
                required: true
            },
            hour: {
                required: true,
                number: true,
                max: 23,
                min: 0,
            },
            minute: {
                required: true,
                number: true,
                max: 59,
                min: 0,
            },
            second: {
                required: true,
                number: true,
                max: 59,
                min: 0,
            },
            date: {
                required: true
            }
        },
        messages: {
            name: 'Please enter your name',
            hour: {
                required: 'Please enter hour',
                number: 'Please enter a valid number',
                max: 'Hour must be between 0 and 23',
                min: 'Hour must be between 0 and 23',
            },
            minute: {
                required: 'Please enter minute',
                number: 'Please enter a valid number',
                max: 'Minute must be between 0 and 59',
                min: 'Minute must be between 0 and 59',
            },
            second: {
                required: 'Please enter second',
                number: 'Please enter a valid number',
                max: 'Second must be between 0 and 59',
                min: 'Second must be between 0 and 59',
            },
            date: {
                required: 'Please choose date'
            }
        }
    });
});
