<?php include AppRoot . AppScriptURL . "testmanager.php"; ?>
<link rel="stylesheet" href="../src/css/daterangepicker.css">
<script src="../src/js/jquery.bootstrap.wizard.js"></script>
<script src="../src/js/date.js"></script>
<script src="../src/js/daterangepicker.js"></script>

 	

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
             <fieldset>
             <legend>Create Test</legend>  
                            <div class="control-group">
                                <label class="control-label" for="testname">Test Name</label>
                                <div class="controls">
                                    <input name="testname" type="text" id="testname" />

                                </div>
                            </div>
                     
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

                            <div class="control-group">
                                <label class="control-label" for="description">Description</label>
                                <div class="controls">
                                    <input name="description" type="text" id="description" />
                                </div>
                            </div>
                       
                            <div class="control-group">
                                <label class="control-label" for="instructions">Instructions</label>
                                <div class="controls">
                                    <textarea name="instructions" id="instructions" cols="45" rows="5"></textarea>
                                </div>
                            </div>
                            
                        <div class="control-group">
					      <label class="control-label" for="activedates">Active dates</label>
					      <div class="controls">
					        <div class="input-append">
                                                  <input type="text" name="activedates" id="activedates"/>
                                                  <span class="add-on"><i class="icon-calendar"></i></span>
					        </div>
					      </div>
					    </div>
                      
                        
                            <div class="control-group">
                                <label class="control-label" for="testtime">Test Time</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input name="testtime" type="text" id="testtime" class="span1"  />
                                        <span class="add-on">Mins</span>
                                    </div>

                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                       </fieldset>


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
		$('#activedates').daterangepicker();	
    });
</script>







