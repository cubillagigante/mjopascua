<?php
	
	require 'conexion.php';
 
	$id = $_GET['id'];
	
	$sql = "UPDATE deuda SET actividad = 0 WHERE id_deuda = '$id'";
	$resultado = $mysqli->query($sql);

	header("location: ../src/registro/deuda.php");
	
?>