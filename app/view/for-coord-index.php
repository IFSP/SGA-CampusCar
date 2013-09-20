<?php
	$title='FOR - Coordenador';
	include(PATH_TEMPLATE.'header.php');
?>			
			<div id="content">			
				<?php
					include(PATH_TEMPLATE.'sidebar.php');
				?>
				<div id="conteudo">
					<span class="titulo">FOR - Folha de Orientação para Horário</span>
					<form action="" method="post">
					<table border"1" style="margin:20px">
						<tr>
							<td>Ano:</td>
							<td style="vertical-align:middle;">
								<select name="data_ano" style="font-family: Arial, Helvetica, sans-serif;">
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
								<select name="data_semestre" style="font-family: Arial, Helvetica, sans-serif;">
									<option value="1" <?php echo ($professor_for->getDataSemestre() == 1 ? 'selected="selected"' : '');?>>1º</option>
									<option value="2" <?php echo ($professor_for->getDataSemestre() == 2 ? 'selected="selected"' : '');?>>2º</option>
								</select>
							</td>
							<td>Semestre</td>
							<td style="padding:0 0 0 30px;"><input type="submit" value="Visualizar" /></td>
						</tr>
					</table>
					</form>
					<br />
					<table border="1" style="margin:0 auto; width:700px">
						<tr><td colspan="2" style="text-align:right;"><?php echo $professor_for->getDataAno().' - Semestre '.$professor_for->getDataSemestre(); ?></td></tr>
						<tr style="font-weight:bold;">
							<td style="width:50%; padding: 0 0 0 5px;">Nome</td>
							<td style="width:50%; padding: 0 0 0 5px;">Status</td>
						</tr>
						<?php foreach($objetos['professor_for'] as $key => $for) : ?>
						<tr>
							<td><?php echo $objetos['professores'][$key]->getNome(); ?></td>
							<td>
							<?php if($for->getStatus() == 0) {
									echo '<span class="status-for">Aguardando preenchimento do professor</span><a href="/for/visualizar/id/'.$for->getId().'"> (Visualizar)</a>';
								} else if($for->getStatus() == 1) {
									echo '<span class="status-for">Aguardando atribuição do coordenador</span><a href="/for/atribuir/id/'.$for->getId().'"> (Atribuir)</a>';
								} else if($for->getStatus() == 2) {
									echo '<span class="status-for">Aguardando confirmação do professor</span><a href="/for/atribuir/id/'.$for->getId().'"> (Alterar)</a>';
								} else if($for->getStatus() == 3) {
									echo '<span class="status-for">Aguardando aprovação da CAE</span><a href="/for/atribuir/id/'.$for->getId().'"> (Alterar)</a>';
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