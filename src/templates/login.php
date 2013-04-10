<?php
$cFormObj->options["alert"]["type"] = $_GET['mc'];
$cFormObj->options["alert"]["data"] = $_GET['m'];

$cFormObj->addAlert();
echo $cFormObj->html();
?>

<form method="POST" class="form-horizontal">
<div class="container-fluid">
<div class="span6" align="center">
      <img src="<?php echo ClientLogo;?>"  /></br>
	  <h1><?php echo ClientName;?></h1>
      </div>
    <div class="span5">
      <legend>g-Xpertize Login</legend>
      
        <div class="control-group">
            <label class="control-label" for="username">Username</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-user"></i>                    </span>
                    <input name="loginname" type="text" id="username" value="" class="username" placeholder="Username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">
                        <i class="icon-lock"></i>                    </span>
                    <input name="password" type="password" id="password" class="password" placeholder="Password" required/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
<!--                <input name="rememberme" type="checkbox" id="rememberme" value="forever" />-->
                <!--&nbsp; Remember me&nbsp;&nbsp;-->
                <input type="submit" name="Submit" value="Login" class="btn btn-primary" />
                <a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'forget_password')); ?>">Forget Password</a>
                <div align="left">New User ?&nbsp;
                    <a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'register')); ?>">Click here to register</a>                </div>
            </div>
        </div>
    </div>
</div>
</form>