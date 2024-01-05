<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.tabledit.js"></script>
<style>
  td {
    width: 100%;
    cursor: pointer;
    font-size: 12px;
    background-color: #FBFBFB;
  }

  td:hover {
    background: #6A6868;
    color: white;
    font-size: 12px;
  }

  #verOrden {
    color: black;
    font-size: 12px;
    text-decoration: none;
  }

  #verOrden:hover {
    color: white;
    font-size: 12px;
  }
</style>
<?php
error_reporting(0);
function formatMoney($number, $cents = 1)
{ // cents: 0=never, 1=if needed, 2=always
  if (is_numeric($number)) { // a number
    if (!$number) { // zero
      $money = ($cents == 2 ? '0.00' : '0'); // output zero
    } else { // value
      if (floor($number) == $number) { // whole number
        $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
      } else { // cents
        $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
      } // integer or decimal
    } // value
    return '$' . $money;
  } // numeric
}
$tipoFarmacia = $_POST['ID_usuario'];
$year = $_POST['year'];
require 'conexion.php';


$tabla = "";
$query = $conexion2->query("SELECT datosproveedor.datoPersonalProveedor, datosproveedor.telefono, datosproveedor.correoElectronico, proveedores.numero_pedido, proveedores.id_proveedor, proveedores.cuentaOrdenSuminstro
      from proveedores inner join datosproveedor on datosproveedor.id_datoProveedor = proveedores.numero_proveedor where proveedores.year = $year and proveedores.cuentaOrdenSuminstro = 1 and proveedores.tipoFarmacia='$tipoFarmacia' ORDER by datosproveedor.datoPersonalProveedor asc");

?>
<table id="datatables-example" class="table table-striped table-bordered nowrap table-darkgray table-hover" width="100%">
  <thead>

    <tr class="#" style="background-color:#7C7C7C; color: white; font-style: normal;">
      <!-- definimos cabeceras de la tabla -->

      <th>Nombre proveedor</th>
      <th>Número de contrato</th>
      <th>Monto consumido</th>
      <th>Monto minimo</th>
      <th>Monto Maximo</th>
      <th>Correo electronico</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($dataRegistro = mysqli_fetch_assoc($query)) {

      $nombre = base64_encode($dataRegistro['datoPersonalProveedor']);
      $var = base64_encode($dataRegistro['id_proveedor']);
      $id = base64_decode($var);
      $opcion = $dataRegistro['cuentaOrdenSuminstro'];
      $numero_pedido = $dataRegistro['numero_pedido'];

      $sql = $conexion2->query("SELECT sum(importe) as total FROM ordensuministro where claveContrato = $id");
      $rows = mysqli_fetch_assoc($sql);

      $sql_s = $conexion2->query("SELECT sum(MINIMOPRECIO) as total, sum(MAXIMOPRECIO) as total2 from listamedicamento where numeroContrato = '$numero_pedido'");
      $result_d = mysqli_fetch_assoc($sql_s);
    ?>
      <tr onkeyup="myFunction(this)">
        <td><?php echo $dataRegistro['datoPersonalProveedor']; ?></td>
        <td><a href="vistaPDFFG?var='<?php echo $var ?>'&nombre='<?php echo $nombre ?>'" id="verOrden"><?php echo $dataRegistro['numero_pedido']; ?></a></td>
        <td style="color: red;"><?php echo formatMoney($rows['total']) ?></td>
        <td><?php echo formatMoney($result_d['total']) ?></td>
        <td><?php echo formatMoney($result_d['total2']) ?></td>
        <td><?php echo $dataRegistro['correoElectronico']; ?></td>

      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<script>
  $(document).ready(function() {
    $('#datatables-example').DataTable({
      pagingType: 'full_numbers',
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>