<?php

include_once(AppRoot . AppController . "cSurveyController.php");


$cSurveyControllerObj = new cSurveyController();

if ($_GET['a'] == 'd') {

    $cSurveyControllerObj->table = "survey_details";
    $cSurveyControllerObj->column["last_modified"] = date(AppDateFormatDbInput);
    $cSurveyControllerObj->column["status"] = 0;
    $cSurveyControllerObj->addWhereCondition("id=" . $_GET["id"])->update()->executeWrite();
    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

if ($_POST["questionsdata"]) {

    list( $start_date, $end_date) = explode("-", $_POST["activedates"]);
    $cSurveyControllerObj->column["category"] = $_POST["category"];
    $cSurveyControllerObj->column["name"] = $_POST["name"];
    $cSurveyControllerObj->column["description"] = $_POST["description"];
    $cSurveyControllerObj->column["logo"] = $_POST["logo"];
    $cSurveyControllerObj->column["valid_from"] = date(AppDateFormatDbInput, strtotime($start_date));
    $cSurveyControllerObj->column["valid_to"] = date(AppDateFormatDbInput, strtotime($end_date));
    $cSurveyControllerObj->column["time_taken"] = $_POST["testtime"];
    $cSurveyControllerObj->column["sharing"] = $_POST["sharing"];
    $cSurveyControllerObj->column["allow_correction"] = $_POST["allow_review"] ? 1 : 0;
    $cSurveyControllerObj->column["total_marks"] = $_POST["total_marks"];
    $cSurveyControllerObj->column["status"] = 1;
    $cSurveyControllerObj->table = "survey_details";
    if ($_POST["test_id"]) {
        $cSurveyControllerObj->column["last_modified"] = date(AppDateFormatDbInput);
        $cSurveyControllerObj->curd("edit", $_POST["test_id"]);
        $cSurveyControllerObj->table = "survey_answers";
        $cSurveyControllerObj->addWhereCondition("question_id in (select id from questions where test_id=" . $_POST["test_id"] . ")")->delete()->executeWrite();

        $cSurveyControllerObj->table = "survey_questions";
        $cSurveyControllerObj->addWhereCondition("test_id=" . $_POST["test_id"])->delete()->executeWrite();
    } else {
        $cSurveyControllerObj->column["date_created"] = date(AppDateFormatDbInput);
        $cSurveyControllerObj->column["created_by"] = $_SESSION["user_id"];
        $cSurveyControllerObj->curd("add");
    }


    $questions = (array) json_decode(stripslashes($_POST["questionsdata"]));
    $testid = $cSurveyControllerObj->id;

    foreach ($questions as $key => $value) {


        $cSurveyControllerObj->column["question_type"] = $value->question_type;
        $cSurveyControllerObj->column["question"] = $value->question;
        $cSurveyControllerObj->column["test_id"] = $testid;
        $cSurveyControllerObj->column["level_id"] = 1;
        $cSurveyControllerObj->table = "survey_questions";

        $cSurveyControllerObj->curd("add");
        $questionid = $cSurveyControllerObj->id;
        foreach ($value->answers as $key1 => $value1) {
            $cSurveyControllerObj->column["answer"] = $value1->answer;
            $cSurveyControllerObj->column["match_answer"] = $value1->match_answer;
            if ($value->question_type == '3' || $value->question_type == '4' || $value->question_type == '5') {
                $cSurveyControllerObj->column["is_correct"] = 1;
            } else {
                $cSurveyControllerObj->column["is_correct"] = ($value1->is_correct) ? 1 : 0;
            }
            $cSurveyControllerObj->column["percent"] = $value1->correctness_percentage;
            $cSurveyControllerObj->column["question_id"] = $questionid;
            $cSurveyControllerObj->table = "survey_answers";
            $cSurveyControllerObj->curd("add");
        }
    }

    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

$id = $_GET['id'];
if ($id != '') {
    list($surveyDetails) = $cSurveyControllerObj->getSurveyDetails($id);
    $questions = $cSurveyControllerObj->getQuestionDetails($id);
    $questiondata = array();
    foreach ($questions as $key => $question) {

        $questiondata[$key]["question_type"] = $question['question_type'];
        $questiondata[$key]["question"] = $question['question'];
        $questiondata[$key]['answers'] = array();
        $answers = $cSurveyControllerObj->getOptions($question['id']);

        foreach ($answers as $key1 => $answer) {
            $questiondata[$key]['answers'][$key1]['answer'] = $answer['answer'];
            $questiondata[$key]['answers'][$key1]['match_answer'] = $answer['match_answer'];
            $questiondata[$key]['answers'][$key1]['is_correct'] = $answer['is_correct'];
            $questiondata[$key]['answers'][$key1]['correctness_percentage'] = $answer[''];
        }
    }
}
if ($_GET['a'] == 'c') {


    $cSurveyControllerObj->column["category"] = $surveyDetails["category"];
    $cSurveyControllerObj->column["name"] = $surveyDetails["name"];
    $cSurveyControllerObj->column["description"] = $surveyDetails["description"];
    $cSurveyControllerObj->column["valid_from"] = $surveyDetails["valid_from"];
    $cSurveyControllerObj->column["valid_to"] = $surveyDetails["valid_to"];
    $cSurveyControllerObj->column["time_taken"] = $surveyDetails["time_taken"];
    $cSurveyControllerObj->column["sharing"] = $surveyDetails["sharing"];
    $cSurveyControllerObj->column["allow_correction"] = $surveyDetails['allow_correction'];
    $cSurveyControllerObj->column["status"] = 1;
    $cSurveyControllerObj->column["total_marks"] = $surveyDetails['total_marks'];
    $cSurveyControllerObj->column["date_created"] = date(AppDateFormatDbInput);
    $cSurveyControllerObj->column["created_by"] = $_SESSION["user_id"];

    $cSurveyControllerObj->table = "survey_details";
    $cSurveyControllerObj->curd("add");
    $testid = $cSurveyControllerObj->id;
    foreach ($questiondata as $key => $value) {

        $cSurveyControllerObj->column["question_type"] = $value['question_type'];
        $cSurveyControllerObj->column["question"] = $value['question'];
        $cSurveyControllerObj->column["test_id"] = $testid;
        $cSurveyControllerObj->column["level_id"] = 1;
        $cSurveyControllerObj->table = "survey_questions";

        $cSurveyControllerObj->curd("add");
        $questionid = $cSurveyControllerObj->id;
        foreach ($value['answers'] as $key1 => $value1) {
            $cSurveyControllerObj->column["answer"] = $value1['answer'];
            $cSurveyControllerObj->column["match_answer"] = $value1['match_answer'];
            $cSurveyControllerObj->column["is_correct"] = $value1['is_correct'];
            $cSurveyControllerObj->column["percent"] = $value1['correctness_percentage'];
            $cSurveyControllerObj->column["question_id"] = $questionid;
            $cSurveyControllerObj->table = "survey_answers";
            $cSurveyControllerObj->curd("add");
        }
    }
    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

$surveyDetails['allow_correction'] = $surveyDetails['allow_correction'] ? 'checked' : '';
if ($surveyDetails['valid_from'] && $surveyDetails['valid_to']) {

    $surveyDetails['valid_from'] = date(AppDateFormatPhp, strtotime($surveyDetails['valid_from']));
    $surveyDetails['valid_to'] = date(AppDateFormatPhp, strtotime($surveyDetails['valid_to']));
}
$questiondata = $questiondata ? json_encode($questiondata) : "{}";
$currentRow = $surveyDetails['question_count'] ? ((int) $surveyDetails['question_count'] ) : 0;

$pagename = "Create Survey";
$pagedescription = "Create a Survey with Questions";
?>