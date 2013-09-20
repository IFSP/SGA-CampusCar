<?php
	$title='Login';
	include PATH_TEMPLATE.'header.php';
?>			
			<div id="content">
			
				<center>
				<form method="post" action="/login">
					<fieldset>
						<legend>Login</legend>
						<?php 
						
							if(isset($msg_error)){
								echo'<div id="erro">Usuário ou senha inválida!</div>';
							}
							
						?>
						<!--
						<label for="login">Usuário: </label><input name="login" id="login" class="campo" /><br />
						<label for="senha">Senha: </label><input type="password" name="senha" id="senha" class="campo" /><br />
						<input type="checkbox" name="lembrarUsuario" id="lembrarUsuario" /><label for="lembrarUsuario" id="manter">Manter conectado</label><br />
						-->
						<input type="submit" name="tipo" value="1 Administrador" id="submit" />
						<input type="submit" name="tipo" value="2 Professor" id="submit" />
						<input type="submit" name="tipo" value="3 Coordenador" id="submit" />
						<input type="submit" name="tipo" value="4 GAE" id="submit" />
						<input type="submit" name="tipo" value="5 CAE" id="submit" />

					</fieldset>
				</form>
				</center>

			</div> <!-- fecha content -->
<?php
	include PATH_TEMPLATE.'footer.php';
?>