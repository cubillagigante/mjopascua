<?php
	$mysqli = new mysqli('localhost', 'root', '', 'mjopascua');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);	
	}
?>