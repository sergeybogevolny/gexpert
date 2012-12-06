<?php

/**
 * Description of cLayoutModel
 *
 * @author mgovindan
 */
include_once('cModel.php');

class cUserModel extends cModel {

    //put your code here


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

}

?>
