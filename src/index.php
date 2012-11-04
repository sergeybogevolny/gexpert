<?php
define('AppRoot', dirname(dirname(__FILE__)));
include_once AppRoot . '/inc/config/properties.php';
include_once AppRoot . '/inc/cUtil.php';
$utilObj = new cUtil();

$_GET = $utilObj->urlDecode($_GET);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GExperting</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <style>
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="../src/css/daterangepicker.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="img/favicon.ico">

    </head>

    <body>
        <script src="js/jquery.js"  ></script>
        <script src="js/jquery-ui.js"  ></script>
        <script src="js/bootstrap.min.js"  ></script>
        <script src="../src/js/date.js"></script>
        <script src="../src/js/daterangepicker.js"></script>
        <script src="../src/js/jquery.bootstrap.wizard.js"></script>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Project name</a>
                    <a class="brand" href="<?php echo $utilObj->createLinkUrl(array('f' => 'createtest')); ?>">Create Test</a>

                    <div class="btn-group pull-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Action
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>Settings</li>
                        </ul>
                    </div>

                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav ">

                            <li><a href="#contact">Login</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">

            <?php
            $page = $_GET['f'] ? $_GET['f'] : 'home';
            include 'templates/' . $page . '.php';
            ?>

        </div> <!-- /container -->


    </body>
</html>

