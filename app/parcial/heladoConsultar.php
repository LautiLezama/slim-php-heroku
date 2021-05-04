<?php


include "helado.php";
if(isset($_POST["sabor"]) && isset($_POST["tipo"]))
{
    
    $sabor = $_POST["sabor"];
    $tipo = $_POST["tipo"];

    Helado::_consultarExistencia($sabor, $tipo);

}





?>