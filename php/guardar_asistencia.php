<?php 
require 'conexion.php';
$id = $_GET['id_participante'];
$dia = $_GET['dia'];
$valor = $_GET['valor'];
$color = $_GET['color'];

    if ($dia == 1) {
        $sql = "UPDATE participante SET dia1 = $valor WHERE id_participante = '$id' ";
        $resultado = $mysqli->query($sql);
    } else if($dia == 2) {
        $sql = "UPDATE participante SET dia2 = $valor WHERE id_participante = '$id' ";
        $resultado = $mysqli->query($sql);
    } else if($dia == 3) {
        $sql = "UPDATE participante SET dia3 = $valor WHERE id_participante = '$id' ";
        $resultado = $mysqli->query($sql);
    }
    
    header("location: ../src/registro/asistencia.php?color=$color");

?>