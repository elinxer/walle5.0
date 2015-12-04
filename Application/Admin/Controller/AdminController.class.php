<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    //空操作
    public function _empty(){
    	$this->display('Public/error');
    }

    protected function _initialize(){
    	if (!isset($_SESSION['IS_LOGIN'])) {
            $this->redirect('Admin/Public/login');
        }else{
            $user_id = $_SESSION['uid'];
            $user = M('member')->where(array('id'=>$user_id))->find();
            $this->assign('user' , $user);
        }

        $notAuth = in_array(CONTROLLER_NAME, explode(',', C('NOT_AUTH_CONTROLLER'))) ||
        in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

        if (C('USER_AUTH_ON') && !$notAuth) {
            $rbac = new \Org\Util\Rbac();
            $rbac::AccessDecision(MODULE_NAME) || $this->error('你没有权限！');
            
        }

    }
}