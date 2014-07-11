<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet"  href="<?php echo base_url();?>css/styleSheet.css">
		<script src="<?php echo base_url();?>js/scriptPrincipal.js"></script>
		<script src="<?php echo base_url();?>js/myScript.js"></script>
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
		<script>
			var degrees = 0;
			var grupos = ['Yan Franco Calderon', 'Marco Cáceres Choqque', 'Alfonso Velazques Portugal', 'Edwin Calero Chamorro', 'Aldo Inga Sanabria'];
			function rotateAnimation(el, val){

				var elem = document.getElementById(el);
				if(navigator.userAgent.match("Chrome")){
					elem.style.WebkitTransform = "rotate("+degrees+"deg)";
				} else if(navigator.userAgent.match("Firefox")){
					elem.style.MozTransform = "rotate("+degrees+"deg)";
				} else if(navigator.userAgent.match("MSIE")){
					elem.style.msTransform = "rotate("+degrees+"deg)";
				} else if(navigator.userAgent.match("Opera")){
					elem.style.OTransform = "rotate("+degrees+"deg)";
				} else elem.style.transform = "rotate("+degrees+"deg)";
				
				looper = setTimeout('rotateAnimation(\''+el+'\','+val+')',10);
				document.getElementById("status").innerHTML = "" +grupos[degrees%5]+"";

				degrees+=val;
				if(degrees > 359)degrees = 1;
				if(degrees < 0)degrees = 360;

			}

		</script>
	</head>

	<body>
		<div id="contenido">
			<header>
				<hgroup>
					<h1 class = "title">LoboFeroz - Sorteos</h1>
					<img src="<?php echo base_url();?>/images/wolf.png" class="title" />
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
							<h1>Sorteo Individual</h1>
						</hgroup>
						<form>
							<label id="repo">Con reposicion</label>
							<input type="checkbox" name="checkBoxRepo" id="checkBoxRepo">
						</form>
					</div>
					<div id="right">
						<div align="center">
							<img src="<?php echo base_url();?>/images/engranaje.jpg" />
							<div>
								<button id='sortear'>Iniciar</button>
							<button id='elegir'>Detener</button>
							</div>
							

							<script type="text/javascript">

								var boton1 = document.getElementById("sortear");
								boton1.addEventListener("click", startFunction);

								var boton2 = document.getElementById("elegir");
								boton2.addEventListener("click", deleteFunction);

								function startFunction()
								{
									rotateAnimation("img1", 2);
									boton1.removeEventListener("click", startFunction);
								}

								function deleteFunction()
								{
									clearTimeout(looper);
									boton1.addEventListener("click", startFunction);
								}
							</script>
							<br/>
							<div background-color='#006699'><h1>SUERTUDO</h1></div>
							<textarea id="status" name="status" ></textarea>
						 </div>
					</div>

				</div>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
