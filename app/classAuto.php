<?php
class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = 0, $fecha = 0)
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    }

    public function AgregarImpuestos($impuesto)
    {
        $this->_precio = $this->_precio + $impuesto;
    }

    public static function MostrarAuto($auto)
    {
        return "Marca: $auto->_marca <br>Color: $auto->_color <br>Precio: $auto->_precio <br>Fecha: $auto->_fecha";
    }

    public function Equals($auto2)
    {
        if($this->_marca == $auto2->_marca)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function Add($auto1, $auto2)
    {
        if($auto1->_marca == $auto2->_marca && $auto1->_color == $auto2->_color)
        {
            return $auto1->_precio + $auto2->_precio;
        }
        else
        {
            return 0;
        }
    }
    
}
?>