<?php
include 'session.php';

if (!isset($_SESSION['pedido'])) {
    $query2 = mysqli_query($conn, "SELECT * FROM tbpedido  WHERE  idCliente='" . $_SESSION['id'] . "' AND indicador = 0 ORDER BY idPedido DESC LIMIT 1"); 

    $session = mysqli_fetch_assoc($query2);
    $_SESSION['pedido'] = $session['idPedido'];
    if ( $_SESSION['pedido'] == "" || $_SESSION['pedido'] == null) {
       
    }
}


if (isset($_POST['cart'])) {
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $vlru =str_replace(',', '', $_POST['vlru']);

    if (isset($_SESSION['pedido'])) {

        $query = mysqli_query($conn, "SELECT * from tbpedidoproducto inner join tbpedido on tbpedido.idPedido= '" . $_SESSION['pedido'] . "' where idProducto='$id' and idCliente='" . $_SESSION['id'] . "'");
        if (mysqli_num_rows($query) === $id) {

            echo "Este Producto Ya Se encuentra en su carrito!";

        } else {
            mysqli_query($conn, "INSERT INTO `tbpedidoproducto`( `idPedido`, `idProducto`, `cantidadPedida`, `cantidadEntregada`,  `valorUnitario`)
				values ( '" . $_SESSION['pedido'] . "','$id', '$qty','0','$vlru')");
        }
    } else {
        
        mysqli_query($conn, "INSERT INTO tbpedido (idCliente,indicador) VALUES (" . $_SESSION['id'] . ",0)");
       
        $_SESSION['pedido'] = mysqli_insert_id($conn);
        mysqli_query($conn, "INSERT INTO `tbpedidoproducto`( `idPedido`, `idProducto`, `cantidadPedida`, `cantidadEntregada`,  `valorUnitario`)
			 values ( '" . $_SESSION['pedido'] . "','$id', '$qty','0','$vlru','0')");

    }
}
