<?php 

	$lifetime = 1800;
	ini_set('session.gc_maxlifetime', $lifetime);
	session_start();

    include_once "../models/database.php";

	//Log in usuario:
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$email = $_POST["email"];
		$password = $_POST["password"];

		//Llama a la función del modelo pero gaurda el resultado en la variable id_usuario
		//Para que luego la capturemos y usemos la vista del registro de noticias
		$id_usuario = loginUsers($email, $password);

		//Verificación de login:
		if($id_usuario){
			$nombre_autor = $id_usuario['nombre'];
			$id_autor = $id_usuario['id']; 
			$_SESSION["logged_in"] = true; 
			$_SESSION["email"] = $email;
			$_SESSION["nombre_autor"] = $nombre_autor;
			$_SESSION["id_autor"] = $id_autor;
			header("Location: ../views/index.php"); 
			exit(); 
		}else{
			echo "Error: Nombre de usuario y/o contraseña no válidos"; 
		}

	}

?>