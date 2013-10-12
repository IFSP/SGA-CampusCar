<?php
class chamadoASP {
	private $id;
	// id do chamado (int)
	private $idProfessor;
	// id do professor responsável pelo chamado
	private $idSocioPedagógico;
	// id do resposnsável pelo atendimento no sóciopedagógico
	private $idAlunos;
	// array dos alunos(objeto) envolvidos no chamado
	private $status;
	//status do chamado (aberto, em atendimento, concluído)
	private $mtvEncaminhamento;
	// array de ints com o ID dos possíveis motivos
	private $txtOutros;
	// texto da descrição do campo outros(motivo)
	private $txtObsGerais;
	// texto com as observações gerais
	private $msgAntigas;
	// array de Mensagens contendo as mensagens enviadas anteriormente
	private $msgNova;
	// mensagem sendo postada atualmente
	private $dtEncaminhamento;
	// campo com a data da abertura do chamado (datetime)

	public function setId($id) {
		$this -> id = $id;
	}

	public function getIdProfessor() {
		return $this -> idProfessor;
	}

	public function setIdProfessor($idProfessor) {
		$this -> idProfessor = $idProfessor;
	}

	public function getIdSocioPedagógico() {
		return $this -> idSocioPedagógico;
	}

	public function setIdSocioPedagógico($idSocioPedagógico) {
		$this -> idSocioPedagógico = $idSocioPedagógico;
	}

	public function getIdAlunos() {
		return $this -> idAlunos;
	}

	public function setIdAlunos($idAlunos) {
		$this -> idAlunos = $idAlunos;
	}

	public function getStatus() {
		return $this -> status;
	}

	public function setStatus($status) {
		$this -> status = $status;
	}

	public function getMtvEncaminhamento() {
		return $this -> mtvEncaminhamento;
	}

	public function setMtvEncaminhamento($mtvEncaminhamento) {
		$this -> mtvEncaminhamento = $mtvEncaminhamento;
	}

	public function getTxtOutros() {
		return $this -> txtOutros;
	}

	public function setTxtOutros($txtOutros) {
		$this -> txtOutros = $txtOutros;
	}

	public function getTxtObsGerais() {
		return $this -> txtObsGerais;
	}

	public function setTxtObsGerais($txtObsGerais) {
		$this -> txtObsGerais = $txtObsGerais;
	}

	public function getMsgAntigas() {
		return $this -> msgAntigas;
	}

	public function setMsgAntigas($msgAntigas) {
		$this -> msgAntigas = $msgAntigas;
	}

	public function getMsgNova() {
		return $this -> msgNova;
	}

	public function setMsgNova($msgNova) {
		$this -> msgNova = $msgNova;
	}

	public function getDtEncaminhamento() {
		return $this -> dtEncaminhamento;
	}

	public function setDtEncaminhamento($dtEncaminhamento) {
		$this -> dtEncaminhamento = $dtEncaminhamento;
	}

}
?>