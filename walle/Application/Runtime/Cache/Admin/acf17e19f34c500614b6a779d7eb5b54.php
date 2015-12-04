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
<!-- topbar starts -->
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo U('Index/index');?>"> <img alt="Charisma Logo" src="/walle/Public/Admin/img/logo20.png" /> <span>WallE</span></a>
			
			<!-- theme selector starts -->
			<div class="btn-group pull-right theme-container" >
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-tint"></i><span class="hidden-phone">  更改 主题 / 皮肤</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" id="themes">
					<li><a data-value="classic" href="#"><i class="icon-blank"></i> 经典</a></li>
					<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> 天蓝色</a></li>
					<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
					<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
					<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
					<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
					<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
					<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
					<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
				</ul>
			</div>
			<!-- theme selector ends -->
			
			<!-- user dropdown starts -->
			<div class="btn-group pull-right" >
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i><span class="hidden-phone"> &nbsp;<?php echo ($user["name"]); ?>&nbsp;&nbsp;</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li>&nbsp;</li>
					<li><a href="<?php echo U('User/edit_manager' , array('uid'=>$user['uid']));?>"><i class="icon-user"></i>&nbsp;个人中心</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo U('Admin/Public/logout');?>"><i class="icon-off"></i>&nbsp;退出</a></li>
				</ul>
			</div>
			<!-- user dropdown ends -->
			
			<div class="top-nav nav-collapse">
				<ul class="nav">
					<li><a href="<?php echo U('Home/Index/index');?>">查看主页</a></li>
					<li>
						<form class="navbar-search pull-left">
							<input placeholder="Search" class="search-query span2" name="query" type="text">
						</form>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<!-- topbar ends -->
<div class="container-fluid">
<div class="row-fluid">
<!-- left menu starts -->
<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="nav-header hidden-tablet">主要功能</li>
			<li><a class="ajax-link" href="<?php echo U('Admin/Index/index');?>"><i class="icon-home"></i><span class="hidden-tablet"> 管理首页</span></a></li>

			

			<li><a class="ajax-link" href="<?php echo U('Function/show');?>"><i class="icon-edit"></i><span class="hidden-tablet"> 功能推送</span></a></li>

			<li><a class="ajax-link" href="<?php echo U('Billtype/index');?>"><i class="icon-list-alt"></i><span class="hidden-tablet"> 账单类型</span></a></li>
			
			<li><a class="ajax-link" href="<?php echo U('Nav/nav');?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> 定义功能</span></a></li>
			<!-- <li><a class="ajax-link" href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
			<li><a class="ajax-link" href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li> -->

			<?php if($user['name'] =='admin'): ?><li><a class="ajax-link" href="<?php echo U('Nav/nav');?>"><i class="icon-eye-open"></i><span class="hidden-tablet"> 定义功能</span></a></li>
			<li class="nav-header hidden-tablet">常规功能</li>
			<li><a class="ajax-link" href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>

			<li><a class="ajax-link" href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>

			
			<li><a class="ajax-link" href="<?php echo U('Rbac/index');?>"><i class="icon-th"></i><span class="hidden-tablet"> 权限管理</span></a></li>

			<!-- <li><a href="<?php echo U('User/manager');?>"><i class="icon-lock"></i><span class="hidden-tablet"> 网站管理员</span></a></li> -->
			<li><a href="<?php echo U('User/user_manage');?>"><i class="icon-user"></i><span class="hidden-tablet"> 用户中心</span></a></li>

			<li><a href="<?php echo U('Config/index');?>"><i class="icon-cog"></i><span class="hidden-tablet"> 系统设置</span></a></li>

			<li><a class="ajax-link" href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> 文件管理</span></a></li>
			
			<li><a class="ajax-link" href="icon.html"><i class="icon-briefcase"></i><span class="hidden-tablet"> 数据备份</span></a></li><?php endif; ?>
			
			<li><a href="<?php echo U('Tour/index');?>"><i class="icon-globe"></i><span class="hidden-tablet"> 功能导航</span></a></li>
		</ul>
		<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
	</div><!--/.well -->
</div><!--/span-->
<!-- left menu ends -->

<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
		<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
	</div>
</noscript>
<!-- content starts -->
<div id="content" class="span10">
<div>
	<ul class="breadcrumb">
		<li>
			<a href="<?php echo U('Admin/Index/index');?>">控制面板</a> <span class="divider">/</span>
		</li>
		<li>
			<a href="#"><?php echo ($meta_title); ?></a>
		</li>
	</ul>
</div>

