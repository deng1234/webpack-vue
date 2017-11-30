<?php
	class Common {
		/**
		 * 输出json格式的数据
		 * @param  [type] $errorCode [错误编码]
		 * @param  [type] $data      [数据]
		 */
		public static function output($errorCode, $data=null) {
			echo json_encode(array(
				'errCode' => $errorCode,
				'data' => $data
			),JSON_UNESCAPED_UNICODE);
		}
		/**
		 * 生产cookie的函数
		 * @param [type] $key   [cookie名称]
		 * @param [type] $value [cookie的值]
		 * @param [type] $time  [cookie过期时间]
		 */
		public static function setCookie($key, $value, $time) {
			$_COOKIE[$key] = $value;
			setcookie($key, $value, time()+$time);
		}
		/**
		 * 获取cookie
		 * @param  [type] $key [通过键来获取]
		 */
		public static function getCookie($key) {
			return $_COOKIE[$key];
		}
	}
?>