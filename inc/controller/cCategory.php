<?php

include_once('cController.php');

class cCategory extends cController {

    function __construct() {
        parent::__construct();
        $this->table = "category";
    }
    

}

?>
