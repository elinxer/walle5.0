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
		

		
<div>
<form action="<?php echo U('Jiehuan/add');?>" method="post">
	<table class="bordered">
	    <thead>
	    <tr>   
	        <th>&nbsp;名称</th>
	        <th>&nbsp;金额</th>
	        <th>&nbsp;时间</th>
	        <th>&nbsp;说明（15&nbsp;字以内）</th>
	    </tr>
	    </thead>
	    <tbody><tr>   
	        <td style="width:26%;">
	        <div class="input-group input-group-lg">
	        	<span class="input-group-addon">
	        		<select class="select" name="type">
	        			<option value="1">借出</option>
	        			<option value="0">拖欠</option>
	        		</select>
	        	</span>
				<input type="text" class="form-control" name="name" required>
			</div>
	        </td>
	        <td style="width:18%;">
	        <div class="input-group input-group-lg">
			  <span class="input-group-addon">￥</span>
			  <input type="text" class="form-control" name="price">
			</div>
	        </td>
	        <td style="width:20%;">
	        	<div class="input-group input-group-lg input-append date" id="datetimepicker">
				  <input type="text" class="form-control" name="time">
				  <span class="input-group-addon add-on"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
	        </td>
	        <td style="width:30%;">
		        <div class="input-group input-group-lg">
				  <input type="text" class="form-control" name="content">
				  <span class="input-group-addon"><span class="glyphicon glyphicon-list"></span></span>
				</div>
	        </td>
	    </tr>        
	    <tr>
	        <td>示例（名称）</td>
	        <td>32.0&nbsp;(单位：元)</td>    
	        <td>2014-05-25</td>
	        <td>饭钱</td>
	    </tr>
	</tbody>
	</table>
	<div style="text-align:right;">
		<br>
		<input type="hidden" name="type_id" value="4">
		<input type="submit" value="记录" class="btn btn-info">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
</form>
</div>
<!-- dd -->
<!-- s -->

<div>
&nbsp;总额:<?php echo ($sum); ?> &nbsp;&nbsp;&nbsp;借出：<?php echo ($jiechu); ?>&nbsp;&nbsp;
当前：<?php if($now > 250): ?><span class="label label-danger"><?php echo ($now); ?></span><?php else: ?>
<span class="label label-success"><?php echo ($now); ?></span><?php endif; ?>
<!-- 分页 -->
<div class ="badoo"><?php echo ($page); ?></div>
</div>
<div>
	<table class="zebra">
	    <thead>
	    <tr>
	        <th>状态</th>        
	        <th>名称</th>
	        <th>金额</th>
	        <th>时间</th>
	        <th>描述（说明）</th>
	        <th style="text-align:center;">&nbsp;&nbsp;操&nbsp;作</th>
	    </tr>
	    </thead>
	    <tfoot>
	    <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	    </tr>
	    </tfoot>
	    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
	        <td>
		        <?php if($vo['status']): ?><form action="<?php echo U('Jiehuan/set_status', array('id'=>$vo['id'],'belong'=>'add'));?>" method="post">
		        	<input type="hidden" value="0" name="status">
		        	<input type="submit" class="btn btn-success" value="已归还">
		        </form>
		        <?php else: ?>
		        <form action="<?php echo U('Jiehuan/set_status', array('id'=>$vo['id'],'belong'=>'add'));?>" method="post">
		        	<input type="hidden" value="1" name="status">
		        	<input type="submit" class="btn btn-danger" value="未归还">
		        </form><?php endif; ?>
	        </td>
	        <td><?php if($vo['extra']): ?>借出|<?php echo ($vo["name"]); else: ?>拖欠|<?php echo ($vo["name"]); endif; ?></td>
	        <td><?php echo ($vo["value"]); ?></td>
	        <td><?php echo (change_time($vo["time"],5)); ?></td>
	        <td><?php echo ($vo["content"]); ?></td>
	        <td style="text-align:right;">
	        <a href="<?php echo U('Jiehuan/delete',array('id'=>$vo['id'],'belong'=>'add'));?>" class="btn btn-default" onclick="return confirm('确定要删除吗')">删除</a>
	        <a href="<?php echo U('Jiehuan/update',array('belong'=>'add','id'=>$vo['id']));?>" class="btn btn-warning">修改</a>
	        &nbsp;&nbsp;
	        </td>
	    </tr><?php endforeach; endif; ?>
	    
	</table>
</div>
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