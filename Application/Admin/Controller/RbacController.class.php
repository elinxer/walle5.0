<?php
namespace Admin\Controller;
use Think\Controller;
class RbacController extends AdminController {
    //用户管理中心
    public function index(){
    	//角色管理
    	$role = M('role')->select();
    	//节点管理
    	$node = M('node')->field('id,name,title,pid')->order('sort')->select();
    	$node = node_merge($node);
    	//print_r($node);
    	
    	$this->assign('node' , $node);
    	$this->assign('role' , $role);
    	$this->meta_title = 'RBAC管理';
    	$this->display();
    }

    //添加角色
    public function add_role(){
    	if (IS_POST) {
    		if (M('role')->add($_POST)) {
    			$this->success('添加成功！' , U('Rbac/index'));
    		}
    	}else{
    		$this->redirect('Rbac/index');
    	}
    }

    //添加节点
    public function add_node(){
    	if (!IS_POST) {

	    	$pid = isset($_GET['pid']) ? $_GET['pid'] : 0;
	    	$level = isset($_GET['level']) ? $_GET['level'] : 1;

	  		switch ($level) {
	  		 		case 1:
	  		 			$type = '应用';
	  		 			break;
	  		 		case 2:
	  		 			$type = '控制器';
	  		 			break;
	  		 		case 3:
	  		 			$type = '动作方法';
	  		 			break;
	  		 		
	  		 		default:
	  		 			$type = '应用';
	  		 			$level = 1;
	  		 			$pid = 0;
	  		 			break;
	  		 	}
	  		$this->assign('pid' , $pid);
	  		$this->assign('level' , $level);
	  		$this->assign('type' , $type);
	  		$this->meta_title = '添加'.$type;
	  		$this->display();
  		}else{
  			if (IS_POST) {
	    		if (M('node')->add($_POST)) {
	    			$this->success('添加成功！' , U('Rbac/index'));
	    		}else{
	    			$this->error('添加失败！');
	    		}
    		}
  		}	
    }
    // 删除节点
    public function delete_node(){
        $node_id = $_GET['node_id'];
        if (M('node')->where(array('id'=>$node_id))->delete()) {
            $this->redirect('Rbac/index');
        }else{
            $this->error('删除失败！');
        }
    }

    // 权限配置
    public function access() {
    	if (!IS_POST) {
    		$rid = I('rid' ,0 ,'intval');

	    	$node = M('node')->order('sort')->select();
	    	$access = M('access')->where(array('role_id'=>$rid))->getField('node_id' ,true);

	    	$node = node_merge($node , $access);
	    	
	    	$this->assign('rid' , $rid);
	    	$this->assign('node' , $node);
	    	$this->meta_title = '配置权限';
	    	$this->display();
    	}else{
    		$rid = I('rid' , 0 , 'intval');
    		$data = array();

    		$db = M('access');
    		$db->where(array('role_id'=>$rid))->delete();//删除原有
    		foreach ($_POST['access'] as $v) {// 重组数据
    			$tmp = explode('_', $v);
    			$data[] = array(
    				'role_id' => $rid,
    				'node_id' => $tmp[0],
    				'level' => $tmp[1],
    				);
    		}
    		if ($db->addAll($data)) {// 新增配置
    			$this->success('修改成功！' , U('Rbac/index'));
    		}else{
    			$this->error('修改失败！');
    		}
    		

    	}
    }
}