<?php
	class UsuarioPapelDAO extends DAO {
		public function selectPapeisByUsuario($id_usuario) {
			$this->stmt = $this->db->prepare("SELECT papel.nome FROM papel INNER JOIN usuario_papel ON papel.papel_id = usuario_papel.ref_papel WHERE usuario_papel.ref_usuario = :id_usuario");
			$this->stmt->bindValue(':id_usuario', $id_usuario);
			$this->stmt->execute();
			$this->stmt->setFetchMode(PDO::FETCH_ASSOC);
			return $this->stmt->fetchAll();
		}
	}
?>