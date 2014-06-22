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
				$xml = simplexml_load_file("data/opciones.xml");
				foreach($xml->grupo as $nodo => $grupo){
					$titulo = $grupo->titulo;
					echo "
				<article>
					<div class=\"articleTitle\"><h1>$titulo</h1></div>
					<div class=\"articleContainer\">";
					$items = $grupo->items->item;
					foreach($items as $inodo => $item){
						//echo $item->nombre."<br/>";
						$nombre = $item->nombre;
						$size = ($item->tamano == "L") ? "largeicon" : "smallIcon";
						$clase = $item->color;
						$icon = img("images/".$item->icono);
						$href = ($item->url == "") ? "#" : base_url().$item->url;
						echo "
						<a href=\"$href\" class=\"articleItem $size $clase\">
							<div>
								$icon
								<p>$nombre</p>
							</div>
						</a>";
					}
					echo "
					</div>
				</article>";
				}
				?>
				<!--article>
					<div class="articleTitle">
						<h1>Titulo del grupo</h1>
					</div>
					<div class="articleContainer">
						<a href="javascript:void(0)" class="articleItem largeicon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
					</div>
				</article>
				<article>
					<div class="articleTitle">
						<h1>Titulo del grupo</h1>
					</div>
					<div class="articleContainer">
						<a href="javascript:void(0)" class="articleItem largeicon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
					</div>
				</article>
				<article>
					<div class="articleTitle">
						<h1>Titulo del grupo</h1>
					</div>
					<div class="articleContainer">
						<a href="javascript:void(0)" class="articleItem largeicon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
						<a href="javascript:void(0)" class="articleItem smallIcon">
							<div>
								<img src="images/engranaje.jpg" />
								<p>Nombre de la opcion</p>
							</div>
						</a>
					</div>
				</article-->
			</div>
		</section>
	</body>
</html>