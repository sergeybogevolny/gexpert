<script src="src/js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="src/css/jquery.countdown.css">
<div class="container-fluid" id="instructions">
    <legend>Rules /Instructions</legend>
    <h2>Taking the Quiz</h2>
    <ol>
        <li>
            <p>Select an answer for every question. Unanswered questions will be scored as incorrect.</p>
        </li>
        <li>
            <p>There are three possible question types:
            </p>liftoffTime
            <ul>
                <li>
                    <p><strong>Multiple Choice</strong>: click the radio button to indicate your choice. Currently, only one answer can be selected for a multiple choice question.</p>
                </li>
                <li>
                    <p><strong>True/False</strong>: click the radio button to indicate your choice.</p>
                </li>
                <li>
                    <p><strong>Matching Answers</strong>: select a match from the pop-up list below each item. </p>
                </li>
                <li>
                    <p>If you use a wheel button mouse, take care not to accidently change your answers. Sometimes scrolling the wheel will rotate through the answers in a selection list, when you might have meant simply to scroll farther down in the quiz window. </p>
                </li>
            </ul>
        </li>
        <li>
            <p>Click on the <strong>Submit</strong> button at the bottom of the page to have your answers graded.</p>
        </li>
        <li>
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
        <div class="navbar">
            <div class="navbar-inner ">
                <div class="container" >
                    <div id="question_count"><span id="current_question"></span><span>/<?php echo count($question_numbers); ?></span></div>
                    <ul id="nav_link" style="display: none">
                    </ul>
                    <div id="counter" class="pull-right"></div>
                    <div class="clock_seconds">
                        <div class="bgLayer">
                            <div class="topLayer"></div>
                            <canvas id="canvas_seconds" width="188" height="188">
                            </canvas>
                            <div class="text">
                                <p class="val">0</p>
                                <p class="type_seconds">Seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="progress progress-striped active">
            <div class=" bar">

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
                $('#counter').countdown({
                    until: '<?php echo $data[0]['time_taken'] * 60; ?>',
                    format: 'M:S',
                    layout: '{desc}{mnn}{sep}{snn}',
                    description: 'Time : ',
                    onExpiry: quizTimeOut
                });
                $(document).ready(function() {
                    JBCountDown({
                        secondsColor: "#ffdc50",
                        secondsGlow: "#378cff",
                        seconds: '<?php echo $data[0]['time_taken'] * 60; ?>'
                    });
                });

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
                    console.log(tab, navigation, index);
                    if (JSON.parse($('#seq').val()).length == (index)) {
                        getAnswer(index);
                        alert('Finish');
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
                    var $percent = ($current / $total) * 100;
                    if ($current >= $total) {
                        $('#rootwizard').find('.pager .next').hide();
                        $('#rootwizard').find('.pager .finish').show();
                        $('#rootwizard').find('.pager .finish').removeClass('disabled');
                    } else {
                        $('#rootwizard').find('.pager .next').show();
                        $('#rootwizard').find('.pager .finish').hide();
                    }
                    $('#rootwizard').find('.bar').css({width: $percent + '%'});
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
                    $('#current_question').html(seq);
                }
            });
        }
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
                    console.log(divid + ' .answer:checked');
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
                    current_answer = $(divid + ' .active').val();
                    break;
                case '3':
                    current_answer = $(divid + ' .answer:checked');
                    break;
                case '4':
                    current_answer = $(divid + " .sortable").sortable("toArray");
                    break;
                case '5':
                    current_answer = $(divid + " .sortable").sortable("toArray");
                    break;
            }
            answer[ question_id ] = current_answer;
            $('#answers').val(JSON.stringify(answer));
            console.log($('#answers').val());
        }
    }
</script>
<style>
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
