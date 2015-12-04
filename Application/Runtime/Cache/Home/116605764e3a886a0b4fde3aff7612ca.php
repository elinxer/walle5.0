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

<script type="text/javascript" src="/Public/Plugin/flappy-bird/phaser.min.js"></script>
<script type="text/javascript" src="/Public/Plugin/flappy-bird/main.js"></script>

<div id="main" class="alert alert-warning">
<p>&nbsp;</p>
<div style="float:left;width:55%">
&nbsp;
	<div style="text-align:center;" >
	<h1>Walle V5.0 用户协议</h1>
    <p>版权所有 (c) 2014，广东工业大学华立学院 杨东升。</p>

    <p>感谢您使用 WALLE 个人账单管理系统，希望我们的努力能为您提供一个简单、强大账单管理工具。<br>
    产品官方网址 <a href="http://www.blueteer.com">http://www.blueteer.com</a></p>

    <p>用户须知：本协议是您与WALLE之间关于您使用本产品及服务的法律协议。无论您是个人或组织、盈利与否、用途如何（包括以学习和研究为目的），均需仔细阅读本协议，包括免除或者限制WALLE责任的免责条款及对您的权利限制。请您审阅并接受或不接受本服务条款。如您不同意本服务条款及/或随时对其的修改，您应不使用或主动取消使用本产品。否则，您的任何对WALLE的相关服务的注册、登陆、下载、查看等使用行为将被视为您对本服务条款全部的完全接受，包括接受WALLE对服务条款随时所做的任何修改。</p>

    <p>本服务条款一旦发生变更, WALLE将在产品官网上公布修改内容。修改后的服务条款一旦在网站公布即有效代替原来的服务条款。您可随时登陆官网查阅最新版服务条款。如果您选择接受本条款，即表示您同意接受协议各项条件的约束。如果您不同意本服务条款，则不能获得使用本服务的权利。您若有违反本条款规定，WALLE有权随时中止或终止您对WALLE产品的使用资格并保留追究相关法律责任的权利。</p>

    <p>在理解、同意、并遵守本协议的全部条款后，方可开始使用WALLE产品。您也可能与WALLE直接签订另一书面协议，以补充或者取代本协议的全部或者任何部分。</p>

    <p>WALLE拥有WALLE的全部知识产权，包括商标和著作权。本软件只供许可协议，并非出售。WALLE只允许您在遵守本协议各项条款的情况下复制、下载、安装、使用或者以其他方式受益于本软件的功能或者知识产权。</p>
	<p>WALLE遵循ThinkPHP开源协议，并且用户可以永久使用（但不包括其衍生产品、插件或者服务）。
	</div>
</div>
<div>
	
<div style="float:right;width:40%;">
	<div id="game_div" ></div>
	<br>
	<p class="btn btn-info">使用空格键开始游戏</p>
</div>
<div style="clear:both"></div>
</div>
<p>&nbsp;</p>
<a href="<?php echo U('Index/index');?>">返回首页</a>