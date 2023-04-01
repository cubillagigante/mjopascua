<?php
	
	require 'conexion.php';
	
	$nombre_apellido = $_POST['nombre_apellido'];
	$telefono = $_POST['telefono'];
	$encargado = $_POST['encargado'];
	$telefono_emergencia = $_POST['telefono_emergencia'];
	$id_sexo = $_POST['id_sexo'];
	$id_color = $_POST['id_color'];
	
	
	
	 
  	$sql = "INSERT INTO participante(nombre_apellido, telefono, encargado, telefono_emergencia, id_sexo, id_color, ruta_img, dia1, dia2, dia3) VALUES 
	('$nombre_apellido', '$telefono', '$encargado', '$telefono_emergencia', '$id_sexo', '$id_color','vacio', 0, 0, 0)";
	$resultado = $mysqli->query($sql);
	
	$id_insert = $mysqli->insert_id;
  
	
  	if($_FILES["archivo"]["error"]>0){
    	echo "Error al cargar archivo"; 
    } else {
    
		$permitidos = array("image/jpeg","image/png");
		$limite_kb = 10000;
		
		if(in_array($_FILES["archivo"]["type"], $permitidos) && $_FILES["archivo"]["size"] <= $limite_kb * 1024){
		
		$ruta = '../public/images/'.$id_insert.'-';
		$archivo = $ruta.$_FILES["archivo"]["name"];
		$nombreimg = $_FILES["archivo"]["name"];
		
		
		if(!file_exists($archivo)){
			
			$resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);
			
			if($resultado){
			echo "Archivo Guardado";
			} else {
			echo "Error al guardar archivo";
			}
			
			} else {
			echo "Archivo ya existe";
		}
		
		} else {
		echo "Archivo no permitido o excede el tamaño";
		}
    
  }
 



	$sql1 = "UPDATE participante SET ruta_img = '$nombreimg' where id_participante = '$id_insert'";
  	$result = $mysqli->query($sql1);

	$sqlcolor = "SELECT link_grupo from color where id_color = '$id_color'";
  	$resultcolor = $mysqli->query($sqlcolor);
	$rowc = $resultcolor->fetch_array(MYSQLI_ASSOC);
  	
	$fun = $rowc['link_grupo'];

	
	header( "refresh:1; url=https://api.whatsapp.com/send/?phone=".$telefono."&text=Hola *".$nombre_apellido."* te envio el link del grupo: ".$fun."&type=phone_number&app_absent=0");
?>
 
<html lang="es">
	<head>
	<title>MJO</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../dist/output.css" rel="stylesheet">
  	<link rel="stylesheet" href="../webfont/tabler-icons.css">

	</head>
	<style>
	.ti-circle-check-filled, .ti-alert-circle-filled {
        font-size: 4rem;
    }

    .back {
        background-color: #482344;

    }
	</style>
	<body>
	<?php if($resultado) { ?>
		<section>
			<div class="w-96 text-sm text-center mx-auto p-10">
				<div class="back mb-5 text-white text-center justify-content-center rounded-lg p-10 ">
					<div class="mb-5">
						<i class="ti ti-circle-check-filled"></i>    
					</div>
					<div>
						<h1 class=" font-bold"> PARTICIPANTE GUARDADO CON EXITO! </h1>
					</div>
					
						
				</div>
				<i>seras redirigido a whatsapp en unos segundos ...</i>
			</div>

		</section>
	<?php } else { ?>
		<section>
			<div class="w-96 text-sm text-center mx-auto p-10">
				<div class="back mb-5 text-white text-center justify-content-center rounded-lg p-10 ">
					<div class="mb-5">
						<i class="ti ti-alert-circle-filled"></i>    
					</div>
					<div>
						<h1 class=" font-bold"> OPPS, PARECE QUE OCURRIÓ UN PROBLEMA </h1>
					</div>
					
						
				</div>
				<a href="../src/mjo/registro/"><i class="underline-offset-1">volver</i></a>
			</div>

		</section>
	
	<?php } ?>
		
	</body>
</html>