<?php
 
	require 'conectarBD.php';
	session_start();
	if (!isset($_SESSION['username'])) {
	    header("Location:logout.php");
	} else {

		$_SESSION['username'];

		$campoID['id'] = "'" . $_POST['id'] . "'";

		$data['fecha_inicio'] = "'" . $_POST['start_date'] . "'";
		$data['hora_inicio']  = "'" . $_POST['start_hour'] . "'";
		$data['fecha_finalizacion']    = "'" . $_POST['end_date'] . "'";
		$data['hora_finalizacion']     = "'" . $_POST['end_hour'] . "'";

		$con = new ConectorDB();
		if($con->initConexion('calendario')=='OK'){

		    $tabla     = "eventos";
		    $condicion = "id_evento=" . $campoID['id'];

		        if ($con->actualizarRegistro($tabla, $data, $condicion)) {
		            $response['msg'] = "OK";
		        } 
		} 

		echo json_encode($response);

		$con->cerrarConexion();
	}

 ?>
