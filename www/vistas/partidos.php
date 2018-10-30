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
<select>
<?php
    $sql = 'SELECT MIN(codigo) AS codigo, temporada FROM partidos GROUP BY temporada ORDER BY codigo';
    foreach ($mysql->query($sql) as $row) {
        echo '<option value="'.$row['temporada'].'">Temporada: '.$row['temporada'].'</option>';
    }
?>
</select>
<!-- usar JS para añadir los partidos-->
</div>    
</body>
</html>