<?php
define('AppRoot', dirname(__FILE__));
include_once AppRoot . '/inc/config/properties.php';
include_once AppRoot . '/inc/common/cForm.php';
//include_once AppRoot .AppLocalizationURL. 'common.php';

$cFormObj = new cForm();
session_start();

//print_r($_POST);
//print_r($_GET);
//exit;
$_GET = $cFormObj->urlDecode($_GET);


if ($_POST['type'] != 'ajax' && $_GET['type'] != 'ajax') {
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
            <link href="src/css/bootstrap.css" rel="stylesheet">
            <style>
                body {
                    padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
                }
                #sortable { list-style-type: none; margin: 0; padding: 0; width: 30%; }
                #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1em; height: 14px; }
                #sortable li span { position: absolute; margin-left: -1.3em; }
                #sortable1 { list-style-type: none; margin: 0; padding: 0; width: 30%; }
                #sortable1 li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1em; height: 14px; }
                #sortable1 li span { position: absolute; margin-left: -1.3em; }
            </style>
            <link href="src/css/bootstrap-responsive.css" rel="stylesheet">
            <link rel="stylesheet" href="src/css/daterangepicker.css">
            <link rel="stylesheet" href="src/css/wysiwyg-color.css">
            <link rel="stylesheet" href="src/css/jquery_ui.css">
            <link rel="stylesheet" href="src/css/bootstrap-toggle.css">

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
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="#">G-Expertise</a>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="<?php echo $cFormObj->createLinkUrl(array('f' => 'take_a_test')); ?>">
                                Take A Test
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'take_a_test')); ?>">Take a Test</a></li>
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'question')); ?>">Questions</a></li>
                            </ul>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Test Manager
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>">New Test</a></li>
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Existing Tests</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Admin<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'users')); ?>">Users</a></li>
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'category')); ?>">Category</a></li>

                            </ul>
                        </div>
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
            }

            $page = $_GET['f'] ? $_GET['f'] : 'home';
            if (is_readable('src/scripts/' . $page . '.php')) {
                include_once 'src/scripts/' . $page . '.php';
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