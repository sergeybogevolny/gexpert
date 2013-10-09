<?php
$cFormObj->options["alert"]["type"] = $_GET['mc'];
$cFormObj->options["alert"]["data"] = $_GET['m'];

$cFormObj->addAlert();
echo $cFormObj->html();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
        <title>GExpert</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="src/theme1/css/bootstrap.min.css">
        <!-- Bootstrap responsive -->
        <link rel="stylesheet" href="src/theme1/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="src/css/jquery_ui.css">
        <link rel="stylesheet" href="src/theme1/css/style.css" media="screen">
        <link rel="stylesheet" href="src/theme1/css/themes.css" media="screen">

        <!-- src/theme1/css STYLE -->
        <link rel="stylesheet" href="src/theme1/css/elements.css"  media="screen">

        <!-- gXpertise CSS Files-->

        <link rel="stylesheet" href="src/css/cus-icons.css">
        <link rel="stylesheet" href="src/css/TableTools.css">
        <!--[if lt IE 9]>
            <link rel="stylesheet" href="src/theme1/css/docs.css" type="text/src/theme1/css" media="screen">
            <link rel="stylesheet" href="src/theme1/css/ie.css" type="text/src/theme1/css" media="screen">
          <![endif]-->
        <!-- gxpertise js files  -->
        <script src="src/js/jquery.js"></script>
        <script type="text/javascript" src="src/js/bootstrap.js"></script>
        <script src="src/js/jquery-ui.js"></script>
        <script src="src/js/bootstrap-toggle.js"></script>
        <script src="src/js/date.js"></script>
        <script src="src/js/daterangepicker.js"></script>
        <script src="src/js/jquery.bootstrap.wizard.js"></script>
        <script src="src/js/jquery.table.addrow.js"></script>
        <script src="src/js/jquery.base64.js"></script>
        <script src="src/js/jbclock.js"></script>
        <script src="src/js/jquery.dataTables.js"></script>
        <script src="src/js/TableTools.js"></script>
        <script src="src/theme1/js/eakroko.js"></script>
        <script src="src/theme1/js/application.min.js"></script>
        <script src="src/js/ZeroClipboard.js"></script>
        <!-- Nice Scroll -->
        <script src="src/theme1/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>

    </head>

    <body class="login">
        <div class="wrapper">
            <h1><a href="#"><img src="http://localhost/gxpertize/src/img/b_logo.png" alt="" class='retina-ready' width="150" height="100"></a></h1>
            <div class="login-body">
                <h2>SIGN IN</h2>
                <form method="POST"  class='form-validate' id="test">
                    <div class="control-group">
                        <div class="email controls">
                            <input type="text" name="loginname" placeholder="Username" id="username" class="input-block-level" data-rule-required="true" data-rule-email="true">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="pw controls">
                            <input type="password" name="password" id="password" placeholder="Password" class='input-block-level' data-rule-required="true">
                        </div>
                    </div>
                    <div class="submit">
                        <div class="remember">
                            <input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
                        </div>
                        <input type="submit" name="submit" value="Login" class='btn btn-primary'>

                    </div>
                </form>
                <div class="forget">
                    <a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'forget_password')); ?>"><span>Forgot password?</span></a>
                </div>
            </div>
        </div>


    </body>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-38620714-4']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
</html>