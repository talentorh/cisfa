<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require ('app/lib/pdf/fpdf.php');
require 'conexion.php';
$hoy=date("Y-m-d");
$costos=base64_decode($_GET['total']);
$id_unico=base64_decode($_GET['id_unico']);
$valor2=base64_decode($_GET['claveContrato']);

$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);
$birmex = base64_decode($_GET['birmex']);
if($birmex != ''){
  $sqlGuardaClave = $conexion2->query("INSERT into direccionoperadorlogistico(claveUnicaOrden) values('$birmex')");
}
if($birmex == ''){
  $sqlDelete = $conexion2->query("DELETE from direccionoperadorlogistico where claveUnicaOrden = '$num'");
}


$sqloperador = $conexion2->query("SELECT claveUnicaOrden from direccionoperadorlogistico where claveUnicaOrden = '$num'");
  $rowoperador = mysqli_fetch_assoc($sqloperador);
  $validaclaveoperador = $rowoperador['claveUnicaOrden'];
/*$quer = $conexion2->query("UPDATE ordensuministro
INNER JOIN numeroorden ON ordensuministro.claveUnicaOrden = numeroorden.claveUnicaContrato
SET ordensuministro.fechaorden = numeroorden.fechaRegistro
WHERE numeroorden.claveUnicaContrato = ordensuministro.claveUnicaOrden");*/

/*$quer2 = $conexion2->query("UPDATE ordensuministro 
INNER JOIN proveedores ON ordensuministro.claveContrato = proveedores.id_proveedor 
SET ordensuministro.nombreproveedor = proveedores.nombre_proveedor 
WHERE proveedores.id_proveedor = ordensuministro.claveContrato");*/

