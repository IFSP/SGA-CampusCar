<?php
	class Disciplinas {
		private $id;
		private $descricao_disciplina;
		private $descricao_extenso;
		
		public function setId($value) {
			$this->id = $value;
		}
		public function getId() {
			return $this->id;
		}
		public function setDescricaoDisciplina($value) {
			$this->descricao_disciplina = $value;
		}
		public function getDescricaoDisciplina() {
			return $this->descricao_disciplina;
		}
		public function setDescricaoExtenso($value) {
			$this->descricao_extenso = $value;
		}
		public function getDescricaoExtenso() {
			return $this->descricao_extenso;
		}
	}
?>