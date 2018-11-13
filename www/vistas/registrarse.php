<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registrarse</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>
<body>
<?php
include "menu.php";
?>
<div id="content">
    <div id="loginForm">
        <form enctype ="multipart/form-data" name="registrar" action="/registrar" method="post">
            <input type="text" class="inputAuth" name="user" placeholder="Nombre de usuario" require/>
            <input type="password" class="inputAuth" name="password" placeholder="Password" require/>
            <input type="file" class="inputAuth" name="avatar"/>
            <button id="authButton" type="submit">OK</button>
        </form>
    </div>
</div>
</body>
</html>