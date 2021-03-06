<?php
    session_start();

    //conexión a la bbdd
    try {
        $mysql = new PDO("mysql:dbname=nba;host=localhost", "root", "alumno");
        $mysql->exec("set names utf8");
    } catch (PDOException $e) {
        echo "<p>Error: Cannot connect to database server.</p>\n";
        echo $e;
        exit();
    }

    function compruebaLogin(){
        if (isset($_COOKIE["DWS"])) {
            $usuario = explode(";", $_COOKIE["DWS"]);
            $_SESSION["id"] = $usuario[0];
            $_SESSION["extensionAvatar"] = $usuario[1];
            $_SESSION["logged"] = true;
        } else {
            unset($_SESSION["usuario"]);
            unset($_SESSION["avatar"]);
            $_SESSION["logged"] = false;
        }
    }

    compruebaLogin();

    include_once "config.php";
    $routes = include "routes.php";
    $page = null;

    //parsear url
    $page = null;
    $uri = trim($_SERVER["REQUEST_URI"], "/");

    //buscar la ruta en el array $routes
    foreach($routes["routes"] as $currentRoute) {
        $route = trim($currentRoute["route"], "/");
        $routerPattern = "#^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route)) . "$#D";

        // Params values that will be assigned to there respective keys
        $matchesParams = array();
        // Check if the URI matches the current route
        if(preg_match_all($routerPattern, $uri, $matchesParams)) {
            // Keys for the params
            $keys = array();
            $params = array();

            // Remove the first element 
            array_shift($matchesParams);
            
            // Getting the keys names
            preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $route, $keys);
            
            // Remove the first element sense is no necesary
            array_shift($keys);

            // Assign value to key
            for ($i = 0; $i < count($keys[0]); $i++) {
                $params[$keys[0][$i]] = $matchesParams[$i][0];
            }
            
            $page = $currentRoute["page"]; 
        }
    }
    //si ha encontrado la ruta, cargar la página. Si no, cargar la página de error
    if ($page == null)
        $page = $routes["error"];
            
    include_once (VISTAS . DS . $page);