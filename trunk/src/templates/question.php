
<div class="container-fluid" id="instructions">
    <legend>Rules /Instructions</legend> 
    <h2>Taking the Quiz</h2>
    <ol>
        <li>
            <p>Select an answer for every question. Unanswered questions will be scored as incorrect.</p>
        </li>
        <li>
            <p>There are three possible question types:
            </p>
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



<form method="POST" class="well form-inline" style="display: none" id="">

    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container" >
                    <ul id="nav_link">

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
</form>

<script>
    $('.alternative').toggle({
        onClick: function(evt, status) {
            console.log('.alternative changed to: ' + status, 'the reverse of: ' + !status);
        },
        text: {
            enabled: 'TRUE',
            disabled: 'FALSE'
        },
        style: {
            enabled: 'success',
            disabled: 'danger'
        }
    });
    $(document).ready(function() {

        $("#start_test").click(function() {

            $("#instructions").hide();

            getQuestion(0);
            $('#rootwizard').bootstrapWizard({onTabClick: function(tab, navigation, index) {
                    return false;
                }, onNext: function(tab, navigation, index) {

                    getQuestion(index);
                }, onPrevious: function(tab, navigation, index) {

                }, onLast: function(tab, navigation, index) {

                }});
            $("#sortable,#sortable1").sortable();
            $("#sortable").disableSelection();
            $("#rootwizard").parent().show();
        });



        var cnt = 1;
        console.log($('#seq').val());
        jQuery.each(JSON.parse($('#seq').val()), function() {
            console.log(cnt);
            $("#nav_link").append(' <li><a href="#tab' + cnt + '" data-toggle="tab">' + cnt + '</a></li>');
            $(".tab-content").append(' <div class="tab-pane" id="tab' + cnt + '">');
            cnt++;
        });
    });

    function getQuestion(seq) {
        var questions = JSON.parse($('#seq').val());
        console.log(questions);
        $.ajax({
            url: '<?php echo $cFormObj->createLinkUrl(array('f' => 'question', "a" => "getquestion", "type" => "ajax")); ?>' +
                    "&index=" + questions[seq],
//                        data: {"tab": tab, "navigation": navigation, "index": index},
            success: function(data) {
                seq = parseInt(seq + 1)
                $("#tab" + seq).html(data);
                console.log(data);
            }
        });
    }
</script>

