<form method="POST" class="form-horizontal">
    <legend>Tests Available</legend>  
    <?php
    $cTestControllerObj->table = "test_details";
    $cTestControllerObj->curd();
    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['header'] = array("Id", "Name", "Code", "Logo", "Created", "Status");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>

</form>







