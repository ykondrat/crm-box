<?php
    include_once ROOT . '/models/ModelAuthorization.class.php';

    class AuthorizationController {
        public function actionAccount() {
            require_once ROOT . '/views/viewLogin.php';
        }
    }