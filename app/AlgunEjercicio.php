$counter = 1;
$condicion = true;
$suma = 0;

while($condicion == true)
{
    
    if($suma < 1000)
    {
        $suma = $suma + $counter;
        $counter = $counter + 1;
        
    }
    else
    {
        $condicion = false;
    }
}
print("La Suma terminó en $suma y se sumaron $counter números");