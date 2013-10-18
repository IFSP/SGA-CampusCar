<?php
class MensagemASP {
	private $dtMensagem;
	// data de envio da mensagem(datetime)
	private $mensagem;
	// corpo da mensagem(string)
	private $autor;
	// autor da mensagem
	private $rascunho;
	// boolean que define se a mensagem foi enviada(finalizada) ou não

	public function getDtMensagem() {
		return $this -> dtMensagem;
	}

	public function setDtMensagem($dtMensagem) {
		$this -> dtMensagem = $dtMensagem;
	}

	public function getMensagem() {
		return $this -> mensagem;
	}

	public function setMensagem($mensagem) {
		$this -> mensagem = $mensagem;
	}

	public function getAutor() {
		return $this -> autor;
	}

	public function setAutor($autor) {
		$this -> autor = $autor;
	}

	public function getRascunho() {
		return $this -> rascunho;
	}

	public function setRascunho($rascunho) {
		$this -> rascunho = $rascunho;
	}

}

?>