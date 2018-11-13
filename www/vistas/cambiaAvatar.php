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
$cookie_data = explode(';', $_COOKIE['DWS']);
$nameUser = $cookie_data[0];

$directorio = "avatares/";

$extensionAvatar = explode('.', $_FILES["avatar"]["name"]);
$avatarUserCompleto = "avatar" . $nameUser . "." . $extensionAvatar[1];
$avatarUserNoExtension = "avatar" . $nameUser;

$imagenUrl = substr($directorio . $avatarUserCompleto, 0);
$filesP = ROOT . DS . "avatares" . DS . $avatarUserNoExtension . '.*';

if (getimagesize($_FILES["avatar"]["tmp_name"]) === FALSE) {
    echo '<script>alert("Error: Fichero incorrecto");</script>';
    echo '<script>window.location.replace("/preferencias");</script>';
} elseif ($_FILES["avatar"]["type"] == "image/png" || $_FILES["avatar"]["type"] == "image/jpeg") {
    foreach (glob($filesP) as $file) {
        unlink($file);
    }
    array_map('unlink', glob(AVATARES . DS . $avatarUserNoExtension));
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $imagenUrl)) {
        $sql = "UPDATE usuarios SET foto = '" . $avatarUserCompleto . "' WHERE id = " . $nameUser . ";";
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
