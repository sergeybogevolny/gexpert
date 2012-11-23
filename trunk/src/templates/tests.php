<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>">
    <legend>Tests Available</legend>  
    <?php
    $cTestControllerObj->column = array("id", "name", "description", "logo", "created_by", "status");
    $cTestControllerObj->table = "test_details";
    $cFormObj->data = $cTestControllerObj->curd();
    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['actioncolumnicons'] = '<i class="icon-eye-open"></i>';
    $cFormObj->options['header'] = array("Id", "Name", "Desc", "Logo", "Created", "Status");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>
    <input type="hidden" id="test_id" name="test_id" />
</form>


<script>
    $(".icon-eye-open").click(function(){
        $("#test_id").val($(this).parent().siblings(":first").html());
        
        $("#listtests").submit();
    });


</script>




