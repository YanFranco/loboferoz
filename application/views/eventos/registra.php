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
			<div class="detailToolbar">
				<label for="nFecha">Fecha</label>
				<span><input type="text" id="nFecha" maxlength="10" class="s10" /></span>
				<label for="nNombre">Descripci&oacute;n de la sesi&oacute;n</label>
				<span><input type="text" id="nNombre" maxlength="50" class="s50" /></span>
				<label for="nTipo">Tipo Sesi&oacute;n</label>
				<span>
					<select id="nTipo" class="s13">
						<?php
						if(count($tipos) > 0){
							echo "<option value=\"-1\">Seleccione</option>";
							foreach($tipos as $index => $item) {
								$cod = $item->cod;
								$des = $item->des;
								echo "<option value=\"$cod\">$des</option>";
							}
						}
						?>
					</select>
				</span>
				<span><a href="javascript:agregarSesion()" class="confirmbtn">Agregar</a></span>
			</div>
			<div class="detailContainer">
				<?php
				$attr = array(
					"name" => "sesiones",
					"id" => "sesiones"
				);
				echo form_open("eventos/programar/guarda",$attr);
				echo form_hidden("evento",$evento);
				?>
				<table id="tblSesiones">
					<thead>
						<tr>
							<th width="3%"></th>
							<th width="64%">Nombre</th>
							<th width="20%">Tipo</th>
							<th width="10%">Fecha</th>
							<th width="3%"></th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<br/><br/>
				<a class="confirmbtn" id="sbmGuardar" href="javascript:confirmaSesiones()" style="margin:0 50px;" ></a>
				<?php
				echo form_close();
				if(isset($err)) {
					foreach($err as $error) {
						echo "
				<div class=\"msgError\">
					<p><b>Error de validaci&oacute;n del servidor: </b>$error</p>
				</div>";
					}
				}
				?>
			</div>
		</section>
	</body>
</html>