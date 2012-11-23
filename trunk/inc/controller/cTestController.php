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

    function getTestDetails($id) {
        $this->column = array("id", "name", "description", "logo", "created_by", "status");
        $testDetails=$this->curd("view", $id);
        $this->table = "questions";
        $questions=$this->addWhereCondition("test_id=".$id)->select()->executeRead();
        $testDetails[0]["question_count"]=count($questions);
        return $testDetails;
        
    }

}

?>
