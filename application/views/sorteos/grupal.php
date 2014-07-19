<!DOCTYPE html>
<html lang="es">

	<head>
		<meta charset='utf-8'>
		<link rel="stylesheet"  href="<?php echo base_url();?>css/styleSheet.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/cssAcordion.css">
		<link rel="stylesheet"  href="<?php echo base_url();?>css/cssAlert.css">
		<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.js"></script>
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

		<script>

			addEventListener('load',init);
			addEventListener('load',doBuilt);

			var offset = 0;
			var add = 25/360;

			var h = 320;
			var w = 350;
			var lastend = 0;

			var radius = 120;
			var centerx = w / 2 - 20;
			var centery = h / 2;


			var colist = new Array('#0099CC', '#009999', '#99CC00', '#FF5050', '#CC6600',
						 '#996633', '#3366FF', '#9933FF', '#00CC66', '#FF0000', '#CCCC00', '#999966');


			// var nameGroup = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');
			var nameGroup = new Array(<?php foreach ($items as $key => $value) {
				echo (($key == 0)?'':',')."'".$value->codigoGrupo."'";
			}  ?>);

			var alumno = { id:"", nombre:""};
			var g = new Array();

			var limitGroup = <?php foreach ($numGrupos as $key => $value) {
				echo (($key == 0)?'':',')."'".$value->numGrupos."'";
			}  ?>;
