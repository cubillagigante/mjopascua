<?php
	
	require 'conexion.php';
	

	$nombre_apellido = $_POST['nombre_apellido'];
	$telefono = $_POST['telefono'];
	$encargado = $_POST['encargado'];
	$telefono_emergencia = $_POST['telefono_emergencia'];
	$id_sexo = $_POST['id_sexo'];
	$id_color = $_POST['id_color'];
	
	
	
	 
  	$sql = "INSERT INTO participante(nombre_apellido, telefono, encargado, telefono_emergencia, id_sexo, id_color, ruta_img, dia1, dia2, dia3) VALUES 
	('$nombre_apellido', '$telefono', '$encargado', '$telefono_emergencia', '$id_sexo', '$id_color','-', 1, 0, 0)";
	$resultado = $mysqli->query($sql);
  	

	
	header("location: ../src/registro/index.php?id_color="  .$id_color. "&s=1");
?>