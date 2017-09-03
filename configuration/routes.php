<?php
    $routes = array(
        'crm-box/signup' => 'authorization/signup',
        'crm-box/signin' => 'authorization/signin',
        'crm-box/forgot' => 'authorization/forgot',
        'crm-box/timetable' => 'timetable/start',
        'crm-box' => 'authorization/account',
    );

    return ($routes);