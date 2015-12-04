<?php 

/**
 * 递归重组数组
 */
function node_merge($node , $access = null, $pid = 0){
	$arr = array();
	
	foreach ($node as $v) {
		if (is_array($access)) {
			$v['access'] = in_array($v['id'], $access) ? 1 : 0;
		}
		if ($v['pid'] == $pid) {
			$v['child'] = node_merge($node, $access, $v['id']);
			$arr[] = $v;
		}
	}

	return $arr;
}

/**
 * 检查后台添加网站管理员
 */
function check_add_manager($arr){
	foreach ($arr as $key => $value) {
		switch ($key) { //匹配相关信息
			case 'username':
				$var = '管理员名称';
				break;
			case 'email':
				$var = '邮箱Email';
				break;
			case 'password1':
				$var = '密码不能为空';
				break;
			case 'password1':
				$var = '再次输入密码不能为空';
				break;
		}
		if (empty($value)) { //检查是否为空
			echo '<script>alert("'. $var . ':不能为空！");history.back();</script>';
			die();
		}else if (strlen($value) <= 4 || strlen($value) >= 30) { //检查输入长度
			echo '<script>alert("'. $var . ' 输入长度不规范！");history.back();</script>';
			die();
		}else if ($key == 'email') {// 检查邮箱地址格式
			$v = explode('@', $value);
			if (count($v) != 2) {
				echo '<script>alert("'. $var . ' 邮箱地址不规范！");history.back();</script>';
				die();
			}
		}
	}
	if ($_POST['password1'] != $_POST['password2']) { //检查两个密码是否一致
		echo '<script>alert("两次密码不一致！");history.back();</script>';
		die();
	}
}


/**
 * 时间转换
 */
function change_time($time){
	return date('Y-m-d H:i:s' , $time);
}

//检查角色中文名
function role_name($role_id){
	$name = '';
	switch ($role_id) {
		case 1:
			$name = '超级管理员';
			break;
		case 2:
			$name =  '管理员';
			break;
		case 3:
			$name =  '会员';
			break;
		default:
			$name =  false;
			break;
	}
	return $name;
}

//重组数组
function re_array($arr){
	foreach ($arr as $key => $value) {
		$data[$value['name']] = $value['value'];
	}
	return $data;
}




?>