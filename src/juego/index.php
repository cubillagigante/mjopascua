<?php 
 require '../../php/conexion.php';
 
 $sqlpregunta = "SELECT descripcion_palabra FROM palabra";
 $Rpregunta = $mysqli->query($sqlpregunta);
 $row = $Rpregunta->fetch_array(MYSQLI_ASSOC);

 $sqlu = "SELECT descripcion_letra FROM letra ORDER BY id_letra DESC LIMIT 1";
 $Ru = $mysqli->query($sqlu);
 $rowu = $Ru->fetch_array(MYSQLI_ASSOC);
 $ultimo = $rowu['descripcion_letra'];

 $sqlletra = "SELECT descripcion_letra FROM letra";
 $Rletra = $mysqli->query($sqlletra);

$texto = $row['descripcion_palabra'];
$palabra = str_replace("-","",$texto);
$array = explode ( '-', $texto );
$longitud = count($array);
$contador = 0;


?>
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<body class="bg-[#482344]">
    <div class="flex mt-10 p-10 justify-center gap-5">
        <div class="w-3/4 text-white rounded-lg text-sm  bg-[#EFE4AB] p-10">
            <nav class="flex flex-row">
                <div class=" flex gap-5 flex-row  relative mb-5">

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
                    <div class=" h-96 bg-[#689084] rounded-lg flex justify-center items-center mb-5">
                        <div class=" relative w-[14em] h-full">
                            <?php if($contador == 1) { echo 'hola';?>
                                
                                <img src="../../public/images/default/head.svg" class="absolute left-14 z-20 top-2 right-10" alt="">
                            <?php } ?>
                            <img src="../../public/images/default/brazo_i.svg" class="absolute left-0 top-20 hidden" alt="">
                            <img src="../../public/images/default/brazo_d.svg" class="absolute right-0 top-20 hidden" alt="">
                            <img src="../../public/images/default/pecho.svg" class="absolute left-11 z-10 top-12 hidden" alt="">
                            <img src="../../public/images/default/legs.svg" class="absolute left-5 bottom-10 hidden" alt="">  
                            <img src="../../public/images/default/ceniza.svg" class="absolute bottom-2" alt="">  
                            
                        </div>
                        
                    </div>
                    <!-- botones -->
                    <?php include 'botones.php'; ?>
                </section>
                <section class="w-full p-10 ">
                    <!-- tabla de puntajes -->

                    <div class="p-10 flex justify-center gap-5 bg-[#02BEB9] text-[#482344] rounded-lg mb-10">

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
                        <?php echo $contador; if (!in_array($ultimo, $array)) {  ?>
                            
                            <div class="justify-center flex p-10"><i class="ti ti-xbox-x"></i></div>
                        <?php } else {?>
                            <div class="justify-center flex p-10"><i class="ti ti-circle-check-filled"></i></div>
                        <?php $contador++; } ?>
                    </div>

                </section>
            </div>

        </div>
        <?php include 'puntaje.php'; ?>
    </div>

</body>

</html>
<script>
    
    
    function insertar(boton) {
       console.log( window.location.href);
       boton.disabled = true; 
       boton.style.backgroundColor = "#3E3737";
       
       letra_p = boton.value;

       window.location.href = window.location.href + "?v=" + letra_p;
       <?php 
       if (isset($_GET["v"])) {
        $letra = $_GET['v']; 
        $sql = "INSERT INTO letra(descripcion_letra, id_palabra) VALUES 
        ('$letra', 1)";
        $resultado = $mysqli->query($sql);
        header("location: index.php");
       }
        
       ?>
       window.location.reload();
       window.location.href = window.location.href;
       boton.style.color = "#EFE4AB";

      
    }
    

</script>