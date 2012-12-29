<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>">

    <div class="input-append">
        <input name="test_key" id="test_key" class="span2" id="appendedInputButton" type="text">
        <button id="add_test" class="btn" type="button">Add Test</button>
    </div>


    <legend>Tests Available</legend>


    <?php
    $cTestControllerObj->column = array("td.id", "td.name", "description", "u.name" => "username");
    $cTestControllerObj->table = "test_details td";
    $cTestControllerObj->join_condition = "join __users u on u.id=td.created_by";
    $cFormObj->data = $cTestControllerObj->curd();
    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['actioncolumnicons'] = '<i class="icon-edit"></i>
            <i class="icon-trash"></i>
            <i class="icon-ok"></i><i class="icon-eye-open"></i><i class="icon-lock"></i>';
    $cFormObj->options['header'] = array("Id", "Name", "Desc", "Created");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>
    <input type="hidden" id="test_id" name="test_id" />
</form>


<script>
    var url1 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>';
    var url2 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>';
    var url3 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>';
    $(".icon-eye-open").click(function() {
        $("#test_id").val($(this).parent().siblings(":first").html());
        $("#listtests").attr('action', url1).submit();
    });
    $(".icon-lock").click(function() {
        $("#test_id").val($(this).parent().siblings(":first").html());
        $("#listtests").attr('action', url2).submit();
    });

    $('#add_test').click(function() {

        //$.ajax
    });
    $('.icon-edit').click(function() {
        window.location = url3 + "&id=" + $.base64.encode($(this).parent().parent().find('td:first').html());


    });


</script>




