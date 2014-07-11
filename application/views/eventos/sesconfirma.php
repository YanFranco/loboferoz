<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Programacion eventos</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/eventos/registro.js"></script>
	</head>
	<body>
		<header>
			<h1>Programaci&oacute;n de sesiones</h1>
			<h6>
				<a href="<?php echo base_url();?>" title="Al inicio" >
					<?php echo img("images/menu.png");?>
				</a>
			</h6>
		</header>
		<section>
			<div class="detailTitle">
				<h1>La operaci&oacute;n se complet&oacute; con &eacute;xito. &iquest;Qu&eacute; desea hacer ahora?</h1>
			</div>
			<div class="detailContainer">
				<a href="<?php echo base_url()."eventos/programar/participantes";?>" class="confirmbtn">Deseo registrar a los participantes del evento.</a>
				<br/><br/>
				<a href="<?php echo base_url()."eventos/programar";?>" class="confirmbtn">Quiero ver la lista de las sesiones que he programado.</a>
				<br/><br/>
				<a href="<?php echo base_url();?>" class="confirmbtn">Nada, he terminado. Ll&eacute;vame al men&uacute; principal.</a>
			</div>
		</section>
	</body>
</html>