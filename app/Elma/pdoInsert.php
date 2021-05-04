public static function _insertarUsuario($nombre,$apellido,$clave,$mail,$localidad,$fecha)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `usuario`(`nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`)
        VALUES (:nombre,:apellido,:clave,:mail,:fecha,:localidad)");
        $consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $clave, PDO::PARAM_INT);
        $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
        $consulta->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $consulta->bindValue(':localidad', $localidad, PDO::PARAM_STR);
        $consulta->execute();
        echo"Usuario registrado en la base de datos";
    }
