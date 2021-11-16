<?php
  
	require('conectarBD.php');

	$con = new ConectorDB();
	$eventos = array();

	if($con->initConexion('calendario')=='OK'){
		$result=$con->consultas(['eventos','usuarios'], ['*'],"WHERE usuarios.email='carlosealsina@gmail.com' AND usuarios.id_usuario=eventos.fk_id_usuario"); 

		while ($row = mysqli_fetch_array($result)) {
			    $eventos[] = $row;
			}
	
	$eventos['msg'] = 'OK';	
	$eventos['eventos'] = $eventos;
	
	echo json_encode($eventos);

	}
 ?>
