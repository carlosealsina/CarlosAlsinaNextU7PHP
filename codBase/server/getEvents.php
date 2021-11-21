<?php
  
	require('conectarBD.php');
	session_start();

	

		$con = new ConectorDB();
		$eventos = array();

		if($con->initConexion('calendario')=='OK'){
			$result=$con->consultas(['eventos','usuarios'], ['*'],"WHERE usuarios.email='". $_SESSION['username'] ."' AND usuarios.id_usuario=eventos.fk_id_usuario"); 
			$i=0;
			while ($row = mysqli_fetch_array($result)) {

				    $eventos['eventos'][$i]['id']    = $row['id_evento'];
	                $eventos['eventos'][$i]['title'] = $row['titulo'];
	                $eventos['eventos'][$i]['start'] = $row['fecha_inicio'] . ' ' . $row['hora_inicio'];
	                $eventos['eventos'][$i]['end']   = $row['fecha_finalizacion'] . ' ' . $row['hora_finalizacion'];
	                $i++;
				}

		$eventos['msg'] = 'OK';	
		
		echo json_encode($eventos);

		}

	
 ?>
