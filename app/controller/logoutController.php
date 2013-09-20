<?php
	class LogoutController extends Controller {
		public function indexAction() {
			$this->session->remove('user_id');
			$this->session->remove('user_nome');
			unset($_SESSION['user_papeis']);
			header('Location: /');
		}
	}
?>
