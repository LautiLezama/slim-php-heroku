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