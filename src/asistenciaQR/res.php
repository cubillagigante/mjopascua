<?php 
 require '../../php/conexion.php';
 $nombre = $_GET['n'];
 $sexo = $_GET['s'];
 $sexovar = '';
 if ($sexo == 1 ) {
    $sexovar = 'MASCULINO';
} else if($sexo == 2) {
    $sexovar = 'FEMENINO';
}
 $encargado = $_GET['e'];
 $telefonoEncargado = $_GET['te'];
 $telefonoPersonal = $_GET['tp'];
  
 
 $sqlcolor = "SELECT a.id_color, count(*) conteo, b.hex_color FROM participante a inner join color b on (a.id_color = b.id_color) group by id_color order by conteo asc limit 1";
 $resultcolor = $mysqli->query($sqlcolor);
 $row = $resultcolor->fetch_array(MYSQLI_ASSOC);
 $color = $row['id_color'];
 $hexcolor = $row['hex_color'];


 ?>
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>



<body class="bg-gray-800">
    <div id="content-principal"   class="  text-white text-sm rounded-xl p-10">
    <div class="mb-10" style="display:flex;justify-content: space-between;">
                    <a href="index.php">    
                        <div class="btn rounded-full w-20 flex justify-center p-3" style="--tw-bg-opacity: 1;background-color: rgb(127 29 29 / var(--tw-bg-opacity));">
                            <i class="ti ti-x"></i>
                        </div>
                        </a>
                        <a href="<?php echo $url = '../../php/reqr.php?n='.$nombre.'&s='.$sexo.'&e='.$encargado.'&te='.$telefonoEncargado.'&tp='.$telefonoPersonal.'&c='.$color; ?>"> 
                        <div id="btn-insert"  style="--tw-bg-opacity: 1;background-color: rgb(22 163 74 / var(--tw-bg-opacity));"class="bg-green-600 rounded-full w-20 flex justify-center p-3">
                            <i class="ti ti-check"></i></i>
                        </div>
                        </a>
                
            </div>
        
            <div class="mb-5  bg-gray-900 rounded-xl p-1">
                <h1 class=" font-bold text-xl text-center text-white "> Ticket de Entrada </h1>
                
            </div>
            <div class="flex justify-between mb-5">
                <div class="">
                    <h1 class="mb-3  font-bold">NOMBRE:</h1>
                    <h1 class="mb-3  font-bold">TELEFONO:</h1>
                    <h1 class="mb-3 font-bold">SEXO:</h1>
                    <h1 class="mb-3 font-bold">ENCARGADO:</h1>
                    <h1 class="mb-3 font-bold">TEL. ENCARGADO:</h1>
                </div>
                <div class="">
                    <h1 class="mb-3 font-bold"><?php echo $nombre;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $telefonoPersonal;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $sexovar;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $encargado;?></h1>
                    <h1 class="mb-3 font-bold"><?php echo $telefonoEncargado;?></h1>
                </div>
            </div>
            <hr class="mb-5">
            <div class="mb-3 flex w-full justify-between">
                
                    <h1 class="text-white">Color:</h1>
                    <div id="colorcaja" class="w-20 h-20 border" style="background-color:<?php echo $hexcolor; ?>;" >

                    </div>
                
                <div>
                    
                     <div class=" p-1 text-center w-full mb-5" style=""><img src="../../public/images/default/logo.png" class="w-20 mx-auto rounded-full" alt="logoMJO"></div>
                </div>
            </div>
           
    </div>
  <script>
    document.getElementById("colorcaja").style.backgroundColor = "<?php echo $hexcolor; ?>";

    
            </script>
        
    </div>
</body>

</html>
