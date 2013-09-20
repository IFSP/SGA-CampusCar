				
					<div id="dados-pessoais">
					<center>
						<table class="dados-pess">
							<tr>
								<td colspan="12" style="text-align:right;"><span class="rotulo"><?php echo $objetos['professor_for']->getDataSemestre(); ?>º Semestre - <?php echo $objetos['professor_for']->getDataAno(); ?></span></td>
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
								<td class="td-dados"><input type="radio" value="20" name="regime" id="20" <?php if($objetos['professor_for']->getRegTrabalho() == '20') echo 'checked'; ?>/></td>
								<td class="td-dados"><label for="20">20 horas</label></td>
								<td class="td-dados"><input type="radio" value="40" name="regime"  id="40" <?php if($objetos['professor_for']->getRegTrabalho() == '40') echo 'checked'; ?>/></td>
								<td class="td-dados"><label for="40">40 horas</label></td>
								<td class="td-dados"><input type="radio" value="rde" name="regime" id="rde" <?php if($objetos['professor_for']->getRegTrabalho() == 'rde') echo 'checked'; ?>/></td>
								<td class="td-dados"><label for="rde">RDE</label></td>
								<td class="td-dados" style="width:176px;" id="msgRegime"></td>
								<td class="td-dados"><input type="checkbox" id="substituto"/></td>
								<td class="td-dados"><span>Substituto</span></td>
								<td class="td-dados"><input type="checkbox"  id="temporario"/></td>
								<td class="td-dados"><span style="padding: 0 5px 0 0;">Temporário</span></td>
							</tr>
						</table>
						</center>
					</div>
