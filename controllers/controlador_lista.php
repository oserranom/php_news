<?php 

    include_once "../models/database.php";


    function showNews(){
        $noticias = seleccionaNews(); 

        if($noticias){
            foreach ($noticias as $noticia) {
                echo "<tr class='noticia'>\n";
                    echo "<td>" . $noticia['titulo'] . "</td>\n";
                    echo "<td>" . $noticia['nombre'] . "</td>\n";
                    echo "<td> " . $noticia['fecha'] . "</td>\n";
                    echo "<td><a href='detalle_noticia.php'>Ver noticia</a></td>"; 
                echo "</tr><br>";
            }
        }else{
            echo "Error al recuperar las noticias de la base de datos"; 
        }
        
    }
/*
    echo "<tr>\n
						<td>" . $fila["ID"] . "</td>\n
						<td>" . $fila["Name"] . "</td>\n
						<td>" . $fila["CountryCode"] . "</td>\n
						<td>" . $fila["District"] . "</td>\n
						<td>" . $fila["Population"] . "</td>\n
					</tr>";*/
	
?>