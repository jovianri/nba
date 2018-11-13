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
            $key = $keys[0][0];
            $idnoticia = $params[$key];
            $sqlNoticias = 'SELECT * FROM noticias WHERE id = "'.$idnoticia.'" LIMIT 1';
            foreach ($mysql->query($sqlNoticias) as $row) {
                echo '
                    <h1>'.$row['titulo'].'</h1>
                    <p>'.$row['cuerpo'].'</p>
                    <h3>Comentarios</h3>
                    ';
                if ($_SESSION['logged']) {
                    echo '
                        <div id="content">
                            <form name="comentar" action="/comentar" method="post">
                                <textarea rows="4" cols="50" name="comentario" placeholder="Comenta Aquí"></textarea>
                                <input type="text" class="inputAuth" name="noticia" value="'.$idnoticia.'" hidden/>
                                <button id="authButton" type="submit">OK</button>
                            </form>
                        </div>
                    ';
                }
                $sqlComentarios = 'SELECT * FROM comentarios WHERE id_noticia = "'.$row['id'].'"';
                foreach ($mysql->query($sqlComentarios) as $rowC) {
                    echo '<div style="margin: 5px;border-radius: 8px;border: 2px solid;">';
                    $sqlUser = 'SELECT * FROM usuarios WHERE id = "'.$rowC['user'].'"';
                    foreach ($mysql->query($sqlUser) as $rowU) {
                        echo '<h2>User: '.$rowU['nombreUsuario'].'</h2>';
                    }
                    echo    '<p>'.$rowC['cuerpo'].'</p>
                            </div>
                        ';
                }
            }
        ?>
    </div>    
</body>
</html>