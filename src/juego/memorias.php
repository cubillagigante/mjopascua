<?php 
 require '../../php/conexion.php';
 $id = $_GET['id'];
 $sqlpregunta = "SELECT * FROM pregunta where id_pregunta = $id";
 $resultadopregunta = $mysqli->query($sqlpregunta);
 $resultado1 = $mysqli->query($sqlpregunta);

 $sql = "SELECT * FROM respuesta where id_pregunta = $id";
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
            <div class=" ">

                <section class="w-full p-10 order-2">
                   

                    <div id="pregunta"
                        class="p-10 flex justify-center gap-5 bg-[#02BEB9] text-[#482344] rounded-lg mb-10">

                        <h1 class="font-bold text-2xl"> ... </h1>

                    </div>
                    <div class="flex gap-5 justify-between">
                        <div
                            class="text-white w-full items-center bg-[#482344] rounded-lg  justify-center text-center text-2xl px-10 grid p-5 ">
                            <h1 class="">La respuesta es: </h1>
                            <div id="respuesta">
                                <i class="ti ti-arrow-big-right-filled"></i>
                            </div>

                        </div>
                        <div class="p-10 w-full bg-[#02BEB9] text-[#482344] rounded-lg">
                            <div id="respuesta-check" class="grid px-10 grid-rows-3 gap-2 grid-flow-col" >
                                
                                <h1 class="font-bold text-2xl mx-auto ">...</h1>

                            </div>

                        </div>

                    </div>

                </section>
                <section class="w-full p-10 order-1">
                    <!-- imagen -->

                    <div class="flex justify-between">
                        <div class="flex items-center gap-5 bg-[#673a63] rounded-full w-[20em] text-center">
                            <div onclick="contador()"
                                class="cursor-pointer bg-[#482344] rounded-full w-20 flex justify-center p-5">
                                <i class="ti ti-clock-hour-12"></i>
                            </div>
                            <div id="number">
                                <h1 class="font-bold text-2xl">00 : 00 seg</h1>
                            </div>
                        </div>

                        <a href="memorias.php?id=<?php echo $id + 1; ?>">
                            <div class="btn rounded-full w-20 flex justify-center p-3">
                                <i class="ti ti-player-track-next-filled"></i>
                            </div>
                        </a>
                        <div class=" ">
                            <div onclick="mostrar()" class="btn rounded-full w-10 flex justify-center p-3"><i
                                    class="ti ti-eye-off"></i></div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

    </div>

</body>

</html>
<script>
const respuesta_check = document.getElementById("respuesta-check");
var con = 1;

function calcular(boton) {
    boton.disabled = true;
    var id_boton = boton.id;

    if (id_boton == "radio-1") {
        document.getElementById("radio-" + 2).disabled = true;
        document.getElementById("radio-" + 3).disabled = true;
    } else if (id_boton == "radio-2") {
        document.getElementById("radio-" + 1).disabled = true;
        document.getElementById("radio-" + 3).disabled = true;
    } else if (id_boton == "radio-3") {
        document.getElementById("radio-" + 2).disabled = true;
        document.getElementById("radio-" + 1).disabled = true;
    }

    if (boton.value == 0) {
        document.getElementById("respuesta").innerHTML =
            '<i class="ti ti-exclamation-circle" style=" color: rgb(239 68 68);"></i>';

    } else {
        document.getElementById("respuesta").innerHTML = '<i class="ti ti-circle-check" style="color:#02BEB9;"></i>';
    }
}

function mostrar() {
    console.log(con);
    if (con == 0) {
        respuesta_check.innerHTML = '<h1 class="font-bold text-2xl mx-auto">...</h1>';
        con++;
    } else {
        respuesta_check.innerHTML =
            '<?php $C = 0; while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { $C++; $res = $row['descripcion_respuesta']; echo '<div class = "flex gap-5 items-center text-2xl font-bold border p-2 justify-center" >'.$res.'</div>'; } ?>';
        con = 0;
    }

}

function contador(conta) {
    n = 1;
    var conta = document.getElementById("number");
    var img_p = document.getElementById("img-p");
    var titulo = document.getElementById("pregunta");
    
    <?php while($rowpregunta = $resultadopregunta->fetch_array(MYSQLI_ASSOC)) { ?>
    titulo.innerHTML = '<h1 class="font-bold text-2xl"><?php echo $rowpregunta['descripcion_pregunta']; ?> </h1>';
    <?php } ?>

    var id = setInterval(function() {
        console.log(n);
        conta.innerHTML = '<h1 class="font-bold text-2xl">00 : 0' + n + ' seg</h1>';
        if(n>9) {
            conta.innerHTML = '<h1 class="font-bold text-2xl">00 : ' + n + ' seg</h1>';
        }
        n++;
        if (n == 11) {
            clearInterval(id);

        }
    }, 1000);


}
</script>