<?php
$user = trim($_POST["user"]);
$password = $_POST["password"];
$avatar = $_POST["avatar"];
$avatar = str_replace(".","",$avatar);

if ($user == "" || $password == "") {
    echo '<script>alert("Nombre de usuario o Contraseña vacios");
    window.location.replace("/registrarse");</script>';
}

$passTemp = password_hash("" . $password, PASSWORD_DEFAULT);

$sql = 'INSERT INTO usuarios(nombreUsuario, password, avatar) VALUES ("' . $user . '", "' . $passTemp . '", "' . $avatar . '");';

try {
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mysql->exec($sql);
    header('Location: /login');
} catch (PDOException $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '");
    window.location.replace("/registrarse");</script>';
    die();
}