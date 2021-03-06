<?php

class Db
{
    public static function createDB()
    {
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=', 'root', "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            echo "Connection error :". $e->getMessage();
            exit();
        }

        $query = 'CREATE DATABASE IF NOT EXISTS `ivi_project`';

        try
        {
            $pdo->query($query);
        }
        catch (PDOException $e)
        {
            echo "Error: Can't CREATE DataBase - ".$e;
            exit();
        }
    }

    public static function createTable()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=ivi_project', 'root', "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error :" . $e->getMessage();
            exit();
        }

        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_clients (id_client serial NOT NULL, client_name varchar(255) NOT NULL,
                                      client_sex varchar(10) DEFAULT NULL,
                                      client_phone varchar(255) DEFAULT NULL,
                                      client_visits integer NOT NULL DEFAULT 0,
                                      client_description varchar(1024) DEFAULT '',
                                      client_createdate timestamp NOT NULL DEFAULT current_timestamp,
                                      login VARCHAR(50) NOT NULL,
                                      PRIMARY KEY (id_client))");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_clients" . $e;
            exit();
        }


        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_visits (id_visit serial NOT NULL,
                                      visit_data varchar(30) DEFAULT NULL,
                                      visit_time varchar(30) DEFAULT NULL,
                                      visit_section varchar(255) DEFAULT NULL,
                                      visit_master  varchar(255) DEFAULT NULL,
                                      visit_service varchar(255) DEFAULT NULL,
                                      visit_price integer NOT NULL,
                                      visit_duration integer NOT NULL,
                                      client_phone varchar(20) DEFAULT NULL,
                                      client_name varchar(255) DEFAULT NULL,
                                      visit_extra integer DEFAULT 0,
                                      visit_discount integer NOT NULL,
                                      discount_type varchar(5) DEFAULT NULL,
                                      visit_discription varchar(1000) DEFAULT NULL,
                                      visit_total_price integer NOT NULL,
                                      login VARCHAR(50) NOT NULL,
                                      PRIMARY KEY (id_visit))");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_clients" . $e;
            exit();
        }


        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_login (id_login serial NOT NULL,
                                      login VARCHAR(50) NOT NULL,
                                      hashed_password VARCHAR(255) NOT NULL,
                                      password_change_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                      login_create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                      login_status integer NOT NULL DEFAULT 0,
                                      email VARCHAR(255) NOT NULL,
                                      PRIMARY KEY (id_login))");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_login" . $e;
            exit();
        }

        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_services (id_service serial NOT NULL,
                                      service_name VARCHAR(255) NOT NULL,
                                      service_price integer NOT NULL,
                                      service_duration integer NOT NULL,
                                      service_section VARCHAR(255) NOT NULL,
                                      service_description VARCHAR(1024) DEFAULT '',
                                      service_createdate timestamp NOT NULL DEFAULT current_timestamp,
                                      login VARCHAR(50) NOT NULL,
                                      PRIMARY KEY (id_service))");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_services" . $e;
            exit();
        }

        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_masters (id_master serial NOT NULL,
                                      master_name VARCHAR(255) DEFAULT NULL,
                                      master_post VARCHAR(255) DEFAULT NULL,
                                      master_phone VARCHAR(255) DEFAULT NULL,
                                      master_email VARCHAR(255) DEFAULT NULL,
                                      master_photo VARCHAR(500) DEFAULT NULL,
                                      master_createdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                                      master_description VARCHAR(1024) DEFAULT '',
                                      login VARCHAR(50) NOT NULL,
                                      PRIMARY KEY (id_master))");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_masters" . $e;
            exit();
        }


        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_masters_post (post VARCHAR(255) NOT NULL, login VARCHAR(50) NOT NULL)");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_masters_post" . $e;
            exit();
        }

        try {
            $query = $pdo->prepare("CREATE TABLE IF NOT EXISTS ivi_project.qq_section (service_section VARCHAR(255) NOT NULL, login VARCHAR(50) NOT NULL)");
            $query->execute();
        } catch (PDOException $e) {
            echo "Error: CAN'T CREATE TABLE - ivi_project.qq_section" . $e;
            exit();
        }

        $passwd = hash('whirlpool', '123');
        $login = 'IVI';
        $status = 1;
   

        $query_login = $pdo->prepare("SELECT * FROM `qq_login` WHERE login = '$login'");
        $query_login->execute();
        $result_login = $query_login->fetchAll();

        if ($result_login == NULL) {

            $query = $pdo->prepare("INSERT INTO `qq_login` (login, hashed_password, login_status, email) VALUES (?, ?, ?)");
            $query->execute([$login, $passwd, $status]);

        }



    }

    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        try
        {
            $db = new PDO($dsn, $params['user'], $params['password']);
        }
        catch (PDOException $e)
        {
            echo "Connection error :". $e->getMessage();
            exit();
        }
        return $db;
    }


}