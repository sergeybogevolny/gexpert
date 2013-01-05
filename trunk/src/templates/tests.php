<?php
$cFormObj->options["alert"]["type"] = $_GET['mc'];
$cFormObj->options["alert"]["data"] = $_GET['m'];

$cFormObj->addAlert();
echo $cFormObj->html();
?>
<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>">

    <div class="input-append">
        <input name="test_key" id="test_key" class="span2" id="appendedInputButton" type="text">
        <button id="add_test" class="btn" type="button">Add Test</button>
    </div>


    <legend>Tests Available</legend>


    <?php
    $cTestControllerObj->column = array("td.id", "td.name", "description", "u.name" => "username");

    if ($_SESSION['user_type'] > 1) {
        $cTestControllerObj->table = "product_key_test_users pktu";

        $cTestControllerObj->join_condition .= " join test_details td on pktu.test_id = td.id join `__users` u on u.id = td.created_by";
        $condition = " And pktu.test_user_id =" . $_SESSION['user_id'];
    } else {
        $cTestControllerObj->table = "test_details td";
        $cTestControllerObj->join_condition = "join __users u on u.id=td.created_by";
    }

    $cFormObj->data = $cTestControllerObj->addWhereCondition("td.status=1" . $condition)->select()->executeRead();
    $cFormObj->options['actioncolumn'] = true;
    if ($_SESSION['user_type'] == 1) {
        $cFormObj->options['actioncolumnicons'] = '<i class="icon-edit"></i>
            <i class="icon-trash"></i>
            <i class="icon-share-alt"></i></i><i class="icon-lock"></i>';
    }

    $cFormObj->options['actioncolumnicons'] .='<i class="icon-eye-open">';

    $cFormObj->options['header'] = array("Id", "Name", "Desc", "Created");
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>
    <input type="hidden" id="test_id" name="test_id" />
</form>


<script>
    $(document).ready(function() {


        var url1 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>';
        var url2 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>';
        var url3 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>';
        var url4 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'addtest')); ?>';
        $(".icon-eye-open").click(function() {
            $("#test_id").val($(this).parent().siblings(":first").html());
            $("#listtests").attr('action', url1).submit();
        });
        $(".icon-lock").click(function() {
            $("#test_id").val($(this).parent().siblings(":first").html());
            $("#listtests").attr('action', url2).submit();
        });

        $('#add_test').click(function() {
            if ($('#test_key').val() != '') {
                window.location = url4 + "&a=" + $.base64.encode("a") + "&id=" + $.base64.encode($('#test_key').val());
            } else {
                alert('Key is empty');
            }

        });
        $('.icon-edit').click(function() {
            window.location = url3 + "&a=" + $.base64.encode("e") + "&id=" + $.base64.encode($(this).parent().parent().find('td:first').html());


        });
        $('.icon-trash').click(function() {
            window.location = url3 + "&a=" + $.base64.encode("d") + "&id=" + $.base64.encode($(this).parent().parent().find('td:first').html());


        });
        $('.icon-share-alt').click(function() {
            window.location = url3 + "&a=" + $.base64.encode("c") + "&id=" + $.base64.encode($(this).parent().parent().find('td:first').html());


        });




    });

</script>




