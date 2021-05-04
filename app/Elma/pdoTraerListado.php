public static function _traerUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id as _id, nombre as _nombre, apellido as _apellido FROM usuario");
			$consulta->execute();			
			$listaUsers = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
            return $listaUsers;

	}