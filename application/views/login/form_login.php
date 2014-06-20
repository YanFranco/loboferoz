<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Ingreso al sistema</title>
		<?php
		echo link_tag(array("href" => "css/login.css","rel" => "stylesheet","type" => "text/css"));
		echo link_tag(array("href" => "css/fonts.css","rel" => "stylesheet","type" => "text/css"));
		?>
		<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>
		<?php
		//echo validation_errors();
		echo form_open("main/modulos",array("class" => "login"));
		?>
			<p>
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" placeholder="Ingrese su usuario"/>
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" id="passowrd" name="password" placeholder="Ingrese clave"/>
			</p>
			<p class="login-submit">
				<!--input type="submit" class="login-button" value="Login"/-->
				<button type="submit" class="login-button" onclick="this.submit();">Login</button>
			</p>
			<p class="forgot-password">
				<a><?php echo (isset($err)) ? $err : "";?></a>
			</p>
		<?php
		echo form_close();
		?>
	</body>
</html>