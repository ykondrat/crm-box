<?php


class SiteController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/main.php');

        return True;
    }

    public function actionSave_service()
    {
        Model_site::save_service($_POST['service_type'], $_POST['service_name'], $_POST['service_price'], $_POST['service_time'], $_POST['service_desc']);

//        require_once(ROOT . '/views/main.php');
        return (TRUE);

    }

    public function actionSave_Timetable()
    {
        Model_site::save_timetable($_POST['data'], $_POST['time'], $_POST['section'], $_POST['master_timetable'], $_POST['service_visits'], $_POST['price'], $_POST['duration'], $_POST['phone_numb'], $_POST['client_name'], $_POST['extra'], $_POST['discount_type'], $_POST['discount'],  $_POST['discription'],  $_POST['all']);

        require_once(ROOT . '/views/main.php');
        return (TRUE);
    }

    public function actionTake_service()
    {
        Model_site::take_service();

        //require_once(ROOT . '/views/main.php');
        return (TRUE);
    }

    public function actionTake_personel()
    {
        Model_site::take_personel();

        return (TRUE);
    }
    // ADD by Yevhen Kondratyev
    public function actionTake_service_from_section(){
        Model_site::take_service_from_section();

        return (TRUE);
    }
    public function actionTake_price_duration(){
        Model_site::take_price_duration();

        return (TRUE);
    }
    public function actionTake_master_for_list(){
        Model_site::take_master_for_list();

        return (TRUE);
    }
    public function actionTake_service_list() {
        Model_site::take_service_list();

        return (TRUE);
    }
    public function  actionTake_master_to_service() {
        Model_site::take_master_to_service();

        return (TRUE);
    }
    // finish Yevhen Kondratyev

    public function actionTakePost()
    {
        Model_site::take_post();

        return (TRUE);
    }

    public function actionTakeService_section()
    {
        Model_site::take_serviceSection();

        return (TRUE);
    }

    public function actionSave_client()
    {
        Model_site::save_client($_POST['client_name'], $_POST['client_sex'],  $_POST['client_phone'],  $_POST['client_description']);

        return (TRUE);
    }

    public function actionTake_clients()
    {
        Model_site::take_clients();

        return (TRUE);
    }

    public function actionPersonel_save()
    {
        Model_site::personel_save($_POST['worker_name_secname'], $_POST['worker_telephon_number'], $_POST['worker_email'], $_POST['worker_post'], $_POST['discription'], $_POST['worker_image']);

        return (TRUE);
    }

    public function actionNew_section()
    {
        Model_site::new_section($_POST['section_name']);

        return (TRUE);
    }

    public function actionNew_post()
    {
        Model_site::new_post($_POST['post_name']);

        return (TRUE);
    }
//----------------------------------- SANDRUSE
    public function actionEdit_client()
    {
        Model_site::edit_client($_POST['client_id'], $_POST['client_name'], $_POST['client_sex'],  $_POST['client_phone'],  $_POST['client_description']);

        return (TRUE);
    }
    public function actionEdit_service()
    {
        Model_site::edit_service($_POST['service_type'], $_POST['service_name'], $_POST['service_price'], $_POST['service_time'], $_POST['service_desc'], $_POST['service_id'] );

        return (TRUE);
    }

    public function actionEdit_timetable()
    {
        Model_site::edit_timetable($_POST['data'], $_POST['time'], $_POST['section'], $_POST['master_timetable'], $_POST['service_visits'], $_POST['price'], $_POST['duration'], $_POST['phone_numb'], $_POST['client_name'], $_POST['extra'], $_POST['discount_type'], $_POST['discount'],  $_POST['discription'],  $_POST['all'], $_POST['id_visit']);

       return (TRUE);
    }

    public function actionEdit_master()
    {
        Model_site::edit_master($_POST['worker_name_secname'], $_POST['worker_telephon_number'], $_POST['worker_email'], $_POST['worker_post'], $_POST['discription'], $_POST['master_photo'], $_POST['master_id']);

        return (TRUE);
    }

    public function actionDelete_list()
    {
        Model_site::delete_list();

        return (TRUE);
    }

    public function actionDelete_visits()
    {
        Model_site::delete_visits($_POST['visit_date'], $_POST['visit_time'], $_POST['client_name'], $_POST['client_phone']);

        return (TRUE);
    }


    //    ____________________________________________
}
