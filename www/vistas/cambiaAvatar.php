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
$imagen = substr($directorio . $avatarUser, 0, -1);
//echo $imagen;
if ($_FILES["avatar"]["type"] == "image/png") {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $imagen)) {
        $nombreAvatar = explode('.', $_FILES["avatar"]["name"]);
        array_pop($nombreAvatar);
        $avatar = implode(".", $nombreAvatar);
        $sql = 'INSERT INTO usuarios(foto) VALUES ("' . $nombreAvatar . '");';
        try {
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mysql->exec($sql);
        } catch (PDOException $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            die();
        }
    } else {
        echo '<script>alert("Error en la subida de fichero");</script>';
    }
} else {
    echo '<script>alert("Error: Formato de fichero incorrecto");</script>';
}
header("location:" . ROOT2);
?>
</div>
</body>
</html>
