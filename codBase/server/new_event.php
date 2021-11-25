<?php

require 'conectarBD.php';

session_start();

if (!isset($_SESSION['username'])) {
	    header("Location:logout.php");
	} else {

		$id_usuario = $_SESSION['id'];

		$con = new ConectorDB();
		if($con->initConexion('calendario')=='OK'){

		    $data['fk_id_usuario'] = "'" . $id_usuario . "'";
		    $data['fecha_inicio'] = "'" . $_POST['start_date'] . "'";
		    $data['hora_inicio']  = "'" . $_POST['start_hour'] . "'";
		    $data['fecha_finalizacion'] = "'" . $_POST['end_date'] . "'";
		    $data['hora_finalizacion'] = "'" . $_POST['end_hour'] . "'";
		    $data['titulo'] = "'" . $_POST['titulo'] . "'";
		    $data['todo_dia'] = "'" . $_POST['allDay'] . "'";

		        if ($con-> insertData('eventos', $data)) {
		            $response['msg'] = "OK";
		        }

		}

}

echo json_encode($response);

$con->cerrarConexion();

