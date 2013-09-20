<?php
	class CoordenadorDAO extends DAO {
		public function selectArea($id_usuario) {
			try {
				$this->stmt = $this->db->prepare("SELECT prof_area.ref_id_area FROM prof_area, usuario, pessoas, professores WHERE prof_area.ref_id_prof = professores.id AND professores.ref_professor = pessoas.id AND pessoas.id = usuario.id AND usuario.id = :id_usuario");
				$this->stmt->bindValue(':id_usuario', $id_usuario);
				$this->stmt->execute();
				$id=0;
				while($obj = $this->stmt->fetchObject()) {
					$id = $obj->ref_id_area;
				}
				return $id;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
	}
?>