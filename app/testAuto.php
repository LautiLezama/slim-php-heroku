<?php
//Misma marca - Distinto color
$auto1 = new Auto("Renault", "Amarillo");
$auto2 = new Auto("Renault", "Rojo");
//Misma marca - Mismo precio - Distinto precio
$auto3 = new Auto("Chevrolet","Azul",120000);
$auto4 = new Auto("Chevrolet","Azul",400000);
//Ultima sobrecarga
$auto5 = new Auto("Honda", "Negro", 300000, date('d-m-Y'));

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

$sumaDeAutos = Auto::Add($auto1, $auto2);

print("El primer auto y el segundo : ");
if($auto1->Equals($auto2))
{
    print("Son iguales");
}
else
{
    print("No son iguales");
}

print("El primer auto y el quinto : ");
if($auto1->Equals($auto5))
{
    print("Son iguales");
}
else
{
    print("No son iguales");
}

print(Auto::MostrarAuto($auto1));
print(Auto::MostrarAuto($auto3));
print(Auto::MostrarAuto($auto5));

class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __constructor($marca, $color)
    {
        $this->_marca = $marca;
        $this->_color = $color;
    }

    public function __constructor2($marca, $color, $precio)
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
    }

    public function __constructor3($marca, $color, $precio, $fecha)
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
        return "Marca: $auto->_precio <br>Color: $auto->_color <br>Precio: $auto->_precio <br>Fecha: $auto->_fecha";
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