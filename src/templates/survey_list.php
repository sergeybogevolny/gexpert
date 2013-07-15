<?php
$cFormObj->options["alert"]["type"] = $_GET['mc'];
$cFormObj->options["alert"]["data"] = $_GET['m'];


$cFormObj->addAlert();
echo $cFormObj->html();
?>
<form method="POST" class="form-horizontal" name="listtests" id="listtests" action="<?php echo $cFormObj->createLinkUrl(array('f' => 'survey_question')); ?>">

    <?php
    $cSurveyControllerObj->column = array("sd.id", "sd.name", "u.name" => "username", "sd.valid_from");


    $cFormObj->options['column']['id'] = array('name' => "Id", 'type' => "number", 'sort' => true, 'index' => 1, 'filter' => 'box', 'dbcolumn' => 'sd.id');
    $cFormObj->options['column']['name'] = array('name' => "Survey Name", 'type' => "string", 'sort' => true, 'index' => 2, 'filter' => 'box', 'dbcolumn' => 'sd.name');
    $cFormObj->options['column']['username'] = array('name' => "Created By", 'type' => "string", 'sort' => true, 'index' => 4);
    $cFormObj->options['column']['valid_from'] = array("name" => 'Valid From', 'type' => "date", "format" => AppDateFormatPhp, 'sort' => true, 'index' => 3, 'filter' => 'box');



    $cSurveyControllerObj->table = "survey_details sd";
    $cSurveyControllerObj->join_condition = "join __users u on u.id=sd.created_by";

    $conditionArray = $cFormObj->createFilterCondition($_POST['filter_type'], $_POST['filter_data']);
    $conditionArray[] = "sd.status=1";
    $conditionArray[] = $condition;

    $cFormObj->data = $cSurveyControllerObj->addWhereCondition($conditionArray)->select()->executeRead();

    $cFormObj->options['actioncolumn'] = true;
    $cFormObj->options['id'] = 'listtable';
    $cFormObj->options['exportoptions'] = true;
    print_r($_SESSION);
    if ($_SESSION['user_type'] <= 1) {
        $cFormObj->options['actioncolumnicons'] .= '
            <i class="cus-control-play-blue" title="Preview Survey"></i>
            <i class="cus-rosette" title="Responses"></i>
            <i class="cus-page-copy" title="Clone"></i>
            <i class="cus-page-edit" title="Edit"></i>
            <i class="cus-page-delete" title="Delete"></i>';
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
        var url1 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'survery_question'));
    ?>';
        var url2 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>';
        var url3 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>';
        var url4 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'addtest')); ?>';
<?php if ($_SESSION['user_type'] > 1) { ?>
            var url5 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'user_id' => $_SESSION['user_id'])); ?>';
<?php } else { ?>
            var url5 = '<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'show' => 'all')); ?>';
<?php } ?>
        $("table").on({'click': function() {
                $("#test_id").val($(this).parent().siblings(":nth(0)").html());
                $("#listtests").attr('action', url1).submit();
            }}, ".cus-control-play-blue").on({'click': function() {
                $("#test_id").val($(this).parent().siblings(":nth(0)").html());
                $("#listtests").attr('action', url2).submit();
            }}, '.cus-bullet-key').on({'click': function() {
                window.location = url3 + "&a=" + $.base64.encode("e") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(0)').html());
            }}, '.cus-page-edit').on({'click': function() {
                window.location = url5 + "&a=" + $.base64.encode("e") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(0)').html());
            }}, '.cus-rosette').on({'click': function() {
                window.location = url3 + "&a=" + $.base64.encode("d") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(0)').html());
            }}, '.cus-page-delete').on({'click': function() {
                window.location = url3 + "&a=" + $.base64.encode("c") + "&id=" + $.base64.encode($(this).parent().parent().find('td:nth(0)').html());
            }}, '.cus-page-copy');

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




