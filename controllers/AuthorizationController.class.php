<?php
    include_once ROOT . '/models/ModelAuthorization.class.php';

    class AuthorizationController {
        public function actionAccount() {
            require_once ROOT . '/views/viewLogin.php';
            return (true);
        }
        public function actionSignup() {
            ModelAuthorization::signup();

            return (true);
        }
        public function actionSignin() {
            ModelAuthorization::signin();

            return (true);
        }
        public function actionForgot() {
            ModelAuthorization::forgotPassword();

            return (true);
        }
        public function actionLogout(){
            ModelAuthorization::logout();

            return (true);
        }
    }