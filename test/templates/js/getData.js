/**
 * Created by ykondrat on 6/3/17.
 */

// НЕ ТРОГАТЬ УБ'Ю Yevhen Kondratyev

$(document).ready(function(){
    $.ajax({
        type 	:	'POST',
        url		:	'take_section',
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            for (var i = 0; result[i]; i++) {
                var option = $('<option>' + result[i] + '</option>');
                var optionNew = $('<option>' + result[i] + '</option>');
                var optionList = $('<option>' + result[i] + '</option>');

                option.appendTo($('#select_section2'));
                optionNew.appendTo($('#select_section_new'));
                optionList.appendTo($('#section_list_sel'));
            }
        }
    });
    $.ajax({
        type 	:	'POST',
        url		:	'take_service_from_section',
        data	:	{
            'section_service':'all'
        },
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            for (var i = 0; result[i]; i++) {
                var option = $('<option>' + result[i] + '</option>');

                option.appendTo($('#service_visits'));
            }
        }
    });
    $('#section_list_sel').on("change", function () {
        //$("#service_visits option").remove();
        console.log(this_td);
        $('<option>' + 'Все' + '</option>').appendTo($('#service_visits'));
        var select = $('#section_list_sel').val();
        if (select == 'Все') {
            select = 'all';
        }
        $.ajax({
            type 	:	'POST',
            url		:	'take_service_from_section',
            data	:	{
                            'section_service':select
                        },
            dataType:	'json',
            cache	:	false,
            success :	function (result) {
                for (var i = 0; result[i]; i++) {
                    var option = $('<option >' + result[i] + '</option>');

                    option.appendTo($('#service_visits'));
                }
            }
        });
    });
    $('#service_visits').on("change", function () {
        var select = $('#service_visits').val();

        if (select == 'Все') {
            $('#price_input').val('');
            $('#duration_input').val('');
            $.ajax({
                type    :   'POST',
                url     :   'take_master_to_service',
                data    :   {
                    'service_master': select
                },
                dataType: 'json',
                cache: false,
                success: function (result) {
                    $('#sel_master option').remove();
                    console.log(result);
                    for (var i = 0; result[i]; i++) {
                        var option = $('<option>' + result[i] + '</option>');
                        option.appendTo($('#sel_master'));
                    }
                }
            });
        } else {
            $.ajax({
                type    :   'POST',
                url     :   'take_price_duration',
                data    :   {
                                'service': select
                            },
                dataType: 'json',
                cache: false,
                success: function (result) {
                    var tmp = result[0].split("|^|");
                    var price = tmp[0];
                    var duration = tmp[1];

                    $('#price_input').val(price);
                    $('#duration_input').val(duration);
                    $('#total_input').val(price);
                }
            });
            $.ajax({
                type    :   'POST',
                url     :   'take_master_to_service',
                data    :   {
                    'service_master': select
                },
                dataType: 'json',
                cache: false,
                success: function (result) {
                    $('#sel_master option').remove();
                    for (var i = 0; result[i]; i++) {
                        var option = $('<option>' + result[i] + '</option>');

                        option.appendTo($('#sel_master'));
                    }
                }
            });
        }
        calcTotal();
    });
    $.ajax({
        type 	:	'POST',
        url		:	'take_service',
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            var service_table = $('#sevice_table_div table tbody');
            var raw = 100 - result.length;

            for (var i = 0; result[i]; i++) {
                var tmp = result[i].split("|^|");
                var tr = $('<tr onclick="openService($(this))" oncontextmenu="defTr($(this))"></tr>');

                $('<td>' + tmp[3] + '</td><td>' + tmp[0] +'</td><td>' + tmp[1] + '</td><td>' + tmp[2] + '</td><td style="display:none">' + tmp[4] + '</td><td style="display:none">' + tmp[5] + '</td>').appendTo(tr);
                tr.appendTo(service_table);
            }

            for (var y = 0; y < raw; y++) {
                //console.log(y);
                var trEmpty = $('<tr onclick="openService($(this))" oncontextmenu="defTr($(this))"></tr>');

                $('<td></td><td></td><td></td><td></td><td style="display:none"></td><td style="display:none"></td>').appendTo(trEmpty);
                trEmpty.appendTo(service_table);
            }
            console.log(service_table);
            $(service_table).find('tr').filter( ':odd').css("background-color","lightgrey");
        }
    });
    $.ajax({
        type 	:	'POST',
        url		:	'take_post',
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            for (var i = 0; result[i]; i++) {
                var option = $('<option>' + result[i] + '</option>');
                var optionNew = $('<option>' + result[i] + '</option>');

                option.appendTo($('#select_post'));
                optionNew.appendTo($('#post_select'));
            }
        }
    });
    $.ajax({
        type 	:	'POST',
        url		:	'take_personel',
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            var personal_table = $('#post_table_div table tbody');
            var raw = 100 - result.length;

            for (var i = 0; result[i]; i++) {
                var tmp = result[i].split("|^|");
                var tr = $('<tr onclick="openPersonal($(this))" oncontextmenu="defTr($(this))"></tr>');

                $('<td>' + tmp[0] + '</td><td><img src="' + tmp[1] +'" alt="worker_photo" class="mater_photo_td"></td><td>' + tmp[2] + '</td><td>' + tmp[3] + '</td><td>' + tmp[4] + '</td><td style="display:none">' + tmp[5] + '</td><td style="display:none">' + tmp[6] + '</td>').appendTo(tr);
                tr.appendTo(personal_table);
            }

            for (var y = 0; y < raw; y++) {
                var trEmpty = $('<tr onclick="openPersonal($(this))" oncontextmenu="defTr($(this))"></tr>');

                $('<td></td><td><img src="" class="mater_photo_td" style="display: none"></td><td></td><td></td><td></td><td style="display:none"></td><td style="display:none"></td>').appendTo(trEmpty);
                trEmpty.appendTo(personal_table);
            }

            $(personal_table).find('tr').filter( ':odd').css("background-color","lightgrey");
        }
    });
    $.ajax({
        type 	:	'POST',
        url		:	'take_clients',
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            var client_table = $('#client_table_div table tbody');
            var raw = 100 - result.length;

            for (var i = 0; result[i]; i++) {
                var tmp = result[i].split("|^|");

                var tr = $('<tr onclick="openClient($(this))" oncontextmenu="defTr($(this))"></tr>');
                var telephone = tmp[2].slice(1);
                telephone = "+" + telephone;
                var sex=tmp[4];
                var description=tmp[3];
                //console.log(tmp);
                $('<td>' + tmp[0] + '</td><td>' + tmp[1] + '</td><td>' + telephone + '</td><td></td><td style="display:none">' + sex +'</td><td style="display:none">' + description + '</td>').appendTo(tr);
                tr.appendTo(client_table);
            }

            for (var y = 0; y < raw; y++) {
                var trEmpty = $('<tr onclick="openClient($(this))" oncontextmenu="defTr($(this))"></tr>');

                $('<td></td><td></td><td></td><td></td><td style="display:none"></td><td style="display:none"></td>').appendTo(trEmpty);
                trEmpty.appendTo(client_table);
            }
            //console.log(client_table);
            $(client_table).find('tr').filter( ':odd').css("background-color","lightgrey");
        }
    });
    $.ajax({
        type 	:	'POST',
        url		:	'take_master_for_list',
        dataType:	'json',
        cache	:	false,
        success :	function (result) {
            for (var i = 0; result[i]; i++) {
                var option = $('<option>' + result[i] + '</option>');
                var master = $('<th>' + result[i] + '</th>');
                var td = $('<td class="t" oncontextmenu="defTd($(this))" onclick="openModalListTable($(this))"></td>');

                master.appendTo($('#list_table table thead tr'));
                td.appendTo($('#list_table table tbody tr'));
                option.appendTo($('#sel_master'));
            }
        }
    });
    $('#date_input').on("change", function () {
        var date_input_sort = $('#date_input').val();

        if (date_input_sort) {
            getListFromDB(date_input_sort);
        }
    });
    getCurrentDateForList();
    var dateList = $('#date_input').val();

    if (dateList) {
        console.log("getListFromDB="+dateList);
        getListFromDB(dateList);
    }
});

