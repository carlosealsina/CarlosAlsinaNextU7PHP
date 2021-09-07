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

		function insertData($tabla, $data){
			$sql = "INSERT INTO ".$tabla.' (';
			$i = 1;
			foreach ($data as $key => $value) {
				$sql .= $key;
				if($i < count($data)){
					$sql.= ', ';
				}else $sql.= ')';
				$i++;
			}
			$sql .= 'VALUES (';
			$i = 1;
			foreach ($data as $key => $value) {
				$sql .= "'".$value."'";
				if($i < count($data)){
					$sql .= ', ';
				}else $sql .= ');';
				$i++;
			}

			//echo $sql;
			return $this->ejecutarQuery($sql);
		}

		function getConexion(){
			return $this->conexion;
		}

	}


?>