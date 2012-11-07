<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cTestController
 *
 * @author mgovindan
 */
include_once('cController.php');

class cTestController extends cController {

    function __construct() {
        parent::__construct();
        $this->table = "test_details";
    }

}

?>
