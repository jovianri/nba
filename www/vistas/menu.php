<div id="header">
    <a href="/"><div class="option">Inicio</div></a>
    <a href="/historia"><div class="option">Equipo</div></a>
    <a href="/jugadores"><div class="option">Jugadores</div></a>
    <?php 
        if ($_COOKIE["sesion"]) {
            echo '<a href="/logout"><div class="login">Log out</div></a>';
            echo '<a href="/preferencias"><div class="login"><img class="avatar" src="' . AVATARES . DS . $_COOKIE["avatar"] .'" /></div></a>';
        }else {
            echo '<a href="/login"><div class="login">Log in</div></a>';
        }
    ?>
</div>