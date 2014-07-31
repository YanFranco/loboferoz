	<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Reporte detalle de participaci&oacute;n</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/eventos/asignacion.js"></script>
	</head>
	<body>
		<header>
			<h1>Reporte detalle de participaci&oacute;n</h1>
			<h6>
				<a href="<?php echo base_url();?>" title="Al inicio" >
					<?php echo img("images/menu.png");?>
				</a>
			</h6>
		</header>
		<section>

			<div class="detailContainer">
				<?php
				// $attr = array(
				// 	"name" => "participantes",
				// 	"id" => "participantes"
				// );
				// echo form_open("eventos/programar/asigna",$attr);
				// echo form_hidden("evento",$evento);
				?>
					<table>
						<thead>
							<tr>
								<th width="20%">Participante</th>
								<th width="9%">Fecha Sesi&oacute;n</th>
								<th width="15%">Tipo Participacion</th>
								<th width="15%">Grupo</th>
								<th width="15%">Nota</th>
								<th width="20%">Comentario</th>
							</tr>
						</thead>
						<tbody>
						<?php
							//echo print_r($items);
						foreach($items as $key => $item) {
							$participante = $item->Participante;
							$fechaSesion = $item->FechaSesion;
							$tipoParticipacion = $item->TipoParticipacion;
							$grupo =$item->Grupo;
							$nota = $item->Nota;
							$comentario = $item->Comentario;
							echo "
							<tr>
								<td>$participante</td>
								<td>$fechaSesion</td>
								<td>$tipoParticipacion</td>
								<td>$grupo</td>
								<td>$nota</td>
								<td>$comentario</td>
							</tr>";
						}
						?>
						</tbody>
					</table>
			</div>
		</section>
	</body>
</html>
