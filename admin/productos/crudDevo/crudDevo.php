<?php

class crudDevo
{
    public function agregarDevo($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $sql = "INSERT INTO tbtraslado (tipoCausa, fecha, idUnidad, causa, referencia, responsableRecepcion) VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]')";

        mysqli_query($conexion, $sql) or die ("error en el insercion traslado");

        $idtraslado = mysqli_insert_id($conexion);
        

        $mov = "INSERT INTO tbtrasladoproducto (idTraslado, idProducto, cantidad, descripcionCausa) VALUES ($idtraslado, '$datos[6]', '$datos[7]', '$datos[8]')" or die ("error en la tabla tbtrasladoproducto");

        $existencia= "SELECT existencia FROM tbproducto WHERE idProducto=$datos[7]";
       $mostrar= mysqli_query($conexion, $existencia);
       $mira= mysqli_fetch_row($mostrar); 

        $res=  $mira[0] - $datos[7];

         if ($res >= 0) {
             
              $actu= "UPDATE tbproducto SET existencia=$res WHERE idProducto= $datos[7]";
         $actuexi= mysqli_query($conexion, $actu);
      
         } else {

                $res= 0;

                 $actu= "UPDATE tbproducto SET existencia=$res WHERE idProducto= $datos[7]";
         $actuexi= mysqli_query($conexion, $actu);
         }
         

       return mysqli_query($conexion, $mov)or die ("error al insertar tbtrasladoproducto");

        

    }

    public function obtenDevo($idTraslado)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT tbtraslado.idTraslado, tbtraslado.tipoCausa, tbtraslado.fecha, tbtraslado.idUnidad, tbtraslado.causa, tbtraslado.referencia, tbtraslado.responsableRecepcion, tbtrasladoproducto.idProducto, tbtrasladoproducto.cantidad, tbtrasladoproducto.descripcionCausa, tbtrasladoproducto.idTrasladoProducto FROM tbtrasladoproducto INNER JOIN tbtraslado ON tbtraslado.idTraslado=tbtrasladoproducto.idTraslado WHERE tbtraslado.idTraslado ='$idTraslado'";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            'idTraslado'                       => $ver[0],
            'tipoCausa'                       => $ver[1],
            'fecha'                            => $ver[2],
            'idUnidad'                         => $ver[3],
            'causa'                            => $ver[4],
            'referencia'                       => $ver[5],
            'responsableRecepcion'             => $ver[6],
            'idProducto'                       => $ver[7],
            'cantidad'                         => $ver[8],
            'descripcionCausa'                 => $ver[9],
            'idTrasladoProducto'               => $ver[10]
        );
        return $datos;
    }

    public function actualizarDevo($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

        $mov = "UPDATE tbtrasladoproducto SET idProducto='$datos[7]', cantidad='$datos[8]', descripcionCausa='$datos[9]' WHERE idTraslado=$datos[10]";

        mysqli_query($conexion, $mov) or die ("error al actualizar tabla traslado producto");

        $tras = "UPDATE tbtraslado SET tipoCausa='$datos[1]', fecha='$datos[2]', idUnidad='$datos[3]', causa='$datos[4]', referencia='$datos[5]', responsableRecepcion='$datos[6]' WHERE idTraslado=$datos[0]";
 $existenciaU= "SELECT existencia FROM tbproducto WHERE idProducto=$datos[7]";
       $mostrarU= mysqli_query($conexion, $existenciaU);
       $miraU= mysqli_fetch_row($mostrarU); 

        $resU=  $miraU[0] - $datos[8];

         if ($resU >= 0) {
             
              $actu= "UPDATE tbproducto SET existencia=$resU WHERE idProducto= $datos[7]";
         $actuexi= mysqli_query($conexion, $actu);

         } else {

                $resU= 0;

                 $actu= "UPDATE tbproducto SET existencia=$resU WHERE idProducto= $datos[7]";
         $actuexi= mysqli_query($conexion, $actu);
         }
         


        return mysqli_query($conexion, $tras) or die ("error al actualzar la tabla traslado");
    }
}
