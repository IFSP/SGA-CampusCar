<?php
	class HorariosFOR {
		private $ref_id_for;
		private $ref_id_horario;
		private $ref_id_disc;
		
		public function setRefIdFor($value) {
			$this->ref_id_for = $value;
		}
		public function setRefIdHorario($value) {
			$this->ref_id_horario = $value;
		}
		public function setRefIdDisc($value) {
			$this->ref_id_disc = $value;
		}
		public function getRefIdFor() {
			return $this->ref_id_for;
		}
		public function getRefIdHorario() {
			return $this->ref_id_horario;
		}
		public function getRefIdDisc() {
			return $this->ref_id_disc;
		}
	}	
?>