<?php
	
	require 'conexion.php';
	
	$id_color = $_POST['id_color'];
	
	$puntaje_sumar = $_POST['puntaje_sumar'];

	
	$sql = "SELECT puntaje FROM color where id_color = $id_color";
  	$resultpuntaje = $mysqli->query($sql);
	$row = $resultpuntaje->fetch_array(MYSQLI_ASSOC);
	echo $puntaje_actual = $row['puntaje'];

	echo $puntaje_nuevo = $puntaje_actual + $puntaje_sumar;

	$sql1 = "UPDATE color SET puntaje = '$puntaje_nuevo' where id_color = '$id_color'";
  	$result = $mysqli->query($sql1);
	
	
	header("location: ../src/registro/carga_puntaje.php");
?>
 