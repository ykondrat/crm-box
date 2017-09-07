/**
 * Created by Kondratyev Yevhen on 30.05.2017.
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

function formValidationSignUp() {
    var login = document.forms["SignUp"]["login"].value;
    var email = document.forms["SignUp"]["email"].value;
    var password = document.forms["SignUp"]["passwd"].value;
    var repeatPassword = document.forms["SignUp"]["rep_passwd"].value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var cmp = password.localeCompare(repeatPassword);

    if (!filter.test(email)) {
        document.forms["SignUp"]["email"].style = "border: 2px solid red;";
        return (false);
    }
    if (cmp != 0) {
        document.forms["SignUp"]["passwd"].style = "border: 2px solid red;";
        document.forms["SignUp"]["rep_passwd"].style = "border: 2px solid red;";

        return (false);
    }
    return (true);
}