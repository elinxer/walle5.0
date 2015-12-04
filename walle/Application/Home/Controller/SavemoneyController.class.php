<?php
namespace Home\Controller;
use Think\Controller;
// 存款目标
class SavemoneyController extends HomeController {
    // 加载首页
    public function index(){

   		$target = M('bill_data')->where(array('uid'=>$_SESSION['uid'],'type_id'=>5,'is_lock'=>1))->find();
        // ----------------------
        $this->sum = M('bill_data')->where(array('uid' => $_SESSION['uid'],'id'=>$target['id']))->sum('value');
        $yicun = M('bill_data')->where(array('uid' => $_SESSION['uid'],'type_id'=>6,'extra'=>$target['id']))->sum('value');
        $this->needMoney = ($this->sum - $yicun);
        $this->page('bill_data' , 9 , array('type_id'=> 6 ,'uid'=>$_SESSION['uid'],'extra'=>$target['id']));
        // ============
        $target_m = $target['value'];
        $sum_m = M('bill_data')->where(array('uid' => $_SESSION['uid'],'type_id'=>6,'extra'=>$target['id']))->sum('value');
        $pt = sprintf('%.2f%%',$sum_m/$target_m*100);
        $ppt = explode("%", $pt);
        $this->precent_t = $ppt[0];
        // ============
        //----
        $save = M('bill_data')->where(array('uid'=>$_SESSION['uid'] , 'type_id'=>6, 'is_lock'=>0))->sum('value');
        $this->assign('saveSum', $save);
        $this->doneTime = (strtotime($target['time']) - time());//倒计时
    	$this->is_target = $target['is_lock']; //判断是否开启
        $this->target_id = $target['id']; //当前目标id
        $this->assign('target' ,$target);
        $this->display();
    	
    }

    // 存款目标开启记录
    public function start_target(){
        if (IS_POST) {
            //检查记录功能是否被锁定
            $is_lock = M('bill_data')->where(array('uid'=>$_SESSION['uid'],'type_id'=>5,'is_lock'=>1))->select();
            if ($is_lock) {
                $this->error('无法进行，功能被锁定！');
            }
            $data = array(
                'name' =>$_POST['name'],
                'value' =>$_POST['price'],
                'time' =>$_POST['time'],
                'create_time' =>time(),
                'type_id' =>5,
                'uid' =>$_SESSION['uid'],
                'status' =>1,
                'content' =>$_POST['content'],
                'remark' =>$_POST['remark'],
                'is_lock' =>1
                );
            if (M('bill_data')->add($data)) {
                $this->success('载入目标成功！' ,U('Savemoney/index'));
            }else{
                $this->error('记录失败！');
            }
            
        }else{
            $this->display();
        }


    }

    // 目标列表
    public function targetList(){
        if (IS_POST) {
            
        }else{
            $this->sum = M('bill_data')->where(array('uid' => $_SESSION['uid'],'type_id'=>5))->sum('value');
            $this->page('bill_data',12 ,array('uid'=>$_SESSION['uid'],'type_id'=>5));
            $this->display();
        }
    }

    // 删除数据
    public function delete(){
        if (isset($_GET['id'])) {
            if (M('bill_data')->where(array('id'=>$_GET['id']))->delete()) {
                
                $this->success('删除成功，正在返回...');
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

            $this->assign('data' , $result);
            $this->display();           
        }
    }
    public function addMoney(){
        if (IS_POST) {
            $data = array(
                'name' =>$_POST['name'],
                'value' =>$_POST['price'],
                'time' =>$_POST['time'],
                'content'=>$_POST['content'],
                'create_time'=>time(),
                'uid' =>$_SESSION['uid'],
                'type_id' =>6,
                'extra' =>$_POST['target_id'],
                'status'=>1
                );
            if (M('bill_data')->add($data)) {
                $target = M('bill_data')->where(
                    array('id'=>$_POST['target_id']))->sum('value');
                $sum = M('bill_data')->where(
                    array('uid' => $_SESSION['uid'],
                        'type_id'=>6,
                        'extra'=>$_POST['target_id']))->sum('value');
                if ($sum > $target || $sum == $target) {
                    $lock['is_lock'] = 0;
                    M('bill_data')->where(array('id'=>$_POST['target_id']))->save($lock);
                    $this->redirect('Savemoney/targetDone');
                }else{
                    $this->success('存入成功！');
                }

            }else{
                $this->error('存入失败！');
            }
        }else{
            $this->target_id = $_GET['id'];
            $nowtime = time() - 3600; //前一个小时
            
            $this->sum = M('bill_data')->where(array('uid' => $_SESSION['uid'],'id'=>$_GET['id']))->sum('value');
            $this->now = M('bill_data')->where(array('uid' => $_SESSION['uid'],'type_id'=>6,'extra'=>$_GET['id'],'create_time'=>array('gt',$nowtime)))->sum('value');
            $this->page('bill_data' , 5 , array('type_id'=> 6 ,'uid'=>$_SESSION['uid'],'extra'=>$_GET['id']));
            $this->display();
        }
        
    }
    //存款目标时间轴
    public function timeline(){
        $target = M('bill_data')->where(array('id'=>$_GET['id']))->find();// 获取当前目标信息
        $tmcon = array('uid'=>$_SESSION['uid'],'type_id'=>6,'extra'=>$_GET['id']);
        $target_money = M('bill_data')->where($tmcon)->select();
        $num = count($target_money); //计算数组个数
        $last_money = $target_money[($num-1)];//返回最后一条数据
        //用时计算
        $starttime = mktime(0,0,0,qgtime($target['time'],1),qgtime($target['time'],2),qgtime($target['time'],0));
        $endtime = mktime(0,0,0,qgtime($last_money['time'],1),qgtime($last_money['time'],2),qgtime($last_money['time'],0));
        $usetime = (date('z',$endtime)-date('z',$starttime));
        
        $allsum = M('bill_data')->where(array('id'=>$_GET['id']))->sum('value'); //目标金额
        // 当前存入总金额
        $this->sum = M('bill_data')->where(array('uid' => $_SESSION['uid'],'type_id'=>6,'extra'=>$_GET['id']))->sum('value');
        $this->last = ($allsum - $this->sum);// 剩余金额
        $this->lock = $target['is_lock']; //锁定判断
        $this->assign('target',$target);
        $this->assign('last_money' ,$last_money);
        $this->assign('target_money' ,$target_money);
        $this->assign('usetime' ,$usetime);
        $this->meta_title = '存款目标时间轴';
        $this->display();
    }
    // 目标实现
    public function targetDone(){
        $this->display();
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