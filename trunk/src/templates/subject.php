<?php include AppRoot . AppScriptURL . "testmanager.php"; ?>
<script src="../src/js/jquery.bootstrap.wizard.js"></script>


 	

<form method="POST" action=<?php echo AppURL . AppScriptURL; ?>testmanager.php class="form-horizontal">

    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li><a href="#tab1" data-toggle="tab">Master</a></li>
                        <li><a href="#tab2" data-toggle="tab">Questions</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane" id="tab1">
             <fieldset>
             <legend>Subject</legend>  
                            <div class="control-group">
                                <label class="control-label" for="name">Name</label>
                                <div class="controls">
                                    <input name="name" type="text" id="name" />

                                </div>
                            </div>
                     
                      
                           <div class="control-group">  
                            <label class="control-label" for="logo">Logo</label>  
                            <div class="controls">  
                              <input class="input-file" id="logo" type="file">  
                            </div>  
                          </div>  
                          

                                                   
                         <div class="control-group">
                                <label class="control-label" for="code">Code</label>
                                <div class="controls">
                                    <input name="code" type="text" id="code" />

                                </div>
                            </div>



                            <div class="control-group">  
            <label class="control-label" for="status">Status</label>  
            <div class="controls">  
              <label class="checkbox">  
                <input type="checkbox" id="status" value="option1">  
              </label>  
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
    });
</script>







