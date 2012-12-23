<?php

include_once(AppRoot . AppController . "cTestController.php");
$cTestControllerObj = new cTestController();
$cUtil = new cUtil();

$data = $cTestControllerObj->curd("view", $_POST['test_id']);
$testName = $data[0]["name"];
for ($i = 1; $i <= $_POST['count']; $i++) {


    $skey = $cUtil->generateProductKey();
    $cTestControllerObj->table = "product_key_test_users";
    $sukey = $cTestControllerObj->addWhereCondition("product_key='" . $skey . "'")->select()->executeRead();
    if (count($sukey) > 0) {
        $i--;
    } else {
        if ($_POST["pretest"] === 'on') {
            $cTestControllerObj->table = "product_key_test_users";
            $cTestControllerObj->column = array("test_id" => $_POST["test_id"], "product_key" => $skey, "test_type_id" => 1);
            $cTestControllerObj->create()->executeWrite();
            $productKeys[$skey][] = 1;
        }
        if ($_POST["posttest"] === 'on') {
            $cTestControllerObj->table = "product_key_test_users";
            $cTestControllerObj->column = array("test_id" => $_POST["test_id"], "product_key" => $skey, "test_type_id" => 2);
            $cTestControllerObj->create()->executeWrite();
            $productKeys[$skey][] = 2;
        }
        if ($_POST["final"] === 'on') {
            $cTestControllerObj->table = "product_key_test_users";
            $cTestControllerObj->column = array("test_id" => $_POST["test_id"], "product_key" => $skey, "test_type_id" => 3);
            $cTestControllerObj->create()->executeWrite();
            $productKeys[$skey][] = 3;
        }
    }
}
//($cUtil)

print_r($productKeys);
?>
