<?php
	class Session {
		public function set($name, $value) {
			$_SESSION[$name] = $value;
		}
		public function get($name) {
			if(isset($_SESSION[$name]))
				return $_SESSION[$name];
			else
				return false;
		}
		public function remove($name) {
			if(isset($_SESSION[$name]))
				unset($_SESSION[$name]);
		}
		public function check($name) {
			return isset($_SESSION[$name]);
		}
	}
?>