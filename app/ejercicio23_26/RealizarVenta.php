<?php

include "venta.php";
if(isset($_POST["codigo"]) && isset($_POST["idUsuario"]) && isset($_POST["cantidad"]))
{
    $codigoProducto = $_POST["codigo"];
    $idUsuario = $_POST["idUsuario"];
    $cantidad = $_POST["cantidad"];
    $id = random_int(1,10000);
    $nuevaVenta = new Venta($codigoProducto,$idUsuario,$cantidad,$id);

    $nuevaVenta->_altaVenta();
}


?>