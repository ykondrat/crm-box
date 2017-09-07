<?php

class Model_autorization
{
    public static function make_defolt_values()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();
        $login = $session->logged_user;

        $query_login = $pdo->prepare("SELECT * FROM `qq_section` WHERE service_section = 'Стришка' AND login = '$login'");
        $query_login->execute();
        $result_login = $query_login->fetchAll();
        $date_today = date("d-m-y");
        $date_today = "20".$date_today;
        if ($result_login != NULL) {

            $query = $pdo->prepare("INSERT INTO `qq_services` (service_name, service_price, service_duration, service_section, service_description, login) VALUES ('Женская стрижка', '100', '30', 'Стрижка',  'быстро качественно недорого', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_services` (service_name, service_price, service_duration, service_section, service_description, login) VALUES ('Чистка лица', '300', '90', 'Лицо',  'быстро качественно недорого', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_services` (service_name, service_price, service_duration, service_section, service_description, login) VALUES ('Массаж спины', '400', '60', 'Тело',  'быстро качественно недорого', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_services` (service_name, service_price, service_duration, service_section, service_description, login) VALUES ('Педикюр', '150', '45', 'Ноги',  'быстро качественно недорого', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_services` (service_name, service_price, service_duration, service_section, service_description, login) VALUES ('Наращивание ногтей', '200', '60', 'Руки',  'быстро качественно недорого', '$login')");
            $query->execute();



            $query = $pdo->prepare("INSERT INTO `qq_visits` (visit_data, visit_time, visit_section, visit_master, visit_service, visit_price, visit_duration, client_phone, client_name, visit_extra, visit_discount, discount_type, visit_discription, visit_total_price, login) 
                                    VALUES ('$date_today', '10:00', 'Стрижка', 'Ольга', 'Женская стрижка', '100', '30', '+380955555555', 'Антонина Аркадьевна', '10', '5','%', 'очень спешит', '105', '$login') ");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_visits` (visit_data, visit_time, visit_section, visit_master, visit_service, visit_price, visit_duration, client_phone, client_name, visit_extra, visit_discount, discount_type, visit_discription, visit_total_price, login) 
                                    VALUES ('$date_today', '13:00', 'Лицо', 'Анна', 'Чистка лица', '300', '90', '+380972971468', 'Ольга', '0', '','%', '', '300', '$login') ");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_visits` (visit_data, visit_time, visit_section, visit_master, visit_service, visit_price, visit_duration, client_phone, client_name, visit_extra, visit_discount, discount_type, visit_discription, visit_total_price, login) 
                                    VALUES ('$date_today', '17:00', 'Тело', 'Жанна', 'Массаж спины', '400', '60', '+380953796854', 'Василий', '0', '0','%', 'впервый раз', '400', '$login') ");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_visits` (visit_data, visit_time, visit_section, visit_master, visit_service, visit_price, visit_duration, client_phone, client_name, visit_extra, visit_discount, discount_type, visit_discription, visit_total_price, login) 
                                    VALUES ('$date_today', '16:00', 'Ноги', 'Светлана', 'Педикюр', '150', '45', '+380978331467', 'Людочка', '0', '10','%', 'Знакомая', '135', '$login') ");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_visits` (visit_data, visit_time, visit_section, visit_master, visit_service, visit_price, visit_duration, client_phone, client_name, visit_extra, visit_discount, discount_type, visit_discription, visit_total_price, login) 
                                    VALUES ('$date_today', '17:00', 'Руки', 'Светлана', 'Наращивание ногтей', '200', '60', '+380666666666', 'Лариса Адольфовна', '0', '10','%', 'постоянный клиент', '180', '$login') ");
            $query->execute();



            $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_sex, client_phone, client_visits,client_description, login) VALUES (
                              'Антонина Аркадьевна','Женский', '+380955555555','2','вежливая', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_sex, client_phone, client_visits,client_description, login) VALUES (
                              'Василий','Мужской', '+380953796854','9','хороший парень', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_sex, client_phone, client_visits,client_description, login) VALUES (
                              'Людочка','Женский', '+380978331467','5','вежливая', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_sex, client_phone, client_visits,client_description, login) VALUES (
                              'Лариса Адольфовна','Женский', '+380666666666','15','Ложилая женщина с фиолетовыми волосами', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_clients (client_name, client_sex, client_phone, client_visits,client_description, login) VALUES (
                              'Ольга','Женский', '+380972971468','3','Любит поговорить', '$login')");
            $query->execute();


            $query = $pdo->prepare("INSERT INTO qq_masters (master_name, master_phone, master_email, master_post, master_photo, master_description, login) 
                              VALUES ('Анна', '+380965248569', 'anna@anna.com', 'Косметолог', './images/masters_photo/photo_def.jpg', 'лучшая из лучших', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_masters (master_name, master_phone, master_email, master_post, master_photo, master_description, login) 
                              VALUES ('Ирина', '+380987691348', 'iren@iren.com', 'Парикмахер', './images/masters_photo/photo_def.jpg', 'лучшая из лучших', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_masters (master_name, master_phone, master_email, master_post, master_photo, master_description, login) 
                              VALUES ('Светлана', '+380993997648', 'svieta@svieta.com', 'Мастер по маникюру и педикюру', './images/masters_photo/photo_def.jpg', 'лучшая из лучших', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_masters (master_name, master_phone, master_email, master_post, master_photo, master_description, login) 
                              VALUES ('Ольга', '+380662874539', 'olga@olga.com', 'Парикмахер-модельер', './images/masters_photo/photo_def.jpg', 'лучшая из лучших', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO qq_masters (master_name, master_phone, master_email, master_post, master_photo, master_description, login) 
                              VALUES ('Жанна', '+380999999999', 'shana@shana.com', 'Массажист', './images/masters_photo/photo_def.jpg', 'лучшая из лучших', '$login')");
            $query->execute();



            $query = $pdo->prepare("INSERT INTO `qq_section` (service_section, login) VALUES ('Стрижка', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_section` (service_section, login) VALUES ('Лицо', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_section` (service_section, login) VALUES ('Тело', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_section` (service_section, login) VALUES ('Ноги', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_section` (service_section, login) VALUES ('Руки', '$login')");
            $query->execute();



            $query = $pdo->prepare("INSERT INTO `qq_masters_post` (post, login) VALUES ('Косметолог', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_masters_post` (post, login) VALUES ('Парикмахер', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_masters_post` (post, login) VALUES ('Мастер по маникюру и педикюру', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_masters_post` (post, login) VALUES ('Парикмахер-модельер', '$login')");
            $query->execute();
            $query = $pdo->prepare("INSERT INTO `qq_masters_post` (post, login) VALUES ('Массажист', '$login')");
            $query->execute();
        }
    }

    public static function do_login()
    {

       // if ( empty($_SESSION['logged_user']))
        $data = $_POST;
        $session = Session::getInstance();
        if ( isset($data['enter_login']) )
        {

            $pdo = Db::getConnection();

            // Если ошибок нет - поля заполнены то проверяем сходство логина

               
                $login = $data['login'];
                $passwd = hash('whirlpool', $data['passwd']);

                $query_login = $pdo->prepare("SELECT * FROM `qq_login` WHERE login = '$login'");

                $query_login->execute();
                $result_login = $query_login->fetch(PDO::FETCH_ASSOC);

                // Если логин найден то проверяем пароль


                if ( $login == $result_login['login'])
                {
                    $query_passwd = $pdo->prepare("SELECT * FROM `qq_login` WHERE hashed_password = '$passwd'");
                    $query_passwd->execute();
                    $result_passwd = $query_passwd->fetch(PDO::FETCH_ASSOC);
                    if ( $result_passwd['hashed_password'] == $passwd)
                    {

                        // Если пароль найден то проверяем статус активации

                        $query_status = $pdo->prepare("SELECT login_status FROM `qq_login` WHERE login='$login'");
                        $query_status->execute();
                        $result_status = $query_status->fetch(PDO::FETCH_ASSOC);
                        if ( $result_status['login_status'] == "1" )
                        {

                            // если активация віполнена то логиним юзера

                            $session->logged_user = $login;
                            self::make_defolt_values();

                            header("Location: http://localhost:8080/IVI-Salon/");
                        }
                        else
                        {
                            $session->error = 'error3';
                        }
                    }
                    else
                    {
                        $session->error = 'error2';
                    }
                }
                else
                {
                    $session->error = 'error1';
                }

        }
    }

    public static function do_signup()
    {
        $pdo = Db::getConnection();

        $data = $_POST;

        $errors = array();

        if ( isset($data['do_signup']) )
        {
        //registration - check forms by JS

            // all is OK and registr
            $login = $data['login'];
            $email = $data['email'];
            $passwd = $data['passwd'];
            $query_login = $pdo->prepare("SELECT * FROM `qq_login` WHERE login = '$login'");
            $query_email = $pdo->prepare("SELECT * FROM `qq_login` WHERE mail = '$email'");

            $query_login->execute();
            $result_login = $query_login->fetchAll();

            $query_email->execute();
            $result_email = $query_email->fetchAll();

            if ($result_login == NULL && $result_email == NULL)
            {
                $query = $pdo->prepare("INSERT INTO `qq_login` (login, hashed_password, email) VALUES (?, ?, ?)");
                $res = $query->execute([$login, hash('whirlpool', $passwd), $email]);

                if (self::Send_Email($email, $login, $pdo) == True)
                {
                    return True;
                }
                else
                {
                    return False;
                }

            } else
            {
                $session->error = 'error4';
            }
        }
    }

    public static function do_logout()
    {
        $session = Session::getInstance();
        $session->destroy();
        header("Location: http://localhost:8080/IVI-Salon/");
    }

    public static function Form_Validation($data, $errors)
    {
        if ( trim($data['login'] === "") )
        {
            $errors[] = 'Enter your login!';
        }
        if ( ($data['passwd'] === "") )
        {
            $errors[] = 'Enter your password!';
        }
        if ( strlen($data['passwd']) <= 3 )
        {
            $errors[] = 'Too short password - please use 8 characters';
        }
        if ( ($data['passwd1'] === "") )
        {
            $errors[] = 'Repeat your password!';
        }
        if ( ($data['passwd1'] !== $data['passwd']) )
        {
            $errors[] = 'Not like password!';
        }
        if( isset($data['email']) )
        {
            if ( !filter_var($data['email'], FILTER_VALIDATE_EMAIL) )
            {
                $errors[] = 'Your E-mail not valid';
            }

            @list($user, $host) = explode("@", $data['email']);
            if ( @!checkdnsrr($host, 'MX') && @!checkdnsrr($host, 'A') )
            {
                $errors[] = 'Bad E-mail server';
            }
        }

        if ( empty($errors) )
        {
            return True;
        }
        else
        {
        }
    }

    public static function Send_Email($email, $login, $pdo)
    {

        $login = strtolower($login);

        $activ = $pdo->prepare("SELECT id_login FROM `qq_login` WHERE login='$login'");
        $activ->execute();

        $id_activ = $activ->fetch(PDO::FETCH_ASSOC);

        $activation = hash('whirlpool', $id_activ['id_login']);

        $subject = "IVI-SALON registration";
        $message = "Здравствуйте! Спасибо за регистрацию на сайте 'IVI-Salon'\nВаш логин: ".$login."\n Для того чтобы войти в свой аккуант его нужно активировать.\n
Чтобы активировать ваш аккаунт, перейдите по ссылке:\n
http://localhost:8080/IVI-Salon/autorization/activation/login-".$login."/act-".$activation."\n\n
С уважением, IVI Jun Devs";//содержание сообщение

        mail($email, $subject, $message);
        list($user, $host) = explode("@", $email);


        return True;
    }

    public static function do_activation($login, $act)
    {
        $pdo = Db::getConnection();

        if ( isset($act) && isset($login) )
        {
            $act = stripcslashes($act);
            $act = htmlspecialchars($act);

            $login = stripcslashes($login);
            $login = htmlspecialchars($login);
        }
        else
        {
            exit("Вы зашли без кода подтверждения");
        }

        $activ = $pdo->prepare("SELECT id_login FROM `qq_login` WHERE login='$login'");
        $activ->execute();

        $id_activ = $activ->fetch(PDO::FETCH_ASSOC);
        $activation = hash('mk5', $id_activ['id_login']);

        if ( $activation === $act )
        {
            $activ = $pdo->prepare("UPDATE `qq_login` SET login_status='1' WHERE login = '$login'");
            $activ->execute();
            echo ("<script>window.setTimeout(function(){ window.location = \"http://localhost:8080/IVI-Salon/\"; },15000);</script>");
            return True;
        }
        else
        {
            return False;
        }
    }

    public static function do_forgot()
    {
        $pdo = Db::getConnection();
        $session = Session::getInstance();

        $data = $_POST;
        if (!isset($session->logged_user))
        {
            if ( isset($data['do_forgot']) )
            {
                $email = $data['email'];

                $query_email = $pdo->prepare("SELECT * FROM `qq_login` WHERE email = '$email'");

                $query_email->execute();
                $result_email = $query_email->fetch(PDO::FETCH_ASSOC);

                if ($result_email != NULL)
                {
                    $email = $data['email'];

                    $query_email = $pdo->prepare("SELECT * FROM `qq_login` WHERE email = '$email'");
                    $query_email->execute();

                    /*$result_email = $query_email->fetchAll();*/

                    if (self::Send_Email_for_passwd($email, $pdo) == TRUE)
                    {
                        return TRUE;
                    }
                }
                else
                {
                    $session->error = 'error5';
                    //return FALSE;
                }
            }
        }

    }

    public static function Send_Email_for_passwd($email, $pdo)
    {
        $activ = $pdo->prepare("SELECT id_login FROM `qq_login` WHERE email='$email'");
        $activ->execute();

        $query_login = $pdo->prepare("SELECT login FROM `qq_login` WHERE email = '$email'");
        $query_login->execute();

        $id_login = $query_login->fetch(PDO::FETCH_ASSOC);

        $login = $id_login['login'];

        $id_activ = $activ->fetch(PDO::FETCH_ASSOC);

        $activation = hash('mk5', $id_activ['id_login']);

        $subject = "IVI-Salon reset password";
        $message = "Здравствуйте! С Вашего аккаунта выполнен запрос на восстановление пароля\n Для того чтобы изменить пароль перейдите по ссылке:\n
http://localhost:8080/IVI-Salon/autorization/change_pass/login-".$login."/act-".$activation."\n\n
С уважением, IVI-Salon Jun Dev";//содержание сообщение

        mail($email, $subject, $message);
        list($user, $host) = explode("@", $email);

        return TRUE;
    }

    public static function do_check_user_for_new_pass($login, $act)
    {
        $pdo = Db::getConnection();

        if ( isset($login) && isset($act) )
        {

            $act = stripcslashes($act);
            $act = htmlspecialchars($act);


            $login = stripcslashes($login);
            $login = htmlspecialchars($login);
        }
        else
        {
            exit("Вы зайшли без кода подтверждения");
        }

        $activ = $pdo->prepare("SELECT id_login FROM `qq_login` WHERE login='$login'");
        $activ->execute();

        $id_activ = $activ->fetch(PDO::FETCH_ASSOC);
        $activation = hash('whirlpool', $id_activ['id_login']);

        if ( $activation == $act )
        {
            header("Location: http://localhost:8080/IVI-Salon/autorization/do_change_pass/");
        }
        else
        {
            echo "<p style='text-align: center; margin-right: auto; margin-left: auto; color: red'>Ошибка, обратитесь к администратору</p>";
        }
    }

    public static function do_pass_change()
    {
        $pdo = Db::getConnection();

        $data = $_POST;

        if ( isset($data['do_pass_change']) )
        {
            $errors = array();


            if ($data['new_passwd'] !== $data['new_passwd1'])
            {
                $errors[] = "Not equal";
            }
            if (empty($errors))
            {
                $new_passwd = hash('whirlpool', $data['new_passwd']);
                $email = $data['email'];

                $query_email = $pdo->prepare("SELECT * FROM `qq_login` WHERE email = '$email'");
                $query_email->execute();
                $result_email = $query_email->fetch(PDO::FETCH_ASSOC);
                if ($result_email['email'] == $email)
                {
                    $query_new_passwd = $pdo->prepare("UPDATE `qq_login` SET hashed_password = '$new_passwd' WHERE email = '$email'");
                    $query_new_passwd->execute();
                    return TRUE;

                }
            } else
            {
                echo '<div id="errors" style="margin-right: auto; margin-left: auto; color: red">' . array_shift($errors) . '</div>';
            }
        }
    }


    // --       Modify account      --
    public static function do_modify_pass()
    {
        $data = $_POST;

        $pdo = Db::getConnection();

        if ( isset($data['do_modify_pass']) )
        {
            $new_passwd = hash('whirlpool', $data['passwd']);
            $login = $_SESSION['logged_user'];

            $query_new_passwd = $pdo->prepare("UPDATE `qq_login` SET hashed_password = '$new_passwd' WHERE login = '$login'");
            $query_new_passwd->execute();
            echo '<div style="text-align: center; color: green">Your password have been changed</div>';
        }
    }
    public static function do_modify_email()
    {
        $data = $_POST;

        $pdo = Db::getConnection();

        if ( isset($data['do_modify_email']) )
        {
            $new_email = $data['email'];
            $login = $_SESSION['logged_user'];

            $query_new_passwd = $pdo->prepare("UPDATE `qq_login` SET email = '$new_email' WHERE login = '$login'");
            $query_new_passwd->execute();
            echo '<div style="text-align: center; color: green">Your password have been changed</div>';
        }
    }
    public static function do_modify_login()
    {
        $data = $_POST;

        $pdo = Db::getConnection();

        if ( isset($data['do_modify_login']) )
        {
            $new_login = $data['login'];
            $login = $_SESSION['logged_user'];

            $query_new_passwd = $pdo->prepare("UPDATE `qq_login` SET login = '$new_login' WHERE login = '$login'");
            $query_new_passwd->execute();
            $_SESSION['logged_user'] = $new_login;
            echo '<div style="text-align: center; color: green">Your login have been changed</div>';
        }
    }
    public static function do_delete_account()
    {
        $data = $_POST;

        $pdo = Db::getConnection();

        if ( isset($data['do_delete']) )
        {
            $login = $_SESSION['logged_user'];

            $query_new_passwd = $pdo->prepare("DELETE FROM `qq_login` WHERE login = '$login'");
            $query_new_passwd->execute();
            $_SESSION['logged_user'] = "";
            echo '<div style="text-align: center; color: green">Your account have been deleted. We will wait for you againe</div>';
            echo ("<script>window.setTimeout(function(){ window.location = \"http://localhost:8080/IVI-Salon/\"; },15000);</script>");
        }
    }
    // ==       ==============      ==


}