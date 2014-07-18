<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet"  href="<?php echo base_url();?>css/styleSheet.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/cssAcordion.css">
		<link rel="stylesheet"  href="<?php echo base_url();?>css/cssAlert.css">
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
		<script src="<?php echo base_url();?>js/myScript.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/move.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>

		<style>
			#btnClose{ float:right; cursor: pointer; height:40px; width:40px; background: url('img/icons/close.png') no-repeat; background-size: 70% 70%; z-index: 80;}
			#item
			{
				height: 45px;
				width: 350px;
				border:1px #333 solid;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div id = "dialogoverlay"></div>
		<div id = "dialogbox">
			<div>
				<div id = "dialogboxhead"><div id="btnClose" onclick="closeAlert();"></div></div>
				<div id = "dialogboxbody"></div>
			</div>
		</div>

		<div id="contenido">

			<header>
				<hgroup>

					<h1 class = "title">Sorteos Grupal</h1>
					<img src="img/wolf.png" class = "title">

				</hgroup>

			</header>
			<section>

				<div id="textoPr">

					<div class="left">

						<p> <label>Ingrese numero de grupos : </label>
							<input type="text" id="numGrupos" name="numGrupos" required size="10">
						</p>

						<div id="accordion" class="line">

							<div id="item">
								<p class="pointer">&#9654;</p>
								<h1><a href="#" id="ge">GRUPO ELEGIDO</a></h1>

							</div>

							<section id="item1" class="ac_hidden" name="item">
								<p class="pointer">&#9654;</p>
								<h1>
									<a href="#" id="a1">Alumno1</a>
									<a href="#" id="rand1" class = "rand">?</a>
								</h1>

								<form>
									<div id="l1" class="left" align="left">
										<p>Nota:</p>
										<p>Observación:</p>
									</div>

									<div id="r1" class="right" align="right">
										<p><input type="text"></p>
										<p><input type="text"></p>
									</div>
								</form>

							</section>

							<section id="item2" class="ac_hidden" name="item">
								<p class="pointer">&#9654;</p>
								<h1>
									<a href="#" id="a2">Alumno2</a>
									<a href="#" id="rand2" class = "rand">?</a>
								</h1>

								<form>

									<div id="l2" class="left" align="left" name="item">
										<p>Nota:</p>
										<p>Observación:</p>
									</div>

									<div id="r2" class="right" align="right">
										<p><input type="text"></p>
										<p><input type="text"></p>
									</div>

								</form>

							</section>

							<section id="item3" class="ac_hidden" name="item">
								<p class="pointer">&#9654;</p>
								<h1>
									<a href="#" id="a3">Alumno3</a>
									<a href="#" id="rand3" class = "rand">?</a>
								</h1>

								<form>

									<div id="l3" class="left" align="left">
										<p>Nota:</p>
										<p>Observación:</p>
									</div>

									<div id="r3" class="right" align="right">
										<p><input type="text"></p>
										<p><input type="text"></p>
									</div>
								</form>

							</section>

							<section id="item4" class="ac_hidden" name="item">

								<p class="pointer">&#9654;</p>
								<h1>
									<a href="#" id="a4">Alumno4</a>
									<a href="#" id="rand4" class = "rand">?</a>
								</h1>

								<form>

									<div id="l4" class="left" align="left">
										<p>Nota:</p>
										<p>Observación:</p>
									</div>

									<div id="r4" class="right" align="right">
										<p><input type="text"></p>
										<p><input type="text"></p>
									</div>

								</form>
							</section>

							<section id="item5" class="ac_hidden" name="item">

								<p class="pointer">&#9654;</p>
								<h1>
									<a href="#" id="a5">Alumno5</a>
									<a href="#" id="rand5" class = "rand">?</a>
								</h1>

								<form>

									<div id="l5" class="left" align="left">
										<p>Nota:</p>
										<p>Observación:</p>
									</div>

									<div id="r5" class="right" align="right">
										<p><input type="text"></p>
										<p><input type="text"></p>
									</div>

								</form>
							</section>

							<section id="item6" class="ac_hidden" name="item">

								<p class="pointer">&#9654;</p>
								<h1>
									<a href="#" id="a6">Alumno6</a>
									<a href="#" id="rand6" class = "rand">?</a>
								</h1>

								<form>

									<div id="l6" class="left" align="left">
										<p>Nota:</p>
										<p>Observación:</p>
									</div>

									<div id="r6" class="right" align="right">
										<p><input type="text"></p>
										<p><input type="text"></p>
									</div>

								</form>
							</section>

						</div>

						<button id="btnSort" class="botones">SORT</button>
						<input type="submit" value="ENVIAR" class="botones"  onclick="validNotes();">

					</div>

					<div class="right">

						<div align="center">
							<canvas id="miCanvas" height="350", width="400"></canvas>
						</div>

						<!--<a href="#" class="button"/>Built</a>-->
						<div align="center">
							<button id="btnBuilt" class="botones">BUILT!</button>
							<button id="btnGo" class="botones">GO!</button>
							<button id="btnStop" class="botones">STOP!</button>
							<button id="btnSort" class="botones"><a href = "index.html">Volver</a></button>

						</div>
					</div>

				</div>
			</section>

		</div>
	</body>
</html>
