<?php
return array
(
    'autorization/activation/login-([a-zA-Z]+)/act-([a-zA-Z0-9]+)' => 'autorization/activation/$1/$2', //actionActivation в AutorizationController
    'autorization/change_pass/login-([a-zA-Z]+)/act-([a-zA-Z0-9]+)' => 'autorization/change_pass/$1/$2', //actionChange_pass в AutorizationController
    'autorization_login' => 'autorization/login', //actionLogin в AutorizationController
    'autorization_logout' => 'autorization/logout', //actionLogout в AutorizationController
    'autorization_signup' => 'autorization/signup', //actionSignUp в AutorizationController
    'forgot_pass' => 'autorization/forgot_pass', //actionForgot_pass в AutorizationController
    'autorization/do_change_pass' => 'autorization/do_change_pass', //actionChange_pass в AutorizationController
    'autorization_modify' => 'autorization/modify', //actionSignUp в AutorizationController
    'save_service' => 'site/save_service', //actionSaveService в SiteController
    'timetable' => 'site/save_timetable', //actionSaveTimetable в SiteController
    'take_service' => 'site/take_service', //actionSaveService в SiteControllertake_service
    'save_client' => 'site/save_client', //actionSave_client в SiteControllertake_service
    'worker_save' => 'site/personel_save', //actionSave_client в SiteControllertake_service
    'new_section' => 'site/new_section', //actionNew_section в SiteControllertake_service
    'new_post' => 'site/new_post', //actionNew_post в SiteControllertake_service
    'take_post' => 'site/takePost',
    'take_section' => 'site/takeService_section',
    'take_personel' => 'site/take_personel',
    'take_clients' => 'site/take_clients',
    'edit_service' => 'site/edit_service',
    'edit_client' => 'site/edit_client',
    'edit_master' => 'site/edit_master',
    'take_master_to_service' => 'site/take_master_to_service',
    'take_service_list' => 'site/take_service_list',
    'take_service_from_section' => 'site/take_services_from_section', // add by Yevhen Kondratyev
    'take_price_duration' => 'site/take_price_duration',// add by Yevhen Kondratyev
    'take_master_for_list' => 'site/take_master_for_list',// add by Yevhen Kondratyev
    'delete_list' => 'site/delete_list',
    'edit_timetable' => 'site/edit_timetable',
    '' => 'site/index', //actionIndex в SiteController

);
