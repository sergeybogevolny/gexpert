<script src="src/js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="src/css/jquery.countdown.css">
<div class="container-fluid" id="instructions">
    <legend>Rules /Instructions</legend>
    <h2>Taking the Quiz</h2>
    <ol>
        <li>
            <p>Select an answer for every question. Unanswered questions will be scored as incorrect.</p>
            <p>There are three possible question types:</p>
            <p><strong>Multiple Choice</strong>: click the radio button to indicate your choice. Currently, only one answer can be selected for a multiple choice question.</p>
            <p><strong>Multiple Response</strong>: click the check box to indicate your choice. Multiple Answers selection is possible.</p>
            <p><strong>True/False</strong>: click the radio button to indicate your choice.</p>
            <p><strong>Sequencing Answers</strong>: Arrange the answers in the sequence </p>
            <p><strong>Matching Answers</strong>: select a match from the pop-up list below each item. </p>

            <p>Click on the <strong>Submit</strong> button at the bottom of the page to have your answers graded.</p>
            <p>You will be shown your results, including your score and any feedback offered by the author of the quiz. You might wish to print this page for your own records. At this stage, you might be able to check your answers: see below.</p>
        </li>
        <li>
            <p>If you want to try to get a better score, click the <strong>Try Again</strong> button at the bottom of the results page. You can try the quiz as many times as you like.</p>
        </li>
        <li>
            <p>If you are completing the quiz as part of a class assignment, use the <strong>Print</strong> command from your web browser to print the results page for your instructor, and for your own records.</p>
        </li>
    </ol>
    <button type="button" class="btn-primary" id="start_test">Start Test</button>

</div>

<form method="POST" class="well form-inline" action="" style="display: none" id="quiz">
    <div id="rootwizard">
        <div class="navbar-inner">
            <div class="navbar">
                <div class="container" id="question_details">
                    <div id="question_count"><span id="current_question"></span> <b>of</b> <span><?php echo count($question_numbers); ?></span><span id="counter" class="pull-right"></span></div>
                    <ul id="nav_link" style="display: none">
                    </ul>

                </div>
            </div>

        </div>
        <div class="tab-content">

        </div>
        <ul class="pager wizard">
            <li class="previous" ><a href="#">Previous</a></li>
            <li class="next"><a href="#">Next</a></li>
            <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
        </ul>
    </div>
