<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle noticia</title>
    <link rel="stylesheet" href="../styles.css">
    
</head>
<body>
    <?php var_dump($_SESSION["id_autor"]); ?>
    <div class="container">   
        <div class="form_new">

            <form action="../controllers/controlador_new.php" method="POST">
                <input type="hidden" name="id_autor" value="<?php echo $_SESSION["id_autor"]; ?>">
                <label for="titulo" id="titulo">TÍTULO: </label><br>
                <input type="text" id="titulo" name="titulo" placeholder="Título de la noticia" required><br>

                <label for="cuerpo" id="cuerpo">CUERPO: </label><br>
                <textarea name="cuerpo" id="cuerpo" placeholder="Cuerpo de la noticia" required></textarea><br>

                <label for="fecha" id="fecha">FECHA: </label><br>
                <input type="date" id="fecha" name="fecha" required><br>

                <input type="submit" name="new_submit" value="Subir noticia" id="new_submit">
            </form>

        </div>

    </div>

    
</body>
</html>