<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>

<body>
<?php
include "menu.php";
?>
<div id="content">
    <form action="/upload" method="post" enctype="multipart/form-data">
        Selecciona una imagen:
        <input type="file" name="avatarUp">
        <input type="submit" value="Subir y Cambiar">
    </form>
</div>
</body>
</html>
