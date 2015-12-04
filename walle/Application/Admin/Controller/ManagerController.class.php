<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends AdminController {
    public function index(){
    	$this->meta_title = '导航';
    	$this->display();  

    }

    


}