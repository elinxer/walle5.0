<?php
return array(
	/*  sql configuration */
	'DB_TYPE' => 'mysql',
	'DB_HOST' => 'localhost',
	'DB_NAME' => 'walle',
	'DB_USER' => 'root',
	'DB_PWD'  => 'root',
	'DB_PORT' => '3306',
	'DB_PREFIX' => 'walle_',
	'DB_CHARSET' => 'utf8',

	// 配置邮件发送服务器
    'MAIL_SMTP'                     =>TRUE, //开启SMTP
    'MAIL_HOST'                     =>'smtp.qq.com', //邮件服务器
    'MAIL_SMTPAUTH'                 =>TRUE,	
    'MAIL_USERNAME'                 =>'654753115@qq.com', //服务器账户名
    'MAIL_PASSWORD'                 =>'a654753115',	//密码
    'MAIL_SECURE'                   =>'tls',	//安全协议
    'MAIL_CHARSET'                  =>'utf-8',	//格式编码
    'MAIL_ISHTML'                   =>TRUE,		//开启html形式
    'MAIL_PORT'						=>25,		//端口
);