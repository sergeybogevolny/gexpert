<?php
$cUserObj->moduleId = 2;

$cUserObj->getUserModulePermissions();

$cFormObj->options["alert"]["type"] = $_GET['mc'];
$cFormObj->options["alert"]["data"] = $_GET['m'];


$cFormObj->addAlert();
echo $cFormObj->html();
?>
<form method="POST" class="form-horizontal form-column form-bordered" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">


    <div class="input-append">
        <input type="text"  class="input-small" id="test_key"  name="test_key">
        <button id="add_test" class="btn" type="button">Add Test</button>
<!--        <span class="add-on" id="add_test">Add Test</span>-->
    </div>
    <!--    <div class="input-append">
            <input name="test_key" id="test_key" class="span2" id="appendedInputButton" type="text">
            <button id="add_test" class="btn" type="button">Add Test</button>
        </div>-->

    <?php
    $cTestControllerObj->column = array("td.id", "td.name", "description", "u.name" => "username", "td.valid_from");


    $cFormObj->options['column']['id'] = array('name' => "Id", 'type' => "number", 'sort' => true, 'index' => 1, 'filter' => 'box', 'dbcolumn' => 'td.id');
    $cFormObj->options['column']['name'] = array('name' => "Name", 'type' => "string", 'sort' => true, 'index' => 2, 'filter' => 'box', 'dbcolumn' => 'td.name');
    $cFormObj->options['column']['description'] = array('name' => "Desc", 'type' => "string", 'sort' => true, 'index' => 3);
    $cFormObj->options['column']['username'] = array('name' => "Created By", 'type' => "string", 'sort' => true, 'index' => 4);
    $cFormObj->options['column']['valid_from'] = array("name" => 'Valid From', 'type' => "date", 'sort' => true, 'index' => -1, 'filter' => 'box');
    $cFormObj->options['column']['score'] = array("name" => 'score', 'type' => "number", 'sort' => true, 'index' => -2);

    if ($_SESSION['user_type'] != 1 && $_SESSION['user_type'] != -1) {
        $cTestControllerObj->table = "product_key_test_users pktu";

        $cTestControllerObj->join_condition .= " join test_details td on pktu.test_id = td.id join `__users` u on u.id = td.created_by";
        $condition = " pktu.test_user_id =" . $_SESSION['user_id'];
    } else {
        $cTestControllerObj->table = "test_details td";
        $cTestControllerObj->join_condition = "join __users u on u.id=td.created_by";
    }
    $conditionArray = $cFormObj->createFilterCondition($_POST['filter_type'], $_POST['filter_data']);
    $conditionArray[] = "td.status=1";
    $conditionArray[] = $condition;

    $cFormObj->data = $cTestControllerObj->addWhereCondition($conditionArray)->select()->executeRead();
    if (count($cFormObj->data) > 0) {
        foreach ($cFormObj->data as $key => $value) {
            $cTestControllerObj->table = "scores";
            $score = $cTestControllerObj->addWhereCondition("test_id=" . $value['id'] . " and user_id=" . $_SESSION['user_id'])->select()->executeRead();
            $cFormObj->data[$key]['score'] = $score[0]['id'];
        }
    }
    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['id'] = 'listtable';
    $cFormObj->options['exportoptions'] = true;

    $cFormObj->options['actioncolumnicons'] = '<i class="cus-control-play-blue" title="Take Test"></i>
        <i class="cus-rosette" title="Scores"></i>';
    if ($cUserObj->userPermissions[0] == 1) {

        $cFormObj->options['actioncolumnicons'] .= '<i class="cus-page-copy" title="Clone"></i>';
    }
    if ($cUserObj->userPermissions[2] == 1) {

        $cFormObj->options['actioncolumnicons'] .= '<i class="cus-page-edit" title="Edit"></i>';
    }
    if ($cUserObj->userPermissions[3] == 1) {

        $cFormObj->options['actioncolumnicons'] .= '<i class="cus-page-delete" title="Delete"></i>';
    }
    if ($cUserObj->userPermissions[0] == 1) {
        $cFormObj->options['actioncolumnicons'] .= '<i class="cus-bullet-key" title="Product Key"></i>';
    }


    $cFormObj->options['reporttable'] = true;
    $cFormObj->options['having_form'] = true;
    $cFormObj->createHTable();
    echo $cFormObj->html();
    ?>
    <input type="hidden" id="test_id" name="test_id" />
</form>


<script>
    $(document).ready(function() {
        $("#listtable").append('');
        var url1 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>';
        var url2 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>';
        var url3 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>';
        var url4 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'addtest')); ?>';
<?php if ($_SESSION['user_type'] > 1) { ?>
            var url5 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'user_id' => $_SESSION['user_id'])); ?>';
<?php } else { ?>
            var url5 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'show' => 'all')); ?>';
<?php } ?>
        $("table").on({'click': function() {
                $("#test_id").val($(this).parent().siblings(":nth(2)").html());
                $("#listtests").attr('action', url1).submit();
            }}, ".cus-control-play-blue").on({'click': function() {
                $("#test_id").val($(this).parent().siblings(":nth(2)").html());
                $("#listtests").attr('action', url2).submit();
            }}, '.cus-bullet-key').on({'click': function() {
                window.location = url3 + "&a=" + $.base64.encode("e") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(2)').html());
            }}, '.cus-page-edit').on({'click': function() {
                window.location = url5 + "&a=" + $.base64.encode("e") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(2)').html());
            }}, '.cus-rosette').on({'click': function() {
                window.location = url3 + "&a=" + $.base64.encode("d") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(2)').html());
            }}, '.cus-page-delete').on({'click': function() {
                window.location = url3 + "&a=" + $.base64.encode("c") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(2)').html());
            }}, '.cus-page-copy');
        $('#add_test').click(function() {
            if ($('#test_key').val() != '') {

                window.location = url4 + "&a=" + $.base64.encode("a") + "&id=" + $.base64.encode($('#test_key').val());
            } else {
                alert('Key is empty');
            }

        });
<?php if ($_SESSION['user_type'] > 1) { ?>
            $('#listtable').find('td.score').each(function(i, e) {
                if ($(this).html() != '') {
                    $(this).parent().find('.cus-control-play-blue').hide().parent().find('.cus-rosette').show();
                } else {

                    $(this).parent().find('.cus-rosette').hide().parent().find('.cus-control-play-blue').show();
                }
            });
<?php }
?>

    });


</script>




