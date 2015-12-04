<?php
namespace Install\Controller;
use Think\Controller;
use Think\Db;
use Think\Storage;

class InstallController extends Controller{

	public $dir_sep = '/';
    public $content;
    public $config = '';

	protected function _initialize(){
		if(session('step') === null){
			$this->redirect('Index/index');
		}
		if(Storage::has(MODULE_PATH . 'Data/install.lock')){
			$this->error('已经成功安装了OneThink，请不要重复安装!');
		}
	}

	//安装第一步，检测运行所需的环境设置
	public function step1(){
		session('error', false);
		//环境检测
		$env = check_env();
		// //目录文件读写检测
		// if(IS_WRITE){
		// 	$dirfile = check_dirfile();
		// 	$this->assign('dirfile', $dirfile);
		// }
		//函数检测
		$func = check_func();
		session('step', 1);
		$this->assign('env', $env);
		$this->assign('func', $func);
		$this->display();
	}

	//安装第二步，创建数据库
	public function step2(){
		// 写入数据库
		$db = array('mysqli' ,'localhost' ,'walle' ,'root' ,'');
		$DB = array();
		list($DB['DB_TYPE'], $DB['DB_HOST'], $DB['DB_NAME'], $DB['DB_USER'], $DB['DB_PWD'],
			 $DB['DB_PORT'], $DB['DB_PREFIX']) = $db;
		//缓存数据库配置
		session('db_config', $DB);

		//创建数据库
		$dbname = $DB['DB_NAME'];
		unset($DB['DB_NAME']);
		$db  = Db::getInstance($DB);
		$sql = "CREATE DATABASE IF NOT EXISTS `{$dbname}` DEFAULT CHARACTER SET utf8";
		$db->execute($sql) || $this->error($db->getError());


		if ($this->recover_file('install.sql')) {
			$this->redirect('Install/Index/complete');
		}

		$this->display();
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
     * * @ 还原数据调用方法
     * +------------------------------------------------------------------------
     * * @ $fileName 文件名
     * +------------------------------------------------------------------------
     */
    private function recover_file($fileName) {
        $this->getFile($fileName); // 获取文件
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
    private function getFile($fileName) {
        $this->content = '';
        set_time_limit(0);                                                      //不超时
        ini_set('memory_limit','800M');
        $this->config = array( 
            'path' => APP_PATH . '/Install/Data/db/',                                           //备份文件存在哪里
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



}
