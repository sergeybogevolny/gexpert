<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>">
    <h2><?php echo $testName; ?></h2>
    <h4>Key Generation </h4>
    <div class="control-group">
        <label class="control-label" for="testtime">No of Keys Required</label>
        <div class="controls">
            <input name="count" type="text" id="count" class="span1"  />
            <input name="test_id" type="hidden" id="test_id" value="<?php echo $_POST['test_id']; ?>"  />
        </div>
    </div>
    <button type="submit" class="btn">Submit</button>

    <h4>Tests Keys Available</h4>  
    <?php
    $cTestControllerObj->column = array("pktu.id", "pktu.product_key", "u.name", "u.emp_code", "u.email", "pktu.status");
    $cTestControllerObj->table = "product_key_test_users pktu";
    $cTestControllerObj->join_condition = "left join __users u on u.id=pktu.test_user_id";
    $cFormObj->data = $cTestControllerObj->addWhereCondition("test_id=" . $_POST["test_id"])->select()->executeRead();
    $cFormObj->options['actioncolumn'] = false;
    $cFormObj->options['header'] = array("Id", "Product Key", "User Name", "Emp Code", "Email", "Status");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>

</form>