<?php


Class Helado
{

    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_cantidad;
    public $_id;

    public function __construct($sabor, $precioBruto, $tipo, $cantidad, $id)
    {
        $this->_sabor = $sabor;
        $this->_precio = Helado::_calcularPrecio($precioBruto);
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;
        $this->_id = $id;
    }   

    public static function _calcularPrecio($precioBruto)
    {
        $precioFinal = $precioBruto * 1.21;
        return $precioFinal;
    }

    
    public function _altaHelado()
    {
        $miArchivo = fopen("helados.json", "a");
        $valor = $this->_validarHelado();
        if($valor == -1)
        {
            
            fwrite($miArchivo,json_encode($this) . "\n");
            
            echo("Helado ingresado");
        }
        else if($valor == 1)
        {
            echo("Los valores no son validos, no se ingresará el helado.");
        }
        else
        {
            echo("Actualizado \n");
        }
        fclose($miArchivo);
    }

    public function _validarHelado()
    {
        /* Estados
        -1 = son distintos
        0 = son iguales con diferente stock, actualizar. 
        1 = los valores no son validos */
        $listaHelados = Helado::_traerHelados();
        //Son distintos, pasa la validación.(Si y solo si se queda en este valor)
        $retorno = -1;
        if($this->_precio < 0 || $this->_tipo != "agua" && $this->_tipo != "crema" || $this->_cantidad < 0)
        {
            return 1;
        }
        foreach($listaHelados as $helado)
        {   
            if($this->_sabor == $helado->_sabor && $this->_tipo == $helado->_tipo)
            {
                $helado->_cantidad = $this->_cantidad;
                $helado->_precio = $this->_precio;
                Helado::_actualizarHelado($listaHelados);
                $retorno = 0;
                break;
            }
        }
        return $retorno;
    }


    public static function _actualizarHelado($listaHelados)
    {
        $miArchivo = fopen("helados.json", "w");
        foreach($listaHelados as $helado)
        {
            fwrite($miArchivo,json_encode($helado)."\n");
        }
    }

    public static function _consultarExistencia($sabor, $tipo)
    {
        $listaHelados = Helado::_traerHelados();
        foreach($listaHelados as $helado)
        {
            if($helado->_sabor == $sabor && $helado->_tipo == $tipo)
            {
                echo"Si hay";
                return 1;
            }
            else if($helado->_sabor == $sabor && $helado->_tipo != $tipo)
            {
                echo"Existe el sabor pero no el tipo";
                break;
            }
            else if($helado->_sabor != $sabor && $helado->_tipo == $tipo)
            {
                echo"Existe el tipo pero no el sabor";
                break;
            }
            else
            {
                echo"No existe ni el sabor ni el tipo";
                break;
            }
        }
        return 0;
    }

    public static function _traerHelados()
    {
        $miArchivo = fopen("helados.json","r");
        $arrayHelados = array();
        while(!feof($miArchivo))
        {
            $dato = fgets($miArchivo);
            $helado = json_decode($dato);
            array_push($arrayHelados, $helado); 
        }
        array_pop($arrayHelados);
        fclose($miArchivo);

        return $arrayHelados;
    }

    public static function _descontarCantidad($sabor, $tipo, $cantidadVendida)
    {
        $listaHelados = Helado::_traerHelados();
        foreach($listaHelados as $helado)
        {   
            if($sabor == $helado->_sabor && $tipo == $helado->_tipo)
            {
                $helado->_cantidad = $helado->_cantidad - $cantidadVendida;
                Helado::_actualizarHelado($listaHelados);
                break;
            }
        }
    }

    public static function _subirImagen($destino, $tipo, $sabor)
    {
        $uploadOk = TRUE;

        $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);

        /* Validación 1: Si la imagen ya existe. */
        if (file_exists($destino))
        {
            echo "El archivo ya existe. \n";
            $uploadOk = false;
        }
        /* Validación 2: El peso del archivo. */
        if ($_FILES["imagen"]["size"] > 500000)
        {
            echo "El archivo es demasiado grande. \n";
            $uploadOk = false;
        }

        /* Validación 3: Si es una imagen. */
        $esImagen = getimagesize($_FILES["imagen"]["tmp_name"]);

        if($esImagen == false)
        {
            $uploadOk = false;
        }

        if($uploadOk == false)
        {
            echo"No se pudo subir el archivo.";
        }
        else
        {
            $nombreArchivo = $tipo . $sabor;
            if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino))
            {
                echo "<br/>El archivo ". $nombreArchivo. " ha sido subido exitosamente.";
            }
        }
    }
}
?>