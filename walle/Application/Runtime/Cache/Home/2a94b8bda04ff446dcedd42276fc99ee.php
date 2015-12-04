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

<!-- 圆形进度条 -->
<script src="/walle/Public/Circleprogress/js/jquery.circliful.min.js"></script>
<link href="/walle/Public/Circleprogress/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

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
		

		
<!-- 内容 -->
<div id="main">
	<div id="left" style="float:left;width:45%;">
		<!-- <a href="<?php echo U('Index/reback');?>">还原久数据</a> -->
		账单数目统计
		<br><br>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  <li class="active"><a href="#home" role="tab" data-toggle="tab">收支统计</a></li>
		  <li><a href="#profile" role="tab" data-toggle="tab">收缴统计</a></li>
		  <li><a href="#messages" role="tab" data-toggle="tab">借还统计</a></li>
		  <li><a href="#settings" role="tab" data-toggle="tab">综合</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home">
				<br><br>
				<div id="left" style="float:left;">
					<p>今天支出：￥&nbsp;<strong><?php echo ($shouzhi["todayout"]); ?></strong></p>
					<p>今天收入：￥&nbsp;<strong><?php echo ($shouzhi["todayin"]); ?></strong></p>
					<p>支出总额：￥&nbsp;<strong><?php echo ($shouzhi["out"]); ?></strong></p>
					<p>收入总额：￥&nbsp;<strong><?php echo ($shouzhi["in"]); ?></strong></p>
					<br>
					<p class="btn btn-info">余&nbsp;额： <strong>￥&nbsp;<?php echo ($shouzhi["last"]); ?></strong></p>
				</div>
				<div id="right" style="float:right;">
					<div id="myStat" data-dimension="250" data-text="<?php echo ($shouzhi["precent"]); ?>%" data-info="资金余额" data-width="30" data-fontsize="38" data-percent="<?php echo ($shouzhi["precent"]); ?>" data-fgcolor="<?php echo ($shouzhi["color"]); ?>" data-bgcolor="#eee" data-fill="#ddd">
					</div>
					<script>
					$( document ).ready(function() {
						$('#myStat').circliful();
					   });
					</script>
				</div>
				<div style="clear:both;"></div>
			</div>
		  <!-- ---- -->
			<div class="tab-pane" id="profile">
		  		<br>
		  	  	<div id="left" style="float:left;">
				  <p>分配总额：￥&nbsp;<?php echo ($shoujiao["out"]); ?></p>
				  <p>收缴总额：￥&nbsp;<?php echo ($shoujiao["in"]); ?></p>
				  <p class="btn btn-info">余&nbsp;额： <strong>￥&nbsp;<?php echo ($shoujiao["last"]); ?></strong></p>
		  	  	</div>
		  	  	<div id="right" style="float:right;">
		  	  		<div id="myStat2" data-dimension="250" data-text="<?php echo ($shoujiao["precent"]); ?>%" data-info="资金余额" data-width="30" data-fontsize="38" data-percent="<?php echo ($shoujiao["precent"]); ?>" data-fgcolor="<?php echo ($shoujiao["color"]); ?>" data-bgcolor="#eee" data-fill="#ddd">
		  	  		</div>
					<script>
						$( document ).ready(function() {
							$('#myStat2').circliful();
				   		});
					</script>
			  	</div>
		  	  <div style="clear:both;"></div>
		  	</div>
		  	<!-- end -->
		  	<div class="tab-pane" id="messages">
		  		<br>
		  	  	<div id="left" style="float:left;">
		  	  	  <p>当前需处理统计：</p>
				  <p>拖欠总额：￥&nbsp;<?php echo ($jiehuan["out"]); ?></p>
				  <p>借出总额：￥&nbsp;<?php echo ($jiehuan["in"]); ?></p>
				  <p class="btn btn-info">差&nbsp;额： <strong>￥&nbsp;<?php echo ($jiehuan["last"]); ?></strong></p>
		  	  	</div>
		  	  	<div id="right" style="float:right;">
		  	  		<div id="myStat3" data-dimension="250" data-text="<?php echo ($jiehuan["precent"]); ?>%" data-info="资金差额" data-width="30" data-fontsize="38" data-percent="<?php echo ($jiehuan["precent"]); ?>" data-fgcolor="<?php echo ($jiehuan["color"]); ?>" data-bgcolor="#eee" data-fill="#ddd"></div>
					<script>
					$( document ).ready(function() {
						$('#myStat3').circliful();
				   	});
					</script>
				</div>
		  	  	<div style="clear:both;"></div>
		  	</div>
		  	<!-- end -->
		  	<div class="tab-pane" id="settings">
		  		<br>
		  		<p>您的总余额：￥&nbsp;<?php echo ($shouzhi["last"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;(其中包含借出：￥&nbsp;<?php echo ($jiehuan["in"]); ?>)</p>
		  		<table class="table">
		  			<tr><td></td><td>金额</td><td>名称(用处/来源)</td></tr>
		  			<tr><td><strong>最大支出</strong></td><td><?php echo ($maxZhi["value"]); ?></td><td><?php echo ($maxZhi["name"]); ?></td></tr>
		  			<tr><td>月最大支出</td><td><?php echo ($maxZhi["month"]); ?></td><td><?php echo ($maxZhi["monthName"]); ?></td></tr>
		  			<tr><td>日最大支出</td><td><?php echo ($maxZhi["day"]); ?></td><td><?php echo ($maxZhi["dayName"]); ?></td></tr>
		  			<tr><td>(今年)平均每月支出</td><td><?php echo ($maxZhi["monthAvg"]); ?></td></tr>
		  			<tr><td>(今年)平均每天支出</td><td><?php echo ($maxZhi["dayAvg"]); ?></td></tr>
		  			<tr><td><strong>最大收入</strong></td><td><?php echo ($maxShou["value"]); ?></td><td><?php echo ($maxShou["name"]); ?></td></tr>
		  			<tr><td>日最大收入</td><td><?php echo ($maxShou["day"]); ?></td><td><?php echo ($maxShou["dayName"]); ?></td></tr>
		  			<tr><td>月最大收入</td><td><?php echo ($maxShou["month"]); ?></td><td><?php echo ($maxShou["monthName"]); ?></td></tr>
		  			<tr><td>平均每月收入</td><td><?php echo ($maxShou["monthAvg"]); ?></td></tr>
		  		</table>
		  	</div>
		</div>
	</div>
	<!-- youb -->
	<div id="right" style="float:right;width:40%;">
		
		<div class="input-group input-group-lg">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
		  <input type="text" class="form-control" placeholder="请输入查询关键字" id="keywords">
		  
		</div>
		
		<br>
		<div class="alert alert-info">
			<table class="table table-hover table-bordered">
				<tr><td colspan="2">[ 关键字（空格隔开 空格结束）（当前检索支出）]</td></tr>
			</table>
			<p>&nbsp;<a href="<?php echo U('Index/detailQuery');?>">详细查询</a></p>
			<p class="alert alert-info">所有统计：￥&nbsp;<strong><span id="allm" style="color:green;"></span></strong></p>
			<p class="alert alert-info">最近一个月：￥&nbsp;<strong><span id="monthm" style="color:green;"></span></strong></p>
			<!-- <p class="alert alert-info">最近一个星期：￥<span id="weekm"></span></p> -->
			<!-- <div></div> -->
		</div>
		<script type="text/javascript">
			$(document).keydown(function(e){
				if(!e) var e = window.event;
				var keywords = $("input#keywords").val(); //获取关键字
				var searchUrl = "<?php echo U('Index/ownSearch');?>"; //获取提交地址

				if (keywords != null) {
					$.post(searchUrl,{keywords:keywords},
						function(data,status){
							$("#allm").html(data[0]);
							$("#monthm").html(data[1]);
							$("#weekm").html(data[2]);
						});
				}
			});
		</script>
	</div>
	<div style="clear:both;"></div>
</div>
<div style="width:100%;height:150px;"></div>

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