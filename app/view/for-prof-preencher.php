<?php
	$title='FOR - Definição de disponibilidade';
	include(PATH_TEMPLATE.'header.php');
?>			
			<div id="content">			
				<?php
					include(PATH_TEMPLATE.'sidebar.php');
				?>
				<div id="conteudo">
					<span class="titulo"><?php echo $title; ?></span>
					<?php
						include(PATH_TEMPLATE.'status.php');
					?>	
					<form method="POST" action="" id="form-for">
					<?php
						include(PATH_TEMPLATE.'dados-pessoais.php');
							
							if(isset($msg)){
								echo '<div class="ok">FOR enviada com sucesso!</div>';
							}
							if(isset($msg_erro)){
								echo '<div class="msg_erro">Erro no envio!</div>';
							}
							if(isset($validation)) {
								foreach($validation as $key => $invalid) :
									if(isset($validation[$key]))
										echo '<div class="msg_erro">'.$invalid.'</div>';
								endforeach;
							}
					?>
					
					
						<div id="for" style="float:left;">
							<table border="1"  style="border:none; width:725px; height:168px; margin:0 0 10px 10px; text-align:center;">
								<tr>
									<td rowspan="8" style="padding-right:10px; border:none; font-weight:bold;">M</td>
								</tr>
								<tr>
									<td colspan="2">Aula</td>
									<td style="width:96px; height:25px;">Segunda</td>
									<td style="width:96px; height:25px;">Terça</td>
									<td style="width:96px; height:25px;">Quarta</td>
									<td style="width:96px; height:25px;">Quinta</td>
									<td style="width:96px; height:25px;">Sexta</td>
									<td style="width:96px; height:25px;">Sábado</td>
								</tr>
								<tr>
									<td style="width:10px;">1</td>
									<td style="width:95px;">7h às 7h50</td>
									<td><input type="checkbox" name="1" style="margin: 0 43%;" id="seg1" class="checkHora" <?php if(isset($hour[1])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="18"style="margin: 0 43%;" id="ter1" class="checkHora" <?php if(isset($hour[18])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="34"style="margin: 0 43%;" id="qua1" class="checkHora" <?php if(isset($hour[34])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="50"style="margin: 0 43%;" id="qui1" class="checkHora" <?php if(isset($hour[50])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="66"style="margin: 0 43%;" id="sex1" class="checkHora" <?php if(isset($hour[66])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="82"style="margin: 0 43%;" id="sab1" class="checkHora" <?php if(isset($hour[82])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>2</td>
									<td>7h50 às 8h40</td>
									<td><input type="checkbox" name="2" style="margin: 0 43%;" id="seg2" class="checkHora" <?php if(isset($hour[2])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="19" style="margin: 0 43%;" id="ter2" class="checkHora" <?php if(isset($hour[19])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="35" style="margin: 0 43%;" id="qua2" class="checkHora" <?php if(isset($hour[35])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="51" style="margin: 0 43%;" id="qui2" class="checkHora" <?php if(isset($hour[51])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="67" style="margin: 0 43%;" id="sex2" class="checkHora" <?php if(isset($hour[67])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="83" style="margin: 0 43%;" id="sab2" class="checkHora" <?php if(isset($hour[83])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>3</td>
									<td>8h40 às 9h30</td>
									<td><input type="checkbox" name="3" style="margin: 0 43%;" id="seg3" class="checkHora" <?php if(isset($hour[3])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="20" style="margin: 0 43%;" id="ter3" class="checkHora" <?php if(isset($hour[20])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="36" style="margin: 0 43%;" id="qua3" class="checkHora" <?php if(isset($hour[36])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="52" style="margin: 0 43%;" id="qui3" class="checkHora" <?php if(isset($hour[52])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="68" style="margin: 0 43%;" id="sex3" class="checkHora" <?php if(isset($hour[68])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="84" style="margin: 0 43%;" id="sab3" class="checkHora" <?php if(isset($hour[84])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>4</td>
									<td>9h45 às 10h35</td>
									<td><input type="checkbox" name="4" style="margin: 0 43%;" id="seg4" class="checkHora" <?php if(isset($hour[4])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="21" style="margin: 0 43%;" id="ter4" class="checkHora" <?php if(isset($hour[21])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="37" style="margin: 0 43%;" id="qua4" class="checkHora" <?php if(isset($hour[37])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="53" style="margin: 0 43%;" id="qui4" class="checkHora" <?php if(isset($hour[53])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="69" style="margin: 0 43%;" id="sex4" class="checkHora" <?php if(isset($hour[69])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="85" style="margin: 0 43%;" id="sab4" class="checkHora" <?php if(isset($hour[85])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>5</td>
									<td>10h35 às 11h25</td>
									<td><input type="checkbox" name="5" style="margin: 0 43%;" id="seg5" class="checkHora" <?php if(isset($hour[5])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="22" style="margin: 0 43%;" id="ter5" class="checkHora" <?php if(isset($hour[22])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="38" style="margin: 0 43%;" id="qua5" class="checkHora" <?php if(isset($hour[38])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="54" style="margin: 0 43%;" id="qui5" class="checkHora" <?php if(isset($hour[54])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="70" style="margin: 0 43%;" id="sex5" class="checkHora" <?php if(isset($hour[70])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="86" style="margin: 0 43%;" id="sab5" class="checkHora" <?php if(isset($hour[86])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>6</td>
									<td>11h25 às 12h15</td>
									<td><input type="checkbox" name="6" style="margin: 0 43%;" id="seg6" class="checkHora" <?php if(isset($hour[6])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="23" style="margin: 0 43%;" id="ter6" class="checkHora" <?php if(isset($hour[23])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="39" style="margin: 0 43%;" id="qua6" class="checkHora" <?php if(isset($hour[39])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="55" style="margin: 0 43%;" id="qui6" class="checkHora" <?php if(isset($hour[55])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="71" style="margin: 0 43%;" id="sex6" class="checkHora" <?php if(isset($hour[71])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="87" style="margin: 0 43%;" id="sab6" class="checkHora" <?php if(isset($hour[87])) echo 'checked'; ?>></td>
								</tr>
							</table>
							<table border="1"  style="border:none; width:725px; height:168px; margin:0 0 10px 10px; text-align:center;">
								<tr>
									<td rowspan="8" style="padding-right:10px; border:none; font-weight:bold;">V</td>
								</tr>
								<tr>
									<td colspan="2">Aula</td>
									<td style="width:96px; height:25px;">Segunda</td>
									<td style="width:96px; height:25px;">Terça</td>
									<td style="width:96px; height:25px;">Quarta</td>
									<td style="width:96px; height:25px;">Quinta</td>
									<td style="width:96px; height:25px;">Sexta</td>
									<td style="width:96px; height:25px;">Sábado</td>
								</tr>
								<tr>
									<td style="width:10px;">1</td>
									<td style="width:95px;">13h00 às 14h20</td>
									<td><input type="checkbox" name="7" style="margin: 0 43%;" id="seg7" class="checkHora" <?php if(isset($hour[7])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="24" style="margin: 0 43%;" id="ter7" class="checkHora" <?php if(isset($hour[24])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="40" style="margin: 0 43%;" id="qua7" class="checkHora" <?php if(isset($hour[40])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="56" style="margin: 0 43%;" id="qui7" class="checkHora" <?php if(isset($hour[56])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="72" style="margin: 0 43%;" id="sex7" class="checkHora" <?php if(isset($hour[72])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="88" style="margin: 0 43%;" id="sab7" class="checkHora" <?php if(isset($hour[88])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>2</td>
									<td>14h20 às 15h10</td>
									<td><input type="checkbox" name="8" style="margin: 0 43%;" id="seg8" class="checkHora" <?php if(isset($hour[8])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="25" style="margin: 0 43%;" id="ter8" class="checkHora" <?php if(isset($hour[25])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="41" style="margin: 0 43%;" id="qua8" class="checkHora" <?php if(isset($hour[41])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="57" style="margin: 0 43%;" id="qui8" class="checkHora" <?php if(isset($hour[57])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="73" style="margin: 0 43%;" id="sex8" class="checkHora" <?php if(isset($hour[73])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="89" style="margin: 0 43%;" id="sab8" class="checkHora" <?php if(isset($hour[89])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>3</td>
									<td>15h10 às 16h00</td>
									<td><input type="checkbox" name="9" style="margin: 0 43%;" id="seg9" class="checkHora" <?php if(isset($hour[9])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="26" style="margin: 0 43%;" id="ter9" class="checkHora" <?php if(isset($hour[26])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="42" style="margin: 0 43%;" id="qua9" class="checkHora" <?php if(isset($hour[42])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="58" style="margin: 0 43%;" id="qui9" class="checkHora" <?php if(isset($hour[58])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="74" style="margin: 0 43%;" id="sex9" class="checkHora" <?php if(isset($hour[74])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="90" style="margin: 0 43%;" id="sab9" class="checkHora" <?php if(isset($hour[90])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>4</td>
									<td>16h15 às 17h05</td>
									<td><input type="checkbox" name="10" style="margin: 0 43%;" id="seg10" class="checkHora" <?php if(isset($hour[10])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="27" style="margin: 0 43%;" id="ter10" class="checkHora" <?php if(isset($hour[27])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="43" style="margin: 0 43%;" id="qua10" class="checkHora" <?php if(isset($hour[43])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="59" style="margin: 0 43%;" id="qui10" class="checkHora" <?php if(isset($hour[59])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="75" style="margin: 0 43%;" id="sex10" class="checkHora" <?php if(isset($hour[75])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="91" style="margin: 0 43%;" id="sab10" class="checkHora" <?php if(isset($hour[91])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>5</td>
									<td>17h05 às 17h55</td>
									<td><input type="checkbox" name="11" style="margin: 0 43%;" id="seg11" class="checkHora" <?php if(isset($hour[11])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="28" style="margin: 0 43%;" id="ter11" class="checkHora" <?php if(isset($hour[28])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="44" style="margin: 0 43%;" id="qua11" class="checkHora" <?php if(isset($hour[44])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="60" style="margin: 0 43%;" id="qui11" class="checkHora" <?php if(isset($hour[60])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="76" style="margin: 0 43%;" id="sex11" class="checkHora" <?php if(isset($hour[76])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="92" style="margin: 0 43%;" id="sab11" class="checkHora" <?php if(isset($hour[92])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>6</td>
									<td>17h55 às 18h45</td>
									<td><input type="checkbox" name="12" style="margin: 0 43%;" id="seg12" class="checkHora" <?php if(isset($hour[12])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="29" style="margin: 0 43%;" id="ter12" class="checkHora" <?php if(isset($hour[29])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="45" style="margin: 0 43%;" id="qua12" class="checkHora" <?php if(isset($hour[45])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="61" style="margin: 0 43%;" id="qui12" class="checkHora" <?php if(isset($hour[61])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="77" style="margin: 0 43%;" id="sex12" class="checkHora" <?php if(isset($hour[77])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="93" style="margin: 0 43%;" id="sab12" class="checkHora" <?php if(isset($hour[93])) echo 'checked'; ?>></td>
								</tr>
							</table>
							<table border="1"  style="border:none; width:725px; height:126px; margin:0 0 0 10px; text-align:center;">
								<tr>
									<td rowspan="8" style="padding-right:10px; border:none; font-weight:bold;">N</td>
								</tr>
								<tr>
									<td colspan="2">Aula</td>
									<td style="width:96px; height:25px;">Segunda</td>
									<td style="width:96px; height:25px;">Terça</td>
									<td style="width:96px; height:25px;">Quarta</td>
									<td style="width:96px; height:25px;">Quinta</td>
									<td style="width:96px; height:25px;">Sexta</td>
									<td style="width:96px; border:none; font-weight:bold; color:#CD2626; text-align:center;" rowspan="5" id="tdHoras">Marque o<br />regime de<br />trabalho.</td>
								</tr>
								<tr>
									<td style="width:10px;">1</td>
									<td style="width:95px;">19h00 às 19h50</td>
									<td><input type="checkbox" name="13" style="margin: 0 43%;" id="seg13" class="checkHora" <?php if(isset($hour[13])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="30" style="margin: 0 43%;" id="ter13" class="checkHora" <?php if(isset($hour[30])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="46" style="margin: 0 43%;" id="qua13" class="checkHora" <?php if(isset($hour[46])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="62" style="margin: 0 43%;" id="qui13" class="checkHora" <?php if(isset($hour[62])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="78" style="margin: 0 43%;" id="sex13" class="checkHora" <?php if(isset($hour[78])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>2</td>
									<td>19h50 às 20h40</td>
									<td><input type="checkbox" name="14" style="margin: 0 43%;" id="seg14" class="checkHora" <?php if(isset($hour[14])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="31" style="margin: 0 43%;" id="ter14" class="checkHora" <?php if(isset($hour[31])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="47" style="margin: 0 43%;" id="qua14" class="checkHora" <?php if(isset($hour[47])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="63" style="margin: 0 43%;" id="qui14" class="checkHora" <?php if(isset($hour[63])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="79" style="margin: 0 43%;" id="sex14" class="checkHora" <?php if(isset($hour[79])) echo 'checked'; ?>></td>		
								</tr>
								<tr>
									<td>3</td>
									<td>20h55 às 21h45</td>
									<td><input type="checkbox" name="15" style="margin: 0 43%;" id="seg15" class="checkHora" <?php if(isset($hour[15])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="32" style="margin: 0 43%;" id="ter15" class="checkHora" <?php if(isset($hour[32])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="48" style="margin: 0 43%;" id="qua15" class="checkHora" <?php if(isset($hour[48])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="64" style="margin: 0 43%;" id="qui15" class="checkHora" <?php if(isset($hour[64])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="80" style="margin: 0 43%;" id="sex15" class="checkHora" <?php if(isset($hour[80])) echo 'checked'; ?>></td>
								</tr>
								<tr>
									<td>4</td>
									<td>21h45 às 22h35</td>
									<td><input type="checkbox" name="16" style="margin: 0 43%;" id="seg16" class="checkHora" <?php if(isset($hour[16])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="33" style="margin: 0 43%;" id="ter16" class="checkHora" <?php if(isset($hour[33])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="49" style="margin: 0 43%;" id="qua16" class="checkHora" <?php if(isset($hour[49])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="65" style="margin: 0 43%;" id="qui16" class="checkHora" <?php if(isset($hour[65])) echo 'checked'; ?>></td>
									<td><input type="checkbox" name="81" style="margin: 0 43%;" id="sex16" class="checkHora" <?php if(isset($hour[81])) echo 'checked'; ?>></td>
								</tr>
							</table>
							<input type="submit" value="<?php if($objetos['professor_for']->getStatus() == 0) echo 'Enviar'; elseif($objetos['professor_for']->getStatus() == 1) echo 'Atualizar'; ?>" style="margin:10px 0 0 30px;" />
						</div>
					</form>
				</div><!-- fecha conteudo -->
			</div> <!-- fecha content -->
<?php
	include(PATH_TEMPLATE.'footer.php');
?>