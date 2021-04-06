<?php

include "usuario.php";

if(isset($_POST["mail"]) && isset($_POST["clave"]))
{
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    print(Usuario::_loginUsuario($mail,$clave));
    
}






?>