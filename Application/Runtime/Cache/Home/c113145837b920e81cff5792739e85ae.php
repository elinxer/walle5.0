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
		

		
<!-- d -->
<p class="btn btn-primary" style="width:25%;" id="changgui">
&nbsp;&nbsp;常规功能&nbsp;&nbsp;<span class="glyphicon glyphicon-cog"></span></p>
<script type="text/javascript">
	$(document).ready(function(){
		$("p#changgui").click(function(){
		$("div#left").slideToggle("slow");
		});
	});
</script>
<div id="main">
	<div id="left" style="width:60%;float:left;">
		<div id="">
			<br>
			<p class="btn btn-info" id="shujubeifen">数据备份 &nbsp;>></p>
			<script type="text/javascript">
				$(document).ready(function(){
					$("div#beifen").hide();
					$("#shujubeifen").click(function(){
					$("div#beifen").slideToggle("slow");
					});
				});
			</script>
			<div id="beifen">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				  <li>
					  <a href="#home" role="tab" data-toggle="tab">
					  数据备份</a>
				  </li>
				  <li><a href="#profile" role="tab" data-toggle="tab">还原数据</a></li>
				  <li class="active"><a href="#messages" role="tab" data-toggle="tab">导出Excel表</a></li>
				  <!-- <li><a href="#settings" role="tab" data-toggle="tab">备份并发送到邮箱</a></li> -->
				</ul>
				<!-- Tab panes -->
				<div class="tab-content" >
				  <div class="tab-pane" id="home">
					  <br>
					  <form action="<?php echo U('Baksql/index');?>" method="post">
					  	<input type="hidden" value="1" name="backup">
					  	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="开始备份" class="btn btn-warning" id="submit_event">
					  </form>
				  </div>
				  <div class="tab-pane" id="profile">
					  <br>
					  <form action="<?php echo U('Baksql/recover',array('file'=>$backup));?>" method="post">
					  	<input type="hidden" value="<?php echo ($backup); ?>" name="recover">
					  	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="恢复到最新" class="btn btn-warning" id="submit_event">
					  	&nbsp;<a href="<?php echo U('Baksql/backlist');?>" class="btn btn-info"> 查看备份列表</a>
					  </form>
					  <br>
				  </div>
				  <!-- end -->
				  <div class="tab-pane active" id="messages">
					  <form action="<?php echo U('Exportexcel/index');?>" method="post">
					  <div class="input-group">
						  <span class="input-group-addon"> 
						  <i class="glyphicon glyphicon-lock"></i>
						  导出表名称</span>
						  <input type="text" class="form-control" name="filename" required>
					  </div>
					  <div class="input-group" >
						  <span class="input-group-addon"> 
						  <input type="submit" value="点击导出" class="btn btn-default" id="submit_event">
						  </span>
					  </div>
					  </form>
				  <div class="alert alert-warning alert-dismissible " role="alert" id="showmessage">
					  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					  <strong>注意!</strong> 请使用浏览器内置下载器下载，暂不支持迅雷等工具下载！！ <a href="<?php echo U('Help/sdownload');?>">如何开启？</a>
				  </div>
				  </div>
				  <!-- end -->
				  
				</div>
			</div>
			<script type="text/javascript">
				$('#myTab a').click(function (e) {
  					e.preventDefault();
 			 		$(this).tab('show');
				});
			</script>
		</div>
		<div class="alert alert-warning alert-dismissible" role="alert" id="backupwarn">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>系统正在处理，请耐心等待一会...</strong>
		</div>
		<script type="text/javascript">
			$('#backupwarn').hide();
			$('#submit_event').click(function(){
				$('#showmessage').hide();
				$('#backupwarn').show();
				$('#submit_event').hide();
			});
		</script>
		<!-- end -->
		<p>&nbsp;</p>
		<p class="btn btn-info" id="zhongzhuang">重装系统备份配置 &nbsp;>></p>
		<script type="text/javascript">
			$(document).ready(function(){
				$("div#refound").hide();
				$("#zhongzhuang").click(function(){
				$("div#refound").slideToggle("slow");
				});
			});
		</script>
		<div id="refound">
		<br>
		  &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Baksql/recoverConfig',array('filename'=>$config_back));?>" class="btn btn-warning" id="submit_event">恢复到最新</a><br><br>
		  <form action="<?php echo U('Baksql/backdatabase');?>" method="post">
		  	<input type="hidden" value="1" name="backup">
		  	&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="开始备份配置" class="btn btn-warning" id="submit_event">
		  </form>
		</div>
		<!-- end -->
		<p>&nbsp;</p>
		<p class="btn btn-info" id="system">>> 系统基础信息 </p>
		<a href="http://localhost/index.php/Admin/Public/login" class="btn btn-info">后台设置</a>
		<script type="text/javascript">
		$(document).ready(function(){
			// $("div#showsystem").hide();
			$("#system").click(function(){
			$("div#showsystem").slideToggle("slow");
			});
		});
		</script>
		<div id="showsystem">
			<br>
			<table class="table table-bordered table-hover">
			<tr><td colspan="2">联系我们：（<a href="">使用说明</a>）</td></tr>
			<tr><td>QQ：&nbsp;<?php echo ($config["site_qq"]); ?></td><td>QQ群： 391054673</td></tr>
			<tr><td>电话：&nbsp;<?php echo ($config["site_phone"]); ?></td><td>邮箱：<?php echo ($config["site_email"]); ?></td></tr>
			<tr><td colspan="2">地址：广东工业大学华立学院 宿舍B2-317</td></tr>
			</table>
		</div>
	</div>
	<!-- 用户信息 -->
	<div id="right" style="width:35%;float:right;">
		<table class="table table-bordered table-hover">
			<thead><tr><td>用户基本信息</td><td style="text-align:center;"><a href="<?php echo U('System/edit_user' ,array('user_id'=>$user['id']));?>">修改</a></td></tr></thead>
			<tbody>
				<tr><td>用户名称</td><td><?php echo ($user["name"]); ?></td></tr>
				<tr><td>Email</td><td><?php echo ($user["email"]); ?></td></tr>
				<tr>
					<td>注册时间</td>
					<td><?php echo (change_time($user["reg_time"],$user.reg_time)); ?></td>
				</tr>
				<tr>
					<td>上次登陆时间</td>
					<td><?php echo (change_time($last_login_time,$last_login_time)); ?></td>
				</tr>
			</tbody>
		</table>
	</div><!-- end info -->
	<div style="clear:both;"></div>
</div>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

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