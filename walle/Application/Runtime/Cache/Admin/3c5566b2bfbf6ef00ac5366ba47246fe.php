<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8" lang="zh_cn">
	<title><?php echo ($meta_title); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="/walle/Public/Admin/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="/walle/Public/Admin/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="/walle/Public/Admin/css/charisma-app.css" rel="stylesheet">
	<link href="/walle/Public/Admin/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='/walle/Public/Admin/css/fullcalendar.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='/walle/Public/Admin/css/chosen.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/uniform.default.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/colorbox.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/jquery.noty.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/noty_theme_default.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/elfinder.min.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/elfinder.theme.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/opa-icons.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/uploadify.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/walle.css' rel='stylesheet'>
	<link href='/walle/Public/Admin/css/node.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="/walle/Public/Admin/img/favicon.ico">
	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="/walle/Public/Admin/js/walle.js"></script>
	<!-- jQuery -->
	<script src="/walle/Public/Admin/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="/walle/Public/Admin/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="/walle/Public/Admin/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="/walle/Public/Admin/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="/walle/Public/Admin/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="/walle/Public/Admin/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="/walle/Public/Admin/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="/walle/Public/Admin/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="/walle/Public/Admin/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="/walle/Public/Admin/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="/walle/Public/Admin/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="/walle/Public/Admin/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="/walle/Public/Admin/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="/walle/Public/Admin/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="/walle/Public/Admin/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="/walle/Public/Admin/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='/walle/Public/Admin/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='/walle/Public/Admin/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="/walle/Public/Admin/js/excanvas.js"></script>
	<script src="/walle/Public/Admin/js/jquery.flot.min.js"></script>
	<script src="/walle/Public/Admin/js/jquery.flot.pie.min.js"></script>
	<script src="/walle/Public/Admin/js/jquery.flot.stack.js"></script>
	<script src="/walle/Public/Admin/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="/walle/Public/Admin/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="/walle/Public/Admin/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="/walle/Public/Admin/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="/walle/Public/Admin/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="/walle/Public/Admin/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="/walle/Public/Admin/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="/walle/Public/Admin/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="/walle/Public/Admin/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="/walle/Public/Admin/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="/walle/Public/Admin/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="/walle/Public/Admin/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="/walle/Public/Admin/js/charisma.js"></script>
	
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>欢迎WallE管理后台</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						请输入您的用户名和密码登陆
					</div>
					<form class="form-horizontal" action="<?php echo U('Public/login');?>" method="post">
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text"  />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />记住我</label>
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">登陆</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
		
</body>
</html>