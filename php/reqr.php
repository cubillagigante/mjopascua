   
<?php 
require 'conexion.php';
    $nombre = $_GET['n'];
    $sexo = $_GET['s'];
    $encargado = $_GET['e'];
    $telefonoEncargado = $_GET['te'];
    $telefonoPersonal = $_GET['te'];
    $color = $_GET['c'];

        $sql = "INSERT INTO participante(nombre_apellido, telefono, encargado, telefono_emergencia, id_sexo, id_color, ruta_img, dia1, dia2, dia3) VALUES 
        ('$nombre', '$telefonoPersonal', '$encargado', '$telefonoEncargado', '$sexo', '$color','-', 1, 0, 0)";
        $resultado = $mysqli->query($sql);    

    header("location: ../src/asistenciaQR/");
            
?>