<?php
	class DAO {
		protected $db;
		protected $stmt;
		
		function __construct() {
			try {
				$this->db = new PDO("pgsql:dbname=".DB_NAME."; user=".DB_USER."; password=".DB_PASS."; host=".DB_HOST."; port=".DB_PORT);
				$this->db->exec("SET NAMES 'UTF8'");
				$this->startException();
			} catch(PDOException $e) {
				echo($e->getMessage());
				$controller = new Controller;
				$controller->view('page-error');
				
				FB::info($e->getMessage(), 'Error Database: ');
				
			}
			
		}
		
		public function startTransaction() {
            $this->db->beginTransaction();
		}
		public function rollback() {
			$this->db->rollback();
		}
		public function commit() {
			$this->db->commit();
		}
		protected function startException() {
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}