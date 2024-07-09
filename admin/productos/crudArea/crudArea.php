<?php

class crudArea
{
    public function agregarArea($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbarea (nombre) VALUES ('$datos[0]')";

       return mysqli_query($conexion, $sql) or die ("error en el insercion area");

    }

    public function obtenerArea($idArea)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT idArea, nombre FROM tbarea WHERE idArea=$idArea";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idArea'                    => $ver[0],
            'nombre'                    => $ver[1]

        );
        return $datos;
    }

    public function actualizarArea($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "UPDATE tbarea SET nombre='$datos[1]' WHERE idArea=$datos[0]";

        return mysqli_query($conexion, $mov) or die ("error al actualizar tabla promocion");

    }
}
