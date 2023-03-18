<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM deuda ORDER BY monto DESC";
  $RColor = $mysqli->query($sqlColor);
 
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="bg-[#0CB0A6]">
    <div class="flex lg:mt-10 justify-center gap-5">
        <div class="lg:w-2/4 w-full text-white rounded-lg text-sm  bg-[#EFE4AB] lg:p-10">

            <div class="w-full bg-[#AF3838] p-5 lg:rounded-lg text-center mb-5">
                <img src="../../public/images/default/logo.png" class="rounded-full w-20 mx-auto p-2 mb-5" />
                <form action="../../php/guardar_deuda.php" method="post">
                    <div class="flex gap-5 items-center justify-center mb-5">
                    
                        <div class="grid gap-5">
                            <h1 class="font-bold text-xl">Nombre:</h1>
                            <input type="text" name="nombre" class="block text-black text-center rounded-full p-5" value=""
                                placeholder="ej: Camila Coronel" required/>
                            <h1 class="font-bold text-xl">Monto:</h1>
                            <input type="tel" name="deuda" class=" text-black text-center rounded-full p-5" value=""
                                placeholder="ej: 2000" required/>
                        </div>
                        <label class="btn w-20 text-white text-center rounded-full p-5" for="btn-ok">
                        
                            <input id="btn-ok" type="submit" name="btn-ok" class="" value=""
                             /><i class="ti ti-circle-plus"></i>
                        
                        </label>
                    </div>
                </form>
                <table class=" w-full text-sm rounded-lg text-left text-[#EFE4AB]">

                    <thead class=" rounded-lg text-[#EFE4AB] text-xl border-b  uppercase text-center  ">
                        <tr>
                           
                            <th scope="col" class=" py-3">
                                Nombre
                            </th>
                            <th scope="col" class="py-3">
                                Deuda
                            </th>
                            <th scope="col-2" class="px-2 py-3">
                                
                            </th>
                          
                        </tr>
                    </thead>
                    <tbody id="cuerpo">
                        <?php $con =0;  while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { $con++; ?>
                        <form action="../../php/guardar_puntos.php" method="post">
                            <tr class="text-white font-bold text-center hover:bg-[#efd788c0] ">
                                
                                <td class=" py-4">
                                    <?php  echo $row['nombre_deuda']; ?>
                                    
                                </td>
                                <td class=" py-4">
                                    <?php  echo $row['monto']; ?> Gs.
                                    
                                </td>
                                <td class=" py-4">
                                    <a href="../../php/eliminar_deuda.php?id=<?php  echo $row['id_deuda']; ?>"><i class="bg-red-500 p-2 rounded-full ti ti-eraser"></i></a>
                                </td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            

        </div>
    </div>
    <div id="ultimo">

    </div>
</body>

</html>
<script>

</script>