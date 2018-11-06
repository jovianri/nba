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
        <div id="players">
        <?php
            $sqlNoticias = 'SELECT * FROM noticias';
            foreach ($mysql->query($sqlNoticias) as $row) {
                echo '
                    <h1>'.$row['titulo'].'</h1>
                    <p>'.$row['cuerpo'].'</p>
                    <a href="/noticia/'.$row['id'].'">Comentarios</a>
                ';
            }
        ?>
    </div>    
</body>
</html>