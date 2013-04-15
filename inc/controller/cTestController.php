<?php

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
        //$this->column = array("id", "name", "description", "logo", "created_by", "status");
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

    function getCorrectAnswers($id) {
        $this->table = "answers";
        return $this->addWhereCondition("question_id=" . $id . " and is_correct=1")->select()->executeRead();
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

    function updateScores($data) {
        $this->table = "scores";
        $is_scores = $this->addWhereCondition("user_id=" . $data['user_id'] . " and test_id=" . $data['test_id'])->select()->executeRead();
        $this->column = $data;
        $this->table = "scores";
        if ($is_scores[0]['id'] != '') {
            return $this->addWhereCondition("user_id=" . $data['user_id'] . " and test_id=" . $data['test_id'])->update()->executeWrite();
        } else {
            return $this->create()->executeWrite();
        }
    }

    function getScores($condition = "") {
        $this->column = array('score', 'test_time', 'total_questions', 'correct_answers', 'add_date');
        $this->table = "scores s";
        $this->join_condition = " join test_details td on s.test_id = td.id join `__users` u on u.id = s.user_id";
        return $this->addWhereCondition($condition)->select()->executeRead();
    }

    function getCertificateDetails($condition = "") {
        $this->column = array('score', 'u.name as username', 'td.name as test_name', 's.add_date', 'total_questions', 'correct_answers');
        $this->table = "scores s";
        $this->join_condition = " join test_details td on s.test_id = td.id join `__users` u on u.id = s.user_id";
        return $this->addWhereCondition($condition)->select()->executeRead();
    }

}

?>
