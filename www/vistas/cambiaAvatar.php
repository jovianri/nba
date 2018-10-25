<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Preferencias</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>
<body>
<?php
    include "menu.php";
?>
<div id="content">

<?php 
    //sacamos el nombre del usuario y el avatar de la cookie
    $cookie_data = explode(';', $_COOKIE['DWS']);
    $nameUser = $cookie_data[0];
    $avatarUser = $cookie_data[1];
    //echo $avatarUser;
    //subimos el nuevo avatar del usuario
    $directorio = "avatares/";
    //le quito la última letra porque inserta un carácter extraño al final
    $imagen = substr($directorio.$avatarUser, 0, -1);
    //echo $imagen;
    if ($_FILES["avatar"]["type"] == "image/png") {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $imagen)) {
            //if (move_uploaded_file($nombreAvatar, $imagen)) {
                    echo "El fichero se ha subido con éxito";
            } else {
                echo "Error en la subida de fichero";
            }
        
            echo "<br/> Información del fichero subido: <br />:";
            print_r($_FILES);
    } else {
            echo "Formato de fichero incorrecto";
    }
    
    header("location:" . ROOT2);
?>
</div>    
</body>
</html>
