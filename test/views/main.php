<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IVI-Salon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./images/favicon.ico" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<?php $session = Session::getInstance();?>
<?php if (isset($session->logged_user)) : ?>
<body onload="digitalWatch()">
<!--<div id="authorization">
 <!-- Контер для собственного контекстного меню. По умолчания - скрыт. -->
 <!--Edit by Kolya-->
<div id="contextMenuId" style="position:absolute; top:0; left:0; border:1px solid #dddddd; background-color:#ffffff; clor:black; display:none; float:left; z-index: 10">
    <li class="table_menu"><span onclick="openAddList()">Редактировать</span></li>
    <li class='table_menu'><span onclick="delAddList()">Удалить</span></li>
</div>
<!---->
<div id="contextForDel" style="position:absolute; top:0; left:0; border:1px solid #dddddd; background-color:#ffffff; clor:black; display:none; float:left; z-index: 10">
    <li class='table_menu'><span onclick="delAddList()">Удалить</span></li>
</div>
<div class="container-fluid">
    <div class="raw"></div>
    <div class="col-md-2" id="side_block">
        <div id="login_but_div">
            <img src="./images/icon1.png" id="user_img">
            <p>Login</p>

        </div>
        <div class="navbar navbar-default" id="menu_field" style="padding: 0px; border: none">
                <div class="tabs">
                    <input id="list_menu" type="radio" name="tabs" checked>
                    <label for="list_menu" title="Расписание">Расписание</label>
                    <input id="service_menu" type="radio" name="tabs">
                    <label for="service_menu" title="Услуги">Услуги</label>
                    <input id="personal_menu" type="radio" name="tabs">
                    <label for="personal_menu" title="Персонал">Персонал</label>
                    <input id="client_menu" type="radio" name="tabs">
                    <label for="client_menu" title="Клиенты">Клиенты</label>
                    <input id="statistic_menu" type="radio" name="tabs">
                    <label for="statistic_menu" title="Статистика">Статистика</label>
                </div>
        </div>
    </div>
    <div id="header" class="col-md-10 col-xs-12" >
        <img src="./images/ButterflyHeader.png" id="logo_img">
        <div id="time" class="col-md-1 col-xs-12">
            <p class="col-md-1 col-xs-3" id="digital_watch"></p>
        </div>
        <div id="log_out_div">
            <img id="log_out_img" src="./images/power-md.png">
            <p>Logout</p>
        </div>
    </div>
    <div id="main_menu" class="col-md-9">
        <div id="list_div"  class="divs">
            <input type="date" id="date_input" class="col-md-6 col-xs-6 input_event form-control">
            <div id="list_table"  oncontextmenu="return menu(1, event);">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="list_time_td">Время</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="list_time_td">08:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">09:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">10:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">11:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">12:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">13:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">14:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">15:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">16:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">17:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">18:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">19:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">20:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">21:00</td>
                        </tr>
                        <tr>
                            <td class="list_time_td">22:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <input type="button" class="btn" id="add_to_list_but" value="Добавить">
        </div>
        <div id="new_list" class="col-md-12 col-xs-12  divs">
            <div id="functional_field" class="col-md-10 col-xs-10">
                <div class="row" id="raw1">
                    <input type="text" id="date_l_text" readonly value="Дата" class="type_field1 fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="date" id="date_l" class="list_fields_input col-md-2 col-xs-2 form-control">
                    <input id="sel_time_text" type="text" readonly value="Время" class="type_field1 fields_for_read_only col-md-2 col-xs-2 form-control">
                    <select id="sel_time" class="type_select list_fields_select col-md-2 col-xs-2 form-control">
                        <option>08:00</option>
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                    </select>
                </div>
                <div class="row" id="raw2">
                    <input type="text" readonly value="Раздел" class="type_field1 fields_for_read_only col-md-2 col-xs-2 form-control">
                    <select id="section_list_sel" class="list_fields_select col-md-2 col-xs-2 form-control">
                        <option>Все</option>
                    </select>
                    <input type="text" readonly value="Мастер" class="type_field1 fields_for_read_only col-md-2 col-xs-2 form-control">
                    <select id="sel_master" class="list_fields_select col-md-2 col-xs-2 form-control">
                        <option selected>Все</option>
                    </select>
                </div>
                <div class="row" id="raw3">
                    <input type="text" readonly value="Услуга" class="type_field1 fields_for_read_only col-md-2 col-xs-2 form-control">
                    <select id="service_visits" style="width: 60%" class="list_fields_select col-md-2 col-xs-2 form-control">
                        <option>Все</option>
                    </select>
                </div>
                <div class="row" id="raw4">
                    <input type="text" id="price_text" readonly value="Цена" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="text" id="price_input" class="list_fields_input col-md-2 col-xs-2 form-control">
                    <input type="text" id="currency_text" readonly value="грн" class="col-md-1 col-xs-1 form-control">
                    <input type="text" id="duration_text" readonly value="Длительность" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="text" id="duration_input" class="list_fields_input col-md-2 col-xs-2 form-control">
                    <input type="text" id="min_text" readonly value="мин" class="fields_for_read_only col-md-1 col-xs-1 form-control">
                </div>
                <div class="row" id="raw5">
                    <input type="text" id="tel_text" readonly value="Телефон" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="tel" maxlength="13" id="tel_input" value="+38" class="list_fields_input col-md-2 col-xs-2 form-control">
                    <input type="text" id="name_text" readonly value="Имя" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="text" id="name_input" class="list_fields_input col-md-2 col-xs-2 form-control">
                </div>
                <div class="row" id="raw6">
                    <input type="text" id="additionaly_text" readonly value="Дополнительно" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="text" id="additionaly_input" class="list_fields_input col-md-2 col-xs-2 form-control">
                    <input type="text" id="currency_text2" readonly value="грн" class="col-md-1 col-xs-1 form-control">
                    <input type="text" id="discount_text" readonly value="Скидка" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="text" id="discount_input" class="list_fields_input col-md-2 col-xs-2 form-control">
                    <select id="ps_or_cur" class="list_fields_input_select col-md-1 col-xs-1 form-control">
                        <option>%</option>
                        <option>грн</option>
                    </select>
                </div>
                <div class="row" id="raw7">
                    <input type="text" id="note_text" readonly value="Примечание" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <textarea id="note_txtarea" style=" resize: none;" maxlength = '1000' class="list_fields_input form-control col-md-2 col-xs-2"></textarea>
                </div>
                <div class="row" id="raw8">
                    <input type="text" id="total_text" readonly value="Итого" class="fields_for_read_only col-md-2 col-xs-2 form-control">
                    <input type="text" id="total_input" readonly class="list_fields_input col-md-2 col-xs-2 form-control">
                    <input type="text" id="currency_text3" readonly value="грн" class="fields_for_read_only col-md-1 col-xs-1 form-control">
                </div>
            </div>
            <div class="row">
                <input type="button" class="btn col-md-2 col-xs-2" value="Сохранить" id="save_list" disabled>
                <input type="button" class="btn col-md-2 col-xs-2" value="Редактировать" id="edit_list" disabled>
                <input type="button" class="btn col-md-2 col-xs-2" value="Отменить" id="cancel_list">
            </div>
