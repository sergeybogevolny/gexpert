<?php

/**
 * Description of cLayoutModel
 *
 * @author mgovindan
 */
include_once('cModel.php');

class cUserModel extends cModel {

    function __construct() {
        parent::__construct();
    }

    function validateLogin($username, $password) {
        $this->table = '__users';
        return $this->addWhereCondition("username='" . $username . "' And password='" . md5($password) . "'")->select()->executeRead();
    }

    function getUserDetails($user_id) {
        $this->table = '__users';
        return $this->addWhereCondition("id=" . $user_id)->select()->executeRead();
    }

    function getUserPermissions($user_type_id) {

        $this->debug = true;
        $this->table = '__user_type_permissions';
        return $this->addWhereCondition("user_type_id=" . $user_type_id)->select()->executeRead();
    }

}

?>
