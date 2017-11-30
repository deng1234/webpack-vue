<?php
	/**
	 * 用户类
	 */
	class User {
		private $con;
		public function __construct($con) {
			$this->con = $con;
		}

		/**
		 * [登录功能]
		 * @param [type] $username  [姓名]
		 * @param [type] $studentid [学号]
		 */
		public function Login($username, $studentid) {
			$sql = "SELECT userid, finish FROM  `Users` WHERE `username`=:username AND `studentid`=:studentid ";
			$pst = $this->con->prepare($sql);
			$pst->bindParam(":username", $username);
			$pst->bindParam(":studentid", $studentid);
			
			$pst->execute();
			$result = $pst->fetch(PDO::FETCH_ASSOC);
			if(empty($result)) {
				throw new Exception(ErrorMsg::LOGIN_ERROR);
			}
			//已经完成考试
			if($result['finish'] == 1) {
				throw new Exception(ErrorMsg::FINISH_EXAM);
			}
			return $result['userid']; 
		}

		public function postScore($score, $userid) {
			$sql = "UPDATE Users SET `score`=:score,`finish`=1 WHERE `userid`=:userid";
			$pst = $this->con->prepare($sql);
			$pst->bindParam(":score", $score);
			$pst->bindParam(":userid", $userid);
			$result = $pst->execute();
			if(empty($result)) {
				throw new Exception(ErrorMsg::POST_SCORE);
			}
			return $result;
		}
	}
?>