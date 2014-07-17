	<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Reporte de participación</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/eventos/asignacion.js"></script>
	</head>
	<body>
		<header>
			<h1>Reporte	de participaci&oacute;n</h1>
			<h6>
				<a href="<?php echo base_url();?>" title="Al inicio" >
					<?php echo img("images/menu.png");?>
				</a>
			</h6>
		</header>
		<section>
			<div class="detailTitle" style="background-color:"red"">
				<?php
				echo heading("Seleccione los participantes que desee asignar al evento",1);
				?>
			</div>
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
								<th width="2%"></th>
								<th width="9%"></th>
								<th width="13%">Tipo</th>
								<th width="8%">Codigo</th>
								<th width="15%">Ap.Paterno</th>
								<th width="15%">Ap.Materno</th>
								<th width="15%">Nombre</th>
								<th width="20%">e-mail</th>
								<th width="3%"></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$clases = array("par","impar");
						$select = "
									<select name=\"tipos[]\" class=\"s12\">";
						foreach($tipos as $indiceTipo => $tipo) {
							$cod = $tipo->cod;
							$des = $tipo->des;
							$select .= "
										<option value=\"$cod\">$des</option>";
						}
						$select .= "
									</select>";
						foreach($items as $key => $item) {
							$clase = $clases[$key % 2];
							$id = $item->id;
							$codigo = $item->codigo;
							$apepat = $item->apepat;
							$apemat = $item->apemat;
							$nombre = $item->nom;
							$email = $item->email;
							echo "
							<tr class=\"$clase\">
								<td>
									<input type=\"checkbox\" name=\"markers[]\" value=\"$id\" />
									<input type=\"hidden\" name=\"participantes[]\" value=\"$id\" />
								</td>
								<td></td>
								<td>$select</td>
								<td>$codigo</td>
								<td>$apepat</td>
								<td>$apemat</td>
								<td>$nombre</td>
								<td>$email</td>
								<td></td>
							</tr>";
						}
						?>
						</tbody>
					</table>
				<?php
				echo form_close();
				?>
				<br/><br/>
				<a class="confirmbtn" id="sbmGuardar" href="javascript:confirmaParticipantes()" style="margin:0 50px;" >Asignar los participantes seleccionados</a>
			</div>
		</section>
	</body>
</html>
