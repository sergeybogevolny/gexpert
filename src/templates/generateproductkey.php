<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>">
    <legend>Key Generation</legend>

    <div class="control-group">
        <?php
        $cTestControllerObj->column = array("id", "code", "test_name");
        $cTestControllerObj->table = "test_type";
        $data = $cTestControllerObj->select()->executeRead();

        foreach ($data as $key => $value) {

            $cFormObj->options['name'] = $value["code"];
            $cFormObj->options['id'] = $value["code"];
            $cFormObj->options['value'] = $value["id"];
            $cFormObj->data = $value["test_name"];
            $cFormObj->createCheckBox();
            echo $cFormObj->html();
        }
        ?>

    </div>


    <div class="control-group">
        <label class="control-label" for="test_id">Test Available</label>
        <div class="controls">
            <?php
            $cFormObj->data = $cTestControllerObj->getSelectData("test_details", array("id", "name"));
            $cFormObj->options = array("name" => "test_id", "required" => TRUE);
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

    <button type="submit" class="btn">Submit</button>

    <h4>Tests Keys Available</h4>
    <?php
    $cTestControllerObj->column = array("pktu.id", "pktu.product_key", "tt.test_name", "u.name", "u.emp_code", "u.email");
    $cTestControllerObj->table = "product_key_test_users pktu";
    $cTestControllerObj->join_condition = "left join __users u on u.id=pktu.test_user_id join test_type tt on tt.id= pktu.test_type_id";
    $cFormObj->data = $cTestControllerObj->addWhereCondition("test_id=" . $_POST["test_id"])->addOrderBy("pktu.product_key", "tt.test_name")->select()->executeRead();
    $cFormObj->options['actioncolumn'] = false;
    $cFormObj->options['serialnocolumn'] = true;
    $cFormObj->options['header'] = array("Id", "Product Key", "Test Type", "User Name", "Emp Code", "Email");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>

</form>