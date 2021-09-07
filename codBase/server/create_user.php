<?php

	require('conectarBD.php');

	$con = new ConectorDB();

	if($con->initConexion('calendario')=="OK"){
		$conexion = $con->getConexion();
		
		$insert = $conexion->prepare('INSERT INTO usuarios (id_usuario, email, nombre, contrasena, fecha_nacimiento) VALUES (?, ?, ?, ?, ?)');
		$insert->bind_param("issss", $id_usuario, $email, $nombre, $contrasena, $fecha_nacimiento);

		$id_usuario=1;
		$email="carlosealsina@gmail.com";
		$nombre="Carlos Eduardo Alsina Carrascal";
		$contrasena=password_hash("123456", PASSWORD_DEFAULT);
		$fecha_nacimiento="1980-02-07";

		$insert->execute();

		$id_usuario=2;
		$email="castillolizeth7@gmail.com";
		$nombre="Lizeth Catherine Castillo Tarazona";
		$contrasena=password_hash("13579", PASSWORD_DEFAULT);
		$fecha_nacimiento="1986-04-07";

		$insert->execute();

		$id_usuario=3;
		$email="carlos_e_alsina@hotmail.com";
		$nombre="Carlos Alsina";
		$contrasena=password_hash("24680", PASSWORD_DEFAULT);
		$fecha_nacimiento="1980-02-17";

		$insert->execute();

		$con->cerrarConexion();

	}else{
		echo "se presentó un error en la conexión";
	}

 ?>
