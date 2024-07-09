   <?php


class cruduser
{
    public function agregaruser($datos)
    {
      
           include('../conn.php');


            
    $usuario= "INSERT INTO tbusuario (cuenta, contrasena, email, tipoUsuario) VALUES ('$datos[4]', '$datos[5]', '$datos[2]', '2')" or die ("error al agregar tbusuario");
    mysqli_query($conn, $usuario) or die ("error en el insercion usuario");
    $iduser=mysqli_insert_id($conn);
    
    
    $cliente= "INSERT INTO tbcliente (idCliente, idUsuario, nombre, telefono, email, tipoCliente) VALUES ('$datos[4]','$iduser','$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]')" or die ("error al agregar tabla cliente");
    
 

       return mysqli_query($conn, $cliente)or die("error al insertar tabla cliente");

   

    }

}

?>