function getListFromDB(date_input_sort) {
    $.ajax({
        type        :   'POST',
        url         :   'take_service_list',
        data        :   {'date_input' : date_input_sort},
        dataType    :   'json',
        cache       :   false,
        success     :   function (result) {
            //console.log("result.length = "+result.length);
            //console.log(result);
            var result_index=0;//номер нужного индекса из бд
            var find_td_master = $("#list_table table thead tr:eq(0) th:not(:first)");
            $("#list_table table tbody tr td p").remove();
            for(var i=0; i<result.length; i++) {
                //var tmp = result[i].split("|^|");
                //console.log(tmp);
                //var visit_master_list = tmp[3];
                if (result[i]) {
                    console.log(i);
                    for (var i = 0; result[i]; i++) {
                        var tmp = result[i].split("|^|");
                        var visit_data_list = tmp[0];
                        var visit_time_list = tmp[1];
                        var visit_section_list = tmp[2];
                        var visit_master_list = tmp[3];
                        var visit_service_list = tmp[4];
                        var visit_price_list = tmp[5];
                        var visit_duration_list = tmp[6];
                        var client_phone_list = tmp[7].slice(1);
                        client_phone_list = "+" + client_phone_list;
                        var client_name_list = tmp[8];
                        var visit_extra_list = tmp[9];
                        var visit_discount_list = tmp[10];
                        var discount_type_list = tmp[11];
                        var visit_discription_list = tmp[12];
                        var visit_total_price = tmp[13];
                        var id_visit_list = tmp[14];

                        var find_tr_time = $(".list_time_td");
                        var insert_tr_time;
                        for (var y = 0; find_tr_time[y]; y++) {
                            if (find_tr_time[y].innerText == visit_time_list) {
                                insert_tr_time = y;
                                break;
                            }
                        }
                        //console.log($("#list_table table thead tr:eq(0) th:not(:first)"));
                        //console.log(tmp);
                        //console.log(visit_master_list);
                        //console.log("find_td_master.length"+find_td_master.length);
                        var insert_td_master="";
                        for (var z = 0; z < find_td_master.length; z++) {

                            //console.log(z);
                            //console.log(find_td_master[z].innerText, visit_master_list);
                            if (find_td_master[z].innerText == visit_master_list) {
                                insert_td_master = z + 2;
                                break;
                            }
                        }
                        console.log("insert_tr_time = " + insert_tr_time, "insert_td_master = " + insert_td_master + ' visit_master_list = ' + visit_master_list, " find_td_master = ", find_td_master);
                        var toInsertTd = $('#list_table table tbody tr:nth-child(' + insert_tr_time + ') td:nth-child(' + insert_td_master + ')');
                        var p = $('<p style="display: none">' + visit_data_list + '</p>' +
                            '<p style="display: none">' + visit_time_list + '</p>' +
                            '<p style="display: none">' + visit_section_list + '</p>' +
                            '<p style="display: none">' + visit_master_list + '</p>' +
                            '<p style="display: none">' + visit_service_list + '</p>' +
                            '<p style="display: none">' + visit_price_list + '</p>' +
                            '<p style="display: none">' + visit_duration_list + '</p>' +
                            '<p style="display: none">' + client_phone_list + '</p>' +
                            '<p style="display: none">' + client_name_list + '</p>' +
                            '<p style="display: none">' + visit_extra_list + '</p>' +
                            '<p style="display: none">' + visit_discount_list + '</p>' +
                            '<p style="display: none">' + discount_type_list + '</p>' +
                            '<p style="display: none">' + visit_discription_list + '</p>' +
                            '<p style="display: none">' + visit_total_price + '</p>' +
                            '<p style="display: none">' + id_visit_list + '</p>' +
                            '<p>' + visit_service_list + ' (' + visit_total_price + " грн." + ')' + '</p>' +
                            '<p>' + client_name_list + ' (' + client_phone_list + ')' + '</p>');
                        //console.log(p);
                        p.appendTo(toInsertTd);
                    }
                } else {
                    var td_to_clear = $("#list_table table tbody tr td:not(.list_time_td)");
                    for (var x = 0; td_to_clear[x]; x++) {
                        td_to_clear[x].innerHTML = "";
                    }
                }
            }
        }
    });
}

function getCurrentDateForList() {
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if(day < 10) {
        day = '0'+ day;
    }
    if(month < 10) {
        month = '0' + month;
    }

    date = year + '-' + month + '-' + day;
    $('#date_input').val(date).attr('selected', true);
}