<form method="POST" class="form-horizontal">
    <legend>Tests Available</legend>
    <table class="table table-striped" id="datatable">
        <thead>
            <tr>
                <th>Test Name</th>
                <th>Status</th>
                <th>Take Test</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Excel Experting for Entry level test</td>
                <td>Available </td>
                <td><a href="test1.html">Take Test</a></td>
            </tr>
            <tr>
                <td>MS Powerpoint Experting for Entry level test</td>
                <td>Available </td>
                <td><a href="test1.html">Take Test</a></td>
            </tr>
        </tbody>
    </table>
</form>
<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>">
    <legend>Tests Available</legend>
    <?php
    $cTestControllerObj->column = array("description", "status");
    $cTestControllerObj->table = "test_details";
    $cFormObj->data = $cTestControllerObj->curd();
    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['actioncolumnicons'] = '<i class="icon-eye-open"></i>';
    $cFormObj->options['header'] = array("Test Name", "Status");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>
    <input type="hidden" id="test_id" name="test_id" />
</form>


<script>
    $(".icon-eye-open").click(function() {
        $("#test_id").val($(this).parent().siblings(":first").html());

        $("#listtests").submit();
    });


</script>