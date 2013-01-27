<?php

include_once(AppRoot . AppController . "cTestController.php");
$cTestControllerObj = new cTestController();
$scores = $cTestControllerObj->getScores("user_id=" . $_SESSION['user_id'] . " and test_id=" . $_GET['id']);
?>
