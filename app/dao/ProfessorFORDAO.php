<?php
	class ProfessorFORDAO extends DAO {
		public function insert($professor_for) {
			try {
				$this->stmt = $this->db->prepare("INSERT INTO professor_for(ref_id_professor, data_semestre, data_ano, status)  VALUES(:ref_id_professor, :data_semestre, :data_ano, :status)");
				$this->stmt->bindValue(':ref_id_professor', $professor_for->getRefIdProfessor());
				$this->stmt->bindValue(':data_semestre', $professor_for->getDataSemestre());
				$this->stmt->bindValue(':data_ano', $professor_for->getDataAno());
				$this->stmt->bindValue(':status', $professor_for->getStatus());
				$this->stmt->execute();
				return true;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function selectByProfessor($professor_for) {
			try {
				if($professor_for->getDataAno() && $professor_for->getDataSemestre())
					$sql = "SELECT professor_for.id, professor_for.data_ano, professor_for.data_semestre, professor_for.status FROM professor_for, usuario, professores, pessoas WHERE usuario.ref_pessoa = pessoas.id AND professores.ref_professor = pessoas.id AND professor_for.ref_id_professor = professores.id AND usuario.id = :id_usuario AND professor_for.data_semestre = :data_semestre AND professor_for.data_ano = :data_ano ORDER BY professor_for.id";
				else
					$sql = "SELECT professor_for.id, professor_for.data_ano, professor_for.data_semestre, professor_for.status FROM professor_for, usuario, professores, pessoas WHERE usuario.ref_pessoa = pessoas.id AND professores.ref_professor = pessoas.id AND professor_for.ref_id_professor = professores.id AND usuario.id = :id_usuario ORDER BY professor_for.data_ano DESC, professor_for.data_semestre DESC";
				$this->stmt = $this->db->prepare($sql);
				$this->stmt->bindValue(':id_usuario', $professor_for->getRefIdProfessor());
				if($professor_for->getDataAno())
					$this->stmt->bindValue(':data_semestre', $professor_for->getDataSemestre());
				if($professor_for->getDataSemestre())
					$this->stmt->bindValue(':data_ano', $professor_for->getDataAno());
				$this->stmt->execute();
				$professor_for = array();
				$i=0;
				while($obj = $this->stmt->fetchObject()) {
					$professor_for[$i] = new ProfessorFOR;
					$professor_for[$i]->setId($obj->id);
					$professor_for[$i]->setDataAno($obj->data_ano);
					$professor_for[$i]->setDataSemestre($obj->data_semestre);
					$professor_for[$i]->setStatus($obj->status);
					$i++;
				}
				return $professor_for;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function selectDadosProfessor($professores, $professor_for, $confirmar=null, $nostatus=null) {
			if($nostatus == null) {
				if($confirmar != null)
					$param = ' AND professor_for.status = 2';
				else
					$param = ' AND professor_for.status <= 1';
			} else
				$param = '';
			try {
				$sql = "SELECT professores.id, professor_for.reg_trabalho, professor_for.status, professor_for.data_ano, professor_for.data_semestre, pessoas.nome, pessoa_prontuario_campus.prontuario, areas_ensino_prof.area_desc, pessoas.email, pessoas.fone_profissional, pessoas.fone_celular
				FROM professor_for, usuario, professores, pessoas, pessoa_prontuario_campus, prof_area, areas_ensino_prof 
				WHERE usuario.ref_pessoa = pessoas.id AND professores.ref_professor = pessoas.id AND prof_area.ref_id_prof = professores.id AND prof_area.ref_id_area = areas_ensino_prof.area_id 
				AND professor_for.ref_id_professor = professores.id AND pessoa_prontuario_campus.ref_pessoa = pessoas.id
				AND usuario.id = :id_usuario AND professor_for.id = :id_professor_for $param";
				$this->stmt = $this->db->prepare($sql);
				$this->stmt->bindValue(':id_usuario', $professores->getId());
				$this->stmt->bindValue(':id_professor_for', $professor_for->getId());
				$this->stmt->execute();
				$professores = new Professores;
				$professor_for = new ProfessorFOR;
				while($obj = $this->stmt->fetchObject()) {
					$professores->setId($obj->id);
					$professores->setNome($obj->nome);
					$professores->setProntuario($obj->prontuario);
					$professores->setArea($obj->area_desc);
					$professores->setEmail($obj->email);
					$professores->setFone($obj->fone_profissional);
					$professores->setCelular($obj->fone_celular);
					$professor_for->setStatus($obj->status);
					$professor_for->setRegTrabalho($obj->reg_trabalho);
					$professor_for->setDataAno($obj->data_ano);
					$professor_for->setDataSemestre($obj->data_semestre);
				}
				$objetos['professores'] = $professores;
				$objetos['professor_for'] = $professor_for;
				return $objetos;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function update($professor_for) {
			try {
				$this->stmt = $this->db->prepare("UPDATE professor_for SET reg_trabalho = :reg_trabalho, status = :status WHERE id = :id");
				$this->stmt->bindValue(':reg_trabalho', $professor_for->getRegTrabalho());
				$this->stmt->bindValue(':status', $professor_for->getStatus());
				$this->stmt->bindValue(':id', $professor_for->getId());
				$this->stmt->execute();
				return true;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function selectByCoordenador($professor_for, $id_area) {
			try {
				$sql = "SELECT professor_for.id, pessoas.nome, professor_for.status FROM professor_for, professores, pessoas, prof_area WHERE professores.ref_professor = pessoas.id AND professor_for.ref_id_professor = professores.id AND prof_area.ref_id_prof = professores.id AND prof_area.ref_id_area = :id_area AND professor_for.data_semestre = :data_semestre AND professor_for.data_ano = :data_ano ORDER BY professor_for.id";
				$this->stmt = $this->db->prepare($sql);
				$this->stmt->bindValue(':id_area', $id_area);
				$this->stmt->bindValue(':data_semestre', $professor_for->getDataSemestre());
				$this->stmt->bindValue(':data_ano', $professor_for->getDataAno());
				$this->stmt->execute();
				$professor_for = array();
				$professores = array();
				$i=0;
				while($obj = $this->stmt->fetchObject()) {
					$professor_for[$i] = new ProfessorFOR;
					$professores[$i] = new Professores;
					$professor_for[$i]->setId($obj->id);
					$professores[$i]->setNome($obj->nome);
					$professor_for[$i]->setStatus($obj->status);
					$i++;
				}
				$objetos['professores'] = $professores;
				$objetos['professor_for'] = $professor_for;
				return $objetos;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function selectDadosProfessorByCoordenador($professores, $professor_for, $nostatus=null) {
			if($nostatus == null)
				$nostatus = 'AND (professor_for.status = 1 OR professor_for.status = 2 OR professor_for.status = 3)';
			else
				$nostatus = '';
			try {
				$sql = "SELECT professores.id, professor_for.reg_trabalho, professor_for.status, professor_for.data_ano, professor_for.data_semestre, pessoas.nome, pessoa_prontuario_campus.prontuario, areas_ensino_prof.area_desc, pessoas.email, pessoas.fone_profissional, pessoas.fone_celular
				FROM professor_for, professores, pessoas, pessoa_prontuario_campus, prof_area, areas_ensino_prof 
				WHERE professores.ref_professor = pessoas.id AND prof_area.ref_id_prof = professores.id AND prof_area.ref_id_area = areas_ensino_prof.area_id 
				AND professor_for.ref_id_professor = professores.id AND pessoa_prontuario_campus.ref_pessoa = pessoas.id
				AND areas_ensino_prof.area_id = :id_area AND professor_for.id = :id_professor_for $nostatus";
				$this->stmt = $this->db->prepare($sql);
				$this->stmt->bindValue(':id_area', $professores->getArea());
				$this->stmt->bindValue(':id_professor_for', $professor_for->getId());
				$this->stmt->execute();
				$professores = new Professores;
				$professor_for = new ProfessorFOR;
				while($obj = $this->stmt->fetchObject()) {
					$professores->setId($obj->id);
					$professores->setNome($obj->nome);
					$professores->setProntuario($obj->prontuario);
					$professores->setArea($obj->area_desc);
					$professores->setEmail($obj->email);
					$professores->setFone($obj->fone_profissional);
					$professores->setCelular($obj->fone_celular);
					$professor_for->setStatus($obj->status);
					$professor_for->setRegTrabalho($obj->reg_trabalho);
					$professor_for->setDataAno($obj->data_ano);
					$professor_for->setDataSemestre($obj->data_semestre);
				}
				$objetos['professores'] = $professores;
				$objetos['professor_for'] = $professor_for;
				return $objetos;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function selectViaCaeGae($professor_for) {
			try {
				if($professor_for->getDataAno() && $professor_for->getDataSemestre())
					$sql = "SELECT professor_for.id, pessoas.nome, professor_for.data_ano, professor_for.data_semestre, professor_for.status FROM professor_for, professores, pessoas WHERE professores.ref_professor = pessoas.id AND professor_for.ref_id_professor = professores.id AND professor_for.data_semestre = :data_semestre AND professor_for.data_ano = :data_ano ORDER BY professor_for.id";
				else
					$sql = "SELECT professor_for.id, pessoas.nome, professor_for.data_ano, professor_for.data_semestre, professor_for.status FROM professor_for,  professores, pessoas WHERE professores.ref_professor = pessoas.id AND professor_for.ref_id_professor = professores.id ORDER BY professor_for.id";
				$this->stmt = $this->db->prepare($sql);
				if($professor_for->getDataAno())
					$this->stmt->bindValue(':data_semestre', $professor_for->getDataSemestre());
				if($professor_for->getDataSemestre())
					$this->stmt->bindValue(':data_ano', $professor_for->getDataAno());
				$this->stmt->execute();
				$professor_for = array();
				$professores = array();
				$i=0;
				while($obj = $this->stmt->fetchObject()) {
					$professor_for[$i] = new ProfessorFOR;
					$professores[$i] = new Professores;
					$professor_for[$i]->setId($obj->id);
					$professor_for[$i]->setDataAno($obj->data_ano);
					$professor_for[$i]->setDataSemestre($obj->data_semestre);
					$professor_for[$i]->setStatus($obj->status);
					$professores[$i]->setNome($obj->nome);
					$i++;
				}
				$objetos['professores'] = $professores;
				$objetos['professor_for'] = $professor_for;
				return $objetos;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
		public function selectDadosProfessorByCaeGae($professor_for, $nostatus=null) {
			if($nostatus == null)
				$status = 'AND (professor_for.status = 3)';
			else
				$status = '';
			try {
				$sql = "SELECT professores.id, professor_for.reg_trabalho, professor_for.status, professor_for.data_ano, professor_for.data_semestre, pessoas.nome, pessoa_prontuario_campus.prontuario, areas_ensino_prof.area_desc, pessoas.email, pessoas.fone_profissional, pessoas.fone_celular
				FROM professor_for, professores, pessoas, pessoa_prontuario_campus, prof_area, areas_ensino_prof 
				WHERE professores.ref_professor = pessoas.id AND prof_area.ref_id_prof = professores.id AND prof_area.ref_id_area = areas_ensino_prof.area_id 
				AND professor_for.ref_id_professor = professores.id AND pessoa_prontuario_campus.ref_pessoa = pessoas.id
				AND professor_for.id = :id_professor_for $status";
				$this->stmt = $this->db->prepare($sql);
				$this->stmt->bindValue(':id_professor_for', $professor_for->getId());
				$this->stmt->execute();
				$professor_for = new ProfessorFOR;
				$professores = new Professores;
				while($obj = $this->stmt->fetchObject()) {
					$professores->setId($obj->id);
					$professores->setNome($obj->nome);
					$professores->setProntuario($obj->prontuario);
					$professores->setArea($obj->area_desc);
					$professores->setEmail($obj->email);
					$professores->setFone($obj->fone_profissional);
					$professores->setCelular($obj->fone_celular);
					$professor_for->setStatus($obj->status);
					$professor_for->setRegTrabalho($obj->reg_trabalho);
					$professor_for->setDataAno($obj->data_ano);
					$professor_for->setDataSemestre($obj->data_semestre);
				}
				$objetos['professores'] = $professores;
				$objetos['professor_for'] = $professor_for;
				return $objetos;
			} catch(PDOException $e) {
				FB::info($e->getMessage());
				return false;
			}
		}
	}
?>