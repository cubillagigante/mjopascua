<?php  
require 'conexion.php';
session_start();
 
$usuario = $_POST['user'];
$clave = $_POST['password'];


$query = mysqli_query($mysqli,"select * from login where user = '$usuario' and password = '$clave'");

$result = mysqli_num_rows($query);

if($result > 0)
{	$_SESSION['username'] = $usuario;	
$data = mysqli_fetch_array($query);
				
				$_SESSION['active'] = true;
				$_SESSION['id_login'] = $data['id_login'];
				$_SESSION['user'] = $data['user'];
				$_SESSION['password'] = $data['password'];
				$_SESSION['status'] = $data['status'];


				if($_SESSION['status']==1){
					header("location: ../src/registro/carga_puntaje.php");
				}else{
					header("location: ../src/registro/deuda.php");
				}

}else{
	echo "Datos Incorrectos";
	header("location: ../src/login/index.php");
}
?>