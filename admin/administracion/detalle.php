<?php 
if (isset($_GET['idPedido'])) {
    require_once "clases/conexion.php";
    include "../scripts.php";
    $obj= new conectar();
    $conn=$obj->conexion();
 ?>  

 <script type="text/javascript">
$(".cerrarModal").click(function(){
  $("#detalle").modal('hide')
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div class="modal fade" id="detalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Detalles del Pedido</h4></center>
            </div>
            <div class="modal-body">
            <?php
                $Pedidos=mysqli_query($conn,"SELECT * from tbPedido where idPedido='".$_GET['idPedido']."'");
                $srow=mysqli_fetch_array($Pedidos);
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="pull-right">Fecha: <?php echo date("F d, Y", strtotime($srow['fechaPedido'])); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" class="container">
                        <table  style="overflow-x: scroll; width: 100%; height: 100%; display: block;"; class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre del Producto</th>
                                    <th>Precio de Venta</th>
                                    <th>Cantidad</th>
                                    <th>SubTotal</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                    $pd=mysqli_query($conn,"select * from tbPedidoProducto  inner join tbproducto on tbproducto.idProducto =tbpedidoproducto.idProducto where idPedido='".$_GET['idPedido']."'");
                                    while($pdrow=mysqli_fetch_array($pd)){
                                        ?>
                                        <tr>
                                            <td><?php echo ucwords($pdrow['nombre']); ?></td>
                                            <td align="right"><?php echo number_format($pdrow['precioVenta'],2); ?></td>
                                            <td><?php echo $pdrow['cantidadEntregada']; ?></td>
                                            <td align="right">
                                                <?php 
                                                    $subtotal=$pdrow['valorTotalEntregado'];
                                                    echo number_format($subtotal,2);
                                                    $total+=$subtotal;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                <tr>
                                    <td align="right" colspan="3"><strong>Total</strong></td>
                                    <td align="right"><strong><?php echo number_format($total,2); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>      
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cerrarModal" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
