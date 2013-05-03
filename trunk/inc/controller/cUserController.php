<?php

/**
 * Description of cLayoutController
 *
 * @author mgovindan
 */
include_once AppRoot . AppModel . 'cUserModel.php';

class cUserController extends cUserModel {

    public $UserModel;
    public $userId;
    public $loginId;

    function __construct() {

        $this->UserModel = new cUserModel();
    }

    function validateCredencials($username, $password) {
        $userDetailsArray = $this->UserModel->validateLogin($username, $password);
        $this->userId = $userDetailsArray[0]['id'];


        $this->setSessionUserDetails();

        return $this->userId;
    }

    function setSessionUserDetails() {
        include_once AppRoot . AppController . 'cSessionController.php';
        $session = new cSessionController();
        if ($this->userId != '') {
            $userDetails = $this->UserModel->getUserDetails($this->userId);
            $session->SessionValue('name', $userDetails[0]['name']);
            $session->SessionValue('last_name', $userDetails[0]['last_name']);
            $session->SessionValue('middle_name', $userDetails[0]['middle_name']);
            $session->SessionValue('email', $userDetails[0]['email']);
            $session->SessionValue('phone', $userDetails[0]['phone']);
            $session->SessionValue('photo', $userDetails[0]['photo']);
            $session->SessionValue('sex', $userDetails[0]['sex']);
            $session->SessionValue('user_type', $userDetails[0]['user_type']);

            $session->SessionValue('user_restrictions', $userDetails[0]['user_restrictions']);
            $session->SessionValue('user_id', $this->userId);
        } else {
//            $session->SessionValue('pageerror', 'Login failed!!!');
        }
    }

}

?>
