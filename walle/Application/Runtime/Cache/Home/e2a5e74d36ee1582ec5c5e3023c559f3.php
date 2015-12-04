<?php if (!defined('THINK_PATH')) exit();?><!-- 存放网站前台载入文件 -->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" lang="zh_cn">

<!-- 网站logo -->
<link rel="shortcut icon" href="<?php echo ($config["site_logo"]); ?>">

<!-- 引入导航CSS -->
<link rel="stylesheet" href="/Public/Home/css/nav.css">
<!-- 引入分页类样式 -->
<link rel="stylesheet" href="/Public/Home/css/page.css">
<!-- 引入表格样式 -->
<link rel="stylesheet" href="/Public/Home/css/table.css">

<!-- 引入bootstrap -->
<link rel="stylesheet" type="text/css" href="/Public/Static/bootstrap-3.2.0/css/bootstrap.min.css">
<!-- 引入bootstrap日期样式 -->
<link rel="stylesheet" type="text/css" href="/Public/Static/bootstrap-datetimepicker-0.0.11/css/bootstrap-datetimepicker.min.css">

<!-- 引入javascript -->
<script type="text/javascript" src="/Public/Static/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/home.js"></script>
<script type="text/javascript" src="/Public/Static/bootstrap-3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/Static/bootstrap-datetimepicker-0.0.11/js/bootstrap-datetimepicker.min.js"></script>

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
		

		
<div id="main">
	<p class="btn btn-info">开启一个存款目标</p>
	<div style="float:left;width:60%;height:80%;" id="left">
		<div style="width:60%;">
		<form action="<?php echo U('Savemoney/start_target');?>" method="post">
			<div class="input-group input-group-lg">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			  <input type="text" class="form-control" name="name" value="目标名称">
			</div>
			<br>
			<div class="input-group input-group-lg">
			  <span class="input-group-addon">￥</span>
			  <input type="text" class="form-control" name="price" value="目标金额">
			</div>
			<br>
			<div class="input-group input-group-lg input-append date" id="datetimepicker">
			  <input type="text" class="form-control" name="time" value="预期完成时间">
			  <span class="input-group-addon add-on"><i class="glyphicon glyphicon-calendar"></i></span>
			</div>
			<br>
			<textarea style="width:500px;height:180px;" name="content">存款原因 </textarea><br>
			<br>
			<div class="input-group input-group-lg">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
			  <input type="text" class="form-control" name="remark" value="记录人签名">
			</div>
			<br>
			<div style="text-align:center;">
				<input type="submit" value="开始目标" class="btn btn-info">&nbsp;
				<a href="<?php echo U('Savemoney/index');?>" class="btn btn-default"> 取消开始</a>
			</div>
		</form>
		</div>
	</div>
	<br><br>
	<div class="alert alert-warning alert-dismissible" role="alert" id="right" style="float:right;width:40%;">
	  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  <strong>
		<p>注意! <br>目标存款将从收入扣除，并且显示存款金额，<br>当你的支出金额大于当前剩余金额，也将从存款金额扣除。</p></strong>
		<p>(有目标进行时，不能开启下一个目标！)</p>
	</div>
	<div style="clear:both;"></div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

		<footer>
	<div id="footer" style="text-align:center;">
	<h5>
		©2014-2016  &nbsp;<?php echo ($config["site_name"]); ?> <a href="<?php echo U('System/banquan');?>">使用本系统前必读</a> <?php echo ($config["site_icp"]); ?>&nbsp;<img src="/Public/Static/copy_rignt.png" alt="版权图标">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</h5>
	</div>
</footer>
</body>
</html>
	</div>
</div>