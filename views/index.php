<?php 
    include_once("../controllers/controlador_login.php"); 
    include_once("../controllers/controlador_lista.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diario</title>
    <link rel="stylesheet" href="../styles.css">
    
</head>
<body>
    <nav>
        <h2>PHP NEWS</h2>
    
        <div class="login">

            <?php //Si se ha iniciado sesión muestra email usuario
                if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true){
                    echo "<h4>Sesión iniciada: <span class='mailsession'>" . $_SESSION["nombre_autor"] . "</span></h4>";

                }else{
                //Si el usuario no ha iniciado sesión muestra el form. 
            ?>

            <form action="../controllers/controlador_login.php" method="POST">
                <label for="email">e-mail: </label><input type="email" name="email" id="email" placeholder="pepito@misco.com" required>
                <label for="password">Contraseña: </label> <input type="password" name="password" id="password" required>
                <input type="submit" id="login" name="login" value="Log in">
            </form>

            <?php 
                } 
            ?>

        </div>
        <?php
            if(!isset($_SESSION["logged_in"])){
                echo "<div class='buttons'>";
                echo "<a href='registro.php'><button>Sign up</button></a>";
                echo "</div>";
                
            }else{

                echo "<form action='../controllers/controlador_logout.php' method='post'>";
                echo "<button type='submit' class='buttons'>Log out</button>";
                echo "</form>";
            }
        ?>

    </nav>

    <main>
        <section> 
            <?php
                if(isset($_SESSION["logged_in"])){
                    echo "<div>";
                    echo "<a href='reg_noticia.php'><button class='new'>+ AÑADIR NOTICIA</button></a>";
                    echo "</div>";
                    var_dump($_SESSION["id_autor"]);
                }else{
                    echo "<div>";
                    echo "<a href='reg_noticia.php'><button class='new' disabled>+ AÑADIR NOTICIA</button></a>";
                    echo "</div>";
                }
            ?>

        </section>

        <section>
            <h2>Noticias: </h2>

            <table class="newslist"> 
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Fecha de pub</th>

                </tr>

                <?php showNews(); ?>

            </table>


        </section>


    </main>

</body>
</html>

