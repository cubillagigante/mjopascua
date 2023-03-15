<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM color";
  $RColor = $mysqli->query($sqlColor);
  
  $sql = "SELECT id_participante, nombre_apellido, ruta_img, descripcion FROM participante, color where participante.id_color = color.id_color ORDER BY id_participante DESC;";
  $resultado = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body class="bg-[#0CB0A6]">
    <div class="flex flex-row gap-5 px-10 pt-10">
        <div class="w-full">
            <h1 class=" text-center font-bold">COLOR: </h1>
            <select id="color" name="id_color" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black">
                <?php while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { ?>
                    <option  value="<?php echo $row['id_color']; ?>">
                        <?php echo $row['descripcion']; ?>
                    </option>
                <?php } ?>   
            </select>
        </div>
        <div class=" w-full">
            <h1 class=" text-center font-bold">NOMBRE Y APELLIDO: </h1>
            <input id="nombre" type="text" name="nombre_apellido" placeholder="Ej: Viviana Barrios"
                class="p-3 rounded-full w-full drop-shadow-lg text-center text-black" oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')"/>
                
        </div>
        <div class="flex justify-center w-96">
            <img src="../../public/images/default/logo.png" class="rounded-full w-20"/>
            
        </div>
    </div>
    <div class="ml-10 flex gap-5 my-5">
        <a class="btn p-3 px-5 text-white rounded-full" href="asistencia.php"><i class="ti ti-clipboard-list"></i></a>
        <a class="btn p-3 px-5 text-white rounded-full" href="estadistica.php"><i class="ti ti-chart-pie-filled"></i></a>
        <a class="btn p-3 px-5 text-white rounded-full" href="../juego/index.php"><i class="ti ti-brand-apple-arcade"></i></a>
        <a class="btn p-3 px-5 text-white rounded-full" href="index.php"><i class="ti ti-pencil"></i></a>
        
    </div>
    <div class="w-full text-white justify-center flex flex-wrap gap-5 text-sm mx-auto bg-[#AF3838] rounded-lg p-10">
        <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>    
            <div class="mb-5 ">
                <h1 class="mb-3 ml-4 font-bold"><?php echo $row['nombre_apellido']; ?></h1>
                <div class="">
                    <a href="datos.php?id_participante=<?php echo $row['id_participante']; ?>">
                        <div id="content-img" class="card flex items-center align-middle overflow-hidden justify-center w-80 h-[17rem] bg-gray-800 border-2 border-dashed rounded-lg">
                            <img id="imagenPrevisualizacion" src="../../public/images/<?php echo $row['id_participante']; ?>-<?php echo $row['ruta_img']; ?>" class="object-cover rounded-lg h-full w-full" />
                                
                        </div>
                    </a>
                    <i><?php echo $row['descripcion']; ?></i>
                </div>
            </div> 
        <?php } ?> 
        
    </div>
</body>
</html>
