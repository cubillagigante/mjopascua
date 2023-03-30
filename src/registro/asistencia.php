<?php 
 require '../../php/conexion.php';
  
 $sqlparticipante = "SELECT a.id_participante, a.nombre_apellido, b.descripcion,a.dia1, a.dia2, a.dia3 FROM participante a INNER JOIN color b ON(a.id_color = b.id_color)";
 $Rparticipante = $mysqli->query($sqlparticipante);
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="bg-[#482344]">
    <div class="w-3/4 text-white mt-10 mb-10 rounded-lg text-sm mx-auto bg-[#AF3838] p-10">
        <div class="flex justify-between">
            <div class="flex gap-5 flex-row  relative mb-5">

                <a href="participantes.php?color=1">

                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-arrow-back-up"></i>
                    </div>

                </a>

            </div>
            <div class="">
                <div class="form-group flex">
                    <label for="my-select">
                        <h1 class="text-xl  mr-5">Fecha:</h1>
                    </label>
                    <select id="my-select" class="form-control text-center w-40 p-2 text-black rounded-full" name="">
                        <option value="0">2023/04/06</option>
                        <option value="1">2023/04/07</option>
                        <option value="2">2023/04/08</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="w-full mx-auto mb-8 border-gray-200 h-[45rem] rounded-lg rounded-l-lg overflow-y-auto">
            <div class="relative  shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white">
                        LISTA DE PARTICIPANTES
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NOMBRE
                            </th>
                            <th scope="col" class="px-6 py-3">
                                COLOR
                            </th>


                            <th scope="col" class="px-2 py-3">
                                Dias
                            </th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo">
                        <?php $con=0; while($row = $Rparticipante->fetch_array(MYSQLI_ASSOC)) { $con++;?>
                        <tr class="bg-white border-b hover:bg-gray-400 font-bold hover:text-white text-xl dark:border-gray-700">
                            <td class="px-6 py-4">
                                <?php echo $row['id_participante']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['nombre_apellido']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['descripcion']; ?>
                            </td>

                            <td class="px-2 py-4">




                                <label class="content-input">
                                    
                                    <input onclick="seleccion(this,<?php echo $row['id_participante']; ?>)"
                                        type="checkbox" value="<?php echo $row['dia1']; ?>" name="Vehiculo"
                                        id="1"
                                    <?php 
                                    if($row['dia1']  == 1) {
                                        echo 'checked';
                                    }?>
                                    >
                                    DIA1
                                    <i></i>
                                    
                                </label>

                                <label class="content-input">
                                    <input onclick="seleccion(this,<?php echo $row['id_participante']; ?>)"
                                        type="checkbox" value="<?php echo $row['dia2']; ?>" name="Vehiculo"
                                        id="2"
                                    <?php 
                                    if($row['dia2']  == 1) {
                                        echo 'checked';
                                    }?>    
                                    >
                                    DIA2
                                    <i></i>
                                </label>

                                <label  class="content-input">
                                    <input onclick="seleccion(this,<?php echo $row['id_participante']; ?>)"
                                        type="checkbox" value="<?php echo $row['dia3']; ?>" name="Vehiculo"
                                        id="3"
                                    <?php 
                                    if($row['dia3']  == 1) {
                                        echo 'checked';
                                    }?>    
                                    >
                                    DIA3
                                    <i></i>
                                </label>
                                <!--
                                    <input class="mr-5 w-5 h-5 cursor-pointer" id="check-"
                                    value="" type="checkbox"
                                    onclick="seleccion(this,)" name="">
                                <input class="mr-5 w-5 h-5 cursor-pointer" id="2check-"
                                    value="" type="checkbox"
                                    onclick="seleccion(this,)" name="">
                                <input class="w-5 h-5 cursor-pointer" id="3check-"
                                    value="" type="checkbox"
                                    onclick="seleccion(this,)" name="">
                                    -->
                            </td>

                        </tr>
                        <?php  } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <form action="../../php/guardar_asistencia.php" method=post name=test onSubmit=setValue()>
            <input id="respuesta" name=arv type=hidden value="123" />
            <input id="respuesta2" name=arv2 type=hidden value="123" />
            <input id="respuesta3" name=arv3 type=hidden value="123" />
            <input id="fecha" name=fecha type=hidden value="123" />

            <div class="w-full flex justify-between">
                <div class=" p-2"></div>
                <label for="btn-ok">
                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-device-floppy"></i><input type="submit" id="btn-ok" name="btn-ok" value="" />
                    </div>
                </label>
                <label for="btn-refresh">
                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-refresh"></i><input type="button" id="btn-refresh" onclick="location.reload()"
                            name="btn-refresh" value="" />
                    </div>
                </label>
            </div>
        </form>

    </div>
</body>

</html>
<script>



function seleccion(checkeado, id_p) {
    console.log(checkeado.id);

    if(checkeado.value == 1) {
        window.location.href = "../../php/guardar_asistencia.php?id_participante=" + id_p + "&dia="+checkeado.id +"&valor="+0;
    } else {
        window.location.href = "../../php/guardar_asistencia.php?id_participante=" + id_p + "&dia="+checkeado.id +"&valor="+1;
    }
    
    
}

</script>