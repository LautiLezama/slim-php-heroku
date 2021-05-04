<?php

include "venta.php";
if(isset($_PUT["numero_pedido"]) && isset($_PUT["mail"]) && isset($_PUT["sabor"]) && isset($_PUT["tipo"]) && isset($_PUT['cantidad']))
{
    
    $numero_pedido = $_PUT["numero_pedido"];
    $mail = $_PUT["mail"];
    $sabor = $_PUT["sabor"];
    $tipo = $_PUT["tipo"];
    $cantidad = $_PUT["cantidad"];

    Venta::_modificarVenta($numero_pedido, $mail, $sabor, $tipo, $cantidad);
}


?>