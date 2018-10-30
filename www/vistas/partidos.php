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
    $sql = 'SELECT * FROM partidos ORDER BY codigo';
    foreach ($mysql->query($sql) as $row) {
        echo '<option value="'.$row['codigo'].'">'.$row['equipo_local'].' VS '.$row['equipo_visitante'].'</option>';
    }

?>
</select>
</div>    
</body>
</html>