<form method="POST" class="form">
    <fieldset>
        <legend>Existing Users Login</legend>
        <div class="control-group">
            <label for="username">Username</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user"></i>
                    </span>
                    <input name="loginname" type="text" id="username" value="" class="username span2" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <label for="password">Password</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-lock"></i>
                    </span>
                    <input name="password" type="password" id="password" class="password span2" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
                &nbsp; Remember me&nbsp;&nbsp;
                <input type="submit" name="Submit" value="Login" class="btn btn-primary" />
            </div>
        </div>                        

        <div class="clear"></div>
        <div align="left">New User?&nbsp;
            <a href="index.php?f=cmVnaXN0ZXI=">Click here to register</a></div>	
        <div class="clear"></div>
    </fieldset>		
</form>