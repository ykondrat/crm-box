<?php
    require_once (ROOT.'/views/viewHeaderLogged.php');
?>
    <div id="main_menu" class="col-md-9">
        <div id="list_div"  class="divs">
            <input type="date" id="date_input" class="col-md-6 col-xs-6 input_event form-control">
            <div id="list_table"  oncontextmenu="return menu(1, event);">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="list_time_td">Time</th>
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
            <input type="button" class="btn" id="add_to_list_but" value="Add">
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
                <input type="button" class="btn col-md-2 col-xs-2" value="Сохранить" id="save_list">
                <input type="button" class="btn col-md-2 col-xs-2" value="Редактировать" id="edit_list">
                <input type="button" class="btn col-md-2 col-xs-2" value="Отменить" id="cancel_list">
            </div>
            <!--            <div class="row">-->
            <!--                <input type="button" class="btn col-md-2 col-xs-2" style="position:relative; background-color: orange; color: white" value="Закрыть" id="back_list">-->
            <!--            </div>-->
        </div>
    </div>
<?php
    require_once (ROOT.'/views/viewFooter.php');
?>