<?php

class Usuario
{
    public $_nombre;
    public $_clave;
    public $_mail;

    public function __construct($nombre, $clave, $mail)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public function _altaUsuario()
    {
        $miArchivo = fopen("usuarios.csv", "a");
        $array = array($this->_nombre,$this->_clave,$this->_mail);
        $arrayConComas = implode(",", $array);
        fwrite($miArchivo, "\n$arrayConComas,");
        fclose($miArchivo);
    }

    public static function _traerUsuarios()
    {
        $miArchivo = fopen("usuarios.csv","r");
        $arrayUsuarios = array();
        while(!feof($miArchivo))
        {
            $dato = fgets($miArchivo);
            list($nombre, $clave, $mail) = explode(",", $dato);
            $unUsuario = new Usuario($nombre,$clave,$mail);
            /* $dato = fgets($miArchivo);
            $unUsuario = strstr($dato,",",true); */
            array_push($arrayUsuarios, $unUsuario); 
        }
        fclose($miArchivo);

        return $arrayUsuarios;
    }

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

