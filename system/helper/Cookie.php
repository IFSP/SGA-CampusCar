<?php
	class Cookie {
		public function set($name, $value, $time=null) {
			if($time == null)
				$time = 3600;
			else
				$time = 3600 * 24 * $time;
			setcookie($name, $value, time()+$time, '/', null, null, true);
		}
		public function get($name) {
			if(isset($_COOKIE[$name]))
				return $_COOKIE[$name];
			else
				return false;
		}
		public function remove($name) {
			if (setcookie($name, '', -1, '/'))
				return true;
			else
				return false;
		}
		public function check($name) {
			return isset($_COOKIE[$name]);
		}
	}
?>

