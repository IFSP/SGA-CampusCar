<?php
    /**
     * 
     */
    class CursosASPDAO extends DAO {
        
        public function selectCursoByPeriodoByProfessor($idPeriodo, $idProfessor) {
			try {
				$this->stmt = $this->db->prepare("SELECT * from Curso WHERE periodos.id = :idPeriodo AND professores.id = :idProfessor");
				$this->stmt->bindValue(':idPeriodo', $idPeriodo);
				$this->stmt->bindValue(':idProfessor', $idProfessor);
				$this->stmt->execute();
				$i = 0;
				while($obj = $this->stmt->fetchObject()) {
					$cursos_asp[$i] = new Cursos;
					$cursos_asp[$i]->setIdDoCurso($obj->id);
					$cursos_asp[$i]->setNomeDoCurso($obj->nome); //precisa verificar o nome dos campos usados no banco
					$i++;
				}
				return $cursos_asp;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
				
    }
    
?>