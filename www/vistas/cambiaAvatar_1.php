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
    //subimos el nuevo avatar del usuario
    $directorio = "avatares/";
    if ($_FILES["avatar"]["type"] == "image/png") {
            $imagen = $directorio . basename($_FILES["avatar"]["name"]);
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $imagen)) {
                    echo "El fichero se ha subido con éxito";
            } else {
                echo "Error en la subida de fichero";
            }
        
            echo "<br/> Información del fichero subido: <br />:";
            print_r($_FILES);
    } else {
            echo "Formato de fichero incorrecto";
    }
    $image = $_FILES["avatar"]["name"];

    //sacamos el nombre del usuario de la cookie
    $cookie_data = explode(';', $_COOKIE['DWS']);
    $nameUser = $cookie_data[0];


    $lines = file(FICHEROS  . DS . "usuarios.txt");
    $usuarios = [];
    $i = 0;
    foreach ($lines as $line) {
        $usuario = explode(";", $line);
        $usuarios[$i]["usuario"] = $usuario[0];
        $usuarios[$i]["password"] = $usuario[1];
        if ($usuario[0] == $nameUser)
            $usuarios[$i]["avatar"] = $image;
            else
                $usuarios[$i]["avatar"] = $usuario[2];
        $i++;
    }

    $archivo=fopen(FICHEROS2  . DS . "usuarios.txt","w");
    foreach ($usuarios as $usuario) {
        $string = $usuario['usuario'].";".$usuario['password'].";".$usuario["avatar"]."\n";
        echo $string;
        fwrite($archivo, $string);
    }
    fclose($archivo);

    
    //borramos la cookie
    setcookie("DWS", $user . ";" . $usuario["avatar"], -1);
    //volvemos a crearla
    setcookie("DWS", $nameUser . ";" . $image, time() + (86400 * 7));
    
    header("location:" . ROOT2);
?>
</div>    
</body>
</html>
