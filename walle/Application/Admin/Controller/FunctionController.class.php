<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 功能管理
 */
class FunctionController extends AdminController {

	//显示功能推送列表
    public function show(){

    	$this->show_function();
    	$this->meta_title = '功能推送';
    	$this->display();  

    } 

    // 显示功能列表
    public function show_function(){
    	$result = M('nav')->order('sort')->select();

    	$this->assign('function' , $result);
    }

    // 推送修改
    public function push(){
    	$data['status'] = $_GET['status'];
    	$id = $_GET['id'];
    	if (M('nav')->where("id=$id")->save($data)) {
    		$this->redirect('Function/show');
    	}else{
    		$this->error("('本来相同了，还搞毛啊！')");
    	}
    }

    


}