<?php

    require_once("Config.php");

    $usuario = new Usuario();
    $usuario->getByName('Ewerton Oliva Leal');
    echo $usuario;
?>