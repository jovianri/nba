<?php
$user = trim($_POST["user"]);
$password = $_POST["password"];
$avatar = $_POST["avatar"];

$passTemp = password_hash("".$password, PASSWORD_DEFAULT);

$sql = 'INSERT INTO usuarios(nombre, password, avatar) VALUES ('.$user.', '.$passTemp.', '.$avatar.');';
echo $sql;
try{
    $mysql->prepare($sql)->execute();
    header('Location: /login');
}catch(PDOException $e){
    echo '<script>alert("Error: No se ha podido registrar.'.$e.'");
    window.location.replace("/registrarse");</script>';
    die();
}