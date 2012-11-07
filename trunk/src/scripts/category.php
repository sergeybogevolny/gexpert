<?php

include_once(AppRoot . AppController . "cCategory.php");

$cCategoryObj = new cCategory();


if ($_POST) {

    $cCategoryObj->column['name'] = $_POST['name'];
    $cCategoryObj->column['code'] = $_POST['code'];
    $cCategoryObj->column['logo'] = $_POST['logo'];
    $cCategoryObj->column['status'] = $_POST['status'] == 'on' ? 1 : 0;

    $action = $_POST['id'] ? "edit" : "add";
    $result = $cCategoryObj->curd($action, $_POST['id']);

    $cFormObj->options["alert"]["type"] = 'info';
    $cFormObj->options["alert"]["title"] = "Information";
    $cFormObj->options["alert"]["data"] = "[".$result."] - Data Added Sucessfully!!!" ;
    
    $cFormObj->addAlert();
    echo $cFormObj->html();
}

$cCategoryObj->table = "category";
$cFormObj->data = $cCategoryObj->curd();

$cFormObj->options['actioncolumn'] = true;
$cFormObj->options['header'] = array("Id", "Name", "Code", "Logo", "Created", "Status");
$cFormObj->options['customcontrol'] = array("status" => array("1" => "Active", "0" => "In Active"));
$cFormObj->options['column']['type']['date_created'] = 'date';
$cFormObj->options['column']['format']['date_created'] = '%d/%m/%Y';


$cFormObj->createHTable();
$datatable = $cFormObj->html();
?>