<!--            <div class="row">-->
<!--                <input type="button" class="btn col-md-2 col-xs-2" style="position:relative; background-color: orange; color: white" value="Закрыть" id="back_list">-->
<!--            </div>-->
        </div>
        <div id="service" class="divs" style="display: none" >
            <div id="add_new_section_div" class="divs" style="display: none">
                <div class="container-fluid" style="background-color: black; margin:0; position:relative; height: 20%; width: 100%">
                    <img class="butterfly_img" style="height: 100%;width: 12%;" src="./images/Butterfly.png">
                    <span>IVI-Salon</span><span id="close_new_section_simb">&#215</span>
                </div>
                <div style="margin-top:3%">
                    <p>Новый раздел:</p>
                    <input id="section_input" class="col-md-12 col-xs-12 form-control">
                    <div id="add_new_section_btns" class="row">
                        <input type="button" class="col-md-3 col-xs-3 btn" value="Сохранить" id="save_section" disabled>
                        <input type="button" class="col-md-3 col-xs-3 btn" value="Отменить" id="cancel_section">
                    </div>
                </div>
            </div>
            <div class="row col-md-12 col-xs-12">
                <select oncontextmenu="return menu2(1, event);" id="select_section2"  class="col-md-2 form-control">
                    <option>Все</option>
                </select>
                <label for="select_section2"><b>Раздел:</b></label>
                <input type="button" value="Удалить раздел" id="del_section" class="btn">
                <input type="button" value="Создать раздел" id="new_section" class="btn">
            </div>
            <div class="row col-md-12 col-xs-12">
                <div id="sevice_table_div" >
                    <table class="table table-bordered" oncontextmenu="return menu(1, event);">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название услуги</th>
                            <th>Стоимость</th>
                            <th>Длительность</th>
                            <th style="display:none">Раздел</th>
                            <th style="display:none">Описание</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <input type="button" class="btn" id="add_to_service_but" value="Добавить">
            <div id="new_service">
                <div class="container-fluid" style="background-color: black; margin:0; height: 40%; width: 100%">
                   <img class="butterfly_img" src="./images/Butterfly.png">
                   <span>Редактирование услуги</span><span id="close_serv_simb">&#215</span>
                </div>
                <div class="col-md-12 col-xs-12" id="new_service_header_div">
                    <p>Новая услуга</p>
                </div>
                <div class="col-md-12 col-xs-12" id="new_service_div2">
                    <div class="row">
                        <label class="new_service_label col-md-2 col-xs-2" for="select_section_new">Раздел:</label><br>
                        <select id="select_section_new" class="new_service_fields col-md-2 col-xs-1 form-control">
                            <option>Все</option>
                        </select>
                    </div>
                    <div class="row">
                        <label class="new_service_label col-md-2 col-xs-2">Название услуги:</label>
                        <input id="service_name" class="new_service_fields col-md-2 col-xs-1 form-control">
                    </div>
                    <div class="row">
                        <label class="new_service_label col-md-2 col-xs-2">Цена:</label>
                        <input id="service_price" class="new_service_fields col-md-2 col-xs-1 form-control">
                        <label style="float:right; margin-right:12%" class="col-md-1 col-xs-1">грн</label>
                    </div>
                    <div class="row">
                        <label class="new_service_label col-md-2 col-xs-2">Длительность:</label>
                        <input id="service_time" class="new_service_fields col-md-2 col-xs-1 form-control">
                        <label style="float:right; margin-right:12%" class="col-md-1 col-xs-1">мин</label>
                    </div>
                    <div class="row">
                        <label class="new_service_label col-md-2 col-xs-2">Описание:</label>
                        <textarea style="text-align: left;" id="service_description" class="new_service_fields col-md-2 col-xs-1 form-control"></textarea>
                    </div>
                </div>
                <div id="new_service_btns" class="row">
                    <input type="button" class="col-md-4 col-xs-4 btn" value="Сохранить" id="save_serv">
                    <input type="button" class="col-md-4 col-xs-4 btn" value="Редактировать" id="editing_service">
                    <input type="button" class="col-md-4 col-xs-4 btn" value="Отменить" id="cancel_serv">
                </div>
            </div>
        </div>
        <div id="personals_div" class="divs" style="display: none" oncontextmenu="return menu(1, event);">
            <div class="row">
                <label for="select_post" class="col-md-2 col-xs-2"><b>Должность:</b></label>
                <select id="select_post"  class="col-md-2 col-xs-2 form-control">
                    <option>Все</option>
                </select>
                <input type="button" value="Создать должность" id="new_post" class="btn">
                <input type="button" value="Удалить должность" id="del_post" class="btn">
                <div id="post_table_div">
                    <table class="table table-bordered" oncontextmenu="return menu(1, event);">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Фото</th>
                            <th>Имя Фамилия</th>
                            <th>Должность</th>
                            <th>Телефон</th>
                            <th style="display:none">Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <input type="button" class="btn" id="add_pers_but" value="Добавить">
            <div id="new_worker" class="divs">
                <div class="container-fluid" style="background-color: black; margin:0; height: 40%; width: 100%">
                    <img class="butterfly_img" src="./images/Butterfly.png"></img>
                    <span>Редактирование персонала</span><span id="close_worker_simb">&#215</span>
                </div>
                <div class="col-md-12 col-xs-12" id="new_worker_header_div">
                    <p style="margin-top: 3%"><b>Новый сотрудник</b></p>
                </div>
                <div class="row">
                    <label class="col-md-2 col-xs-2">Имя, Фамилия:</label>
                    <input id="name_secname" type="text" class="new_worker_input col-md-2 col-xs-1 form-control">
                </div>
                <div class="row">
                    <label class="col-md-2 col-xs-2">Должность:</label>
                    <select id="post_select" class="new_worker_input col-md-2 col-xs-1 form-control">
                        <option>Все</option>
                    </select>
                </div>

                <div class="row">
                    <label class="col-md-2 col-xs-2">Телефон:</label>
                    <input id="telephon_number" maxlength="13" type="text" value="+38" class="new_worker_input col-md-2 col-xs-1 form-control">
                </div>
                <div class="row">
                    <label class="col-md-2 col-xs-2">Email:</label>
                    <input type="email" id="pers_email" class="new_worker_input col-md-2 col-xs-1 form-control">
                </div>
                <img class="preview" id="master_photo" src="" height="100" width="100" alt="Image preview...">
                <label for="download_photo" name="file" href="#" class=" col-md-1 col-xs-1" style="color:#1185C1; position: relative; float: left;">Загрузить фото</label>
                <input type="file" style="opacity: 0;" onchange="previewFile()" accept="image/jpeg,image/png,image/gif" id="download_photo">
                <div class="ajax-respond"></div>

                <label class="col-md-12 col-xs-12">Услуги выполняемые мастером</label>
                <div class="row col-md-12 col-xs-12">
                    <div class="col-md-2 col-xs-2 master_divs" style="left: 3%" id="master_serv_to_add">
                    </div>
                    <div class="col-md-1 col-xs-1" style="left: 5%" id="add_delete_master">
                         <input type="button" style="width: 80%; background-color:  lime;" id="master1" value=">"class="btn master_btn">
                         <input type="button" style="width: 80%; background-color: red; margin-top:120%;" id="master2" value="<" class="btn master_btn">
                    </div>
                    <div class="col-md-2 col-xs-2 master_divs" style="left: 15%" id="master_serv_add">
                    </div>
                </div>
                <div class="row" style="padding-bottom: 3%">
                    <input type="button" value="Сохранить" id="add_new_worker" class="btn new_worker_btn">
                    <input type="button" value="Редактировать" id="edit_worker" class="btn new_worker_btn">
                    <input type="button" value="Отмена" id="cancel_new_worker" class="btn new_worker_btn">
                </div>
            </div>
        </div>
        <div id="new_personals_div" class="divs" style="display: none">
            <div class="container-fluid" style="background-color: black; margin:0; position:relative; height: 40%; width: 100%">
                <img class="butterfly_img" src="./images/Butterfly.png">
                <span>IVI-Salon</span><span id="close_new_post_simb">&#215</span>
            </div>
            <div style="margin-top:3%">
                <label>Новая должность:</label>
                <input id="new_post_personal_input" class="form-control">
                <div id="new_post_btns" class="row">
                    <input type="button" class="col-md-3 col-xs-3 btn" disabled style="background-color: aqua; color: white" value="Сохранить" id="save_post">
                    <input type="button" class="col-md-3 col-xs-3 btn" style="background-color: orange; color: white" value="Отменить" id="cancel_post">
                </div>
            </div>
        </div>
        <div id="clients_div" class="divs" style="display: none">
            <div class="row">
                <label for="seach_field_tel" class="col-md-3 col-xs-3"><b>Поиск по номеру телефона:</b></label>
                <input id="seach_field_tel" maxlength="13" value="+38" class="form-control col-md-5 col-xs-5">
