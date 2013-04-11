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
    $cFormObj->options["alert"]["data"] = "[" . $result . "] - Data Added Sucessfully!!!";

    $cFormObj->addAlert();
    echo $cFormObj->html();
}

$cCategoryObj->table = "category";
$cFormObj->data = $cCategoryObj->curd();

$cFormObj->options['actioncolumn'] = true;
$cFormObj->options['column']['id'] = array('name' => "Id", 'type' => "number", 'sort' => true, 'index' => 1);
$cFormObj->options['column']['name'] = array('name' => "Name", 'type' => "string", 'sort' => true, 'index' => 1);
$cFormObj->options['column']['code'] = array('name' => "Code", 'type' => "string", 'sort' => true, 'index' => 1);
$cFormObj->options['column']['logo'] = array('name' => "logo", 'type' => "string", 'sort' => true, 'index' => 1);
$cFormObj->options['column']['date_created'] = array('name' => "Date", 'format' => AppDateFormatPhp, 'type' => "date", 'sort' => true, 'filter' => 'box', 'index' => 1);
$cFormObj->options['column']['status'] = array('name' => "Status", 'type' => "string", 'data' => array("1" => "Active", "0" => "In Active"), 'sort' => true, 'filter' => 'inline', 'index' => 1);



$cFormObj->createHTable();
$datatable = $cFormObj->html();

$pagename = "Category";
$pagedescription = "Create Category for Tests";
?>
