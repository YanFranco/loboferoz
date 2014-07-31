	<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Record de participacion</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/eventos/asignacion.js"></script>
	</head>
	<body>
		<header>
			<h1>Record de participacion individual</h1>
			<h6>
				<a href="<?php echo base_url();?>" title="Al inicio" >
					<?php echo img("images/menu.png");?>
				</a>
			</h6>
		</header>
		<section>

			<div class="detailContainer">
						<?php foreach($items as $key => $item) {
						$fechaActual = $item->fechaActual;
						$fechaFin= $item->fechaFin;
						$fechaInicio = $item->fechaInicio;} ?>
					<br><b>Fecha Inicio Evento :</b> <?php echo $fechaInicio; ?> </br>
					<br><b>Fecha Fin Evento    :</b> <?php echo $fechaFin; ?></br>
					<br><b>Fecha Actual        :</b> <?php echo $fechaActual; ?></br>
					<table>
						<thead>
							<tr>
<<<<<<< HEAD
								<th width="60%">Nombre</th>
								<th width="40%">Participaciones</th>
=======
								<th width="5%">Nro</th>
								<th width="60%">Nombre</th>
								<th width="35%">Participaciones</th>
>>>>>>> origin/master
							</tr>
						</thead>
						<tbody>
						<?php
							//echo print_r($items);
							$i=0;
							foreach($items as $key => $item) {
							$i = $i +1;
							$participante = $item->participante;
							$participaciones = $item->participaciones;
							echo "
							<tr>
								<td>$i.</td>
								<td>$participante</td>
								<td>$participaciones</td>
							</tr>";
						}
						?>
						</tbody>
					</table>
			</div>
		</section>
	</body>
</html>
