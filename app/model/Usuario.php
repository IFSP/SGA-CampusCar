<?php
	class Usuario {
		private $id;
		private $nome;
		private $ref_campus;
		private $ref_pessoa;
		private $ref_setor;
		private $senha;
		private $ativado;
		//Set's
		public function setId($value) {
			$this->id = $value;
		}
		public function setNome($value) {
			$this->nome = $value;
		}
		public function setRefCampus($value) {
			$this->ref_campus = $value;
		}
		public function setRefPessoa($value) {
			$this->ref_pessoa = $value;
		}
		public function setRefSetor($value) {
			$this->ref_setor = $value;
		}
		public function setSenha($value) {
			$this->senha = $value;
		}
		public function setAtivado($value) {
			$this->ativado = $value;
		}
		//Get's
		public function getId() {
			return $this->id;
		}
		public function getNome() {
			return $this->nome;
		}
		public function getRefCampus() {
			return $this->ref_campus;
		}
		public function getRefPessoa() {
			return $this->ref_pessoa;
		}
		public function getRefSetor() {
			return $this->ref_setor;
		}
		public function getSenha() {
			return $this->senha;
		}
		public function getAtivado() {
			return $this->ativado;
		}
	}
?>