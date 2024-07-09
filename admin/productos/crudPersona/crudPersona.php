<?php

class crudPersona
{
    public function agregarPersona($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbpersona (nombre, apellido, telefono, email, ocupacion) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]')";

       return mysqli_query($conexion, $sql) or die ("error en el insercion persona");

    }

    public function obtenerPersona($idPersona)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $per = "SELECT idPersona, nombre, apellido, telefono, email, ocupacion FROM tbpersona WHERE idPersona=$idPersona";

       
        $result = mysqli_query($conexion, $per) or die ("error en select persona ");
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idPersona'                 => $ver[0],
            'nombre'                    => $ver[1],
            'apellido'                  => $ver[2],
            'telefono'                  => $ver[3],
            'email'                     => $ver[4],
            'ocupacion'                 => $ver[5],
           
        );
        return $datos;
    }

    public function actualizarPersona($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "UPDATE tbpersona SET nombre='$datos[1]', apellido='$datos[2]', 
        telefono='$datos[3]', email='$datos[4]', ocupacion='$datos[5]' WHERE idPersona=$datos[0]";

        return mysqli_query($conexion, $mov) or die ("error al actualizar tabla Persona");

    }
}
