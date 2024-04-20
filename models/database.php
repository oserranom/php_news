<?php
	require_once("datos_conexion.php");

	function crearConexion() {

		// Establecemos la conexión con la base de datos
		$conexion =	mysqli_connect(HOST,USER,PASSWORD,DATABASE);

		// Si hay un error en la conexión, lo mostramos y detenemos.
		if (!$conexion)
			die("<br>Error de conexión con la base de datos: " . mysqli_connect_error());
		// Si está todo correcto, enviamos la conexión con la base de datos.
		return $conexion;
	}

	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}

	//Función de registro de usuarios en la database
	function registraDatosUsuario($nombre, $email, $contrasena){

		$DB = crearConexion();

		$sql = "INSERT INTO usuario (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

		if (mysqli_query($DB, $sql)) {
			cerrarConexion($DB);
			return true; // Registro exitoso
		} else {
			cerrarConexion($DB);
			return false; // Error al registrar el usuario
		}
	}

	//Función que recibe datos del usuario y devuelve login=true al controlador
	function loginUsers($email, $contrasena){
		$DB = crearConexion();
		$sql = "SELECT * FROM usuario WHERE email = '$email' AND contrasena = '$contrasena'";
		$resultado = mysqli_query($DB, $sql);

		if(mysqli_num_rows($resultado) > 0){
			$row = mysqli_fetch_assoc($resultado);

			//Al final he tenido que devolver un array porque la PAC pide demasiado
			$usuario = array(
				"id" => $row['id'],
				"nombre" => $row['nombre']
			);

			//Luego descompondremos este array para obtener los datos en los controladores
			return $usuario; 
		}else{
			return false;
		}
	}

	//Función para guardar noticias en la database, en este punto van saliendo las funciones casi de memoria
	function registraNew($id_autor, $titulo, $cuerpo, $fecha){
		$DB = crearConexion(); 
		$sql = "INSERT INTO noticia (id_autor, titulo, cuerpo, fecha) VALUES ('$id_autor', '$titulo', '$cuerpo', '$fecha')";

		if(mysqli_query($DB, $sql)){
			cerrarConexion($DB);
			return true;
		}else{
			cerrarConexion($DB);
			echo "Error en la consulta: " . mysqli_error($DB); 
			return false; 
		}
		
	}

	//Función de recuperación de datos de noticia 
	function seleccionaNews(){
		$DB = crearConexion();
		$sql = "SELECT noticia.titulo, noticia.fecha, noticia.cuerpo, usuario.nombre 
				FROM noticia 
				JOIN usuario ON noticia.id_autor = usuario.id";


		$resultado = mysqli_query($DB, $sql);

		if(mysqli_num_rows($resultado) > 0){
			$row = mysqli_fetch_assoc($resultado);
			$noticias = array();

			while($row = mysqli_fetch_assoc($resultado)){
				$noticias[] = array(
					"titulo" => $row['titulo'],
					"nombre" => $row['nombre'],
					"fecha" => $row['fecha'],
					"cuerpo" => $row['cuerpo']
				);
				

			}

			return $noticias; 

		}else{

			return false;
		}

	}
?>

