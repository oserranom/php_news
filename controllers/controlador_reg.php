<?php 

	include "../models/database.php";

	//Registro de usuario:
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//Recuperando datos del form de registro:
		$reg_nombre = $_POST["reg_nombre"];
		$reg_email = $_POST["reg_email"];
		$reg_contrasena = $_POST["reg_password"];

		//Se llama a la función de models/database para registrar al usuario:
		$resultado = registraDatosUsuario($reg_nombre, $reg_email, $reg_contrasena);

		//Verificar operación:
		if($resultado){
			echo "EL REGISTRO SE HA COMPLETADO";
			header("Location: ../views/index.php");
		}else{
			echo "Error: No se pudo registrar al usuario";
		}

	}

?>