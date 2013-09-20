<?php
	FB::info('Route Loaded');
	class Route {
			
		private $url;
		private $controller;
		private $action;
		private $parameters;
		protected $session;
		
		public function __construct() {
			$this->setUrl();
			$this->setController();
			$this->setAction();
			$this->setParameters();
			$this->session = new Session;
		}
		private function setUrl() {
			$this->url = explode('/', $_SERVER['REQUEST_URI']);
			if ($this->url[0] == '')
				array_shift($this->url);
			if (end($this->url) == '')
				array_pop($this->url);
		}
		private function setController() {
			if(isset($this->url[0]) && $this->url[0] != '')
				$this->controller = $this->url[0].'Controller';
			else
				$this->controller = 'indexController';
		}
		private function setAction() {
			if(isset($this->url[1]) && $this->url[1] != '')
				$this->action = $this->url[1];
			else
				$this->action = 'indexAction';
		}
		private function setParameters() {
			unset($this->url[0], $this->url[1]);
			if(!empty($this->url) && count($this->url) % 2 == 0) {
				for($i=2; $i <= count($this->url); $i=$i+2)
					$this->parameters[$this->url[$i]] = $this->url[$i+1];
			} else
				$this->parameters = array();
		}
		public function get($name=null) {
			if($name != null)
				return $this->parameters[$name];
			else
				return $this->parameters;
		}
		public function run() {
			if(file_exists(PATH_CONTROLLER.$this->controller.'.php')) {
				require(PATH_CONTROLLER.$this->controller.'.php');
				$app = new $this->controller;
				if(method_exists($app, $this->action)) {
					$action = $this->action;
					$app->$action();
				} else {
					$app = new Controller;
					$app->view('page404');
				}
			} else {
				$app = new Controller;
				$app->view('page404');
			}
		}
	}
?>