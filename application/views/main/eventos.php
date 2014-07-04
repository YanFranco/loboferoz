<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title>Lobo Feroz - FIIS UNI</title>
		<?php
		echo link_tag($style);
		echo link_tag($fonts);
		?>
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script src="<?php echo base_url();?>js/home.js"></script>
	</head>
	<body onload="setSizes();" onresize="resize();">
		<header>
			<div id="headerTitle">
				<?php
				//echo img("images/uni.png");
				?>
				<h1 id="headerWelcome">Bienvenido</h1>
			</div>
			<div id="headerOptions">
				<h2 id="usrH2">
					<?php
					echo "<p><b>$username</b></p><p>Administrador del sistema</p>";
					?>
				</h2>
				<a href="<?php echo base_url()."main/modulos/destroy";?>" title="Cerrar sesion">
					<img src="<?php echo base_url()."images/logout.png";?>"/>
				</a>
				<h2 id="bsqH2">
					<input type="text" id="tbBsq" placeholder="Palabras clave" onkeyup="filtraOpciones(this.value.toUpperCase());" />
				</h2>
				<a href="javascript:showBsqForm()" title="Buscar" id="btnBsq">
					<img src="<?php echo base_url()."images/search.png";?>"/>
				</a>
			</div>
		</header>
		<section id="itemContainer">
			<div id="itemSlider">
				<?php
				echo "
				<article>
					<div class=\"articleTitle\"><h1>Seleccione un evento</h1></div>
					<div class=\"articleContainer\">";
				foreach($items as $inodo => $item){
					print_r($item);
					echo "<br/><br/>";
					//echo $item->nombre."<br/>";
					
					$nombre = $item->Nombre_Evento;
					$clase = "wbluegreen";
					$icon = img("images/event.png");
					$href = base_url();
					echo "
					<a href=\"$href\" class=\"articleItem smallIcon $clase\">
						<div>
							$icon
							<p>$nombre</p>
						</div>
					</a>";
				}
				echo "
					</div>
				</article>";
				?>
			</div>
		</section>
	</body>
</html>