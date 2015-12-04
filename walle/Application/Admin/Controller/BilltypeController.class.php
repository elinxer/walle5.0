<?php
namespace Admin\Controller;
use Think\Controller;
class BilltypeController extends AdminController {

	//显示账单列表
    public function index(){

    	$this->show_bill();
    	$this->meta_title = '账单类型';
    	$this->display();  

    }

    //添加账单类型
    public function add_bill_type(){
    	if (IS_POST) {
            $data = array(
                'type_id' => $_POST['type_id'],
                'name' => $_POST['name'],
                'title' => $_POST['title']
                );
    		if (M('bill_data_type')->add($data)) {
                $this->success('添加成功！');
            }else{
                $this->error('添加失败！');
            }
    	}else{
    		$this->meta_title = '添加类型';
    		$this->display();
    	}
    }

    // 显示账单类型列表
    public function show_bill(){
    	$result = M('bill_data_type')->order('type_id ASC')->select();
        
    	$this->assign('bill_type' ,$result);
    }

    // 删除导航
    public function delete_type(){
    	$id = $_GET['id'];
    	if (M('bill_data_type')->where("id = $id")->delete()) {
    		$this->success('删除成功！' , U('Billtype/index'));
    	}else{
    		$this->error('删除失败！');
    	}
    }

    
    


}