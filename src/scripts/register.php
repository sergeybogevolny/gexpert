<?php

include_once(AppRoot . AppController . "cRegister.php");

$cRegisterObj = new cRegister();


if ($_POST) {

    $cRegisterObj->column['name'] = $_POST['name'];
    $cRegisterObj->column['employee_code'] = $_POST['employee_code'];
    $cRegisterObj->column['email'] = $_POST['email'];
    $cRegisterObj->column['phone'] = $_POST['phone'];
    $cRegisterObj->column['username'] = $_POST['username'];
    $cRegisterObj->column['password'] = $_POST['password'];

    $action = $_POST['id'] ? "edit" : "add";
    $result = $cRegisterObj->curd($action, $_POST['id']);

    $cFormObj->options["alert"]["type"] = 'info';
    $cFormObj->options["alert"]["title"] = "Information";
    $cFormObj->options["alert"]["data"] = "[".$result."] - User Registered Sucessfully!!!" ;
    
    $cFormObj->addAlert();
    echo $cFormObj->html();
}


?>