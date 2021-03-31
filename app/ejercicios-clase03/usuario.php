<?php

class Usuario
{
    public $_usuario;
    public $_clave;
    public $_mail;

    static function _validarUsuario($usuario)
    {
        $_estado = null;
        if (isset($usuario->_usuario) && isset($usuario->_clave) && isset($usuario->_mail)) 
        {
            $_estado = "Registrado";
        } else {
            $_estado = "Faltan datos";
        }

        $miArchivo = fopen("usuarios.csv", "a");
        fwrite($miArchivo, "$usuario->_usuario - $usuario->_clave - $usuario->_mail - ESTADO: $_estado\n");
        fclose($miArchivo);

        return $_estado;
    }
}

