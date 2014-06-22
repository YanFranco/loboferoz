
		<script>
			var degrees = 0;
			var grupos = ['Yan Franco Calderon', 'Marco Caceres Choqque', 'Alfonso Velasquez Portugal', 'Edwin Calero Chamorro', 'Aldo Inga Sanabria'];
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
				document.getElementById("status").value = "" +grupos[degrees%5]+"";
				degrees+=val;
				if(degrees > 359)degrees = 1;
				if(degrees < 0)degrees = 360;
			}
			function startFunction(){
				rotateAnimation("img1", 2);
			}
			function deleteFunction(){
				clearInterval(looper);
			}
		</script>
		<div id="center">
			<?php
			echo img(array("src" => "images/engranaje.jpg", "alt" => "cog1", "id" => "img1"));
			?>
			<!--img id="img1" src="images/engranaje.jpg" alt="cog1"--><br/>
			<button class="buttonRuleta" id="sortear" onclick="startFunction();">Iniciar</button>
			<button class="buttonRuleta" id="elegir" onclick="deleteFunction();">Detener</button>
			<br/>
			<div background-color="#006699"><h1 class="h1Ruleta">SUERTUDO</h1></div>
			<input id="status" name="status" type="text" />
		</div>