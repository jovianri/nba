<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>
<body>
<?php
    include "menu.php";
?>
<div id="content">
    <?php
        $key = $keys[0][0];
        $idjugador = $params[$key];
        $sql = 'SELECT * FROM jugadores WHERE Nombre_equipo = "Lakers" AND codigo = "'.$idjugador.'" LIMIT 1';
        foreach ($mysql->query($sql) as $row) {
            echo '
                <img src="'.IMAGENES . DS . $row['foto'].'" style=" width: 120px; height: 180px;" />
                <figcaption>Nombre: '.$row['Nombre'].'</figcaption>
                <figcaption>Procedencia: '.$row['Procedencia'].'</figcaption>
                <figcaption>Altura: '.$row['Altura'].'</figcaption>
                <figcaption>Peso: '.$row['Peso'].'</figcaption>
                <figcaption>Posicion: '.$row['Posicion'].'</figcaption>
            ';
        }
    ?>
</div>    
</body>
</html>