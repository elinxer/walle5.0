<?php 
/*
 ++----------------------++
 ++ 前端公共函数文件 ++
 ++----------------------++
*/


// 重组配置数据
function re_config($arr){
	foreach ($arr as $key => $value) {
		$config[$value['name']] = $value['value'];
	}
	return $config;
}

// 把10位时间数字还原
function change_time($time , $pattern = ""){
	
	switch ($pattern) {
		case 1:
			return date('Y-m-d' , $time);
			break;
		case 2:
			return date('Y-m-d H:i' , $time);
			break;
		case 5:
			$t = explode(" ", $time);
			return $t[0];
		default:
			return date('Y-m-d H:i:s' , $time);
			break;
	}
}

// 导航条URL切割 Index/index 分开
function qgurl($url){
	$s = array();
	$s = explode('/', $url);
	return $s[0];
}

// 时间切割函数
function qgtime($time ,$type){
	$arr = array();
	$arr = explode(' ', $time);
	$date = explode('-', $arr[0]);
	return $date[$type];
}


?>