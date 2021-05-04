public function _altaUsuario()
    {
        $miArchivo = fopen("usuarios.csv", "a");
        $array = array($this->_nombre,$this->_clave,$this->_mail);
        $arrayConComas = implode(",", $array);
        fwrite($miArchivo, "\n$arrayConComas,");
        fclose($miArchivo);
    }