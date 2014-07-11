<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet"  href="<?php echo base_url();?>css/styleSheet.css">
		<script src="<?php echo base_url();?>js/scriptPrincipal.js"></script>
		<script src="<?php echo base_url();?>js/myScript.js"></script>
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
	</head>

	<body>

		<div id="contenido">

			<header>
				<hgroup>

					<h1 class = "title">LoboFeroz - Sorteos</h1>
					<img src="<?php echo base_url();?>/images/wolf.png" class = "title">
				</hgroup>

				<!--nav>
					<ul>
						<li><a href="index.html">Inicio</a></li>
						<li><a href="sorteoGrupal.html">SorteoGrupal</a></li>
						<li><a href="sorteoIndividual.html">SorteoIndividual</a></li>
						<li><a href="Reportes.html">Reportes</a></li>
					</ul>
				</nav-->	

			</header>
			<section>

				<div id="textoPr">

					<div id="left">
						<hgroup>
							<h1>Sorteo Grupal</h1>
							
						</hgroup>

						<form>
							<label id = "repo">Con reposicion</label>
							<input type="checkbox" id="checkBoxRepo" class="display">
							<p><label class="display">Numero de grupos</label></p>
							<input type="text" id="numGrupos" placeholder='Ingresa un numero' required>
							<p><label class="display">Lista de Grupos</label></p>
							<textarea id="muestraGrupos" ></textarea>
							<input type="submit" value="Sortear" id="btnSubmit">
						</form>
					</div>

					<div id="right">
						<canvas id="miCanvas" height="400", weidth="400"></canvas>

					</div>

				</div>
			</section>

		</div>
		<footer>
		
		</footer>	
	</body>
</html>
