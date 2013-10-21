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

<!-- Mirrored from www.eakroko.de/flat/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 29 Sep 2013 07:46:59 GMT -->
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
	<!-- PageGuide -->
	<link rel="stylesheet" href="src/theme2/css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="src/theme2/css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="src/theme2/css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- chosen -->
	<link rel="stylesheet" href="src/theme2/css/plugins/chosen/chosen.css">
	<!-- select2 -->
	<link rel="stylesheet" href="src/theme2/css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="src/theme2/css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="src/theme2/css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="src/theme2/css/themes.css">


    
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
	<!-- Touch enable for jquery UI -->
	<script src="src/theme2/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="src/theme2/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Bootstrap -->
	<script src="src/theme2/js/bootstrap.min.js"></script>
	<!-- vmap -->
	<script src="src/theme2/js/plugins/vmap/jquery.vmap.min.js"></script>
	<script src="src/theme2/js/plugins/vmap/jquery.vmap.world.js"></script>
	<script src="src/theme2/js/plugins/vmap/jquery.vmap.sampledata.js"></script>
	<!-- Bootbox -->
	<script src="src/theme2/js/plugins/bootbox/jquery.bootbox.js"></script>
	<!-- Flot -->
	<script src="src/theme2/js/plugins/flot/jquery.flot.min.js"></script>
	<script src="src/theme2/js/plugins/flot/jquery.flot.bar.order.min.js"></script>
	<script src="src/theme2/js/plugins/flot/jquery.flot.pie.min.js"></script>
	<script src="src/theme2/js/plugins/flot/jquery.flot.resize.min.js"></script>
	<!-- imagesLoaded -->
	<script src="src/theme2/js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
	<!-- PageGuide -->
	<script src="src/theme2/js/plugins/pageguide/jquery.pageguide.js"></script>
	<!-- FullCalendar -->
	<script src="src/theme2/js/plugins/fullcalendar/fullcalendar.min.js"></script>
	
    	<!-- dataTables -->
	<script src="src/theme2/js/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="src/theme2/js/plugins/datatable/TableTools.min.js"></script>
	<script src="src/theme2/js/plugins/datatable/ColReorderWithResize.js"></script>
	<script src="src/theme2/js/plugins/datatable/ColVis.min.js"></script>
	<script src="src/theme2/js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
	<script src="src/theme2/js/plugins/datatable/jquery.dataTables.grouping.js"></script>
	<link rel="stylesheet" href="src/theme2/css/plugins/datatable/TableTools.css">
    <!-- Chosen -->
	<script src="src/theme2/js/plugins/chosen/chosen.jquery.min.js"></script>
	<!-- select2 -->
	<script src="src/theme2/js/plugins/select2/select2.min.js"></script>
	<!-- icheck -->
	<script src="src/theme2/js/plugins/icheck/jquery.icheck.min.js"></script>

	
	
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

<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand">gXpertize</a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="src/theme2/index-2.html">
						<span>Dashboard</span>
					</a>
				</li>
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
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Survey Manager</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'createsurvey')); ?>">New Survey</a></li>
                                        <li><a  href="<?php echo $cFormObj->createLinkUrl(array('f' => 'survey_list')); ?>">Existing Survey</a></li>
					</ul>
				</li>
                
                
                <li>
					<a href="<?php echo $cFormObj->createLinkUrl(array('f' => 'category')); ?>"
						<span>Category</span>
					</a>
				</li>
				
				
				
			</ul>

		</div>
	</div>
	<div class="container-fluid" id="content">
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
						<a href="#" data-toggle="dropdown">Articles</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Action #1</a>
							</li>
							<li>
								<a href="#">Antoher Link</a>
							</li>
							<li class='dropdown-submenu'>
								<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Go to level 3</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">This is level 3</a>
									</li>
									<li>
										<a href="#">Unlimited levels</a>
									</li>
									<li>
										<a href="#">Easy to use</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">News</a>
					</li>
					<li>
						<a href="#">Pages</a>
					</li>
					<li>
						<a href="#">Comments</a>
					</li>
				</ul>
			</div>	
		</div>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1><?php echo $pagename; ?></h1>
					</div>
			  </div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="src/theme2/more-login.html">Home</a>
							<i class="icon-angle-right"></i>
						</li>
						<li>
							<a href="src/theme2/index-2.html">Dashboard</a>
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
		</div></div>
</body>
</html>
    <?php
}
?>
