<?php
	header('Access-Control-Allow-Origin: *');
	header("Content-type: text/html; charset=utf-8");
	//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
	//header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
	require __DIR__.'/User.php';
	require __DIR__.'/Question.php';
	require __DIR__.'/Common.php';
	require __DIR__.'/ErrorMsg.php';
	$con = require __DIR__.'/DB.php';
	$action = @$_POST['action'];
	switch($action) {
		case 'login': 
			try{
				Login($con);
			}catch(Exception $e) {
				Common::output(1,$e->getMessage());
			}
			break;

		case 'getQuestion':
			getQuestion($con);
			break;

		case 'postScore':
			try {
				postScore($con);
			}catch(Exception $e) {
				Common::output(1, $e->getMessage());
			}
			break;

		default:
			break;
	}

	/**
	 * 登录函数
	 * @param [type] $con [数据库连接]
	 */
	function Login($con) {
		$username = $_POST['username'];
		if(empty($username)) {
			throw new Exception(ErrorMsg::USERNAME_EMPTY);
		}
		$studentid = $_POST['studentid'];
		if(strlen($studentid) != 8) {
			throw new Exception(ErrorMsg::STUDENTID_LENGTH);
		}
		$user = new User($con);
		try {
			// 如果登录成功
			$userid = $user->Login($username, $studentid);
			Common::output(0, $userid);
		}catch(Exception $e) {
			Common::output(1, $e->getMessage());
		}
	}

	/**
	 * 获取题目
	 * @param  [type] $con [数据库连接]
	 * @return [type]      [description]
	 */
	function getQuestion($con) {
		$question = new Question($con);
		try {
			$result = $question->getQuestion();
			Common::output(0,$result);
		}catch(Exception $e) {
			Common::output(1, $e->getMessage());
		}
	}

	/**
	 * 提交成绩
	 * @param  [type] $con [数据库连接]
	 * @return [type]      
	 */
	function postScore($con) {
		$userid = $_POST['userid'];
		if(empty($userid)) {
			throw new Exception(ErrorMsg::POST_SCORE);
		}
		$score = $_POST['score'];
		if($score > 100 || $score < 0) {
			throw new Exception(ErrorMsg::FALSE_SCORE);
		}
		$user = new User($con);
		$result = $user->postScore($score, $userid);
		Common::output(0);
	}
?>