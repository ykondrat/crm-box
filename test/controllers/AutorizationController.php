<?php

include_once ROOT . '/models/Model_autorization.php';

class AutorizationController
{
    public function actionLogin()
    {
        Model_autorization::do_login();

        require_once ROOT . '/views/main.php';
        return TRUE;
    }

    public function actionSignup()
    {
        Model_autorization::do_signup();



        require_once ROOT . '/views/main.php';
        echo ("<script>window.setTimeout(function(){ window.location = \"http://localhost:8080/IVI-Salon/\"; },5000);</script>");

        return TRUE;
    }

    public function actionLogout()
    {
        Model_autorization::do_logout();

        require_once ROOT . '/views/main.php';
        return TRUE;
    }

    public function actionActivation($login, $act)
    {
        Model_autorization::do_activation($login, $act);


        require_once ROOT . '/views/main.php';
        echo ("<script>window.location = \"http://localhost:8080/IVI-Salon/\";</script>");

        return TRUE;

    }

    public function actionForgot_pass()
    {
       Model_autorization::do_forgot();

        require_once ROOT . '/views/main.php';
        return TRUE;

    }

    public function actionChange_pass($login, $act)
    {
        Model_autorization::do_check_user_for_new_pass($login, $act);
    }

    public function actionDo_change_pass()
    {
       Model_autorization::do_pass_change();


        require_once (ROOT.'/views/main.php');
        return TRUE;
    }

    public function actionModify()
    {
        $session = Session::getInstance();

        if ( isset($session->logged_user) )
        {
            Model_autorization::do_modify_pass();
            Model_autorization::do_modify_email();

            Model_autorization::do_modify_login();

            Model_autorization::do_delete_account();
        }
        require_once ROOT . '/views/main.php';
        return TRUE;
    }
}