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
            <link rel="stylesheet" href="src/css/daterangepicker.css">
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
            <!-- Form -->
            <script src="src/theme1/js/plugins/form/jquery.form.min.js"></script>
            <!-- Wizard -->
            <script src="src/theme1/js/plugins/wizard/jquery.form.wizard.min.js"></script>


        </head>
        <body class="">


            <div id="navigation">
                <div class="container-fluid">
                    <a href="#" id="brand">Gexpert</a>
                    <?php if ($_SESSION["user_id"]) { ?>
                        <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation">
                            <i class="icon-reorder"></i>
                        </a>

                        <ul class='main-nav'>
                            <li class="">

                                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                                    <span>Take a Test</span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Take a Test</a></li>
                                    <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'show' => 'all')); ?>">Scores</a></li>
                                </ul>
                            </li>
                            <?php if ($_SESSION['user_type'] <= 1) { ?>
                                <li class="">

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
                                <li class="">

                                    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                                        <span>Survey Manager</span>
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'createsurvey')); ?>">New Survey</a></li>
                                        <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'survey_list')); ?>">Existing Survey</a></li>
                                    </ul>
                                </li>
                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'category')); ?>">Category</a></li>
                                <li><a  href="#"><?php echo "Welcome " . $_SESSION["name"]; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

            </div>

            <div class="container-fluid" id="content">
                <?php if ($_SESSION["user_id"]) { ?>
                    <div id="left">
                        <form action="#" method="GET" class='search-form'>
                            <div class="search-pane">
                                <input type="text" name="search" placeholder="Search here...">
                                <button type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                        <div class="subnav">
                            <div class="subnav-title">
                                <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Content</span></a>
                            </div>
                            <ul class="subnav-menu">
                                <li class='dropdown'>

                                    <a href="#" data-toggle="dropdown">Reports</a>
                                    <ul class="dropdown-menu">
                                        <li class='dropdown-submenu'>
                                            <a href="#" data-toggle="dropdown" class='dropdown-toggle'>Sample</a>
                                            <ul class="dropdown-menu">

                                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'report', "id" => 1, "customization_id" => 1)); ?>">Full data</a></li>
                                                                        <!--<li><a  href="<?php //echo $cFormObj->createLinkUrl(array('f' => 'report', "type" => "summary"));                                                                                 ?>">Summary</a></li>-->
                                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'report', "id" => 1, "customization_id" => 2)); ?>">CrossTab/Analytical</a></li>
                                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'report', "id" => 1, "customization_id" => 3)); ?>">Chart</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class='dropdown'>

                                    <a href="#" data-toggle="dropdown">Dashboard</a>
                                    <ul class="dropdown-menu">
                                        <li class='dropdown-submenu'>
                                            <a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'dashboard', "id" => 1)); ?>">Dashboard 1</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
                <div id="main">
                    <div class="container-fluid">
                        <div class="page-header">
                            <!--                            <div class="pull-left">
                            <?php echo $pagename; ?><small><?php echo $pagedescription; ?>
                                                        </div>-->

                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li>
                                    <a href="more-login.html">Home</a>
                                    <i class="icon-angle-right"></i>
                                </li>
                                <li>
                                    <a href="layouts-sidebar-hidden.html">Layouts</a>
                                    <i class="icon-angle-right"></i>
                                </li>
                                <li>
                                    <a href="layouts-footer.html">Footer</a>
                                </li>
                            </ul>
                            <div class="close-bread">
                                <a href="#"><i class="icon-remove"></i></a>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="title">

                                </div></br>
                                <p class="p0">

                                    <?php
                                }
                                include 'src/templates/' . $page . '.php';
                                if ($_POST['type'] != 'ajax' && $_GET['type'] != 'ajax') {
                                    ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div id="footer">
                <p>
                    <a href="index.html"><?php echo BrandName; ?></a> | &copy; 2013 <a href="<?php echo CompanyURL; ?>"><img src="<?php echo CompanyLogo; ?>"  /></a>
                </p>
                <a href="#" class="gototop"><i class="icon-arrow-up"></i></a>
            </div>



        </body>
    </html>
    <?php
}
?>