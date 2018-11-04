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
<select id="temporada" onchange="temporada()">
<option value="0">Seleccione una temporada</option>
<?php
    $sql = 'SELECT MIN(codigo) AS codigo, temporada FROM partidos GROUP BY temporada ORDER BY codigo';
    foreach ($mysql->query($sql) as $row) {
        echo '<option value="'.$row['temporada'].'">Temporada: '.$row['temporada'].'</option>';
    }
?>
</select>
<script>
function temporada(){
var selected = document.getElementById("temporada").value;
selected = selected.replace("/", "-");
window.location.replace("http://nba.test/partidos/"+selected);
}
</script>
<?php
$key = $keys[0][0];
$idtemporada = $params[$key];
$idtemporada = str_replace("-", "/", $idtemporada);
echo "<br><h2>Temporada: ".$idtemporada."</h2><br>";
$sql = 'SELECT * FROM partidos WHERE temporada = "'.$idtemporada.'"';
foreach ($mysql->query($sql) as $row) {
    if ($idtemporada == $row['temporada']) {
        echo '
            <div style="border: 2px solid;width: 250px;display: inline-block;margin-bottom: 4px;">
                <p>'.$row['equipo_local'].' VS '.$row['equipo_visitante'].'</p>
                <p>Resultado: '.$row['puntos_local'].' a '.$row['puntos_visitante'].'</p>
            </div>
        ';
    }
}
?>
</div>    
</body>
</html>