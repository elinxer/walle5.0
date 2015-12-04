<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html >
<html>
    <head>
        <title>账号注册</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="/walle/Public/Login/css/style.css" />
    </head>
    <body>
		<div class="wrapper">
			<h1>--欢迎使用个人账单系统</h1>
			<h2><span>PS:</span>你的支持是我持续完善的最大动力</h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="login active" action="<?php echo U('Login/register');?>" method="post">
						<h3>账号注册</h3>
						<div>
							<label>用户名 (英文开头>=5)</label>
							<input type="text" name="username" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>邮箱Email （用于找回密码）</label>
							<input type="text" name="email" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>密码: </label>
							<input type="password" name="password" />
							<span class="error">This is an error</span>
						</div>
						<div>
							<label>验证码: </label>
							<input type="text" name="verify" /><br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<img src="<?php echo U('Login/verify');?>" onclick="picreload();" id="check">
							《=点击刷新<span class="error">This is an error</span>
							
						</div>
						<div class="bottom">
							<div class="remember"><input type="checkbox" /><span>记住我</span></div>
							<input type="submit" value="注册"></input>
							<a href="<?php echo U('Login/index');?>" rel="register" class="linkform">已经有账户? 点击登陆</a>
							<div class="clear"></div>
						</div>
					</form>
					<form class="forgot_password">
						<h3>忘记密码</h3>
						<div>
							<label>用户名或者Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="发送请求"></input>
							<a href="#" rel="login" class="linkform">记起?点击登录</a>
							<a href="register.html" rel="register" class="linkform">还没有账户? 点击注册</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			<a class="back" href="#" onclick="alert('登陆暂时被禁止！');">登录到管理后台</a>
		</div>
		<div id="footer">
		<p>&nbsp;</p>
		<h5>
		©2014 111 <a href="">使用本系统前必读</a> 京ICP证00000号&nbsp;<img src="/walle/Public/Login/images/copy_rignt_24.png" alt="版权图标">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</h5>
		
		</div>
<script>
	function picreload(){
		var change=document.getElementById('check');
		change.src="<?php echo U('Login/verify');?>"+'/'+Math.random();
	}
</script>
    </body>
</html>