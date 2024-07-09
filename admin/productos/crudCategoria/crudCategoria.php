<?php

class crudCategoria
{
    public function agregarCategoria($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbcategoria (nombre) VALUES ('$datos[0]')";

       return mysqli_query($conexion, $sql) or die ("error en el insercion categoria");

    }

    public function obtenerCategoria($idCategoria)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT idCategoria, nombre FROM tbcategoria WHERE idCategoria=$idCategoria";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idCategoria'               => $ver[0],
            'nombre'                    => $ver[1]
        );
        return $datos;
    }

    public function actualizarCategoria($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "UPDATE tbcategoria SET nombre='$datos[1]' WHERE idCategoria=$datos[0]";

        return mysqli_query($conexion, $mov) or die ("error al actualizar tabla promocion");

    }
}
