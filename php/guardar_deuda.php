<?php
	
	require 'conexion.php';
	
	$nombre_apellido = $_POST['nombre'];
	$deuda = $_POST['deuda'];
	
	 
  	$sql = "INSERT INTO deuda(nombre_deuda, monto, actividad) VALUES 
	('$nombre_apellido', '$deuda', 1)";
	$resultado = $mysqli->query($sql);
	

	header("location: ../src/registro/deuda.php");
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