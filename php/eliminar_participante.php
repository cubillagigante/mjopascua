<?php
	
	require 'conexion.php';
 
	$id = $_GET['id_p'];
    echo $id;
	$color = $_GET['color'];
    echo $color;

	$sql = "DELETE FROM participante WHERE id_participante = '$id'";
	$resultado = $mysqli->query($sql);
    echo $resultado;
    
    header("location: ../src/registro/table.php?id=".$color);
    
	
	
?>