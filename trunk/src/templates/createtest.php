<div class="box box-color box-bordered">
    <div class="box-title">
        <h3>
            <i class="icon-magic"></i>
            Create Test
        </h3>
    </div>
    <div class="box-content nopadding">
        <form method="POST" class="form-horizontal form-wizard" id="testmanager" name="testmanager">
            <div id="rootwizard">
                <div class="step">
                    <ul class="wizard-steps steps-2">
                        <li><a href="#tab1" data-toggle="tab">
                                <div class="single-step">
                                    <span class="title">1</span>
                                    <span class="description">Test Manager</span>
                                </div>
                            </a></li>
                        <li><a href="#tab2" data-toggle="tab">
                                <div class="single-step">
                                    <span class="title">2</span>
                                    <span class="description">Questions</span>
                                </div></a></li>

                    </ul>
                </div>
                <div class="tab-content form-wizard">
                    <div class="tab-pane step" id="tab1">
                        <div class="control-group">
                            <label class="control-label" for="name">Test Name</label>
                            <div class="controls">
                                <input name="name" type="text" id="name" title="Your Test Name." placeholder="Name of the test" value="<?php echo $testDetails['name']; ?>" required/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="subject">Category</label>
                            <div class="controls">
                                <?php
                                $cFormObj->data = $cTestControllerObj->getSelectData("category", array("id", "name"));
                                $cFormObj->options = array("name" => "category", "required" => TRUE, 'selected' => $testDetails['category']);
                                $cFormObj->createSelect();
                                echo $cFormObj->html();
                                ?>

                            </div>
                        </div>

                        <fieldset>
                            <div class="control-group">
                                <label class="control-label" for="activedates">Active dates</label>
                                <div class="controls">
                                    <div class="calender activedates">
                                        <i class="icon-calendar icon-large"></i>
                                        <span><?php echo $testDetails['valid_from'] . " - " . $testDetails['valid_to']; ?></span>
                                        <input type="hidden" value="<?php echo $testDetails['valid_from'] . " - " . $testDetails['valid_to']; ?>" id="activedates" name="activedates" />
                                        <b class="caret" style="vertical-align: middle"></b>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="control-group">
                            <label class="control-label" for="description">Description</label>
                            <div class="controls">
                                <textarea name="description" id="description" class="htmleditor" style="width: 700px; height: 150px"><?php echo $testDetails['description']; ?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="testtime">Test Time</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="testtime" type="text" id="testtime" value="<?php echo $testDetails['time_taken']; ?>" class="span1" required/>
                                    <span class="add-on">Mins</span>
                                </div>

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="allow_correction">Allow Correction</label>
                            <div class="controls">
                                <input name="allow_correction" type="checkbox" id="allow_correction" "<?php echo $testDetails['allow_correction']; ?>" checked />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="sharing">Sharing</label>
                            <div class="controls">

                                <?php
                                $cFormObj->data = array("0" => "Private", "1" => "Public");
                                $cFormObj->options = array("name" => "sharing", "default" => false, 'selected' => $testDetails['name']);
                                $cFormObj->createSelect();
                                echo $cFormObj->html();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane step" id="tab2">
                        <div class="alert alert-error" style="display: none">

                        </div>
                        <div class="alert alert-error alert-block" style="display: none">

                        </div>

                        <div class="control-group">
                            <label class="control-label" for="question_type">Question Type</label>
                            <div class="controls">

                                <?php
                                $cFormObj->data = array("0" => "Multiple Choice", "1" => "Multiple Response", "2" => "True/False", "3" => "Fill in the Blank", "4" => "Matching", "5" => "Sequencing");
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
                                        <td class="answer fillintheblank" >
                                            <textarea rows="1" class="htmleditor answer answer_data fillintheblank reset" name="answer" id="answer" style="height: 25px"></textarea>
                                        </td>
                                        <td class="matchanswer">
                                            <textarea rows="1" class="htmleditor match_answer match_data reset" name="match_answer" id="match_answer" style="height: 25px"></textarea>
                                        </td>
                                        <td class="multipleanswer multipleoption true_false">


                                            <label class="checkbox multipleanswer ">
                                                <input type="checkbox" class="multipleanswer reset multipleanswer_correct_data" name="multipleanswer" id="multipleanswer" />
                                                Multiple Option
                                            </label>

                                            <label class="checkbox true_false">
                                                <input type="checkbox" class="reset true_false true_false_data" name="true_false" id="true_false" >

                                            </label>
                                            <label class="radio multipleoption">
                                                <input type="radio" class="multipleoption correct_answer_data reset" name="correctanswer" id="correctanswer" value="0" />
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
                                            <i class="icon-trash"></i>
                                            <i class="icon-plus"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input name="currentrow" type="hidden" id="currentrow" value="<?php echo $currentRow; ?>"/>
                            <input name="questionsdata" type="hidden" id="questionsdata" value=""/>
                            <button  type="submit" id="addquestion" class="btn">Add Question</button>
                            <br/>
                            <?php
                            $cFormObj->options['actioncolumn'] = true;
                            $cFormObj->options['serialnocolumn'] = true;
                            $cFormObj->options['id'] = 'available_questions';
                            $cFormObj->options['name'] = 'available_questions';
                            $cFormObj->options['having_form'] = true;

                            //$cFormObj->options['header'] = array("Question", "Type", "No of Options");
                            $cFormObj->options['column']['question'] = array('name' => "Question", 'type' => "string", 'sort' => true, 'index' => 1);
                            $cFormObj->options['column']['type'] = array('name' => "Type", 'type' => "string", 'sort' => true, 'index' => 2);
                            $cFormObj->options['column']['no_of_questions'] = array('name' => "No of Options", 'type' => "string", 'sort' => true, 'index' => 3);
                            $cFormObj->options['column']['marks'] = array('name' => "Mark", 'type' => "string", 'sort' => true, 'index' => 4);
                            $cFormObj->createHTable();
                            echo $cFormObj->html();
                            ?>
                        </div>
                    </div>
                    <ul class="pager wizard">
                        <li class="previous" ><a href="#" class="btn btn-primary">Previous</a></li>
                        <li class="next"><a href="#" class="btn btn-primary">Next</a></li>
                        <li class="next finish" style="display:none;"><a href="javascript:;" class="btn btn-primary">Finish</a></li>
                    </ul>
                </div>
            </div><!--root-->
    </div><!--box-content-->
