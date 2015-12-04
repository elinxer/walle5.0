<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AdminController {
    public function index(){
        $this->show_member_num();
    	$this->show_log_info();
    	$this->show_webserver_info();
    	$this->show_webbase_info();
    	$this->meta_title = '后台首页';
    	$this->display();  

    }

    //显示服务器信息
    protected function show_webserver_info(){
    	$data['phpversion'] = phpversion();
    	$data['time_zone'] = date_default_timezone_get();
    	$data['php_os'] = PHP_OS;
    	$data['webserver'] = $_SERVER['SERVER_SOFTWARE'];
    	$data['max_filesize'] = ini_get('upload_max_filesize');
    	$data['socket'] = function_exists('fsockopen') ? '是' :'否';
    	$data['zlib'] = function_exists('gzclose') ? '是' : '否';
    	$data['gd'] = extension_loaded("gd") ? '是' : '否';
    	$data['safe_mode_gid'] = (boolean) ini_get('safe_mode_gid') ? '是' : '否';
    	$data['safe_mode'] = (boolean) ini_get('safe_mode') ? '是' : '否';
    	$data['mysql_version'] = '5.6.17';

    	$this->assign('server' , $data);
    }

    //显示登陆信息
    protected function show_log_info(){
        $uid = $_SESSION['uid'];
    	$log = M('action_log')->where("user_id=$uid AND type='login'")->order('id DESC')->limit(0,10)->select();
        //print_r($log);
    	$this->assign('log' , $log);
    }

    //显示网站基本信息
    protected function show_webbase_info(){

    	$data['lang'] = C('LANG');
    	$data['charset'] = C('DB_CHARSET');
    	$data['system_version'] = C('SYSTEM_VERSION');

    	$this->assign('webbase' , $data);
    }

    //读取注册用户数量，新增用户数
    protected function show_member_num(){
        $db = M('member');
        $data = array();
        $account = $db->count();

        $time = mktime(0,0,0,date('m') , 0, date('Y'));
        
        $new = $db->where("reg_time > $time")->count();
        $data = array('account' => $account , 'new' => $new);
        $this->assign('member_num' , $data);
    }



}