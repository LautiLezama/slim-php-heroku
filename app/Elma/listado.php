<?php

include "usuario.php";

if(isset($_GET["listado"]))
{
    $listado = $_GET["listado"];

    switch($listado)
    {
        case "usuarios":
            echo"<ul>";
            foreach(Usuario::_traerUsuarios() as $unUsuario)
            {   
                 print("<li>$unUsuario->_nombre, $unUsuario->_imagenLoc</li> \n");
            }
            echo"</ul>";
            break;
        default: 
            echo"Error, ningun tipo de lista recibida";
    }


 } 

?>