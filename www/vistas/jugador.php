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
        $sql = 'SELECT * FROM jugadores WHERE Nombre_equipo = "Lakers" AND codigo = "'.$idjugador.'"';
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
        /*$sth = $mysql->prepare($sql);
        $sth->execute();
        $array = $sth->fetchAll();

        switch ($idjugador) {
            case $array[0]['codigo']:
                echo '
                    <img src="'.IMAGENES . DS . $array[0]['foto'].'" style=" width: 120px; height: 180px;" />
                    <figcaption>Nombre: '.$array[0]['Nombre'].'</figcaption>
                    <figcaption>Procedencia: '.$array[0]['Procedencia'].'</figcaption>
                    <figcaption>Altura: '.$array[0]['Altura'].'</figcaption>
                    <figcaption>Peso: '.$array[0]['Peso'].'</figcaption>
                    <figcaption>Posicion: '.$array[0]['Posicion'].'</figcaption>
                ';
                break;
            case $array[1]['codigo']:
                echo '
                    <img src="'.IMAGENES . DS . $array[1]['foto'].'" style=" width: 120px; height: 180px;" />
                    <figcaption>Nombre: '.$array[1]['Nombre'].'</figcaption>
                    <figcaption>Procedencia: '.$array[1]['Procedencia'].'</figcaption>
                    <figcaption>Altura: '.$array[1]['Altura'].'</figcaption>
                    <figcaption>Peso: '.$array[1]['Peso'].'</figcaption>
                    <figcaption>Posicion: '.$array[1]['Posicion'].'</figcaption>
                ';
                break;
            case $array[2]['codigo']:
                echo '
                    <img src="'.IMAGENES . DS . $array[2]['foto'].'" style=" width: 120px; height: 180px;" />
                    <figcaption>Nombre: '.$array[2]['Nombre'].'</figcaption>
                    <figcaption>Procedencia: '.$array[2]['Procedencia'].'</figcaption>
                    <figcaption>Altura: '.$array[2]['Altura'].'</figcaption>
                    <figcaption>Peso: '.$array[2]['Peso'].'</figcaption>
                    <figcaption>Posicion: '.$array[2]['Posicion'].'</figcaption>
                ';
                break;
            case $array[3]['codigo']:
                echo '
                    <img src="'.IMAGENES . DS . $array[3]['foto'].'" style=" width: 120px; height: 180px;" />
                    <figcaption>Nombre: '.$array[3]['Nombre'].'</figcaption>
                    <figcaption>Procedencia: '.$array[3]['Procedencia'].'</figcaption>
                    <figcaption>Altura: '.$array[3]['Altura'].'</figcaption>
                    <figcaption>Peso: '.$array[3]['Peso'].'</figcaption>
                    <figcaption>Posicion: '.$array[3]['Posicion'].'</figcaption>
                ';
                break;
            case $array[4]['codigo']:
                echo '
                    <img src="'.IMAGENES . DS . $array[4]['foto'].'" style=" width: 120px; height: 180px;" />
                    <figcaption>Nombre: '.$array[4]['Nombre'].'</figcaption>
                    <figcaption>Procedencia: '.$array[4]['Procedencia'].'</figcaption>
                    <figcaption>Altura: '.$array[4]['Altura'].'</figcaption>
                    <figcaption>Peso: '.$array[4]['Peso'].'</figcaption>
                    <figcaption>Posicion: '.$array[4]['Posicion'].'</figcaption>
                ';
                break;
            
            default:
                # code...
                break;
        }*/
    ?>
</div>    
</body>
</html>