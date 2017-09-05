<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>crm-box</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="icon" href="./public/images/favicon.png">
        <link rel="stylesheet" href="./public/stylesheets/style-header.css">
        <link rel="stylesheet" href="./public/stylesheets/timetable.css">
        <link rel="stylesheet" href="./public/stylesheets/service.css">
    </head>
    <body onload="digitalWatch()">
    <?php $session = Session::getInstance();?>
    <?php if (isset($session->logged_user)) : ?>
        <div id="contextMenuId" style="position:absolute; top:0; left:0; border:1px solid #dddddd; background-color:#ffffff; color:black; display:none; float:left; z-index: 10">
            <ul>
                <li class="table_menu"><span onclick="openAddList()">Edit</span></li>
                <li class='table_menu'><span onclick="delAddList()">Delete</span></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="col-md-2" id="side_block">
                <div id="login_but_div">
                    <img src="./public/images/user.png" id="user_img">
                    <p><?php echo $session->logged_user?></p>
                </div>
                <div class="navbar navbar-default" id="menu_field" style="padding: 0; border: none">
                    <div class="tabs">
                        <input id="list_menu" type="radio" name="tabs" checked>
                        <label for="list_menu" title="Timetable">Timetable <i class="fa fa-calendar" aria-hidden="true"></i></label>
                        <input id="service_menu" type="radio" name="tabs">
                        <label for="service_menu" title="Services">Services <i class="fa fa-cogs" aria-hidden="true"></i></label>
                        <input id="personal_menu" type="radio" name="tabs">
                        <label for="personal_menu" title="Staff">Staff <i class="fa fa-users" aria-hidden="true"></i></label>
                        <input id="client_menu" type="radio" name="tabs">
                        <label for="client_menu" title="Clients">Clients <i class="fa fa-address-card-o" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>
            <div id="header" class="col-md-10 col-xs-12" >
                <img src="./public/images/favicon.png" id="logo_img">
                <h1>crm-box</h1>
                <div id="time" class="col-md-1 col-xs-12">
                    <p class="col-md-1 col-xs-3" id="digital_watch"></p>
                </div>
                <div id="log_out_div">
                    <img id="log_out_img" src="./public/images/logout.png">
                    <p>Logout</p>
                </div>
            </div>
    <?php endif; ?>