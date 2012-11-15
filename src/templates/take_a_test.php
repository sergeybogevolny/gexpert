<form method="POST" class="form-horizontal">

    <div id="rootwizard">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul>
                        <li><a href="#tab1" data-toggle="tab">Take a Test</a></li>

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
            <th>Status</th>  
            <th>Take Test</th>            
          </tr>  
        </thead>  
        <tbody>  
          <tr>  
            <td>Excel Experting for Entry level test</td>  
            <td>Available </td>  
            <td><a href="test1.html">Take Test</a></td>  
          </tr>  
          <tr>  
            <td>MS Powerpoint Experting for Entry level test</td>  
            <td>Available </td>  
            <td><a href="test1.html">Take Test</a></td>  
          </tr>         </tbody>  
      </table>  

        </div>	
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard();
    });
</script>