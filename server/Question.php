<?php
	class Question {
		private $con;

		public function __construct($con) {
			$this->con = $con;
		}

		/**
		 * 随机获取40道题目
		 * @return [type] [获取题目的结果集]
		 */
		public function getQuestion() {
			$sql = "SELECT problem, optionA, optionB, optionC, optionD, answer FROM `ExamQuestion` ORDER BY RAND() LIMIT 50";
			$pst = $this->con->prepare($sql);
			$pst->execute();
			$result = $pst->fetchAll(PDO::FETCH_ASSOC);
			if(empty($result)) {
				throw new Exception(ErrorMsg::GETQUESTION_FAIL);
			}
			return $result;
		}
	}
?>