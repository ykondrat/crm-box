<?php
    require_once (ROOT.'/views/viewHeaderLogged.php');
?>
    <div id="service" class="col-md-9">
        <div id="add_new_section_div" class="divs">
            <div class="container-fluid" style="background-color: black; margin:0; position:relative; height: 20%; width: 100%">
                <span>crm-box</span><span id="close_new_section_simb">&#215</span>
            </div>
            <div style="margin-top:3%">
                <p>New section:</p>
                <input id="section_input" class="col-md-12 col-xs-12 form-control">
                <div id="add_new_section_btns" class="row">
                    <input type="button" class="col-md-3 col-xs-3 btn" value="Save" id="save_section" disabled>
                    <input type="button" class="col-md-3 col-xs-3 btn" value="Cancel" id="cancel_section">
                </div>
            </div>
        </div>
        <div class="row col-md-12 col-xs-12">
            <select id="select_section2"  class="col-md-2 form-control">
                <option>All</option>
            </select>
            <label for="select_section2"><strong>Section:</strong></label>
            <input type="button" value="New Section" id="new_section" class="btn">
        </div>
        <div class="row service_main">
            <div id="sevice_table_div" >
                <table class="table table-bordered" oncontextmenu="return menu(1, event);">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Service name</th>
                        <th>Cost</th>
                        <th>Duration</th>
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
<?php
    require_once (ROOT.'/views/viewFooter.php');
?>