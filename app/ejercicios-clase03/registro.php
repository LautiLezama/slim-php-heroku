<?php

include "usuario.php";

if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]))
{
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $nuevoUsuario = new Usuario($nombre,$clave,$mail);
    
    $nuevoUsuario->_altaUsuario();
}





?>