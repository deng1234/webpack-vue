<?php
	/**
	 * 错误编码
	 */
	class ErrorMsg {
		//姓名为空
		const USERNAME_EMPTY = "姓名不能为空";  
		//学号长度不正确
		const STUDENTID_LENGTH = "学号长度不正确";
		//登录错误
		const LOGIN_ERROR = "姓名和学号不匹配";
		//获取题目失败
		const GETQUESTION_FAIL = "获取题目失败";
		//已经参加考试
		const FINISH_EXAM = "您已经参加该考试";
		//提交成绩失败
		const POST_SCORE = "提交成绩失败";
		//成绩不合法
		const FALSE_SCORE = "成绩不合法";
	}
?>