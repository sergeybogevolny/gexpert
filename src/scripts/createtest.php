<?php

include_once(AppRoot . AppController . "cTestController.php");


$cTestControllerObj = new cTestController();
if ($_POST["questionsdata"]) {
    print_r($_POST);
    //category,`name`,description,logo,date_created,created_by,last_modified,valid_from,valid_to,status
    $cTestControllerObj->column["category"] = 2;
    $cTestControllerObj->column["name"] = $_POST["testname"];
    $cTestControllerObj->column["description"] = $_POST["description"];
    $cTestControllerObj->column["logo"] = $_POST["logo"];
    //$cTestControllerObj->column["date_created"]=$_POST[];
    $cTestControllerObj->column["created_by"] = 1;
    //$cTestControllerObj->column["last_modified"]=$_POST[];
    //list( $start_date, $end_date) = explode("-",$_POST["activedates"]);
    //echo $cFormObj->formatDate(strtotime($start_date),"")."--";
    //echo strtotime($end_date)."--";
//    $cTestControllerObj->column["valid_from"]=  explode($_POST["activedates"]);
//    $cTestControllerObj->column["valid_to"]=$_POST["activedates"];
    $cTestControllerObj->column["time_taken"] = $_POST["testtime"];
    $cTestControllerObj->column["instruction"] = $_POST["instruction"];
    $cTestControllerObj->table = "test_details";
    $cTestControllerObj->curd("add");
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
