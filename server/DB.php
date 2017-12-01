<?php
	/**
	 * 数据连接,返回资源句柄
	 */
	$dbms='mysql';     //数据库类型
	$host='localhost'; //数据库主机名
	$dbName='Exam';    //使用的数据库
	$user='root';      //数据库连接用户名
	$pass='root.';      //对应的密码
	$dsn="$dbms:host=$host;dbname=$dbName";
	try {
		//初始化一个PDO对象
	    $con = new PDO($dsn, $user, $pass);
	    $con->query("SET NAMES utf8");
	} catch (PDOException $e) {
	    die ("Error!: " . $e->getMessage() . "<br/>");
	}
	return $con;
?>