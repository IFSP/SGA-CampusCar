<?php
	class IndexController extends Controller {
			
		public function indexAction() {
			if($this->session->check('user_id')) {
				require(PATH_VIEW.'index.php');
				exit;
			} else
				header('Location: /login');
		}
	}
	
?>