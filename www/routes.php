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

        "login" => array(
            "route" => "/login",
            "page" => "login.php",
        ),
        
        "logout" => array(
            "route" => "/logout",
            "page" => "logout.php",
		),
        
        "preferencias" => array(
            "route" => "/preferencias",
            "page" => "preferencias.php",
		),
        
        "upload" => array(
            "route" => "/upload",
            "page" => "upload.php",
		),
		
		"compruebaLogin" => array(
            "route" => "/compruebaLogin",
            "page" => "compruebaLogin.php",
		),
    ),
    "error" => "error.php",
);
