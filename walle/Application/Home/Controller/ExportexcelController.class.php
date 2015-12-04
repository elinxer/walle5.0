<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 导出Excel 表格基础文档
 */
class ExportexcelController extends HomeController {
    
    // 数据加载
    public function index() {
        if (IS_POST) {
            if (empty($_POST['filename'])) {
                $this->error('名称赶紧写个！');
            }
            set_time_limit(0);
            ini_set('memory_limit', '800M'); // 设置溢出内存
            $data = M('bill_data');
            // 查询数据
            $arr = $data->field('create_time,remark,uid' ,true)->select();
            $filename = $_POST['filename'];
            // 导出Excel
            exportexcel($arr,array('账单ID','账单名称','金额','账单描述','时间','所属','账单类型','状态','是否锁定'),$filename);
            
        }else{
            $this->error('操作错误！');
        }
    }
    public function ajax(){

    }


 }

 ?>
