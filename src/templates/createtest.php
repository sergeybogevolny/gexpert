
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

                <legend>Create Test</legend>  
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
                <legend>Questions</legend>
                <div class="control-group">
                    <label class="control-label" for="question_type">Question Type</label>
                    <div class="controls">

                        <?php
                        $cFormObj->data = array("multiplechoice" => "Multiple Choice", "multipleresponse" => "Multiple Response", "true_false" => "True/False", "fillintheblank" => "Fill in the Blank", "matching" => "Matching", "sequence" => "Sequencing");

                        $cFormObj->options = array("name" => "question_type", "default" => false);
                        $cFormObj->createSelect();
                        echo $cFormObj->html();
                        ?>
                    </div>
                </div>
               <div class="control-group">
                    <label class="control-label" for="question">Question</label>
                    <div class="controls">
                        <textarea class="htmleditor" name="question" id="question"></textarea>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover .table-condensed" id="optionstable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Answer</th>
                                <th class="matchanswer">Match Answer</th>
                                <th class="multipleanswer multipleoption">Is Correct</th>
                                <th class="multipleanswer multipleoption">Correctness Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="rowNumber">1</label>
                                </td>
                                <td >
                                    <textarea rows="1" class="htmleditor" name="answer" id="answer"></textarea>
                                </td>
                                <td class="matchanswer">
                                    <textarea rows="1" class="htmleditor" name="match_answer" id="match_answer"></textarea>
                                </td>
                                <td class="multipleanswer multipleoption">
                                    <label class="checkbox multipleanswer">
                                        <input type="checkbox" name="multipleanswer_1" id="multipleanswer_1">
                                        Multiple Option
                                    </label>
                                    <label class="radio multipleoption">
                                        <input type="radio" name="correctanswer" id="correctanswer[]"  checked>
                                        Correct
                                    </label>
                                </td>
                                <td class="multipleanswer multipleoption">
                                    <div class="controls" style="margin-left: 0px">
                                        <div class="input-append" >
                                            <input name="correctness_percentage" type="text" id="correctness_percentage" class="span1"/>
                                            <span class="add-on">%</span>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <i class="icon-edit"></i>
                                    <i class="icon-ok"></i>
                                    <i class="icon-trash"></i>
                                    <i class="icon-plus"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    $cTestControllerObj->table = "test_details";
                    $cTestControllerObj->curd();
                    $cFormObj->options['actioncolumn'] = true;
                    $cFormObj->options['header'] = array("Id", "Name", "Code", "Logo", "Created", "Status");
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
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
		
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
                if($current==1){
                    $('#rootwizard').find('.pager .previous').hide();
                }else{
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
                success:function(){
                        
                }
            });
                
            //$('#rootwizard').find("a[href*='tab1']").trigger('click');
        });
        $('#activedates').daterangepicker(
        {
            ranges: {
                'Today': ['today', 'today'],
                'Tommorrow': ['tommorrow', 'tommorrow'],
                'Next 7 Days': ['today', Date.today().add({ days: 6})],
                'Next 30 Days': ['today', Date.today().add({ days: 29})],
                'This Month': [Date.today().moveToLastDayOfMonth(), Date.today().moveToFirstDayOfMonth()],
                'Next Month': [Date.today().moveToFirstDayOfMonth().add({ days: -1}), Date.today().moveToFirstDayOfMonth().add({ months: 1})]
            }
        },
        function(start, end) {
            $('.calender input').html(start.toString('MMMM d, yyyy') + ' - ' + end.toString('MMMM d, yyyy'));
        }
    );
        
        $('#instructions').wysihtml5({"color": true});
        $('#question').wysihtml5({"font-styles": false,"color": true,"emphasis": true,"lists": false,"link": false});
        $('#answer').wysihtml5({"font-styles": false,"color": false,"emphasis": false,"lists": false,"link": false});
        $('#match_answer').wysihtml5({"font-styles": false,"color": false,"emphasis": false,"lists": false,"link": false});
        
        
        $(".icon-plus").btnAddRow({rowNumColumn:"rowNumber"});
        $(".icon-trash").btnDelRow();
        $('.multipleanswer,.multipleoption,.matchanswer').hide();    
        
        //$('#optionstable th:nth-child('+(2)+')').hide();
        $("#question_type").bind('change', function(){
            $('.multipleanswer,.multipleoption,.matchanswer').hide();
            switch($(this).val()){
                case 'multiplechoice':
                    $('.multipleoption,').show();
                    break;
                case 'multipleresponse':
                    $('.multipleanswer,').show();
                    break;
                case 'true_false':
                    
                    break;
                case 'fillintheblank':
                    
                    break;
                case 'matching':
                    
                    break;
                case 'sequence':
                    
                    break;
            }
        
        });
        
    });
    
    
    
    function getValues(){


        $('#match_answer').val();
        $('#answer').val();
        $('#question').val();
        $('#instructions').val();
        $('#testname').val();
        $('#subject').val();
        $('#description').val();
        $('#activedates').val();
        $('#testtime').val();
        $('#question_type').val();
        $('#multipleanswer_1').val();
        $('#correctness_percentage').val();
        
    }
    
</script>






