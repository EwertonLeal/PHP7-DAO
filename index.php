<?php

    require_once("Config.php");

    $usuario = new Usuario();
    $usuario->getById(5);
    echo $usuario;
?>