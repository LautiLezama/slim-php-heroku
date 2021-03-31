<?php

class Usuario
{
    public $_nombre;
    public $_clave;
    public $_mail;

    static function _validarUsuario($usuario)
    {
        $_estado = null;
        if (isset($usuario->_nombre) && isset($usuario->_clave) && isset($usuario->_mail)) 
        {
            echo "Registrado";
            return true;
        } else {
            echo "Faltan datos";
            return false;
        }
    }

    static function _altaUsuario($usuario)
    {
        $miArchivo = fopen("usuarios.csv", "a");
        $datos= "$usuario->_nombre,$usuario->_clave,$usuario->_mail";
        fwrite($miArchivo, "$datos\n");
        fclose($miArchivo);
    }
}

