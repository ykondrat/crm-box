$('#new_section').on("click",function() {
    $('#add_new_section_div').css("display","block");
});
$('#cancel_section').on("click",function() {
    $('#add_new_section_div').css("display","none");
});
$('#close_new_section_simb').on("click",function() {
    $('#add_new_section_div').css("display","none");
});
$('#section_input').on('keyup', function(event) {
    if (event.target.value.trim().length > 1) {
        $('#save_section').attr('disabled', false);
    } else {
        $('#save_section').attr('disabled', true);
    }
});
$('#save_section').on('click', function(){
    $(`<option>${$('#section_input').val()}</option>`).appendTo($('#select_section2'));
    $(`<option>${$('#section_input').val()}</option>`).appendTo($('#select_section_new'));
    var data = {
        service_section: $('#section_input').val()
    };
    $('#save_section').attr('disabled', true);
    $('#section_input').val('');
    $('#add_new_section_div').css("display","none");
    $.ajax({

    });
});

$('#add_to_service_but').on('click', function() {
    $('#add_new_section_div').css("display","none");
});