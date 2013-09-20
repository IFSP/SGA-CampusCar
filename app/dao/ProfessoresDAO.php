<?php
	class ProfessoresDAO extends DAO {
		public function selectList() {
			$this->stmt = $this->db->prepare("SELECT id FROM professores");
			$this->stmt->execute();
			$i=0;
			while($obj = $this->stmt->fetchObject()) {
				$professores[$i] = new Professores;
				$professores[$i]->setId($obj->id);
				$i++;
			}
			return $professores;
		}
	}
?>