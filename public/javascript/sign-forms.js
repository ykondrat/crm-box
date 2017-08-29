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
    $.ajax({

    });
    $('#login_form input[type="text"]').val();
    $('#login_form input[type="password"]').val();
});

$('#reg_account').on('click', function() {
    
});