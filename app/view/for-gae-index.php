<?php
	$title='FOR - GAE';
	include(PATH_TEMPLATE.'header.php');
?>			
			<div id="content">			
				<?php
					include(PATH_TEMPLATE.'sidebar.php');
				?>
				<div id="conteudo">
					<span class="titulo">FOR - Folha de Orientação para Horário</span>
					<ul id="submenu"><li><a id="lancar-for">Lançar</a></li></ul>
					<br />
					<form method="POST" action="">
						<table style="margin:20px 20px 0 20px;">
							<tr>
								<td>Ano:</td>
								<td style="vertical-align:middle;">
									<select name="ano" style="font-family: Arial, Helvetica, sans-serif;">
									<?php
										for($i=(date('Y')-3);$i<=(date('Y')+3);$i++)
											if($i==$professor_for->getDataAno())
												echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';
											else
												echo '<option value="'.$i.'">'.$i.'</option>';
									?>
									</select>
								</td>
								<td style="vertical-align:middle; padding:0 0 0 20px;">
									<select name="semestre" style="font-family: Arial, Helvetica, sans-serif;">
										<option value="1" <?php echo ($professor_for->getDataSemestre() == 1 ? 'selected="selected"' : '');?>>1º</option>
										<option value="2" <?php echo ($professor_for->getDataSemestre() == 2 ? 'selected="selected"' : '');?>>2º</option>
									</select>
								</td>
								<td>Semestre</td>
								<td style="padding:0 0 0 30px;"><input type="submit" name="buscar" value="Buscar" /></td>
								<td style="padding:0 0 0 10px;"></td>
							</tr>
						</table>
					</form>
					
					<table border="1" style="margin:0 auto;">
						<tr><td colspan="2" style="text-align:right;"><?php echo $professor_for->getDataAno().' - Semestre '.$professor_for->getDataSemestre(); ?></td></tr>
						<tr style="font-weight:bold; width:50%">
							<td style="width:260px; padding: 0 0 0 5px;">Nome</td>
							<td style="width:240px; padding: 0 0 0 5px;">Status</td>
						</tr>
					<?php foreach($objetos['professor_for'] as $key => $for) : ?>
						<tr style="font-weight:bold; width:50%">
							<td style="width:260px; padding: 0 0 0 5px;"><?php echo $objetos['professores'][$key]->getNome(); ?></td>
							<td style="width:360px; padding: 0 0 0 5px;">
							<?php if($for->getStatus() == 0) {
									echo '<span class="status-for">Aguardando preenchimento do professor</span><a href="/for/visualizar/id/'.$for->getId().'"> (Visualizar)</a>';
								} else if($for->getStatus() == 1) {
									echo '<span class="status-for">Aguardando atribuição do coordenador</span><a href="/for/visualizar/id/'.$for->getId().'"> (Visualizar)</a>';
								} else if($for->getStatus() == 2) {
									echo '<span class="status-for">Aguardando confirmação do professor</span><a href="/for/visualizar/id/'.$for->getId().'"> (Visualizar)</a>';
								} else if($for->getStatus() == 3) {
									echo '<span class="status-for">Aguardando aprovação da CAE</span><a href="/for/visualizar/id/'.$for->getId().'"> (Visualizar)</a>';
								} else {
									echo '<span class="status-for">FOR Aprovada</span><a href="/for/visualizar/id/'.$for->getId().'"> (Visualizar)</a>';
								}
							?></td>
						</tr>
					<?php endforeach; ?>
					</table>
				</div><!-- fecha conteudo -->
			</div> <!-- fecha content -->
<?php
	include(PATH_TEMPLATE.'footer.php');
?>