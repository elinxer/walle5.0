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
<a href="<?php echo U('Jiehuan/add');?>" class="btn btn-large btn-success">记录信息</a>
<div>
	<div style="text-align:right;">
		&nbsp;总额:&nbsp;<?php echo ($sum); ?> &nbsp;&nbsp;&nbsp;借出：<?php echo ($jiechu); ?>&nbsp;
	</div>
	<!-- 分页 -->
	<div class ="badoo"><?php echo ($page); ?></div>
</div>
<div>
	<table class="zebra">
	    <thead>
	    <tr>
	        <th>&nbsp;&nbsp;状&nbsp;&nbsp;态</th>        
	        <th>单号名称</th>
	        <th>单号金额</th>
	        <th>单号时间</th>
	        <th>单号描述（说明）</th>
	        <th style="text-align:right;">
	        	<a href="" class="btn btn-info" onclick="alert('功能未开启！');">操&nbsp;作&nbsp;</a>
	        	<a href="" class="btn btn-info" onclick="alert('功能未开启！');">批量删除</a>
	        </th>
	    </tr>
	    </thead>
	    <tfoot>
	    <tr>
	        <td></td><td></td><td></td><td></td><td></td><td></td>
	    </tr>
	    </tfoot>
	    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
	        <td>
	        	<?php if($vo['status']): ?><form action="<?php echo U('Jiehuan/set_status', array('id'=>$vo['id'],'belong'=>'index'));?>" method="post">
		        	<input type="hidden" value="0" name="status">
		        	<input type="submit" class="btn btn-success" value="已归还">
		        </form>
		        <?php else: ?>
		        <form action="<?php echo U('Jiehuan/set_status', array('id'=>$vo['id'],'belong'=>'index'));?>" method="post">
		        	<input type="hidden" value="1" name="status">
		        	<input type="submit" class="btn btn-danger" value="未归还">
		        </form><?php endif; ?>
	        </td>
	        <td><?php if($vo['extra']): ?>借出|&nbsp;<?php echo ($vo["name"]); else: ?>拖欠|&nbsp;<?php echo ($vo["name"]); endif; ?></td>
	        <td><?php echo ($vo["value"]); ?></td>
	        <td><?php echo (change_time($vo["time"],5)); ?></td>
	        <td><?php echo ($vo["content"]); ?></td>
	        <td style="text-align:right;">
	        <a href="<?php echo U('Jiehuan/delete',array('id'=>$vo['id'],'belong'=>'index'));?>" class="btn btn-default" onclick="return confirm('确定要删除吗')">删除</a>
	        <a href="<?php echo U('Jiehuan/update',array('belong'=>'index','id'=>$vo['id']));?>" class="btn btn-warning">修改</a>
	        &nbsp;&nbsp;
	        </td>
	    </tr><?php endforeach; endif; ?>
	    
	</table>
</div>
<p>&nbsp;</p>
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