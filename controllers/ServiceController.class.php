<?php
    include_once ROOT . '/models/ModelService.class.php';

    class ServiceController {
        public function actionShow() {
            require_once ROOT . '/views/viewService.php';
            return (true);
        }
    }