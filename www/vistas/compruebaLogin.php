<?php
    $user = trim($_POST["user"]);
    $password = $_POST["password"];

    $usuarios = [];
    $contraseñas = [];
    $avatares = [];
    $i = 0;
    
    $usersFile = file(FILES.DS."usuarios.txt");

    //recorremos el array y guardamos los usuarios
    foreach ($usersFile as $line) {
        $arrTemp = explode(";", $line, 3);
        $usrTemp = "".$arrTemp[0];
        $passTemp = password_hash("".$arrTemp[1], PASSWORD_DEFAULT);
        $avatarTemp = "".$arrTemp[2];
        array_push($usuarios, $usrTemp);
        array_push($contraseñas, $passTemp);
        array_push($avatares, $avatarTemp);
    }


    //comprobamos el array y creamos la cookie para el login
    foreach ($usuarios as $usuario) {
        if ($user == $usuario && password_verify($password, $contraseñas[$i])) {
            $_SESSION["user"] = $usuario;
            setcookie("sesion", TRUE, time() + 7 * 24 * 60 * 60);
            setcookie("user", $usuario, time() + 7 * 24 * 60 * 60);
            setcookie("avatar", $avatares[$i], time() + 7 * 24 * 60 * 60);
            header('Location: /');
        }
        $i++;
    }
    
    echo '<script>alert("Usuario o contraseña incorrectos");
        window.location.replace("/login");</script>';