$quer3 = $conexion2->query("UPDATE ordensuministro 
INNER JOIN proveedores ON ordensuministro.claveContrato = proveedores.id_proveedor 
SET ordensuministro.numerodecontrato = proveedores.numero_pedido 
WHERE proveedores.id_proveedor = ordensuministro.claveContrato");

$querY = "UPDATE numeroorden set id_contrato = $id_unico, totalOrden= $costos, fechaRegistro= '$hoy'
where claveUnicaContrato = '$valor2' limit 1";
$edita= mysqli_query($conexion2, $querY);

$query = "UPDATE proveedores set cuentaOrdenSuminstro = 1 where id_proveedor = $id_unico";
$resul = mysqli_query($conexion2, $query);

$sql2 = "SELECT *, numeroorden.totalOrden from proveedores inner join numeroorden on numeroorden.claveUnicaContrato='$num' where id_proveedor= $var ";
$resultado = mysqli_query($conexion2, $sql2);
//$row2 = mysqli_fetch_assoc($resultado);
$sql = "SELECT ordensuministro.partidaPresupuestal, ordensuministro.claveHraei, ordensuministro.cuadroBasico, ordensuministro.cucop, ordensuministro.descripcionDelBien, 
ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, proveedores.numero_pedido, proveedores.numero_procedimiento, numeroorden.totalOrden, numeroorden.fechaRegistro from ordensuministro left join proveedores on proveedores.id_proveedor =$var inner join numeroorden on claveUnicaContrato = '$num' and ordensuministro.claveUnicaOrden ='$num' and ordensuministro.claveContrato =$var";
$result = mysqli_query($conexion2, $sql);

class PDF extends FPDF {
  function NbLines($w, $txt)
  {
      // Calcula el número de líneas que el texto ocupará en el ancho dado ($w)
      $cw = &$this->CurrentFont['cw'];
      if ($w == 0)
          $w = $this->w - $this->rMargin - $this->x;
      $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
      $s = str_replace("\r", '', $txt);
      $nb = strlen($s);
      if ($nb > 0 && $s[$nb - 1] == "\n")
          $nb--;
      $sep = -1;
      $i = 0;
      $j = 0;
      $l = 0;
      $nl = 1;
      while ($i < $nb) {
          $c = $s[$i];
          if ($c == "\n") {
              $i++;
              $sep = -1;
              $j = $i;
              $l = 0;
              $nl++;
              continue;
          }
          if ($c == ' ')
              $sep = $i;
          $l += $cw[$c];
          if ($l > $wmax) {
              if ($sep == -1) {
                  if ($i == $j)
                      $i++;
              } else
                  $i = $sep + 1;
              $sep = -1;
              $j = $i;
              $l = 0;
              $nl++;
          } else
              $i++;
      }
      return $nl;
  }
  var $tablewidths;
var $footerset;

function _beginpage($orientation, $size, $rotation=0) {
    $this->page++;

    // Resuelve el problema de sobrescribir una página si ya existe.
    if(!isset($this->pages[$this->page])) 
        $this->pages[$this->page] = '';
    $this->state = 2;
    $this->x = $this->lMargin;
    $this->y = $this->tMargin;
    $this->FontFamily = '';

    // Compruebe el tamaño y la orientación.
    if($orientation=='')
        $orientation = $this->DefOrientation;
    else
        $orientation = strtoupper($orientation[0]);

    if($size=='')
        $size = $this->DefPageSize;
    else
        $size = $this->_getpagesize($size);

    if($orientation!=$this->CurOrientation || $size[0]!=$this->CurPageSize[0] || $size[1]!=$this->CurPageSize[1]) {
        // Nuevo tamaño o la orientación
        if($orientation=='P') {
            $this->w = $size[0];
            $this->h = $size[1];
        } else {
            $this->w = $size[1];
            $this->h = $size[0];
        }
        $this->wPt = $this->w*$this->k;
        $this->hPt = $this->h*$this->k;
        $this->PageBreakTrigger = $this->h-$this->bMargin;
        $this->CurOrientation = $orientation;
        $this->CurPageSize = $size;
    }

    if($orientation!=$this->DefOrientation || $size[0]!=$this->DefPageSize[0] || $size[1]!=$this->DefPageSize[1]) {
        $this->PageSizes[$this->page] = array($this->wPt, $this->hPt);
    }
}

function morepagestable($datas, $lineheight=10) {
    // Algunas cosas para establecer y 'recordar'
    $l = $this->lMargin;
    $startheight = $h = $this->GetY();
    $startpage = $currpage = $maxpage = $this->page;

    // Calcular el ancho total de la tabla
    $rowHeights = [];
    $fullwidth = 0;
    foreach($this->tablewidths AS $width) {
        $fullwidth += $width;
    }

    // Ahora vamos a empezar a escribir la tabla
    foreach($datas AS $row => $data) {
        $this->page = $currpage;

        // Calcular la altura requerida para la fila actual
        $rowHeight = 0;
        foreach($data AS $col => $txt) {
            $nb = $this->NbLines($this->tablewidths[$col], $txt);
            $cellHeight = $lineheight * $nb;
            if ($cellHeight > $rowHeight) {
                $rowHeight = $cellHeight;
            }
        }

        // Verificar si hay suficiente espacio en la página actual para la fila
        if($h + $rowHeight > $this->h - $this->bMargin) {
            // No hay suficiente espacio, crear una nueva página
            $this->AddPage($this->CurOrientation);
            $h = $this->tMargin;  // Reiniciar la altura
            $currpage = $this->page;  // Actualizar la página actual
        }

        // Escribir los bordes horizontales
        $this->Line($l, $h, $fullwidth+$l, $h);

        // Escribir el contenido y recordar la altura de la más alta columna
        foreach($data AS $col => $txt) {
            $this->page = $currpage;
            $this->SetXY($l, $h);
            $this->MultiCell($this->tablewidths[$col], $lineheight, $txt);
            $l += $this->tablewidths[$col];

            if(!isset($tmpheight[$row.'-'.$this->page]))
                $tmpheight[$row.'-'.$this->page] = 0;
            if($tmpheight[$row.'-'.$this->page] < $this->GetY()) {
                $tmpheight[$row.'-'.$this->page] = $this->GetY();
            }
            if($this->page > $maxpage) {
                $maxpage = $this->page;
            }
        }

        // Obtener la altura estábamos en la última página utilizada
        $h = $tmpheight[$row.'-'.$maxpage];

        // Establecer el "puntero" al margen izquierdo
        $l = $this->lMargin;

        // Establecer el "$currpage" en la última página
        $currpage = $maxpage;
    }

    // Dibujar las fronteras
    // Empezamos a añadir una línea horizontal en la última página
    $this->page = $maxpage;
    $this->Line($l, $h, $fullwidth+$l, $h);

    // Ahora empezamos en la parte superior del documento
    for($i = $startpage; $i <= $maxpage; $i++) {
        $this->page = $i;
        $l = $this->lMargin;
        $t  = ($i == $startpage) ? $startheight : $this->tMargin;
        $lh = ($i == $maxpage)   ? $h : $this->h-$this->bMargin;
        $this->Line($l, $t, $l, $lh);
        foreach($this->tablewidths AS $width) {
            $l += $width;
            $this->Line($l, $t, $l, $lh);
        }
    }

    // Establecerlo en la última página, si no que va a causar algunos problemas
    $this->page = $maxpage;
}

  
    

  
  /*function Header()
  {
      
      // Logo
      $this->Image('imagenes/gobmx.png', 20 ,10, 130 , 70);
      $this->Image('imagenes/ImagenIMSS.jpg' , 150 ,18, 95 , 55);
      
      $this->SetFont('Times','',8);
      // Movernos a la derecha
      $this->Cell(590, 5, '', 0);
      // Título
      $this->Ln(20);
  $this->Cell(350, 10, '', 0);
  $this->Cell(400, 6, utf8_decode('ORDEN DE PEDIDO'), 0);
$this->SetFillColor(210, 208, 210);
$this->Ln(20);
$this->Cell(800, 10, '',0, 0, 'C', 'true');
      // Salto de línea
      $this->Ln(4);
  }*/
    /*function Footer()
 {
    
  //Posición: a 1,5 cm del final
  $this->SetY(-15);
  //Arial italic 8
  
  $this->SetFont('Arial','I',8);
  //Número de página
  $this->Image('imagenes/Imagen1.jpg' , 0 ,550, 840 , 40);
 $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 
    }*/
  function cabeceraHorizontal($cabecera)
  {
      $this->SetXY(10, 70);
      $this->SetFont('Arial','B',10);
      foreach($cabecera as $fila)
      {
          //Atención!! el parámetro valor 0, hace que sea horizontal
   
  
  $this->Cell(84, 15, $fila,0, 0, 'L');


      }
  }
}

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
$almacen ="ALMACÉN GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA";
$operaordireccion = "Laboratorios de Biológicos y Reactivos de México, S.A de C.V";
$domicilio = "CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, PUEBLO DE ZOQUIAPAN, C.P. 56530, MUNICIPIO DE IXTAPALUCA, ESTADO DE MÉXICO.";
//$fecha=" DENTRO DE LOS 15 DIAS POSTERIORES A LA NOTIFICACION DE LA ORDEN DE SUMINISTRO";

$direccion = utf8_decode('Dirección de Operaciones.
Centro Integral de Servicios Farmacéuticos.');

$row_s= mysqli_fetch_assoc($resultado);
  //$nombreproveedor = $row_s['nombre_proveedor'];
  $fechainicio = $row_s['fechaRegistro'];
$fechaformateada = date("d-m-Y", strtotime($fechainicio));
$fecha = date("d-m-Y",strtotime($row_s['fechaRegistro']."+ 15 days"));
  $numeroproveedor = $row_s['numero_proveedor'];
  $sql2s = "SELECT * from datosproveedor where id_datoProveedor= $numeroproveedor ";
$resultados = mysqli_query($conexion2, $sql2s);
$row_a = mysqli_fetch_assoc($resultados);

$pdf = new PDF('L','pt',array(800,800));
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->Image('imagenes/gobmx.png', 20 ,10, 130 , 70);
    $pdf->Image('imagenes/ImagenIMSS.jpg' , 150 ,18, 95 , 55);
      
      $pdf->SetFont('Times','',8);
      // Movernos a la derecha
      $pdf->Cell(590, 5, '', 0);
      // Título
      $pdf->Ln(20);
  $pdf->Cell(350, 10, '', 0);
  $pdf->Cell(400, 6, utf8_decode('ORDEN DE PEDIDO'), 0);
$pdf->SetFillColor(210, 208, 210);
$pdf->Ln(20);
$pdf->Cell(743, 10, '',0, 0, 'C', 'true');
      // Salto de línea
      $pdf->Ln(4);
  $pdf->SetFont('Arial', '', 8);
  $pdf->Ln(15);
  $pdf->Cell(300, 0, utf8_decode('Número de procedimiento:  ').$row_s['numero_procedimiento'],0, 1);
$pdf->Ln(0);
$pdf->Cell(500, 30, ' ', 0);
$pdf->Cell(90, 6, 'Proveedor:                           ', 0);
$pdf->Cell(1, 30, ' ', 0);
$pdf->MultiCell(150, 7.5, utf8_decode($row_a['datoPersonalProveedor']), 0);
$pdf->Ln(6);
$pdf->Cell(110, 0, utf8_decode('Contrato:                              ').$row_s['numero_pedido'], 0);
$pdf->Ln(0);
$pdf->Cell(500, 30, ' ', 0);
$pdf->Cell(150, 6, 'Telefono:                          55 59729800 ext 1288', 0);
$pdf->Ln(12);
$pdf->Cell(250, 0, utf8_decode('Número de suministro:         ').$num, 0);
$pdf->Cell(80);
$pdf->Cell(30, -20, utf8_decode('Fecha expedición: '.$fechaformateada), 0);
$pdf->Cell(140, 30, ' ', 0);
$pdf->Cell(90, 6, 'Correo:       ', 0);
$pdf->Cell(1, 30, ' ', 0);
$pdf->MultiCell(150, 7.5, $row_a['correoElectronico'], 0);
$pdf->Ln(0);
$pdf->Cell(500, 30, ' ', 0);
$pdf->Cell(150, 20, 'CLUES destino:                MCSSA018786', 0);
  $pdf->SetFillColor(210, 208, 210);
  $pdf->Ln(20);
  $pdf->Cell(743, 10, '',0, 0, 'C', 'true');
  $pdf->Ln(10);
  if($validaclaveoperador != ''){
  $pdf->MultiCell(450, 10, utf8_decode('            Almacén Entrega:  ').utf8_decode($operaordireccion), 0);
  }else{
  $pdf->MultiCell(450, 10, utf8_decode('            Almacén Entrega:  ').utf8_decode($almacen), 0);
  }
$pdf->Cell(500);
    $pdf->Cell(110, 0, 'Fecha Limite de Entrega: '.utf8_decode($fecha), 0);
  $pdf->Ln(5);
  if($validaclaveoperador != ''){
    $pdf->MultiCell(500, 10, utf8_decode('     Dirección de Entrega:   ').utf8_decode("LA QUE INDIQUE EL OPERADOR LOGISTICO, citas.distribucion@birmex.gob.mx"), 0);
    }else{
  $pdf->MultiCell(500, 10, utf8_decode('      Dirección de Entrega:  ').utf8_decode("CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, PUEBLO DE ZOQUIAPAN, C.P. 56530, MUNICIPIO DE 
                                           IXTAPALUCA, ESTADO DE MÉXICO."), 0);
    }
    $pdf->Ln(5);
    $pdf->MultiCell(500, 10, utf8_decode('           Dirección de Final:  ').utf8_decode("CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, PUEBLO DE ZOQUIAPAN, C.P. 56530, MUNICIPIO DE 
                                           IXTAPALUCA, ESTADO DE MÉXICO."), 0);
    $pdf->Ln(4);
    $pdf->Cell(50, 20, '       Partida presupuestal:  25301', 0);
    $pdf->Cell(450);
    if($validaclaveoperador != ''){
    $pdf->Cell(110, 0, 'Tipo de Entrega:               Operador logistico', 0);
    }else{
    $pdf->Cell(110, 0, 'Tipo de Entrega:               Directa', 0);
    }
    $pdf->SetFillColor(210, 208, 210);
    $pdf->Ln(17);
    $pdf->Cell(743, 10, '',0, 0, 'C', 'true');
    
  /**$pdf->Cell(505, 25, '', 0);
  $pdf->MultiCell(300, 10, ('Fecha en que recibe y acepta: '), 0);**/
 
  //$pdf->Image('imagenes/firmatono.jpg', 555 ,190, 75 , 75);
  

  $pdf->Ln(5);
  
  $pdf->SetFont('Arial', 'B', 6);
 
  $pdf->Ln(7);
  $pdf->SetFillColor(163, 163, 163);
  $pdf->SetTextColor(255,255,255);
  $pdf->SetDrawColor(0, 0, 0);
  
  $pdf->Cell(105, 10, 'Clave Interna de Almacen' ,1, 0, 'C', 'true');
  $pdf->Cell(70, 10, 'Clave del Insumo',1, 0, 'C', 'true');
  $pdf->Cell(50, 10, 'CUCOP',1, 0, 'C', 'true');
  $pdf->Cell(258, 10, 'DESCRIPCION',1, 0, 'C', 'true');
  $pdf->Cell(60, 10, 'Unidad Medida',1, 0, 'C', 'true');
  $pdf->Cell(70, 10, 'Cantidad solicitada',1, 0, 'C', 'true');
  $pdf->Cell(60, 10, 'Precio unitario',1, 0, 'C', 'true');
  $pdf->Cell(70, 10, 'Importe',1, 0, 'C', 'true');
 
 
  
  $pdf->Ln(10);
  $pdf->SetFont('Arial', '', 6);
  $pdf->SetTextColor(0,0,0);
  $pdf->tablewidths = array(105,70,50,258,60,70,60,70);

  $item = 0;
  $data = array();
while($fila=$result->fetch_assoc()){

$b=$fila['claveHraei'];
$c=$fila['cuadroBasico'];
$d=$fila['cucop'];
$e=$fila['descripcionDelBien'];
$f=$fila['unidadMedida'];
$i=$fila['cantidad'];
$j=formatMoney($fila['precioUnitario']);
$k=formatMoney($fila['importe']);
$l=formatMoney($row_s['totalOrden']);


$data[] = array(($b),($c),($d),mb_convert_encoding($e,'ISO-8859-1','UTF-8'),mb_convert_encoding($f,'ISO-8859-1','UTF-8'),($i),($j),($k));

}
$m = '';
$data[] = array(($m),($m),($m),($m),($m),($m),($m),($m));
$tablewidths = $pdf->morepagestable($data);

$pdf->SetY($pdf->GetY() + 0);
$pdf->$data;
$pdf->SetFillColor(210, 208, 210);
$pdf->SetTextColor(0,0,0);

$pdf->Cell(743, 12, 'SUB TOTAL:'.formatMoney($row_s['totalOrden']).'',1,0,'R', True);
$pdf->Ln(11);

$pdf->Cell(743, 12, 'I.V.A:',1,1,'R', True);
  
$pdf->Ln(0);
$pdf->Cell(743, 12, 'TOTAL:'.formatMoney($row_s['totalOrden']).'',1,1,'R', True);
$pdf->Ln(5);
$pdf->Cell(443);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(300, 6,'                                                         
                                                                        Administrador de contrato
---------------------------------------------------------------------------------------------------------------------------------------------------

Nombre:


---------------------------------------------------------------------------------------------------------------------------------------------------
Cargo:


---------------------------------------------------------------------------------------------------------------------------------------------------
Firma:



',1,1,'R', True);

$pdf->Ln(5);
$pdf->Cell(443);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(300, 6,'                                                              




---------------------------------------------------------------------------------------------------------------------------------------------------
                                                                '.utf8_decode('Nombre y firma de proveedor de aceptación').'

',1,1,'R', True);
$pdf->Ln(5);
$pdf->Cell(443);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(300, 6,'                                                              




-----------------------------------------------------------------------------------------------------------------------------
                                          '.utf8_decode('Nombre y firma de proveedor de aceptación').'

',1,1,'R', True);

//$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('Times', '', 7);

$pdf->Output("$nombreproveedor $num.pdf", 'I');

//Salida del documento


?>