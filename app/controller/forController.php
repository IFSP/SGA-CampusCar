<?php
	
	class FORController extends Controller {
	
		public function gae() {
			
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
			
				if($_SESSION['user_papeis'][$i] == 'GAE') {
						
					$professor_for = new ProfessorFOR;
					$professor_for_dao = new ProfessorFORDAO;
					$professor_for->setDataAno(date('Y'));
					$professor_for->setDataSemestre(date('m')<=6 ? 1 : 2);
				
					if(getenv("REQUEST_METHOD") == "POST" && isset($_POST['lancar'])) {
						$validation['semestre'] = $professor_for->setDataSemestreValidate($_POST['semestre']);
						$validation['ano'] = $professor_for->setDataAnoValidate($_POST['ano']);
					
						if(!in_array(true, $validation)) {
							$professores_dao = new ProfessoresDAO;
							$professores = $professores_dao->selectList();
							$professor_for->setStatus(0);
							$professor_for_dao->startTransaction();
							
							foreach($professores as $professor) {
								$professor_for->setRefIdProfessor($professor->getId());
								if(!$professor_for_dao->insert($professor_for)) {
									$erro = 1;
									break;
								}
							}
						
							if(isset($erro)) {
								$professor_for_dao->rollback();
								$msg_error = 'Erro! Houve um erro ao tentar lançar a FOR.';
							} else {
								$professor_for_dao->commit();
								$msg_ok = 'FOR lançada com sucesso!';
							}
						}
					} else if(getenv("REQUEST_METHOD") == "POST" && isset($_POST['buscar'])) {
						$professor_for->setDataAno($_POST['ano']);
						$professor_for->setDataSemestre($_POST['semestre']);
					}
					$objetos = $professor_for_dao->selectViaCaeGae($professor_for);
					require(PATH_VIEW.'for-gae-index.php');
					exit;
				}
			}
			$this->view('page404');
		}
		public function cae() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'CAE') {
					$professor_for_dao = new ProfessorFORDAO;
					$professor_for = new ProfessorFOR;
					$professor_for->setDataAno(date('Y'));
					$professor_for->setDataSemestre(date('m')<=6 ? 1 : 2);
					if(getenv("REQUEST_METHOD") == "POST") {
						$professor_for->setDataAno($_POST['ano']);
						$professor_for->setDataSemestre($_POST['semestre']);
					}
					$objetos = $professor_for_dao->selectViaCaeGae($professor_for);
					require(PATH_VIEW.'for-cae-index.php');
					exit;
				}
			}
			$this->view('page404');
		}
		public function professor() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'Professor') {
					$professor_for_dao = new ProfessorFORDAO;
					$professor_for = new ProfessorFOR;
					$professor_for->setRefIdProfessor($this->session->get('user_id'));
					if(getenv("REQUEST_METHOD") == "POST") {
						$professor_for->setDataAno($_POST['ano']);
						$professor_for->setDataSemestre($_POST['semestre']);
					}
					$professores_for = $professor_for_dao->selectByProfessor($professor_for);
					require(PATH_VIEW.'for-prof-index.php');
					exit;
				}
			}
			$this->view('page404');
		}
		public function coordenador() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'Coordenador') {
					$professor_for = new ProfessorFOR;
					$professor_for->setDataAno(date('Y'));
					$professor_for->setDataSemestre(date('m')<=6 ? 1 : 2);
					if(getenv("REQUEST_METHOD") == "POST") {
						$professor_for->setDataSemestre($_POST['data_semestre']);
						$professor_for->setDataAno($_POST['data_ano']);
					}
					$coordenador_dao = new CoordenadorDAO;
					$id_area = $coordenador_dao->selectArea($this->session->get('user_id'));
					$professor_for_dao = new ProfessorFORDAO;
					$objetos = $professor_for_dao->selectByCoordenador($professor_for, $id_area);
					require(PATH_VIEW.'for-coord-index.php');
					exit; 
				}
			}
			$this->view('page404');
		}
		public function preencher() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'Professor') {
					$professores = new Professores;
					$professores->setId($this->session->get('user_id'));
					$professor_for = new ProfessorFOR;
					$professor_for->setId($this->get('id'));
					$professor_for_dao = new ProfessorFORDAO;
					$objetos = $professor_for_dao->selectDadosProfessor($professores, $professor_for);
					if($objetos['professores']->getId()) {
						$horarios_for_dao = new HorariosFORDAO;
						if(getenv("REQUEST_METHOD") == "POST") {
							if(isset($_POST['regime'])) {
								if($_POST['regime'] == 20)
									$horario_limite = 16;
								elseif($_POST['regime'] == 40)
									$horario_limite = 32;
								elseif($_POST['regime'] == 'rde')
									$horario_limite = 32;
								if(isset($horario_limite)) {
										
									$horario_total = 0;
									$horario_limite_seg = 0; $horario_sequencia_seg = 0;
									$horario_limite_ter = 0; $horario_sequencia_ter = 0;
									$horario_limite_qua = 0; $horario_sequencia_qua = 0;
									$horario_limite_qui = 0; $horario_sequencia_qui = 0;
									$horario_limite_sex = 0; $horario_sequencia_sex = 0;
									$horario_limite_sab = 0; $horario_sequencia_sab = 0;
									
									for($i=1;$i<=93;$i++) {
										if(isset($_POST[$i]))
											$horario_total++;
										if($i <= 16) {
											if(isset($_POST[$i]))
												$horario_limite_seg++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_seg++;
												else
													$horario_sequencia_seg=0;
											}
										} else if($i <= 33) {
											if(isset($_POST[$i]))
												$horario_limite_ter++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_ter++;
												else
													$horario_sequencia_ter=0;
											}
										} else if($i <= 49) {
											if(isset($_POST[$i]))
												$horario_limite_qua++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_qua++;
												else
													$horario_sequencia_qua=0;
											}
										} else if($i <= 65) {
											if(isset($_POST[$i]))
												$horario_limite_qui++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_qui++;
												else
													$horario_sequencia_qui=0;
											}
										} else if($i <= 81) {
											if(isset($_POST[$i]))
												$horario_limite_sex++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_sex++;
												else
													$horario_sequencia_sex=0;
											}
										} else if($i <= 93) {
											if(isset($_POST[$i]))
												$horario_limite_sab++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_sab++;
												else
													$horario_sequencia_sab=0;
											}
										}
									}
									if($horario_total > $horario_limite)
										$validation[] = 'Você não deve ultrapassar seu regime de trabalho.';
									if($horario_total < $horario_limite)
										$validation[] = 'Você deve terminar de preencher seu horário.';
									if($horario_limite_seg > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na segunda.';
									if($horario_limite_ter > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na terça.';
									if($horario_limite_qua > 10)
										$validation[] = 'Você não pode marcar mais de 10 horas na quarta.';
									if($horario_limite_qui > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na quinta.';
									if($horario_limite_sex > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na sexta.';
									if($horario_limite_sab > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas no sábado.';
									if($horario_sequencia_seg > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na segunda.';
									if($horario_sequencia_ter > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na terça.';
									if($horario_sequencia_qua > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na quarta.';
									if($horario_sequencia_qui > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na quinta.';
									if($horario_sequencia_sex > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na sexta.';
									if($horario_sequencia_sab > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência no sábado.';
									if(!isset($validation)) {
										$professor_for->setRegTrabalho($_POST['regime']);
										$professor_for->setStatus(1);
										$horarios_for = new HorariosFOR;
										$professor_for_dao = new ProfessorFORDAO;
										if($professor_for_dao->update($professor_for)) {
											$horarios_for->setRefIdFor($this->get('id'));
											$horarios_for_dao->startTransaction();
											if($horarios_for_dao->delete($this->get('id'))) {
												for($i=1;$i<=93;$i++) {
													if(isset($_POST[$i])) {
														$horarios_for->setRefIdHorario($i);
														if(!$horarios_for_dao->insert($horarios_for)) {
															$fail=1;
															break;
														}
													}
												}
											} else {
												$horarios_for_dao->rollback();
												$msg_erro = 1;
											}
											if(!isset($fail)) {
												//$objetos['professor_for']->setStatus(1);
												$horarios_for_dao->commit();
												$msg = 1;
											} else {
												$horarios_for_dao->rollback();
												$professor_for->setRegTrabalho('');
												$professor_for->setStatus(0);
												$professor_for_dao->update($professor_for);
												$msg_erro = 1;
											}
										} else {
											$msg_erro = 1;
										}
									}
								} else
									$validation[] = 'Escolha um regime de trabalho!';
							} else
								$validation[] = 'Escolha um regime de trabalho!';
						}
						if($objetos['professor_for']->getStatus() > 0) {
							$hour = $horarios_for_dao->select($professor_for->getId());
						}
						require(PATH_VIEW.'for-prof-preencher.php');
						exit;
					}
				}
			}
			$this->view('page404');
		}
		public function atribuir() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'Coordenador') {
					$professores = new Professores;
					$coordenador_dao = new CoordenadorDAO;
					$professor_for = new ProfessorFOR;
					$professores->setArea($coordenador_dao->selectArea($this->session->get('user_id')));
					$professor_for->setId($this->get('id'));
					$professor_for_dao = new ProfessorFORDAO;
					$objetos = $professor_for_dao->selectDadosProfessorByCoordenador($professores, $professor_for);
					if($objetos['professores']->getId()) {
						$disciplinas_dao = new DisciplinasDAO;
						$disciplinas = $disciplinas_dao->select();
						$horarios_for_dao = new HorariosFORDAO;
						if(getenv("REQUEST_METHOD") == "POST") {
							if(isset($_POST['regime'])) {
								if($_POST['regime'] == 20)
									$horario_limite = 16;
								elseif($_POST['regime'] == 40)
									$horario_limite = 32;
								elseif($_POST['regime'] == 'rde')
									$horario_limite = 32;
								if(isset($horario_limite)) {
									$horario_total = 0;
									$horario_limite_seg = 0; $horario_sequencia_seg = 0;
									$horario_limite_ter = 0; $horario_sequencia_ter = 0;
									$horario_limite_qua = 0; $horario_sequencia_qua = 0;
									$horario_limite_qui = 0; $horario_sequencia_qui = 0;
									$horario_limite_sex = 0; $horario_sequencia_sex = 0;
									$horario_limite_sab = 0; $horario_sequencia_sab = 0;
									for($i=1;$i<=93;$i++) {
										if(isset($_POST[$i]))
											$horario_total++;
										if($i <= 16) {
											if(isset($_POST[$i]))
												$horario_limite_seg++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_seg++;
												else
													$horario_sequencia_seg=0;
											}
										} else if($i <= 33) {
											if(isset($_POST[$i]))
												$horario_limite_ter++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_ter++;
												else
													$horario_sequencia_ter=0;
											}
										} else if($i <= 49) {
											if(isset($_POST[$i]))
												$horario_limite_qua++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_qua++;
												else
													$horario_sequencia_qua=0;
											}
										} else if($i <= 65) {
											if(isset($_POST[$i]))
												$horario_limite_qui++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_qui++;
												else
													$horario_sequencia_qui=0;
											}
										} else if($i <= 81) {
											if(isset($_POST[$i]))
												$horario_limite_sex++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_sex++;
												else
													$horario_sequencia_sex=0;
											}
										} else if($i <= 93) {
											if(isset($_POST[$i]))
												$horario_limite_sab++;
											if($i >= 7) {
												if(isset($_POST[$i]))
													$horario_sequencia_sab++;
												else
													$horario_sequencia_sab=0;
											}
										}
									}
									if($horario_total > $horario_limite)
										$validation[] = 'Você não deve ultrapassar seu regime de trabalho.';
									if($horario_total < $horario_limite)
										$validation[] = 'Você deve terminar de preencher seu horário.';
									if($horario_limite_seg > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na segunda.';
									if($horario_limite_ter > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na terça.';
									if($horario_limite_qua > 10)
										$validation[] = 'Você não pode marcar mais de 10 horas na quarta.';
									if($horario_limite_qui > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na quinta.';
									if($horario_limite_sex > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas na sexta.';
									if($horario_limite_sab > 9)
										$validation[] = 'Você não pode marcar mais de 9 horas no sábado.';
									if($horario_sequencia_seg > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na segunda.';
									if($horario_sequencia_ter > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na terça.';
									if($horario_sequencia_qua > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na quarta.';
									if($horario_sequencia_qui > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na quinta.';
									if($horario_sequencia_sex > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência na sexta.';
									if($horario_sequencia_sab > 6)
										$validation[] = 'Você não pode marcar mais de 6 horas na sequência no sábado.';
									for($i=1;$i<=93;$i++) {
										if(isset($_POST[$i])) {
											if(isset($_POST['disc'.$i]) && $_POST['disc'.$i] != '') {
												foreach($disciplinas as $disciplina) :
													if($disciplina->getId() == $_POST['disc'.$i]) {
														$valid = 1;
													}
												endforeach;
											} else {
												$validation[] = 'Você precisa atribuir todas disciplinas.';
												break;
											}
											if(!isset($valid)) {
												$validation[] = 'Disciplina inválida.';
												break;
											}
										}
									}
									if(!isset($validation)) {
										$professor_for->setRegTrabalho($_POST['regime']);
										$professor_for->setStatus(2);
										$horarios_for = new HorariosFOR;
										$professor_for_dao = new ProfessorFORDAO;
										if($professor_for_dao->update($professor_for)) {
											$horarios_for->setRefIdFor($this->get('id'));
											$horarios_for_dao->startTransaction();
											if($horarios_for_dao->delete($this->get('id'))) {
												for($i=1;$i<=93;$i++) {
													if(isset($_POST[$i])) {
														$horarios_for->setRefIdHorario($i);
														$horarios_for->setRefIdDisc($_POST['disc'.$i]);
														if($horarios_for_dao->insert($horarios_for) === false) {
															$fail=1;
															break;
														}
													}
												}
											} else {
												$horarios_for_dao->rollback();
												$msg_erro = 1;
											}
											if(!isset($fail)) {
												$horarios_for_dao->commit();
												$objetos['professor_for']->setStatus(2);
												$msg = 1;
											} else {
												$horarios_for_dao->rollback();
												$professor_for->setRegTrabalho('');
												$professor_for->setStatus($objetos['professor_for']->getStatus());
												$professor_for_dao->update($professor_for);
												$msg_erro = 1;
											}
										} else {
											$msg_erro = 1;
										}
									}
								} else
									$validation[] = 'Escolha um regime de trabalho!';
							} else
								$validation[] = 'Escolha um regime de trabalho!';
						}
						$hour = $horarios_for_dao->select($professor_for->getId());
						require(PATH_VIEW.'for-coord-atribuir.php');
						exit;
					} else
						$this->view('page404');
				}
			}
			$this->view('page404');
		}
		public function confirmar() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'Professor') {
					$professores = new Professores;
					$professores->setId($this->session->get('user_id'));
					$professor_for = new ProfessorFOR;
					$professor_for->setId($this->get('id'));
					$professor_for_dao = new ProfessorFORDAO;
					$objetos = $professor_for_dao->selectDadosProfessor($professores, $professor_for, true);
					if($objetos['professores']->getId()) {
						if(getenv("REQUEST_METHOD") == "POST") {
							$professor_for->setRegTrabalho($objetos['professor_for']->getRegTrabalho());
							$professor_for->setStatus(3);
							$professor_for_dao = new ProfessorFORDAO;
							if($professor_for_dao->update($professor_for)) {
								$msg = 1;
							} else {
								$msg_erro = 1;
							}
						}
						$disciplinas_dao = new DisciplinasDAO;
						$disciplinas = $disciplinas_dao->select();
						$horarios_for_dao = new HorariosForDao;
						$hour = $horarios_for_dao->select($professor_for->getId());	
						$confirmar = true; $novalidation = true;
						require(PATH_VIEW.'for-visualizar.php');
						exit;
					} else
						$this->view('page404');
				}
			}	
			$this->view('page404');
		}

		public function aprovar() {
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'CAE') {
					$coordenador_dao = new CoordenadorDAO;
					$professor_for = new ProfessorFOR;
					$professor_for->setId($this->get('id'));
					$professor_for_dao = new ProfessorFORDAO;
					$objetos = $professor_for_dao->selectDadosProfessorByCaeGae($professor_for);
					if($objetos['professores']->getId()) {
						if(getenv("REQUEST_METHOD") == "POST") {
							$professor_for->setRegTrabalho($objetos['professor_for']->getRegTrabalho());
							$professor_for->setStatus(4);
							$professor_for_dao = new ProfessorFORDAO;
							if($professor_for_dao->update($professor_for)) {
								$objetos['professor_for']->setStatus(4);
								$msg = 1;
							} else {
								$msg_erro = 1;
							}
						}
						$disciplinas_dao = new DisciplinasDAO;
						$disciplinas = $disciplinas_dao->select();
						$horarios_for_dao = new HorariosFORDAO;
						$hour = $horarios_for_dao->select($professor_for->getId());	
						$aprovar = true; $novalidation = true;
						require(PATH_VIEW.'for-visualizar.php');
						exit;
					} else
						$this->view('page404');
				}
			}
			$this->view('page404');
		}

		public function visualizar($imprimir = null) {
			$professor_for = new ProfessorFOR;
			$professor_for_dao = new ProfessorFORDAO;
			$professores = new Professores;
			$coordenador_dao = new CoordenadorDAO;
			for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
				if($_SESSION['user_papeis'][$i] == 'Professor') {
					$professores->setId($this->session->get('user_id'));
					$professor_for->setId($this->get('id'));
					$objetos = $professor_for_dao->selectDadosProfessor($professores, $professor_for, null, true);
				} else if($_SESSION['user_papeis'][$i] == 'Coordenador') {
					$professores->setArea($coordenador_dao->selectArea($this->session->get('user_id')));
					$professor_for->setId($this->get('id'));
					$objetos = $professor_for_dao->selectDadosProfessorByCoordenador($professores, $professor_for, true);
				} else if($_SESSION['user_papeis'][$i] == 'CAE' || $_SESSION['user_papeis'][$i] == 'GAE') {
					$professor_for->setId($this->get('id'));
					$objetos = $professor_for_dao->selectDadosProfessorByCaeGae($professor_for, true);
				}
				if(isset($objetos)) {
					if($objetos['professores']->getId()) {
						$disciplinas_dao = new DisciplinasDAO;
						$disciplinas = $disciplinas_dao->select();
						$horarios_for_dao = new HorariosFORDAO;
						$hour = $horarios_for_dao->select($professor_for->getId());	
						$novalidation = true;
						if($imprimir == null)
							require(PATH_VIEW.'for-visualizar.php');
						else
							require(PATH_VIEW.'for-imprimir.php');
						exit;
					}
				}
			}
			$this->view('page404');
		}
		public function imprimir() {
			$this->visualizar(true);
		}
	}
?>