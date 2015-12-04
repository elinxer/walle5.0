<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends HomeController {
	// 加载首页
    public function index(){

    	$this->allData(); //综合数据统计
    	$this->shouzhi(); //收支
    	$this->shoujiao(); //收缴
    	$this->jiehuan(); //借还

    	$this->display();
    }

    // 自主查找功能
    public function ownSearch(){
    	$keywords = trim($_POST['keywords']); //接收数据
    	if (empty($keywords)) { // 判断是否非空
    		$result = null;
    	}else{
	    	$arr = explode(" ", $keywords); // 切割关键字
	    	foreach ($arr as $key => $value) { // 重组模糊查询数组
	    		if (!empty($value)) {
	    			$con[0] = "like";
	    			$con[1] = "%{$value}%";
	    			$mapcon[] = $con;
	    		}
	    	}
	    	array_push($mapcon, 'or'); // 添加 or 条件
	    	$map['name']  = $mapcon; //或从名称中检索
	    	$map['content'] = $mapcon; //或从说明中检索
	    	$map['_logic'] = 'or'; //多字段查询逻辑
	    	$mapSum['_complex'] = $map; //与原有逻辑区别
	    	$mapSum['type_id'] = array('eq' ,1);
	    	$sum = M('bill_data')->where($mapSum)->sum('value'); //计算
	    	// ----------------------------------------------//
	    	$mapMonth['_complex'] = $map; //与原有逻辑区别
	    	$date = date('Y-m');
	    	$mapMonth['time'] = array(array('like',"%{$date}%")); //匹配包含本月时间
	    	$mapMonth['type_id'] = array('eq' ,1);
	    	$month = M('bill_data')->where($mapMonth)->sum('value'); //计算
	    	// ----------------------------------------------//
	    	// $week = 2;
	    	// =======================================//
	    	$result = array($sum,$month,$week);	    	
    	}
    	$this->ajaxReturn($result);
    }

    // 收支统计
    public function shouzhi(){
    	$out = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>1))->sum('value');
    	$in = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>2))->sum('value');
    	$last = number_format(($in - $out),2,'.','');
    	$precent = explode('%', sprintf("%.2f%%",$last/$in*100));
    	if ($precent[0] <= 19 && $precent[0] >=0) {
    		$color = 'red';
    	}else if ($precent[0] >19 && $precent[0] < 80) {
    		$color = '#61a9dc';
    	}else{
    		$color = 'green';
    	}
    	$today = date('Y-m-d');
    	$todayout = M('bill_data')->where(array(
    		'uid'=>$_SESSION['uid'],'type_id'=>1,
    		'time'=>array('like' ,"%{$today}%")))->sum('value');
    	$todayin = M('bill_data')->where(array(
    		'uid'=>$_SESSION['uid'],'type_id'=>2,
    		'time'=>array('like' ,"%{$today}%")))->sum('value');
    	$shouzhi = array();
    	$shouzhi = array(
    		'out'=>$out,'in' =>$in,'last' =>$last,
    		'precent'=>$precent[0] ,'color'=>$color,
    		'todayout'=>$todayout,'todayin'=>$todayin);
    	$this->assign('shouzhi' ,$shouzhi);
    }
    // 收缴统计
    public function shoujiao(){
    	$out = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>3,'extra'=>0))->sum('value');
    	$in = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>3,'extra'=>1))->sum('value');
    	$last = ($in - $out);
    	$precent = explode('%', sprintf("%.2f%%",$last/$in*100));
    	if ($precent[0] <= 19 && $precent[0] >=0) {
    		$color = 'red';
    	}else if ($precent[0] >19 && $precent[0] < 80) {
    		$color = '#61a9dc';
    	}else{
    		$color = 'green';
    	}
    	$shoujiao = array();
    	$shoujiao = array(
    		'out'=>$out,'in' =>$in,'last' =>$last,
    		'precent'=>$precent[0] ,'color'=>$color);
    	$this->assign('shoujiao' ,$shoujiao);
    }
    // 借还统计
    public function jiehuan(){
    	$out = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>4,'extra'=>0,'status'=>0))->sum('value');
    	$in = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>4,'extra'=>1,'status'=>0))->sum('value');
    	$last = ($in - $out);
    	$precent = explode('%', sprintf("%.2f%%",$last/$in*100));
    	if ($precent[0] <= 19 && $precent[0] >=0) {
    		$color = 'red';
    	}else if ($precent[0] >19 && $precent[0] < 80) {
    		$color = '#61a9dc';
    	}else{
    		$color = 'green';
    	}
    	$jiehuan = array();
    	$jiehuan = array(
    		'out'=>$out,'in' =>$in,'last' =>$last,
    		'precent'=>$precent[0] ,'color'=>$color);
    	$this->assign('jiehuan' ,$jiehuan);
    }

    public function allData(){

    	$db = M('bill_data');
    	$date_year = date('Y');
    	$date_month = date('Y-m');
    	$date_day = date('Y-m-d');
    	
    	// 支出
    	$maxZhiValue = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>1))->max('value');
    	$maxZhiName = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>1))->getFieldByValue("{$maxZhiValue}" ,'name');
    	// ====
    	$maxZhiMv = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>1,'time'=>array('like' ,"%{$date_month}%")))->max('value');
    	$maxZhiMn = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>1,'time'=>array('like' ,"%{$date_month}%")))->getFieldByValue("{$maxZhiMv}" ,'name');
    	// =====
    	$maxZhiDv = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>1,'time'=>array('like' ,"%{$date_day}%")))->max('value');
    	$maxZhiDn = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>1,'time'=>array('like' ,"%{$date_day}%")))->getFieldByValue("{$maxZhiDv}" ,'name');
    	$maxZhiSum = $db->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>1,'time'=>array('like' ,"%{$date_year}%")))->sum('value');
    	$maxZhiMavg = ($maxZhiSum/date('m'));
    	$maxZhiDavg = ($maxZhiSum/date('z'));
    	// =====
    	$maxZhi = array(
    		'name'=>$maxZhiName , 
    		'value'=>$maxZhiValue,
    		'month'=>$maxZhiMv,'monthName'=>$maxZhiMn,
    		'day'=>$maxZhiDv,'dayName'=>$maxZhiDn,
    		'monthAvg'=>number_format($maxZhiMavg,2,'.',''),
    		'dayAvg'=>number_format($maxZhiDavg,2,'.','')
    		);

    	// 收入
    	$maxShouValue = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>2))->max('value');
    	$maxShouName = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>2))->getFieldByValue("{$maxShouValue}" ,'name');
    	$maxShou = array('name'=>$maxShouName , 'value'=>$maxShouValue);
    	$maxShouMv = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>2,'time'=>array('like' ,"%{$date_month}%")))->max('value');
    	$maxShouMn = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>2,'time'=>array('like' ,"%{$date_month}%")))->getFieldByValue("{$maxShouMv}" ,'name');
    	// =====
    	$maxShouDv = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>2,'time'=>array('like' ,"%{$date_day}%")))->max('value');
    	$maxShouDn = $db->where(
    		array('uid'=>$_SESSION['uid'] , 'type_id'=>2,'time'=>array('like' ,"%{$date_day}%")))->getFieldByValue("{$maxShouDv}" ,'name');
    	$maxShouSum = $db->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>2,'time'=>array('like' ,"%{$date_year}%")))->sum('value');
    	$maxShouMavg = ($maxShouSum/date('m'));
    	$maxShou = array(
    		'name'=>$maxShouName , 
    		'value'=>$maxShouValue,
    		'month'=>$maxShouMv,'monthName'=>$maxShouMn,
    		'day'=>$maxShouDv,'dayName'=>$maxShouDn,
    		'monthAvg'=>$maxShouMavg
    		);
    	// 分配
    	$this->assign('maxZhi' , $maxZhi); //支出
    	$this->assign('maxShou' , $maxShou); //收入
    }


    // 详细查询
    public function detailQuery(){
    	if (IS_POST) {
    		
    	}else{
    		$zhichu = M('bill_data')->where(array('uid'=>$_SESSION['uid'],'type_id'=>2,'name'=>array('like',"%大姐%")))->sum('value');
    		print_r($zhichu);
    		$this->meta_title = '详细查询统计';
    		$this->display();
    	}
    }


























    // 帮耿新移植程序数据
    public function reback(){
    	// $type = 'income';
    	// $type_id = 2;
    	// $type = 'pay';
    	// $type_id = 1;
    	//$this->re($type,$type_id);
    }
    public function re($type,$type_id){
    	$re = M('tp_data')->where(array('type'=>$type))->select();
    	$arr = array();
    	foreach ($re as $key => $value) {
    		$arr = array(
    			'id' =>$value['id'],
    			'name' =>$value['name'],
    			'time' =>$value['time'],
    			'value' =>$value['price'],
    			'content'=>$value['content'],
    			'create_time'=>time(),
    			'extra' =>$value['extra'],
    			'type_id'=>$type_id,
    			'uid' =>$_SESSION['uid'],
    			'status'=>1
    			);
    		$all[] = $arr;
    	}
    	if (M('bill_data')->addAll($all)) {
    		echo $type.'=>插入成功！';
    	}else{
    		echo $type.'=>插入失败！';
    	}
    }




















}