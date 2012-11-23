<?php

include_once(AppRoot . AppController . "cTestController.php");

$cTestControllerObj = new cTestController();

if ($_POST) {
    print_r($_POST);
    $data=$cTestControllerObj ->getTestDetails($_POST["test_id"]);
    print_r($data);
    $numbers = range(1, $data[0]["question_count"]);
    print_r($numbers);
    shuffle($numbers);
    print_r($numbers);
}
?>
