<?php 
    include_once("../controllers/controlador_reg.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro diario</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

    
    <div class="registro">
        <fieldset>
            <legend>FORMULARIO DE REGISTRO:</legend>
            <form action="../controllers/controlador_reg.php" method="POST" class="reg_inputs">
                <div><input type="text" name="reg_nombre" id="reg_nombre" placeholder="Nombre" required></div>
                <div><input type="email" name="reg_email" id="reg_email" placeholder="email" required></div>
                <div><input type="password" name="reg_password" id="reg_password" placeholder="Contraseña" required></div>
                <div><input type="submit" value="Enviar"></div>
            </form>
        </fieldset>
    </div>
    
</body>
</html>