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
        $datos= "$this->_nombre,$this->_clave,$this->_mail";
        fwrite($miArchivo, "$datos\n");
        fclose($miArchivo);
    }
}

