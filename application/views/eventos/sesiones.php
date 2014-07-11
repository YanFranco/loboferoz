<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title><?php echo $title;?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
	</head>
	<body>
		<header>
			<?php
			echo heading($title, 1);
			?>
			<h6>
				<a href="<?php echo base_url();?>" title="Al inicio" >
					<?php echo img("images/menu.png");?>
				</a>
			</h6>
		</header>
		<section>
			<div class="detailTitle">
				<?php echo heading($descrp,1);?>
			</div>
			<div class="detailContainer">
				<?php
				if(isset($items)){
					foreach($items as $key => $value) {
						$fecha = $value->fecha;
						$estado = $value->estado;
						$descripcion = $value->descripcion;
						echo "Sesion: $descripcion<br/>Fecha: $fecha<br/>Estado: $estado<hr/>";
					}
				}
				else {
					echo br(2).anchor(base_url()."eventos/programar/registra","Programar sesiones",array("class" => "confirmbtn"));
				}
				?>
			</div>
		</section>
	</body>
</html>