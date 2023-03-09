<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = ""; $nombreBaseDatos = "mjopascua";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);


// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlEmpleaados = mysqli_query($conexionBD,"SELECT * FROM participante WHERE id_participante=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlEmpleaados) > 0){
        $participante = mysqli_fetch_all($sqlEmpleaados,MYSQLI_ASSOC);
        echo json_encode($participante);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlEmpleaados = mysqli_query($conexionBD,"DELETE FROM participante WHERE id_participante=".$_GET["borrar"]);
    if($sqlEmpleaados){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre_apellido=$data->nombre_apellido;
    $telefono=$data->telefono;
    $encargado=$data->encargado;
    $telefono_emergencia=$data->telefono_emergencia;
    $id_sexo=$data->id_sexo;
    $id_color=$data->id_color;
    $ruta_img=$data->ruta_img;

        if(($correo_apellido!="")&&($telefono!="")&&($encargado!="")&&($telefono_emergencia!="")&&($id_sexo!="")&&($id_color!="")&&($ruta_img!="")){
            
    $sqlEmpleaados = mysqli_query($conexionBD,"INSERT INTO participante(nombre_apellido,telefono,encargado,telefono_emergencia,id_sexo,id_color,ruta_img) VALUES('$nombre_apellido', '$telefono','$encargado','$telefono_emergencia','$id_sexo', '$id_color', '$ruta_img') ");
    echo json_encode(["success"=>1]);
        } 
    exit();
}
// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización
if(isset($_GET["actualizar"])){
    
    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["actualizar"];
    $nombre=$data->nombre;
    $correo=$data->correo;
    
    $sqlEmpleaados = mysqli_query($conexionBD,"UPDATE empleados SET nombre='$nombre',correo='$correo' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}
// Consulta todos los registros de la tabla empleados
$sqlEmpleaados = mysqli_query($conexionBD,"SELECT * FROM participante ");
if(mysqli_num_rows($sqlEmpleaados) > 0){
    $empleaados = mysqli_fetch_all($sqlEmpleaados,MYSQLI_ASSOC);
    echo json_encode($empleaados);
}
else{ echo json_encode([["success"=>0]]); }


?>
