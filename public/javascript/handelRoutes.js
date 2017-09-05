if (window.location.href == 'http://localhost/crm-box/services') {
    $('#list_menu').attr('checked', false);
    $('#service_menu').attr('checked', true);
}

$('#log_out_div').on('click', function () {
    window.location.href = 'http://localhost/crm-box/logout';
});
$('#list_menu').on('click', function () {
    window.location.href = 'http://localhost/crm-box/timetable';
});
$('#service_menu').on('click', function () {
    window.location.href = 'http://localhost/crm-box/services';
});