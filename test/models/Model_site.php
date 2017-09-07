<?php

class Model_site
{

    public static function save_service($service_type, $service_name, $service_price, $service_time, $service_desc)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("INSERT INTO `qq_service` (service_name, service_price, service_duration, service_section, service_description, login) VALUES ('$services_name', '$service_price', '$service_time', '$service_type',  '$service_desc', '$login')");
        $query->execute();
    }

    public static function save_timetable($date, $time, $section, $master_timetable, $service_visits, $price, $duration, $phone_numb, $client_name, $extra, $discount_type, $discount, $discription, $all)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;
        $phone_numb = trim($phone_numb);

        $activ0 = "SELECT id_client FROM qq_clients WHERE client_name = '$client_name' AND client_phone = '$phone_numb' AND login = '$login'";
        $result0 = $pdo->prepare($activ0);
        $result0->execute();
        $id0 = $result0->fetch(PDO::FETCH_ASSOC);
        $n0 = $id0['id_client'];

        $activ = "SELECT id_visit FROM qq_visits WHERE visit_data = '$date' AND visit_time = '$time' AND visit_master = '$master_timetable' AND login = '$login'";
        $result = $pdo->prepare($activ);
        $result->execute();
        $id = $result->fetch(PDO::FETCH_ASSOC);
        $n = $id['id_visit'];

        if ($n == NULL ) {
            $query = $pdo->prepare("INSERT INTO `qq_visits` (visit_date, visit_time, visit_section, visit_mastir, visit_service, visit_price, visit_duration, client_phone, client_name, visit_extra, visit_discount, discount_type, visit_discription, visit_total_price, login) VALUES ('$date', '$time', '$section', '$master_timetable', '$service_visits', '$price', '$duration', '$phone_numb', '$client_name', '$extra', '$discount','$discount_type', '$discription', '$all', '$login') ");
            $query->execute();
            if ($n0 == NULL) {
                $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_phone, login) VALUES ('$client_name', '$phone_numb', '$login')");
                $query->execute();
            }
        }
    }

    public static function take_service()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_services WHERE login = '$login'");
        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem)
        {
            $arr[] = $elem['service_name']."|^|".$elem['services_price']."|^|".$elem['service_duration']."|^|".$elem['id_service']."|^|".$elem['service_section']."|^|".$elem['service_description'];
        }
        echo json_encode($arr);
    }

    // Add by Yevhen Kondratyev
    public static function take_service_from_section() {
        $pdo = Db::getConnection();
        $section = $_POST['section_service'];
        $session = Session::getInstance();
        $login = $session->logged_user;

        if ($section == "all") {
            $query = $pdo->prepare("SELECT * FROM qq_services WHERE login = '$login'");
        } else {
            $query = $pdo->prepare("SELECT * FROM qq_services WHERE service_section = '$section' AND login = '$login'");
        }

        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem) {
            $arr[] = $elem['service_name'];
        }
        echo json_encode($arr);
    }

    public static function take_service_list() {
        $pdo = Db::getConnection();
        $date_input = $_POST['date_input'];
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_visits WHERE visit_data = '$date_input' AND login = '$login'");
        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem) {
            $arr[] = $elem['visit_data']."|^|".$elem['visit_time']."|^|".$elem['visit_section']."|^|".$elem['visit_master']."|^|".$elem['visit_service']."|^|".$elem['visit_price']."|^|".$elem['visit_duration']."|^|".$elem['client_phone']."|^|".$elem['client_name']."|^|".$elem['visit_extra']."|^|".$elem['visit_discount']."|^|".$elem['discount_type']."|^|".$elem['visit_discription']."|^|".$elem['visit_total_price']."|^|".$elem['id_visit'];
        }

        echo json_encode($arr);
    }

    public static function take_price_duration() {
        $pdo = Db::getConnection();
        $service_name = $_POST['service'];
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_services WHERE service_name = '$service_name' AND login = '$login'");

        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem) {
            $arr[] = $elem['service_price']."|^|".$elem['service_duration'];
        }
        echo json_encode($arr);
    }

    public static function take_master_for_list() {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_masters WHERE login = '$login'");

        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem) {
            $arr[] = $elem['master_name'];
        }
        echo json_encode($arr);
    }
    public static function take_master_to_service() {
        if ($_POST['service_master'] != "Все") {
            $pdo = Db::getConnection();
            $session = Session::getInstance();
            $login = $session->logged_user;
            $service_master = "%" . $_POST['service_master'] . "%";

            $query = $pdo->prepare("SELECT * FROM qq_masters WHERE login = '$login' AND master_description LIKE '$service_master'");

            $query->execute();
            $result_query = $query->fetchAll();
            $arr = array();

            foreach ($result_query as $elem) {
                $arr[] = $elem['master_name'];
            }
            echo json_encode($arr);
        } else {
            $pdo = Db::getConnection();
            $session = Session::getInstance();
            $login = $session->logged_user;

            $query = $pdo->prepare("SELECT * FROM qq_master WHERE login = '$login'");

            $query->execute();
            $result_query = $query->fetchAll();
            $arr = array();

            foreach ($result_query as $elem) {
                $arr[] = $elem['master_name'];
            }
            echo json_encode($arr);
        }
    }

    public static function take_serviceSection()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_section AS `section` WHERE login = '$login'");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $arr = array();
        foreach ($result as $elem)
        {
            $arr[] = $elem['service_section'];
        }

        echo json_encode($arr);
    }

    public static function take_post()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_master_post WHERE login = '$login'");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $arr = array();
        foreach ($result as $elem)
        {
            $arr[] = $elem['post'];
        }

        echo json_encode($arr);
    }

    public static function save_client($client_name, $client_sex, $client_phone,  $client_description)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_sex, client_phone, client_description, login) VALUES (
                              '$client_name','$client_sex', '$client_phone','$client_description', '$login')");
        $query->execute();
    }

    public static function take_clients()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_clients WHERE login = '$login'");
        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem)
        {
            $arr[] = $elem['id_client']."|^|".$elem['client_name']."|^|".$elem['client_phone']."|^|".$elem['client_description']."|^|".$elem['client_sex'];
        }
        echo json_encode($arr);
    }



    public static function personel_save($worker_name, $worker_tel, $worker_mail, $worker_post, $description, $worker_image)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $arrim = explode(';base64,', $worker_image);
        $arrim = explode('data:image/', $arrim[0]);
        $type = $arrim[1];
        $str = "data:image/$type;base64,";
        $img = str_replace($str, '', $worker_image);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $worker_image = "./images/masters_photo/".$worker_name.".".$type;
        file_put_contents("./images/masters_photo/".$worker_name.".".$type, $data);

        $query = $pdo->prepare("INSERT INTO qq_masters (master_name, master_phone, master_email, master_post, master_photo, master_description, login) 
                              VALUES ('$worker_name', '$worker_tel', '$worker_mail', '$worker_post', '$worker_image', '$description', '$login')");
        $query->execute();
    }

    public static function take_personel()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("SELECT * FROM qq_master WHERE login = '$login'");
        $query->execute();
        $result_query = $query->fetchAll();
        $arr = array();

        foreach ($result_query as $elem)
        {
            $arr[] = $elem['id_master']."|^|".$elem['master_photo']."|^|".$elem['master_name']."|^|".$elem['master_post']."|^|".$elem['master_phone']."|^|".$elem['master_mail']."|^|".$elem['master_description'];
        }
        echo json_encode($arr);
    }

    public static function new_section($section_name)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("INSERT INTO `qq_section` (services_section, login) VALUES ('$section_name', '$login')");
        $query->execute();
    }

    public static function new_post($post_name)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("INSERT INTO `qq_master_post` (post, login) VALUES ('$post_name', '$login')");
        $query->execute();
    }
