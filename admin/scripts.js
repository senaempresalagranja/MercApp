$(function () {
  $('#Producto').click(function () {
    $('#Contenedor').load('./productos/Producto.php')
  });
});
$(function () {
  $('#Categoria').click(function () {
    $('#Contenedor').load('./productos/Categoria.php')
  });
});
$(function () {
  $('#Area').click(function () {
    $('#Contenedor').load('./productos/Area.php')
  });
});
$(function () {
  $('#Devolucion').click(function () {
    $('#Contenedor').load('./productos/Devolucion.php')
  });
});
$(function () {
  $('#Entrada').click(function () {
    $('#Contenedor').load('./productos/Entrada.php')
  });
});
$(function () {
  $('#Unidad').click(function () {
    $('#Contenedor').load('./productos/Unidad.php')
  });
});
$(function () {
  $('#Pedidos').click(function () {
    $('#Contenedor').load('./administracion/Pedidos.php')
  });
});
$(function () {
  $('#Ventas').click(function () {
    $('#Contenedor').load('./administracion/Ventas.php')
  });
});
$(function () {
  $('#Catalogo').click(function () {
    $('#Contenedor').load('./administracion/Catalogo.php')
  });
});
$(function () {
  $('#Promocion').click(function () {
    $('#Contenedor').load('./productos/Promocion.php')
  });
});
$(function () {
  $('#Medida').click(function () {
    $('#Contenedor').load('./productos/Medida.php')
  });
});
$(function () {
  $('#EntradaR').click(function () {
    $('#Contenedor').load('./Reportes/ReporteEntrada.php')
  });
});
$(function () {
  $('#PuntosR').click(function () {
    $('#Contenedor').load('./Reportes/ReportePuntos.php')
  });
});
$(function () {
  $('#TrasladoR').click(function () {
    $('#Contenedor').load('./Reportes/ReporteTrasladoBaja.php')
  });
});