<?php 
 require '../../php/conexion.php';
  
 $sqlparticipante = "SELECT id_participante, nombre_apellido, telefono, telefono_emergencia, encargado, descripcion FROM participante, color where participante.id_color = color.id_color";
 $Rparticipante = $mysqli->query($sqlparticipante);

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body class="bg-[#482344]">
    <div class="w-3/4 text-white mt-10 rounded-lg text-sm mx-auto bg-[#AF3838] p-10">
        <div class=" flex gap-5 flex-row  relative mb-5">
                   
            <a href="estadistica.php">
                
                <div class="btn rounded-full w-20 flex justify-center p-3">
                    <i class="ti ti-arrow-back-up"></i>
                </div>
                
            </a>
            <a href="participantes.php">
                
                <div class="btn rounded-full w-20 flex justify-center p-3">
                    <i class="ti ti-home-2"></i>
                </div>
                
            </a>
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
                            <th scope="col" class="px-6 py-3">
                                TELEFONO
                            </th>
                            <th scope="col" class="px-1 py-3">
                                TELEFONO DE EMERGENCIA
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ENCARGADO
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = $Rparticipante->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr class="bg-white border-b dark:border-gray-700">
                            <td class="px-6 py-4">
                                <?php echo $row['id_participante']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['nombre_apellido']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['descripcion']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['telefono']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['telefono_emergencia']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php echo $row['encargado']; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>