<?php

include "venta.php";
if(isset($_DELETE["numero_pedido"]))
{
    
    $numero_pedido = $_DELETE["numero_pedido"];
    
    Venta::_borrarVenta($numero_pedido);
}


?>