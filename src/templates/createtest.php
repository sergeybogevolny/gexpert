<?php include AppRoot . AppScriptURL . "testmanager.php"; ?>
<script src="../src/js/jquery.bootstrap.wizard.js"></script>
<form method="POST" action=<?php echo AppURL . AppScriptURL; ?>testmanager.php class="form-horizontal">

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
                <table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>

                            <div class="control-group">
                                <label class="control-label" for="testname">Test Name</label>
                                <div class="controls">
                                    <input name="testname" type="text" id="testname" />

                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>

                        <td>
                            <div class="control-group">
                                <label class="control-label" for="subject">Test Subject</label>
                                <div class="controls">
                                    <select name="subject" id="subject">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>


                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="control-group">
                                <label class="control-label" for="description">Description</label>
                                <div class="controls">
                                    <input name="description" type="text" id="description" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="control-group">
                                <label class="control-label" for="instructions">Instructions</label>
                                <div class="controls">
                                    <textarea name="instructions" id="instructions" cols="45" rows="5"></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="control-group">
                                <label class="control-label" for="startdate">Start date</label>
                                <div class="controls">
                                    <input name="startdate" type="date" id="startdate" />
                                </div>
                            </div>
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <div class="control-group">
                                <label class="control-label" for="startdate">End date</label>
                                <div class="controls">
                                    <input name="enddate" type="date" id="enddate" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>


                            <div class="control-group">
                                <label class="control-label" for="testtime">Test Time</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="testtime" type="text" id="testtime" class="span1"  />
                                        <span class="add-on">Mins</span>
                                    </div>
                                </div>
                            </div>

                        </td>



                    </tr>
                </table>	      
            </div>
            <div class="tab-pane" id="tab2">
                <div class="control-group">
                    <label class="control-label" for="question_type">Question Type</label>
                    <div class="controls">
                        <select name="question_type" id="question_type">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="question">Question</label>
                    <div class="controls">
                        <textarea cols="45" rows="5" name="question"></textarea>
                    </div>
                </div>
                <div>
                    <table class="table table-striped table-bordered table-hover .table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Answer</th>
                                <th>Match Answer</th>
                                <th>Is Correct</th>
                                <th>Correctness Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label>1</label>
                                </td>
                                <td>
                                    <textarea rows="1" name="answer"></textarea>
                                </td>
                                <td>
                                    <textarea rows="1" name="match_answer"></textarea>
                                </td>
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" value="">
                                        Multiple Option
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Correct
                                    </label>
                                </td>
                                <td>
                                    <div class="controls" style="margin-left: 0px">
                                        <div class="input-append" >
                                            <input name="correctness_percentage" type="text" id="correctness_percentage" class="span1"/>
                                            <span class="add-on">%</span>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <i class="icon-edit"></i>
                                    <i class="icon-trash"></i>
                                    <i class="icon-ok"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <ul class="pager wizard">
                <li class="previous first" style="display:none;"><a href="#">First</a></li>
                <li class="previous"><a href="#">Previous</a></li>
                <li class="next last" style="display:none;"><a href="#">Last</a></li>
                <li class="next"><a href="#">Next</a></li>
            </ul>
        </div>	
    </div>
</form>
<script>

    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard();
    });
</script>







