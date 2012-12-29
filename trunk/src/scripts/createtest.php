<?php

include_once(AppRoot . AppController . "cTestController.php");


$cTestControllerObj = new cTestController();

if ($_POST["questionsdata"]) {


    $cTestControllerObj->column["category"] = $_POST["category"];
    $cTestControllerObj->column["name"] = $_POST["testname"];
    $cTestControllerObj->column["description"] = $_POST["description"];
    $cTestControllerObj->column["logo"] = $_POST["logo"];
    $cTestControllerObj->column["date_created"] = $cFormObj->formatDate(date(), AppDateFormatDbInput);
    $cTestControllerObj->column["created_by"] = $_SESSION["user_id"];
    //$cTestControllerObj->column["last_modified"]=$_POST[];
    list( $start_date, $end_date) = explode("-", $_POST["activedates"]);
    $cTestControllerObj->column["valid_from"] = $cFormObj->formatDate(strtotime($start_date), AppDateFormatDbInput);
    $cTestControllerObj->column["valid_to"] = $cFormObj->formatDate(strtotime($end_date), AppDateFormatDbInput);
    $cTestControllerObj->column["time_taken"] = $_POST["testtime"];
    $cTestControllerObj->column["sharing"] = $_POST["sharing"];
    $cTestControllerObj->column["allow_correction"] = $_POST["allow_review"] ? $_POST["allow_review"] : "";

    $cTestControllerObj->table = "test_details";
    if ($_POST["test_id"]) {
        $cTestControllerObj->curd("edit", $_POST["test_id"]);

        $cTestControllerObj->table = "questions";
        $cTestControllerObj->addWhereCondition("test_id=" . $_POST["test_id"])->delete()->executeWrite();
        $cTestControllerObj->table = "answers";
        $cTestControllerObj->addWhereCondition("question_id in (select id from questions where test_id=" . $_POST["test_id"] . ")")->delete()->executeWrite();
    } else {
        $cTestControllerObj->curd("add");
    }

    $cTestControllerObj->debug = true;
    $questions = (array) json_decode($_POST["questionsdata"]);
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
            $cTestControllerObj->column["is_correct"] = ($value1->multipleanswer || $value1->multipleoption) ? 1 : 0;
            $cTestControllerObj->column["percent"] = $value1->correctness_percentage;
            $cTestControllerObj->column["question_id"] = $questionid;
            $cTestControllerObj->table = "answers";
            $cTestControllerObj->curd("add");
        }
    }

    echo 'asdasdasd';

    exit;
}

$id = $_GET['id'];
if ($id != '') {
    list($testDetails) = $cTestControllerObj->getTestDetails($id);
    if ($testDetails['valid_from'] && $testDetails['valid_to']) {
        $testDetails['valid_from'] = date('F j,Y', strtotime($testDetails['valid_from']));
        $testDetails['valid_to'] = date('F j,Y', strtotime($testDetails['valid_to']));
    }
    $testDetails['allow_correction'] = $testDetails['allow_correction'] ? 'checked' : '';
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
$questiondata = $questiondata ? json_encode($questiondata) : "{}";
$currentRow = $testDetails['question_count'] ? ((int) $testDetails['question_count'] ) : 0;
//if ($_GET['type']=='ajax') {
//  print_r($_GET);
// print_r($_POST);
// $cTestControllerObj->column["category"]=$_POST[];
//  category,`name`,description,logo,date_created,created_by,last_modified,status
//  "select  from test_details "
//     [testname] => asdasd
//    [subject] => 2
//    [description] => asdasd
//    [instructions] => asdasd
//    [_wysihtml5_mode] => 1
//    [activedates] => 10/31/2012 - 12/01/2012
//    [testtime] => 120
//    [question_type] => multiplechoice
//    [question] => asdasdasd
//    [answer] => asd
//    [match_answer] => asd
//    [multipleanswer_1] => on
//    [correctanswer] => on
//    [correctness_percentage] => asd
//exit;
//}
?>
