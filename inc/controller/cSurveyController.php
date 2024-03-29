<?php

/**
 * Description of cSurveyController
 *
 * @author mgovindan
 */
include_once('cController.php');

class cSurveyController extends cController {

    public $questionId = "";
    public $questionType = "";

    function __construct() {
        parent::__construct();
        $this->table = "survey_details";
    }

    function getSurveyDetails($id) {
        $surveyDetails = $this->curd("view", $id);
        $this->table = "survey_questions";
        $questions = $this->addWhereCondition("test_id=" . $id)->select()->executeRead();
        $surveyDetails[0]["question_count"] = count($questions);
        return $surveyDetails;
    }

    function getQuestionDetails($id) {
        $this->table = "survey_questions";
        return $this->addWhereCondition("test_id=" . $id)->select()->executeRead();
    }

    function getQuestion($id) {
        $this->table = "survey_questions";
        return $this->addWhereCondition("id=" . $id)->select()->executeRead();
    }

    function getOptions($id) {
        $this->table = "survey_answers";

        return $this->addWhereCondition("question_id=" . $id)->select()->executeRead();
    }

    function getOption($id) {
        $this->table = "survey_answers";
        return $this->addWhereCondition("id=" . $id)->select()->executeRead();
    }

    function getCorrectAnswers($id, $questiontype) {
        $this->table = "survey_answers";
        if ($questiontype != 2) {
            $condition = " and value=1";
        }
        return $this->addWhereCondition("question_id=" . $id . $condition)->select()->executeRead();
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
            case "6":
                $this->createMatrixOptions();
                break;
            case "7":
                $this->createMatrixChoices();
                break;
            case "8":
                $this->createOptionsTable();
                break;
            case "9":
                $this->createRating();
                break;
            case "10":
                $this->createScale();
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

    function storeUserResponses($reponses, $userId) {

        foreach ($reponses as $key => $value) {
            $value['user_id'] = $userId;
            $this->column = $value;
            $this->table = "responses";
            $this->create()->executeWrite();
        }
    }

}

?>
