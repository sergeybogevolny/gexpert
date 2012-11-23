<form method="POST" class="form-horizontal">
    <legend>Tests Available</legend>  
    <?php
    $cTestControllerObj->column = array("id","name","description","logo","created_by","status");
    $cTestControllerObj->table = "test_details";
    $cFormObj->data = $cTestControllerObj->curd();
    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['header'] = array("Id", "Name", "Desc", "Logo", "Created", "Status");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>

</form>







