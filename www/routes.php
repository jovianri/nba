<?php

return array(
    "routes" => array(
        "/" => array(
            "route" => "/",
            "page" => "portada.php",
        ),

        "Historia" => array(
            "route" => "/historia",
            "page" => "historia.php",
        ),

        "Jugadores" => array(
            "route" => "/jugadores",
            "page" => "jugadores.php",
        ),

        "Jugador" => array(
            "route" => "/jugador/:idJugador",
            "page" => "jugador.php",
        ),

        "Login" => array(
            "route" => "/login",
            "page" => "login.php",
        ),

        "Registrarse" => array(
            "route" => "/registrarse",
            "page" => "registrarse.php",
        ),

        "Registrar" => array(
            "route" => "/registrar",
            "page" => "registrar.php",
        ),

        "compruebaLogin" => array(
            "route" => "/compruebaLogin",
            "page" => "compruebaLogin.php",
        ),

        "logout" => array(
            "route" => "/logout",
            "page" => "logout.php",
        ),

        "preferencias" => array(
            "route" => "/preferencias",
            "page" => "preferencias.php",
        ),

        "cambiaAvatar" => array(
            "route" => "/cambiaAvatar",
            "page" => "cambiaAvatar.php",
        ),

        "partidos" => array(
            "route" => "/partidos/:idPartido",
            "page" => "partidos.php",
        ),

        "noticias" => array(
            "route" => "/noticias",
            "page" => "noticias.php",
        ),

        "noticia" => array(
            "route" => "/noticia/:idNoticia",
            "page" => "noticia.php",
        ),

        "comentar" => array(
            "route" => "/comentar",
            "page" => "comentar.php",
        ),

    ),
    "error" => "error.php",
);
