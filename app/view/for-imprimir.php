<?php
	$horasTotal = 0;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>FOR - Imprimir</title>
		<link rel="stylesheet" type="text/css" href="<?php echo PATH_UI_CSS; ?>imprimir.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="pt-br">
		<meta name="robots" content="noindex">
		<script type="text/javascript" src="<?php echo PATH_UI_JS; ?>jquery1.8.2.js"></script>
		<script type="text/javascript" src="<?php echo PATH_UI_JS; ?>efects.js"></script>
		<style rel="stylesheet" type="text/css" media="print">
			#link_imprimir { display:none; }
		</style>
		<script type="text/javascript">
			function Imprimir() {
				if (!window.print){
					alert("Atualize seu navegador para imprimir!")
					return
				}
				window.print()
			}
		</script>

	</head>
	<body>
				<div id="conteudo">
					
					<div id="dados-pessoais" style="float:left;">
						<table class="dados-pess">
							<tr>
								<td colspan="12"style="text-align:center;">Instituto Federal de Educação, Ciência e Tecnologia de São Paulo</td>
							</tr>
							<tr>
								<td colspan="12" style="text-align:center;">Campus Caraguatatuba</td>
							</tr>
							<tr>
								<td colspan="3"></td>
								<td colspan="5" style="text-align:center;">FOR - Folha de Orientação para Horário</td>
								<td colspan="4" style="text-align:right;"><span class="rotulo"><?php echo $objetos['professor_for']->getDataSemestre(); ?>º Semestre - <?php echo $objetos['professor_for']->getDataAno(); ?></span></td>
							</tr>
							<tr>
								<td colspan="8" class="td-dados"><span class="rotulo">Professor:</span><span><?php echo $objetos['professores']->getNome(); ?></span></td>
								<td colspan="4" class="td-dados"><span class="rotulo">Área:</span><span><?php echo $objetos['professores']->getArea(); ?></span></td>
							</tr>
							<tr>
								<td colspan="3"class="td-dados"><span class="rotulo">Prontuário:</span><span><?php echo $objetos['professores']->getProntuario(); ?></span></td>
								<td colspan="9" class="td-dados"><span class="rotulo">E-mail:</span><span><?php echo $objetos['professores']->getEmail(); ?></span></td>
							</tr>
							<tr>
								<td colspan="3" class="td-dados"><span class="rotulo">Telefone:</span><span><?php echo $objetos['professores']->getFone(); ?></span></td>
								<td colspan="9" class="td-dados"><span class="rotulo">Celular:</span><span><?php echo $objetos['professores']->getCelular(); ?></span></td>
							</tr>
							<tr>
								<td class="td-dados"><span class="rotulo">Regime de trabalho:</span></td>
								<td class="td-dados"><input type="radio" value="20" name="regime" id="20" <?php if($objetos['professor_for']->getRegTrabalho() == '20') { echo 'checked'; $horasTotal = 16; } ?> disabled="disabled" /></td>
								<td class="td-dados"><label for="20">20 horas</label></td>
								<td class="td-dados"><input type="radio" value="40" name="regime"  id="40" <?php if($objetos['professor_for']->getRegTrabalho() == '40') { echo 'checked'; $horasTotal = 32; } ?> disabled="disabled" /></td>
								<td class="td-dados"><label for="40">40 horas</label></td>
								<td class="td-dados"><input type="radio" value="rde" name="regime" id="rde" <?php if($objetos['professor_for']->getRegTrabalho() == 'rde') { echo 'checked'; $horasTotal = 32; } ?> disabled="disabled" /></td>
								<td class="td-dados"><label for="rde">RDE</label></td>
								<td class="td-dados" style="width:235px;" id="msgRegime"></td>
								<td class="td-dados"><input type="checkbox" id="substituto" disabled="disabled" /></td>
								<td class="td-dados"><span>Substituto</span></td>
								<td class="td-dados"><input type="checkbox"  id="temporario" disabled="disabled" /></td>
								<td class="td-dados"><span style="padding: 0 5px 0 0;">Temporário</span></td>
							</tr>
						</table>
					</div>

						<div id="for" style="float:left;">
							<table border="1"  style="border:none; width:760px; height:196px; text-align:left;">
								<tr>
									<td rowspan="8" style="padding-right:10px; border:none; font-weight:bold;">M</td>
								</tr>
								<tr>
									<td colspan="2">Aula</td>
									<td style="width:102px; height:25px;">Segunda</td>
									<td style="width:102px; height:25px;">Terça</td>
									<td style="width:102px; height:25px;">Quarta</td>
									<td style="width:102px; height:25px;">Quinta</td>
									<td style="width:102px; height:25px;">Sexta</td>
									<td style="width:102px; height:25px;">Sábado</td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">1</td>
									<td style="width:93px;">7h00 às 7h50</td>
									<td><?php if(isset($hour[1]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[1]) && $hour[1] === true) echo''; else if(isset($hour[1]) && $hour[1] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[18]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[18]) && $hour[18] === true) echo''; else if(isset($hour[18]) && $hour[18] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[34]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[34]) && $hour[34] === true) echo''; else if(isset($hour[34]) && $hour[34] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[50]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[50]) && $hour[50] === true) echo''; else if(isset($hour[50]) && $hour[50] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[66]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[66]) && $hour[66] === true) echo''; else if(isset($hour[66]) && $hour[66] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[82]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[82]) && $hour[82] === true) echo''; else if(isset($hour[82]) && $hour[82] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">2</td>
									<td>7h50 às 8h40</td>
									<td><?php if(isset($hour[2]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[2]) && $hour[2] === true) echo''; else if(isset($hour[2]) && $hour[2] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[19]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[19]) && $hour[19] === true) echo''; else if(isset($hour[19]) && $hour[19] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[35]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[35]) && $hour[35] === true) echo''; else if(isset($hour[35]) && $hour[35] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[51]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[51]) && $hour[51] === true) echo''; else if(isset($hour[51]) && $hour[51] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[67]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[67]) && $hour[67] === true) echo''; else if(isset($hour[67]) && $hour[67] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[83]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[83]) && $hour[83] === true) echo''; else if(isset($hour[83]) && $hour[83] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									</tr>
								<tr>
									<td style="width:10px; height:25px;">3</td>
									<td>8h40 às 9h30</td>
									<td><?php if(isset($hour[3]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[3]) && $hour[3] === true) echo''; else if(isset($hour[3]) && $hour[3] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[20]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[20]) && $hour[20] === true) echo''; else if(isset($hour[20]) && $hour[20] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[36]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[36]) && $hour[36] === true) echo''; else if(isset($hour[36]) && $hour[36] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[52]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[52]) && $hour[52] === true) echo''; else if(isset($hour[52]) && $hour[52] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[68]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[68]) && $hour[68] === true) echo''; else if(isset($hour[68]) && $hour[68] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[84]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[84]) && $hour[84] === true) echo''; else if(isset($hour[84]) && $hour[84] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								<tr>
									<td style="width:10px; height:25px;">4</td>
									<td>9h45 às 10h35</td>
									<td><?php if(isset($hour[4]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[4]) && $hour[4] === true) echo''; else if(isset($hour[4]) && $hour[4] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[21]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[21]) && $hour[21] === true) echo''; else if(isset($hour[21]) && $hour[21] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[37]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[37]) && $hour[37] === true) echo''; else if(isset($hour[37]) && $hour[37] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[53]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[53]) && $hour[53] === true) echo''; else if(isset($hour[53]) && $hour[53] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[69]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[69]) && $hour[69] === true) echo''; else if(isset($hour[69]) && $hour[69] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[85]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[85]) && $hour[85] === true) echo''; else if(isset($hour[85]) && $hour[85] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								<tr>
									<td style="width:10px; height:25px;">5</td>
									<td>10h35 às 11h25</td>
									<td><?php if(isset($hour[5]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[5]) && $hour[5] === true) echo''; else if(isset($hour[5]) && $hour[5] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[22]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[22]) && $hour[22] === true) echo''; else if(isset($hour[22]) && $hour[22] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[38]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[38]) && $hour[38] === true) echo''; else if(isset($hour[38]) && $hour[38] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[54]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[54]) && $hour[54] === true) echo''; else if(isset($hour[54]) && $hour[54] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[70]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[70]) && $hour[70] === true) echo''; else if(isset($hour[70]) && $hour[70] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[86]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[86]) && $hour[86] === true) echo''; else if(isset($hour[86]) && $hour[86] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">6</td>
									<td>11h25 às 12h15</td>
									<td><?php if(isset($hour[6]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[6]) && $hour[6] === true) echo''; else if(isset($hour[6]) && $hour[6] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[23]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[23]) && $hour[23] === true) echo''; else if(isset($hour[23]) && $hour[23] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[39]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[39]) && $hour[39] === true) echo''; else if(isset($hour[39]) && $hour[39] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[55]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[55]) && $hour[55] === true) echo''; else if(isset($hour[55]) && $hour[55] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[71]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[71]) && $hour[71] === true) echo''; else if(isset($hour[71]) && $hour[71] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[87]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[87]) && $hour[87] === true) echo''; else if(isset($hour[87]) && $hour[87] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
							</table>
							<table border="1"  style="border:none; width:760px; height:196px; text-align:left; margin:10px 0;">
								<tr>
									<td rowspan="8" style="padding-right:10px; border:none; font-weight:bold;">V</td>
								</tr>
								<tr>
									<td colspan="2">Aula</td>
									<td style="width:102px; height:25px;">Segunda</td>
									<td style="width:102px; height:25px;">Terça</td>
									<td style="width:102px; height:25px;">Quarta</td>
									<td style="width:102px; height:25px;">Quinta</td>
									<td style="width:102px; height:25px;">Sexta</td>
									<td style="width:102px; height:25px;">Sábado</td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">1</td>
									<td style="width:93px;">13h00 às 14h20</td>
									<td><?php if(isset($hour[7]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[7]) && $hour[7] === true) echo''; else if(isset($hour[7]) && $hour[7] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[24]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[24]) && $hour[24] === true) echo''; else if(isset($hour[24]) && $hour[24] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[40]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[40]) && $hour[40] === true) echo''; else if(isset($hour[40]) && $hour[40] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[56]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[56]) && $hour[56] === true) echo''; else if(isset($hour[56]) && $hour[56] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[72]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[72]) && $hour[72] === true) echo''; else if(isset($hour[72]) && $hour[72] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[88]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[88]) && $hour[88] === true) echo''; else if(isset($hour[88]) && $hour[88] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">2</td>
									<td>14h20 às 15h10</td>
									<td><?php if(isset($hour[8]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[8]) && $hour[8] === true) echo''; else if(isset($hour[8]) && $hour[8] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[25]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[25]) && $hour[25] === true) echo''; else if(isset($hour[25]) && $hour[25] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[41]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[41]) && $hour[41] === true) echo''; else if(isset($hour[41]) && $hour[41] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[57]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[57]) && $hour[57] === true) echo''; else if(isset($hour[57]) && $hour[57] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[73]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[73]) && $hour[73] === true) echo''; else if(isset($hour[73]) && $hour[73] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[89]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[89]) && $hour[89] === true) echo''; else if(isset($hour[89]) && $hour[89] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">3</td>
									<td>15h10 às 16h00</td>
									<td><?php if(isset($hour[9]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[9]) && $hour[9] === true) echo''; else if(isset($hour[9]) && $hour[9] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[26]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[26]) && $hour[26] === true) echo''; else if(isset($hour[26]) && $hour[26] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[42]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[42]) && $hour[42] === true) echo''; else if(isset($hour[42]) && $hour[42] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[58]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[58]) && $hour[58] === true) echo''; else if(isset($hour[58]) && $hour[58] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[74]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[74]) && $hour[74] === true) echo''; else if(isset($hour[74]) && $hour[74] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[90]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[90]) && $hour[90] === true) echo''; else if(isset($hour[90]) && $hour[90] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">4</td>
									<td>16h15 às 17h05</td>
									<td><?php if(isset($hour[10]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[10]) && $hour[10] === true) echo''; else if(isset($hour[10]) && $hour[10] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[27]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[27]) && $hour[27] === true) echo''; else if(isset($hour[27]) && $hour[27] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[43]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[43]) && $hour[43] === true) echo''; else if(isset($hour[43]) && $hour[43] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[59]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[59]) && $hour[59] === true) echo''; else if(isset($hour[59]) && $hour[59] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[75]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[75]) && $hour[75] === true) echo''; else if(isset($hour[75]) && $hour[75] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[91]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[91]) && $hour[91] === true) echo''; else if(isset($hour[91]) && $hour[91] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">5</td>
									<td>17h05 às 17h55</td>
									<td><?php if(isset($hour[11]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[11]) && $hour[11] === true) echo''; else if(isset($hour[11]) && $hour[11] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[28]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[28]) && $hour[28] === true) echo''; else if(isset($hour[28]) && $hour[28] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[44]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[44]) && $hour[44] === true) echo''; else if(isset($hour[44]) && $hour[44] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[60]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[60]) && $hour[60] === true) echo''; else if(isset($hour[60]) && $hour[60] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[76]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[76]) && $hour[76] === true) echo''; else if(isset($hour[76]) && $hour[76] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[92]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[92]) && $hour[92] === true) echo''; else if(isset($hour[92]) && $hour[92] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">6</td>
									<td>17h55 às 18h45</td>
									<td><?php if(isset($hour[12]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[12]) && $hour[12] === true) echo''; else if(isset($hour[12]) && $hour[12] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[29]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[29]) && $hour[29] === true) echo''; else if(isset($hour[29]) && $hour[29] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[45]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[45]) && $hour[45] === true) echo''; else if(isset($hour[45]) && $hour[45] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[61]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[61]) && $hour[61] === true) echo''; else if(isset($hour[61]) && $hour[61] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[77]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[77]) && $hour[77] === true) echo''; else if(isset($hour[77]) && $hour[77] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[93]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[93]) && $hour[93] === true) echo''; else if(isset($hour[93]) && $hour[93] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
							</table>
							<table border="1"  style="border:none; width:760px; height:140px; text-align:left;">
								<tr>
									<td rowspan="8" style="padding-right:10px; border:none; font-weight:bold;">N</td>
								</tr>
								<tr>
									<td colspan="2">Aula</td>
									<td style="width:102px; height:25px;">Segunda</td>
									<td style="width:102px; height:25px;">Terça</td>
									<td style="width:102px; height:25px;">Quarta</td>
									<td style="width:102px; height:25px;">Quinta</td>
									<td style="width:102px; height:25px;">Sexta</td>
									<td style="width:102px; border:none; font-weight:bold; text-align:center;" rowspan="5" id="tdHoras">Horas<br /><?php echo $horasTotal;  ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">1</td>
									<td style="width:93px;">19h00 às 19h50</td>
									<td><?php if(isset($hour[13]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[13]) && $hour[13] === true) echo''; else if(isset($hour[13]) && $hour[13] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[30]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[30]) && $hour[30] === true) echo''; else if(isset($hour[30]) && $hour[30] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[46]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[46]) && $hour[46] === true) echo''; else if(isset($hour[46]) && $hour[46] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[62]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[62]) && $hour[62] === true) echo''; else if(isset($hour[62]) && $hour[62] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[78]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[78]) && $hour[78] === true) echo''; else if(isset($hour[78]) && $hour[78] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">2</td>
									<td>19h50 às 20h40</td>
									<td><?php if(isset($hour[14]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[14]) && $hour[14] === true) echo''; else if(isset($hour[14]) && $hour[14] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[31]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[31]) && $hour[31] === true) echo''; else if(isset($hour[31]) && $hour[31] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[47]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[47]) && $hour[47] === true) echo''; else if(isset($hour[47]) && $hour[47] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[63]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[63]) && $hour[63] === true) echo''; else if(isset($hour[63]) && $hour[63] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[79]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[79]) && $hour[79] === true) echo''; else if(isset($hour[79]) && $hour[79] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">3</td>
									<td>20h55 às 21h45</td>
									<td><?php if(isset($hour[15]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[15]) && $hour[15] === true) echo''; else if(isset($hour[15]) && $hour[15] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[32]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[32]) && $hour[32] === true) echo''; else if(isset($hour[32]) && $hour[32] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[48]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[48]) && $hour[48] === true) echo''; else if(isset($hour[48]) && $hour[48] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[64]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[64]) && $hour[64] === true) echo''; else if(isset($hour[64]) && $hour[64] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[80]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[80]) && $hour[80] === true) echo''; else if(isset($hour[80]) && $hour[80] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
								<tr>
									<td style="width:10px; height:25px;">4</td>
									<td>21h45 às 22h35</td>
									<td><?php if(isset($hour[16]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[16]) && $hour[16] === true) echo''; else if(isset($hour[16]) && $hour[16] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[33]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[33]) && $hour[33] === true) echo''; else if(isset($hour[33]) && $hour[33] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[49]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[49]) && $hour[49] === true) echo''; else if(isset($hour[49]) && $hour[49] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[65]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[65]) && $hour[65] === true) echo''; else if(isset($hour[65]) && $hour[65] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
									<td><?php if(isset($hour[81]))  echo '<span class="raquo">&#9421;</span>'; foreach($disciplinas as $disciplina) : if(isset($hour[81]) && $hour[81] === true) echo''; else if(isset($hour[81]) && $hour[81] == $disciplina->getId()) echo '<span title="'.$disciplina->getDescricaoExtenso().'">'.$disciplina->getDescricaoDisciplina().'</span>'; endforeach; ?></td>
								</tr>
							</table>
							<table border="1"  style="border:none; width:760px; text-align:center; margin:10px 0;">
								<tr>
									<td colspan="9"><span class="rotulo">Incentivo</span></td>
								</tr>
								<tr>
									<td class="campo-incentivo" >Título:</td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo" >Vínculo:</td>
									<td></td>
									<td class="campo-incentivo-p" ></td>
									<td class="campo-incentivo-p" >1</td>
									<td class="campo-incentivo-p" ></td>
									<td class="campo-incentivo-p" >2</td>
									<td class="campo-incentivo" >semestres</td>
								</tr>
							</table>
							<table border="1"  style="border:none; width:760px; text-align:center; margin:10px 0;">
								<tr>
									<td colspan="5"><span class="rotulo">Componente curricular</span></td>
									<td colspan="2"><span class="rotulo">Professores</span></td>
								</tr>
								<tr>
									<td class="campo-incentivo" >Sigla</td>
									<td class="campo-incentivo300" >Nome</td>
									<td class="campo-incentivo-m" >Período</td>
									<td>Curso</td>
									<td class="campo-incentivo-m" >Aulas</td>
									<td style="width:35px;" >Nº</td>
									<td>Nome(s)</td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td class="campo-incentivo" ><br /></td>
									<td class="campo-incentivo300" ></td>
									<td class="campo-incentivo-m" ></td>
									<td></td>
									<td class="campo-incentivo-m" ></td>
									<td style="width:35px;" ></td>
									<td></td>
								</tr>
								<tr>
									<td colspan="7" style="left:390px;">Total:___</td>
								</tr
							</table>
							<br />
							<table style="float:right;">
								<tr>
									<td colspan="2"style="text-align:right;"><span style=" margin:0 30px 0 0;">Disponibilidade em:____/____/____</span></td>
								</tr>
								<tr><td colspan="2"><br /></td></tr>
								<tr>
									<td><span style=" margin:0 10px 0 0;">____________________________</span></td>
									<td><span>____________________________</span></td>
								</tr>
								<tr style="text-align:center;">
									<td>docente</td>
									<td>coordenador</td>
								</tr>
							</table>
						</div>
						<a id="link_imprimir" href="#" onClick="Imprimir()">Imprimir</a>
				</div><!-- fecha conteudo -->
	</body>
</html>