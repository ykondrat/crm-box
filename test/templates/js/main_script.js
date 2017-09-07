var selectedMenu = $("#list2_menu");
var new_serv_form = new Array();
var new_client_form = new Array();
var new_worker_form = new Array();
var new_visits_form = new Array();
var this_td;
var table_col;
var this_tr;
var table_oncontext_menu = false;

$(document).ready(function(){
    $('#list_table table thead').css("color","white");
    $('#sevice_table_div table thead').css("color","white");
    $('#post_table_div table thead tr').css("color","white");
    $('#client_table_div table thead tr').css("color","white");
    $('#list_table table tbody').find('tr').filter( ':odd').css("background-color","lightgrey");

    if ($('#list_menu').prop("checked") == true) {
        $('#side_block').css("height", "150%");
    }
    $('#service_visits').attr("disabled", true);
});

$('#section_list_sel').on("change", function() {
    if ($(this).val() != "Все") {
       $('#service_visits').removeAttr("disabled");
    } else {$('#service_visits').attr("disabled", true);
    }
});

//Array for checking input value
for (var i = 0; i < 4; i++) {
    new_client_form[i] = false;
}
new_client_form[3] = true;
for (var y = 0; y < 4; y++) {
    new_serv_form[y] = false;
}
for (var y = 0; y < 5; y++) {
    new_worker_form[y] = false;
}
for (var z = 0; z < 9; z++) {
    if (z == 2 || z == 3 || z == 7 || z == 8 || z == 4 || z == 5) {
        new_visits_form[z] = true;
    } else {
        new_visits_form[z] = false;
    }
}

// Check Client table field
$('#client_name').on("keyup", function() {
    if ($(this).val() == "") {
        new_client_form[0] = false;
        console.log(new_client_form);
        $('#save_client').attr("disabled", true);
        $('#edit_client').attr("disabled", true);
        checkFillDataClient(new_client_form);
    } else {
        if($(this).val().length>31)
        {
            new_client_form[0] = false;
            console.log(new_client_form);
            $('#save_client').attr("disabled", true);
            $('#edit_client').attr("disabled", true);
            checkFillDataClient(new_client_form);
        }else{
            console.log(true);
            new_client_form[0] = true;
            checkFillDataClient(new_client_form);
        }
    }
});
$('#client_description').on("keyup",function()
{
    //console.log('description');
    if($(this).val().length>300)
    {
        console.log('>');
        new_client_form[3]=false;
        $('#save_client').attr("disabled", true);
        checkFillDataClient(new_client_form);
    }else
    {
        new_client_form[3]=true;
        checkFillDataClient(new_client_form);
        //console.log(new_client_form);
    }
});
$("#phone_nb").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});

$('#phone_nb').keyup(function(e) {
    if ((e.which == 8 || e.which == 46) && $('#phone_nb').val().length < 3) {

        $('#phone_nb').val("+38");
    }
});
$('#phone_nb').on("keyup", function() {
    if ($(this).val().length != 13 || isNaN($(this).val().slice(1))) {
        new_client_form[1] = false;
        console.log(new_client_form);
        $('#save_client').attr("disabled", true);
        $('#edit_client').attr("disabled", true);
        checkFillDataClient(new_client_form);
    } else {
        console.log(true);
        new_client_form[1] = true;
        checkFillDataClient(new_client_form);
    }
});
$(".new_client_input_radio").on("click",function()
{
    new_client_form[2] = true;
    checkFillDataClient(new_client_form);
});
function checkFillDataClient(clientForm) {
    //console.log(clientForm.length);
    for (var i = 0; i <clientForm.length; i++) {
        if (clientForm[i] == false) {
            break;
        } else {
            //console.log(i == clientForm.length-1,i+", "+clientForm.length);
            if (i == clientForm.length-1) {

                $('#save_client').removeAttr("disabled");
                $('#edit_client').removeAttr("disabled");
            }
        }
    }
}

//Check Personal table field
$('#name_secname').on("keyup", function() {
    if ($(this).val() == "" || $(this).val() == " ") {
        new_worker_form[0] = false;
        $('#add_new_worker').attr("disabled", true);
        $('#edit_worker').attr("disabled", true);
        checkFillDataWorker(new_worker_form);
    } else {
        new_worker_form[0] = true;
        checkFillDataWorker(new_worker_form);
    }
});
$('#post_select').on("change",function(){
    if ($(this).val() == "" || $(this).val() == "Все") {
        new_worker_form[1] = false;
        $('#add_new_worker').attr("disabled", true);
        $('#edit_worker').attr("disabled", true);
        checkFillDataWorker(new_worker_form);
    } else {
        new_worker_form[1]= true;
        checkFillDataWorker(new_worker_form);
    }
});
$("#telephon_number").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});

$('#telephon_number').keyup(function(e) {
    if ((e.which == 8 || e.which == 46) && $('#telephon_number').val().length < 3) {

        $('#telephon_number').val("+38");
    }
});
$('#telephon_number').on("keyup", function() {
    if ($(this).val().length != 13 || isNaN($(this).val().slice(1))) {
        new_worker_form[2] = false;
        $('#add_new_worker').attr("disabled", true);
        $('#edit_worker').attr("disabled", true);
        checkFillDataWorker(new_worker_form);
    } else {
        new_worker_form[2] = true;
        checkFillDataWorker(new_worker_form);
    }
});
$('#pers_email').on("keyup", function() {
    var regMail=/^[A-z0-9._-]+@[A-z0-9.-]+\.[A-z]{2,4}$/;//регулярное выражение для валидации почты
    if(this.value=="")
    {
        new_worker_form[3] = false;
        $('#add_new_worker').attr("disabled", true);
        $('#edit_worker').attr("disabled", true);
        checkFillDataWorker(new_worker_form);
    }else
    {
        //console.log(regD.test(this.value).length);
        if (this.value.match(regMail)==null)
        {
            new_worker_form[3] = false;
            $('#add_new_worker').attr("disabled", true);
            $('#edit_worker').attr("disabled", true);
            checkFillDataWorker(new_worker_form);
        }else{
            new_worker_form[3] = true;
            checkFillDataWorker(new_worker_form);
        }
    }
});
$('#download_photo').on("change",function(){
   console.log("change");
    new_worker_form[4] = true;
    checkFillDataWorker(new_worker_form);
});
function checkFillDataWorker(workerForm) {
    for (var i = 0; i <= workerForm.length; i++) {
        if (workerForm[i] == false) {
            break;
        } else {
            if (i == workerForm.length) {
                $('#add_new_worker').removeAttr("disabled");
                $('#edit_worker').removeAttr("disabled");
            }
        }
    }
}

//Check service table field
$('#select_section_new').on("change", function() {
    if ($(this).val() == "" || $(this).val() == "Все") {
        new_serv_form[0] = false;
        $('#save_serv').attr("disabled", true);
        $('#editing_service').attr("disabled", true);
        checkFillDataService(new_serv_form);
    } else {
        new_serv_form[0]= true;
        checkFillDataService(new_serv_form);
    }
});
$('#service_name').on("keyup", function() {
    if ($(this).val() == "" || $(this).val() == " ") {
        new_serv_form[1] = false;
        $('#save_serv').attr("disabled", true);
        $('#editing_service').attr("disabled", true);
        checkFillDataService(new_serv_form);
    } else {
        $('#sevice_table_div table tbody tr').each(function(i)
        {
            if($('#sevice_table_div table tbody tr').eq(i).find('td').eq(0).text()!="")
            {
                if($('#service_name').val()==$('#sevice_table_div table tbody tr').eq(i).find('td').eq(1).text())
                {
                    new_serv_form[1] = false;
                    $('#save_serv').attr("disabled", true);
                    $('#editing_service').attr("disabled", true);
                    checkFillDataService(new_serv_form);
                    return false;
                }
            }else
            {
                new_serv_form[1] = true;
                checkFillDataService(new_serv_form);
                return false;
            }
        });
    }
});
$('#service_price').on("keyup", function () {
    if (isNaN($(this).val()) || $(this).val() == ""||$(this).val()[0]==0) {
        new_serv_form[2] = false;
        $('#save_serv').attr("disabled", true);
        $('#editing_service').attr("disabled", true);
        checkFillDataService(new_serv_form);
    } else {
        new_serv_form[2] = true;
        checkFillDataService(new_serv_form);
    }
});
$('#service_time').on("keyup", function () {
    if (isNaN($(this).val()) || $(this).val() == ""||$(this).val()[0]==0) {
        new_serv_form[3] = false;
        $('#save_serv').attr("disabled", true);
        $('#editing_service').attr("disabled", true);
        checkFillDataService(new_serv_form);
    } else {
        new_serv_form[3] = true;
        checkFillDataService(new_serv_form);
    }
});
function checkFillDataService(serviceForm) {
    for (var i = 0; i <= serviceForm.length; i++) {
        if (serviceForm[i] == false) {
            break;
        } else {
            if (i == serviceForm.length) {
                $('#save_serv').removeAttr("disabled");
                $('#editing_service').removeAttr("disabled");
            }
        }
    }
}

