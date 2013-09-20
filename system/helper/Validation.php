<?php
	class Validation {
		public function maxLength($value, $number) {
			if (strlen($value) <= $number)
				return true;
			else
				return false;
		}
		public function minLength($value, $number) {
			if(strlen($value) >= $number)
				return true;
			else
				return false;
		}
		public function onlyLetters($value) {
			if(preg_match('/^[a-zA-ZÁ-ú\d ]{0,}$/', $value))
				return true;
			else
				return false;
		}
		public function onlyNumbers($value) {
			if(preg_match('/^[0-9]{0,}$/', $value))
				return true;
			else
				return false;
		}
		public function onlyLettersNumbers($value) {
			if(preg_match('/^[a-zA-ZÁ-ú0-9\d]{0,}$/', $value))
				return true;
			else
				return false;
		}
		public function onlyLettersNumbersNoAccent($value) {
			if(preg_match('/^[a-zA-Z0-9\d]{0,}$/', $value))
				return true;
			else
				return false;
		}
		public function isMandatory($value) {
			if(trim($value) != '')
				return true;
			else
				return false;
		}
		public function isUser($value) {
			if(preg_match('/^[a-zA-Z0-9\-._d]{0,}$/', $value))
				return true;
			else
				return false;
		}
		public function maxValue($value, $number) {
			if($value >= $number)
				return true;
			else
				return false;
		}
		public function isDate($d, $m, $y) {
			if(checkdate($m, $d, $y))
				return true;
			else
				return false;
		}
		public function isImage($value) {
			if(@getimagesize($value['tmp_name']) != false) {
				$get = getimagesize($value['tmp_name']);
				if($get["mime"] == "image/jpeg")
					return true;
				if($get["mime"] == "image/png")
					return true;
				if($get["mime"] == "image/gif")
					return true;
				else
					return false;
			} else
				return false;
		}
		public function isNumber($value) {
			//filter options
			//FILTER_VALIDATE_INT
			//FILTER_VALIDATE_FLOAT
			//função is_numeric
			$res = filter_var($value, FILTER_VALIDATE_FLOAT);
			if($res != false)
				return true;
			else
				return false;
		}
		public function isEmail($value) {
			//filter options
			//FILTER_VALIDATE_URL
			//FILTER_VALIDATE_IP
			$res = filter_var($value, FILTER_VALIDATE_EMAIL);
			if($res != false)
				return true;
			else
				return false;
		}
		public function isUrl($value) {
			if(filter_var($value, FILTER_VALIDATE_URL))
				return true;
			else
				return false;
		}
		public function isString($value) {
			//Substitui tags html e substitui acentos
			$res = filter_var($value, FILTER_SANITIZE_ENCODED);
			return $res;
		}
	}
?>