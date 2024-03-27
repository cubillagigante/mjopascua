<?php
require '../../php/conexion.php';

$sqlColor = "SELECT * FROM color";
$RColor = $mysqli->query($sqlColor);

$sqlSexo = "SELECT * FROM sexo";
$RSexo = $mysqli->query($sqlSexo);

$id = $_GET['id_color'];
$status = $_GET['s'];
if ($id != 0) {
    $sqlmasculino = "SELECT count(*) as 'masculino' FROM participante where id_sexo = 1 and id_color = $id";
    $Rm = $mysqli->query($sqlmasculino);
    $rowRm = $Rm->fetch_array(MYSQLI_ASSOC);

    $sqlfemenino = "SELECT count(*) as 'femenino' FROM participante where id_sexo = 2 and id_color = $id";
    $Rf = $mysqli->query($sqlfemenino);
    $rowRf = $Rf->fetch_array(MYSQLI_ASSOC);

    $sqlcolor1 = "SELECT descripcion FROM color where id_color = $id";
    $resultadocolor1 = $mysqli->query($sqlcolor1);
    $rowcol = $resultadocolor1->fetch_array(MYSQLI_ASSOC);

}

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <div id="content-principal" class="w-96 border text-sm mx-auto rounded-lg p-10">
        <form method="POST" action="../../php/guardar_participante.php" autocomplete="off" enctype="multipart/form-data"
            onsubmit="return validacion()">
            <?php
            if ($status == 1) {
                ?>
                
                <div id="popup-modal" tabindex="-1"
                    class="fixed top-10 transition ease-in-out left-0 z-50 p-4 overflow-x-hidden w-full overflow-y-auto max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Participante correctamente agregado!</h3>
                                <div id="btn-ok"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Ok
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold"> </h1>
                <div class="flex flex-row gap-5">

                    <div id="content-img" class="flex overflow-hidden gap-5 w-full font-bold items-center rounded-lg">
                        <div class="flex items-center">
                            <i class="ti ti-woman"></i> :
                            <?php if ($id != 0) {
                                echo $rowRf['femenino'];
                            } else {
                                echo 0;
                            } ?>
                        </div>
                        <div class="flex items-center">
                            <i class="ti ti-man"></i> :
                            <?php if ($id != 0) {
                                echo $rowRm['masculino'];
                            } else {
                                echo 0;
                            } ?>
                        </div>

                    </div>
                    <div class="w-3/4 content-center text-center">
                        <label for="archivo">
                            <div class="btn rounded-full p-3 font-bold">
                                Total :
                                <?php if ($id != 0) {
                                    echo $rowRm['masculino'] + $rowRf['femenino'];
                                } else {
                                    echo 0;
                                } ?>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">COLOR: </h1>
                <select onchange="buscarC(this)" 
                    class="form-control text-center w-full p-3 border-2 border-black text-black rounded-full" name="">
                    <option value="0">
                        <?php echo $rowcol['descripcion']; ?>
                    </option>
                    <?php while ($row = $RColor->fetch_array(MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $row['id_color']; ?>">
                            <?php echo $row['descripcion']; ?>
                        </option>
                    <?php } ?>
                </select>
                <input type="text" class="hidden" name="id_color" value="<?php echo $id ?>">
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NOMBRE Y APELLIDO: </h1>
                <input id="nombre" type="text" name="nombre_apellido" placeholder="Ej: Viviana Barrios"
                    class="p-3 rounded-full w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')" />

            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">SEXO: </h1>
                <select id="sexo" name="id_sexo" class="p-3 rounded-full w-full drop-shadow-lg text-center text-black">
                    <option value="0">Seleccione aqui</option>
                    <?php while ($row = $RSexo->fetch_array(MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $row['id_sexo']; ?>">
                            <?php echo $row['descripcion']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NÚMERO DE TELEFONO: </h1>
                <input id="telefono" type="tel" name="telefono" placeholder="Ej: 0981234567"
                    class="p-3 rounded-full w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^0-9]/,'')" />
            </div>
            <div class="mb-5">
                <h1 class="mb-3 ml-4 font-bold">NOMBRE DEL ENCARGADO: </h1>
                <input id="encargado" name="encargado" placeholder="Ej: Magali Barrios"
                    class="p-3 rounded-full w-full drop-shadow-lg text-center text-black"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\sñá-ú]/,'')" />
            </div>
            <div class="mb-10">
                <h1 class="mb-3 ml-4 font-bold">TELEFONO DE EMERGENCIA: </h1>
                <input id="emergencia" type="tel" name="telefono_emergencia" placeholder="Ej: 0991234567"
                    class="p-3 rounded-full w-full drop-shadow-lg text-center text-black"
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
    var $seleccionArchivos = document.querySelector("#archivo"),
        $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion"), $imagencontent = document.querySelector("#content-img");
    
    <?php if($status != 0) { ?>
        const btnok = document.getElementById("btn-ok");
        btnok.addEventListener("click", function() {
            const modal = document.getElementById("popup-modal");
            modal.classList.add("hidden");
        });
    <?php } ?>
    function validacion() {

        color = document.getElementById("color").value;
        nombre = document.getElementById("nombre").value;
        sexo = document.getElementById("sexo").selectedIndex;
        console.log($imagenPrevisualizacion.src);
        telefono = document.getElementById("telefono").value;
        encargado = document.getElementById("encargado").value;
        emergencia = document.getElementById("emergencia").value;
        const archivos2 = $seleccionArchivos.files;

        if (!archivos2 || !archivos2.length) {
            alert('POR FAVOR AGREGA UNA FOTO DE PERFIL!');
            return false;
        } else if (color == 0) {
            alert('NO TE OLVIDES SELECCIONAR EL CAMPO COLOR!');
            return false;
        } else if (nombre == null || nombre.length == 0) {
            alert('NO DEJES EL CAMPO NOMBRE VACIO!');
            return false;

        } else if (sexo == 0) {
            alert('NO TE OLVIDES SELECCIONAR EL CAMPO SEXO!');
            return false;

        } else if (telefono == null || telefono.length == 0) {
            alert('NO DEJES EL CAMPO TELEFONO VACIO!');
            return false;

        } else if (encargado == null || encargado.length == 0) {
            alert('NO DEJES EL CAMPO ENCARGADO VACIO!');
            return false;

        } else if (emergencia == null || emergencia.length == 0) {
            alert('NO DEJES EL CAMPO EMERGENCIA VACIO!');
            return false;

        }
        // Si el script ha llegado a este punto, todas las condiciones
        // se han cumplido, por lo que se devuelve el valor true
        return true;
    }
    <?php
    if ($id != 0) {
        $sqlColor1 = "SELECT hex_color, text_color FROM color where id_color = $id";
        $RColor1 = $mysqli->query($sqlColor1);
        $rowbg123 = $RColor1->fetch_array(MYSQLI_ASSOC);

        $bg = $rowbg123['hex_color'];
        $text = $rowbg123['text_color'];
    } else {
        $bg = 'bg-gray-800';
        $text = 'text-white';
    }

    ?>
    const content_principal = document.getElementById("content-principal");
    content_principal.classList.add("<?php echo $bg; ?>");
    content_principal.classList.add("<?php echo $text; ?>");

    function buscarC(datos) {
        var contenido = document.getElementById('contenido');
        window.location.href = "index.php?id_color=" + datos.value +"&s=0";
    }

</script>