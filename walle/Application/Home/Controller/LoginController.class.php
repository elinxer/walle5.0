<?php
namespace Home\Controller;
use Think\Controller;

/**
 * 用户登陆 ，注册，退出，找回密码操作
 */
class LoginController extends Controller {

	// 登陆页面显示
    public function index(){
    	
    	$this->display();
    }

    //用户登录
	public function login(){
		if (IS_POST) {
			if (isset($_SESSION['uid'])) {	
				$this->redirect('Index/index');
			}else{
				$username = $_POST['username'];
				$password = md5($_POST['password'].C('WALLE')); // 密码加密
				//账号匹配
				if ($user = M('member')->where("name='$username' AND password='$password'")->find()) {
					// 写入原来登陆信息
					$user_id = $user['id'];
					$_SESSION['last_login_time'] = $user['last_login_time'];
					$last['last_login_time'] = time();//写入现在登陆信息
					M('member')->where("id=$user_id")->save($last);
					$_SESSION['uid'] = $user['id'];//写入登陆session
					$this->redirect('Index/index');
				}else{
					$this->error('登陆失败，用户名或密码错误！');
				}
			}
		}else{
			$this->display('Public/error'); //跳转错误页面
		}
	}

	// 用户注册
	public function register(){
		if (IS_POST) { //验证注册信息
			$email = $_POST['email'];
			if ($this->check_user($_POST['username'] ,$_POST['password'] , $email ,$_POST['verify'])) {
				$data['name'] = $_POST['username'];
				$data['password'] = md5($_POST['password'].C('WALLE'));
				$data['email'] = $_POST['email'];
				$data['reg_ip'] = get_client_ip();
				$data['reg_time'] = time();
				$data['last_login_time'] = time();
				$data['status'] = 1;
				
				if ($user_id = M('member')->add($data)) {// 插入会员表

					$r = M('role')->where("name = 'Member'")->find();
					$role = array();
					$role[] = array( // 配置角色信息
						'role_id' => $r['id'],
						'user_id' => $user_id
						);
					M('role_user')->addAll($role); //增添到角色关联表
					$_SESSION['uid'] = $user_id; //设置登陆
					$this->success('注册成功 ,正在登陆...！' , U('Index/index'));
				}else{
					$this->error('注册失败，请检查你的输入数据！');
				}
				
			}
		}else{
			$this->display('Login/register');
		}
	}

	// 退出
	public function logout(){
		session(null);
		$this->redirect('Login/index');
	}

	//找回密码
	public function find_pwd(){
		if (IS_POST) {
			$email = $_POST['email'];
			if (empty($email)) { // 检查是否为空
				$this->error('该邮箱不存在，请重新填写！');
			}
			if (!M('member')->where("email = '$email'")->find()) {
				$this->error('该邮箱不存在，请重新填写！'); // 检查账号是否存在
			}else if (!$this->check_verify($_POST['verify'])) {
				$this->error('验证码错误，请重新填写！'); // 匹配验证码
			}else{// 重置密码并发送密码
				$new = 'walle'.rand(10,100);
				$data_pwd['password'] = md5($new.C('WALLE'));
				if (M('member')->where("email='$email'")->save($data_pwd)) {
					$new_pwd = $new;
					$title = '个人账单系统-密码重置成功！';
					$content = '你的新密码:'.$new_pwd.'<br>'.'请及时登陆修改密码！';
					if (sendMail($email ,$title ,$content)) {
						$this->success("密码已经重置，请留意你的信箱！" ,U('Login/index'));
					}else{
						$this->error('密码重置失败,请检查你的输入！');
					}
				}else{
					$this->error('密码重置失败,请检查你的输入！');
				}
			}
		}else{
			$this->display();
		}
	}
	
	// 检查输入
	protected function check_user($username , $password ,$email , $verify){
		if (!preg_match("/^[a-zA-Z][a-zA-Z0-9_]{3,20}$/", $username)) {
			$this->error('账户名不合法，请重新填写！');
			die();
		}else if(M('member')->where("name = '$username' or email='$email'")->find()){
			$this->error('账户已存在，请重新填写！');
			die();
		}else if (!preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)) {
			$this->error('邮箱地址不合法，请重新填写！');
			die();
		}else if (!$this->check_verify($verify)) {
			$this->error('验证码错误，请重新填写！');
			die();
		}else{
			return true;
		}
	}

	// 生成验证码
	public function verify(){
		$Verify =     new \Think\Verify();
		// 验证码字体使用 ThinkPHP/Library/Think/Verify/ttfs/5.ttf
		$Verify->fontttf = '5.ttf';
		$Verify->length = 4;
		$Verify->fontSize = 30;
		$Verify->entry();
	}
	// 匹配验证码
	public function check_verify($code, $id = ''){
    	$verify = new \Think\Verify();
    	return $verify->check($code, $id);
	}
	
}