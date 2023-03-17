<?php
  require '../../php/conexion.php';
  
  $sqlColor = "SELECT * FROM color ORDER BY puntaje DESC";
  $RColor = $mysqli->query($sqlColor);
 
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<body class="bg-[#0CB0A6]">
    <div class="flex lg:mt-10 justify-center">
        <div class="lg:w-2/4 w-full text-white rounded-lg text-sm  bg-[#EFE4AB] lg:p-10">
            
            <div class="w-full bg-[#AF3838] p-5 lg:rounded-lg text-center lg:mb-5">
                <img src="../../public/images/default/logo.png" class="rounded-full w-20 mx-auto p-2 mb-5"/>
                <table class="w-full text-sm rounded-lg text-left text-gray-500">

                    <thead class=" rounded-lg text-[#EFE4AB] text-xl border-b  uppercase text-center  ">
                        <tr>
                            
                            <th scope="col" class=" py-3">
                                color
                            </th>
                            <th scope="col" class="py-3">
                                Puntaje 
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody id="cuerpo">
                        <?php $con =0;  while($row = $RColor->fetch_array(MYSQLI_ASSOC)) { $con++; ?>
                        
                            <tr class="text-white font-bold  hover:bg-[#efd788c0] ">
                               
                                <td class="text-center py-4">
                                    <?php  echo $row['descripcion']; ?>

                                </td>
                                <td class="text-center py-4">
                                    <input type="text" name="puntaje"
                                        class="w-28 text-[#482344]  text-center rounded-full p-5"
                                        value="<?php echo $row['puntaje']; ?>" disabled/>
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
<script>

</script>