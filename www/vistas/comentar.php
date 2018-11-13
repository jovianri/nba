<?php
$comentario = $_POST["comentario"];
$noticia = $_POST["noticia"];

str_replace("/","&frasl;",$comentario);
str_replace("<","&lt;",$comentario);
str_replace(">","&gt;",$comentario);
str_replace('"',"&quot;",$comentario);
str_replace("'","&#39;",$comentario);


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
    echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    echo '<script>window.location.replace("/noticia/'.$noticia.'");</script>';
    die();
}