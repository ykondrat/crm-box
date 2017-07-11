<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>crm-box</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
</head>
<body onload="digitalWatch()">
<?php
    $session = Session::getInstance();
    if (isset($session->logged_user)) : ?>
    <div class="container-fluid">
        <div class="col-md-2" id="side_block">
            <div class="navbar navbar-default" id="menu_field" style="padding: 0px; border: none">
                <div class="tabs">
                    <input id="list_menu" type="radio" name="tabs" checked>
                    <label for="list_menu" title="Timetable">Timetable</label>
                    <input id="service_menu" type="radio" name="tabs">
                    <label for="service_menu" title="Services">Services</label>
                    <input id="personal_menu" type="radio" name="tabs">
                    <label for="personal_menu" title="Staff">Staff</label>
                    <input id="client_menu" type="radio" name="tabs">
                    <label for="client_menu" title="Clients">Clients</label>
                </div>
            </div>
        </div>
        <div id="header" class="col-md-10 col-xs-12" >
            <div id="time" class="col-md-1 col-xs-12">
                <p class="col-md-1 col-xs-3" id="digital_watch"></p>
            </div>
            <div id="log_out_div">
                <p>Logout</p>
            </div>
        </div>
<?php
    endif;
    if (empty($session->logged_user)) :?>
    <header>
        <p id="header_name_p">CRM Box</p>
        <p id="digital_watch"></p>
    </header>
    <div class="form_login">
<?php
    endif;?>