//Check visit table field
$("#tel_input").keypress(function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});

$('#tel_input').keyup(function(e) {
    if ((e.which == 8 || e.which == 46) && $('#tel_input').val().length < 3) {

        $('#tel_input').val("+38");
    }
});

$('#tel_input').on("keyup", function() {
    if ($(this).val().length != 13 || isNaN($(this).val().slice(1))) {
        new_visits_form[0] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[0] = true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#name_input').on("keyup", function() {
    if ($(this).val() == "" || $(this).val() == " ") {
        new_visits_form[1] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[1] = true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#price_input').on("keyup", function () {
    if (isNaN($(this).val()) || $(this).val() == ""||$(this).val()[0]=="0") {
        new_visits_form[2] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[2] = true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#duration_input').on("keyup", function () {
    if (isNaN($(this).val()) || $(this).val() == ""||$(this).val()[0] == "0") {
        new_visits_form[3] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[3] = true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#date_l').on("change", function (){
    if ($(this).val() == "") {
        new_visits_form[4] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[4] = true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#sel_master').on("change", function() {
    if ($(this).val() == "" || $(this).val() == "Все") {
        new_visits_form[5] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[5]= true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#service_visits').on("change", function() {
    if ($(this).val() == "" || $(this).val() == "Все") {
        new_visits_form[6] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[6]= true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#additionaly_input').on("keyup", function () {
    if (isNaN($(this).val()) || $(this).val() == "") {
        new_visits_form[7] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[7] = true;
        checkFillDataVisits(new_visits_form);
    }
});
$('#discount_input').on("keyup", function () {
    if (isNaN($(this).val()) || $(this).val() == "") {
        new_visits_form[8] = false;
        $('#save_list').attr("disabled", true);
        $('#edit_list').attr("disabled", true);
        checkFillDataVisits(new_visits_form);
    } else {
        new_visits_form[8] = true;
        checkFillDataVisits(new_visits_form);
    }
});
function checkFillDataVisits(visitFrom) {
    console.log(visitFrom);
    for (var i = 0; i <= visitFrom.length; i++) {
        if (visitFrom[i] == false) {
            break;
        } else {
            if (i == visitFrom.length) {
                $('#save_list').removeAttr("disabled");
                $('#edit_list').removeAttr("disabled");
            }
        }
    }
}

//Check new post
$('#new_post_personal_input').on("keyup", function () {
   if ($(this).val() == "" || $(this).val() == " ") {
       $("#save_post").attr("disabled", true);
   } else {
       $('#post_select').find('option').each(function(i)
       {
           if($('#post_select').find('option').eq(i).val()==$('#new_post_personal_input').val())
           {
               $("#save_post").attr("disabled", true);
           }else
           {
               if(i==$('#post_select').find('option').length-1)
               {
                   $("#save_post").removeAttr("disabled");
               }
           }
       });

   }
});

// Function of this tr and td
function defTd(td) {
    this_td = td;
    table_col = $(this_td).attr("col2");
    return this_td;
}
function defTr(tr) {
    this_tr = tr;
    return this_tr;
}

//Calculator of total result in visit form and function when we use it
$('#price_input').on("keyup",function() {
    calcTotal();
});
$('#additionaly_input').on("keyup",function() {
    calcTotal();
});
$('#discount_input').on("keyup",function() {
    calcTotal();
});
$('#ps_or_cur').on("change",function() {
    calcTotal();
});
function calcTotal() {
    var total = 0;
    var price = $('#price_input').val();
    var additionaly = $('#additionaly_input').val();
    var discount = $('#discount_input').val();
    var pes_or_cur = "";

    $("#ps_or_cur option:selected").each(function() {
        pes_or_cur += $(this).text();
    });
    if (price != "") {
        total= 0 + parseInt(price);
        if (additionaly != "") {
            total = total + parseInt(additionaly);
        }
        if (discount != "") {
            if (pes_or_cur=="грн") {
                total = total - parseInt(discount);
            } else {
                var one_pes = total / 100;
                discount = one_pes * parseInt(discount);
                total -= discount;
            }
        }
    }
    $('#total_input').val(total);
}

// Function on click button
$('#add_to_list_but').on("click",function(){
   $('#list_div').css("display","none");
   $('#new_list').css("display","block");
   $('#date_l').val($('#date_input').val());
   $('#save_list').attr("disabled", true);
});
$('#add_pers_but').on("click",function(){
    $('#new_worker').css("display","block");
    $('.new_worker_input').val("");
    $('.new_worker_input').eq(2).val("+38");
    $('#master_photo').attr("src","");
    $('#post_select').val("Все");
    $('#add_new_worker').attr("disabled", true);
});
$('#service_menu').on("click",function(){
    $('#side_block').css("height", "100%");
    selectedMenu.removeClass("active");
    $('.divs').css("display","none");
    selectedMenu = $('#service_menu_li');
    selectedMenu.addClass("active");
    $('#service').css("display","block");
});
$('#list_menu').on("click",function(){
    selectedMenu.removeClass("active");
    $('.divs').css("display","none");
    selectedMenu = $('#list_menu_li');
    selectedMenu.addClass("active");
    $('#list_div').css("display","block");
});
$('#personal_menu').on("click",function(){
    $('#side_block').css("height", "100%");
    selectedMenu.removeClass("active");
    $('.divs').css("display","none");
    selectedMenu = $('#personal_menu_li');
    selectedMenu.addClass("active");
    $('#personals_div').css("display","block");
});
$('#client_menu').on("click",function(){
    $('#side_block').css("height", "100%");
    selectedMenu.removeClass("active");
    $('.divs').css("display","none");
    selectedMenu = $('#client_menu_li');
    selectedMenu.addClass("active");
    $('#seach_field_tel').val('+38');
    $('#clients_div').css("display","block");
    var tr = $('#client_table_div table tbody tr');

    for (var i = 0; tr[i]; i++) {
        tr[i].style.display = "table-row";
    }
    $('#client_table_div table tbody tr:visible').filter( ':even').css("background-color","#F5F5F5");
    $('#client_table_div table tbody tr:visible').filter( ':odd').css("background-color","lightgrey");
});
$('#statistic_menu').on("click", function () {
    $('#side_block').css("height", "100%");
    selectedMenu.removeClass("active");
    $('.divs').css("display","none");
    // selectedMenu = $('#personal_menu_li');
    // selectedMenu.addClass("active");
    $('#statistic_div').css("display","block");
});
$('#new_post').on("click",function(){
    $("#new_personals_div").css("display","block");
});
$('#cancel_post').on("click", function () {
    $('#new_post_personal_input').val("");
    $('#new_personals_div').css("display","none");
    table_oncontext_menu = false;
});
$('#close_new_post_simb').on("click", function () {
    $('#new_post_personal_input').val("");
    $('#new_personals_div').css("display","none");
    table_oncontext_menu = false;
});
$("#save_post").on("click",function() {
   if($('#new_post_personal_input').val() != "" && $('#new_post_personal_input').val() != " ") {
       var option = $('<option></option>').text($('#new_post_personal_input').val());
       option.appendTo('#select_post');
       var option2 = $('<option></option>').text($('#new_post_personal_input').val());
       option2.appendTo('#post_select');

       $('#new_post_personal_input').val("");
       $('#new_personals_div').css("display","none");
       table_oncontext_menu = false;
   }
});
$('#cancel_serv').on("click",function() {
    table_oncontext_menu=false;
    $('#new_service').css("display", "none");
    $('#editing_service').css("display", "none");
    $('#save_serv').css("display", "block");
    $('#new_service_div2 input').val("");
    $('#select_section_new').attr("disabled", false);
    $('#new_service_div2 input').attr("disabled", false);
    $('#new_service_div2 textarea').attr("disabled", false);
});
$('#close_serv_simb').on("click",function() {
    $('#new_service_div2 input').val("");
    $('#save_serv').css("display", "block");
    $('#select_section_new').attr("disabled", false);
    $('#new_service_div2 input').attr("disabled", false);
    $('#new_service_div2 textarea').attr("disabled", false);
    table_oncontext_menu = false;
   $('#new_service').css("display","none");
});
$('#new_section').on("click",function() {
    $('#add_new_section_div').css("display","block");
    $('#save_section').attr("disabled",true);
});
$('#close_client_simb').on('click',function() {
    $('#new_client').css("display","none");
    $('#new_client input').attr("disabled", false);
    $('#select_section_new').attr("disabled", false);
    $("#save_client").css("display", "block");
    $('.new_client_input').val('');
    $('.new_client_input').eq(1).val('+38');
    $('#edit_client').css("display","none");
    $('#client_description').val("");
    for(var i=0; i<new_client_form.length; i++)
    {
        new_client_form[i]=false;
    }
    $('.new_client_input_radio').prop("checked",false);
    $('#client_description').removeAttr("disabled");
    table_oncontext_menu = false;
});

//Function on key up
$('#section_input').on("keyup",function() {
    if($(this).val()=="") {
        $("#save_section").attr("disabled", true);
    } else
    {
        $('#select_section2').find('option').each(function(i)
        {
            if($('#select_section2').find('option').eq(i).val()==$('#section_input').val())
            {
                $("#save_section").attr("disabled", true);
            }else
            {
                if(i==$('#select_section2').find('option').length-1)
                {
                    $("#save_section").removeAttr("disabled");
                }
            }
        });
    }

});

function defPosition(event) {
    var x = y = 0;
    if (document.attachEvent != null) { // Internet Explorer & Opera
        x = window.event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        y = window.event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
    } else if (!document.attachEvent && document.addEventListener) { // Gecko
        x = event.clientX + window.scrollX;
        y = event.clientY + window.scrollY;
    } else {
        // Do nothing
    }
    return {x:x, y:y};
}

function menu(type, evt) {
    // ��������� ���������� ������� contextmenu
    evt = evt || window.event;
    evt.cancelBubble = true;
    // ���������� ����������� ����������� ����
    var menu = document.getElementById("contextMenuId");
    //var html = "";
    //switch (type) {
    //    case (1) :
    //        html += '<li class="table_menu" onmouseover="tabMenuHover(this)"><span>Edit</span></li>';
    //        html += "<li class='table_menu'><span>Delete</span></li>";
    //        break;
    //    //case (2) :
    //    //    html = "���� ��� ������� ����";
    //    //    html += "<br><i>(�����)</i>";
    //    //    break;
    //    //default :
    //    //    // Nothing
    //    //    break;
    //}
    // ���� ���� ��� �������� - ����������
          //  menu.innerHTML = html;
        menu.style.top = defPosition(evt).y + "px";
        menu.style.left = defPosition(evt).x + "px";
        menu.style.display = "";

    // ��������� ���������� ������������ ����������� ����
    return false;
}

function addHandler(object, event, handler, useCapture) {
    //$('.table_menu').eq(0).on("click",function(){

    //    $('#new_list').css("display","block");
    //});
    //setTimeout(1000);
    if (object.addEventListener) {
        object.addEventListener(event, handler, useCapture ? useCapture : false);
    } else if (object.attachEvent) {
        object.attachEvent('on' + event, handler);
    } else alert("Add handler is not supported");
}
addHandler(document, "contextmenu", function() {

    //$('.table_menu').eq(0).on("click",function(){

    //    $('#new_list').css("display","block");
    //});
    //setTimeout(3000);
    document.getElementById("contextMenuId").style.display = "none";
});

addHandler(document, "click", function() {

    //$('.table_menu').eq(0).find('span').on("clicked",function(){

    //    $('#new_list').css("display","block");
    //});
    setTimeout(3000);
    document.getElementById("contextMenuId").style.display = "none";
});
/*
** add by Yevhen Kondratyev
*/
function openModalListTable(td) {
    var time_of_list = $(td).parent().find('td').eq(0).text();
    var masterIndex = td.closest("td").index() + 1;
    masterIndex = $('#list_table table thead tr th:nth-child(' + masterIndex + ')').text();
    $('#sel_time').val(time_of_list).attr("selected", true);
    $('#sel_master').val(masterIndex).attr("selected", true);
    var date_for_list = $('#date_input').val();
    $('#date_l').val(date_for_list);
    $('#new_list').css("display","block");
    $('#list_div').css("display","none");
    console.log(td);
    var visit_data_list = $(td).find('p').eq(0).text();
    if (visit_data_list) {
        var visit_time_list = $(td).find('p').eq(1).text();
        var visit_section_list = $(td).find('p').eq(2).text();
        var visit_master_list = $(td).find('p').eq(3).text();
        var visit_service_list = $(td).find('p').eq(4).text();
        var visit_price_list = $(td).find('p').eq(5).text();
        var visit_duration_list = $(td).find('p').eq(6).text();
        var client_phone_list = $(td).find('p').eq(7).text();
        var client_name_list = $(td).find('p').eq(8).text();
        var visit_extra_list = $(td).find('p').eq(9).text();
        var visit_discount_list = $(td).find('p').eq(10).text();
        var discount_type_list = $(td).find('p').eq(11).text();
        var visit_discription_list = $(td).find('p').eq(12).text();
        var visit_total_price = $(td).find('p').eq(13).text();

        $('#date_l').val(visit_data_list).attr('selected', true);
        $('#section_list_sel').val(visit_section_list).attr('selected', true);
        $('#service_visits').val(visit_service_list).attr('selected', true);
        $('#sel_time').val(visit_time_list).attr('selected', true);
        $('#sel_master').val(visit_master_list).attr('selected', true);
        $('#price_input').val(visit_price_list).attr('selected', true);
        $('#duration_input').val(visit_duration_list).attr('selected', true);
        $('#tel_input').val(client_phone_list).attr('selected', true);
        $('#name_input').val(client_name_list).attr('selected', true);
        $('#additionaly_input').val(visit_extra_list).attr('selected', true);
        $('#discount_input').val(visit_discount_list).attr('selected', true);
        $('#ps_or_cur').val(discount_type_list).attr('selected', true);
        $('#note_txtarea').val(visit_discription_list).attr('selected', true);
        $('#total_input').val(visit_total_price).attr('selected', true);
        $('#date_l').attr("disabled", true);
        $('#section_list_sel').attr("disabled", true);
        $('#service_visits').attr("disabled", true);
        $('#sel_time').attr("disabled", true);
        $('#sel_master').attr("disabled", true);
        $('#price_input').attr("disabled", true);
        $('#duration_input').attr("disabled", true);
        $('#tel_input').attr("disabled", true);
        $('#name_input').attr("disabled", true);
        $('#additionaly_input').attr("disabled", true);
        $('#discount_input').attr("disabled", true);
        $('#ps_or_cur').attr("disabled", true);
        $('#note_txtarea').attr("disabled", true);
        $('#total_input').attr("disabled", true);
        $('#save_list').css("display","none");
        $('#cancel_list').css("display","block");
    }

}
$('#select_sex').on("change", function () {
    var sex = $('#select_sex').val();
    var tr = $('#client_table_div table tbody tr');

    for (var i = 0; tr[i]; i++) {
        var sex_tr = tr[i].getElementsByTagName('td')[4].innerText;
        if(tr[i].getElementsByTagName('td')[0].innerText=="")
        {
            break;
        }else{
            console.log(sex_tr,sex);
            if (sex_tr) {
                if (sex == 'Женщины' && sex_tr != 'Женск') {
                    tr[i].style.display = "none";
                }
                else if (sex == 'Мужчины' && sex_tr != 'Мужск') {
                    tr[i].style.display = "none";
                } else {
                    tr[i].style.display = "table-row";
                }
                if (sex == 'Все') {
                    tr[i].style.display = "table-row";
                }
            }
        }
    }
    $('#client_table_div table tbody tr:visible').filter( ':even').css("background-color","#F5F5F5");
    $('#client_table_div table tbody tr:visible').filter( ':odd').css("background-color","lightgrey");
});
$('#seach_field_tel').keypress(function(e) {
    if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
        return false;
    }
});
$('#seach_field_tel').keyup(function(e) {
    if ((e.which == 8 || e.which == 46) && $('#seach_field_tel').val().length < 3) {
        $('#seach_field_tel').val("+38");
    }
});
$('#seach_field_tel').on("keyup", function() {
    var tr = $('#client_table_div table tbody tr');
    var tel = $('#seach_field_tel').val();
    var tel_len = tel.length;

    for (var i = 0; tr[i]; i++) {
        var telephone = tr[i].getElementsByTagName('td')[2].innerText;
        var res = telephone.substr(0, tel_len);

        if (res) {
            if (res != tel) {
                tr[i].style.display = "none";
            } else {
                tr[i].style.display = "table-row";
            }
        }
    }
    $('#client_table_div table tbody tr:visible').filter( ':even').css("background-color","#F5F5F5");
    $('#client_table_div table tbody tr:visible').filter( ':odd').css("background-color","lightgrey");
});
$('#select_section2').on("change",function(){
    var select = $('#select_section2').val();
    var tr = $('#sevice_table_div table tbody tr');

    for (var i = 0; tr[i]; i++) {
        var selectTr = tr[i].getElementsByTagName('td')[4].innerText;

        if (select != 'Все') {
            if (select != selectTr && selectTr != '') {
                tr[i].style.display = "none";
            } else {
                tr[i].style.display = "table-row";
            }
        } else {
            tr[i].style.display = "table-row";
        }
    }
    $('#sevice_table_div table tbody tr:visible').filter( ':even').css("background-color","#F5F5F5");
    $('#sevice_table_div table tbody tr:visible').filter( ':odd').css("background-color","lightgrey");
});
$('#select_post').on("change",function(){
    var select = $('#select_post').val();
    var tr = $('#post_table_div table tbody tr');

    for (var i = 0; tr[i]; i++) {
        var selectTr = tr[i].getElementsByTagName('td')[3].innerText;

        if (select != 'Все') {
            if (select != selectTr && selectTr != '') {
                tr[i].style.display = "none";
            } else {
                tr[i].style.display = "table-row";
            }
        } else {
            tr[i].style.display = "table-row";
        }
    }
    $('#post_table_div table tbody tr:visible').filter( ':even').css("background-color","#F5F5F5");
    $('#post_table_div table tbody tr:visible').filter( ':odd').css("background-color","lightgrey");
});
function openService(tr) {
    console.log(tr);
    var name = $(tr).find('td').eq(1).text();
    var cost = tr[0].getElementsByTagName('td')[2].innerText;
    var time = tr[0].getElementsByTagName('td')[3].innerText;
    var select = tr[0].getElementsByTagName('td')[4].innerText;
    var desc = tr[0].getElementsByTagName('td')[5].innerText;

    $("#save_serv").css("display", "none");
    $('#select_section_new').val(select);
    $('#select_section_new').attr("disabled", true);
    $('#new_service_div2 input').eq(0).val(name);
    $('#new_service_div2 input').eq(0).attr("disabled", true);
    $('#new_service_div2 input').eq(1).val(cost);
    $('#new_service_div2 input').eq(1).attr("disabled", true);
    $('#new_service_div2 input').eq(2).val(time);
    $('#new_service_div2 input').eq(2).attr("disabled", true);
    $('#new_service_div2 textarea').eq(0).val(desc);
    $('#new_service_div2 textarea').eq(0).attr("disabled", true);
    $('#new_service').css("display","block");
}
function openClient(tr) {
    console.log(tr);
    var name = tr[0].getElementsByTagName('td')[1].innerText;
    var phoneNumber = tr[0].getElementsByTagName('td')[2].innerText;
    var sex = tr[0].getElementsByTagName('td')[4].innerText;
    var desc = tr[0].getElementsByTagName('td')[5].innerText;
    $("#save_client").css("display", "none");
    $('#new_client input').eq(0).val(name);
    $('#new_client input').eq(0).attr("disabled", true);
    $('#new_client input').eq(1).val(phoneNumber);
    $('#new_client input').eq(1).attr("disabled", true);

    if (sex == "Мужск") {
        $('#men').prop("checked", true);
    } else if (sex == "Женск") {
        $('#women').prop("checked", true);
    }
    $('#men').attr("disabled", true);
    $('#women').attr("disabled", true);
    $('#new_client input').eq(4).attr("disabled", true);
    $('#cancel_new_worker').css("display","block");
    $('#client_description').val(desc);
    $('#client_description').attr("disabled", true);
    $('#new_client').css("display","block");
    for (var i = 0; i < 3; i++) {
        new_client_form[i] = false;
    }
    new_client_form[3] = true;
    console.log(new_client_form);
}
$("#cancel_new_worker").on("click",function(){
    $('#new_worker').css("display","none");
    $("#edit_worker").css("display","none");
    $("#add_new_worker").css("display", "block");
    $("#cancel_new_worker").css("display", "block");
    $('.new_worker_input').val("");
    $('.new_worker_input').attr("disabled", false);
    $('#new_worker input').eq(1).val("+38");
    $('#master1').attr("disabled", false);
    $('#master2').attr("disabled", false);
    if ($('#select_post').find('option').eq(1).val()) {
        $('#post_select').val($('#select_post').find('option').eq(1).val());
    }
    table_oncontext_menu = false;
    $('#master_serv_add input:radio').remove();
    $('#master_serv_add label').remove();
    $('#master_serv_add br').remove();
    $('#master_photo').attr('src', "");
    $('#download_photo').attr("disabled", false);
    for (var y = 0; y < 5; y++) {
        new_worker_form[y] = false;
    }
});
$("#close_worker_simb").on("click",function(){
    $('#new_worker').css("display","none");
    $("#back_worker").css("display","none");
    $("#add_new_worker").css("display", "block");
    $("#cancel_new_worker").css("display", "block");

    $('.new_worker_input').val("");
    $('.new_worker_input').attr("disabled", false);
    $('.new_worker_input').eq(2).val("+38");
    $('#master1').attr("disabled", false);
    $('#master2').attr("disabled", false);
    $('#master_photo').attr('src', "");
    $('#download_photo').attr("disabled", false);
    for (var y = 0; y < 5; y++) {
        new_worker_form[y] = false;
    }
});
function openPersonal(tr) {
    var photo = $(tr).find('img').attr('src');
    var name = tr[0].getElementsByTagName('td')[2].innerText;
    var post = tr[0].getElementsByTagName('td')[3].innerText;
    var phoneNumber = tr[0].getElementsByTagName('td')[4].innerText;
    var email = tr[0].getElementsByTagName('td')[5].innerText;
    var desc = tr[0].getElementsByTagName('td')[6].innerText;
    desc = desc.split("$^$");
    var insert = $('#master_serv_add');

    for (var i = 0; desc[i]; i++) {
        var worker_doID = desc[i] + "Add";
        var input = $('<input type="radio" name="service_master_add" id="' + worker_doID + '">');
        var label = $('<label for="' + worker_doID + '">' + desc[i] + '</label><br>');

        input.appendTo(insert);
        label.appendTo(insert);
    }
    $("#add_new_worker").css("display", "none");
    $("#cancel_new_worker").css("display", "none");

    $('#new_worker input').eq(0).val(name);
    $('#new_worker input').eq(0).attr("disabled", true);

    $('#new_worker select').eq(0).val(post);
    $('#new_worker select').eq(0).attr("disabled", true);

    $('#new_worker input').eq(1).val(phoneNumber);
    $('#new_worker input').eq(1).attr("disabled", true);

    $('#new_worker input').eq(2).val(email);
    $('#new_worker input').eq(2).attr("disabled", true);

    $('#master_photo').attr('src', photo);
    $('#download_photo').attr("disabled", true);

    $('#master1').attr("disabled", true);
    $('#master2').attr("disabled", true);
    $('#cancel_new_worker').css("display","block");
    $('#new_worker').css("display","block");
}
function openAddList() {
    if ($('#list_menu').prop("checked") == true) {
        $('#sel_master option').css("display","block");
        var time_of_list = $(this_td).parent().find('td').eq(0).text();
        var masterIndex = this_td.closest("td").index() + 1;
        masterIndex = $('#list_table table thead tr th:nth-child(' + masterIndex + ')').text();
        $('#sel_time').val(time_of_list).attr("selected", true);
        $('#sel_master').val(masterIndex).attr("selected", true);
        var date_for_list = $('#date_input').val();
        $('#date_l').val(date_for_list);

        var visit_data_list = $(this_td).find('p').eq(0).text();
        if (visit_data_list) {
            var visit_time_list = $(this_td).find('p').eq(1).text();
            var visit_section_list = $(this_td).find('p').eq(2).text();
            var visit_master_list = $(this_td).find('p').eq(3).text();
            var visit_service_list = $(this_td).find('p').eq(4).text();
            var visit_price_list = $(this_td).find('p').eq(5).text();
            var visit_duration_list = $(this_td).find('p').eq(6).text();
            var client_phone_list = $(this_td).find('p').eq(7).text();
            var client_name_list = $(this_td).find('p').eq(8).text();
            var visit_extra_list = $(this_td).find('p').eq(9).text();
            var visit_discount_list = $(this_td).find('p').eq(10).text();
            var discount_type_list = $(this_td).find('p').eq(11).text();
            var visit_discription_list = $(this_td).find('p').eq(12).text();
            var visit_total_price = $(this_td).find('p').eq(13).text();

            $('#date_l').val(visit_data_list).attr('selected', true);
            $('#section_list_sel').val(visit_section_list).attr('selected', true);
            $('#service_visits').val(visit_service_list).attr('selected', true);
            $('#sel_time').val(visit_time_list).attr('selected', true);
            $('#sel_master').val(visit_master_list).attr('selected', true);
            $('#price_input').val(visit_price_list).attr('selected', true);
            $('#duration_input').val(visit_duration_list).attr('selected', true);
            $('#tel_input').val(client_phone_list).attr('selected', true);
            $('#name_input').val(client_name_list).attr('selected', true);
            $('#additionaly_input').val(visit_extra_list).attr('selected', true);
            $('#discount_input').val(visit_discount_list).attr('selected', true);
            $('#ps_or_cur').val(discount_type_list).attr('selected', true);
            $('#note_txtarea').val(visit_discription_list).attr('selected', true);
            $('#total_input').val(visit_total_price).attr('selected', true);
        }
        $('#new_list').css("display","block");
        $('#edit_list').css("display","block");
        $('#save_list').css("display","none");
        $('#list_div').css("display","none");
    }
    if (table_oncontext_menu != true) {
        if ($('#service_menu').prop("checked") == true) {
            $('#save_serv').css("display", "none");
            $('#editing_service').css("display", "block");
            $('#new_service').css("display", "block");
            var id = this_tr.find('td').eq(0).text();
            var name_serv = this_tr.find('td').eq(1).text();
            var price_sev = this_tr.find('td').eq(2).text();
            var time_serv = this_tr.find('td').eq(3).text();
            var sect_serv = this_tr.find('td').eq(4).text();
            var desc_serv = this_tr.find('td').eq(5).text();

            $('#select_section_new').val(sect_serv);
            $('#new_service_div2 input').eq(0).val(name_serv);
            $('#new_service_div2 input').eq(1).val(price_sev);
            $('#new_service_div2 input').eq(2).val(time_serv);
            $('#service_description').val(desc_serv);

            $('#editing_service').on("click", function() {
                name_serv = $('#new_service_div2 input').eq(0).val();
                price_sev = $('#new_service_div2 input').eq(1).val();
                time_serv = $('#new_service_div2 input').eq(2).val();
                desc_serv = $('#service_description').val();
                sect_serv = $('#select_section_new').val();
                this_tr.find('td').eq(1).text(name_serv);
                this_tr.find('td').eq(2).text(price_sev);
                this_tr.find('td').eq(3).text(time_serv);
                this_tr.find('td').eq(4).text(sect_serv);
                this_tr.find('td').eq(5).text(desc_serv);
                $.ajax({
                    type    :   'POST',
                    url     :   'edit_service',
                    data    :   'service_type=' + sect_serv + '&service_name=' + name_serv + '&service_price=' + price_sev + '&service_time=' + time_serv + '&service_desc=' + desc_serv + '&service_id=' + id,
                    dataType: 'json',
                    cache: false
                });

                $('#new_service').css("display", "none");
                $('#editing_service').css("display", "none");
                $('#save_serv').css("display", "block");
            });
        }
        if ($('#personal_menu').prop("checked") == true) {
            for (var y = 0; y < 5; y++) {
                new_worker_form[y] = true;
            }
            $('#edit_worker').css("display", "block");
            $('#add_new_worker').css("display", "none");
            $('#new_worker').css("display", "block");
            var id = this_tr.find('td').eq(0).text();
            var photo = this_tr.find('img').attr('src');
            //console.log(photo);
            var worker_name = this_tr.find('td').eq(2).text();
            var worker_post = this_tr.find('td').eq(3).text();
            var worker_tel = this_tr.find('td').eq(4).text();
            var worker_email = this_tr.find('td').eq(5).text();
            var worker_do = this_tr.find('td').eq(6).text();
            worker_do = worker_do.split("$^$");
            var insert = $('#master_serv_add');

            for (var i = 0; worker_do[i]; i++) {
                var worker_doID = worker_do[i] + "Add";
                var input = $('<input type="radio" name="service_master_add" id="' + worker_doID + '">');
                var label = $('<label for="' + worker_doID + '">' + worker_do[i] + '</label><br>');

                input.appendTo(insert);
                label.appendTo(insert);
            }

            $('#new_worker input').eq(0).val(worker_name);
            $('#new_worker select').eq(0).val(worker_post);
            $('#new_worker input').eq(1).val(worker_tel);
            $('#new_worker input').eq(2).val(worker_email);
            $('#master_photo').attr('src', photo);
            $('#edit_worker').on("click", function () {
                worker_name = $('#new_worker input').eq(0).val();
                worker_post = $('#new_worker select').eq(0).val();
                worker_tel = $('#new_worker input').eq(1).val();
                worker_email = $('#new_worker input').eq(2).val();
                var labAddmaster = $('#master_serv_add label');
                var desc_worker = "";

                for (var i = 0; labAddmaster[i]; i++) {
                    if (labAddmaster[i + 1]) {
                        desc_worker += labAddmaster[i].innerText + "$^$";
                    } else {
                        desc_worker += labAddmaster[i].innerText;
                    }
                }
                $('#master_serv_add input:radio').remove();
                $('#master_serv_add label').remove();
                $('#master_serv_add br').remove();

                var master_photo = $('#master_photo').attr('src');
                if (!master_photo) {
                    master_photo = this_tr.find('img').attr('src');
                }
                this_tr.find('td').eq(1).find('img').attr('src', master_photo);
                this_tr.find('td').eq(2).text(worker_name);
                this_tr.find('td').eq(3).text(worker_post);
                this_tr.find('td').eq(4).text(worker_tel);
                this_tr.find('td').eq(5).text(worker_email);
                this_tr.find('td').eq(6).text(desc_worker);
                $.ajax({
                    type    :   'POST',
                    url     :   'edit_master',
                    data    :   'worker_name_secname=' + worker_name + '&worker_telephon_number=' + worker_tel + '&worker_email=' + worker_email + '&worker_post=' + worker_post + '&discription=' + desc_worker + '&master_photo=' + master_photo + '&master_id='+ id,
                    dataType: 'json',
                    cache: false
                });

                $('#new_worker').css("display", "none");
                $('#edit_worker').css("display", "none");
                $('#add_new_worker').css("display", "block");
            });
        }
        if ($('#client_menu').prop("checked") == true) {
            for (var i = 0; i < new_client_form.length; i++) {
                new_client_form[i] = true;
            }
            console.log(new_client_form);
            $('#save_client').css("display", "none");
            $('#edit_client').css("display", "block");
            $('#new_client').css("display", "block");
            var id = this_tr.find('td').eq(0).text();
            var name_client = this_tr.find('td').eq(1).text();
            var tele_client = this_tr.find('td').eq(2).text();
            var sex_client = this_tr.find('td').eq(4).text();
            var desc_client = this_tr.find('td').eq(5).text();

            $('#new_client input').eq(0).val(name_client);
            $('#new_client input').eq(1).val(tele_client);
            console.log("sex_client="+sex_client);
            if (sex_client == "Мужск") {
                $('#men').prop("checked", true)
            } else if (sex_client == "Женск") {
                $('#women').prop("checked", true)
            }
            $('#client_description').val(desc_client);
            console.log(id);
            $('#edit_client').on("click", function() {
                name_client = $('#new_client input').eq(0).val();
                tele_client = $('#new_client input').eq(1).val();
                desc_client = $('#client_description').val();
                if ($('#men').prop("checked") == true) {
                    sex_client = "Мужской";
                } else if ($('#women').prop("checked") == true) {
                    sex_client = "Женский";
                }
                this_tr.find('td').eq(1).text(name_client);
                this_tr.find('td').eq(2).text(tele_client);
                this_tr.find('td').eq(4).text(sex_client);
                this_tr.find('td').eq(5).text(desc_client);
                $.ajax({
                    type    :   'POST',
                    url     :   'edit_client',
                    data    :   'client_id=' + id + '&client_name=' + name_client + '&client_sex=' + sex_client + '&client_phone=' + tele_client + '&client_description=' + desc_client,
                    dataType: 'json',
                    cache: false
                });

                $('#new_client').css("display", "none");
                $('#edit_client').css("display", "none");
                $('#save_client').css("display", "block");
            });
        }
    }
}
$('#log_out_div').on("click", function(){
    window.location.href = window.location.href + "autorization_logout";
});
$('#save_serv').on("click",function(){
    var serv_name = $('#new_service_div2 input').eq(0).val();
    var price = $('#new_service_div2 input').eq(1).val();
    var time = $('#new_service_div2 input').eq(2).val();
    var descr = $('#new_service_div2 textarea').val();
    var section = "";

    $('#select_section_new').find('option').each(function(index) {
        if($(this).prop("selected") == true) {
            section = $('#select_section_new').find('option').eq(index).text();
        }
    });
    if (table_oncontext_menu != true) {
        var table = $('#sevice_table_div table tbody');
        var tr = $('#sevice_table_div table tbody tr');
        var index = 0;
        for (var i = 0; tr[i]; i++) {
            var id_serv = tr[i].getElementsByTagName('td')[0].innerText;

            if (id_serv  == "") {
                if (i == 0) {
                    id_serv = 0;
                } else {
                    id_serv = tr[i - 1].getElementsByTagName('td')[0].innerText;
                }
                index = i;
                break ;
            }
        }
        id_serv = parseInt(id_serv);
        table.find('tr').eq(index).find('td').eq(0).text(id_serv + 1);
        table.find('tr').eq(index).find('td').eq(1).text(serv_name);
        table.find('tr').eq(index).find('td').eq(2).text(price);
        table.find('tr').eq(index).find('td').eq(3).text(time);
        table.find('tr').eq(index).find('td').eq(4).text(section);
        table.find('tr').eq(index).find('td').eq(5).text(descr);

        $('#new_service_div2 input').val("");
        $('#new_service').css("display", "none");
        //$('#save_serv').attr("disabled", true);
    } else {
        // this_td.find('td').eq(1).text(serv_name);
        // this_td.find('td').eq(2).text(price);
        // this_td.find('td').eq(3).text(time);
        // this_td.find('td').eq(4).text(section);
        // $('#new_service').css("display", "none");
        // for (var i = 0; i < 3; i++)
        // {
        //     new_serv_form[i] = false;
        // }
        //$('#save_serv').attr("disabled", true);
    }
    table_oncontext_menu = false;
});
$('#add_new_worker').on("click",function(){
    var name = $('.new_worker_input').eq(0).val();
    var post = $('.new_worker_input').eq(1).val();
    var tel = $('.new_worker_input').eq(2).val();
    var email = $('.new_worker_input').eq(3).val();
    var photoSrc = document.getElementById('master_photo').getAttribute('src');
    $('#edit_worker').css("display","none");
    if (table_oncontext_menu != true) {
        var table = $('#post_table_div table tbody');
        var tr = $('#post_table_div table tbody tr');
        var index = 0;

        for (var i = 0; tr[i]; i++) {
            var id_worker = tr[i].getElementsByTagName('td')[0].innerText;

            if (id_worker  == "") {
                if (i == 0) {
                    id_worker = 0;
                } else {
                    id_worker = tr[i - 1].getElementsByTagName('td')[0].innerText;
                }
                index = i;
                break ;
            }else
            {
                if(i==tr.length-1)
                {
                    console.log("samTel==false");
                    id_worker=tr.length;
                    $('<tr onclick="openPersonal($(this))" oncontextmenu="defTr($(this))"><td></td><td><img src="" class="mater_photo_td" style="display: none"></td><td></td><td></td><td></td><td style="display:none"></td><td style="display:none"></td></tr>').appendTo(table);
                    console.log(id_worker);
                    index=i;
                    table.find('tr').eq(index).find('td').eq(0).text(id_worker);
                    table.find('tr').eq(index).find('img').attr('src', photoSrc);
                    table.find('tr').eq(index).find('img').css('display', 'block');
                    table.find('tr').eq(index).find('td').eq(2).text(name);
                    table.find('tr').eq(index).find('td').eq(3).text(post);
                    table.find('tr').eq(index).find('td').eq(4).text(tel);
                    table.find('tr').eq(index).find('td').eq(5).text(email);
                }
            }
        }
        id_worker = parseInt(id_worker);
        table.find('tr').eq(index).find('td').eq(0).text(id_worker + 1);
        table.find('tr').eq(index).find('img').attr('src', photoSrc);
        table.find('tr').eq(index).find('img').css('display', 'block');
        table.find('tr').eq(index).find('td').eq(2).text(name);
        table.find('tr').eq(index).find('td').eq(3).text(post);
        table.find('tr').eq(index).find('td').eq(4).text(tel);
        table.find('tr').eq(index).find('td').eq(5).text(email);
        $('<th>'+name+'</th>').appendTo('#list_table table thead tr');
        $('#list_table table tbody tr').each(function(i){
            var toInsertTd = $('<td oncontextmenu="defTd($(this))" onclick="openModalListTable($(this))"></td>');
            var p = $('<p style="display: none"></p>'+
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>' +
                '<p style="display: none"></p>');
            p.appendTo(toInsertTd);
            toInsertTd.appendTo($('#list_table table tbody tr').eq(i));
        })

        $('.new_worker_input').val("");
        $('.new_worker_input').eq(2).val("+38");
        $('#new_worker').css("display","none");
        $('#add_new_worker').attr("disabled", true);
        for (var y = 0; y < 5; y++) {
            new_worker_form[y] = false;
        }
    } else {
        // this_td.find('td').eq(2).text(name);
        // this_td.find('td').eq(3).text(post);
        // this_td.find('td').eq(4).text(tel);
        // this_td.find('td').eq(5).text(email);
        // $('.new_worker_input').val("");
        // $('.new_worker_input').eq(2).val("+38");
        $('#new_worker').css("display","none");
        $('#add_new_worker').attr("disabled", true);
        // for(var i=0; i<3; i++)
        // {
        //     new_worker_form[i]=false;
        // }
    }
    table_oncontext_menu = false;
});
$('#save_client').on("click",function(){
    var name = $('.new_client_input').eq(0).val();
    var tel = $('.new_client_input').eq(1).val();
    var sex = "";
    var descr = $('.new_client_input').eq(2).val();
    $('.new_client_input_radio').each(function(index){
        if($(this).prop("checked") == true){
            sex = $('.new_client_sex_label').eq(index).text();
        }
    });
    if(table_oncontext_menu == false) {
        var table = $('#client_table_div table tbody');
        var tr = $('#client_table_div table tbody tr');
        var index = 0;
        var coming=0;
        var samTel=false;
        for (var i = 0; i<tr.length; i++)
        {
            if(tr.eq(i).find('td').eq(0).text()!="")
            {
                for(var j=0; j<tel.length; j++)
                {
                    console.log(tel[j],tr.eq(i).find('td').eq(0).text()[j]);
                    if(tel[j]!=tr.eq(i).find('td').eq(2).text()[j])
                    {
                        j=tel.length-1;
                    }else
                    {
                        if(j==tel.length-1)
                        {
                            console.log("samTel");
                            table.find('tr').eq(index).find('td').eq(1).text(name);
                            //table.find('tr').eq(index).find('td').eq(2).text(tel);
                            coming=parseInt(table.find('tr').eq(index).find('td').eq(3).text())+1;
                            table.find('tr').eq(index).find('td').eq(3).text(coming);
                            table.find('tr').eq(index).find('td').eq(4).text(sex);
                            table.find('tr').eq(index).find('td').eq(5).text(descr);
                            samTel=true;
                        }
                    }
                }
                if(samTel==false)
                {
                    if(i==tr.length-1)
                    {
                        console.log("samTel==false");
                        id_client=tr.length;
                        $('<tr onclick="openClient($(this))" oncontextmenu="defTr($(this))"><td></td><td></td><td></td><td></td><td style="display:none"></td><td style="display:none"></td></tr>').appendTo(table);
                        console.log(id_client);
                        index=i+1;
                        table.find('tr').eq(index).find('td').eq(0).text(id_client);
                        table.find('tr').eq(index).find('td').eq(1).text(name);
                        table.find('tr').eq(index).find('td').eq(2).text(tel);
                        table.find('tr').eq(index).find('td').eq(3).text(1);
                        table.find('tr').eq(index).find('td').eq(4).text(sex);
                        table.find('tr').eq(index).find('td').eq(5).text(descr);
                    }
                }
            }else{
                if(samTel==false)
                {
                    if (i == 0) {
                        id_client = 0;
                    } else {
                        id_client = tr[i - 1].getElementsByTagName('td')[0].innerText;
                    }
                    index = i;
                    id_client = parseInt(id_client);
                    console.log(id_client);
                    table.find('tr').eq(index).find('td').eq(0).text(id_client + 1);
                    table.find('tr').eq(index).find('td').eq(1).text(name);
                    table.find('tr').eq(index).find('td').eq(2).text(tel);
                    table.find('tr').eq(index).find('td').eq(3).text(1);
                    table.find('tr').eq(index).find('td').eq(4).text(sex);
                    table.find('tr').eq(index).find('td').eq(5).text(descr);
                }
                break;
            }
        }
        for(var i=0; i<new_client_form.length; i++)
        {
            new_client_form[i]=false;
        }
        $('.new_client_input_radio').prop("checked",false);
        $('.new_client_input').val("");
        $('.new_client_input').eq(1).val("+38");
        $('#save_client').attr("disaled","true");
        samTel=false;
    } else {
        //     this_td.find('td').eq(1).text(name);
        //     this_td.find('td').eq(2).text(tel);
        //     this_td.find('td').eq(4).text(sex);
        //     $('.new_client_input').val("");
        //     $('.new_client_input').eq(1).val("+38");
        //
        //     for(var i=0; i<3; i++)
        //     {
        //         new_client_form[i]=false;
        //     }
        $('#save_client').attr("disaled","true");
    }
    $('#new_client').css("display","none");
    table_oncontext_menu = false;
});

function delAddList(){
    if ($('#list_menu').prop("checked") == true) {
        var visit_list_id = $(this_td).find('p').eq(14).text();
        var tableList = "visits";

        if (visit_list_id) {
            $(this_td).find('p').each(function(){
                $(this).text("");
            });
            $.ajax({
                type 	:	'POST',
                url		:	'delete_list',
                data    :   'table=' + tableList + '&list_id=' + visit_list_id,
                dataType:	'json',
                cache	:	false
            });
        }
    }
    if (table_oncontext_menu != true) {
        $(this_tr).find('td').each(function(){
            $(this).css("display", "none");
        });
        var id = 0;
        var currentTable = "";
        if ($('#service_menu').prop('checked') == true) {
            id = $(this_tr).find('td').eq(0).text();
            currentTable = "services";

            $.ajax({
                type 	:	'POST',
                url		:	'delete_list',
                data    :   'table=' + currentTable + '&list_id=' + id,
                dataType:	'json',
                cache	:	false
            });
            $(this_tr).remove();
            $('<tr><td></td><td></td><td></td><td></td><td style="display:none"></td><td  style="display:none"></td></tr>').appendTo('#sevice_table_div table tbody');
            console.log($('#sevice_table_div table'));
            $('#sevice_table_div table tbody').find('tr').each(function(i){
                console.log($(this));
                if($(this).find('td').eq(0).text()=="")
                {
                    return false;
                }else{
                    $(this).find('td').eq(0).text(i);
                }
            });
            $("#sevice_table_div table tbody").find('tr').filter( ':odd').css("background-color","lightgrey");
            $("#sevice_table_div table tbody").find('tr').filter( ':even').css("background-color","white");
        } else if ($('#personal_menu').prop('checked') == true) {
            //if (confirm("Удалить сотрудника "+$(this_tr).find('td').eq(2).text()+"?")) {
                id = $(this_tr).find('td').eq(0).text();
                currentTable = "masters";
                $.ajax({
                    type 	:	'POST',
                    url		:	'delete_list',
                    data    :   'table=' + currentTable + '&list_id=' + id,
                    dataType:	'json',
                    cache	:	false
                });
                $(this_tr).remove();
                $('<tr><td></td><td><img src="" class="mater_photo_td" style="display: none"></td><td></td><td></td><td></td><td style="display:none"></td></tr>').appendTo('#client_table_div table tbody');
                console.log($('#client_table_div table tbody').find('tr').length);
                $('#post_table_div table tbody').find('tr').each(function(i){
                    console.log($(this));
                    if($(this).find('td').eq(0).text()=="")
                    {
                        return false;
                    }else{
                        $(this).find('td').eq(0).text(i);
                    }
                });
                $("#post_table_div table tbody").find('tr').filter( ':odd').css("background-color","lightgrey");
                $("#post_table_div table tbody").find('tr').filter( ':even').css("background-color","white");
            //} else {
            //    alert("Oтмена")
            //}
        } else if ($('#client_menu').prop('checked') == true) {
            //if (confirm("Удалить клиента "+$(this_tr).find('td').eq(1).text()+"?"))
            //{
                id = $(this_tr).find('td').eq(0).text();
                currentTable = "clients";

                $.ajax({
                    type 	:	'POST',
                    url		:	'delete_list',
                    data    :   'table=' + currentTable + '&list_id=' + id,
                    dataType:	'json',
                    cache	:	false
                });
                $(this_tr).remove();
                $('<tr><td></td><td></td><td></td><td></td><td></td></tr>').appendTo('#client_table_div table tbody');
                console.log($('#client_table_div table tbody').find('tr').length);
                $('#client_table_div table tbody').find('tr').each(function(i){
                    console.log($(this));
                    if($(this).find('td').eq(0).text()=="")
                    {
                        return false;
                    }else{
                        $(this).find('td').eq(0).text(i);
                    }
                });
                $("#client_table_div table tbody").find('tr').filter( ':odd').css("background-color","lightgrey");
                $("#client_table_div table tbody").find('tr').filter( ':even').css("background-color","white");
            //}else {
            //    alert("Oтмена")
            //}
        }
    }
}
$('#personal_menu').on("click", function() {
    var serviceTr = $('#sevice_table_div table tbody tr');
    var insert = $('#master_serv_to_add');

    for (var i = 0; serviceTr[i]; i++) {
        var serviceName = serviceTr[i].getElementsByTagName('td')[1].innerText;

        if (serviceName) {
            var input = $('<input type="radio" name="service_master" id="' + serviceName + '">');
            var label = $('<label for="' + serviceName + '">' + serviceName + '</label><br>');
            input.appendTo(insert);
            label.appendTo(insert);
        }
    }
});
$('#master1').on("click", function() {
    var master = $('#master_serv_to_add input:checked');
    master = master.attr('id');
    var masterID = master + "Add";
    var insert = $('#master_serv_add');
    var input = $('<input type="radio" name="service_master_add" id="' + masterID + '">');
    var label = $('<label for="' + masterID + '">' + master + '</label><br>');

    input.appendTo(insert);
    label.appendTo(insert);
});
$('#master2').on("click", function() {
    var master = $('#master_serv_add input:checked');
    var masterIdlabel = master.attr('id');
    var label = $('#master_serv_add label');
    master.remove();

    for (var i = 0; label[i]; i++) {
        var forLabel = label[i].getAttribute('for');

        if (forLabel == masterIdlabel) {
            label[i].remove();
            break ;
        }
    }
});
$('#edit_list').on("click", function() {
    var date = $('#date_l').val();
    var section = $('#section_list_sel').val();
    var service_visits = $('#service_visits').val();
    var time = $('#sel_time').val();
    var master_timetable = $('#sel_master').val();
    var price = $('#price_input').val();
    var duration = $('#duration_input').val();
    var phone_numb = $('#tel_input').val();
    var client_name = $('#name_input').val();
    var extra = $('#additionaly_input').val();
    var discount = $('#discount_input').val();
    var discount_type = $('#ps_or_cur').val();
    var discription = $('#note_txtarea').val();
    var all = $('#total_input').val();

    $.ajax({
        type        :   'POST',
        url         :   'edit_timetable',
        data        :   "date=" + date + "&time=" + time + "&section=" + section + "&master_timetable=" + master_timetable + "&service_visits=" + service_visits + "&price=" + price + "&duration=" + duration + "&phone_numb=" + phone_numb + "&client_name=" + client_name + "&extra=" + extra + "&discount_type=" + discount_type + "&discount=" + discount + "&discription=" + discription + "&all=" + all,
        dataType    :   'json',
        cache       :   false,
        success     :   function (result) {
            console.log(result);
        }
    });
    //location.reload();
});
$('#cancel_list').on("click",function(){
    $('#new_list').css("display","none");
    $('#list_fields_input').val("");
    $('#list_div').css("display","block");
    $('#save_list').css("display","block");
    $('#edit_list').css("display","none");
    $('#date_l').attr("disabled", false);
    $('#section_list_sel').attr("disabled", false);
    $('#service_visits').attr("disabled", false);
    $('#sel_time').attr("disabled", false);
    $('#sel_master').attr("disabled", false);
    $('#price_input').attr("disabled", false);
    $('#duration_input').attr("disabled", false);
    $('#tel_input').attr("disabled", false);
    $('#name_input').attr("disabled", false);
    $('#additionaly_input').attr("disabled", false);
    $('#discount_input').attr("disabled", false);
    $('#ps_or_cur').attr("disabled", false);
    $('#note_txtarea').attr("disabled", false);
    $('#total_input').attr("disabled", false);
    $('#date_l').val($('#date_input').val());
    $('#section_list_sel').val("Все").attr("selected", true);
    $('#service_visits').val("Все").attr("selected", true);
    $('#sel_time').val("08:00").attr("selected", true);
    $('#sel_master').val("Все").attr("selected", true);
    $('#price_input').val("");
    $('#duration_input').val("");
    $('#tel_input').val("+38");
    $('#name_input').val("");
    $('#additionaly_input').val("");
    $('#discount_input').val("");
    $('#ps_or_cur').val("%").attr("selected", true);
    $('#note_txtarea').val("");
    $('#total_input').val("");
});
$('#cancel_section').on("click",function() {
    $('#section_input').val("");
    $('#add_new_section_div').css("display","none");
});
$('#close_new_section_simb').on("click",function() {
    $('#section_input').val("");
    $('#add_new_section_div').css("display","none");
});
$('#save_section').on("click",function() {
    if ($('#section_input').val() !="" && $('#section_input').val() != " ") {
        //var option = $('<option></option>').text($('#section_input').val());
        //var option2 = $('<option></option>').text($('#section_input').val());
        //
        //option.appendTo("#select_section2");
        //option2.appendTo('#select_section_new');
        location.reload();
        $('#section_input').val("");
        $('#add_new_section_div').css("display","none");
    }
});
$('#save_list').on('click',function() {
    location.reload();
    //$('#list_div').css("display","block");
    //$('#new_list').css("display","none");
    //$('#list_fields_input').val("");
    //table_oncontext_menu=false;
});
$('#add_to_service_but').on("click",function() {
    $('#new_service').css("display","block");
    $('#new_service textarea').val("");
    $('#editing_service').css("display","none");
    $('#select_section_new').val("Все");
    $('#save_serv').attr("disabled", true);
});
$('#cancel_client').on('click',function() {
    $('#new_client').css("display","none");
    $('#new_client input').attr("disabled", false);
    $('#select_section_new').attr("disabled", false);
    $("#save_client").css("display", "block");
    $('.new_client_input').val('');
    $('.new_client_input').eq(1).val('+38');
    $('#edit_client').css("display","none");
    $('#client_description').val("");
    for(var i=0; i<new_client_form.length-2; i++)
    {
        new_client_form[i]=false;
    }
    new_client_form[3]=true;
    $('.new_client_input_radio').prop("checked",false);
    $('#client_description').removeAttr("disabled");
    table_oncontext_menu = false;
});
$('#add_client_to_list_but').on("click",function() {
    $('#new_client').css("display","block");
    $('#edit_client').css("display","none");
    $('#save_client').attr("disabled", true);


});
//функция удаления должности
$('#del_post').on("click",function(){
   if($('#select_post').val()!="Все")
   {
       console.log($('#select_post').val());
       $('#post_select').val($('#select_post').val());
       $('#post_select option:selected').remove();
       $('#post_select').val("Все");
       $('#select_post option:selected').remove();
       $('#select_post').val("Все");
   }
});
//функция удаления раздела
$('#del_section').on("click",function(){
    if($('#select_section2').val()!="Все")
    {
        console.log($('#select_section2').val());
        $('#section_list_sel').val($('#select_section2').val());
        $('#select_section_new').val($('#select_section2').val());
        $('#select_section_new option:selected').remove();
        $('#select_section_new').val("Все");
        $('#section_list_sel option:selected').remove();
        $('#section_list_sel').val("Все");
        $('#select_section2 option:selected').remove();
        $('#select_section2').val("Все");
    }
});