<?php
$user = trim($_POST["user"]);
$password = $_POST["password"];
$extensionAvatar = end(explode('.', $_FILES["avatar"]["name"]));

if ($user == "" || $password == "") {
    echo '<script>alert("Nombre de usuario o Contraseña vacios");
    window.location.replace("/registrarse");</script>';
}

$passTemp = password_hash("" . $password, PASSWORD_DEFAULT);

try {
    if (getimagesize($_FILES["avatar"]["tmp_name"]) === false) {
        echo '<script>alert("Error: Fichero incorrecto");</script>';
    } elseif ($_FILES["avatar"]["type"] == "image/png" || $_FILES["avatar"]["type"] == "image/jpeg") {
        $directorio = "avatares/*";
        $sqlInsert = 'INSERT INTO usuarios(nombreUsuario, password, avatar) VALUES ("' . $user . '", "' . $passTemp . '", "' . $extensionAvatar . '");';
        $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $mysql->exec($sqlInsert);
        $idUser = $mysql->lastInsertId();
        $avatarUserNoExtension = "avatar" . $idUser;
        $avatarUserCompleto = $avatarUserNoExtension . "." . $extensionAvatar;
        $sqlUpdate = "UPDATE usuarios SET foto = '" . $avatarUserCompleto . "' WHERE nombreUsuario = " . $user . ";";
        move_uploaded_file($_FILES["avatar"]["tmp_name"], $directorio . $avatarUserCompleto);
        try {
            $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mysql->exec($sqlUpdate);
        } catch (PDOException $e) {
            echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
            die();
        }
        header('Location: /login');
    } else {
        echo '<script>alert("Error: Formato de fichero incorrecto");</script>';
    }
    echo '<script>window.location.replace("/registrarse");</script>';
} catch (PDOException $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    header('Location: /registrarse');
    die();
}
