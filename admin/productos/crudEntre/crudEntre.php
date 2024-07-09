 <?php

class crudEntre
{
    public function agregarEntre($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();
            
    $sql = "INSERT INTO tblote (codigoLote, responsableProduccion, fechaProduccion) VALUES ('$datos[0]', '$datos[1]', '$datos[2]')";

  if(!mysqli_query($conexion, $sql))
    {
        echo "error al insertar tblote".myqli_error($sql);
    }
    $idlote = mysqli_insert_id($conexion);


        $lotepro = "INSERT INTO tbloteproducto (idLote, idProducto, cantidad, fechaVencimiento, valorUnitario) VALUES ($idlote, '$datos[3]', '$datos[4]', '$datos[5]', '$datos[6]')";

        mysqli_query ($conexion, $lotepro);
        $idlotepro = mysqli_insert_id($conexion);


       $entra = "INSERT INTO tbentrada(idLoteProducto, fecha, responsableRcibir, horaEntrada, cantidadEntrar, valorTotal) VALUES ($idlotepro, '$datos[7]', '$datos[8]', '$datos[9]', '$datos[10]', '$datos[11]')";

        $existencia= "SELECT existencia FROM tbproducto WHERE idProducto=$datos[3]";
       $mostrar= mysqli_query($conexion, $existencia);
       $mira= mysqli_fetch_row($mostrar); 

        $si= $mira[0] + $datos[4];

        $actu= "UPDATE tbproducto SET existencia=$si WHERE idProducto= $datos[3]";
         $actuexi= mysqli_query($conexion, $actu);
         

       return mysqli_query($conexion, $entra)or die ("error en la entrada");

    }


    public function obtentra($idEntrada)
    {
        $obj = new conectar();
        $conexion = $obj->conexion();

        $mov = "SELECT tblote.codigoLote, tblote.responsableProduccion, tblote.fechaProduccion, tbloteproducto.idProducto, tbloteproducto.cantidad, tbloteproducto.fechaVencimiento, tbloteproducto.valorUnitario, tbentrada.idEntrada, tbentrada.fecha,  tbentrada.responsableRcibir, tbentrada.horaEntrada, tbentrada.cantidadEntrar, tbentrada.valorTotal, tbloteproducto.idLote, tbloteproducto.idLoteProducto FROM tbentrada INNER JOIN tbloteproducto ON tbloteproducto.idLoteProducto=tbentrada.idLoteProducto INNER JOIN tblote ON tblote.idLote=tbloteproducto.idLote WHERE tbentrada.idEntrada = '$idEntrada'";

       
        $result = mysqli_query($conexion, $mov);
        $ver    = mysqli_fetch_row($result);

        $datos = array(
            
            'codigoLote'                => $ver[0],
            'responsableProduccion'     => $ver[1],
            'fechaProduccion'           => $ver[2],
            'idProducto'                => $ver[3],
            'cantidad'                  => $ver[4],
            'fechaVencimiento'          => $ver[5],
            'valorUnitario'             => $ver[6],
            'idEntrada'                 => $ver[7],
            'fecha'                     => $ver[8],
            'responsableRcibir'         => $ver[9],
            'horaEntrada'               => $ver[10],
            'cantidadEntrar'            => $ver[11],
            'valorTotal'                => $ver[12],
            'idLote'                    => $ver[13],
            'idLoteProducto'            => $ver[14]
             );
        return $datos;
    }

    public function actualizarEntra($datos)
    {
        $obj      = new conectar();
        $conexion = $obj->conexion();

         $entradas = "UPDATE tbentrada SET fecha='$datos[8]', responsableRcibir='$datos[9]', horaEntrada='$datos[10]', cantidadEntrar='$datos[11]', valorTotal='$datos[12]' WHERE idEntrada=$datos[7] ";
       
        mysqli_query($conexion, $entradas) or die("error actualizar entradas");

       $loteproducto="UPDATE tbloteproducto SET idProducto='$datos[3]', cantidad='$datos[4]', fechaVencimiento='$datos[5]', valorUnitario='$datos[6]' WHERE idLoteProducto=$datos[14]";

       mysqli_query($conexion, $loteproducto) or die ("error al actualizar loteproducto");

       $lote="UPDATE tblote SET codigoLote='$datos[0]', responsableProduccion='$datos[1]', fechaProduccion='$datos[2]' WHERE idLote=$datos[13]";

        $existenciaU= "SELECT existencia FROM tbproducto WHERE idProducto=$datos[3]";
       $mostrarU= mysqli_query($conexion, $existenciaU);
       $miraU= mysqli_fetch_row($mostrarU); 

        

        if ($miraU[0] < $datos[4]) {
            
          $resu = $miraU[0] + $datos[4];

        } else {

          $resu =  $miraU[0] - $datos[4];
        
        }

        $actuU= "UPDATE tbproducto SET existencia=$resu WHERE idProducto= $datos[3]";
         $actuexi= mysqli_query($conexion, $actuU); 

       return mysqli_query($conexion, $lote) or die ("error al actualizar lote");

          

               }
}  

   
