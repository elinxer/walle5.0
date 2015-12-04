<?php 
namespace Home\Controller;
use Think\Controller;

class ShoujiaoController extends HomeController
{
	//功能首页加载
	public function index(){
		
		// 信息输出
		$this->shoujiao = M('bill_data')->where(
			array(
				'uid' => $_SESSION['uid'],
				'type_id'=>3,
				'extra'=>1))->sum('value');
		$this->zhichu = M('bill_data')->where(
			array(
				'uid' => $_SESSION['uid'],
				'type_id'=>3,
				'extra'=>0))->sum('value');
   		$this->sum = M('bill_data')->where(
   			array('uid' => $_SESSION['uid'],
   				'type_id'=>3))->sum('value');
    	$this->page('bill_data' , 15 , array('type_id'=> 3 ,'uid'=>$_SESSION['uid']));

    	$this->display();
	}
	
	// 收缴记录
	public function add(){
		if (IS_POST) {
			$data = array(
    			'name' => $_POST['name'],
    			'value' => $_POST['price'],
    			'time' => $_POST['time'],
    			'content' => $_POST['content'],
    			'uid' => $_SESSION['uid'],
    			'type_id' => $_POST['type_id'],
    			'extra' => $_POST['type'], //收缴或者支出代表值
    			'create_time' => time(),
    			'status' => 1
    			);
			if (M('bill_data')->add($data)) {
				if ($_GET['type'] == 1) {
					$ty = 'shoujiao';
				}else{
					$ty = 'zhichu';
				}
				$addurl = 'Home/Shoujiao/add/type/'.$ty;
				$this->redirect($addurl);
			}else{
				$this->error('添加失败！');
			}
		}else{
			$nowtime = time() - 3600; //前一个小时
			if ($_GET['type'] == 'shoujiao') {
				$this->type = 1; // 1代表收缴
				$this->sum = M('bill_data')->where(
					array(
						'uid' => $_SESSION['uid'],
						'type_id'=>3,
						'extra'=>1))->sum('value');
    			$this->now = M('bill_data')->where(
    				array(
    					'uid' => $_SESSION['uid'],
    					'type_id'=>3,
    					'extra'=>1,
    					'create_time'=>array('gt',$nowtime)))->sum('value');

				$this->page('bill_data' , 5 , array('type_id'=> 3 ,'uid'=>$_SESSION['uid'],'extra'=>1));

			}else if ($_GET['type'] == 'zhichu') {
				$this->type = 0; // 0代表支出

				$this->sum = M('bill_data')->where(
					array(
						'uid' => $_SESSION['uid'],
						'type_id'=>3,
						'extra'=>0))->sum('value');
    			$this->now = M('bill_data')->where(
    				array(
    					'uid' => $_SESSION['uid'],
    					'type_id'=>3,
    					'extra'=>0,
    					'create_time'=>array('gt',$nowtime)))->sum('value');
				$this->page('bill_data' , 5 , array('type_id'=> 3 ,'uid'=>$_SESSION['uid'],'extra'=>0));
			}
			

			$this->display();
		}
	}

	// 删除数据
    public function delete(){
    	if (isset($_GET['id'])) {
    		if (M('bill_data')->where(array('id'=>$_GET['id']))->delete()) {
    			if ($_GET['type'] == 1) {
					$ty = 'add/type/shoujiao';
				}else if ($_GET['type'] == 3) {
					$ty = 'index';
				}else if ($_GET['type'] == 0) {
					$ty = 'add/type/zhichu';
				}
				$url = 'Home/Shoujiao/'.$ty;
    			$this->redirect($url);
    		}else{
    			$this->error('删除失败！');
    		}
    	}else{
    		$this->error('操作错误！');
    	}
    }

    // 修改收入数据
    public function update(){
    	if (IS_POST) {
    		$data = array(
    			'name' => $_POST['name'],
    			'value' => $_POST['price'],
    			'time' => $_POST['time'],
    			'content' => $_POST['content'],
    			);
    		if (M('bill_data')->where(array('id'=>$_GET['id']))->save($data)) {
    			$this->success('修改成功，正在返回...');
    		}else{
    			$this->error('修改失败，请检查数据是否正确！');
    		}
    	}else{
			$result = M('bill_data')->where(array('id'=>$_GET['id']))->find();

			if ($_GET['type'] == 1) {
				$ty = 'add/type/shoujiao';
			}else if($_GET['type'] == 0){
				$ty = 'add/type/zhichu';
			}else{
				$ty = 'index';
			}
			
			$this->type = $_GET['type'];
			$this->url = 'Home/Shoujiao/'.$ty; //返回链接
			$this->assign('data' , $result);
			$this->display();    		
    	}
    }
    /**
     * 数据分页
     * @ $table 分页数据表
     * @ $num 每一页条数
     * @ $condition 查询条件
     * @ by wall-e 2014/07/22
     */
    public function page($table,$num,$condition){
    	$User = M($table); 
		$count = $User->where($condition)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,$num);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$Page->setConfig('prev', '上一页'); 
     	$Page->setConfig('next', '下一页'); 
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->where($condition)->order('time desc ,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
    }






}

