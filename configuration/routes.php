<?php
    $routes = array(
        'crm-box/signup' => 'authorization/signup',
        'crm-box/signin' => 'authorization/signin',
        'crm-box/forgot' => 'authorization/forgot',
        'crm-box/logout' => 'authorization/logout',
        'crm-box/timetable' => 'timetable/show',
        'crm-box/services' => 'service/show',
        'crm-box' => 'authorization/account',
    );

    return ($routes);