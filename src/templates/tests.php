<?php include AppRoot . AppScriptURL . "testmanager.php"; ?>


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

                <legend>Tests Available</legend>  
                <table class="table table-striped" id="datatable">  
        <thead>  
          <tr>  
            <th>Test Name</th>  
            <th>Category</th>  
            <th>Active Dates</th>  
            <th>Active</th>  
            <th>Actions</th>  

          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>001</td>  
            <td>Rammohan </td>  
            <td>Reddy</td>  
            <td>A+</td>  
                                <td>
                                    <i class="icon-edit"></i>
                                    <i class="icon-trash"></i>
                                    <i class="icon-ok"></i>
                                </td>          

          </tr>  

          <tr>  
            <td>003</td>  
            <td>Rabindranath</td>  
            <td>Sen</td>  
            <td>A+</td>  
                                <td>
                                    <i class="icon-edit"></i>
                                    <i class="icon-trash"></i>
                                    <i class="icon-ok"></i>
                                </td>          </tr>  
        </tbody>  
      </table>  

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