//------------------------------------------- НЕ ТРОГАТИ --------- BY SANDRUSE -------------
    public static function edit_client($client_id, $client_name, $client_sex, $client_phone,  $client_description)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("UPDATE qq_clients SET client_name ='$client_name', client_sex =  '$client_sex', client_phone = '$client_phone' , client_description = '$client_description' WHERE `id_client`='$client_id' AND login = '$login'");
        $query->execute();
    }

    public static function edit_master($worker_name, $worker_tel, $worker_mail, $worker_post, $description , $master_photo, $master_id)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("UPDATE `qq_masters` SET master_name = '$worker_name', master_phone = '$worker_tel', master_email = '$worker_mail', master_post = '$worker_post', master_description = '$description', master_photo = '$master_photo' WHERE `id_master` = '$master_id' AND login = '$login'");
        $query->execute();
    }

    public static function edit_service($service_type, $service_name, $service_price, $service_time, $service_desc, $servise_id)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("UPDATE `qq_services` SET service_name = '$service_name', service_price = '$service_price', service_duration = '$service_time', service_section = '$service_type', service_description = '$service_desc' WHERE `id_service` = '$servise_id' AND login = '$login'");
        $query->execute();
    }

    public static function edit_timetable($date, $time, $section, $master_timetable, $service_visits, $price, $duration, $phone_numb, $client_name, $extra, $discount_type, $discount, $discription, $all, $id_visit)
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query = $pdo->prepare("UPDATE `qq_visits` SET visite_data = '$date',visite_time ='$time', visite_section ='$section', visite_master ='$master_timetable',visite_service ='$service_visits',visite_price ='$price',
                                      visite_duration = '$duration',client_phone ='$phone_numb',client_name = '$client_name',visite_extra ='$extra',visite_discount = '$discount',discount_type ='$discount_type',visit_discription ='$discription', visit_total_price ='$all'
                                      WHERE `visit_data`='$date', `visit_time`='$time', `client_name`='$client_name', `client_phone`='$phone_numb', login = '$login'");

        $query->execute();
    }

    public static function delete_list()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;
        $table = $_POST['table'];
        $list_id = $_POST['list_id'];

        if ($table == "client") {
            $query = $pdo->prepare("DELETE FROM qq_clients WHERE `id_client`='$list_id' AND login = '$login'");
            $query->execute();
        }
        else if ($table == "masters") {
            $query = $pdo->prepare("DELETE FROM `qq_masters`  WHERE `id_master` = '$list_id' AND login = '$login'");
            $query->execute();
        }
        else if ($table == "services") {
            $query = $pdo->prepare("DELETE FROM `qq_services` WHERE `id_service` = '$list_id' AND login = '$login'");
            $query->execute();
        }
        else if ($table == "visits") {
            $query = $pdo->prepare("DELETE FROM `qq_visits` WHERE `id_visit` = '$list_id' AND login = '$login'");
            $query->execute();
        } else if ($table = "visits") {
            $query = $pdo->prepare("DELETE FROM qq_visits WHERE `id_visit`= '$list_id' AND login = '$login'");
            $query->execute();
        }
    }
    //    ____________________________________________________________________


}

