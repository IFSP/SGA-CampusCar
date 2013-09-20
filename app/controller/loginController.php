<?php
	class LoginController extends Controller {
			
		public function indexAction() {
			
			if($this->session->check('user_id')) {
			
				header('Location: /');
				
			} else {
					
				if(getenv("REQUEST_METHOD") == "POST") {
					
					//Verificar escript PHP Login
					if(1 == 1) {
						
						$usuario = new Usuario;
					
						$usuario_dao = new UsuarioDAO;
						
						$usuario_papel_dao = new UsuarioPapelDAO;
						
						$id = substr($_POST["tipo"], 0, 1);;
						//$usuario->setId(rand(2, 5));
						$usuario->setId($id);
						
						$usuario = $usuario_dao->select($usuario);
						$papeis = $usuario_papel_dao->selectPapeisByUsuario($usuario->getId());
						
						if($papeis) {
							$this->session->set('user_id', $usuario->getId());
							$this->session->set('user_nome', $usuario->getNome());
							$i=0;
							foreach($papeis as $papel) {
								$_SESSION['user_papeis'][$i] = $papel['nome'];
								$i++;
							}
							header('Location: /');
						} else 
							$msg_error = 1;
					} else
						$msg_error = 1;
				}
				require(PATH_VIEW.'login.php');
				exit;
			}
		}
	}
?>