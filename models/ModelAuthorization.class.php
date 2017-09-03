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

        public static function forgotPassword() {
            $pdo = DataBase::getConnection();
            $email = $_POST['email'];
            $arr = array();

            $query = $pdo->prepare("SELECT * FROM `login` WHERE email = '$email'");
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result['login']) {
                $arr[] = 'OK';
                echo json_encode($arr);
                $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
                $max = 16;
                $size = strlen($chars) - 1;
                $password = null;
                while ($max--) {
                    $password .= $chars[rand(0, $size)];
                }
                $new_password = hash('whirlpool', $password);
                $query = $pdo->prepare("UPDATE `login` SET hashed_password='$new_password' WHERE email = '$email'");
                $query->execute();

                $headers = "Content-Type: text/html; charset=utf-8" . "\r\n";
                $subject = "crm-box New Password";
                $r1 = "<html><head><style>span {font-weight: bold;}</style><head>";
                $r2 = "<body><h1>Camagru New Password</h1>";
                $r3 = "<article><p>Hi, {$login}!</p><p>Your new password on <span>crm-box</span> site</p><p><span>$password</span></p>";
                $r4 = "<p>Best regards, crm-box Dev</p></body></html>";
                $message = $r1 . $r2 . $r3 . $r4;
                mail($email, $subject, $message, $headers);
            } else {
                $arr[] = 'No such user';
                echo json_encode($arr);
            }
        }

        public static function logout() {
            $session = Session::getInstance();
            $session->destroy();
            header("Location: http://localhost/crm-box/");
        }
    }