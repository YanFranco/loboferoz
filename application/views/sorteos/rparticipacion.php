	<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Record de asistencia</title>
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
					<table>
						<thead>
							<tr>
								<th width="6%">Nombre</th>
								<th width="3%">Participaciones</th>
								<th width="3%">Fecha inicio Evento</th>
								<th width="3%">Fecha Actual</th>
								<th width="3%">Fecha Fin Evento</th>
							</tr>
						</thead>
						<tbody>
						<?php
							//echo print_r($items);
							foreach($items as $key => $item) {
							$participante = $item->participante;
							$participaciones = $item->participaciones;
							$fechaInicio = $item->fechaInicio;
							$fechaActual = $item->fechaActual;
							$fechaFin= $item->fechaFin;
							echo "
							<tr>
								<td>$participante</td>
								<td>$participaciones</td>
								<td>$fechaInicio</td>
								<td><b>$fechaActual</b></td>
								<td>$fechaFin</td>
							</tr>";
						}
						?>
						</tbody>
					</table>
			</div>
		</section>
	</body>
</html>
