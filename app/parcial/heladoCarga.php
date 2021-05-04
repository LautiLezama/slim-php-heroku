<?php

include "helado.php";
if(isset($_POST["sabor"]) && isset($_POST["precioBruto"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]) && isset($_FILES['imagen']))
{
    
    $sabor = $_POST["sabor"];
    $precioBruto = $_POST["precioBruto"];
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $id = random_int(1,10000);

    
    $nuevoHelado = new Helado($sabor, $precioBruto, $tipo, $cantidad, $id);
    $nuevoHelado->_altaHelado();
    $destino = "/ImagenesDeHelados" . $_FILES["imagen"]["name"];
    Helado::_subirImagen($destino, $tipo, $sabor);
}


?>