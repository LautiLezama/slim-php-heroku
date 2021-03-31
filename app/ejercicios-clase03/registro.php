<?php

include "usuario.php";
$nuevoUsuario = new Usuario();
$nuevoUsuario->_usuario = $_POST["nombre"];
$nuevoUsuario->_clave = $_POST["clave"];
$nuevoUsuario->_mail = $_POST["mail"];
if(Usuario::_validarUsuario($nuevoUsuario))
{
    Usuario::_altaUsuario($nuevoUsuario);
}


?>