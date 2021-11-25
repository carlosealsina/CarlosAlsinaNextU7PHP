<?php

	require('conectarBD.php');

	$con = new ConectorDB();
	$msg = array();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if($con->initConexion('calendario')=='OK'){
		$result=$con->consultas(['usuarios'], ['id_usuario', 'email','contrasena'], "WHERE email='$username'");

		while ($row = mysqli_fetch_array($result)) {
			    if (password_verify($password, $row['contrasena'])){
			    	session_start();
			    	$_SESSION['username'] = $username;
			    	$_SESSION['id'] = $row['id_usuario'];
			    	$msg['msg'] = 'OK';
			    }else{
			    	$msg['msg'] = 'Usuario o contraseña incorrectos';
			    }
			}

		echo json_encode($msg);
	}else{
		echo "error de conexión";
	}

	$con->cerrarConexion();

?>
