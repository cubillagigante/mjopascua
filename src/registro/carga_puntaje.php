<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM color";
  $RColor = $mysqli->query($sqlColor);
 
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body class="bg-[#0CB0A6]">
    <div class="flex mt-10 p-10 justify-center gap-5">
        <div class="w-2/4  text-white rounded-lg text-sm  bg-[#EFE4AB] p-10">

            <div class="w-full bg-[#AF3838] p-10 rounded-lg text-center  mb-5">

                <table class="w-full text-sm rounded-lg text-left text-gray-500">

                    <thead class=" rounded-lg text-gray-900 text-xl border-b  uppercase text-center  ">
                        <tr>
                            <th scope="col" class="py-3">
                                id
                            </th>
                            <th scope="col" class=" py-3">
                                color
                            </th>
                            <th scope="col" class="py-3">
                                Puntaje actual
                            </th>
                            <th scope="col" class="px-2 py-3">
                                sumar puntaje
                            </th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo">
                        <?php $con =0;  while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { $con++; ?>
                        <form action="../../php/guardar_puntos.php" method="post">
                            <tr class="text-white font-bold text-center hover:bg-[#efd788c0] ">
                                <td class="px-6 py-4">
                                    <?php  echo $row['id_color']; ?>
                                    <input type="text" name="id_color" class="hidden"
                                        value="<?php  echo $row['id_color']; ?>">
                                </td>
                                <td class="px-6 py-4">
                                    <?php  echo $row['descripcion']; ?>

                                </td>
                                <td class=" py-4">
                                    <input type="text" name="puntaje"
                                        class=" text-black text-center rounded-full p-5"
                                        value="<?php echo $row['puntaje']; ?>" disabled/>
                                </td>

                                <td class=" py-4">

                                    <input type="text" name="puntaje_sumar"
                                        class=" text-black text-center rounded-full p-5" value="0">

                                </td>

                                <td class=" py-4">
                                    <label for="submit-<?php echo $con; ?>">
                                        <div
                                            class="bg-[#0CB0A6] cursor-pointer rounded-full w-20 flex justify-center p-3">
                                            <i class="ti ti-check"></i><input type="submit" id="submit-<?php echo $con; ?>" name="submit-<?php echo $con; ?>"
                                                value="" />
                                        </div>
                                    </label>
                                </td>
                            </tr>
                        </form>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <div class="mt-5 flex justify-between">
                <a href="participantes.php?color=1">

                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-arrow-back-up"></i>
                    </div>

                </a>



            </div>

        </div>
    </div>
</body>

</html>
<script>

</script>