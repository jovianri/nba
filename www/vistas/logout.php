<?php
unset($_COOKIE["sesion"]);
unset($_COOKIE["avatar"]);
setcookie("sesion", null, -1, "/");
setcookie("avatar", null, -1, "/");
echo '<script>window.location.replace("/login");</script>';