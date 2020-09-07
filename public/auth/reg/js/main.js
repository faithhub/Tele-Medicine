(function($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            name: {
                required: false,
            },
            password: {
                required: true,
            },
            dob: {
                required: true,
            },
            address: {
                required: true,
            },
            mobile: {
                required: true,
            },
            gender: {
                required: true,
            },
            password: {
                required: false,
            },
            real_credit_card: {
                required: true,
            },
            real_cvc: {
                required: true,
            },
            expiry_date: {
                required: true,
            },
            expiry_year: {
                required: true,
            },
            name_of_card: {
                required: true,
            },
            country_id: {
                required: true,
            },
            password_confirmation: {
                equalTo: "#password",
            },
            email: {
                required: false,
                email: true
            }
        },
        messages: {
            email: {
                email: 'Not a valid email address <i class="zmdi zmdi-info"></i>'
            },
            password_confirmation: {
                equalTo: 'Password not match'
            }
        },
        onfocusout: function(element) {
            $(element).valid();
        },
    });
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<div class="title"><span class="number">#index#</span>#title#</div>',
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            // console.log(form.steps("getCurrentIndex"));
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            console.log(getCurrentIndex);
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert('Sumited');
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });


    $.dobPicker({
        daySelector: '#expiry_date',
        monthSelector: '#expiry_month',
        yearSelector: '#expiry_year',
        dayDefault: 'DD',
        yearDefault: 'YYYY',
        minimumAge: 0,
        maximumAge: 120
    });

    $('#password').pwstrength();

    $('#button').click(function() {
        $("input[type='file']").trigger('click');
    })

    $("input[type='file']").change(function() {
        $('#val').text(this.value.replace(/C:\\fakepath\\/i, ''))
    })

})(jQuery);