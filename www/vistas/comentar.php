<?php
$comentario = $_POST["comentario"];
$noticia = $_POST["noticia"];

if ($comentario == "") {
    echo '<script>alert("Comentario vacío");
    window.location.replace("/noticia/'.$noticia.'");</script>';
}

$sql = 'INSERT INTO comentarios(id_noticia, user, cuerpo) VALUES ("' . $noticia . '", "' . $_SESSION["id"] . '", "' . $comentario . '");';

try {
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mysql->exec($sql);
    header('Location: /noticia/'.$noticia);
} catch (PDOException $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '");
    window.location.replace("/noticia/'.$noticia.'");</script>';
    die();
}
