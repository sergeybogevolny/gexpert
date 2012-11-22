<?php

include_once(AppRoot . AppController . "cTestController.php");

$cTestControllerObj = new cTestController();
if ($_POST["testname"]) {
    print_r($_POST);
    //category,`name`,description,logo,date_created,created_by,last_modified,valid_from,valid_to,status
    $cTestControllerObj->column["category"]=$_POST["subject"];
    $cTestControllerObj->column["name"]=$_POST["testname"];
    $cTestControllerObj->column["description"]=$_POST["description"];
    $cTestControllerObj->column["logo"]=$_POST["logo"];
    //$cTestControllerObj->column["date_created"]=$_POST[];
    $cTestControllerObj->column["created_by"]=1;
    //$cTestControllerObj->column["last_modified"]=$_POST[];
    //$cTestControllerObj->column["valid_from"]=$_POST["activedates"];
    //$cTestControllerObj->column["valid_to"]=$_POST["activedates"];
    $cTestControllerObj->column["time_taken"]=$_POST["testtime"];
    $cTestControllerObj->column["instruction"]=$_POST["instruction"];
    $cTestControllerObj->table="test_details";
    $cTestControllerObj->curd("add");
    $cTestControllerObj->debug=true;    
    echo $cTestControllerObj->id;
    //9860
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
