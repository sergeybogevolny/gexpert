<?php

include_once(AppRoot . AppController . "cTestController.php");


$cTestControllerObj = new cTestController();

if ($_GET['a'] == 'd') {

    $cTestControllerObj->table = "test_details";
    $cTestControllerObj->column["last_modified"] = date(AppDateFormatDbInput);
    $cTestControllerObj->column["status"] = 0;
    $cTestControllerObj->addWhereCondition("id=" . $_GET["id"])->update()->executeWrite();
    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

if ($_POST["questionsdata"]) {

    list( $start_date, $end_date) = explode("-", $_POST["activedates"]);
    $cTestControllerObj->column["category"] = $_POST["category"];
    $cTestControllerObj->column["name"] = $_POST["name"];
    $cTestControllerObj->column["description"] = $_POST["description"];
    $cTestControllerObj->column["logo"] = $_POST["logo"];
    $cTestControllerObj->column["valid_from"] = date(AppDateFormatDbInput, strtotime($start_date));
    $cTestControllerObj->column["valid_to"] = date(AppDateFormatDbInput, strtotime($end_date));
    $cTestControllerObj->column["time_taken"] = $_POST["testtime"];
    $cTestControllerObj->column["sharing"] = $_POST["sharing"];
    $cTestControllerObj->column["allow_correction"] = $_POST["allow_review"] ? 1 : 0;
    $cTestControllerObj->column["status"] = 1;
    $cTestControllerObj->table = "test_details";
    if ($_POST["test_id"]) {
        $cTestControllerObj->column["last_modified"] = date(AppDateFormatDbInput);
        $cTestControllerObj->curd("edit", $_POST["test_id"]);
        $cTestControllerObj->table = "answers";
        $cTestControllerObj->addWhereCondition("question_id in (select id from questions where test_id=" . $_POST["test_id"] . ")")->delete()->executeWrite();

        $cTestControllerObj->table = "questions";
        $cTestControllerObj->addWhereCondition("test_id=" . $_POST["test_id"])->delete()->executeWrite();
    } else {
        $cTestControllerObj->column["date_created"] = date(AppDateFormatDbInput);
        $cTestControllerObj->column["created_by"] = $_SESSION["user_id"];
        $cTestControllerObj->curd("add");
    }


    $questions = (array) json_decode(stripslashes($_POST["questionsdata"]));
    $testid = $cTestControllerObj->id;

    foreach ($questions as $key => $value) {


        $cTestControllerObj->column["question_type"] = $value->question_type;
        $cTestControllerObj->column["question"] = $value->question;
        $cTestControllerObj->column["test_id"] = $testid;
        $cTestControllerObj->column["level_id"] = 1;
        $cTestControllerObj->table = "questions";

        $cTestControllerObj->curd("add");
        $questionid = $cTestControllerObj->id;
        foreach ($value->answers as $key1 => $value1) {
            $cTestControllerObj->column["answer"] = $value1->answer;
            $cTestControllerObj->column["match_answer"] = $value1->match_answer;
            $cTestControllerObj->column["is_correct"] = ($value1->is_correct) ? 1 : 0;
            $cTestControllerObj->column["percent"] = $value1->correctness_percentage;
            $cTestControllerObj->column["question_id"] = $questionid;
            $cTestControllerObj->table = "answers";
            $cTestControllerObj->curd("add");
        }
    }

    header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests")));
    exit;
}

$id = $_GET['id'];
if ($id != '') {
    list($testDetails) = $cTestControllerObj->getTestDetails($id);

    //$cTestControllerObj->debug = true;
    $questions = $cTestControllerObj->getQuestionDetails($id);
    $questiondata = array();
    foreach ($questions as $key => $question) {

        $questiondata[$key]["question_type"] = $question['question_type'];
        $questiondata[$key]["question"] = $question['question'];
        $questiondata[$key]['answers'] = array();
        $answers = $cTestControllerObj->getOptions($question['id']);

        foreach ($answers as $key1 => $answer) {
            $questiondata[$key]['answers'][$key1]['answer'] = $answer['answer'];
            $questiondata[$key]['answers'][$key1]['match_answer'] = $answer['match_answer'];
            $questiondata[$key]['answers'][$key1]['is_correct'] = $answer['is_correct'];
            $questiondata[$key]['answers'][$key1]['correctness_percentage'] = $answer[''];
        }
    }
}
if ($_GET['a'] == 'c') {


    $cTestControllerObj->column["category"] = $testDetails["category"];
    $cTestControllerObj->column["name"] = $testDetails["name"];
    $cTestControllerObj->column["description"] = $testDetails["description"];
    $cTestControllerObj->column["valid_from"] = $testDetails["valid_from"];
    $cTestControllerObj->column["valid_to"] = $testDetails["valid_to"];
    $cTestControllerObj->column["time_taken"] = $testDetails["time_taken"];
    $cTestControllerObj->column["sharing"] = $testDetails["sharing"];
    $cTestControllerObj->column["allow_correction"] = $testDetails['allow_correction'];
    $cTestControllerObj->column["status"] = 1;
    $cTestControllerObj->column["date_created"] = date(AppDateFormatDbInput);
    $cTestControllerObj->column["created_by"] = $_SESSION["user_id"];

    $cTestControllerObj->table = "test_details";
    $cTestControllerObj->curd("add");
    $testid = $cTestControllerObj->id;
    foreach ($questiondata as $key => $value) {

        $cTestControllerObj->column["question_type"] = $value['question_type'];
        $cTestControllerObj->column["question"] = $value['question'];
        $cTestControllerObj->column["test_id"] = $testid;
        $cTestControllerObj->column["level_id"] = 1;
        $cTestControllerObj->table = "questions";

        $cTestControllerObj->curd("add");
        $questionid = $cTestControllerObj->id;
        foreach ($value['answers'] as $key1 => $value1) {
            $cTestControllerObj->column["answer"] = $value1['answer'];
            $cTestControllerObj->column["match_answer"] = $value1['match_answer'];
            $cTestControllerObj->column["is_correct"] = $value1['is_correct'];
            $cTestControllerObj->column["percent"] = $value1['correctness_percentage'];
            $cTestControllerObj->column["question_id"] = $questionid;
            $cTestControllerObj->table = "answers";
            $cTestControllerObj->curd("add");
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

$pagename = "Create Test";
$pagedescription = "Create a test with Questions";
?>