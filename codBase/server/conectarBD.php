<?php

class ConectorDB
	{
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $conexion;

		function initConexion($nombreDB){
			$this->conexion = new mysqli($this->host, $this->user, $this->pass, $nombreDB);
			if($this->conexion->connect_error){
				return "Error: ".$this->conexion->connect_error;
				}else{
					return "OK";
				}
		}

		function ejecutarQuery($query){
			return $this->conexion->query($query);
		}

		function cerrarConexion(){
			$this->conexion->close();
		}

		function getConexion(){
			return $this->conexion;
		}

		function consultas($tablas, $campos, $condicion = ""){
			
			$sql = "SELECT ";		//" FROM ";
			$i=1;
			foreach ($campos as $key => $value) {
				$sql .= $value;
				if ($i<count($campos)) {
					$sql .= ", ";
				}else $sql .= " FROM ";
				$i++;
			}
			
			$i=1;
			foreach ($tablas as $key => $value) {
				$sql .= $value;
				if ($i<count($tablas)) {
					$sql .= ", ";
				}else $sql .= " ";
				$i++;
			}

			if($condicion == ""){
				$sql .= ";";
			}else{
				$sql .= $condicion.";";		
			}

			return $this->ejecutarQuery($sql);
		}

	}


?>