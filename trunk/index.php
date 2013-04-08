<?php
define('AppRoot', dirname(__FILE__));
include_once AppRoot . '/inc/config/properties.php';
session_start();
include_once AppRoot . '/inc/common/cForm.php';
//include_once AppRoot .AppLocalizationURL. 'common.php';

$cFormObj = new cForm();


$_GET = $cFormObj->urlDecode($_GET);
$page = $_GET['f'];
if ($_SESSION['user_id']) {
    //include_once AppRoot . AppScriptURL . 'menu.php';
    if ($page == 'login' || $page == '') {
        $page = AppHomePage;
    }
} else {

    if (in_array($page, unserialize(AppSessionLessPages)) === false) {
        $page = 'login';
    }
}
if (is_readable('src/scripts/' . $page . '.php')) {
    include_once 'src/scripts/' . $page . '.php';
}
if ($_POST['type'] != 'ajax' && $_GET['type'] != 'ajax') {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>g-Xpertize</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="">
            <meta name="author" content="">

            <!-- Le styles -->
            <link href="src/css/bootstrap.css" rel="stylesheet">
            <style>

            </style>
            <link href="src/css/bootstrap-responsive.css" rel="stylesheet">
            <link rel="stylesheet" href="src/css/daterangepicker.css">
            <link rel="stylesheet" href="src/css/wysiwyg-color.css">
            <link rel="stylesheet" href="src/css/jquery_ui.css">
            <link rel="stylesheet" href="src/css/bootstrap-toggle.css">
            <link rel="stylesheet" href="src/css/jbclock.css">
            <link rel="stylesheet" href="src/css/style.css">
            <link rel="stylesheet" href="src/css/cus-icons.css">

            <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

            <!-- Fav and touch icons -->
            <link rel="shortcut icon" href="img/favicon.ico">

        </head>

        <body>
            <script src="src/js/jquery.js"></script>
            <script src="src/js/jquery-ui.js"></script>
            <script src="src/js/bootstrap.min.js"  ></script>
            <script src="src/js/bootstrap-toggle.js"></script>
            <script src="src/js/date.js"></script>
            <script src="src/js/daterangepicker.js"></script>
            <script src="src/js/jquery.bootstrap.wizard.js"></script>
            <script src="src/js/jquery.table.addrow.js"></script>
            <script src="src/js/jquery.base64.js"></script>
            <script src="src/js/jbclock.js"></script>
            <script src="src/js/jquery.dataTables.js"></script>


            <div class="container">
                <div class="navbar navbar-inverse navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="#">g-Xpertize</a>
                            <?php if ($_SESSION["user_id"]) { ?>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Take a Test <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Take a Test</a></li>
                                            </ul>
                                        </li>
                                        <?php if ($_SESSION['user_type'] <= 1) { ?>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Test Manager<b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                    <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>">New Test</a></li>
                                                    <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Existing Tests</a></li>
                                                    <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>">Product Keys</a></li>
                                                </ul>
                                            </li>
                                            <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'category')); ?>">Category</a></li>

                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="nav-collapse collapse pull-right">
                                <ul class="nav ">

                                    <?php if ($_SESSION["user_id"]) { ?>
                                        <li><a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'logout')); ?>">Logout</a></li>
                                    <?php } else { ?>

                                        <li><a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'login')); ?>">Login</a></li>
                                    <?php } ?>



                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </div>
                </div>
                <?php
            }


            include 'src/templates/' . $page . '.php';
            if ($_POST['type'] != 'ajax' && $_GET['type'] != 'ajax') {
                ?>

            </div> <!-- /container -->


        </body>
    </html>

    <?php
}
?>