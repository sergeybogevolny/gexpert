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
<title>Geotekh</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<meta name="description" content="Your description">
<meta name="keywords" content="Your keywords">
<meta name="author" content="Your name">
<link rel="stylesheet" href="src/theme1/css/bootstrap.css" type="text/css" media="screen">
<link rel="stylesheet" href="src/theme1/css/responsive.css" type="text/css" media="screen">
<link rel="stylesheet" href="src/theme1/css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="src/theme1/css/inner.css" type="text/css" media="screen">
<link rel="stylesheet" href="src/theme1/css/footer-color.css" type="text/css" media="screen">
<link rel="stylesheet" href="src/theme1/css/color1.css" type="text/css" id="theme" />
<link rel="stylesheet" href="src/theme1/css/footer-color.css" type="text/css" media="screen">
<link rel="stylesheet" href="src/theme1/css/elements.css" type="text/css" media="screen">
 <!-- gXpertise CSS Files-->
            <link rel="stylesheet" href="src/css/daterangepicker.css">
            <link rel="stylesheet" href="src/css/wysiwyg-color.css">
            <link rel="stylesheet" href="src/css/jquery_ui.css">
            <link rel="stylesheet" href="src/css/bootstrap-toggle.css">
            <link rel="stylesheet" href="src/css/jbclock.css">
            <link rel="stylesheet" href="src/css/style.css">
            <link rel="stylesheet" href="src/css/cus-icons.css">
            <link rel="stylesheet" href="src/css/TableTools.css">
<!--[if lt IE 9]>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="src/theme1/css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="src/theme1/css/ie.css" type="text/css" media="screen">
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
            <script src="src/js/ZeroClipboard.js"></script>
</head>
<body class="inner-page stretched">
            <div id="wrapper">
                <!--==============================header=================================-->
                <div class="header-block clearfix">
                    <!-- open close panel -->

                    <!-- Logo & Navigation -->
                    <header>
                        <div class="container clearfix">
                            <div class="row ">
                                <div class="span12">
                                    <!-- Logo -->
                                    <h1 class="brand brand_"><a href="index.html"><img src="<?php echo BrandLogo; ?>"  /></a></h1>
                                    <!-- Navigation -->
                                    <div class="navbar navbar_">
                                        <div class="container">
                                            <?php if ($_SESSION["user_id"]) { ?>
                                                <!--=========== menu ===============-->
                                                <div class="nav-collapse">
                                                    <ul class="nav">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Take a Test <b class="caret"></b></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'tests')); ?>">Take a Test</a></li>
                                                                <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'scores', 'show' => 'all')); ?>">Scores</a></li>
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
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
                <!--==============================content=================================-->
                <section id="content">
                    <div class="breadcrumb-wrapper">
                        <div class="shadowdrop"></div>
                        <div class="container">
                            <h2><?php echo $pagename; ?><small><?php echo $pagedescription; ?></small></h2>
                            <ul class="breadcrumb fright">
                                <?php if ($_SESSION["user_id"]) { ?>
                                    <li><a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'logout')); ?>">Logout</a></li>
                                <?php } else { ?>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <!-- welcome -->
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
                            <!-- Strip with button -->
                        </div>
                    </div>
                </section>
                <!--==============================footer=================================-->
                <footer>
                    <div id="footer" class="section-3 footer-dark">
                        <div class="container">
                            <div class="row">
                                <!-- Contact us -->
                                <div class="span3">
                                    <h2>Contact us</h2>
                                    <address class="vcard">
                                        <span class="street-address">Plot #1, CTA Garden, AR Nagar, Mangadu, Chennai.</span> <span class="tel">+1 234 123 4567</span>info@geotekh.com
                                        <ul id="social" class="tooltip-src/theme1/demo">
                                            <li><a rel="tooltip" title="Twitter" href="#"><src/theme1/img alt="Twitter" src="src/theme1/img/social_icons/twitter.png"></a></li>
                                            <li><a rel="tooltip" title="Facebook" href="#"><src/theme1/img alt="Facebook" src="src/theme1/img/social_icons/facebook.png"></a></li>
                                            <li><a rel="tooltip" title="Skype" href="#"><src/theme1/img alt="Skype" src="src/theme1/img/social_icons/skype.png"></a></li>
                                        </ul>
                                    </address>
                                </div>
                                <!-- Useful Links -->
                                <div class="span3">
                                    <h2>Useful Links</h2>
                                    <ul class="list">
                                        <li><a href="#">gStock</a></li>
                                        <li><a href="#">gHotel</a></li>
                                        <li><a href="#">gCrm</a></li>
                                        <li><a href="#">gKart</a></li>
                                    </ul>
                                </div>
                                <!-- twitter feed  -->
                                <div class="span3">
                                    <h2>Twitter Feed</h2>
                                    <div class="tweets">
                                        <p> Loading Tweets... </p>
                                        <ul id="tweet-list">
                                        </ul>
                                    </div>
                                </div>
                                <!-- Newsletter -->
                                <div class="span3">
                                    <h2>Newsletter</h2>
                                    <form class="navbar-inverse form-search">
                                        <div class="navbar-search input-append">
                                            <input type="text" placeholder="Your Email" class="span2 search-query">
                                            <button type="submit" class="btn btn-warning">submit</button>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer 2 -->
                    <div id="copyrights" class="footer-2 footer-dark">
                        <div class="container">
                            <div class="row">
                                <div class="span12"><a href="index.html"><?php echo BrandName; ?></a> &copy; 2013 <a href="<?php echo CompanyURL; ?>"><img src="<?php echo CompanyLogo; ?>"  /></a></div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

        </body>
</html>
    <?php
}
?>