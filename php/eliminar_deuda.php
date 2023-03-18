<?php
	
	require 'conexion.php';
 
	$id = $_GET['id'];
	
	$sql = "DELETE FROM deuda WHERE id_deuda = '$id'";
	$resultado = $mysqli->query($sql);

	header("location: ../src/registro/deuda.php");
	
?>