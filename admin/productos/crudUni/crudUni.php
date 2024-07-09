<?php

class crudUnidadMedida
{
    public function agregarUnidadMedida($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbunidadmedida ( unidadMedida) VALUES ('$datos[0]')";

       return mysqli_query($conexion, $sql) or die ("error en el insercion unidad");

    }

    public function obtenerUnidadMedida($idUnidadMedida)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT idUnidadMedida, unidadMedida FROM tbunidadmedida WHERE idUnidadMedida=$idUnidadMedida";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idUnidadMedida'                  => $ver[0],
            'unidadMedida'                    => $ver[1]
           
        );
        return $datos;
    }

    public function actualizarUnidadMedida($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "UPDATE tbunidadmedida SET unidadMedida='$datos[1]' WHERE idUnidadMedida=$datos[0]";

        return mysqli_query($conexion, $mov) or die ("error al actualizar tabla promocion");

    }
}
