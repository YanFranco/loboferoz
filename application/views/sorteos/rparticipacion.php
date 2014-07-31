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
								<th width="60%">Nombre</th>
								<th width="40%">Participaciones</th>
							</tr>
						</thead>
						<tbody>
						<?php
							//echo print_r($items);
							foreach($items as $key => $item) {
							$participante = $item->participante;
							$participaciones = $item->participaciones;
							echo "
							<tr>
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
