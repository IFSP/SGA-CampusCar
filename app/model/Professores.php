<?php
	class Professores {
		private $id;
		private $ref_professor;
		private $ref_departamento;
		private $dt_ingresso;
		private $nome;
		private $area;
		private $prontuario;
		private $email;
		private $fone;
		private $celular;
		
		public function setId($value) {
			$this->id = $value;
		}
		public function getId() {
			return $this->id;
		}
		public function setRefProfessor($value) {
			$this->ref_professor = $value;
		}
		public function setRefDepartamento($value) {
			$this->ref_departamento = $value;
		}
		public function setNome($value) {
			$this->nome = $value;
		}
		public function setArea($value) {
			$this->area = $value;
		}
		public function setProntuario($value) {
			$this->prontuario = $value;
		}
		public function setEmail($value) {
			$this->email = $value;
		}
		public function setFone($value) {
			$this->fone = $value;
		}
		public function setCelular($value) {
			$this->celular = $value;
		}
		public function getRefProfessor() {
			return $this->ref_professor;
		}
		public function getRefDepartamento() {
			return $this->ref_departamento;
		}
		public function setDtIngresso($value) {
			$this->dt_ingresso = $value;
		}
		public function getDtIngresso() {
			return $this->dt_ingresso;
		}
		public function getNome() {
			return $this->nome;
		}
		public function getArea() {
			return $this->area;
		}
		public function getProntuario() {
			return $this->prontuario;
		}
		public function getEmail() {
			return $this->email;
		}
		public function getFone() {
			return $this->fone;
		}
		public function getCelular() {
			return $this->celular;
		}
	}
?>