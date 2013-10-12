<?php
    class Cursos{
    	private $idDoCurso;
    	private $nomeDoCurso;
		
		public function getNomeDoCurso(){
			return $nomeDoCurso;
		}
		
		public function setNomeDoCurso($nome){
			$nomeDoCurso = $nome;
		}
		
		public function getIdDoCurso(){
			return $idDoCurso;
		}
		
		public function setIdDoCurso($id){
			$idDoCurso = id;
		}
    }
?>