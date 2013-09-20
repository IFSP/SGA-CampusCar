<?php
	class HorariosFORDAO extends DAO {
		public function insert($horarios_for) {
			try {
				$this->stmt = $this->db->prepare("INSERT INTO horarios_for(ref_id_for, ref_id_horario, ref_id_disc) VALUES(:ref_id_for, :ref_id_horario, :ref_id_disc)");
				$this->stmt->bindValue(':ref_id_for', $horarios_for->getRefIdFor());
				$this->stmt->bindValue(':ref_id_horario', $horarios_for->getRefIdHorario());
				if($horarios_for->getRefIdDisc() == '')
					$this->stmt->bindValue(':ref_id_disc', null);
				else
					$this->stmt->bindValue(':ref_id_disc', $horarios_for->getRefIdDisc());
				$this->stmt->execute();
				return true;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function delete($id_for) {
			try {
				$this->stmt = $this->db->prepare("DELETE FROM horarios_for WHERE ref_id_for = :ref_id_for");
				$this->stmt->bindValue(':ref_id_for', $id_for);
				$this->stmt->execute();
				return true;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function select($id_for) {
			try {
				$this->stmt = $this->db->prepare("SELECT ref_id_horario, ref_id_disc FROM horarios_for WHERE ref_id_for = :ref_id_for");
				$this->stmt->bindValue(':ref_id_for', $id_for);
				$this->stmt->execute();
				$horarios_for = array();
				while($obj = $this->stmt->fetchObject()) {
					if($obj->ref_id_disc == '')
						$horarios_for[$obj->ref_id_horario] = 'true';
					else
						$horarios_for[$obj->ref_id_horario] = $obj->ref_id_disc;
				}
				return $horarios_for;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
	}
?>