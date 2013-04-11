<?php

include_once(AppRoot . AppController . "cTestController.php");
$cTestControllerObj = new cTestController();


if ($_GET['id']) {
    $condition[] = " test_id=" . $_GET['id'];
}
$conditionArray = $cFormObj->createFilterCondition($_POST['filter_type'], $_POST['filter_data']);
if ($_GET['show'] == 'all') {
    $cTestControllerObj->column = array("username" => "username", 'score', 'test_time', 'total_questions', 'correct_answers', 'td.name', 'add_date');
} else {

    $cTestControllerObj->column = array('score', 'test_time', 'total_questions', 'correct_answers', 'add_date');
    $condition[] = "s.user_id=" . $_GET['user_id'];
}

$cTestControllerObj->table = "scores s";
$cTestControllerObj->join_condition = " join test_details td on s.test_id = td.id join `__users` u on u.id = s.user_id";
$scores = $cTestControllerObj->addWhereCondition($condition)->select()->executeRead();

$pagename = "Scores";
$pagedescription = "What you Scored";
?>
