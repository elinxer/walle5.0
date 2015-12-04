<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($meta_title); ?> |时间轴</title>

<link rel="stylesheet" type="text/css" href="/walle/PUBLIC/Timeline/css/history.css">

<script type="text/javascript" src="/walle/PUBLIC/Timeline/js/jquery.js"></script>
<script type="text/javascript" src="/walle/PUBLIC/Timeline/js/jquery.mousewheel.js">
</script>
<script type="text/javascript" src="/walle/PUBLIC/Timeline/js/jquery.easing.js"></script>
<script type="text/javascript" src="/walle/PUBLIC/Timeline/js/history.js"></script>

</head>
<body>
<div style="width:50%;">
<div id="arrow">
	<ul>
		<li class="arrowup"></li>
		<li class="arrowdown"></li>
	</ul>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</div>
</div>

<div id="history">

	<div class="title">
		<h2>时间轴 =></h2>
		<div id="circle">
			<div class="cmsk"></div>
			<div class="circlecontent">
				<div thisyear="<?php echo (qgtime($target["time"],0)); ?>" class="timeblock">
					<span class="numf"></span>
					<span class="nums"></span>
					<span class="numt"></span>
					<span class="numfo"></span>
					<div class="clear"></div>
				</div>
				<div class="timeyear">YEAR</div>
			</div>
			<a href="<?php echo U('Savemoney/index');?>" class="clock"></a>
		</div>
	</div>
	
	<div id="content">
		<ul class="list">
			<li style="margin-top:-110px;">
				<div class="liwrap">
					<div class="lileft">
						<div class="date">
							<span class="year"><?php echo (qgtime($target["time"],0)); ?></span>
							<span class="md"><?php echo (qgtime($target["time"],1)); ?>/<?php echo (qgtime($target["time"],2)); ?></span>
						</div>
					</div>
					
					<div class="point"><b></b></div>
					
					<div class="liright">
						<div class="histt"><a href="#">目标开始</a></div>
						<div class="hisct">
							<p>你的目标金额：<?php echo ($target["value"]); ?></p>
							<p><?php echo ($target["content"]); ?></p>
						</div>
					</div>
				</div>
			</li>
			<?php if($lock): ?><li>
				<div class="liwrap">
					<div class="lileft">
						<div class="date">
							<span class="year"><?php echo (qgtime($last_money["time"],0)); ?></span>
							<span class="md"><?php echo (qgtime($last_money["time"],1)); ?>/<?php echo (qgtime($last_money["time"],2)); ?></span>
						</div>
					</div>
					
					<div class="point"><b></b></div>
					
					<div class="liright">
						<div class="histt"><a href="#">当前存入金额</a>：<?php echo ($target["name"]); ?></div>
						<div class="hisct">
						<p>金额：￥<?php echo ($sum); ?></p>
						<br>
						<p>距离目标还差：￥<?php echo ($last); ?></p>
						</div>
					</div>
				</div>
			</li>
			<?php else: ?>
			<li>
				<div class="liwrap">
					<div class="lileft">
						<div class="date">
							<span class="year"><?php echo (qgtime($last_money["time"],0)); ?></span>
							<span class="md"><?php echo (qgtime($last_money["time"],1)); ?>/<?php echo (qgtime($last_money["time"],2)); ?></span>
						</div>
					</div>
					
					<div class="point"><b></b></div>
					
					<div class="liright">
						<div class="histt"><a href="#">目标已实现</a>：<?php echo ($target["name"]); ?></div>
						<div class="hisct">
							<br>
							<p>实现总金额：￥<?php echo ($sum); ?></p>
							<br>
							<p>用时：<?php echo ($usetime); ?>&nbsp;天</p>
						</div>
					</div>
				</div>
			</li><?php endif; ?>
			<?php if(is_array($target_money)): foreach($target_money as $key=>$t): ?><li>
				<div class="liwrap">
					<div class="lileft">
						<div class="date">
							<span class="year"><?php echo (qgtime($t["time"],0)); ?></span>
							<span class="md"><?php echo (qgtime($t["time"],1)); ?>/<?php echo (qgtime($t["time"],2)); ?></span>
						</div>
					</div>
					
					<div class="point"><b></b></div>
					
					<div class="liright">
						<div class="histt">
						<a href="#"><?php echo ($t["name"]); ?></a>
						
						</div>
						<div class="hisct">存入金额: <?php echo ($t["value"]); ?><br><?php echo ($t["content"]); ?></div>
					</div>
				</div>
			</li><?php endforeach; endif; ?>
			<li>
				<div class="liwrap">
					<div class="lileft">
						<div class="date">
							<span class="year"><?php echo (qgtime($target["time"],0)); ?></span>
							<span class="md"><?php echo (qgtime($target["time"],1)); ?>/<?php echo (qgtime($target["time"],2)); ?></span>
						</div>
					</div>
					
					<div class="point"><b></b></div>
					
					<div class="liright">
						<div class="histt">
						<a href="#">今天你的存款目标开始。<br></a>
						</div>
						<div class="hisct">
							<p>你的目标金额：<?php echo ($target["value"]); ?></p>
							<p><?php echo ($target["content"]); ?></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>
</div>
</body>
</html>