<?php

include_once(AppRoot . AppController . "cSurveyController.php");


$cSurveyControllerObj = new cSurveyController();

if ($_GET['a'] == 'd') {

    $cSurveyControllerObj->table = "test_details";
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
    $cSurveyControllerObj->table = "test_details";
    if ($_POST["test_id"]) {
        $cSurveyControllerObj->column["last_modified"] = date(AppDateFormatDbInput);
        $cSurveyControllerObj->curd("edit", $_POST["test_id"]);
        $cSurveyControllerObj->table = "answers";
        $cSurveyControllerObj->addWhereCondition("question_id in (select id from questions where test_id=" . $_POST["test_id"] . ")")->delete()->executeWrite();

        $cSurveyControllerObj->table = "questions";
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
        $cSurveyControllerObj->table = "questions";

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
            $cSurveyControllerObj->table = "answers";
            $cSurveyControllerObj->curd("add");
        }
    }

    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

$id = $_GET['id'];
if ($id != '') {
    list($testDetails) = $cSurveyControllerObj->getTestDetails($id);
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


    $cSurveyControllerObj->column["category"] = $testDetails["category"];
    $cSurveyControllerObj->column["name"] = $testDetails["name"];
    $cSurveyControllerObj->column["description"] = $testDetails["description"];
    $cSurveyControllerObj->column["valid_from"] = $testDetails["valid_from"];
    $cSurveyControllerObj->column["valid_to"] = $testDetails["valid_to"];
    $cSurveyControllerObj->column["time_taken"] = $testDetails["time_taken"];
    $cSurveyControllerObj->column["sharing"] = $testDetails["sharing"];
    $cSurveyControllerObj->column["allow_correction"] = $testDetails['allow_correction'];
    $cSurveyControllerObj->column["status"] = 1;
    $cSurveyControllerObj->column["total_marks"] = $testDetails['total_marks'];
    $cSurveyControllerObj->column["date_created"] = date(AppDateFormatDbInput);
    $cSurveyControllerObj->column["created_by"] = $_SESSION["user_id"];

    $cSurveyControllerObj->table = "test_details";
    $cSurveyControllerObj->curd("add");
    $testid = $cSurveyControllerObj->id;
    foreach ($questiondata as $key => $value) {

        $cSurveyControllerObj->column["question_type"] = $value['question_type'];
        $cSurveyControllerObj->column["question"] = $value['question'];
        $cSurveyControllerObj->column["test_id"] = $testid;
        $cSurveyControllerObj->column["level_id"] = 1;
        $cSurveyControllerObj->table = "questions";

        $cSurveyControllerObj->curd("add");
        $questionid = $cSurveyControllerObj->id;
        foreach ($value['answers'] as $key1 => $value1) {
            $cSurveyControllerObj->column["answer"] = $value1['answer'];
            $cSurveyControllerObj->column["match_answer"] = $value1['match_answer'];
            $cSurveyControllerObj->column["is_correct"] = $value1['is_correct'];
            $cSurveyControllerObj->column["percent"] = $value1['correctness_percentage'];
            $cSurveyControllerObj->column["question_id"] = $questionid;
            $cSurveyControllerObj->table = "answers";
            $cSurveyControllerObj->curd("add");
        }
    }
    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

$testDetails['allow_correction'] = $testDetails['allow_correction'] ? 'checked' : '';
if ($testDetails['valid_from'] && $testDetails['valid_to']) {

    $testDetails['valid_from'] = date(AppDateFormatPhp, strtotime($testDetails['valid_from']));
    $testDetails['valid_to'] = date(AppDateFormatPhp, strtotime($testDetails['valid_to']));
}
$questiondata = $questiondata ? json_encode($questiondata) : "{}";
$currentRow = $testDetails['question_count'] ? ((int) $testDetails['question_count'] ) : 0;

$pagename = "Create Survey";
$pagedescription = "Create a Survey with Questions";
?>