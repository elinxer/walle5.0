<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
    //空操作
    public function _empty(){
    	$this->display('Public/error');
    }

    // 登录
    public function login(){
        if (IS_POST) {
            $user = M('member')->where(array('name'=>$_POST['username']))->find();
            $password = md5($_POST['password'].C('WALLE'));
            if (!$user|| $user['password'] != $password) {
                $this->error('账号或密码错误！');
            }

            if ($user['status'] == 0) {
                $this->error('账号被锁定，请联系管理！');
            }
            $login_info = array('id' => $user['id'] ,'last_login_time' => time());
            M('member')->save($login_info);
            $action_log =array(
                'user_id' => $user['id'],
                'action' => '用户登录！',
                'create_time' => time(),
                'ip' => get_client_ip(),
                'type' => 'login'
                );
            M('action_log')->add($action_log);
            
            $_SESSION[C('USER_AUTH_KEY')] = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['IS_LOGIN'] = 1;

            // admin 识别
            if ($user['name'] == C('RBAC_SUPERADMIN')) {
                session(C('ADMIN_AUTH_KEY') , true);
            }

            $rbac = new \Org\Util\Rbac();
            $rbac::saveAccessList();
            
            $this->redirect('Index/index');
        }else{
            $this->meta_title = '用户登陆';
            $this->display();
        }
    }

    // 退出
    public function logout(){
        session(null);
        $this->redirect('Public/login');
    }
}