<?php

class Producto
{
    public $_nombre;
    public $_codigo;
    public $_tipo;
    public $_stock;
    public $_precio;
    public $_id;

    public function __construct($nombre, $codigo, $tipo, $stock, $precio, $id)
    {
        $this->_nombre = $nombre;
        $this->_codigo = $codigo;
        $this->_tipo = $tipo;
        $this->_stock = $stock;
        $this->_precio = $precio;
        $this->_id = $id;
    }

    public function _altaProducto()
    {

        $miArchivo = fopen("productos.json", "a");
        $valor = $this->_validarProducto();
        if($valor == -1)
        {
            
            fwrite($miArchivo,json_encode($this) . "\n");
            
            echo("Ingresado");
        }
        else if($valor == 1)
        {
            echo("No se pudo hacer. \n");
        }
        else
        {
            echo("Actualizado \n");
        }
        fclose($miArchivo);
        
        
    }

    public function _validarProducto()
    {
        /* Estados
        1 = son iguales con mismo stock, no se crea el producto.
        -1 = son distintos
        0 = son iguales con diferente stock, actualizar. */
        $listaProductos = Producto::_traerProductos();
        //Son distintos, pasa la validación.(Si y solo si se queda en este valor)
        $retorno = -1;
        foreach($listaProductos as $unProducto)
        {   
            if($this->_codigo == $unProducto->_codigo)
            {
                if($this->_stock != $unProducto->_stock)
                {
                    //Son iguales con distinto stock, se actualiza.
                    $unProducto->_stock = $this->_stock;
                    Producto::_actualizarProducto($listaProductos);
                    $retorno = 0;
                    break;
                }
                else
                {
                    //Son iguales con mismo stock, no pasa la validación.
                    $retorno = 1;
                    break;
                }
                
            }
        }
        
        return $retorno;
    }

    public static function _traerProductos()
    {
        $miArchivo = fopen("productos.json","r");
        $arrayProductos = array();
        while(!feof($miArchivo))
        {
            $dato = fgets($miArchivo);
            $unProducto = json_decode($dato);
            array_push($arrayProductos, $unProducto); 
        }
        array_pop($arrayProductos);
        fclose($miArchivo);

        return $arrayProductos;
    }

    public static function _actualizarProducto($listaProductos)
    {
        $miArchivo = fopen("productos.json", "w");
        foreach($listaProductos as $unProducto)
        {
            fwrite($miArchivo,json_encode($unProducto)."\n");
        }
    }

}





?>