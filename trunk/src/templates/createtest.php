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
                                    <input name="subject" type="text" id="subject" />
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
                    <tr>
                        <td>


                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="span2 btn">Create</button>
                                </div>
                            </div>
                        </td>

                    </tr>
                </table>	      



            </div>
            <div class="tab-pane" id="tab2">
                2
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







