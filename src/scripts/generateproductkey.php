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
        $cTestControllerObj->table = "product_key_test_users";
        $cTestControllerObj->column = array("test_id" => $_POST["test_id"], "product_key" => $skey);
        $cTestControllerObj->create()->executeWrite();
        $productKeys[] = $skey;
    }
}
//($cUtil)

print_r($productKeys);
?>
