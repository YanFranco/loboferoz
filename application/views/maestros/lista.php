<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<title><?php echo $title;?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/detail.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/fonts.css" />
		<script src="<?php echo base_url();?>js/jquery-min.js"></script>
		<script src="<?php echo base_url();?>js/formList.js"></script>
		<script>
			function setValues(item){
				<?php
				echo $script;
				?>
			}
		</script>
	</head>
	<body <?php echo ($items == "") ? " onload=\"showFooter();\"" : "";?>>
		<header>
			<?php
			echo heading($title, 1);
			?>
			<h6>
				<a href="<?php echo base_url();?>" title="Al inicio" >
					<?php echo img("images/menu.png");?>
				</a>
			</h6>
		</header>
		<section>
			<div class="detailTitle">
				<?php echo heading(($items == "") ? "No hay ".strtolower($title)." en la Base de datos" : "Mostrando los ".strtolower($title), 1);?>
			</div>
			<div class="detailContainer">
				<?php
				echo $items;
				echo (isset($success)) ? $success : "";
				?>
			</div>
		</section>
		<footer>
			<div>
				<div id="btnNuevo"><a href="javascript:newItem()"> <?php echo "<div style=\"background-position:0;\"></div>"; echo heading("Nuevo",6); ?></a></div>
				<div id="btnElimina"> <a href="javascript:delItem()"><?php echo "<div style=\"background-position:-30px;\"></div>"; echo heading("Eliminar",6); ?></a></div>
				<div id="btnEdita"><a href="javascript:editItem()"><?php echo "<div style=\"background-position:-60px;\"></div>"; echo heading("Editar",6); ?></a></div>
				<div id="btnDetalle"><a href="javascript:viewItem()"><?php echo "<div style=\"background-position:-90px;\"></div>"; echo heading("Detalles",6); ?></a></div>
				<div id="btnHideFooter"><a href="javascript:hideFooter()"><?php echo "<div></div>"; echo heading("Cerrar",6); ?></a></div>
			</div>
		</footer>
		<aside>
			<?php
			echo form_open($struct["target"],array("id"=>"formData","name"=>"formData"));
			echo "<div>".heading("Nuevo registro",2)."</div>";
			echo form_input(array("id"=>"action","name"=>"action","type"=>"hidden"));
			foreach($struct["items"] as $key => $element){
				switch($element["control"]){
					case "h":
						echo form_input($element["attr"]);
						break;
					case "i":
						echo "<div>";
						echo form_label($element["caption"],($element["attr"]["id"] != "") ? $element["attr"]["id"] : "");
						echo "<span>".form_input($element["attr"])."</span>";
						echo "</div>";
						break;
					default:
						break;
				}
			}
			echo (isset($error)) ? $error : "";
			echo "<div><strong>".form_submit("btnSubmit","Enviar")."</strong><strong>".form_input(array("type"=>"button","value"=>"Cancelar","onclick"=>"hideAside();"))."</strong></div";
			echo form_close();
			?>
		</aside>
	</body>
</html>