<?php

include "usuario.php";
if(isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_POST["localidad"]))
{
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $localidad = $_POST["localidad"];
    $fecha = date('Y/m/d');

    Usuario::_insertarUsuario($nombre,$apellido,$clave,$mail,$localidad,$fecha);

}


?>