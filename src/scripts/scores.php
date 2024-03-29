<?php

include_once(AppRoot . AppController . "cTestController.php");
$cTestControllerObj = new cTestController();




if ($_GET['show'] == 'all') {
    $cTestControllerObj->column = array("username" => "username", 'score', 'test_time', 'total_marks', 'total_questions', 'correct_answers', 'td.name', 'add_date', 'u.name as firstname', 'email');
    if ($_GET['id'] == "") {
        $cFormObj->options['column']['name'] = array('name' => "Test", 'type' => "string", 'sort' => true, 'index' => 1, 'filter' => 'box');
    }
    $cFormObj->options['column']['username'] = array('name' => "User", 'type' => "string", 'sort' => true, 'index' => 2, 'filter' => 'box');
    $cFormObj->options['column']['email'] = array('name' => "Email", 'type' => "string", 'sort' => true, 'index' => 3, 'filter' => 'box');
    $cFormObj->options['column']['firstname'] = array('name' => "Name", 'type' => "string", 'sort' => true, 'index' => 4, 'filter' => 'box');
    $cFormObj->options['column']['score'] = array('name' => "User Score", 'type' => "number", 'sort' => true, 'index' => 5, 'filter' => 'box');
    $cFormObj->options['column']['total_marks'] = array('name' => "Total Score", 'type' => "number", 'sort' => true, 'index' => 6, 'filter' => 'box');

    $cFormObj->options['column']['total_questions'] = array('name' => "Total Questions", 'type' => "string", 'sort' => true, 'index' => 7);
    $cFormObj->options['column']['correct_answers'] = array('name' => "Correct Answers", 'type' => "string", 'sort' => true, 'index' => 8);
    $cFormObj->options['column']['add_date'] = array("name" => 'Score Date', 'type' => "date", 'format' => AppDateFormatPhp, 'sort' => true, 'index' => 10, 'filter' => 'box');
    $cFormObj->options['column']['test_time'] = array('name' => "Test Time (Seconds)", 'type' => "string", 'sort' => true, 'index' => 9, 'filter' => 'box');
    $condition = $cFormObj->createFilterCondition($_POST['filter_type'], $_POST['filter_data']);
    if ($_SESSION['user_type'] > 1) {
        $condition[] = "s.user_id=" . $_SESSION['user_id'];
    }
} else {

    $cTestControllerObj->column = array('score', 'test_time', 'total_questions', 'total_marks', 'correct_answers', 'add_date', 'answers');
    $condition[] = "s.user_id=" . $_GET['user_id'];
}
if ($_GET['id']) {
    $condition[] = " td.id=" . $_GET['id'];
}
//$cTestControllerObj->debug = true;
$cTestControllerObj->table = "scores s";
$cTestControllerObj->join_condition = " join test_details td on s.test_id = td.id join `__users` u on u.id = s.user_id";
$scores = $cTestControllerObj->addWhereCondition($condition)->select()->executeRead();
$answersReview = json_decode($scores[0]['answers'], true);

$pagename = "Scores";
$pagedescription = "What you Scored";
?>
