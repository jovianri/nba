<div id="header">
    <a href="/"><div class="option">Inicio</div></a>
    <a href="/historia"><div class="option">Historia</div></a>
    <a href="/jugadores"><div class="option">Jugadores</div></a>
<<<<<<< HEAD
    <a href="/partidos"><div class="option">Partidos</div></a>
    <a href="/noticias"><div class="option">Noticias</div></a>    
=======
    <a href="/partidos/0"><div class="option">Partidos</div></a>
>>>>>>> afaa23e2ef25554f89c9ed3b7144b564c7122b24
    <?php
        if ($_SESSION['logged']) { 
    ?>
    <div class="option" id="logged">
        <img id="avatar" src="<?= AVATARES . DS . NOMBREAVATAR . 
            $_SESSION['id'] . "." . $_SESSION['extensionAvatar']?>">
        <div id="loggedDialog">
            <a href="/preferencias">
                <div class="loggedDialogOption">Preferencias</div>
            </a>
            <a href="/logout">
                <div class="loggedDialogOption">Desconectar</div>
            </a>
        </div>
    </div>
    <?php 
        }else {
    ?>
    <a href="/login"><div class="option" id="login">Login</div></a>
    <a href="/registrarse"><div class="option" id="login">Registrarse</div></a>
    <?php        
        }
    ?>
    <!--<a href="/login"><div class="option" id="login">Login</div></a>-->
    <?= $texto; ?>
</div>