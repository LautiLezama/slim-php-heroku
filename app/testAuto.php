<?php

include "classAuto.php";

//Misma marca - Distinto color
$auto1 = new Auto("Renault", "Amarillo");
$auto2 = new Auto("Renault", "Rojo");
//Misma marca - Mismo precio - Distinto precio
$auto3 = new Auto("Chevrolet","Azul",120000);
$auto4 = new Auto("Chevrolet","Azul",400000);
//Ultima sobrecarga
$auto5 = new Auto("Honda", "Negro", 300000, date('d-m-Y'));
var_dump($auto5);

$auto3->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto5->AgregarImpuestos(1500);

$sumaDeAutos = Auto::Add($auto1, $auto2);

print("El primer auto y el segundo : ");
if($auto1->Equals($auto2))
{
    print("Son iguales<br>");
}
else
{
    print("No son iguales<br>");
}

print("El primer auto y el quinto : ");
if($auto1->Equals($auto5))
{
    print("Son iguales<br>");
}
else
{
    print("No son iguales<br>");
}

print("<br><br>Auto 1: <br>");
print(Auto::MostrarAuto($auto1));
print("<br><br>Auto 3: <br>");
print(Auto::MostrarAuto($auto3));
print("<br><br>Auto 5: <br>");
print(Auto::MostrarAuto($auto5));



?>