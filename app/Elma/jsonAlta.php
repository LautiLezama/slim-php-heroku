$miArchivo = fopen("usuarios.json", "a");
        fwrite($miArchivo, json_encode($this)."\n");
        fclose($miArchivo);
        echo"Registro completado. \n";