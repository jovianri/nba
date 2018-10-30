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
        <div id="players">
            <?php
            $sql = 'SELECT codigo, nombre, foto FROM jugadores WHERE Nombre_equipo = "Lakers" ORDER BY nombre LIMIT 5';
            foreach ($mysql->query($sql) as $row) {
            echo '<a href="/jugador/'.$row['codigo'].'">
                <figure class="playersTeam">
                    <img src="'.IMAGENES . DS . $row['foto'].'" style=" width: 120px; height: 180px;" />
                    <figcaption>'.$row['nombre'].'</figcaption>
                </figure>
            </a>';
        }
        ?>
    </div>
</div>
</body>
</html>