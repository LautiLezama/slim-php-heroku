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