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
			<h1>Record de asistencia</h1>
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
								<th width="1%">Nro</th>
								<th width="6%">Participante</th>
								<th width="3%">Presente</th>
								<th width="3%">Presente (%)</th>
								<th width="3%">Ausente</th>
								<th width="3%">Ausente (%)</th>
								<th width="3%">Total sesiones</th>
							</tr>
						</thead>
						<tbody>
						<?php
							//echo print_r($items);
						$i= 0;
							foreach($items as $key => $item) {
							$i = $i+1;
							$participante = $item->Participante;
							$presente = $item->Presente;
							$pPresente = $item->pPresente;
							$as = $item->Ausente;
							$pAusente = $item->pAusente;
							$t =$item->Total;
							echo "
							<tr>
								<td>$i.</td>
								<td>$participante</td>
								<td>$presente</td>
								<td><b>$pPresente %</b></td>
								<td>$as</td>
								<td>$pAusente %</td>
								<td>$t</td>
							</tr>";
						}
						?>
						</tbody>
					</table>
			</div>
		</section>
	</body>
</html>
