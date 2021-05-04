
<?php
//a- la cantidad de helados vendidos
$cantidadHeladosVendidos = Venta::_cantidadHeladosVendidos();
echo"La cantidad de helados vendidos es de " . $cantidadHeladosVendidos;
//b- el listado de los usuarios que realizaron compras entre dos fechas.
//c- el listado de ventas de un usuario ingresado
$mail = "ejemplo@asd.com";
echo"<ul>";
    foreach(Venta::_ventasSegunUsuario($mail) as $venta)
    {   
             print("<li>$venta->_id - $venta->_sabor - $venta->_tipo</li> \n");
    }
echo"</ul>";
//d- el listado de ventas de un tipo ingresado 

?>