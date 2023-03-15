<?php 
require 'conexion.php';
$ss = $_POST['arv'];
$ss2 = $_POST['arv2'];
$ss3 = $_POST['arv3'];

$dia1 = explode(',',$ss);
$dia2 = explode(',',$ss2);
$dia3 = explode(',',$ss3);

$longitud = count($dia1);
$longitud2 = count($dia2);
$longitud3 = count($dia3);
//dia1
for ($i = 0;$i < $longitud; $i++) {
    if ($dia1[$i] != "") {
        
        $sql = "UPDATE participante SET dia1 = 1 WHERE id_participante = '$dia1[$i]' ";
        $resultado = $mysqli->query($sql);

    }
}
//dia2
for ($i = 0;$i < $longitud2; $i++) {
    if ($dia2[$i] != "") {
        
        $sql = "UPDATE participante SET dia2 = 1 WHERE id_participante = '$dia2[$i]' ";
        $resultado = $mysqli->query($sql);

    }
}
//dia3
for ($i = 0;$i < $longitud3; $i++) {
    if ($dia3[$i] != "") {
        
        $sql = "UPDATE participante SET dia3 = 1 WHERE id_participante = '$dia3[$i]' ";
        $resultado = $mysqli->query($sql);

    }
}
header("location: ../src/registro/asistencia.php");
?>