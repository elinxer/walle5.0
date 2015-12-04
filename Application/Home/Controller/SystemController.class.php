<?php
namespace Home\Controller;
use Think\Controller;
class SystemController extends HomeController {
    // 系统功能管理
    public function index(){
    	$newbackup = getFileList(C('DB_BACKUP')); //获取备份文件名
        $backup = $newbackup[0]['filename'];//取得最新备份

        $newDatabase = getFileList(C('CONFIG_BACKUP')); //获取备份文件名
        $config_back = $newDatabase[0]['filename'];

        $this->assign('config_back' ,$config_back);
        $this->assign('backup' ,$backup);
    	$this->display();
    }

    // 修改用户信息
    public function edit_user(){
    	if (IS_POST) {
            $id = $_GET['user_id'];
            $data['name'] = $_POST['username'];
            $data['email'] = $_POST['email'];
            if (!strlen($_POST['password']) < 4) { //检测是否修改密码
                $data['password'] = md5($_POST['password'].C('WALLE'));
            }
            if (M('member')->where("id=$id")->save($data)) {// 重新登录
                $this->success('保存成功,请重新登录！' , U('Login/logout'));
            }else{
                $this->error('保存失败！！');
            }
    	}else{
    		$this->display();
    	}
    }

    public function banquan(){
    	$this->display();
    }
}