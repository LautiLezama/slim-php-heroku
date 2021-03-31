<?php

include "usuario.php";
var_dump($_GET);
$nuevoUsuario = new Usuario();
$nuevoUsuario->_usuario = $_POST["usuario"];
$nuevoUsuario->_clave = $_POST["clave"];
$nuevoUsuario->_mail = $_POST["mail"];
echo Usuario::_validarUsuario($nuevoUsuario);


?>