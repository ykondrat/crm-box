/**
 * Created by ykondrat on 6/8/17.
 */

function sendError(str) {
    var error = $('<div class="login_error"><p>' + str + '</p></div>');

    error.appendTo($('body'));
    setTimeout(function() { $(".login_error").remove();}, 15000);
}