</div>
<input type="hidden" id="seq" name="seq" value="<?php echo json_encode($question_numbers); ?>"/>
<input type="hidden" id="answers" name="answers" value=""/>
<input type="hidden" id="test_id" name="test_id" value="<?php echo$_POST["test_id"] ?>"/>
<input type="hidden" id="test_time" name="test_time" value="0"/>
</form>
<div id="loading" style="display: none"></div>
<script>

    $(document).ready(function() {

        $('#loading').ajaxStart(function() {
            $(this).dialog({
                title: "Loading data...",
                modal: true,
                width: 150,
                height: 100,
                closeOnEscape: false,
                resizable: false,
                open: function() {
                    $(".ui-dialog-titlebar-close", $(this).parent()).hide(); //hides the little 'x' button
                }
            });
        }).ajaxStop(function() {
            $(this).dialog('close');
        });
        $("#start_test").click(function() {

            $("#instructions").hide();
            getQuestion(0);

<?php
if ($data[0]['time_taken'] > 0) {
    ?>
                $('#counter').countdown({until: <?php echo $data[0]['time_taken'] * 60; ?>, format: 'M:S', layout: '{desc}{mnn}{sep}{snn}', description: 'Time : ', onExpiry: quizTimeOut});



    <?php
}
?>
            function quizTimeOut() {
                $('#test_time').val($('#counter').countdown('getTimes'));
                alert('Time up!!!');
                $('#quiz').submit();
            }
            $('#rootwizard').bootstrapWizard({onTabClick: function(tab, navigation, index) {
                    return false;
                }, onNext: function(tab, navigation, index) {
                    if (JSON.parse($('#seq').val()).length == (index)) {
                        getAnswer(index);
                        $('#test_time').val($('#counter').countdown('getTimes'));
                        $('#quiz').submit();
                    } else {

                        getAnswer(index);
                        getQuestion(index);
                    }
                }, onPrevious: function(tab, navigation, index) {
                    if (index >= 0)
                        $('#current_question').html(index + 1);
                }, onLast: function(tab, navigation, index) {
                    $('#quiz').submit();

                }, onTabShow: function(tab, navigation, index) {
                    var $total = JSON.parse($('#seq').val()).length;
                    var $current = index + 1;
                    if ($current >= $total) {
                        $('#rootwizard').find('.pager .next').hide();
                        $('#rootwizard').find('.pager .finish').show();
                        $('#rootwizard').find('.pager .finish').removeClass('disabled');
                    } else {
                        $('#rootwizard').find('.pager .next').show();
                        $('#rootwizard').find('.pager .finish').hide();
                    }

                }});
            $("#sortable,#sortable1").sortable();
            $("#sortable").disableSelection();
            $("#rootwizard").parent().show();
        });
        var cnt = 1;

        jQuery.each(JSON.parse($('#seq').val()), function() {

            $("#nav_link").append(' <li><a href="#tab' + cnt + '" data-toggle="tab">' + cnt + '</a></li>');
            $(".tab-content").append(' <div class="tab-pane" id="tab' + cnt + '">');
            cnt++;
        });

    });
    function getQuestion(seq) {

        var questionno = parseInt(seq + 1);
        if ($("#tab" + parseInt(seq + 1)).html() == '') {
            var questions = JSON.parse($('#seq').val());
            $.ajax({
                url: '<?php echo $cFormObj->createLinkUrl(array('f' => 'question', "a" => "getquestion", "type" => "ajax")); ?>' +
                        "&index=" + questions[seq],
                //                        data: {"tab": tab, "navigation": navigation, "index": index},
                success: function(data) {
                    seq = parseInt(seq + 1)
                    $("#tab" + seq).html(data);

                    $(".sortable").sortable({
                    });
                    //$('#current_question').html(seq);
                }
            });
        }
        $('#current_question').html(questionno);
    }
    var answer = new Object();
    function getAnswer(seq) {
        var questions = JSON.parse($('#seq').val());
        var current_answer = '';
        var question_id = questions[seq - 1];
        var divid = '#tab' + seq;
        if (questions[seq] != 'undefined') {
            switch ($(divid + ' .answer_type').val()) {
                case '0':
                    current_answer = $(divid + ' .answer:checked').attr('id');
                    break;
                case '1':

                    var current_answer_tmp = new Array();
                    $(divid + ' .answer:checked').each(function(index) {
                        current_answer_tmp[index] = parseInt($(this).attr('id'));
                    });
                    current_answer = JSON.stringify(current_answer_tmp)
                    break;
                case '2':
                    current_answer = $(divid).find('input:checked').attr('id');
                    break;
                case '3':
                    current_answer = $(divid).find('input').val();
                    break;
                case '4':
                    current_answer = $(divid + " .sortable").sortable("toArray");
                    break;
                case '5':
                    current_answer = $(divid + " .sortable").sortable("toArray");
                    break;
                case '6':

                    break;
                case '7':

                    break;
                case '8':

                    break;
                case '9':

                    break;
                case '10':

                    break;

            }
            answer[ question_id ] = current_answer;
            $('#answers').val(JSON.stringify(answer));
        }
    }
</script>
<style>

    #question_details{margin-top: 5px;font-size: 25px}
    .navbar{margin-bottom: 0px;}
    .sortable,.match { list-style-type: none; margin: 0; padding: 0 0 2.5em; float: left; margin-right: 10px; }
    .sortable li,.match li{ margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 50px;min-width: 100% }
    #loading_text {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        margin-top: -10px;
        line-height: 20px;
        text-align: center;
    }
    #counter{
        width: 140px; height: 25px;
    }
</style>