//			var limitGroup = 7;
			var limitAlumGroup = 6;

			g[0] = [{id: "0", nombre: "Marco Cáceres"}, {id:"1", nombre: "Yan Franco Calderon"}, {id: "2",nombre: "Alfonso Velásquez"}, {id: "3", nombre: "Aldo Inga"} , {id: "2",nombre: "Maria Quispe"}, {id: "2",nombre: "Jenny Cueva"}];
			g[1] = [{id: "0", nombre: "Jonathan Durand"}, {id: "1", nombre: "Cristhian Espinoza"}];
			g[2] = [{id: "0", nombre: "Luis Pando"}, {id: "1", nombre: "Edwin Kenedy"}, {id: "2", nombre: "Julio Buendia"}, {id: "3", nombre: "Luis Quispe"}];
			g[3] = [{id: "0", nombre: "Marco Rojas"}, {id: "1", nombre: "Larry Soto"}, {id: "2", nombre: "Gustavo Collantes"}, {id: "3", nombre: "Luis Carrion"}, {id: "2",nombre: "Ernesto Fuentes"}];
			g[4] = [{id: "0", nombre: "Roberto Cespedes"}, {id: "1", nombre: "Luis Arevalo"}, {id: "2", nombre: "Diego Mansilla"}, {id: "3", nombre: "Fiorella Fuentes"}];
			g[5] = [{id: "0", nombre: "Patricia Villanueva"}, {id: "1", nombre: "Cristhian Sotelo"}, {id: "2", nombre: "Pedro Gonzales"}, {id: "3",nombre: "Franco Torres"}, {id: "2",nombre: "Francisco Fernandez"}, {id: "2",nombre: "Antonio Cespedes"}];
			g[6] = [{id: "0", nombre: "Patrick Espinoza"}, {id: "1", nombre: "Luisa Quispe"}, {id: "2", nombre: "Tatiana Sore"}, {id: "3", nombre: "Victor Cueva"}, {id: "2",nombre: "Armando Gonzales"}];

			function CustomAlert(dialog, tipe)
			{
				//tipe 0 error red circle, tipe 1 warning yellow triangle
				//tipe 2 Nota blue circle !, tipe3 succesfull submit check
				var winW = window.innerWidth;
				var winH = window.innerHeight;

				var dialogoverlay = document.getElementById('dialogoverlay');
				var dialogbox = document.getElementById('dialogbox');

				dialogoverlay.style.display = "block";
				dialogoverlay.style.height = winH+"px";

				dialogbox.style.left = (winW/2) - 200+"px";
				dialogbox.style.top = (winH/2 - 130) + "px";

				dialogbox.style.display = "block";

				if(tipe == 0){
					document.getElementById('dialogboxbody').innerHTML = '<img src="img/icons/wrong.png" class="icons">' + dialog;
					dialogbox.style.background = "#CC4040";
				}

				if(tipe == 1){
					document.getElementById('dialogboxbody').innerHTML = '<img src="img/icons/warning.png" class="icons">' + dialog;
					 dialogbox.style.background = "#FFCC66";

				}

				if(tipe == 2){
					document.getElementById('dialogboxbody').innerHTML = '<img src="img/icons/message.png" class="icons">' + dialog;
					dialogbox.style.background = "#6699FF";
				}

				if(tipe == 3){
					document.getElementById('dialogboxbody').innerHTML = '<img src="img/icons/complete.png" class="icons">' + dialog;
					dialogbox.style.background = "#66FF66";
				}

			}

			function closeAlert()
			{
				document.getElementById('dialogbox').style.display = "none";
				document.getElementById('dialogoverlay').style.display = "none";
			}

			function isNum(cad)
			{
				for(i = 0; i < cad.length; i++)if(cad[i] < '0' || cad[i] > '9')return false;
				return true;
			}

			function doBuilt()
			{
				var btn1 = document.getElementById("btnBuilt");
				btn1.addEventListener("click", built);
			}

			function built()
			{
				//Inicializando listeners

				var total = document.getElementById("numGrupos").value;
				if(isNum(total) == false)
				{
					CustomAlert("Introduzca un numero, no letras", 0);
					return;
				}

				if(total > limitGroup || total <= 0)
				{
					CustomAlert("Introduce un numero entre 1 y " + limitGroup, 0);
					return;
				}

				printRectangles(total);

				for(i = 0; i < total; i++)addSector(0, 1/total, i);
				initListener();

				for(i = 1; i <= limitAlumGroup; i++)document.getElementById("item" + i).style.display = "none";
				//clear all divs names


				idLucky = null;

				for(i = 0; i < limitAlumGroup; i++)
				{
					document.forms[i].elements[0].value = null;
					document.forms[i].elements[1].value = null;
				}

				document.getElementById("textoPr").style.height = "430px";
			}

			/*Agregar un sector con offset ofs y de angulo en radianes frac con color colist[i]*/
			function addSector(ofs, frac, i)
			{
				var canvas = document.getElementById("miCanvas");
				var ctx = canvas.getContext('2d');

				ctx.beginPath();
				ctx.lineWidth = 1;

				ctx.fillStyle = colist[i];
				ctx.moveTo(centerx,centery);

				var arcsector = Math.PI * (2 * frac);
				ctx.arc(centerx, centery, radius, lastend - ofs, lastend + arcsector - ofs, false);

				ctx.strokeStyle = "black";
				ctx.lineTo(centerx, centery);

				ctx.fill();
				ctx.stroke();

				ctx.closePath();
				lastend += arcsector;
			}

			/*Inicializar la ruleta y flecha*/
			function init(){ addSector(0, 1, 0); printArrow();}

			/* Pintar flecha */
			function printArrow()
			{
				var c1 = document.getElementById("miCanvas");
			    var cxt1 = c1.getContext("2d");



			    cxt1.strokeStyle = "black";
			    cxt1.fillStyle = "#00FF00";

			    var x = centerx + radius;
			    var y = centery;

			    cxt1.beginPath();
			    cxt1.lineWidth = 1;

			    cxt1.moveTo(x, y);

			    cxt1.lineTo(x + 30, y + 30);
			    cxt1.lineTo(x + 30, y + 15);
			    cxt1.lineTo(x + 50, y + 15);
			    cxt1.lineTo(x + 50, y - 15);
			    cxt1.lineTo(x + 30, y - 15);
			    cxt1.lineTo(x + 30, y - 30);
			    cxt1.lineTo(x, y);

			    cxt1.stroke();
			   	cxt1.closePath();
			    cxt1.fill();

			}

			/*Pintar la leyenda de grupos*/
			function printRectangles(total)
			{
				var x = 30, y = 310;

				var c2 = document.getElementById("miCanvas");
			    var cxt2 = c2.getContext("2d");
			    cxt2.beginPath();


			    //var colDer = document.getElementById("right").backgroundColor;

			    cxt2.fillStyle = "rgba(231, 76, 60,1.0)"; ////////////////////// ARREGLAR RECUPERAR EL COLOR DEL DIV RIGHT
			   	cxt2.fillRect(x - 3, y - 3, 400, 400);

				for(i = 0; i < total; i++){

					cxt2.fillStyle = "black";
			    	cxt2.fillRect(x - 1, y - 1, 34, 24);

					cxt2.fillStyle = colist[i];
			    	cxt2.fillRect(x, y, 32, 22);

			    	cxt2.fillStyle = "black";
			    	cxt2.font="15px 'Russo One', sans-serif";

					cxt2.fillText(nameGroup[i], x + 11, y + 19,50);
					x += 40;
				}

				cxt2.fill();
				cxt2.closePath();
			}

			/*Encontrar suertudo busqueda en intervalos*/
			var idLucky;
			function getLucky()
			{
				var res = -1;
				var total = document.getElementById('numGrupos').value;

				var alfa = Math.PI * 2 / total;
				var EPS = 1e-6;

				for(i = 0; i < total && res == -1; i++)
				{
					var ini = i * alfa - offset;
					var fin = (i + 1) * alfa - offset;

					if(ini  < -EPS)ini += 2 * Math.PI;
					if(fin  < -EPS)fin += 2 * Math.PI;

					if(ini > fin - EPS)res = i;
				}

				idLucky = res;
			}

			/* Pintar circulo centrado con el nombre del grupo suertudo */
			function printLucky()
			{
				var canvas = document.getElementById("miCanvas");
				var ctx = canvas.getContext('2d');

				ctx.beginPath();
				ctx.fillStyle = "#1d1d1d";

				ctx.moveTo(centerx, centery);
				var arcsector = Math.PI * 2;

				ctx.arc(centerx, centery, radius/2, 0, arcsector, false);
				ctx.fill();

				ctx.closePath();

				getLucky(); // actualizando idLucky
				ctx.fillStyle = "#e44e2d";

			    ctx.font="55px 'Russo One', sans-serif";
				ctx.fillText(nameGroup[idLucky], centerx - 16, centery + 16, 50);

			}



			/*
			function sorteoIndividual()nombre:
			{
				var al = document.getElementById("nombres").value;
				document.getElementById("nombres").innerHTML += al + "\n";
			}
			*/

			/*Pintar la ruleta varias veces con un offset que incrementa en add*/
			function rotate()
			{

				pie(offset);
				looper = setTimeout('rotate()', 0);

				offset += add;
				if(offset >= 2 * Math.PI)offset -= 2 * Math.PI;
			}

			/*Pintar la ruleta con un offset offs*/
			function pie(offs)
			{
				  var total = document.getElementById('numGrupos').value;
				  for(i = 0; i < total; i++)addSector(offs, 1/total, i);
			}

			/*Evento que inicializa los listener de los botones 'Go' y 'Stop'*/
			function initListener()
			{
				var btn2 = document.getElementById("btnGo");
				btn2.addEventListener("click", go);

			}

			/* Evento que gira la ruleta (boton 'GO')*/
			function go()
			{
				document.getElementById('numGrupos').disabled = true;

				var btn1 = document.getElementById("btnBuilt");
				btn1.removeEventListener("click", built);

				var btn2 = document.getElementById("btnGo");
				btn2.removeEventListener("click", go);

				var btn3 = document.getElementById("btnStop");
				btn3.addEventListener("click", stop);

				rotate();

			}

			/* Evento que detiene la ruleta (boton 'STOP') */
			function stop()
			{
				clearTimeout(looper);

				var btn4 = document.getElementById("btnSort");
				btn4.addEventListener("click", Sort);

				var btn3 = document.getElementById("btnStop");
				btn3.removeEventListener("click", stop);

				var btn1 = document.getElementById("btnBuilt");
				btn1.addEventListener("click", built);

				document.getElementById('numGrupos').disabled = false;

				printLucky();
				showAllGroup();

				var len = g[idLucky].length;
				for(i = 1; i <= len; i++)document.getElementById("item" + i).style.display = "block";

				ct = len;
				for(i = 0; i < len; i++)auxID[i] = false;



				for(i = 1; i <= len; i++)document.getElementById("rand" + i).innerHTML = "?";
				if(len >= 5)document.getElementById("textoPr").style.height = "540px";

				for(i = 1; i <= limitGroup; i++)document.getElementById("item" + i).className = "ac_hidden";

			}

			var auxID = [false, false, false, false];
			var ct;

			function showAllGroup()
			{
				var len = g[idLucky].length;
				for(i = 0; i < len; i++)document.getElementById("a" + (i + 1)).innerHTML = g[idLucky][i].nombre;
				for(i = 0; i < len; i++)auxID[i] = false;
				ct = len;

			}


			function choose(e)
			{

				e.preventDefault();
				if(ct == 0)
				{
					CustomAlert("Todo el grupo ya está sorteado.", 2);
					return;
				}

				var len = g[idLucky].length;
				var i = Math.floor(Math.random() * len);

				while(true)
				{
					var i = Math.floor(Math.random() * len);
					if(auxID[i] == false)
					{
						auxID[i] = true;
						ct--;
						break;
					}
				}

				document.getElementById("sorting").innerHTML += g[idLucky][i].nombre + "\n";

			}

			function submitNote(e)
			{
				e.preventDefault();
				CustomAlert('El registro fue enviado', 3);
			}

			function Sort()
			{
				var len = g[idLucky].length;
				var nums = new Array();

				for(i = 0; i < len; i++)nums.push(i);

				while(i--){
			        var j=Math.floor( Math.random() * (i+1) );
			        var tmp=nums[i];
			        nums[i]=nums[j];
			        nums[j]=tmp;
			    }

			    // RAMDON DE LOS ALUMNOS DEL GRUPO ELEGIDO
			    for(i = 0; i < len; i++)document.getElementById("rand" + (i + 1)).innerHTML = (nums[i] + 1);


			}

			/* Valida notas de cada integrante del grupo y envia*/
			function validNotes()
			{


				if(idLucky == null)
				{
					CustomAlert('No hay grupos sorteados aún', 1);
					return;
				}
				var len = g[idLucky].length;

				for(i = 0; i < len; i++)
				{
					var nota = document.forms[i].elements[0].value;
					if(nota < 0 || nota > 20 || nota =="")
					{
						CustomAlert('Ingrese una nota entre 0 y 20 en el registro ' + (i + 1), 0);
						return;
					}

				}

				CustomAlert('Los registros fueron enviados satisfactoriamente', 3);
				return;
			}


		</script>
	</body>

</html>
