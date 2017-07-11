<?php
    $queries = array(
        'clients' => 'CREATE TABLE IF NOT EXISTS clients (id_client serial NOT NULL, client_name varchar(255) NOT NULL,
                                          client_sex varchar(10) DEFAULT NULL,
                                          client_phone varchar(255) DEFAULT NULL,
                                          client_description varchar(1024),
                                          login VARCHAR(50) NOT NULL,
                                          PRIMARY KEY (id_client))',

        'visits' => 'CREATE TABLE IF NOT EXISTS visits (id_visit serial NOT NULL,
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
                                          PRIMARY KEY (id_visit))',

        'login' => 'CREATE TABLE IF NOT EXISTS login (id_login serial NOT NULL,
                                          login VARCHAR(50) NOT NULL,
                                          hashed_password VARCHAR(255) NOT NULL,
                                          login_create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                          login_status integer NOT NULL DEFAULT 0,
                                          email VARCHAR(255) NOT NULL,
                                          login VARCHAR(50) NOT NULL,
                                          PRIMARY KEY (id_login))',

        'services' => 'CREATE TABLE IF NOT EXISTS services (id_service serial NOT NULL,
                                          service_name VARCHAR(255) NOT NULL,
                                          service_price integer NOT NULL,
                                          service_duration integer NOT NULL,
                                          service_section VARCHAR(255) NOT NULL,
                                          service_description VARCHAR(1024),
                                          login VARCHAR(50) NOT NULL,
                                          PRIMARY KEY (id_service))',

        'masters' => 'CREATE TABLE IF NOT EXISTS masters (id_master serial NOT NULL,
                                          master_name VARCHAR(255) DEFAULT NULL,
                                          master_post VARCHAR(255) DEFAULT NULL,
                                          master_phone VARCHAR(255) DEFAULT NULL,
                                          master_email VARCHAR(255) DEFAULT NULL,
                                          master_photo VARCHAR(500) DEFAULT NULL,
                                          master_description VARCHAR(1024),
                                          login VARCHAR(50) NOT NULL,
                                          PRIMARY KEY (id_master))',

        'masters_post' => 'CREATE TABLE IF NOT EXISTS masters_post (post VARCHAR(255) NOT NULL, login VARCHAR(50) NOT NULL)',

        'sections' => 'CREATE TABLE IF NOT EXISTS sections (service_section VARCHAR(255) NOT NULL, login VARCHAR(50) NOT NULL)'
    );

    return ($queries);