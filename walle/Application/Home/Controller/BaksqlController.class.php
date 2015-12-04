<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 备份文件基础文档
 */
class BaksqlController extends HomeController {
    public $dir_sep = '/';
    public $content;
    public $config = '';
    // 数据加载
    public function index() {
        if (IS_POST) {
            set_time_limit(0);                                                      //不超时
            ini_set('memory_limit','800M');
            $this->config = array( 
                'path' => C('DB_BACKUP'),                                           //备份文件存在哪里
                'isCompress' => 0,                                                  //是否开启gzip压缩      【未测试】
                'isDownload' => 0                                                   //备份完成后是否下载文件 【未测试】
            );
            $s = microtime(true); // 开始记录运行时间
            if ($this->backup(array(0=>'walle_bill_data'))) {
                $this->bakmessage = '备份成功';
            }
            $e = microtime(true); // 结束运行时间

            $this->usetime =  '总用时' . ($e - $s); // 分配运行时间
            $this->display();
        }else{
            $this->error('操作错误!');
        }
    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 备份整个数据库
     * +------------------------------------------------------------------------
     */
    public function backdatabase() {
        set_time_limit(0);                                                      //不超时
        ini_set('memory_limit','800M');
        $this->config = array( 
                'path' => C('CONFIG_BACKUP'),                                           //备份文件存在哪里
                'isCompress' => 0,                                                  //是否开启gzip压缩      【未测试】
                'isDownload' => 0                                                   //备份完成后是否下载文件 【未测试】
            );
        $tables = $this->getTables();
        if ($this->backup($tables)) {
            $this->success('数据库备份成功！');
        } else {
            $this->error('数据库备份失败！');
        }
    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 获取数据库的所有表
     * +------------------------------------------------------------------------
     * * @ $dbName  数据库名称
     * +------------------------------------------------------------------------
     */
    private function getTables($dbName = '') {
        if (!empty($dbName)) {
            $sql = 'SHOW TABLES FROM ' . $dbName;
        } else {
            $sql = 'SHOW TABLES ';
        }
        $result = M()->query($sql);
        $info = array();
        foreach ($result as $key => $val) {
            $info[$key] = current($val);
        }
        return $info;
    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 备份数据 { 备份每张表、视图及数据 }
     * +------------------------------------------------------------------------
     * * @ $tables 需要备份的表数组
     * +------------------------------------------------------------------------
     */
    private function backup($tables) {
        if (empty($tables))
            $this->error('没有需要备份的数据表!');
        $this->content = '/* This file is created by MySQLReback ' . date('Y-m-d H:i:s') . ' */';
        foreach ($tables as $i => $table) {
            $table = $this->backquote($table);   //为表名增加 ``
            $tableRs = M()->query("SHOW CREATE TABLE {$table}");       //获取当前表的创建语句
            
            if (!empty($tableRs[0]["Create View"])) {
                $this->content .= "\r\n /* 创建视图结构 {$table}  */";
                $this->content .= "\r\n DROP VIEW IF EXISTS {$table};/* MySQLReback Separation */ " . $tableRs[0]["Create View"] . ";/* MySQLReback Separation */";
            }
            if (!empty($tableRs[0]["Create Table"])) {
                $this->content .= "\r\n /* 创建表结构 {$table}  */";
                $this->content .= "\r\n DROP TABLE IF EXISTS {$table};/* MySQLReback Separation */ " . $tableRs[0]["Create Table"] . ";/* MySQLReback Separation */";
                
                $tableDateRow = M()->query("SELECT * FROM {$table}"); //读取所有数据
                
                $valuesArr = array();
                $values = '';
                /* 以上已检验 */
                if (false != $tableDateRow) {
                    foreach ($tableDateRow as &$y) {
                        foreach ($y as &$v) {
                           if ($v=='')                                  //纠正empty 为0的时候  返回tree
                                $v = 'null';                                    //为空设为null
                            else
                                $v = "'" . mysql_escape_string($v) . "'";       //非空 加转意符
                        }
                        $valuesArr[] = '(' . implode(',', $y) . ')';
                    }
                }
                $temp = $this->chunkArrayByByte($valuesArr);
                if (is_array($temp)) {
                    foreach ($temp as $v) {
                        $values = implode(',', $v) . ';/* MySQLReback Separation */';
                        if ($values != ';/* MySQLReback Separation */') {
                            $this->content .= "\r\n INSERT INTO {$table} VALUES {$values}";
                        }
                    }
                }
            }
        }
        
        if (!empty($this->content)) {
            $this->content;
            $this->setFile();
        }
        return true;
    }
    
    //还原数据库
    public function recover() {
        $filename = $_GET['file'].'.sql';

        if ($this->recover_file($filename,C('DB_BACKUP'))) {

            $this->success('数据还原成功！');

        } else {
            $this->error('数据还原失败！');
        }
    }
    // 还原配置备份
    public function recoverConfig(){
        $filename = $_GET['filename'].'.sql';
        if ($this->recover_file($filename,C('CONFIG_BACKUP'))) {

            $this->success('数据还原成功！');

        } else {
            $this->error('数据还原失败！');
        }
    }
    //删除数据备份
    public function deletebak() {
        set_time_limit(0);                                                      //不超时
        ini_set('memory_limit','800M');
        $this->config = array( 
            'path' => C('DB_BACKUP'),                                           //备份文件存在哪里
            'isCompress' => 0,                                                  //是否开启gzip压缩      【未测试】
            'isDownload' => 0                                                   //备份完成后是否下载文件 【未测试】
        );
        $filename = $_GET['file'].'.sql';
        $fm = $this->trimPath($this->config['path'] . $this->dir_sep . $filename);
        if (is_file($fm)) {
            if (unlink($fm)) {
                $this->success('删除备份成功！');
            } else {
                $this->error('删除备份失败！');
            }
        }else{
            $this->error('删除备份失败,文件不存在！');
        }

    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 还原数据调用方法
     * +------------------------------------------------------------------------
     * * @ $fileName 文件名
     * +------------------------------------------------------------------------
     */
    private function recover_file($fileName,$url) {
        $this->getFile($fileName,$url); // 获取文件
        if (!empty($this->content)) {
            $content = explode(';/* MySQLReback Separation */', $this->content);
            foreach ($content as $i => $sql) {
                $sql = trim($sql);
                if (!empty($sql)) {
                    $mes = M()->execute($sql);
                    if (false === $mes) {                                       //如果 null 写入失败，换成 ''
                        $table_change = array('null' => '\'\'');
                        $sql = strtr($sql, $table_change);
                        $mes = M()->execute($sql);
                    }
                    if (false === $mes) {                                       //如果遇到错误、记录错误
                        $log_text = '以下代码还原遇到问题:';
                        $log_text.="\r\n $sql";
                        set_log($log_text);
                    }
                }
            }
        } else {
            $this->error('无法读取备份文件!');
        }
        return true;
    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 读取备份文件
     * +------------------------------------------------------------------------
     * * @ $fileName 文件名
     * +------------------------------------------------------------------------
     */
    private function getFile($fileName,$url) {
        $this->content = '';
        set_time_limit(0);                                                      //不超时
        ini_set('memory_limit','800M');
        $this->config = array( 
            'path' => $url,                                           //备份文件存在哪里
            'isCompress' => 0,                                                  //是否开启gzip压缩      【未测试】
            'isDownload' => 0                                                   //备份完成后是否下载文件 【未测试】
        );
        $fileName = $this->trimPath($this->config['path'] . $this->dir_sep . $fileName);
        if (is_file($fileName)) {
            $ext = strrchr($fileName, '.');
            if ($ext == '.sql') {
                $this->content = file_get_contents($fileName);
            } elseif ($ext == '.gz') {
                $this->content = implode('', gzfile($fileName));
            } else {
                $this->error('无法识别的文件格式!');
            }
        } else {
            $this->error('文件不存在!');
        }
    }

     /* -
     * +------------------------------------------------------------------------
     * * @ 把数据写入磁盘
     * +------------------------------------------------------------------------
     */
    private function setFile() {
        $recognize = '';
        $recognize = C('DB_NAME');
        $fileName = $this->trimPath($this->config['path'] . $this->dir_sep . $recognize . '_' . date('YmdHis') . '_' . mt_rand(100000000, 999999999) . '.sql');
        $path = $this->setPath($fileName);
        if ($path !== true) {
            $this->error("无法创建备份目录目录 '$path'");
        }
        if ($this->config['isCompress'] == 0) {
            if (!file_put_contents($fileName, $this->content, LOCK_EX)) {
                $this->error('写入文件失败,请检查磁盘空间或者权限!');
            }
        } else {
            if (function_exists('gzwrite')) {
                $fileName .= '.gz';
                if ($gz = gzopen($fileName, 'wb')) {
                    gzwrite($gz, $this->content);
                    gzclose($gz);
                } else {
                    $this->error('写入文件失败,请检查磁盘空间或者权限!');
                }
            } else {
                $this->error('没有开启gzip扩展!');
            }
        }
        if ($this->config['isDownload']) {
            $this->downloadFile($fileName);
        }
    }
    private function trimPath($path) {
        return str_replace(array('/', '\\', '//', '\\\\'), $this->dir_sep, $path);
    }

    private function setPath($fileName) {
        $dirs = explode($this->dir_sep, dirname($fileName));
        $tmp = '';
        foreach ($dirs as $dir) {
            $tmp .= $dir . $this->dir_sep;
            if (!file_exists($tmp) && !@mkdir($tmp, 0777)){
                return false;
            }
        }
        return true;
    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 把传过来的数据 按指定长度分割成数组
     * +------------------------------------------------------------------------
     * * @ $array 要分割的数据
     * * @ $byte  要分割的长度
     * +------------------------------------------------------------------------
     * * @ 把数组按指定长度分割,并返回分割后的数组
     * +------------------------------------------------------------------------
     */
    private function chunkArrayByByte($array, $byte = 5120) {
        $i = 0;
        $sum = 0;
        $return = array();
        foreach ($array as $v) {
            $sum += strlen($v);
            if ($sum < $byte) {
                $return[$i][] = $v;
            } elseif ($sum == $byte) {
                $return[++$i][] = $v;
                $sum = 0;
            } else {
                $return[++$i][] = $v;
                $i++;
                $sum = 0;
            }
        }
        return $return;
    }
    /* -
     * +------------------------------------------------------------------------
     * * @ 给字符串添加 ` `
     * +------------------------------------------------------------------------
     * * @ $str 字符串
     * +------------------------------------------------------------------------
     * * @ 返回 `$str`
     * +------------------------------------------------------------------------
     */
    private function backquote($str) {
        return "`{$str}`";
    }

    public function backlist(){
        $file = getFileList(C('DB_BACKUP'));
        
        $this->assign('backlist' ,$file);
        $this->display();
    }




















 }
 ?>
