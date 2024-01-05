<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.tabledit.js"></script>
<style>
        .titulo {
            
            font-size:20px;
            color : blue;
            text-align : center;
            float: right;
        }
        .titulo2 {
            
            font-size:20px;
            color : green;
            text-align : center;
            float: right
        }
        .titulo3{
            
            font-size:20px;
            color : red;
            text-align : center;
            float: right;
        }
        .titulo4{
            
            font-size:20px;
            color : black;
            text-align : center;
            float: right
        }
        td:hover{
            background: #ABABAB;
            color: white;
            font-size: 12px;
        }
        td{
            cursor: pointer;
        }
    </style>
<?php 
error_reporting(0);
 function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
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
                        return '$'.$money;
                    } // numeric
                  } // formatMoney
	require 'conexion.php';
    
    $query = "SELECT * FROM listamedicamento where fechaContrato = '2023' group by listamedicamento.id_medicamento desc ";
        $row = mysqli_query($conexion2, $query);
?>
<table id="datatables-example"  class="table table-striped table-bordered nowrap table-darkgray table-hover"   width="100%"  >
        <thead>
    
        <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
            <th>Proveedor</th>
            <th>Contrato</th>
            <th>Clave HRAEI</th>
            <th>Descripcion</th>
            <th>CNIS</th>
            <th>CUCOP</th>
            <th>UDM</th>
            <th>Precio</th>
            <th>Minimo consumo</th>
            <th>Maximo consumo</th>
            <th>Consumo real</th>
            <th>Minimo precio</th>
            <th>Maximo precio</th>
            <th>Eliminar</th>
        </tr>
            </thead>
        <tbody>
    <?php
        while($dataRegistro= mysqli_fetch_assoc($row))
        {
            $clave = base64_encode($dataRegistro['id_medicamento']);
            ?>
            <tr>
            <td id="<?php echo $clave ?>" class="check" title="click para editar"><?php echo $dataRegistro['PROVEEDOR'] ?></td>
            <td id="<?php echo $clave ?>" class="check" title="click para editar"><?php echo $dataRegistro['numeroContrato']?></td>
            <td><?php echo $dataRegistro['CLAVEHRAEI'] ?></td>
            <td><?php echo $dataRegistro['DESCRIPCION'] ?></td>
            <td><?php echo $dataRegistro['CLAVEDECUADROBASICO'] ?></td>
            <td><?php echo $dataRegistro['CUCOP'] ?></td>
            <td><?php echo $dataRegistro['UNIDADDEMEDIDA'] ?></td>
            <td><?php echo formatMoney($dataRegistro['PRECIOUNITARIO']) ?></td>
            <td><?php echo $dataRegistro['MINIMOCONSUMO'] ?></td>
            <td><?php echo $dataRegistro['MAXIMOCONSUMO'] ?></td>
            <td><?php echo $dataRegistro['cantidad'] ?></td>
            <td><?php echo formatMoney($dataRegistro['MINIMOPRECIO']) ?></td>
            <td><?php echo formatMoney($dataRegistro['MAXIMOPRECIO']) ?></td>
			<td><button type="button" id="elimina" value=' . $clave . '  style="background: none; border: 0; color:inherit"> <i id ="eliminar" class="fas fa-trash"></i></button></td>
		
			
			</tr>
            <?php } ?>
        </tbody>
    </table>
</div>
    <script>
    $(document).ready(function () {
    $('#datatables-example').DataTable({
        pagingType: 'full_numbers',
    });
});
                    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script>
  $(function() {

    $('table').on('click', '.check', function() {

      let clave = $(this).prop('id');

      window.open('editarListaMedicamento?clave=' + clave);
    });
  });
  $("button").click(function() {
    let fired_button = $(this).val();
    let mensaje = confirm(
      "¡El medicamento se eliminara de la base de datos! ¿Desea continuar?");
    let ob = {
      fired_button: fired_button
    };
    if (mensaje == true) {
      $.ajax({
        type: "POST",
        url: "eliminaMedicamento.php",
        data: ob,
        beforeSend: function(objeto) {

        },
        success: function(data) {
          $("#tabla_resultado2").html(data);
        }
      });
    } else {
      swal("Proceso cancelado", " ", "error");
    }
  });
</script>