<?php

include_once('cController.php');

class cRegister extends cController {

    function __construct() {
        parent::__construct();
        $this->table = "__users";
    }
    

}

?>