<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet"  href="<?php echo base_url();?>css/styleSheet.css">
		<link rel="stylesheet"  href="<?php echo base_url();?>css/cssAlert.css">
		<script src="<?php echo base_url();?>js/myScript.js"></script>
		<script src="<?php echo base_url();?>js/jsAlert.js"></script>
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>

		<style>
			#btnClose{ float:right; cursor: pointer; height:40px; width:40px; background: url('<?php echo base_url();?>images/icons/close.png') no-repeat; background-size: 70% 70%; z-index: 80;}
		</style>
		<script>

			//var looper;
			var degrees = 0, ID;
			// var alumnos = ['Yan Franco Calderon', 'Marco Cáceres Choqque', 'Alfonso Velazques Portugal', 'Edwin Calero Chamorro', 'Aldo Inga Sanabria'];
			var alumnos = [<?php foreach ($items as $key => $value) {
				echo (($key == 0)?'':',')."'".$value->participante."'";
			}  ?>];

			var noPicked = new Array();
			var len1 = alumnos.length;

			for(i = 0; i < len1; i++)noPicked[i] = i;

			function rotateAnimation(el, val)
			{
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

				/*ooper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed*/


				var on = document.getElementById("ch1").checked;

				if(on){

					ID = degrees%len1;
					document.getElementById("status").innerHTML = "" + alumnos[ID] + "";

				}
				else{


					var len2 = noPicked.length;
					ID = noPicked[degrees%len2];

					var cad = "";
					for(i = 0; i < len2; i++)cad += noPicked[i];

					document.getElementById("status").innerHTML = "" + alumnos[ID] + "";

				}

				degrees+=val;
				if(degrees > 359)degrees = 0;

				looper = setTimeout('rotateAnimation(\''+el+'\','+val+')',1);

			}

			function muestraTexto()
			{
				var al = document.getElementById("status").value;
				document.getElementById("nombres").innerHTML += al + "\n";
			}

		</script>
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

					<h1 class = "title">Sorteos Individual</h1>
					<img src="<?php echo base_url();?>images/wolf.png" class = "title">
				</hgroup>

			</header>
			<section>

				<div id="textoPr">
					<div class="left">

						<form>

							<label id="repo">Con reposicion</label>
							<input type="checkbox" id="ch1">

						</form>

						<p><label class="disp">Alumnos</label></p>
						<textarea id ="nombres" class="showNames"></textarea>

						<script>function refres(){ location.reload(true); }</script>
						<p><input type="submit" value="Reset" id="reset" class="botones" onclick="refres();"></p>

					</div>
					<div class="right">
						<div align="center">
							<img id="img1" src="<?php echo base_url();?>images/engranaje.jpg" alt="cog1"><br/>

							<input type="submit" value="Iniciar" id="sortear" class="botones">
							<input type="submit" value="Detener" id="elegir" class="botones">


							<script type="text/javascript">

								var boton1 = document.getElementById("sortear");
								boton1.addEventListener("click", startFunction);

								var boton2 = document.getElementById("elegir");
								boton2.addEventListener("click", deleteFunction);

								function startFunction()
								{
									var check = document.getElementById("ch1").checked;
									if(check == false && window.noPicked.length == 0)
									{
										CustomAlert("Todos los alumnos ya fueron sorteados", 2);
										//alert('Ya todos los grupos fueron sorteados');
										return;

									}

									rotateAnimation("img1", 7);
									boton1.removeEventListener("click", startFunction);
									boton2.addEventListener("click", deleteFunction);
								}

								function deleteFunction()
								{
									clearTimeout(looper);
									var pos;

									for(pos = 0; pos < window.noPicked.length; pos++)
										if(window.noPicked[pos] == window.ID)break;

									if(pos < window.noPicked.length)window.noPicked.splice(pos, 1);
									boton1.addEventListener("click", startFunction);

									muestraTexto();
									boton2.removeEventListener("click", deleteFunction);

								}
							</script>
							<br/>
							<div background-color='#006699'><h1>SUERTUDO</h1></div>
							<textarea id="status" class ="nombre" ></textarea>
						 </div>
					</div>

				</div>
			</section>

		</div>
		<footer>

		</footer>
	</body>
</html>
