<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo PATH_UI_CSS; ?>style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" lang="pt-br">
		<meta name="robots" content="noindex">
		<script type="text/javascript" src="<?php echo PATH_UI_JS; ?>jquery1.8.2.js"></script>
		<script type="text/javascript" src="<?php echo PATH_UI_JS; ?>validacoes.js"></script>
	</head>
	<body>
	<?php
		include(PATH_TEMPLATE.'lightbox-erros.php');
	?>
	<div id="tudo">
		<div id="container">
		
			<div id="header">
				<?php if($this->session->check('user_nome')) { ?><span id="logout"><?php echo $this->session->get('user_nome'); ?><a href="/logout"> (Sair)</a></span><?php } ?>
			</div>
			
			<div class="main">
