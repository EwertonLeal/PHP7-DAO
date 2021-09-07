<?php

    require_once("Config.php");

    $usuario = new Usuario();
    // $usuario->getNameList('Ewerton');
//     $usuario->getByMail("ewertonolivaleal6@gmail.com");
//    echo $usuario;

    // $usuario->criarUsuario("Enzo", "Enzo@gato.com", "Enzo");
    // $usuario->atualizarNome("Maria Clara", "Clarinha");
    $usuario->removerUsuario(23);

?>