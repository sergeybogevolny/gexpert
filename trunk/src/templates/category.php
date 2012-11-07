<form method="POST" class="form-horizontal">

    <fieldset>
        <legend>Category</legend>  
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
                    <input type="checkbox" id="status" name="status" checked="true">  
                </label>  
            </div>  
        </div> 
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>                       
    </fieldset>





</form>
<?php
echo $datatable;
?>