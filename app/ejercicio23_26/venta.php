<?php

include "usuario.php";
include "producto.php";

class Venta
{
    public $_codigoProducto;
    public $_idUsuario;
    public $_cantidad;
    public $_id;

    public function __construct($codigoProducto, $idUsuario, $cantidad, $id)
    {
        $this->_codigoProducto = $codigoProducto;
        $this->_idUsuario = $idUsuario;
        $this->_cantidad = $cantidad;
        $this->_id = $id;
    }

    public function _altaVenta()
    {

        if($this->_validarVenta())
        {
            $miArchivo = fopen("ventas.json", "a");
            fwrite($miArchivo,json_encode($this) . "\n");
            fclose($miArchivo);
            echo"Venta realizada";
        }  
        else
        {
            echo"no se pudo hacer";
        } 
    }

    public function _validarVenta()
    {
        $flagUsuario = 0;
        $flagProducto = 0;
        foreach(Usuario::_traerUsuarios() as $unUsuario)
        {   
            if($unUsuario->_id == $this->_idUsuario)
            {
                  $flagUsuario = 1;
            }
        }

        foreach(Producto::_traerProductos() as $unProducto)
        {
            if($unProducto->_codigo == $this->_codigoProducto)
            {
                if($unProducto->_stock > 0)
                {
                    $flagProducto = 1;
                }
            }
        }

        if($flagProducto == 1 && $flagUsuario == 1)
        {
            //Validado correctamente.
            return true;
        }
        else
        {
            return false;
        }
    }



}





?>