</div> <!--box-->
<input name="test_id" type="hidden" id="test_id" value="<?php echo $testDetails['id']; ?>"/>
<input name="total_marks" type="hidden" id="total_marks" value="<?php echo $testDetails['total_marks']; ?>"/>
</form>
<script src="src/js/wysihtml5-0.3.0.min.js"></script>
<script src="src/js/bootstrap-wysihtml5.js"></script>
<link rel="stylesheet" href="src/css/bootstrap-wysihtml5.css">


<script>

    $(document).ready(function() {

        $('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
                if (index == 1) {
                    // Make sure we entered the name
                    if (!$('#name').val()) {
                        alert('You must enter Test Name');
                        $('#name').focus();
                        return false;
                    }
                }
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

            $("#questionsdata").val(JSON.stringify(questionDetails));
            $("#testmanager").submit();

        });

        $('.calender').daterangepicker(
                {
                    ranges: {
                        'Tomorrow': ['tomorrow', 'tomorrow'],
                        'This Month': [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth(), ],
                        'Next Month': [Date.today().moveToFirstDayOfMonth().add({months: 1}), Date.today().moveToLastDayOfMonth().add({months: 1})]
                    }
                },
        function(start, end) {
            $('.calender span').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));
            $('#activedates').val(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));

        }
        );

        $('#description').wysihtml5({"color": true});
        createTable(questionDetails);
        $(".icon-plus").btnAddRow({rowNumColumn: "rowNumber", inputBoxAutoId: true}, function() {

            return false;
        });
        $(".icon-trash").btnDelRow({}, function() {
            calculateTotalMark();
        });
        $('.multipleanswer,.multipleoption,.matchanswer').hide();
        $('#addquestion').bind('click', function(event) {
            event.preventDefault();
            $(this).html('Add Question');
            addQuestion();
        });

        $("#question_type").bind('change', function() {
            resetOptionsTable($(this).val());
        });
        $("#question_type").trigger('change');

    });



    var questionDetails = <?php echo $questiondata ?>;


    function addQuestion() {

        if (validate()) {
            var currentrow = parseInt($("#currentrow").val());
            if ($.isArray(questionDetails[currentrow]) === false)
                questionDetails[currentrow] = {};
            questionDetails[currentrow]["question_type"] = $('#question_type').val();
            questionDetails[currentrow]["question"] = $('#question').val();
            var opt = 0;
            questionDetails[currentrow]['answers'] = new Array();
            $(".optionrow").each(function(index, element) {
                if (jQuery.isEmptyObject(questionDetails[currentrow]['answers'][opt]))
                    questionDetails[currentrow]['answers'][opt] = {};
                questionDetails[currentrow]['answers'][opt]['answer'] = $(element).find(".answer_data").val();
                switch ($('#question_type').val()) {
                    case '0':
                        questionDetails[currentrow]['answers'][opt]['is_correct'] = $(element).find("input[type=radio]").prop('checked') === true ? 1 : 0;
                        break;
                    case '1':
                        questionDetails[currentrow]['answers'][opt]['is_correct'] = $(element).find('.multipleanswer_correct_data').prop('checked') === true ? 1 : 0;
                        break;
                    case '2':
                        questionDetails[currentrow]['answers'][opt]['is_correct'] = $(element).find('.true_false_data').prop('checked') === true ? 1 : 0;

                        break;
                    case '3':
                        questionDetails[currentrow]['answers'][opt]['is_correct'] = 1;
                        break;
                    case '4':
                        questionDetails[currentrow]['answers'][opt]['match_answer'] = $(element).find(".match_data").val();
                        questionDetails[currentrow]['answers'][opt]['is_correct'] = 1;
                        break;
                    case '5':
                        questionDetails[currentrow]['answers'][opt]['is_correct'] = 1;
                        break;
                }
                questionDetails[currentrow]['answers'][opt]['correctness_percentage'] = $(element).find(".mcorrect_answer_data").val();
                opt++;

            });
            createTable(questionDetails);
            $("#currentrow").val($.map(questionDetails, function(n, i) {
                return i;
            }).length);
            resetQuestion();
        }
        else {


        }
    }

    function resetQuestion() {
        $('.reset').val("");


        var len = $('#optionstable tr').length;
        $('#optionstable tr').each(function(index) {
            if (len > 1) {
                $(this).find('.icon-trash').trigger('click');
            }
            len--;

        });

    }

    function validate() {
        var questiontype = $('#question_type').val();

        var error = "";
        if ($('#question').val() == "") {
            error += "Question cannot be empty...";
        }
        switch (questiontype) {
            case 'multiplechoice':
                if ($('.answer_data').length >= 3) {
                    $.each($('.answer_data'), function(ele) {

                    });
                } else {
                    error += "<br/> Count of options cannot be less than 3";
                }

                break;
            case 'multipleresponse':
                $('.multipleanswer,.answer').show();
                break;
            case 'true_false':
                $('.true_false,').show();
                break;
            case 'fillintheblank':
                $('.answer').show();
                break;
            case 'matching':
                $('.matchanswer,.answer').show();
                break;
            case 'sequence':
                $('.answer').show();
                break;
        }


        if (error != "") {
            $(".alert-error").html('<button type="button" class="close" data-dismiss="alert">Ã—</button><h3>Error ! </h3> ' + error).show();
            return false;
        } else {
            $(".alert-error").hide();
            return true;
        }


    }

    function resetOptionsTable(val) {
        $('.multipleanswer,.multipleoption,.matchanswer,.answer,.correctness_percentage,.true_false,.fillintheblank').hide();
        switch (val) {
            case '0':
                $('.multipleoption,.answer').show();
                break;
            case '1':
                $('.multipleanswer,.answer').show();
                break;
            case '2':
                $('.true_false').show();
                break;
            case '3':
                $('.fillintheblank').show();
                break;
            case '4':
                $('.matchanswer,.answer').show();
                break;
            case '5':
                $('.answer').show();
                break;
        }
    }

    function createTable(data) {
        var html = '';
        var cnt = 1;
        var totalmark = 0;
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
            html += $("#question_type option[value='" + value['question_type'] + "']").text();
            html += '</td>';
            html += '<td>';
            html += $.map(value['answers'], function(n, i) {
                return i;
            }).length;
            //          console.log(value['answers']);
            html += '</td>';

            html += '<td>';
            var mark = 1;

            var qt = value['question_type'];
            if (qt == 4 || qt == 5) {
                mark = $.map(value['answers'], function(n, i) {
                    return i;
                }).length;
            }

            //                if (data[key]['is_correct'][i] == 1 && data[key]['question_type'] == 1) {
            //                    mark = 1 / i;
            //                } else if (data[key]['is_correct'][i] == 1) {
            //                    mark++;
            //                }


            html += mark;
            totalmark = totalmark + mark;
            html += '</td>';

            html += '<td>';
            html += '<i class="icon-edit"></i><i class="icon-trash"></i>';
            html += '</td>';
            html += '</tr>';
            cnt++;

        });
        html += '<tr><td colspan=4 style="text-align:right"><b>Total</b></td><td id="total_mark_display" colspan=2 style="text-align:left">' + totalmark + '</td></tr>';

        //$(("#available_questions").find("tbody")
        $("#available_questions").find("tbody").append(html);
        resetQuestion();
        $('#available_questions').find('.icon-edit').click(function(obj, a) {
            loadQuestion($(this).parent().siblings(":first").text())
            $('#addquestion').html('Save Changes');
        });
        calculateTotalMark();
    }
    function calculateTotalMark() {
        var total = 0;
        $('#available_questions').find('tr').find('td:nth(4)').each(function(i, e) {
            total += parseInt($(e).html());
        });
        $("#total_marks").val(total);
        $("#total_mark_display").html(total);
    }

    function loadQuestion(item) {
        resetQuestion();

        item = parseInt(item - 1);
        console.log(item);
        if (isNaN(item)) {
        } else {
            $("#currentrow").val(item)
            $('#question_type').val(questionDetails[item]['question_type']).trigger('change');
            $('#question').val(questionDetails[item]['question']);
            var len = questionDetails[item]['answers'].length;

            for (i = 1; i <= len; i++) {
                if (i < len) {
                    $('#optionstable tr:nth-child(' + i + ')').find('.icon-plus').trigger('click');
                }

                $('#optionstable tr:nth-child(' + i + ')').find(".answer_data").val(questionDetails[item]['answers'][i - 1]['answer']);
                $('#optionstable tr:nth-child(' + i + ')').find(".match_data").val(questionDetails[item]['answers'][i - 1]['match_answer']);
                $('#optionstable tr:nth-child(' + i + ')').find(".correct_answer_data").val(questionDetails[item]['answers'][i - 1]['is_correct']);
                $('#optionstable tr:nth-child(' + i + ')').find(".mcorrect_answer_data").val(questionDetails[item]['answers'][i - 1]['correctness_percentage']);

            }



        }


    }

    function getValues() {
        $('#match_answer').val();
        $('#answer').val();
        $('#question').val();
        $('#instructions').val();
        $('#name').val();
        $('#subject').val();
        $('#description').val();
        $('#activedates').val();
        $('#testtime').val();


    }

</script>







