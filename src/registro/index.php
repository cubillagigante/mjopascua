<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM color";
  $RColor = $mysqli->query($sqlColor);

  $sqlSexo = "SELECT * FROM sexo";
  $RSexo = $mysqli->query($sqlSexo);
  

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
    <div class="w-96 text-white text-sm mx-auto bg-[#AF3838] rounded-lg p-10">
        <form method="POST" action="../../php/guardar_participante.php" autocomplete="off" enctype="multipart/form-data" onsubmit="return validacion()">
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">FOTO DE PERFIL: </h1>
                <div class="flex flex-row gap-5">

                    <div id="content-img" class="flex items-center align-middle overflow-hidden justify-center h-[17rem] w-full bg-gray-800 border-2 border-dashed rounded-lg">
                            <img id="imagenPrevisualizacion" src="../../public/images/default/perfil.webp" class="object-contain rounded-lg h-64 w-full" />
                        
                    </div>
                    <div class=" grid content-center">
                        <label for="archivo">
                            <div class="btn rounded-full p-3">
                                
                                <i class="ti ti-photo "></i>
                                <input name="archivo" id="archivo" ref="myFiles" type="file" class="hidden" accept="image/jpeg"/>

                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">COLOR: </h1>
                <select id="color" name="id_color" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black">
                    <option value="0">Seleccione aqui</option>
                    <?php while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $row['id_color']; ?>">
                            <?php echo $row['descripcion']; ?>
                        </option>
                    <?php } ?>   
                </select>
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NOMBRE Y APELLIDO: </h1>
                <input id="nombre" type="text" name="nombre_apellido" placeholder="Ej: Viviana Barrios"
                    class="p-3 rounded-full w-full drop-shadow-lg text-center text-black" oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')"/>
                    
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">SEXO: </h1>
                <select id="sexo" name="id_sexo" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black">
                    <option value="0">Seleccione aqui</option>
                    <?php while($row = $RSexo->fetch_array(MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $row['id_sexo']; ?>">
                            <?php echo $row['descripcion']; ?>
                        </option>
                    <?php } ?>  
                </select>
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NÚMERO DE TELEFONO: </h1>
                <input id="telefono" type="tel" name="telefono" placeholder="Ej: 0981234567" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black" oninput="this.value = this.value.replace(/[^0-9]/,'')"/>
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NOMBRE DEL ENCARGADO: </h1>
                <input id="encargado" name="encargado" placeholder="Ej: Magali Barrios"
                    class="p-3 rounded-full w-full drop-shadow-lg text-center text-black" oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')"/>
            </div>
            <div class="mb-10">
                <h1 class="mb-3 ml-4 font-bold">TELEFONO DE EMERGENCIA: </h1>
                <input id="emergencia" type="tel" name="telefono_emergencia" placeholder="Ej: 0991234567" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black" oninput="this.value = this.value.replace(/[^0-9]/,'')"/>
            </div>
            <div class="mb-2 flex flex-row justify-between relative">
                <label for="clean">
                    <div id="drop-button" class="btn rounded-full p-3">
                        <i class="ti ti-trash "><input id="clean" name="clean" type="reset" value=""/></i>
                    </div>
                </label>
                <label for="submit">
                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-circle-plus"><input type="submit" name="submit" id="submit" class="font-bold cursor-pointer" value=""/></i>
                    </div>
                </label>
            </div>
        </form>
    </div>
</body>
</html>

<script>
var $seleccionArchivos = document.querySelector("#archivo"),
  $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion"), $imagencontent= document.querySelector("#content-img");
  
  // Escuchar cuando cambie
  $seleccionArchivos.addEventListener("change", () => {
  // Los archivos seleccionados, pueden ser muchos o uno
  const archivos = $seleccionArchivos.files;
  // Si no hay archivos salimos de la función y quitamos la imagen
  if (!archivos || !archivos.length) {
    
    $imagenPrevisualizacion.src = "../../public/images/default/perfil.webp";
    return;
  }

  // Ahora tomamos el primer archivo, el cual vamos a previsualizar
  const primerArchivo = archivos[0];
  // Lo convertimos a un objeto de tipo objectURL
  const objectURL = URL.createObjectURL(primerArchivo);
  // Y a la fuente de la imagen le ponemos el objectURL
  $imagenPrevisualizacion.src = objectURL;
  });

  function validacion() {

    color = document.getElementById("color").value;
    nombre = document.getElementById("nombre").value;
    sexo = document.getElementById("sexo").selectedIndex;
    console.log($imagenPrevisualizacion.src);
    telefono = document.getElementById("telefono").value;
    encargado = document.getElementById("encargado").value;
    emergencia = document.getElementById("emergencia").value;
    const archivos2 = $seleccionArchivos.files;

    if(!archivos2 || !archivos2.length) {
        alert('POR FAVOR AGREGA UNA FOTO DE PERFIL!');
        return false;
    } else if (color == 0) {
        alert('NO TE OLVIDES SELECCIONAR EL CAMPO COLOR!');
        return false;
    }else if( nombre == null || nombre.length == 0 ) {
        alert('NO DEJES EL CAMPO NOMBRE VACIO!');
        return false;

    } else if (sexo == 0) {
        alert('NO TE OLVIDES SELECCIONAR EL CAMPO SEXO!');
        return false;

    } else if (telefono == null || telefono.length == 0 ) {
        alert('NO DEJES EL CAMPO TELEFONO VACIO!');
        return false;

    } else if (encargado == null || encargado.length == 0 ) {
        alert('NO DEJES EL CAMPO ENCARGADO VACIO!');
        return false;

    } else if (emergencia == null || emergencia.length == 0 ) {
        alert('NO DEJES EL CAMPO EMERGENCIA VACIO!');
        return false;

    }
    // Si el script ha llegado a este punto, todas las condiciones
    // se han cumplido, por lo que se devuelve el valor true
    return true;
  }





</script>