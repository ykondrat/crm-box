/**
 * Created by Kondratyev Yevhen on 30.08.2017.
 */
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
    $('#login_form input[type="text"]').val();
    $('#login_form input[type="password"]').val();
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

    }
});