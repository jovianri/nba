<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Log in</title>
    <link rel="stylesheet" type="text/css" media="screen" href="<?=CSS . DS?>estilos.css" />
</head>
<body>
<?php
include "menu.php";
?>
<div id="content">
    <div class="formulario--login">
        <h2>Log In</h2>
        <form action="/compruebaLogin" method="post">
            <input type="text" name="user" placeholder="Nombre de usuario">
            <br>
            <input type="text" name="password" placeholder="Password">
            <br><br>
            <input type="submit" value="Ok">
        </form>
    </div>
</div>
</body>
</html>
