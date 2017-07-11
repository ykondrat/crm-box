<?php
    class DataBase {
        public static function getConnection() {
            $params_path = ROOT.'/configuration/dataBaseConnection.php';
            $params = include($params_path);

            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            try {
                $pdo = new PDO($dsn, $params['user'], $params['password']);
            } catch (PDOException $e) {
                echo "Connection error :". $e->getMessage();
                exit();
            }

            return ($pdo);
        }

        public static function createDataBase() {
            $params_path = ROOT.'/configuration/dataBaseConnection.php';
            $params = include($params_path);

            $dsn = "mysql:host={$params['host']};dbname=";
            try {
                $pdo = new PDO($dsn, $params['user'], $params['password']);
            } catch (PDOException $e) {
                echo "Connection error :" . $e->getMessage();
                exit();
            }

            $query = 'CREATE DATABASE IF NOT EXISTS `crm-box`';

            try {
                $pdo->query($query);
            } catch (PDOException $e) {
                echo "Error: Can't CREATE DataBase - " . $e->getMessage();
                exit();
            }
        }

        public static function createTables() {
            $pdo = self::getConnection();
            $query_path = ROOT.'/configuration/queries.php';
            $queries = include($query_path);

            try {
                $query = $pdo->prepare($queries['clients']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - clients" . $e->getMessage();
                exit();
            }

            try {
                $query = $pdo->prepare($queries['visits']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - visits" . $e->getMessage();
                exit();
            }

            try {
                $query = $pdo->prepare($queries['login']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - login" . $e->getMessage();
                exit();
            }

            try {
                $query = $pdo->prepare($queries['services']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - services" . $e->getMessage();
                exit();
            }

            try {
                $query = $pdo->prepare($queries['masters']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - masters" . $e->getMessage();
                exit();
            }

            try {
                $query = $pdo->prepare($queries['masters_post']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - masters_post" . $e->getMessage();
                exit();
            }

            try {
                $query = $pdo->prepare($queries['sections']);
                $query->execute();
            } catch (PDOException $e) {
                echo "Error: CAN'T CREATE TABLE - sections" . $e->getMessage();
                exit();
            }

            $password = hash('whirlpool', '1234');
            $login = 'admin';
            $status = 1;
            $email = "ykondrat@student.unit.ua";

            $query_login = $pdo->prepare("SELECT * FROM `login` WHERE login = '$login'");
            $query_login->execute();
            $result_login = $query_login->fetchAll();

            if ($result_login == NULL) {
                $query = $pdo->prepare("INSERT INTO `login` (login, hashed_password, login_status, email) VALUES (?, ?, ?, ?)");
                $query->execute([$login, $password, $status, $email]);
            }
        }
    }