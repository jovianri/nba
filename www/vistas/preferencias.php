<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>

<?php
/*
$avataresOp = array("avatar1", "avatar2", "avatar3", "avatar4", "avatar5");
$avatarOp = $_POST["avatar"];
if (!is_null($avatarOp)) {
    $usersFile = file(FILES . DS . "usuarios.txt");
    setcookie("avatar", $avatarOp, time() + 7 * 24 * 60 * 60);

    $usuarios = [];
    $contraseñas = [];
    $avatares = [];
    $i = 0;

    foreach ($usersFile as $line) {
        $arrTemp = explode(";", $line, 3);
        $usrTemp = "" . $arrTemp[0];
        $passTemp = "" . $arrTemp[1];
        $avatarTemp = "" . $arrTemp[2];
        array_push($usuarios, $usrTemp);
        array_push($contraseñas, $passTemp);
        array_push($avatares, $avatarTemp);
    }

    foreach ($usuarios as $usuario) {
        if ($usuario == $_COOKIE["user"]) {
            $edit = "" . $usuarios[$i] . ";" . $contraseñas[$i] . ";" . $avatarOp;
            $usersFile[$i] = $edit;
        }
        $i++;
    }

    $archivo = fopen(FILES . DS . "usuarios.txt", "w+");
    foreach ($usersFile as $userWrite) {
        fwrite($archivo, $userWrite);
    }
    fclose($archivo);
    echo '<script>window.location.replace("/preferencias");</script>';
}
*/
?>

<body>
<?php
include "menu.php";
?>
<div id="content">
    <!--<form action="/upload" method="post">
        Selecciona un avatar predefinido:
        <select name="avatarOp">
            <?php
            $avataresOp = array("avatar1", "avatar2", "avatar3", "avatar4", "avatar5");
                foreach ($avataresOp as $avatar) {
                    echo '<option value="' . $avatar . '.jpg' . '">' . $avatar . '</option>';
                }
            ?>
        </select>
        <input type="submit" value="Cambiar">
    </form>-->
    <form action="/upload" method="post" enctype="multipart/form-data">
        Selecciona una imagen:
        <input type="file" name="avatarUp">
        <input type="submit" value="Subir y Cambiar">
    </form>
</div>
</body>
</html>
