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


        $this->column = array('c', 'r', 'u', 'd', 'p.id', 'module_id');
        $this->table = '__user_type_permissions utp';
        $this->join_condition = "Join __permissions p on p.id=utp.permission_id";
        return $this->addWhereCondition("user_type_id=" . $user_type_id)->select()->executeRead();
    }

}

?>
