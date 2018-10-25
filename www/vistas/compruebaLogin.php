<?php
$user = trim($_POST["user"]);
$password = $_POST["password"];

//Comprobamos el usuario
$sql = "SELECT id, password, avatar, COUNT(1) FROM usuarios
        WHERE nombreUsuario = :user LIMIT 1";
$prepared_statement = $mysql->prepare($sql);
$prepared_statement->bindParam(':user', $user, PDO::PARAM_STR);
if (!$prepared_statement->execute()) {
    $this->setError("Error al comprobar usuario registrado");
}

$res = $prepared_statement->fetch(PDO::FETCH_NUM);
if ($res[3] === "0") {
    echo "nombre de usuario no válido";
}

$passwordBBDD = $res[1];

if (password_verify($password, $passwordBBDD)) {
    setcookie("DWS", $res[0] . ";" . $res[2], time() + (86400 * 7));
    header("location:" . ROOT2);
} else {
    echo "password no válido";
}
