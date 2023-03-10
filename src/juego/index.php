<?php 
 require '../../php/conexion.php';
 
 $sqlpregunta = "SELECT descripcion_palabra FROM palabra";
 $Rpregunta = $mysqli->query($sqlpregunta);
 $row = $Rpregunta->fetch_array(MYSQLI_ASSOC);

 $sqlletra = "SELECT descripcion_letra FROM letra";
 $Rletra = $mysqli->query($sqlletra);

$texto = $row['descripcion_palabra'];
$array = explode ( '-', $texto );
$longitud = count($array);

 

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>
<body class="bg-[#482344]">
    <div class="flex mt-10 p-10 justify-center gap-5">
        <div class="w-3/4 text-white rounded-lg text-sm  bg-[#EFE4AB] p-10">
            <nav class="flex flex-row">
                <div class="mb-2 flex gap-5 flex-row  relative mb-5">
                        
                    <a href="../registro/participantes.php">
                        
                        <div class="btn rounded-full w-20 flex justify-center p-3">
                            <i class="ti ti-arrow-back-up"></i>
                        </div>
                        
                    </a>
                    
                    
                </div>
                
            </nav>
            <div class="flex">
                <section class="w-full p-10">
                    <!-- imagen -->
                    <div class="h-80 bg-[red] flex justify-center items-center mb-5">
                        imagen
                    </div>
                    <!-- botones -->
                    <?php include 'botones.php'; ?>
                </section>
                <section class="w-full p-10 ">
                    <!-- tabla de puntajes -->
                    
                    <div class="p-10 flex gap-5 bg-[#02BEB9] text-[#482344] rounded-lg mb-10">
                        
                        <?php 
                        $co = 0;
                         while($rowl = $Rletra->fetch_array(MYSQLI_ASSOC)) { 
                            $letra = $rowl['descripcion_letra'];
                            
                            
                            for ($i = 0; $i < $longitud ; $i++) {
                               
                                
                                if ($letra == $array[$i]) {
                                    $posicion[$co]= $i;
                                    $impreso[$co] = $letra;
                                    $co++;
                                } 
                            }  
                        } 
                        for ($i = 0; $i < $longitud; $i++) {
                            $aux[$i] = '_';
                        }
                        for ($i = 0; $i < $co; $i++) {
                         
                            $po = $posicion[$i];
                            $aux[$po] = $impreso[$i];
                                
                        }
                        for ($i = 0; $i < $longitud; $i++) {

                        ?>
                        <h1 class="font-bold text-3xl text-center ">
                            <?php echo $aux[$i]; ?>
                        </h1>
                        
                        <?php

                                 
                            }
                          ?>
                    </div>
                    <div class="p-10 bg-[#02BEB9] text-[#482344] rounded-lg">
                        <h1 class="font-bold text-3xl text-center">La respuesta es: </h1>
                        <div class="justify-center flex p-10"><i class="ti ti-circle-check-filled"></i></div>
                    </div>

                </section>
            </div>
            
        </div>
        <?php include 'puntaje.php'; ?>
    </div>
    
</body>
</html>