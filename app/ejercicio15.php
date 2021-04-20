<?php

$rectangulo1 = new Rectangulo(12, 20);
$rectangulo1->SetColor("red");
print($rectangulo1->Dibujar());
print($rectangulo1->ToString());
echo"<br><br>";
$triangulo1 = new Triangulo(13,18);
$triangulo1->SetColor("yellow");
print($triangulo1->Dibujar());
print($triangulo1->ToString());

abstract class FiguraGeometrica
{

    protected $_color;
    protected $_perimetro;
    protected $_superficie;


    public function __construct()
    {
        
    }


    public function GetColor()
    {
        return $this->_color;
    }

    public function SetColor($color)
    {
        $this->_color = $color;
    }

    public function ToString()
    {

    }

    public abstract function Dibujar();

    protected abstract function CalcularDatos();
}

class Rectangulo extends FiguraGeometrica
{
    private $_ladoUno;
    private $_ladoDos;

    public function __construct($l1, $l2)
    {
        $this->_ladoUno = $l1;
        $this->_ladoDos = $l2;
        $this->CalcularDatos();
    }

    public function CalcularDatos()
    {
        $this->_perimetro = ($this->_ladoUno + $this->_ladoDos)*2;
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }

    public function Dibujar()
    {
        return "<p style='color:$this->_color'>********************<br>********************<br>********************<br><p>";
    }

    public function ToString()
    {
        return ("Datos del rectangulo: <br>Color : $this->_color<br>Perimetro : $this->_perimetro<br>Superficie : $this->_superficie<br>
        El primer lado mide $this->_ladoUno cm mientras que el segundo lado mide $this->_ladoDos cm.");
    }
}

class Triangulo extends FiguraGeometrica
{
    private $_altura;
    private $_base;

    public function __construct($b, $h)
    {
        $this->_altura = $h;
        $this->_base = $b;
        $this->CalcularDatos();
    }

    public function CalcularDatos()
    {   
        $bpow = pow($this->_base,2);
        $hpow = pow($this->_altura,2);
        $numeroRaiz = $hpow + $bpow;
        $this->_perimetro = sqrt($numeroRaiz) + $this->_base + $this->_altura;
        $this->_superficie = ($this->_altura * $this->_base) / 2;
    }

    public function Dibujar()
    {
        return "<p style='color:$this->_color'>-----*<br>---***<br>--*****<br>-*******<br>*********<br><p>";
    }

    public function ToString()
    {
        return ("Datos del triangulo: <br>Color : $this->_color<br>Perimetro : $this->_perimetro<br>Superficie : $this->_superficie<br>
        La altura es de $this->_altura cm mientras que la base mide $this->_base cm.");
    }
}
?>