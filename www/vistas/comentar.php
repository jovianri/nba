<?php
$comentario = $_POST["comentario"];
$noticia = $_POST["noticia"];

$comentario = str_replace("/","&frasl;",$comentario);
$comentario = str_replace("<","&lt;",$comentario);
$comentario = str_replace(">","&gt;",$comentario);
$comentario = str_replace('"',"&quot;",$comentario);
$comentario = str_replace("'","&#39;",$comentario);

echo $comentario;

if ($comentario == "") {
    echo '<script>alert("Comentario vacío");
    window.location.replace("/noticia/'.$noticia.'");</script>';
}

$sql = 'INSERT INTO comentarios(id_noticia, user, cuerpo) VALUES ("' . $noticia . '", "' . $_SESSION["id"] . '", :comentario);';
$prepared_statement = $mysql->prepare($sql);
$prepared_statement->bindParam(':comentario', $comentario);

try {
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $prepared_statement->execute();
    header('Location: /noticia/'.$noticia);
} catch (PDOException $e) {
    echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    echo '<script>window.location.replace("/noticia/'.$noticia.'");</script>';
    die();
}