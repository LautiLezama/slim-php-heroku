<?php

class Usuario
{
    public $_nombre;
    public $_clave;
    public $_mail;
    public $_id;
    public $_fecha;
    public $_imagenLoc;

    public function __construct($nombre, $clave, $mail, $id, $fecha, $imagenLoc)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_id = $id;
        $this->_fecha = $fecha;
        $this->_imagenLoc = $imagenLoc;
    }

    public function _altaUsuario()
    {
        $miArchivo = fopen("usuarios.json", "a");
        $array = array($this->_nombre,$this->_clave,$this->_mail,$this->_id,$this->_fecha,$this->_imagenLoc);
        $arrayConComas = implode(",", $array);
        fwrite($miArchivo, json_encode($this)."\n");
        fclose($miArchivo);
        echo"Registro completado. \n";
    }

    public static function _subirImagen($destino)
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
            if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino))
            {
                echo "<br/>El archivo ". basename( $_FILES["imagen"]["name"]). " ha sido subido exitosamente.";
            }
        }
    }

    public static function _traerUsuarios()
    {
        $miArchivo = fopen("usuarios.json","r");
        $arrayUsuarios = array();
        while(!feof($miArchivo))
        {
            $dato = fgets($miArchivo);
            $unUsuario = json_decode($dato);
            array_push($arrayUsuarios, $unUsuario); 
        }
        array_pop($arrayUsuarios);
        fclose($miArchivo);

        return $arrayUsuarios;
    }

    /* Todavía no transformado a json */
    public static function _loginUsuario($loginMail, $loginClave)
    {
        $retorno = "";
        $miArchivo = fopen("usuarios.csv","r");
        $arrayUsuarios = array();
        $flag = 0;

        while(!feof($miArchivo))
        {
            $dato = fgets($miArchivo);
            list($nombre, $clave, $mail) = explode(",", $dato);
            $unUsuario = new Usuario($nombre,$clave,$mail);
            array_push($arrayUsuarios, $unUsuario); 
        }

        fclose($miArchivo);

        foreach($arrayUsuarios as $unUsuario)
        {
            if(strcmp($loginMail, $unUsuario->_mail) == 0 && strcmp($loginClave,$unUsuario->_clave) == 0)
            {
                $retorno = "Verificado";
                $flag = 1;
            }
            else if(strcmp($loginMail, $unUsuario->_mail) == 0 && strcmp($loginClave,$unUsuario->_clave) != 0)
            {
                $retorno = "Error en los datos";
                $flag = 1;
            }
        }

        if($flag == 0)
        {
            $retorno = "Usuario no registrado";
        }
        

        return $retorno;
    }
}

