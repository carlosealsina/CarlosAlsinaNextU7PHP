<?php

	require 'conectarBD.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location:logout.php");
}else{

$campoID['id'] = "'" . $_POST['id'] . "'";

$con = new ConectorDB();
	if($con->initConexion('calendario')=='OK'){

    $tabla = "eventos";
    $condicion = "id_evento=" . $campoID['id'];

        if ($con->eliminarRegistro($tabla, $condicion)) {
            $response['msg'] = "OK";
        } 

	}
echo json_encode($response);

$con->cerrarConexion();

}

 ?>
