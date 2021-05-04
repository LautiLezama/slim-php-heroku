<?php
include "acceso.php";
class Usuario
{
    public $_id;
    public $_nombre;
    public $_apellido;
    public $_clave;
    public $_mail;
    public $_localidad;
    public $_fecha;

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

    public static function _traerUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT id as _id, nombre as _nombre, apellido as _apellido FROM usuario");
			$consulta->execute();			
			$listaUsers = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
            return $listaUsers;

	}
}
?>