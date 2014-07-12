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

					<h1 class = "title">Sorteos Grupal</h1>
					<img src="img/wolf.png" class = "title">

				</hgroup>

			</header>
			<section>

				<div id="textoPr">

					<div id="left">

						<form name="formGrupos">

							<p> <label>Ingrese #grupos : </label>
								<input type="text" id="numGrupos" name="numGrupos" required size="10">
							</p>

							<p> <label>Grupos suertudo: </label>
								<textarea id ="show" class="showNames"></textarea>
							</p>

							<p> <label>Sortear Grupo: </label>
								<button id="pushSort" class="botones" onclick = "choose(event);">SORTEAR</button>
								<textarea id ="sorting" class="showNames"></textarea>
							</p>


						</form>

					</div>

					<div id="right">
						<canvas id="miCanvas" height="350", width="400"></canvas>
						<button class="botones" onclick="built();">BUILT!</button>
						<button id="btnGo" class="botones">GO!</button>
						<button id="btnStop" class="botones">STOP!</button>

						<script>
							initListener();
						</script>
					</div>

				</div>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