<!-- 页面框架 -->

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-wrench"></i>&nbsp;权限配置</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<!-- 页面内容 -->
		<div class="box-content">
		<ul class="nav nav-tabs" id="myTab">
			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li class="active"><a href="#info">角色管理</a></li>
			<li><a href="#node">节点管理</a></li>
			
			<li><a href="#addrole">新增角色</a></li>
			<li><a href="#explain">配置值说明</a></li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane active" id="info">
			
<table class="table table-bordered table-hover" style="width:80%;">

<thead><tr><td>角色名称</td><td>英文名</td><td>描述</td><td>状态</td><td style="text-align:center;">操作</td></tr></thead>
<tbody>
<?php if(is_array($role)): foreach($role as $key=>$role): ?><tr>
	<td><?php echo ($role["title"]); ?></td>
	<td><?php echo ($role["name"]); ?></td>
	<td><?php echo ($role["remark"]); ?></td>
	<td><?php if($role.status): ?>开启<?php else: ?>关闭<?php endif; ?></td>
	<td><a href="<?php echo U('Rbac/access' ,array('rid'=>$role['id']));?>">配置权限</a></td>
</tr><?php endforeach; endif; ?>
</tbody>



</table>
			</div>

			<div class="tab-pane" id="node">
			<div id="wrap">
<br>
<a href="<?php echo U('Rbac/add_node');?>" class="add-app">添加应用</a>
<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
	<p>
		<strong><?php echo ($app["title"]); ?>(<?php echo ($app["name"]); ?>)</strong>
		<a href="<?php echo U('Rbac/add_node' , array('pid'=>$app['id'] , 'level'=>2));?>">&nbsp;添加控制器</a>
		&nbsp;&nbsp;<a href="<?php echo U('Rbac/delete_node' ,array('node_id'=>$app['id']));?>" onclick="return confirm('删除？');">删除</a>
	</p>
	<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
		<dt>
			<strong><?php echo ($action["title"]); ?>(<?php echo ($action["name"]); ?>)</strong>
			<a href="<?php echo U('Rbac/add_node' , array('pid'=>$action['id'] , 'level'=>3));?>">&nbsp;添加方法</a>
			&nbsp;&nbsp;<a href="<?php echo U('Rbac/delete_node' ,array('node_id'=>$action['id']));?>" onclick="return confirm('删除？');">删除</a>
		</dt>
		<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
			<span><?php echo ($method["title"]); ?>(<?php echo ($method["name"]); ?>)</span>
			&nbsp;&nbsp;<a href="<?php echo U('Rbac/delete_node' ,array('node_id'=>$method['id']));?>" onclick="return confirm('删除？');">删除</a>
		</dd><?php endforeach; endif; ?>
	</dl><?php endforeach; endif; ?>
</div><?php endforeach; endif; ?>

</div>



			</div>
			<div class="tab-pane" id="addrole">
			<form action="<?php echo U('Rbac/add_role');?>" method="post">
<table class="table" style="width:50%;">
	<tr><td>角色英文名称</td><td><input type="text" name="name"></td></tr>
	<tr><td>角色名称</td><td><input type="text" name="title"></td></tr>
	<tr><td>角色描述</td><td><input type="text" name="remark"></td></tr>
	<tr><td>开启状态</td>
	<td>

		<input type="checkbox" name="status" value="1" checked="checked">
		
	</td>
	</tr>
	<tr><td></td><td><input type="submit" value="添加" class="btn btn-large btn-primary"></td></tr>
</table>
</form>
			</div>
			<div class="tab-pane" id="explain">配置说明<br>
<p>level 值<br>
1 表示应用<br>
2 表示控制器<br>
3 表示方法<br>
</p>
<p>
应用英文名称为项目应用名称 ，如：Admin , Home <br>
应用名称，控制器名称，方法名称均对应后台应用和控制器，方法
</p>
</div>
		</div>
	</div>
	</div><!--/span-->

</div><!--/row-->
					


<!-- content ends -->
	</div><!--/#content.span10-->
</div><!--/fluid-row-->
<!--settings start -->
<hr>
<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3><?php echo ($setting_name); ?>设置</h3>
	</div>
	<div class="modal-body">
		<p>Here settings can be configured...</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">关闭</a>
		<a href="#" class="btn btn-primary">保存更改</a>
	</div>
</div>
<!-- settings end -->

		
<hr>

<div class="modal hide fade" id="myModal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>Settings</h3>
	</div>
	<div class="modal-body">
		<p>Here settings can be configured...</p>
		<p>设置1</p>
		<p>设置2</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">关闭</a>
		<a href="#" class="btn btn-primary">保存更改</a>
	</div>
</div>
<footer>
	<p class="pull-left">&copy; <a href="" target="_blank">WallE</a> 2014</p>
	<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
</footer>

</div><!--/.fluid-container-->

</body>
</html>