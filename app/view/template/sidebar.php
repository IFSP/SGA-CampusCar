				<div id="sidebar">
					<?php
					
						for($i=0;$i<count($_SESSION['user_papeis']);$i++) {
							if($_SESSION['user_papeis'][$i] == 'Professor') {
								include(PATH_TEMPLATE.'menu-professor.php');
							} else if($_SESSION['user_papeis'][$i] == 'Coordenador') {
								include(PATH_TEMPLATE.'menu-coordenador.php');
							} else if($_SESSION['user_papeis'][$i] == 'CAE') {
								include(PATH_TEMPLATE.'menu-cae.php');
							} else if($_SESSION['user_papeis'][$i] == 'GAE') {
								include PATH_TEMPLATE.'menu-gae.php';
							}
						}
					?>
				</div><!-- fecha sidebar -->