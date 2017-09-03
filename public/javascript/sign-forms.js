$('#forgot_passwd').on("click", function() {
    $('#login_form').css("display", "none");
    $('#forgot_passwd_form').css("display", "block");
});

$('.back_but').on("click", function() {
    $('#login_form').css("display", "block");
    $('#forgot_passwd_form').css("display", "none");
    $('#registr_form').css("display", "none");
});

$('#registration_login').on("click", function() {
    $('#login_form').css("display", "none");
    $('#registr_form').css("display", "block");
});

$('#enter_login').on("click", function() {
    $('.error_form').remove();
    var data = {
        login: $('#login_form input[type="text"]').val(),
        passwd: $('#login_form input[type="password"]').val()
    };
    $.ajax({
        type: 'POST',
        url: '/crm-box/signin',
        dataType: 'json',
        data: data,
        success: function (response) {
            if (response[0] == 'OK') {
                window.location.href = 'http://localhost/crm-box/timetable';
            } else {
                $(`<p class="error_form">${response[0]}</p>`).appendTo($('#login_error'));
            }
        }
    });
});

$('#reg_account').on('click', function() {
    $('.error_form').remove();
    var login = $('#registr_form input[name="login"]').val().trim();
    var email = $('#registr_form input[name="email"]').val();
    var password = $('#registr_form input[name="passwd"]').val().trim();
    var repeatPassword = $('#registr_form input[name="rep_passwd"]').val().trim();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var sender = true;

    if (login.length < 2) {
        $('<p class="error_form">Provide valid login</p>').appendTo($('#register_error'));
        sender = false;
    }
    if (!filter.test(email)) {
        $('<p class="error_form">Provide valid email</p>').appendTo($('#register_error'));
        sender = false;
    }
    if (password != repeatPassword || password.length < 6) {
        $('<p class="error_form">Provide valid password (more then 6 characters)</p>').appendTo($('#register_error'));
        sender = false;
    }

    if (sender) {
        var data = {
            login: login,
            email: email,
            passwd: password
        };
        $.ajax({
            type: 'POST',
            url: '/crm-box/signup',
            dataType: 'json',
            data: data,
            success: function (response) {
                if (response[0] == 'OK') {
                    window.location.href = 'http://localhost/crm-box/timetable';
                } else {
                    $(`<p class="error_form">${response[0]}</p>`).appendTo($('#register_error'));
                }
            }
        });
    }
});

$('#do_forgot').on('click', function() {
    $('.error_form').remove();
    $('.succes_form').remove();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (filter.test($('#forgot_passwd_form input[type="email"]').val().trim())) {
        var data = {
            email: $('#forgot_passwd_form input[type="email"]').val().trim()
        };
        $.ajax({
            type: 'POST',
            url: '/crm-box/forgot',
            dataType: 'json',
            data: data,
            success: function (response) {
                if (response[0] == 'OK') {
                    $('<p class="success_form">New password was send on your email</p>').appendTo($('#msg-forgot'));
                } else {
                    $(`<p class="error_form">${response[0]}</p>`).appendTo($('#msg-forgot'));
                }
            }
        });
    } else {
        $(`<p class="error_form">Provide valid email</p>`).appendTo($('#msg-forgot'));
    }
});