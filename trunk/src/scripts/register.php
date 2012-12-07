<?php

include_once(AppRoot . AppController . "cRegister.php");

$cRegisterObj = new cRegister();


if ($_POST) {
    //select product_key as value,test_user_id from product_key_test_users where product_key='KV2H4N6BMGWFDWQ9' and test_user_id is null

    $cRegisterObj->table = 'product_key_test_users';
    $pk = $cRegisterObj->addWhereCondition("product_key='" . $_POST['product_key'] . "' and test_user_id is null")->select()->executeRead();
    if ($pk[0]['id']=='') {
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

        $action = $_POST['id'] ? "edit" : "add";
        $result = $cRegisterObj->curd($action, $_POST['id']);

        $cRegisterObj->table = 'product_key_test_users';
        $cRegisterObj->column['test_user_id'] = $cRegisterObj->id;
//        $cRegisterObj->column['test_user_id'] = $cRegisterObj->id;
        $cRegisterObj->addWhereCondition('id=' . $pk[0]['id'])->update()->executeWrite();
        $cFormObj->options["alert"]["type"] = 'info';
        $cFormObj->options["alert"]["title"] = "Success";
        $cFormObj->options["alert"]["data"] = "User Registered Sucessfully!!!";

        $cFormObj->addAlert();
        echo $cFormObj->html();
    }
}
?>