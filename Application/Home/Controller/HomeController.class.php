<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */

class HomeController extends Controller {
    /* called empty Control method */
    public function _empty(){
    	$this->display('Public/error');
    }

    /* To initialize website configurations */

    protected function _initialize(){
    	/* loaded website configures */
    	$config = M('config')->select();
    	$config = re_config($config);
    	if ($config['site_off_on'] == 'off') { //检查网站是否关闭
    		echo "网站已经关闭！";
    		die();
    	}else if($config['site_login'] == 'on'){// 检查是否开启登陆模式
    		if (!isset($_SESSION['uid'])) {
        		$this->redirect('Login/index');
        	}else{
        		$uid = $_SESSION['uid']; // 把用户信息写入公共模板
        		$user = M('member')->where("id=$uid")->find();
                $this->last_login_time = $_SESSION['last_login_time'];//写入最后登陆时间
        		$this->assign('user' , $user);
        		$this->assign('config' , $config); //写入配置信息
        	}
		}else{
			$this->assign('config' , $config); //写入配置信息
		}

		/* load nav */
		$result = M('nav')->where("status = 1")->order('sort')->select();
		$this->assign('nav' ,$result);
        /* second nav */
        
        $this->assign('controller_name' , CONTROLLER_NAME); //控制器名称
        $this->assign('action_name' , ACTION_NAME); //方法名称
        $this->assign('controller_url' , __CONTROLLER__); // 控制器地址
        $this->assign('action_url' , __ACTION__); // 控制器地址
    }






    

}