<!--                <div class="col-md-1 col-xs-1" id="search_but">-->
<!--                    <img class="col-md-1 col-xs-1" src="./images/w256h2561380453921Search256x25632.png">-->
<!--                </div>-->
                <select id="select_sex" class="co3-md-3 col-xs-3 form-control">
                    <option>Все</option>
                    <option>Женщины</option>
                    <option>Мужчины</option>
                </select>
            </div>
            <div id="client_table_div" oncontextmenu="return menu(1, event);">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Кол-во посещений</th>
                        <th style="display:none">Пол</th>
                        <th style="display:none">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div id="new_client" style="display: none;" >
                <div class="container-fluid" style="background-color: black; margin:0; height: 40%; width: 100%">
                    <img class="butterfly_img" src="./images/Butterfly.png">
                    <span>Редактирование клиента</span><span id="close_client_simb">&#215</span>
                </div>
                <div class="col-md-12 col-xs-12" id="new_client_header_div">
                    <p style="margin-top: 3%"><b>Новый Клиент</b></p>
                </div>
                <div class="row">
                    <label class="new_client_label col-md-2 col-xs-4">Имя:</label>
                    <input id="client_name" type="text" class="new_client_input new_client_only_input col-md-2 col-xs-1 form-control">
                </div>
                <div class="row">
                    <label class="new_client_label col-md-2 col-xs-4">Телефон:</label>
                    <input id="phone_nb" maxlength="13" type="text" value="+38" class="new_client_input new_client_only_input col-md-2 col-xs-1 form-control">
                </div>
                <div class="row" id="row3">
                    <label class="new_client_label col-md-2 col-xs-4">Пол:</label>
                    <input class="new_client_input_radio" name="sex" type="radio"  id="women">
                    <label for="women" class="new_client_sex_label">Женский</label>
                    <input class="new_client_input_radio" name="sex" type="radio"  id="men">
                    <label for="men" class="new_client_sex_label">Мужской</label>
                </div>
                <div class="row">
                    <label class="new_client_label col-md-2 col-xs-4">Примечание:</label>
                    <textarea id="client_description" class="new_client_input col-md-2 col-xs-2 form-control"></textarea>
                </div>
                <div id="new_client_btns" class="row" style="padding-bottom: 3%">
                    <input type="button" class="col-md-3 col-xs-3 btn"  disabled  value="Сохранить" id="save_client">
                    <input type="button" class="col-md-3 col-xs-3 btn" value="Редактировать" id="edit_client">
                    <input type="button" class="col-md-3 col-xs-3 btn" value="Отменить" id="cancel_client">
                </div>
            </div>
            <input type="button" class="btn" id="add_client_to_list_but" value="Добавить">
        </div>
        <div id="statistic_div" class="divs">
            <div class="row col-md-12 col-xs-12">
                <div id="statistic_table_div">
                    <h1>Статистика в разработки</h1>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
    <script type="text/javascript">
        function digitalWatch() {
            var date = new Date();
            var hours = date.getHours();
            var minutes = date.getMinutes();
            //var seconds = date.getSeconds();
            if (hours < 10) hours = "0" + hours;
            if (minutes < 10) minutes = "0" + minutes;
            //if (seconds < 10) seconds = "0" + seconds;
            document.getElementById("digital_watch").innerHTML = hours + ":" + minutes;// + ":" + seconds;
            setTimeout("digitalWatch()", 1000);
        }
    </script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="./templates/js/data_to_db_function.js"></script>
    <script src="./templates/js/main_script.js"></script>
    <script src="./templates/js/getData.js"></script>

    <link rel="stylesheet" href="templates/css/style.css">
