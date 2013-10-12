<?php
	class DisciplinasDAO extends DAO {
		public function select() {
			try {
				$this->stmt = $this->db->prepare("SELECT id, descricao_disciplina, descricao_extenso FROM disciplinas ORDER BY descricao_disciplina");
				$this->stmt->execute();
				$i=0;
				while($obj = $this->stmt->fetchObject()) {
					$disciplinas[$i] = new Disciplinas;
					$disciplinas[$i]->setId($obj->id);
					$disciplinas[$i]->setDescricaoDisciplina($obj->descricao_disciplina);
					$disciplinas[$i]->setDescricaoExtenso($obj->descricao_extenso);
					$i++;
				}
				return $disciplinas;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		
		public function select() {
			try {
				$this->stmt = $this->db->prepare("SELECT id, descricao_disciplina, descricao_extenso FROM disciplinas ORDER BY descricao_disciplina");
				$this->stmt->execute();
				$i=0;
				while($obj = $this->stmt->fetchObject()) {
					$disciplinas[$i] = new Disciplinas;
					$disciplinas[$i]->setId($obj->id);
					$disciplinas[$i]->setDescricaoDisciplina($obj->descricao_disciplina);
					$disciplinas[$i]->setDescricaoExtenso($obj->descricao_extenso);
					$i++;
				}
				return $disciplinas;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
	}
?>