<?php

include_once AppRoot . AppController . 'cUserController.php';


if (!empty($_POST)) {

    $UserController = new cUserController();
    $user_data = $UserController->validateCredencials($_POST['loginname'], $_POST['password']);

    if ($user_data != '') {
        $cFormObj->redirect(array("f" => AppHomePage));
        exit;
    } else {
        $cFormObj->redirect(array("f" => 'login'));
    }
}
?>
