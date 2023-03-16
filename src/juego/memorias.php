<?php 
 require '../../php/conexion.php';
 $sqlpregunta = "SELECT * FROM pregunta where id_pregunta = 1";
 $resultadopregunta = $mysqli->query($sqlpregunta);
 $resultado1 = $mysqli->query($sqlpregunta);

 $sql = "SELECT * FROM respuesta where id_pregunta = 1";
 $resultado = $mysqli->query($sql);
 

?>
<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<body class="bg-[#482344]">
    <div class="flex mt-10 p-10 justify-center gap-5">
        <div class="w-3/4 text-white rounded-lg text-sm  bg-[#EFE4AB] p-10">
            <nav class="flex flex-row">
                <div class=" flex gap-5 flex-row  relative mb-5">

                    <a href="menu.php">

                        <div class="btn rounded-full w-20 flex justify-center p-3">
                            <i class="ti ti-arrow-back-up"></i>
                        </div>

                    </a>


                </div>

            </nav>
            <div class="flex ">

                <section class="w-full p-10 order-2">
                    <!-- tabla de puntajes -->

                    <div class="p-10 flex justify-center gap-5 bg-[#02BEB9] text-[#482344] rounded-lg mb-10">
                        <?php while($rowpregunta = $resultadopregunta->fetch_array(MYSQLI_ASSOC)) { ?>
                            <h1 class="font-bold text-2xl"><?php echo $rowpregunta['descripcion_pregunta']; ?> </h1>
                        <?php } ?>
                    </div>
                    <div class="flex justify-between">
                        <div class="text-white items-center bg-[#482344] rounded-lg  justify-center text-center text-2xl px-10 grid p-5 ">
                            <h1 class="">La respuesta es: </h1>
                            <div id="respuesta">
                                <i class="ti ti-arrow-big-right-filled"></i>
                            </div>
                            
                        </div>
                        <div class="p-10 w-80  bg-[#02BEB9] text-[#482344] rounded-lg">
                            <div id="respuesta-check" class="grid justify-center">
                                <?php $C = 0; while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { $C++; ?>
                                    <div class="flex gap-5 items-center text-2xl font-bold mb-5">
                                        <input type="radio" onclick="calcular(this)" name="res" class="w-10 h-16" value="<?php echo $row['valor_respuesta']; ?>" id="radio-<?php echo $C; ?>"> <?php echo $row['descripcion_respuesta']; ?>
                                    </div>
                                <?php } ?>

                            </div>
                            
                        </div>
                        
                    </div>
                </section>
                <section class="w-full p-10 order-1">
                    <!-- imagen -->
                    <div id="img-p" class=" h-96 bg-[#689084] shadow shadow-emerald-600 rounded-lg flex justify-center items-center mb-10">
                        
                    </div>
                    <div class="flex items-center gap-5 bg-[#673a63] rounded-full w-[20em] text-center">
                        <div onclick="contador()" class="cursor-pointer bg-[#482344] rounded-full w-20 flex justify-center p-5">
                            <i class="ti ti-clock-hour-12"></i>
                        </div>
                        <div id="number">
                            <h1 class="font-bold text-2xl">00 : 00 seg</h1>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <?php include 'puntaje.php'; ?>
    </div>

</body>

</html>
<script>
    function calcular(boton) {
        boton.disabled = true;
        var id_boton = boton.id;
        
        if (id_boton == "radio-1") {
            document.getElementById("radio-"+2).disabled=true;
            document.getElementById("radio-"+3).disabled=true;
        } else if(id_boton == "radio-2") {
            document.getElementById("radio-"+1).disabled=true;
            document.getElementById("radio-"+3).disabled=true;
        } else if(id_boton == "radio-3") {
            document.getElementById("radio-"+2).disabled=true;
            document.getElementById("radio-"+1).disabled=true;
        }

        if (boton.value == 0) {
            document.getElementById("respuesta").innerHTML = '<i class="ti ti-exclamation-circle" style=" color: rgb(239 68 68);"></i>';
            
        } else {
            document.getElementById("respuesta").innerHTML = '<i class="ti ti-circle-check" style="color:#02BEB9;"></i>';
        }
    }
    function contador(conta) {
        n = 1;
        var conta = document.getElementById("number");
        var img_p = document.getElementById("img-p");
       /* window.setInterval(function(){
            conta.innerHTML = '<h1 class="font-bold text-2xl">00 : 0'+n+' seg</h1>';
            n++;
            if (n == 5) {
                clearInterval();
            }
        },1000);*/
        <?php while($rowimg = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
                            
            img_p.innerHTML = '<img src="../../public/images/default/<?php echo $rowimg['img_nombre']; ?>" class="object-cover rounded-lg h-full w-full">';
        <?php } ?>
        var id = setInterval(function(){
            console.log(n);
            conta.innerHTML = '<h1 class="font-bold text-2xl">00 : 0'+n+' seg</h1>';
            n++;
            if(n == 9) 
            {
                clearInterval(id);
                img_p.innerHTML = '<img class="object-cover rounded-lg h-full w-full">';

            }
        }, 1000); 
        

    }

</script>