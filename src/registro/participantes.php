<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM color";
  $RColor = $mysqli->query($sqlColor);
  
  $sql = "SELECT id_participante, nombre_apellido, ruta_img, descripcion FROM participante, color where participante.id_color = color.id_color";
  $resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link REL="SHORTCUT ICON" HREF="imagenes/logo5.ico">
  <title>MJO - PASCUA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../../public/css/styles.css" rel="stylesheet">
  <link rel="stylesheet" href="../../webfont/tabler-icons.css">
  <style type="text/css">
   .btn {
    background-color: rgba(0, 0, 0, 0.25);
    }

    .btn:hover {
        background-color: rgba(52, 47, 47, 0.25);
        cursor: pointer;
    }
    .ti {
        font-size: 1.25rem;
    }
    .ti-user-circle {
        font-size: 6rem;
    }
    .flex-wrap {
        flex-wrap: wrap;
    }
    .text-3xl {
        font-size: 1.875rem; /* 30px */
        line-height: 2.25rem; /* 36px */
    }
    .card {
        width: 17em;
        
    }
    .card img {
        object-fit:cover;
    }
    
  </style>
</head>
<body>
    <div class="flex flex-row gap-5 p-10">
        <div class="mb-5 w-full">
            <h1 class="mb-3 text-center font-bold">COLOR: </h1>
            <select id="color" name="id_color" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black">
                <?php while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { ?>
                    <option  value="<?php echo $row['id_color']; ?>">
                        <?php echo $row['descripcion']; ?>
                    </option>
                <?php } ?>   
            </select>
        </div>
        <div class="mb-5 w-full">
            <h1 class="mb-3 text-center font-bold">NOMBRE Y APELLIDO: </h1>
            <input id="nombre" type="text" name="nombre_apellido" placeholder="Ej: Viviana Barrios"
                class="p-3 rounded-full w-full drop-shadow-lg text-center text-black" oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')"/>
                
        </div>
        <div class="mb-5 h-full bg-[#fff] align-middle w-full">
            <h1 class="text-3xl text-center font-bold">TEAM ROJO </h1>
            
        </div>
    </div>
    <div class="w-full text-white justify-center flex flex-wrap gap-5 text-sm mx-auto bg-[#AF3838] rounded-lg p-10">
        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>    
            <div class="mb-5 ">
                <h1 class="mb-3 ml-4 font-bold"><?php echo $row['nombre_apellido']; ?></h1>
                <div class="">

                    <div id="content-img" class="card flex items-center align-middle overflow-hidden justify-center h-[17rem] bg-gray-800 border-2 border-dashed rounded-lg">
                        <img id="imagenPrevisualizacion" src="../../public/images/<?php echo $row['id_participante']; ?>-<?php echo $row['ruta_img']; ?>" class="object-contain rounded-lg h-[17rem] w-full" />
                            
                    </div>
                    <i><?php echo $row['descripcion']; ?></i>
                </div>
            </div> 
        <?php } ?> 
        
    </div>
</body>
</html>
