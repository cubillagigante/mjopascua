<?php
  require '../../php/conexion.php';
 
  $id = $_GET['id_participante'];

  $sqlpar = "SELECT a.ruta_img as 'ruta_img', a.id_participante as 'id', a.nombre_apellido as 'nombre', a.telefono as 'tel', a.encargado as 'encargado', a.telefono_emergencia as 'tel_emergencia', b.descripcion as 'color', b.hex_color as 'hex', c.descripcion as 'sexo'
  FROM participante a
  INNER JOIN color b
  ON a.id_color=b.id_color INNER JOIN sexo c ON a.id_sexo=c.id_sexo WHERE a.id_participante = $id";
  $Res = $mysqli->query($sqlpar);
  $row = $Res->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body class="bg-[#482344]">
    <div class="w-3/4 flex mt-20 shadow drop-shadow-xl gap-10 justify-center text-white text-sm mx-auto bg-[#AF3838] rounded-xl p-10 px-20">
            <section class="w-full flex  justify-center">
                <div class="mb-5 inline-block align-middle ">
                    <h1 class="mb-3 ml-4 font-bold">FOTO DE PERFIL: </h1>
                    <div class="flex justify-center flex-wrap gap-5 mb-16">

                        <div id="content-img" class="card flex items-center align-middle overflow-hidden justify-center w-80 h-[17rem] bg-gray-800 border-2 border-dashed rounded-lg">
                            <img id="imagenPrevisualizacion" src="../../public/images/<?php echo $row['id']; ?>-<?php echo $row['ruta_img']; ?>" class="object-cover rounded-lg h-full w-full" />
                                
                        </div>
                        
                    </div>
                   
                    <div class="flex justify-center ">
                        <img src="../../public/images/default/logo.png" class="rounded-full w-40"/>
                    </div>
                   
                </div>
            </section>
            <section class="w-full">
                <div class="mb-5">
                    <h1 class="mb-3 ml-4 font-bold">COLOR: </h1>
                    <input id="nombre" type="text" name="nombre_apellido" value="<?php echo strtoupper($row['color']); ?>"
                        class="p-3 rounded-full w-full drop-shadow-lg text-center font-bold" disabled/>
                        
                </div>
                <div class="mb-5">
                    <h1 class="mb-3 ml-4 font-bold">NOMBRE Y APELLIDO: </h1>
                    <input id="nombre" type="text" name="nombre_apellido" value="<?php echo strtoupper($row['nombre']); ?>"
                        class="p-3 rounded-full w-full drop-shadow-lg text-center font-bold" disabled/>
                        
                </div>
                <div class="mb-5">
                    <h1 class="mb-3 ml-4 font-bold">SEXO: </h1>
                    <input id="nombre" type="text" name="nombre_apellido" value="<?php echo strtoupper($row['sexo']); ?>"
                        class="p-3 rounded-full w-full drop-shadow-lg text-center font-bold" disabled/>
                        
                </div>
                <div class="mb-5">
                    <h1 class="mb-3 ml-4 font-bold">NÚMERO DE TELEFONO: </h1>
                    <input id="telefono" type="tel" name="telefono" value="<?php echo $row['tel']; ?>" class="p-3 rounded-full w-full drop-shadow-lg text-center font-bold" disabled/>
                </div>
                <div class="mb-5">
                    <h1 class="mb-3 ml-4 font-bold">NOMBRE DEL ENCARGADO: </h1>
                    <input  id="encargado" name="encargado" value="<?php echo strtoupper($row['encargado']); ?>"
                        class="p-3 rounded-full w-full drop-shadow-lg text-center font-bold" disabled/>
                </div>
                <div class="mb-10">
                    <h1 class="mb-3 ml-4 font-bold">TELEFONO DE EMERGENCIA: </h1>
                    <input  id="encargado" name="encargado" value="<?php echo $row['tel_emergencia']; ?>"
                        class="p-3 rounded-full w-full drop-shadow-lg text-center font-bold" disabled/>    
                </div>
                <div class="mb-2 flex flex-row justify-between relative">
                    <label for="clean">
                        <div id="drop-button" class="btn rounded-full p-3 hidden">
                            <i class="ti ti-trash "><input id="clean" name="clean" type="reset" value=""/></i>
                        </div>
                    </label>
                    <a href="participantes.php?color=1">
                        
                        <div class="btn rounded-full w-20 flex justify-center p-3">
                            <i class="ti ti-arrow-back-up"></i>
                        </div>
                       
                    </a>
                </div>
            </section>
        
    </div>
</body>
</html>

