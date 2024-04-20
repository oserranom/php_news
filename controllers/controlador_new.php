<?php
    include "../models/database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

		//Recuperando datos del form de noticias:
		$id_autor = $_POST["id_autor"]; 
        $titulo = $_POST["titulo"];
		$cuerpo = $_POST["cuerpo"];
		$fecha = $_POST["fecha"];

		//Se llama a la función de models/database para registrar al usuario:
		$resultado = registraNew($id_autor, $titulo, $cuerpo, $fecha);

		//Verificar operación:
		if($resultado){
			header("Location: ../views/index.php");
		}else{
			echo "Error: No se pudo registrar al usuario";
		}

	}
?>