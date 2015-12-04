<?php if (!defined('THINK_PATH')) exit();?><!-- 存放网站前台载入文件 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" lang="zh_cn">

<!-- 网站logo -->
<link rel="shortcut icon" href="<?php echo ($config["site_logo"]); ?>">

<!-- 引入导航CSS -->
<link rel="stylesheet" href="/walle/Public/Home/css/nav.css">
<!-- 引入分页类样式 -->
<link rel="stylesheet" href="/walle/Public/Home/css/page.css">
<!-- 引入表格样式 -->
<link rel="stylesheet" href="/walle/Public/Home/css/table.css">

<!-- 引入bootstrap -->
<link rel="stylesheet" type="text/css" href="/walle/Public/Static/bootstrap-3.2.0/css/bootstrap.min.css">
<!-- 引入bootstrap日期样式 -->
<link rel="stylesheet" type="text/css" href="/walle/Public/Static/bootstrap-datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css">

<!-- 引入javascript -->
<script type="text/javascript" src="/walle/Public/Static/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="/walle/Public/Home/js/home.js"></script>
<script type="text/javascript" src="/walle/Public/Static/bootstrap-3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/walle/Public/Static/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js"></script>

<!-- 自定义插件链接 -->

<title><?php echo ($config["site_title"]); ?>|<?php echo ($meta_title); ?></title>
</head>
<body>

<div class="container" style="width:75%;">
	<div class="row-fluid">
		<!-- 导航菜单 -->
<p>&nbsp;</p>
<br />
<div class="span2">
	<ul class="venus-menu">
		<?php if(is_array($nav)): foreach($nav as $key=>$nav): if($nav['sort'] ==1): ?><li url="<?php echo (qgurl($nav["url"],$nav.url)); ?>"><a href="<?php echo U($nav['url']);?>" ><?php echo ($nav["title"]); ?></a></li>
		<li>&nbsp;</li>
		<?php else: ?>
		<li url="<?php echo (qgurl($nav["url"],$nav.url)); ?>"><a href="<?php echo U($nav['url']);?>" ><?php echo ($nav["title"]); ?></a></li><?php endif; endforeach; endif; ?>		
		<li url="System"><a href="<?php echo U('System/index');?>" >系统</a></li>
		<li><a href="<?php echo U('Login/logout');?>" onclick="return confirm('要走了？');">退出</a></li>
	</ul>
</div>
<script type="text/javascript">
	var nowurl = "<?php echo ($controller_name); ?>";
	$(function(){
		$("[url="+nowurl+"]").attr("class","active");		
	});
</script>
<br><br><br>
<div style="width:20%;float:right;">
	<div>
	<ol class="breadcrumb">
	  <li><a href="<?php echo ($controller_url); ?>"><?php echo ($controller_name); ?></a></li>
	  <li><a href="<?php echo ($action_url); ?>"><?php echo ($action_name); ?></a></li>
	</ol>		
	</div>
</div>
<div style="float:left;"></div>
<div style="clear:both;"></div>
		

		
<p>详细查询页面</p>
<div style="width:100%;height:500px;">
	<div style="float:left;width:500px;">
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			<input type="text" class="form-control" placeholder="请输入查询关键字" id="keywords">
		</div>
		<table class="table table-bordered" >
			<tr><td>总额：</td></tr>
			<tr><td>数据列表</td></tr>
		</table>
	</div>
	<div style="float:left;">
		<div style="width:60px;height:50;">
			<table class="table table-hover table-bordered">
				<tr><td>&nbsp;</td><td>sddd</td><td></td><td></td><td></td></tr>
				<tr><td>&nbsp;</td><td>sddd</td><td>ss</td><td></td></tr>
			</table>
		</div>
	</div>
	<div style="clear:both;"></div>
</div>

		<footer>
	<div id="footer" style="text-align:center;">
	<h5>
		©2014-2016  &nbsp;<?php echo ($config["site_name"]); ?> <a href="<?php echo U('System/banquan');?>">使用本系统前必读</a> <?php echo ($config["site_icp"]); ?>&nbsp;<img src="/walle/Public/Static/copy_rignt.png" alt="版权图标">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</h5>
	</div>
</footer>
</body>
</html>
	</div>
</div>