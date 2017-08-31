<?php
    include_once ROOT . '/models/ModelTimetable.class.php';

    class TimetableController {
        public function actionStart() {
            require_once ROOT . '/views/viewTimetable.php';
            return (true);
        }
    }