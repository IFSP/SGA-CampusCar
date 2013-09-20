<?php
	$title='FOR - Professor';
	include(PATH_TEMPLATE.'header.php');
?>			
			<div id="content">			
				<?php
					include(PATH_TEMPLATE.'sidebar.php');
				?>
				<div id="conteudo">
					<span class="titulo">FOR - Folha de Orientação para Horário</span>
					<form action="" method="post">
						<table style="margin:20px">
							<tr>
								<td>Ano:</td>
								<td style="vertical-align:middle;">
									<select name="ano" style="font-family: Arial, Helvetica, sans-serif;"><?php 
												for($i=(date('Y')-3);$i<=(date('Y')+3);$i++)
													if($i==date('Y'))
														echo '<option selected="selected" value="'.$i.'">'.$i.'</optio>';
													else
														echo '<option value="'.$i.'">'.$i.'</optio>';
											?>
									</select>
								</td>
								<td style="vertical-align:middle; padding:0 0 0 20px;">
									<select name="semestre" style="font-family: Arial, Helvetica, sans-serif;">
										<option value="1" <?php echo (date('m')<=6 ? 'selected="selected"' : '');?> >1º</option>
										<option value="2" <?php echo (date('m')>6 ? 'selected="selected"' : '');?> >2º</option>
									</select>
								</td>
								<td>Semestre</td>
								<td style="padding:0 0 0 30px;"><input type="submit" value="Pesquisar" /></td>
							</tr>
						</table>
					</form>
					<br />
					<table border="1" style="margin:0 auto; width:500px">
						<tr style="font-weight:bold;">
							<td style="width:15%; padding: 0 0 0 5px;">Ano</td>
							<td style="width:15%; padding: 0 0 0 5px;">Semestre</td>
							<td style="width:70%; padding: 0 0 0 5px;">Status</td>
						</tr>
						<?php foreach($professores_for as $for) : ?>
						<tr>
							<td><?php echo $for->getDataAno(); ?></td>
							<td><?php echo $for->getDataSemestre(); ?></td>
							<td><?php if($for->getStatus() == 0) {
									echo '<span class="status-for">Aguardando preenchimento do professor</span><a href="/for/preencher/id/'.$for->getId().'"> (Preencher)</a>';
								} else if($for->getStatus() == 1) {
									echo '<span class="status-for">Aguardando atribuição do coordenador</span><a href="/for/preencher/id/'.$for->getId().'"> (Alterar)</a>';
								} else if($for->getStatus() == 2) {
									echo '<span class="status-for">Aguardando confirmação do professor</span><a href="/for/confirmar/id/'.$for->getId().'"> (Confirmar)</a>';
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