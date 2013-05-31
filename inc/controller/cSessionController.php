<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cSessionController
 *
 * @author gt
 */
include_once 'cController.php';

class cSessionController extends cController {

    public $sessionName = "";

    function createSession($user_id) {



        session_set_cookie_params(0, '/', '', 0);
        //hash is faster than md5 also we can change the functions easily in future.
        $this->sessionName = hash('md5', $user_id . time());
        setcookie(hash('md5', 'megamtech'), $this->sessionName);

        //session_name($this->sessionName);

        $this->sessionName($user_id);
        session_start();
        $this->SessionValue('session_started', time());
    }

    function SessionValue($key, $value = NULL, $unset = FALSE) {
        if ($value === NULL) {
            return $_SESSION[$key];
        } elseif ($unset == true) {
            return session_unset($key);
        } else {
            $_SESSION[$key] = $value;
        }
    }

    function removeSession() {
        session_destroy();
    }

    function sessionName($user_id) {
        $this->table = "__sessions";
        if ($this->sessionName == "") {
            $sessionDetails = $this->addWhereCondition("id=" . $user_id)->select()->executeRead();
            return $sessionDetails[0]['session_name'];
        } else {
            $this->addWhereCondition("id=" . $user_id)->delete()->executeWrite();
            $this->table = "__sessions";
            $this->column = array("user_id" => $user_id, "session_name" => $this->sessionName);
            $this->create()->executeWrite();
            return $name;
        }
    }

}

?>
