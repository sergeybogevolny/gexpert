
<form method="POST" class="form-horizontal" id="testmanager">

    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li><a href="#tab1" data-toggle="tab">Test Manager</a></li>
                        <li><a href="#tab2" data-toggle="tab">Questions</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane" id="tab1">
                <div class="control-group">
                    <label class="control-label" for="testname">Test Name</label>
                    <div class="controls">
                        <input name="testname" type="text" id="testname" />
                        Enter the Test name
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="subject">Category</label>
                    <div class="controls">
                        <?php
                        $cFormObj->data = $cTestControllerObj->getSelectData("category", array("id", "name"));
                        $cFormObj->options = array("name" => "subject");
                        $cFormObj->createSelect();
                        echo $cFormObj->html();
                        ?>

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="description">Description</label>
                    <div class="controls">
                        <input name="description" type="text" id="description" />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="instructions">Instructions</label>
                    <div class="controls">
                        <textarea name="instructions" id="instructions" class="htmleditor" style="width: 810px; height: 200px"></textarea>
                    </div>
                </div>



                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="activedates">Active dates</label>
                        <div class="controls">
                            <div class="input-append calender">
                                <input type="text" name="activedates" id="activedates"/>
                                <span class="add-on"><i class="icon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="control-group">
                    <label class="control-label" for="testtime">Test Time</label>
                    <div class="controls">
                        <div class="input-append">
                            <input name="testtime" type="text" id="testtime" class="span1"  />
                            <span class="add-on">Mins</span>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab2">

                <div class="alert alert-error alert-block" style="display: none">

                </div>

                <div class="control-group">
                    <label class="control-label" for="question_type">Question Type</label>
                    <div class="controls">

                        <?php
                        $cFormObj->data = array("multiplechoice" => "Multiple Choice", "multipleresponse" => "Multiple Response", "true_false" => "True/False", "fillintheblank" => "Fill in the Blank", "matching" => "Matching", "sequence" => "Sequencing");
                        $cFormObj->options = array("name" => "question_type", "default" => false, "class" => "reset");
                        $cFormObj->createSelect();
                        echo $cFormObj->html();
                        ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="question">Question</label>
                    <div class="controls">
                        <textarea class="htmleditor reset" name="question" id="question" style="height: 50px;width: 500px" required="true"></textarea>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover .table-condensed" id="optionstable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="answer">Answer</th>
                                <th class="matchanswer">Match Answer</th>
                                <th class="multipleanswer multipleoption true_false">Is Correct</th>
                                <th class="correctness_percentage">Correctness Percentage</th>
                                <th class="answer">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="optionrow">
                                <td>
                                    <label class="rowNumber">1</label>
                                </td>
                                <td class="answer" >
                                    <textarea rows="1" class="htmleditor answer answer_data reset" name="answer" id="answer" style="height: 25px"></textarea>
                                </td>
                                <td class="matchanswer">
                                    <textarea rows="1" class="htmleditor match_answer match_data reset" name="match_answer" id="match_answer" style="height: 25px"></textarea>
                                </td>
                                <td class="multipleanswer multipleoption true_false">
                                    <label class="checkbox multipleanswer true_false">
                                        <input type="checkbox" class="multipleanswer reset true_false" name="multipleanswer" id="multipleanswer">
                                        Multiple Option
                                    </label>
                                    <label class="radio multipleoption">
                                        <input type="radio" class="multipleoption correct_answer_data reset" name="correctanswer" id="correctanswer"  checked>
                                        Correct
                                    </label>
                                </td>
                                <td class="correctness_percentage">
                                    <div class="controls" style="margin-left: 0px">
                                        <div class="input-append" >
                                            <input name="correctness_percentage" type="text" id="correctness_percentage" class="correctness_percentage mcorrect_answer_data span1 reset"/>
                                            <span class="add-on">%</span>
                                        </div>
                                    </div>

                                </td>
                                <td class="answer">
                                    <i class="icon-edit"></i>
                                    <i class="icon-ok"></i>
                                    <i class="icon-trash"></i>
                                    <i class="icon-plus"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input name="currentrow" type="hidden" id="currentrow" value="0"/>

                    <button  type="submit" id="addquestion" class="btn">Add Question</button>
                    <br/>
                    <?php
                    $cTestControllerObj->table = "test_details";
                    $cTestControllerObj->curd();
                    $cFormObj->options['actioncolumn'] = true;
                    $cFormObj->options['serialnocolumn'] = true;
                    $cFormObj->options['id'] = 'available_questions';
                    $cFormObj->options['name'] = 'available_questions';
                    $cFormObj->options['header'] = array("Question", "Type", "No of Options");
                    $cFormObj->createHTable();
                    echo $cFormObj->html();
                    ?>
                </div>
            </div>

            <ul class="pager wizard">
                <li class="previous" ><a href="#">Previous</a></li>
                <li class="next"><a href="#">Next</a></li>
                <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
            </ul>
        </div>	
    </div>
