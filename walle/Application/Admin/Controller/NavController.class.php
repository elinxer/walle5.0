<?php
namespace Admin\Controller;
use Think\Controller;
class NavController extends AdminController {

	//显示导航列表
    public function nav(){

    	$this->show_nav();
    	$this->meta_title = '功能';
    	$this->display();  

    }

    //添加导航
    public function add_nav(){
    	if (IS_POST) {
    		$_POST['create_time'] = time();
    		$_POST['update_time'] = time();
    		$_POST['target'] = '_self';
    		$_POST['status'] = 1;
    		if (M('nav')->add($_POST)) {
    			$this->success('添加成功！', U('Nav/nav'));
    		}else{
    			$this->error('添加失败！');
    		}
    	}else{
    		$this->meta_title = '添加功能';
    		$this->display();
    	}
    }

    // 导航列表
    public function show_nav(){
    	$result = M('nav')->order('sort ASC')->select();

    	$this->assign('nav' ,$result);
    }

    // 删除导航
    public function delete_nav(){
    	$id = $_GET['nav_id'];
    	if (M('nav')->where("id = $id")->delete()) {
    		$this->success('删除成功！' , U('Nav/nav'));
    	}else{
    		$this->error('删除失败！');
    	}
    }

    //编辑导航
    public function edit_nav(){
    	if (IS_POST) {
    		$_POST['update_time'] = time();
    		$id = $_GET['id'];
    		if (M('nav')->where("id = $id")->save($_POST)) {
    			$this->success('保存成功！' ,U('Nav/nav'));
    		}else{
    			
    			$this->error('保存失败！');
    		}
    	}else{
    		$id = $_GET['nav_id'];
    		$result = M('nav')->where("id=$id")->find();

    		$this->assign('nav' , $result);
    		$this->meta_title = '编辑导航';
    		$this->display();
    	}
    }
    


}