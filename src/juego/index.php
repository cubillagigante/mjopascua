<?php 
 require '../../php/conexion.php';
 
 $sqlpregunta = "SELECT descripcion_palabra FROM palabra";
 $Rpregunta = $mysqli->query($sqlpregunta);
 $row = $Rpregunta->fetch_array(MYSQLI_ASSOC);

 $sqlletra = "SELECT descripcion_letra FROM letra";
 $Rletra = $mysqli->query($sqlletra);

$texto = $row['descripcion_palabra'];
$palabra = str_replace("-","",$texto);
$array = explode ( '-', $texto );
$longitud = count($array);
echo $palabra;



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
                    <div class="h-80 bg-[red] flex justify-center items-center mb-5">
                        idasc
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
                        <div class="justify-center flex p-10"><i class="ti ti-circle-check-filled"></i></div>
                    </div>

                </section>
            </div>

        </div>
        <?php include 'puntaje.php'; ?>
    </div>

</body>

</html>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            
            <?php 
                $caracteres = "abcdefghijklmnopqrstuvwxyz";
                    
                $arrPassResult=array();
                $index=0;
                $cantidad =26;
                $tmp = "";
                while($index<$cantidad){
                    $tmp=$caracteres[rand(0,strlen($caracteres)-1)];
                    if(!in_array($tmp, $arrPassResult)) {
                        $arrPassResult[]=$tmp;

                    } 
                    $index++;
                }
                for ($i = 0; $i < $longitud; $i++) {
                    
                    $tmp1=rand(0,strlen($palabra));
                    $tmp =$arrPassResult[$tmp1];
                   
                    if (!in_array($tmp, $array)) {
                        $arrPassResult[$tmp1] = $array[$i];
                    } else {
                        $co++;
                        $index1 = 0;
                        while ($index1<$longitud) {
                            $tmp1=rand(0,strlen($palabra));
                            $tmp =$arrPassResult[$tmp1];
                         
                            if (!in_array($tmp, $array)) {
                                break;
                            }
                            $index1++;
                        }
                        $arrPassResult[$tmp1] = $array[$i];
                    }
                    
                }
                for ($i = 0; $i < 15; $i++) {   
        
            ?>
            var button = document.createElement('input');
            button.type = 'button';
            cLetra = "<?php echo  $arrPassResult[$i]; ?>";
            button.id = 'submit';
           <?php if (($i%2)==0) { ?>
                button.className = 'py-5 bg-[#AF3838] text-center cursor-pointer';
           <?php } else { ?>
                button.className = 'py-5 bg-[#C64E4E] text-center cursor-pointer';
               
           <?php } ?>
            
            console.log(cLetra);
            button.value = cLetra;

            button.onclick =insertar();
        
            var container = document.getElementById('container-buttons');
            container.appendChild(button);
            <?php
            }
            
            ?>
        }, false);
    
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