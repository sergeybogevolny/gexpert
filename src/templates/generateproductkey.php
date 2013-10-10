<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>">
    <!--<div class="control-group">-->
    <?php
//        $cTestControllerObj->column = array("id", "code", "test_name");
//        $cTestControllerObj->table = "test_type";
//        $data = $cTestControllerObj->select()->executeRead();
//
//        foreach ($data as $key => $value) {
//
//            $cFormObj->options['name'] = $value["code"];
//            $cFormObj->options['id'] = $value["code"];
//            $cFormObj->options['value'] = $value["id"];
//            $cFormObj->data = $value["test_name"];
//            $cFormObj->createCheckBox();
//            echo $cFormObj->html();
//        }
    ?>

    <!--</div>-->


    <div class="control-group">
        <label class="control-label" for="test_id">Test Available</label>
        <div class="controls">
            <?php
            $cFormObj->data = $cTestControllerObj->getSelectData("test_details", array("id", "name"), "status=1");
            $cFormObj->options = array("name" => "test_id", "required" => TRUE, "selected" => $_POST["test_id"]);
            $cFormObj->createSelect();
            echo $cFormObj->html();
            ?>

        </div>
    </div>

    <div class="control-group">
        <label class="control-label" for="testtime">No of Keys Required</label>
        <div class="controls">
            <input name="count" type="text" id="count" class="span1"  />
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    <h4>Tests Keys Available</h4>
    <?php
    $cTestControllerObj->column = array("pktu.product_key", "tt.test_name", "u.name", "u.emp_code", "u.email");
    $cTestControllerObj->table = "product_key_test_users pktu";
    $cTestControllerObj->join_condition = "left join __users u on u.id=pktu.test_user_id join test_type tt on tt.id= pktu.test_type_id";
    if ($_POST["test_id"] != '') {
        $condition = "test_id=" . $_POST["test_id"];
    }

    $cFormObj->data = $cTestControllerObj->addWhereCondition($condition)->addOrderBy("pktu.product_key", "tt.test_name")->select()->executeRead();
    $cFormObj->options['reporttable'] = true;
    $cFormObj->options['exportoptions'] = true;
    $cFormObj->options['actioncolumn'] = false;
    $cFormObj->options['serialnocolumn'] = true;
    $cFormObj->options['column']['product_key'] = array('name' => "Product Key", 'type' => "string", 'sort' => true, 'index' => 1);
    //$cFormObj->options['column']['test_name'] = array('name' => "Test Type", 'type' => "string", 'sort' => true, 'index' => 2);
    $cFormObj->options['column']['name'] = array('name' => "User Name", 'type' => "string", 'sort' => true, 'index' => 3);
    $cFormObj->options['column']['emp_code'] = array('name' => "Emp Code", 'type' => "string", 'sort' => true, 'index' => 4);
    $cFormObj->options['column']['email'] = array('name' => "Email", 'type' => "string", 'sort' => true, 'index' => 5);
    $cFormObj->createHTable();
    $cFormObj->options['having_form'] = true;
    echo $cFormObj->html();
    ?>

</form>