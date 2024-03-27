<?php
require '../../php/conexion.php';


?>

<!DOCTYPE html>
<html lang="en">
<?php include '../registro/head.php'; ?>

<body class="bg-[#AF3838]">
    <div id="content-principal" class="w-full  text-white text-sm mx-auto p-10">
    <div class=" p-1 text-center  w-20" style="margin:0 auto;"><img src="../../public/images/default/logo.png" class=" rounded-full" alt="logoMJO"></div>
        <form method="POST" class="mt-5" action="../../php/asistenciaqrgenerate.php" autocomplete="off" enctype="multipart/form-data"
            onsubmit="return validacion()">
            <div class="mb-5  bg-gray-900 rounded-xl p-1">
                <h1 class=" font-bold text-xl text-center text-white ">Formulario de Registro MJOPASCUA </h1>
                
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NOMBRE Y APELLIDO: </h1>
                <input id="nombre" type="text" name="n" placeholder="Ej: Viviana Barrios"
                    class="p-3 rounded-lg w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')" />

            </div>
            <div class="mb-10">
                <h1 class="mb-3 ml-4 font-bold">TELEFONO: </h1>
                <input id="telefonop" type="tel" name="tp" placeholder="Ej: 0991234567"
                    class="p-3 round-lg w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^0-9]/,'')" />
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">SEXO: </h1>
                <select id="sexo" name="s" class="p-3 rounded-lg w-full drop-shadow-lg text-center text-black">
                    <option value="0">Seleccione aqui</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </div>
            <!--
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">CEDULA DE IDENTIDAD: </h1>
                <input id="telefono" type="tel" name="telefono" placeholder="Ej: 1234567"
                    class="p-3 round-lg w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^0-9]/,'')" />
            </div>
            -->
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NOMBRE DEL ENCARGADO: </h1>
                <input id="encargado" name="e" placeholder="Ej: Magali Barrios"
                    class="p-3 round-lg w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')" />
            </div>
            <div class="mb-10">
                <h1 class="mb-3 ml-4 font-bold">TELEFONO DE EMERGENCIA: </h1>
                <input id="emergencia" type="tel" name="te" placeholder="Ej: 0991234567"
                    class="p-3 round-lg w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^0-9]/,'')" />
            </div>
            
            
            <div class="mb-2 flex flex-row justify-between relative">
                <label for="clean">
                    <div id="drop-button" class="btn rounded-full p-3">
                        <i class="ti ti-trash "><input id="clean" name="clean" type="reset" value="" /></i>
                    </div>
                </label>
                <label for="submit">
                    <div class="btn rounded-full w-20 flex justify-center p-3">
                        <i class="ti ti-circle-plus"><input type="submit" name="submit" id="submit"
                                class="font-bold cursor-pointer" value="" /></i>
                    </div>
                </label>
            </div>
        </form>
    </div>
</body>

</html>

<script>


    function validacion() {

        nombre = document.getElementById("nombre").value;
        sexo = document.getElementById("sexo").value;
        encargado = document.getElementById("encargado").value;
        emergencia = document.getElementById("emergencia").value;
        telefonop = document.getElementById("telefonop").value;
      
        if (nombre == '') {
            alert('POR FAVOR AGREGA UN NOMBRE');
            return false;
        } 
        if (telefonop == '') {
            alert('POR FAVOR AGREGA UN TELEFONO');
            return false;
        }   
        if (sexo == 0) {
            alert('POR FAVOR SELECCIONA TU SEXO');
            return false;
        } 
        if (encargado == '') {
            alert('POR FAVOR AGREGA UN ENCARGADO');
            return false;
        } 
        if (emergencia == '') {
            alert('POR FAVOR AGREGA UN TELEFONO DE EMERGENCIA');
            return false;
        } 
        // Si el script ha llegado a este punto, todas las condiciones
        // se han cumplido, por lo que se devuelve el valor true
        return true;
    }
   

</script>