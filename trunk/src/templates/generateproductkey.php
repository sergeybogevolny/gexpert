<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>">
    <legend>Key Generation</legend>
    
    <div class="control-group">
        <label class="control-label">Test Type</label>
        <div class="controls">

            <!-- Multiple Checkboxes -->
            <label class="checkbox">
                <input type="checkbox" value="pretest">
                Pre-Test
            </label>
            <label class="checkbox">
                <input type="checkbox" value="posttest">
                Post-Test
            </label>
            <label class="checkbox">
                <input type="checkbox" value="certification">
                Certification
            </label>
        </div>

    </div>
    <div class="control-group">
        <label class="control-label" for="test_type">Test Available</label>
        <div class="controls">
            <?php
            $cFormObj->data = $cTestControllerObj->getSelectData("test_details", array("id", "name"));
            $cFormObj->options = array("name" => "test_type", "required" => TRUE);
            $cFormObj->createSelect();
            echo $cFormObj->html();
            ?>

        </div>
    </div>
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