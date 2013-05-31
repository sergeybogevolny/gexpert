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
    public $userTypeId;
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
            $session->createSession($this->userId);
            $userDetails = $this->UserModel->getUserDetails($this->userId);
            $this->userTypeId = $userDetails[0]['user_type'];
            $session->SessionValue('name', $userDetails[0]['name']);
            $session->SessionValue('user_type', $this->userTypeId);
            $session->SessionValue('user_id', $this->userId);
            $userPermissons = $this->setSessionUserPermissions();
            foreach ($userPermissons as $row => $record) {
                $permissions[$record['module_id']] = $record['permission_id'];
            }
            $session->SessionValue('user_permissions', $permissions);
        } else {
            //$session->SessionValue('pageerror', 'Login failed!!!');
        }
    }

    function setSessionUserPermissions() {


        return $this->UserModel->getUserPermissions($this->userTypeId);
    }

}

?>
