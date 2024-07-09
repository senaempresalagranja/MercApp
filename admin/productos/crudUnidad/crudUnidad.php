<?php

class crudUnidad
{
    public function agregarUnidad($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbunidad (nombre, idArea) VALUES ('$datos[0]', '$datos[1]')";

       return mysqli_query($conexion, $sql) or die ("error en el insercion unidad");

    }

    public function obtenerUnidad($idUnidad)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT idUnidad, nombre, idArea FROM tbunidad WHERE idUnidad=$idUnidad";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idUnidad'                  => $ver[0],
            'nombre'                    => $ver[1],
            'idArea'                    => $ver[2]
        );
        return $datos;
    }

    public function actualizarUnidad($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "UPDATE tbunidad SET nombre='$datos[1]', idArea='$datos[2]' WHERE idUnidad=$datos[0]";

        return mysqli_query($conexion, $mov) or die ("error al actualizar tabla promocion");

    }
}
