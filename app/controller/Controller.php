<?php
	class Controller extends Route {
		public function view($page) {
			require(PATH_VIEW.$page.'.php');
			exit;
		}
	}
?>