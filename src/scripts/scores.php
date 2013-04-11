<?php

include_once(AppRoot . AppController . "cTestController.php");
$cTestControllerObj = new cTestController();
if ($_SESSION['user_type'] > 1) {
    $condition[] = "user_id=" . $_SESSION['user_id'];
}

if ($_GET['id']) {
    $condition[] = " test_id=" . $_GET['id'];
}
$conditionArray = $cFormObj->createFilterCondition($_POST['filter_type'], $_POST['filter_data']);
if ($_GET['show'] == 'all') {
    $cTestControllerObj->column = array("username" => "username", 'score', 'test_time', 'total_questions', 'correct_answers', 'add_date');
} else {
//username,emp_code,email,phone,category
    $cTestControllerObj->column = array('score', 'test_time', 'total_questions', 'correct_answers', 'add_date');
}

$cTestControllerObj->table = "scores s";
$cTestControllerObj->join_condition = " join test_details td on s.test_id = td.id join `__users` u on u.id = s.user_id";
$scores = $cTestControllerObj->addWhereCondition($abc)->select()->executeRead();

$pagename = "Scores";
$pagedescription = "What you Scored";
?>
