<?php
error_reporting(0);
date_default_timezone_set('America/Monterrey');
require_once ('app/lib/pdf/fpdf.php');
require 'conexion.php';
$hoy=date("Y-m-d");
$costos=base64_decode($_GET['total']);
$id_unico=base64_decode($_GET['id_unico']);
$valor2=base64_decode($_GET['claveContrato']);

$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);


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

    var $tablewidths;
    var $footerset;
    
    function _beginpage($orientation, $size) {
     $this->page++;
    
    // Resuelve el problema de sobrescribir una página si ya existe.
     if(!isset($this->pages[$this->page])) 
      $this->pages[$this->page] = '';
     $this->state  =2;
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
     if($orientation!=$this->CurOrientation || $size[0]!=$this->CurPageSize[0] || $size[1]!=$this->CurPageSize[1])
     {
    
      // Nuevo tamaño o la orientación
      if($orientation=='P')
      {
       $this->w = $size[0];
       $this->h = $size[1];
      }
      else
      {
       $this->w = $size[1];
       $this->h = $size[0];
      }
      $this->wPt = $this->w*$this->k;
      $this->hPt = $this->h*$this->k;
      $this->PageBreakTrigger = $this->h-$this->bMargin;
      $this->CurOrientation = $orientation;
      $this->CurPageSize = $size;
     }
     if($orientation!=$this->DefOrientation || $size[0]!=$this->DefPageSize[0] || $size[1]!=$this->DefPageSize[1])
      $this->PageSizes[$this->page] = array($this->wPt, $this->hPt);
    }
 
    function morepagestable($datas, $lineheight=9) {
     // Algunas cosas para establecer y ' recuerdan '
     $l = $this->lMargin;
     $startheight = $h = $this->GetY();
     $startpage = $currpage = $maxpage = $this->page;
    
     // Calcular todo el ancho
     $fullwidth = 0;
     foreach($this->tablewidths AS $width) {
      $fullwidth += $width;
     }
    
     // Ahora vamos a empezar a escribir la tabla
     foreach($datas AS $row => $data) {
      $this->page = $currpage;
    
      // Escribir los bordes horizontales
      $this->Line($l,$h,$fullwidth+$l,$h);
    
      // Escribir el contenido y recordar la altura de la más alta columna
      foreach($data AS $col => $txt) {
       $this->page = $currpage;
       $this->SetXY($l,$h);
       $this->MultiCell($this->tablewidths[$col],$lineheight,$txt);
       $l += $this->tablewidths[$col];
    
       if(!isset($tmpheight[$row.'-'.$this->page]))
        $tmpheight[$row.'-'.$this->page] = 0;
       if($tmpheight[$row.'-'.$this->page] < $this->GetY()) {
        $tmpheight[$row.'-'.$this->page] = $this->GetY();
       }
       if($this->page > $maxpage)
        $maxpage = $this->page;
      }
    
      // Obtener la altura estábamos en la última página utilizada
      $h = $tmpheight[$row.'-'.$maxpage];
    
      //Establecer el "puntero " al margen izquierdo
      $l = $this->lMargin;
    
      // Establecer el "$currpage en la ultima pagina
      $currpage = $maxpage;
     }
    
     // Dibujar las fronteras
     // Empezamos a añadir una línea horizontal en la última página
        $this->page = $maxpage;
        $this->Line($l,$h,$fullwidth+$l,$h);
     // Ahora empezamos en la parte superior del documento
     for($i = $startpage; $i <= $maxpage; $i++) {
      $this->page = $i;
      $l = $this->lMargin;
      //$t  = ($i == $startpage) ? $startheight : $this->tMargin;
      //$lh = ($i == $maxpage)   ? $h : $this->h-$this->bMargin;
      $this->Line($l,$t,$l,$lh);
      foreach($this->tablewidths AS $width) {
       $l += $width;
       $this->Line($l,$t,$l,$lh);
      }
     }
     // Establecerlo en la última página , si no que va a causar algunos problemas
     //$this->page = $maxpage;
    }
  
    
      

    
    function Header()
    {
        $direccion = utf8_decode('Dirección de Operaciones.
Centro Integral de Servicios Farmacéuticos.');
        // Logo
        $this->Image('imagenes/images.png', 25 ,15, 50 , 50);
        //$this->Image('imagenes/logo3.jpg' , 85 ,15, 50 , 50);
        
        $this->SetFont('Times','',8);
        // Movernos a la derecha
        $this->Cell(590, 5, '', 0);
        // Título
        $this->MultiCell(200, 10, 'Hospital Regional de Alta Especialidad de Ixtapaluca.
'.$direccion.'', 0);
    $this->Cell(350, 10, '', 0);
    $this->Cell(400, -10, utf8_decode('ORDEN DE SUMINISTRO'), 0);
$this->SetFillColor(0, 128, 0);
$this->Ln(10);
$this->Cell(800, 1, '',0, 0, 'C', 'true');
        // Salto de línea
        $this->Ln(4);
    }
      function Footer()
   {
      
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Image('imagenes/imagen1.jpg' , 0 ,550, 840 , 40);
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   
      }
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
      
    $domicilio = "ALMACÉN GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA, CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, ZOQUIAPAN, IXTAPALUCA, EDOMÉX.";
    $fecha=" DENTRO DE LOS 15 DIAS POSTERIORES A LA NOTIFICACION DE LA ORDEN DE SUMINISTRO";
    $direccion = utf8_decode('Dirección de Operaciones.
Centro Integral de Servicios Farmacéuticos.');

    while($row_s=$resultado->fetch_assoc()){
        //$nombreproveedor = $row_s['nombre_proveedor'];
        $numeroproveedor = $row_s['numero_proveedor'];
        $sql2s = "SELECT * from datosproveedor where id_datoProveedor= $numeroproveedor ";
$resultados = mysqli_query($conexion2, $sql2s);
    $row_a = mysqli_fetch_assoc($resultados);
    
    $pdf = new PDF('L','pt');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 8);
  
    $pdf->Ln(20);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, -20, 'Subtotal: '.formatMoney($row_s['totalOrden']).'');
    $pdf->Ln(25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, -40, utf8_decode('I.V.A:       $ 0%'),'');
    $pdf->Ln(25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(30, -60, 'Total:       '.formatMoney($row_s['totalOrden']).'');
    $pdf->Ln(-20);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Nombre, fecha y firma en que recibe y acepta el proveedor: '), 0);
    $pdf->Ln(85);
    /**$pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Fecha en que recibe y acepta: '), 0);**/
    $pdf->Ln(-35);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Firma administrador del contrato: '), 0);
    $pdf->Ln(55);
    //$pdf->Image('imagenes/firmatono.jpg', 555 ,190, 75 , 75);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, utf8_decode('JOSE ANTONIO FLORES VARGAS 
Encargado de los Asuntos Inherentes del Centro Integral de Servicios Farmacéuticos. '), 0);
    $pdf->Ln(5);

    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(300, 30, ' ', 0);
    $pdf->Ln(-205);
    $pdf->Cell(110, 25, ('Nombre del proveedor: ').utf8_decode($row_a['datoPersonalProveedor']), 0);
    $pdf->Ln(20);
    $pdf->MultiCell(410, 10, ('Domicilio proveedor: ').utf8_decode($row_a['domicilioPersonal']), 0);
    $pdf->Ln(0);
    $pdf->Cell(110, 15, 'Telefono: '.$row_a['telefono'], 0);
    $pdf->Ln(17);
    $pdf->Cell(110, 5, 'Fax: ', 0);
    $pdf->Ln(15);
    $pdf->Cell(110, 5, 'Correo electronico: '.$row_a['correoElectronico'], 0);
    $pdf->Ln(25);
    $pdf->Cell(110, -10, utf8_decode('Número de contrato/pedido: ').$row_s['numero_pedido'], 0);
    $pdf->Ln(25);
    $pdf->Cell(250, -30, utf8_decode('Número de orden de suministro: ').$num, 0);
    $pdf->Ln(25);
    $pdf->Cell(30, -50, 'Fecha: '.$row_s['fechaRegistro'], 0);
    $pdf->Ln(25);
    $pdf->Cell(300, -70, utf8_decode('Número de procedimiento: ').$row_s['numero_procedimiento'], 0);
    $pdf->Ln(-25);
    $pdf->MultiCell(300, 10, ('Domicilio de entrega: ').utf8_decode($domicilio), 0);
    $pdf->Ln(5);
    $pdf->MultiCell(300, 10, ('Fecha de entrega:').utf8_decode($fecha), 0);
    $pdf->SetFont('Arial', 'B', 7);
   
    $pdf->Ln(7);
    $pdf->SetFillColor(255, 230, 16);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0, 0, 0);
    
    $pdf->Cell(84, 15, 'Partida presupuestal',1, 0, 'C', 'true');
    $pdf->Cell(65, 15, 'Clave HRAEI' ,1, 0, 'C', 'true');
    $pdf->Cell(80, 15, 'CNIS',1, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'CUCOP',1, 0, 'C', 'true');
    $pdf->Cell(270, 15, 'DESCRIPCION',1, 0, 'C', 'true');
    $pdf->Cell(65, 15, 'U.D.M',1, 0, 'C', 'true');
    $pdf->Cell(50, 15, 'Cantidad',1, 0, 'C', 'true');
    $pdf->Cell(70, 15, 'Precio unitario',1, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'Importe',1, 0, 'C', 'true');
   
   
    
    $pdf->Ln(16);
    $pdf->SetFont('Arial', '', 7);

    $pdf->tablewidths = array(84,75,80,50,270,65,65,65,50);

    $item = 0;
 
   
while($fila=$result->fetch_assoc()){
 

$a=$fila['partidaPresupuestal'];
$b=$fila['claveHraei'];
$c=$fila['cuadroBasico'];
$d=$fila['cucop'];
$e=$fila['descripcionDelBien'];
$f=$fila['unidadMedida'];
$i=$fila['cantidad'];
$j=formatMoney($fila['precioUnitario']);
$k=formatMoney($fila['importe']);
$l=formatMoney($row_s['totalOrden']);


$data[] = array(utf8_decode($a),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($f),utf8_decode('         '.$i),utf8_decode($j),utf8_decode($k));

}


$pdf->morepagestable($data);

//$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('Times', '', 7);

$pdf->Output("$nombreproveedor $num.pdf", 'I');
}
//Salida del documento

    
?>