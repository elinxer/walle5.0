<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends AdminController {
    
    //配置页面
    public function index(){
        //读取基础配置
        $base_config = M('config')->where("type='base'")->field('name , value')->select();
        $data = re_array($base_config);
        
        //读取显示设置
        $show_config = M('config')->where("type='show_config'")->field('name , title , value')->select();

        $this->assign('show_config' , $show_config);

        $this->assign('config' , $data);
        $this->meta_title = '配置页面';
        $this->display();
    }

    //基础配置
    public function base(){
        if (IS_POST) {
            if (!empty($_FILES['site_logo']['name'])) {
                $_POST['site_logo'] = $this->set_logo();
            }           
            
            if (!isset($_POST['site_off_on'])) {
            	$_POST['site_off_on'] = 'off';
            }
            if (!isset($_POST['site_map'])) {
            	$_POST['site_map'] = 'off';
            }
            if (!isset($_POST['site_verify'])) {
            	$_POST['site_verify'] = 'off';
            }
            if (!isset($_POST['site_url_rewrite'])) {
            	$_POST['site_url_rewrite'] = 'off';
            }
            if (!isset($_POST['site_login'])) {
                $_POST['site_login'] = 'off';
            }
            foreach ($_POST as $key => $value) {//删除原有数据
                M('config')->where("name='$key'")->delete();
            }
            $status = '';
            foreach ($_POST as $a => $b) {
            	$data['name'] = $a;
            	$data['value'] = $b;
            	$data['type'] = 'base';
            	$data['create_time'] = time();
            	if (M('config')->add($data)) {
            		$status = 1;
            	}else{
            		$status = 0;
            		break;
            	}
            }
            if ($status == 1) {
            	$this->success('更新成功！');
            }else{
            	$this->error('更新失败！');
            }
            
        }
    }

    //显示设置
    public function show_config(){
        if (IS_POST) {
            
            //重组并插入数据
            foreach ($_POST as $key => $value) {
                $data['name'] = $key;
                $data['value'] = $value;
                
                $data['type'] = 'show_config';
                
                M('config')->where("name='$key'")->save($data);
            }
            $this->success('更新成功！');
        }
    }

    // 自定义配置
    public function custom(){
        $_POST['create_time'] = time();
        //dump($_POST);
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $this->error($key . '为空！');
                break;
            }
        }
        if (M('config')->add($_POST)) {
            $this->success('添加成功！');
        }else{
            $this->error('添加失败！');
        }
    }

    /**
     * 设置logo
     * 但文件上传
     */
    public function set_logo(){
        if (IS_POST) { //判断提交
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg' , 'ico');// 设置附件上传类型
            $upload->rootPath  =     './Uploads/Picture/'; // 设置附件上传根目录
            $upload->savePath  =     '/logo/'; // 设置附件上传（子）目录
            // 上传文件 
            $info   =   $upload->uploadOne($_FILES['site_logo']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功,保存配置信息
                
                //上传保存数据库地址
                $url = __ROOT__.'/Uploads/Picture'.$info['savepath'].$info['savename'];
                return $url;
            }
        }
    }
    
}