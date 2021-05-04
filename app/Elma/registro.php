<?php


include "clase.php";
if(isset($_POST["campo1"]) && isset($_POST["campo2"]) && isset($_FILES['imagen/archivo']))
{
    
    $campo1 = $_POST["campo1"];
    $campo2 = $_POST["campo2"];
    $id = random_int(1,10000);
    $fecha = date('Y/m/d');

    
    $nuevoUsuario = new Usuario($nombre,$clave,$mail,$id,$fecha,basename($_FILES["imagen"]["name"]));

    
    $destino = "Usuario/Fotos/" . $_FILES["imagen"]["name"];

    
    $nuevoUsuario->_altaUsuario();

    
    Usuario::_subirImagen($destino);
}





?>