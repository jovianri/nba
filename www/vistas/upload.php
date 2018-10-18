<?php
/*
$avatarOp = $_POST["avatarOp"];

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

    header('Location: /preferencias');
}
*/
$target_dir = "" . AVATARESUP . DS;
$target_file = $target_dir . basename($_FILES["avatarUp"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    unlink($target_file);
    $uploadOk = 1;
}

if ($imageFileType != "jpg") {
    $msg = "Sorry, only JPG files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $msg = $msg . " Your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["avatarUp"]["tmp_name"], $target_file)) {
        $msg = "The file " . basename($_FILES["avatarUp"]["name"]) . " has been uploaded.";

        $usersFile = file(FILES . DS . "usuarios.txt");
        setcookie("avatar", $avatarUp, time() + 7 * 24 * 60 * 60);

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
                $edit = "" . $usuarios[$i] . ";" . $contraseñas[$i] . ";" . $_FILES["avatarUp"]["name"];
                $usersFile[$i] = $edit;
            }
            $i++;
        }
        $archivo = fopen(FILESUP . DS . "usuarios.txt", "w+");
        $string = implode("\n", $usersFile);
        fwrite($archivo, $string);
        fclose($archivo);
    } else {
        $msg = "Sorry, there was an error uploading your file.";
    }
}

echo '<script>alert("' . $msg . '");window.location.replace("/preferencias");</script>';
