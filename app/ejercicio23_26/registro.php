<?php

include "usuario.php";
if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"]) && isset($_FILES['imagen']))
{
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];
    $mail = $_POST["mail"];
    $id = random_int(1,10000);
    $fecha = date('Y/m/d');
    $nuevoUsuario = new Usuario($nombre,$clave,$mail,$id,$fecha,basename( $_FILES["imagen"]["name"]));

    
    $destino = "Usuario/Fotos/" . $_FILES["imagen"]["name"];

    
    $nuevoUsuario->_altaUsuario();
    Usuario::_subirImagen($destino);
}





?>