<?php endif;?>
<?php if ( empty($session->logged_user) ) : ?>
    <header>
        <img src="./images/ButterflyHeader.png" id="logo_img">
    </header>
    <div class="form_login">
        <form action="autorization_login" method="post" id="login_form">
            <div id="main_login">
                <div class="input_div">
                    <input type="text" name="login" placeholder="Логин" />
                    <input type="password" name="passwd" placeholder="Пароль" /><br>
                    <div class="forgot_div">
                        <p id="forgot_passwd">Забыли пароль?</p>
                    </div>
                </div>
                <div class="button_login">
                    <button id="enter_login" type="submit" name="enter_login">Вход</button>
                    <div id="registration_login">
                        <p>Регистрация</p>
                    </div>
                </div>
            </div>
        </form>
        <form action="forgot_pass" id="forgot_passwd_form" method="POST">
            <input type="email" name="email" placeholder="Электронная почта" />
            <button id="do_forgot" type="submit" name="do_forgot">Отправить</button>
            <div class="back_but">
                <p>Назад</p>
            </div>
        </form>
        <form action="autorization_signup" onsubmit="return (formValidationSignUp())" name="SignUp" method="POST" id="registr_form">
            <input type="text" name="login" placeholder="Логин" required/>
            <input type="email" name="email" placeholder="Электронная почта" required/>
            <input type="password" name="passwd" placeholder="Пароль" required/>
            <input type="password" name="rep_passwd" placeholder="Подтверждение пароля" required/>
            <button type="submit" id="reg_account" name="do_signup">Регистрация</button>
            <div class="back_but">
                <p>Назад</p>
            </div>
        </form>
        <?php
            if ( $_SERVER['REQUEST_URI'] == "/IVI-Salon/autorization/do_change_pass/" ) { ?>
                <script>
                    var login = document.getElementById('login_form');
                    login.style.display = "none";
                    var forgot = document.getElementById('forgot_passwd_form');
                    forgot.style.display = "none";
                    var register = document.getElementById('registr_form');
                    register.style.display = "none";
                </script>
        <form action="do_change_pass" method="post">
            <input type="email" name="email" placeholder="Электронная почта">
            <input type="password" name="new_passwd" placeholder="Новый пароль">
            <input type="password" name="new_passwd1" placeholder="Подтверждение пароля">
            <button type="submit" name="do_pass_change">Сменить пароль</button>
        </form>
        <?php } ?>
    </div>
    </body>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="./templates/js/login.js"></script>
    <script src="./templates/js/errorMenegment.js"></script>
    <?php
        if ($session->error == 'error1') {
            $session->error = "";
            echo "<script>sendError('Несуществующий логин')</script>";
        }
        if ($session->error == 'error2') {
            $session->error = "";
            echo "<script>sendError('Неверный пароль')</script>";
        }
        if ($session->error == 'error3') {
            $session->error = "";
            echo "<script>sendError('Учетная запись не активна')</script>";
        }
        if ($session->error == 'error4') {
            $session->error = "";
            echo "<script>sendError('Логин или почта уже используется')</script>";
        }
        if ($session->error == 'error5') {
            $session->error = "";
            echo "<script>sendError('Даная почта не зарегистрирована')</script>";
        }
    ?>
    <link rel="stylesheet" href="./templates/css/login.css">
<?php endif; ?>

</html>