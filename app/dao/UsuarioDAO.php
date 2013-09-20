<?php
	class UsuarioDAO extends DAO {
		
		public function select($usuario) {
			$this->stmt = $this->db->prepare("SELECT * FROM usuario WHERE id = :id");
			$this->stmt->bindValue(':id', $usuario->getId());
			$this->stmt->execute();
			while($obj = $this->stmt->fetchObject()) {
				$usuario->setNome($obj->nome);
			}
			return $usuario;
		}
	
	}
?>