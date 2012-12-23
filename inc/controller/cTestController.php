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

    public $questionId = "";
    public $questionType = "";

    function __construct() {
        parent::__construct();
        $this->table = "test_details";
    }

    function getTestDetails($id) {
        $this->column = array("id", "name", "description", "logo", "created_by", "status");
        $testDetails = $this->curd("view", $id);
        $this->table = "questions";
        $questions = $this->addWhereCondition("test_id=" . $id)->select()->executeRead();
        $testDetails[0]["question_count"] = count($questions);
        return $testDetails;
    }

    function getQuestionDetails($id) {
        $this->table = "questions";
        return $this->addWhereCondition("test_id=" . $id)->select()->executeRead();
    }

    function getQuestion($id) {
        $this->table = "questions";
        return $this->addWhereCondition("id=" . $id)->select()->executeRead();
    }

    function getOptions($id) {
        $this->table = "answers";

        return $this->addWhereCondition("question_id=" . $id)->select()->executeRead();
        
    }

    function createQuestion($id) {
        $questionDetails = $this->getQuestionDetails($id);
        $this->questionId = $questionDetails[0]['id'];
        $this->questionType = $questionDetails[0]['question_type'];
        switch ($this->questionType) {
            case "1":
                $this->createMultipleOption();
                break;
            case "2":
                $this->createMultipleResponse();
                break;
            case "3":
                $this->createTrueFalse();
                break;
            case "4":
                $this->createFillInTheBlanks();
                break;
            case "5":
                $this->createMatching();
                break;
            case "6":
                $this->createSequencing();
                break;
        }
    }

}

?>
