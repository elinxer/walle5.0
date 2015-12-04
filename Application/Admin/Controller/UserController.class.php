<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends AdminController {
    //用户管理中心
    public function user_manage(){


        $member = D('UserRelation')->relation(true)->order('id DESC')->select();
    	
    	$this->assign('member' , $member);
    	$this->meta_title = '用户中心';
    	$this->display();
    }

    // 用户添加
    public function add_user(){
    	if ($_SESSION['username'] != C('SUPERADMIN')) {
    		$this->error('你没有这个权限执行此操作！');
    	}else{
    		if (IS_POST) {
               
    			$data['name'] = $_POST['username'];
    			if ($_POST['password1'] != $_POST['password2']) {//检查密码是否一样
    				$this->error('两次输入密码不一样！');
    			}else{
    				$data['password'] = md5($_POST['password1'].C('WALLE'));
    			}
    			$name = $_POST['username'];
    			$user = M('member')->where("name='$name'")->find();
				if ($user) { //检查账号是否存在
					$this->error('账号已存在');
				}
    			if (empty($data['name'])) {// 检查密码是否为空
    				$this->error('用户名为空！');
    			}else if (empty($_POST['password1'])||empty($_POST['password2'])) {
    				$this->error('密码为空！');
    			}else{
    				$data['reg_id'] = time();
    				$data['reg_time'] = time();
                    $data['last_login_time'] = time();
    				$data['reg_ip'] = get_client_ip();
    				$data['status'] = 1;
    				if ($user_id = M('member')->add($data)) {
    					$role = array();
                        foreach ($_POST['role_id'] as $k){
                            $role[] = array(
                                'role_id' => $k,
                                'user_id' => $user_id
                                );
                        }
                        M('role_user')->addAll($role);
                        $this->success('添加成功！');
    				}else{
    					$this->error('添加失败！');
    				}
    			}
    		}else{
                $role = M('role')->where("status = 1")->select();
                
                $this->assign('option_role' , $role);
    			$this->meta_title = '添加用户';
    			$this->display();
    		}
    	}
    }

    //删除用户
    public function delete_user(){
    	$id = $_GET['id'];
    	
    	if ($_SESSION['username'] != 'admin') {
    		$this->error('你没有这个权限执行此操作！');
    	}else{
    		if (M('member')->where("id = $id")->delete()) {
	    		$this->success('删除成功！');
	    	}else{
	    		$this->error('删除失败！');
	    	}
    	}
    }




    //网站管理员
    public function manager(){
    	if (IS_POST) {
    		
    	}else{
    		$user = M('admin')->where('role_id = 2')->select();
    		$this->assign('manager', $user);
    		$this->meta_title = '网站管理员';
    		$this->display();
    	}
    }

    //增加网站管理员
    public function add_manager(){
    	if (IS_POST) {
    		$data['name'] = $_POST['username'];
    		$data['email'] = $_POST['email'];
    		$data['password'] = md5($_POST['password1'].C('WALLE'));
    		$data['reg_time'] = time();
    		$data['reg_ip'] = get_client_ip();
    		$data['last_login_time'] = time();
    		$data['status'] = 1;
    		$data['role_id'] = 2;
    		check_add_manager($_POST);//检查输入合法性
    		$this->check_unique($data['name'] , $data['email']);
    		if (M('admin')->add($data)) {
    			$this->success('添加成功！');
    		}else{
    			$this->error('添加失败！');
    		}
    	}else{
    		$this->meta_title = '添加网站管理员';
    		$this->display();
    	}
    }

    //编辑网站管理员
    public function edit_manager(){
    	if (IS_POST) {
    		$data['name'] = $_POST['username'];
    		$data['email'] = $_POST['email'];
    		$uid = $_GET['uid'];
    		$oldpwd = md5($_POST['oldpwd'].C('WALLE'));
    		if ($user = M('admin')->where("uid = $uid")->find()) {
    			if ($oldpwd == $user['password']) {
    				$data['password'] = md5($_POST['newpwd'].C('WALLE'));
    				if (M('admin')->where("uid=$uid")->save($data)) {
    					$this->success('保存成功！');
    				}else{
    					$this->error('保存失败');
    				}
    			}else{
    				$this->error('旧密码错误！');
    			}
    		}else{
    			$this->error('数据错误！');
    		}
    		
    	}else{
    		$uid = $_GET['uid'];
    		$user = M('admin')->where("uid = $uid")->find();
    		$this->assign('manager', $user);
    		$this->meta_title = '编辑网站管理员';
    		$this->display();
    	}
    }
    /**
     * 删除网站管理员
     */
    public function delete_manager(){
    	$this->delete('admin' , $uid = $_GET['uid']);
    }

	/**
	 * 删除数据
	 */
	protected function delete($table , $uid){
		
		if (M($table)->where("uid=$uid")->delete()) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}

    /**
 	* 检查账号是否存在
 	*/
	protected function check_unique($name , $email){
		
		$user = M('admin')->where("name='$name' OR email='$email'")->find();
		if ($user) {
			$this->error('账号已存在');
		}

	}

}