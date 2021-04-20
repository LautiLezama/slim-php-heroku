<?php

include "producto.php";
if(isset($_POST["nombre"]) && isset($_POST["codigo"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"]))
{
    $nombre = $_POST["nombre"];
    $codigo = $_POST["codigo"];
    $tipo = $_POST["tipo"];
    $stock = $_POST["stock"];
    $precio = $_POST["precio"];
    $id = random_int(1,10000);
    $nuevoProducto = new Producto($nombre,$codigo,$tipo,$stock,$precio,$id);

    
    $nuevoProducto->_altaProducto();
}


?>