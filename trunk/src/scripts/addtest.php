<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(AppRoot . AppController . "cTestController.php");
$cTestControllerObj = new cTestController();
$cUtil = new cUtil();


$cTestControllerObj->table = "product_key_test_users";
$availableKeys = $cTestControllerObj->addWhereCondition("product_key='" . $_GET['id'] . "' and status =1")->select()->executeRead();
if (count($availableKeys) > 0) {
    $cTestControllerObj->table = "product_key_test_users";
    $cTestControllerObj->column['status'] = 0;
    $cTestControllerObj->column['test_user_id'] = $_SESSION['user_id'];
    $cTestControllerObj->addWhereCondition("product_key='" . $_GET['id'] . "' and status =1")->update()->executeWrite();
    $message = "Test Added";
    $messageclass = "success";
} else {

    $message = "Test Key is not Valid";
    $messageclass = "error";
}
header("Location:" . $cFormObj->createLinkUrl(array("f" => "tests", "m" => $message, "mc" => $messageclass)));
exit;
?>