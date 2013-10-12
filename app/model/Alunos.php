<?php
	class Alunos{
		private $id;
		private $prontuario;
		private $departamento;
		private $nome;
		private $dt_nasc;
		private $email;
		private $fone;
		private $celular;

		public function setId($value){
			$this->id = $value;
		}
		public function getId(){
			return $this->id;
		}
		public function setProntuario($value){
			$this->prontuario = $value;
		}
		public function getProntuario(){
			return $this->prontuario;
		}
		public function setDepartamento($value){
			$this->departamento = $value;
		}
		public function getDepartamento(){
			return $this->departamento;
		}
		public function setNome($value){
			$this->nome = $value;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setDtNasc($value){
			$this->dt_nas = $value;
		}
		public function getDtNasc(){
			return $this->dt_nasc;
		}
		public function setEmail($value){
			$this->email = $value;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setFone($value){
			$this->fone = $value;
		}
		public function getFone(){
			return $this->fone;
		}
		public function setCelular($value){
			$this->fone = $value;
		}
		public function getCelular(){
			return $this->celular;
		}
	}
?>