</form>
<script src="src/js/wysihtml5-0.3.0.min.js"></script>
<script src="src/js/bootstrap-wysihtml5.js"></script>
<link rel="stylesheet" href="src/css/bootstrap-wysihtml5.css">


<script>

    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {

            },
            'firstSelector': '.button-first', 'lastSelector': '.last',
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;
                var $percent = ($current / $total) * 100;
                $('#rootwizard').find('.bar').css({width: $percent + '%'});

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
                if ($current == 1) {
                    $('#rootwizard').find('.pager .previous').hide();
                } else {
                    $('#rootwizard').find('.pager .previous').show();
                }

            }
        });
        $('#rootwizard .finish').click(function() {
            //var userdata=getValues();


            $.ajax({
                type: "POST",
                url: '<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest', "a" => "add", "type" => "ajax")); ?>',
                data: $("#testmanager").serialize(),
                success: function() {

                }
            });

            //$('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
        
        $('#activedates').daterangepicker(
        {
            ranges: {
                'Today': ['today', 'today'],
                'Tommorrow': ['tommorrow', 'tommorrow'],
                'Next 7 Days': ['today', Date.today().add({days: 6})],
                'Next 30 Days': ['today', Date.today().add({days: 29})],
                'This Month': [Date.today().moveToLastDayOfMonth(), Date.today().moveToFirstDayOfMonth()],
                'Next Month': [Date.today().moveToFirstDayOfMonth().add({days: -1}), Date.today().moveToFirstDayOfMonth().add({months: 1})]
            }
        },
        function(start, end) {
            $('.calender input').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));
        }
    );

        $('#instructions').wysihtml5({"color": true});
        $('#question').wysihtml5({"font-styles": false, "color": true, "emphasis": true, "lists": false, "link": false});
        //$('#answer').wysihtml5({"font-styles": false, "color": false, "emphasis": false, "lists": false, "link": false});
        //$('#match_answer').wysihtml5({"font-styles": false, "color": false, "emphasis": false, "lists": false, "link": false});


        $(".icon-plus").btnAddRow({rowNumColumn: "rowNumber"},function(){
                
                return false;
        });
        $(".icon-trash").btnDelRow();
        $('.multipleanswer,.multipleoption,.matchanswer').hide();
        $('#addquestion').bind('click', function() {

        $("#testmanager").submit(function(event){
            
             event.preventDefault();
        });
            addQuestion();


        });
        
        //$('#optionstable th:nth-child('+(2)+')').hide();
        $("#question_type").bind('change', function() {
        
            resetOptionsTable($(this).val());
        });
        $("#question_type").trigger('change');

    });



    var questionDetails = new Array();
    var row = 0;
    //questionDetails[row] = new Array();


    function addQuestion() {
        
        if(validate()){
            var currentrow = parseInt($("#currentrow").val());
            if ($.isArray(questionDetails[currentrow]) === false)
                questionDetails[currentrow] = new Array();
            questionDetails[currentrow]["question_type"] = $('#question_type').val();
            questionDetails[currentrow]["question"] = $('#question').val();

            $(".optionrow").each(function(index, element) {
                if ($.isArray(questionDetails[currentrow]['answers']) === false)
                    questionDetails[currentrow]['answers'] = new Array();
                if ($.isArray(questionDetails[currentrow]['answers'][index]) === false)
                    questionDetails[currentrow]['answers'][index] = new Array();
                questionDetails[currentrow]['answers'][index]['answer'] = $(element).find(".answer").val();
                questionDetails[currentrow]['answers'][index]['match_answer'] = $(element).find(".match_answer").val();
                questionDetails[currentrow]['answers'][index]['multipleanswer'] = $(element).find(".multipleanswer").val();
                questionDetails[currentrow]['answers'][index]['multipleoption'] = $(element).find(".multipleoption").val();
                questionDetails[currentrow]['answers'][index]['correctness_percentage'] = $(element).find(".correctness_percentage").val();

            });
            createTable(questionDetails);
            //        console.log(questionDetails);
            $("#currentrow").val(currentrow + 1);
        }
        else{
           
           
        }
    }

    function resetQuestion() {
        $('.reset').val("");
    }
    
    function validate(){
        var questiontype=$('#question_type').val();
        
        var error="";
        if($('#question').val()==""){
            error+="Question cannot be empty...";
        }
        switch (questiontype) {
            case 'multiplechoice':
                if($('.answer_data').length>=3){
                    $.each($('.answer_data'),function(){
                    
                        console.log($(this).parent().find(".correct_answer_data"));    
                    
                    });    
                }else{
                    error+="<br/> Count of options cannot be less than 3";
                }
                
                break;
            case 'multipleresponse':
                $('.multipleanswer,.answer').show();
                break;
            case 'true_false':
                $('.true_false,').show();
                break;
            case 'fillintheblank':
                $('.multipleoption,.answer').show();
                break;
            case 'matching':
                $('.matchanswer,.answer').show();
                break;
            case 'sequence':
                $('.answer').show();
                break;
        }
        console.log(error);
        
        if(error!=""){
            $(".alert-error").html('<button type="button" class="close" data-dismiss="alert">×</button><h3>Error ! </h3> '+error).show();
            return false;    
        }else{
            $(".alert-error").hide();
            return true;
        }
        
        
    }
    
    function resetOptionsTable(val){
        $('.multipleanswer,.multipleoption,.matchanswer,.answer,.correctness_percentage').hide();
        switch (val) {
            case 'multiplechoice':
                $('.multipleoption,.answer').show();
                break;
            case 'multipleresponse':
                $('.multipleanswer,.answer').show();
                break;
            case 'true_false':
                $('.true_false,').show();
                break;
            case 'fillintheblank':
                $('.multipleoption,.answer').show();
                break;
            case 'matching':
                $('.matchanswer,.answer').show();
                break;
            case 'sequence':
                $('.answer').show();
                break;
        }
    }

    function createTable(data) {
        var html = '';
        var cnt = 1;
        $("#available_questions").find("tbody > tr").remove();
        $.each(data, function(key, value) {

            html += '<tr>';
            html += '<td>';
            html += cnt;
            html += '</td>';
            html += '<td>';
            html += value['question'];
            html += '</td>';
            html += '<td>';
            html += value['question_type'];
            html += '</td>';
            html += '<td>';
            html += $(value['answers']).length;
            //            console.log($(value['answers']));
            html += '</td>';
            html += '<td>';
            html += '<i class="icon-edit"></i><i class="icon-trash"></i>';
            html += '</td>';
            html += '</tr>';
            cnt++;

        });


        //$(("#available_questions").find("tbody")
        $("#available_questions").find("tbody").append(html);
        resetQuestion();
        $('#available_questions').find('.icon-edit').click(function(obj, a) {
            loadQuestion($(this).parent().siblings(":first").text())
        })
    }

    function loadQuestion(item) {
        resetQuestion();
        
        item = parseInt(item);
        if (isNaN(item)) {
        } else {
            $("#currentrow").val(item)
            $('#question_type').val(questionDetails[item]['question_type']);
            $('#question').val(questionDetails[item]['question']);
            $.map(questionDetails[item]['answers'], function(key, value) {
                console.log(key);
                console.log(value);

            });
        }


    }

    function getValues() {
        $('#match_answer').val();
        $('#answer').val();
        $('#question').val();
        $('#instructions').val();
        $('#testname').val();
        $('#subject').val();
        $('#description').val();
        $('#activedates').val();
        $('#testtime').val();


    }

</script>







