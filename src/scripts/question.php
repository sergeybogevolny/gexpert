<?php

include_once(AppRoot . AppController . "cTestController.php");

$cTestControllerObj = new cTestController();
print_r($_POST);
print_r($_GET);


if ($_POST) {
    print_r($_POST);
    $data=$cTestControllerObj ->getTestDetails($_POST["test_id"]);
    print_r($data);
    $question_numbers = range(1, $data[0]["question_count"]);
    print_r($question_numbers);
    shuffle($question_numbers);
    print_r($question_numbers);
    
    
}
if($_GET['type']=='ajax'){
    
    $questionDetails=$cTestControllerObj ->getQuestionDetails($_GET["index"]);
    print_r($questionDetails);
    
    
   //9176485554
    
    exit;
}
?>
