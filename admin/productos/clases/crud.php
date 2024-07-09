<?php

class crud
{
    public function agregar($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();



        $sql = "INSERT into tbproducto ( idProducto, codigoBarras, nombre, idUnidadMedida, idCategoria, idUnidad, presentacion, precioVenta, existencia, foto, elemento, indicador)
                                    values ('$datos[0]',
                                            '$datos[1]',
                                            '$datos[2]',
                                            '$datos[3]',
                                            '$datos[4]',
                                            '$datos[5]',
                                            '$datos[6]',
                                            '$datos[7]',
                                            '$datos[8]',
                                            '$datos[9]',
                                            '$datos[10]','0')
                                            
                                            ";
                    

        return mysqli_query($conexion, $sql);
    }

    public function obtenDatos($idProducto)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();
$idProductos=mysqli_insert_id($conexion);

        $sql = "SELECT idProducto,
                            codigoBarras,
                            nombre,
                            idUnidadMedida,
                            idCategoria,
                            idUnidad,
                            presentacion,
                            precioVenta,
                            existencia,
                            foto,
                            elemento

                    from tbproducto
                    where idProducto='$idProducto'";
        $result = mysqli_query($conexion, $sql);
        $ver    = mysqli_fetch_row($result);


        $datos = array(
            'idProducto'     => $ver[0],
            'codigoBarras'   => $ver[1],
            'nombre'         => $ver[2],
            'idUnidadMedida' => $ver[3],
            'idCategoria'    => $ver[4],
            'idUnidad'       => $ver[5],
            'presentacion'   => $ver[6],
            'precioVenta'    => $ver[7],
            'existencia'     => $ver[8],
            'foto'           => $ver[9],
            'elemento'       => $ver[10]
        );
        return $datos;
    }

    public function actualizar($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();
        if($datos[9]==""){
            $sql = "UPDATE tbproducto SET codigoBarras='$datos[1]', nombre='$datos[2]', idUnidadMedida='$datos[3]', idCategoria='$datos[4]', idUnidad='$datos[5]', presentacion='$datos[6]', precioVenta='$datos[7]', existencia='$datos[8]', elemento='$datos[10]' where idProducto='$datos[0]'";
        }else {
            $sql = "UPDATE tbproducto SET codigoBarras='$datos[1]', nombre='$datos[2]', idUnidadMedida='$datos[3]', idCategoria='$datos[4]', idUnidad='$datos[5]', presentacion='$datos[6]', precioVenta='$datos[7]', existencia='$datos[8]', foto='$datos[9]', elemento='$datos[10]' where idProducto='$datos[0]'";
        }
        
        return mysqli_query($conexion, $sql);
    }
}
