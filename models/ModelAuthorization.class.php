<?php

    class ModelAuthorization {
        public static function signup() {
            $pdo = DataBase::getConnection();
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

                if (self::sendEmail($email, $login, $pdo) == True)
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