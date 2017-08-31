<?php

    class ModelAuthorization {

        public static function signup() {
            $pdo = DataBase::getConnection();
            $session = Session::getInstance();
            $login = $_POST['login'];
            $email = $_POST['email'];
            $passwd = $_POST['passwd'];
            $query_login = $pdo->prepare("SELECT * FROM `login` WHERE login = '$login'");
            $query_email = $pdo->prepare("SELECT * FROM `login` WHERE mail = '$email'");

            $query_login->execute();
            $result_login = $query_login->fetchAll();

            $query_email->execute();
            $result_email = $query_email->fetchAll();

            if ($result_login == NULL && $result_email == NULL) {
                $query = $pdo->prepare("INSERT INTO `login` (login, hashed_password, email) VALUES (?, ?, ?)");
                $query->execute([$login, hash('whirlpool', $passwd), $email]);

                $session->logged_user = $login;
                $arr = array();
                $arr[] = 'OK';
                echo json_encode($arr);
            } else {
                $arr = array();
                $arr[] = 'Login or email is already in use';
                echo json_encode($arr);
            }
        }

        public static function signin() {
            $session = Session::getInstance();
            $pdo = DataBase::getConnection();
            $arr = array();

            $login = $_POST['login'];
            $passwd = hash('whirlpool', $_POST['passwd']);

            $query_login = $pdo->prepare("SELECT * FROM `login` WHERE login = '$login'");

            $query_login->execute();
            $result = $query_login->fetch(PDO::FETCH_ASSOC);

            if ($login == $result['login'] || $login == '') {
                if ($result['hashed_password'] == $passwd) {
                    $session->logged_user = $login;

                    $arr[] = 'OK';
                    echo json_encode($arr);
                } else {
                    $arr[] = 'Incorrect password';
                    echo json_encode($arr);
                }
            } else {
                $arr[] = 'No such user';
                echo json_encode($arr);
            }
        }

        
    }