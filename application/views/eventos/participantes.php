<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Participantes programados</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/eventos/asignacion.js"></script>
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
				<?php
				echo heading("Participantes asignados al evento",1);
				?>
			</div>
			<div class="detailContainer">
				<table>
					<thead>
						<tr>
							<th width="2%"></th>
							<th width="10%"></th>
							<th width="11%">Codigo</th>
							<th width="15%">Ap.Paterno</th>
							<th width="15%">Ap.Materno</th>
							<th width="15%">Nombre</th>
							<th width="12%">Grupo</th>
							<th width="10%">Condicion</th>
							<th width="10%">Rol</th>
						</tr>
					</thead>
					<tbody>
					<?php
					foreach($items as $key => $item) {
						$i = $key + 1;
						$id = $item->id;
						$codigo = $item->codigo;
						$apepat = $item->apepat;
						$apemat = $item->apemat;
						$nombre = $item->nombre;
						$grupo = $item->grupo;
						$tipoevt = $item->tipoevt;
						$tipoparticipante = $item->tipoparticipante;
						echo "
						<tr>
							<td class=\"right\">$i</td>
							<td class=\"center\"></td>
							<td>$codigo</td>
							<td>$apepat</td>
							<td>$apemat</td>
							<td>$nombre</td>
							<td>$grupo</td>
							<td>$tipoevt</td>
							<td>$tipoparticipante</td>
						</tr>";
					}
					?>
					</tbody>
				</table>
			</div>
		</section>
	</body>
</html>