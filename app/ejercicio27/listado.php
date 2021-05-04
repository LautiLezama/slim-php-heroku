<?php

include "usuario.php";

if(isset($_GET["listado"]))
{
    $listado = $_GET["listado"];

    switch($listado)
    {
        case "usuarios":
            $listaUsuarios = Usuario::_traerUsuarios();
            echo"<ul>";
            foreach($listaUsuarios as $unUsuario)
            {   
                print("<li>$unUsuario->_id - $unUsuario->_nombre - $unUsuario->_apellido</li> \n");
            }
            echo"</ul>";
            break;
        case "productos":
            break;
        case "ventas":
            break;
        default: 
            echo"Error, ningun tipo de lista recibida";
    }


 } 

?>