<?php
include "acceso.php";
class Venta
{
    public $_mail;
    public $_sabor;
    public $_tipo;
    public $_cantidad;
    public $_fecha;
    public $_id;
    public $_numeroPedido;

    public static function _insertarVenta($mail, $sabor, $tipo, $cantidad, $fecha, $numeroPedido)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `venta`(`mail`, `sabor`, `tipo`, `cantidad`, `fecha`, `numero_pedido`)
        VALUES (:mail,:sabor,:tipo,:cantidad,:fecha,:numero_pedido)");
        $consulta->bindValue(':mail',$mail, PDO::PARAM_STR);
        $consulta->bindValue(':sabor', $sabor, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $consulta->bindValue(':cantidad',$cantidad, PDO::PARAM_INT);
        $consulta->bindValue(':fecha', $fecha, PDO::PARAM_STR);
        $consulta->bindValue(':numero_pedido', $numeroPedido, PDO::PARAM_INT);
        $consulta->execute();
        echo"Venta registrada en la base de datos";
    }

    public static function _subirImagen($destino, $tipo, $sabor, $mail)
    {
        $uploadOk = TRUE;

        $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);

        /* Validación 1: Si la imagen ya existe. */
        if (file_exists($destino))
        {
            echo "El archivo ya existe. \n";
            $uploadOk = false;
        }
        /* Validación 2: El peso del archivo. */
        if ($_FILES["imagen"]["size"] > 500000)
        {
            echo "El archivo es demasiado grande. \n";
            $uploadOk = false;
        }

        /* Validación 3: Si es una imagen. */
        $esImagen = getimagesize($_FILES["imagen"]["tmp_name"]);

        if($esImagen == false)
        {
            $uploadOk = false;
        }

        if($uploadOk == false)
        {
            echo"No se pudo subir el archivo.";
        }
        else
        {
            $mailUser = strstr($mail, '@', true);
            $nombreArchivo = $tipo . $sabor . $mailUser;
            if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino))
            {
                echo "<br/>El archivo ". $nombreArchivo. " ha sido subido exitosamente.";
            }
        }
    }

    public static function _modificarVenta($numero_pedido, $mail, $sabor, $tipo, $cantidad)
    {
        
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE venta SET mail = :mail, sabor = :sabor,tipo = :tipo, cantidad = :cantidad WHERE numero_pedido = :numero_pedido");
            $consulta->bindValue(':mail',$nombre, PDO::PARAM_STR);
            $consulta->bindValue(':sabor', $apellido, PDO::PARAM_STR);
            $consulta->bindValue(':tipo', $clave, PDO::PARAM_STR);
            $consulta->bindValue(':cantidad',$mail, PDO::PARAM_INT);
            $consulta->bindValue(':numero_pedido', $numeroPedido, PDO::PARAM_INT);
            $consulta->execute();			

    }

    public static function _borrarVenta($numero_pedido)
    {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            //Borrar foto en caso de existir
            $consulta =$objetoAccesoDato->RetornarConsulta("SELECT mail as _mail, tipo as _tipo, sabor as _sabor from venta WHERE numero_pedido = :numero_pedido");
            $consulta->bindValue(':numero_pedido', $numeroPedido, PDO::PARAM_INT);
            $consulta->execute();	
            $venta = $consulta->fetch(PDO::FETCH_CLASS, "Venta");
            $mailUser = strstr($venta->_mail, '@', true);
            $nombreArchivo = $venta->_tipo . $venta->_sabor . $mailUser;
            move_uploaded_file($nombreArchivo."png", "/BACKUPVENTAS");
            //Borrar de la base de datos
			$consulta =$objetoAccesoDato->RetornarConsulta("DELETE from venta WHERE numero_pedido = :numero_pedido");
            $consulta->bindValue(':numero_pedido', $numeroPedido, PDO::PARAM_INT);
            $consulta->execute();	
            echo"Venta borrada";
    }

    public static function _cantidadHeladosVendidos()
    {
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT SUM(cantidad) FROM venta;");
        $consulta->execute();
        $cantidad = $consulta->fetch(PDO::FETCH_NUM);
        return $cantidad;
    }

    public static function _ventasSegunUsuario($mail)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("SELECT sabor as _sabor, tipo as _tipo, id as _id FROM venta WHERE mail = :mail");
            $consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
			$consulta->execute();			
			$listaUsers = $consulta->fetchAll(PDO::FETCH_CLASS, "Venta");
            return $listaUsers;

	}



}




?>