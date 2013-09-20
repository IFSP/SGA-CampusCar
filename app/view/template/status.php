			<div id="boxstatus" style="background-image: url('<?php echo PATH_UI_IMG; ?><?php if($objetos['professor_for']->getStatus() == 0)echo 'setas.png'; elseif($objetos['professor_for']->getStatus() ==1)echo 'setas2.png'; else echo 'setas3.png';?>');">	
				<ul id="status">
					<li>
						<table>
							<tr>
								<td rowspan="2"><text class="<?php if($objetos['professor_for']->getStatus() > 0) echo 'concluido'; else echo 'inconclusivo'; ?>">1</text></td>
								<td style="width:183px;"><text class="<?php if($objetos['professor_for']->getStatus() > 0) echo 'concluido-text'; else echo 'inconclusivo-text'; ?>">Definição da disponibilidade</text></td>
								<!--<td><text  style="vertical-align:button;" class="inconclusivo-text">Definição da disponibilidade</text></td>-->
							</tr>
							<tr>
								<td><span class="<?php if($objetos['professor_for']->getStatus() > 0) echo 'concluido-span'; else echo 'inconclusivo-span'; ?>">Professor - Pendente</span></td>
								<!--<td><span class="inconclusivo-span" style="vertical-align:top;">Professor - Pendente</span></td>-->
							</tr>
						</table>
					</li>
					<li>
						<table>
							<tr>
								<td rowspan="2"><text class="<?php if($objetos['professor_for']->getStatus() >= 2) echo 'concluido'; else echo 'inconclusivo'; ?>">2</text></td>
								<td style="width:183px;"><text class="<?php if($objetos['professor_for']->getStatus() >= 2) echo 'concluido-text'; else echo 'inconclusivo-text'; ?>">Atribuição de atividades</text></td>
							</tr>
							<tr>
								<td><span class="<?php if($objetos['professor_for']->getStatus() >= 2) echo 'concluido-span'; else echo 'inconclusivo-span'; ?>">Coodernador - Pendente</span></td>
							</tr>
						</table>
					</li>
					<li>
						<table>
							<tr>
								<td rowspan="2"><text class="<?php if($objetos['professor_for']->getStatus() == 4) echo 'concluido'; else echo 'inconclusivo'; ?>">3</text></td>
								<td style="width:183px;"><text class="<?php if($objetos['professor_for']->getStatus() == 4) echo 'concluido-text'; else echo 'inconclusivo-text'; ?>">Aprovação e impressão</text></td>
							</tr>
							<tr>
								<td><span class="<?php if($objetos['professor_for']->getStatus() == 4) echo 'concluido-span'; else echo 'inconclusivo-span'; ?>">CAE - Pendente</span></td>
							</tr>
						</table>
					</li>
				</ul>
			</div>