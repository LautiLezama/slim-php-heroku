<?php

include "helado.php";
include "venta.php";
if(isset($_POST["mail"]) && isset($_POST["sabor"]) && isset($_POST["tipo"]) && isset($_POST["cantidad"]) && isset($_FILES['imagen']))
{
    
    $mail = $_POST["mail"];
    $sabor = $_POST["sabor"];
    $tipo = $_POST["tipo"];
    $cantidad = $_POST["cantidad"];
    $numeroPedido = random_int(1,10000);
    $fecha = date('Y/m/d');

    if(Helado::_consultarExistencia($sabor, $tipo))
    {
        Venta::_insertarVenta($mail, $sabor, $tipo, $cantidad, $fecha,$numeroPedido);
        Helado::_descontarCantidad($sabor, $tipo, $cantidad);
        $destino = "/ImagenesDeLaVenta" . $_FILES["imagen"]["name"];
        Venta::_subirImagen($destino, $tipo, $sabor, $mail);
    }
    else
    {
        echo"\nEl item no existe";
    }
    
    

}





?>