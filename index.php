<?php
define('AppRoot', dirname(__FILE__));
include_once AppRoot . '/inc/config/properties.php';
session_start();
include_once AppRoot . '/inc/common/cForm.php';
include_once AppRoot . '/inc/controller/cUserController.php';
//include_once AppRoot .AppLocalizationURL. 'common.php';

$cFormObj = new cForm();
$cUserObj = new cUserController();


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

if ($page == 'login' || $page == '') {
    include 'src/templates/' . $page . '.php';
    exit;
} else if ($_POST['type'] != 'ajax' && $_GET['type'] != 'ajax') {
    ?>
    <!doctype html>
    <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
            <!-- Apple devices fullscreen -->
            <meta name="apple-mobile-web-app-capable" content="yes" />
            <!-- Apple devices fullscreen -->
            <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

            <title>gXpertize - <?php echo $pagename; ?></title>

            <!-- Bootstrap -->
            <link rel="stylesheet" href="src/theme2/css/bootstrap.min.css">
            <!-- Bootstrap responsive -->
            <link rel="stylesheet" href="src/theme2/css/bootstrap-responsive.min.css">
            <!-- jQuery UI -->
            <link rel="stylesheet" href="src/theme2/css/plugins/jquery-ui/smoothness/jquery-ui.css">
            <link rel="stylesheet" href="src/theme2/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
            <link rel="stylesheet" href="src/theme2/css/style.css">
            <!-- Color CSS -->
            <link rel="stylesheet" href="src/theme2/css/themes.css">
            <!-- date-->
            <link rel="stylesheet" href="src/css/daterangepicker.css">
            <!-- jQuery -->
            <script src="src/theme2/js/jquery.min.js"></script>
            <!--TODO FIX-->
            <script src="src/js/date.js"></script>
            <script src="src/js/daterangepicker.js"></script>

            <!-- Nice Scroll -->
            <script src="src/theme2/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>

            <!-- jQuery UI -->
            <script src="src/theme2/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
            <script src="src/theme2/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
            <script src="src/theme2/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
            <script src="src/theme2/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
            <script src="src/theme2/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
            <script src="src/theme2/js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
            <!-- slimScroll -->
            <script src="src/theme2/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
            <!-- Bootstrap -->
            <script src="src/theme2/js/bootstrap.min.js"></script>
            <!-- Flot -->
            <script src="src/theme2/js/plugins/flot/jquery.flot.min.js"></script>
            <script src="src/theme2/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
            <script src="src/theme2/js/plugins/flot/jquery.flot.pie.min.js"></script>
            <script src="src/theme2/js/plugins/flot/jquery.flot.resize.min.js"></script>
            <!-- dataTables -->
            <script src="src/theme2/js/plugins/datatable/jquery.dataTables.min.js"></script>
            <script src="src/theme2/js/plugins/datatable/TableTools.min.js"></script>
            <script src="src/theme2/js/plugins/datatable/ColReorderWithResize.js"></script>
            <script src="src/theme2/js/plugins/datatable/ColVis.min.js"></script>
            <script src="src/theme2/js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
            <script src="src/theme2/js/plugins/datatable/jquery.dataTables.grouping.js"></script>
            <link rel="stylesheet" href="src/theme2/css/plugins/datatable/TableTools.css">
            <!-- Form -->
            <script src="src/theme2/js/plugins/form/jquery.form.min.js"></script>

            <script src="src/js/jquery.table.addrow.js"></script>
            <script src="src/js/jquery.base64.js"></script>
            <script src="src/js/jquery.bootstrap.wizard.js"></script>



            <!--[if lte IE 9]>
                    <script src="src/theme2/js/plugins/placeholder/jquery.placeholder.min.js"></script>
                    <script>
                            $(document).ready(function() {
                                    $('input, textarea').placeholder();
                            });
                    </script>
            <![endif]-->

            <!-- Favicon -->
            <link rel="shortcut icon" href="src/theme2/img/favicon.ico" />
            <!-- Apple devices Homescreen icon -->
            <link rel="apple-touch-icon-precomposed" href="src/theme2/img/apple-touch-icon-precomposed.png" />


        </head>

        <body class="theme-satgreen">
            <div id="navigation">
                <div class="container-fluid">
                    <a href="#" id="brand">gXpertize</a>
                    <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"></a>
                    <ul class='main-nav'>
                        <li>
                            <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                                <span>Take a Test</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Take a Test</a>
                                </li>
                                <li>
                                    <a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'show' => 'all')); ?>">Scores</a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                                <span>Test Manager</span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'createtest')); ?>">New Test</a></li>
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Existing Tests</a></li>
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'generateproductkey')); ?>">Product Keys</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'category')); ?>"
                               <span>Category</span>
                            </a>
                        </li>
                    </ul>
                    <div class="user">
                        <div class="dropdown">
                            <a href="#" class='dropdown-toggle' data-toggle="dropdown">Welcome <?php echo $_SESSION['name']; ?> !</a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'logout')); ?>">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid" id="content">
                <div id="main">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="pull-left">
                                <h1><?php echo $pagename; ?></h1>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <?php
                        }
                        include 'src/templates/' . $page . '.php';
                        if ($_POST['type'] != 'ajax' && $_GET['type'] != 'ajax') {
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            <div id="footer" align="center">
                Developed by Megam Technologies<br>©2014 gXpertize
            </div>
        </body>
    </html>
    <?php
}
?>
