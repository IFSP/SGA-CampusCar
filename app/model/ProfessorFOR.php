<?php
	class ProfessorFOR {
		private $id;
		private $ref_id_professor;
		private $reg_trabalho;
		private $inc_titulo;
		private $inc_vinculo;
		private $inc_semestres;
		private $data_semestre;
		private $data_ano;
		private $status;
		private $validation;
		
		function __construct() {
			$this->validation = new Validation;
		}
		public function setId($value) {
			$this->id = $value;
		}
		public function getId() {
			return $this->id;
		}
		public function setRefIdProfessor($value) {
			$this->ref_id_professor = $value;
		}
		public function getRefIdProfessor() {
			return $this->ref_id_professor;
		}
		public function setRegTrabalho($value) {
			$this->reg_trabalho = $value;
		}
		public function getRegTrabalho() {
			return $this->reg_trabalho;
		}
		public function setIncTitulo($value) {
			$this->inc_titulo = $value;
		}
		public function getIncTitulo() {
			return $this->inc_titulo;
		}
		public function setIncVinculo($value) {
			$this->inc_vinculo = $value;
		}
		public function getIncVinculo() {
			return $this->inc_vinculo;
		}
		public function setIncSemestres($value) {
			$this->inc_semestres = $value;
		}
		public function getIncSemestres() {
			return $this->inc_semestres;
		}
		public function setDataSemestre($value) {
			$this->data_semestre = $value;
		}
		public function setDataSemestreValidate($value) {
			if($value == 1 || $value == 2) {
				$this->data_semestre = $value;
				return false;
			} else
				return 'Semestre inválido.';
		}
		public function getDataSemestre() {
			return $this->data_semestre;
		}
		public function setDataAno($value) {
			$this->data_ano = $value;
		}
		public function setDataAnoValidate($value) {
			if($this->validation->isDate('01', '01', $value)) {
				$this->data_ano = $value;
				return false;
			} else
				return 'Ano inválido.';
		}
		public function getDataAno() {
			return $this->data_ano;
		}
		public function setStatus($value) {
			$this->status = $value;
		}
		public function getStatus() {
			return $this->status;
		}
	}
?>