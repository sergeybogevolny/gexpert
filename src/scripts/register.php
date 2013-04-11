<?php

include_once(AppRoot . AppController . "cRegister.php");

$cRegisterObj = new cRegister();


if ($_POST) {


    $cRegisterObj->table = 'product_key_test_users';
    $pk = $cRegisterObj->addWhereCondition("product_key='" . $_POST['product_key'] . "' and test_user_id is null")->select()->executeRead();
    if ($pk[0]['id'] == '') {
        $cFormObj->options["alert"]["type"] = 'error';
        $cFormObj->options["alert"]["title"] = "Error";
        $cFormObj->options["alert"]["data"] = " Product key Already Registered ";
        $cFormObj->addAlert();
        echo $cFormObj->html();
    } else {
        $cRegisterObj->table = '__users';
        $cRegisterObj->column['name'] = $_POST['name'];
        $cRegisterObj->column['emp_code'] = $_POST['emplyoee_code'];
        $cRegisterObj->column['email'] = $_POST['email'];
        $cRegisterObj->column['phone'] = $_POST['phone'];
        $cRegisterObj->column['username'] = $_POST['username'];
        $cRegisterObj->column['password'] = md5($_POST['password']);
        $cRegisterObj->column['user_type'] = 2;

        $action = $_POST['id'] ? "edit" : "add";
        $result = $cRegisterObj->curd($action, $_POST['id']);

        $cRegisterObj->table = 'product_key_test_users';
        $cRegisterObj->column['test_user_id'] = $cRegisterObj->id;
        $cRegisterObj->addWhereCondition('id=' . $pk[0]['id'])->update()->executeWrite();
        $messageclass = 'info';
        $message = "User Registered Sucessfully!!!";
        header("Location:" . $cFormObj->createLinkUrl(array("f" => "login", "m" => $message, "mc" => $messageclass)));
        exit;
    }
}
$pagename = "User Registration";
$pagedescription = "Register to Take a test";
?>