<?php

class crudPromocion
{
    public function agregarPromocion($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbpromocion (fechaInicio, fechaFin, idProducto, valorActual, valorPromocion, cantidad, img) VALUES ('$datos[0]', '$datos[1]', '$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

       return mysqli_query($conexion, $sql) or die ("error en el insercion promocion");

    }

    public function obtenPromocion($idPromocion)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT idPromocion, fechaInicio, fechaFin, nombre, valorActual, valorPromocion, cantidad, img FROM tbpromocion  INNER  JOIN tbproducto ON tbproducto.idProducto=tbpromocion.idProducto WHERE idPromocion=$idPromocion";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idPromocion'                    => $ver[0],
            'fechaInicio'                    => $ver[1],
            'fechaFin'                       => $ver[2],
            'idProducto'                     => $ver[3],
            'valorActual'                    => $ver[4],
            'valorPromocion'                 => $ver[5],
            'cantidad'                       => $ver[6],
            'img'                            => $ver[7]
            
        );
        return $datos;
    }

    public function actualizarPromocion($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();
        if($datos[7]==0){
            $mov = "UPDATE tbpromocion SET fechaInicio='$datos[1]', fechaFin='$datos[2]', idProducto='$datos[3]', valorActual='$datos[4]', valorPromocion='$datos[5]',cantidad='$datos[6]'  WHERE idPromocion=$datos[0]";
        }else {
            $mov = "UPDATE tbpromocion SET fechaInicio='$datos[1]', fechaFin='$datos[2]', idProducto='$datos[3]', valorActual='$datos[4]', valorPromocion='$datos[5]',cantidad='$datos[6]', img='$datos[7]' WHERE idPromocion=$datos[0]";
        }
        

        return mysqli_query($conexion, $mov) or die ("error al actualizar tabla promocion");

    }
}
