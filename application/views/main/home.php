<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<?php
		echo link_tag($style);
		echo link_tag($fonts);
		?>
	</head>
	<body>
		<header>
			<ul>
				<li class="headLogo">
					<div>
						<?php
						echo img("images/uni.png");
						$url = base_url();
						echo "<div>".heading('Bienvenido, usuario', 3).heading('Software de apoyo al curso - UNI-FIIS 2014', 5)."</div>";
						?>
					</div>
				</li>
				<li class="<?php echo ($ref == "home") ? "headSelected" : "headItem";?>">
					<a href="<?php echo $url;?>">Inicio</a>
				</li>
				<li class="<?php echo ($ref == "regs") ? "headSelected" : "headItem";?>">
					<a href="<?php echo $url."main/modulos/registros";?>">Registros</a>
				</li>
				<li class="<?php echo ($ref == "asis") ? "headSelected" : "headItem";?>">
					<a href="<?php echo $url."main/modulos/asistencia";?>">Asistencia</a>
				</li>
				<li class="<?php echo ($ref == "sort") ? "headSelected" : "headItem";?>">
					<a href="<?php echo $url."main/modulos/sorteos";?>">Sorteos</a>
				</li>
				<li class="<?php echo ($ref == "pers") ? "headSelected" : "headItem";?>">
					<a href="<?php echo $url."main/modulos/personalizacion";?>">Personalizaci&oacute;n</a>
				</li>
				<li class="headSpace">
					<!---->
				</li>
			</ul>
		</header>
		<section>
			<?php
			switch ($ref) {
				case "home":
					$this->load->view("main/main");
					break;
				case "regs":
					$this->load->view("main/registrar");
					break;
				case "asis":
					$this->load->view("main/asistencia");
					break;
				case "sort":
					$this->load->view("main/sortear");
					break;
				case "pers":
					$this->load->view("main/parametros");
					break;
				default:
					break;
			}
			?>
		</section>
	</body>
</html>