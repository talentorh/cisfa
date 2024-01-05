<?php
include('conexion.php');
$prove = $_POST["id_datoProveedor"];

$sql_s = $conexion2->query('SELECT id_contrato FROM numeroorden WHERE claveUnicaContrato = "'.$prove.'"');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['id_contrato'];
  $nombre = $row_s['id_contrato'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

</select>