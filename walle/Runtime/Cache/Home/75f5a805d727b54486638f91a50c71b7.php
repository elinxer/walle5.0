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

<!-- 圆形进度条 -->
<script src="/Public/Circleprogress/js/jquery.circliful.min.js"></script>
<link href="/Public/Circleprogress/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

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
		

		
&nbsp;<a href="<?php echo U('Savemoney/targetList');?>" class="btn btn-success">查看目标列表</a>
<br><br>
<div style="width:100%;height:530px;" id="main">

<?php if($is_target): ?><div id="left" style="float:left;width:65%;">
		<a href="<?php echo U('Savemoney/addMoney' ,array('id'=>$target_id));?>" class="btn btn-success">存入记录</a>&nbsp;
		<a href="<?php echo U('Savemoney/timeline',array('id'=>$target_id));?>" class="btn btn-success">
		当前目标时间轴</a>
		<div>
			<div style="text-align:right;">
				距离目标：<?php echo ($needMoney); ?>&nbsp;
				&nbsp;当前目标总额:&nbsp;<?php echo ($sum); ?> &nbsp;&nbsp;&nbsp;&nbsp;
			</div>
			<!-- 分页 -->
			<div class ="badoo"><?php echo ($page); ?></div>
		</div>
		<div>
			<table class="zebra">
			    <thead>
			    <tr>
			        <th>ID</th>        
			        <th>存款名称</th>
			        <th>存款金额</th>
			        <th>存款时间</th>
			        
			        <th style="text-align:right;">
			        	<a href="" class="btn btn-info" onclick="alert('功能未开启！');">操&nbsp;作&nbsp;</a>
			        	<a href="" class="btn btn-info" onclick="alert('功能未开启！');">批量删除</a>
			        </th>
			    </tr>
			    </thead>
			    <tfoot>
			    <tr>
			        <td></td>
			        <td></td>
			        <td></td>
			        <td></td>
			        
			        <td></td>
			    </tr>
			    </tfoot>
			    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
			        <td><?php echo ($vo["id"]); ?></td>
			        <td><?php echo ($vo["name"]); ?></td>
			        <td><?php echo ($vo["value"]); ?></td>
			        <td><?php echo (change_time($vo["time"],5)); ?></td>
			        
			        <td style="text-align:right;">
			        <a href="<?php echo U('Savemoney/delete',array('id'=>$vo['id']));?>" class="btn btn-default" onclick="return confirm('确定要删除吗')">删除</a>
			        <a href="<?php echo U('Savemoney/update',array('id'=>$vo['id']));?>" class="btn btn-warning">修改</a>
			        &nbsp;&nbsp;
			        </td>
			    </tr><?php endforeach; endif; ?>
			    
			</table>
		</div>
	</div>
	<br>
	<div id="right" style="float:right;width:30%;">
		<div id="myStat" data-dimension="250" data-text="<?php echo ($precent_t); ?>%" data-info="完成进度" data-width="30" data-fontsize="38" data-percent="<?php echo ($precent_t); ?>" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-fill="#ddd"></div>
		<script>
		$( document ).ready(function() {
			$('#myStat').circliful();
		   });
		</script>
		<br>
		<div style="text-align:center;">
			目标完成倒计时：
			<br><br>
			<div class="time-item" >
				<?php if($doneTime > 2): ?><p class="btn btn-info">
					<span id="day_show">0天</span>
				    <strong id="hour_show">0时</strong>
				    <strong id="minute_show">0分</strong>
				    <strong id="second_show">0秒</strong>
				    </p>
				<?php else: ?>
				<p class="btn btn-danger">期限已到！</p><?php endif; ?>
			</div>
			<script type="text/javascript">
				var intDiff = parseInt("<?php echo ($doneTime); ?>");//倒计时总秒数量
				function timer(intDiff){
				    window.setInterval(function(){
				    var day=0,
				        hour=0,
				        minute=0,
				        second=0;//时间默认值        
				    if(intDiff > 0){
				        day = Math.floor(intDiff / (60 * 60 * 24));
				        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
				        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
				        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
				    }
				    if (minute <= 9) minute = '0' + minute;
				    if (second <= 9) second = '0' + second;
				    $('#day_show').html(day+"天");
				    $('#hour_show').html('<s id="h"></s>'+hour+'时');
				    $('#minute_show').html('<s></s>'+minute+'分');
				    $('#second_show').html('<s></s>'+second+'秒');
				    intDiff--;
				    }, 1000);
				} 
				$(function(){
				    timer(intDiff);
				}); 
			</script>
		</div>
		<br>
		<div class="alert alert-info">
			<strong>存款原因：</strong>
			<p><?php echo ($target["content"]); ?></p>
		</div>
	</div>
	<div style="clear:both;"></div>
<?php else: ?>
	&nbsp;&nbsp;<p><a href="<?php echo U('Savemoney/start_target');?>" class="btn btn-info">开启一个目标</a></p>
	<div class="alert alert-warning alert-dismissible" role="alert" id="right" style="width:40%;">
	  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  <strong>
		<p>注意! <br>目标存款将从收入扣除，并且显示存款金额，<br>当你的支出金额大于当前剩余金额，也将从存款金额扣除。</p></strong>
		<p>(有目标进行时，不能开启下一个目标！)</p>
	</div><?php endif; ?>
</div>

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