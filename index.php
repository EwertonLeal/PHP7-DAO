<?php

    require_once("Config.php");

    $usuario = new Usuario();
    // $usuario->getNameList('Ewerton');
    $usuario->getByMail("ewertonolivaleal6@gmail.com");
   echo $usuario;

?>