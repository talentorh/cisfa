<?php
error_reporting(0);
require_once ('app/lib/pdf/fpdf.php');
require 'conexion.php';
date_default_timezone_set("America/Mexico_City");
$hoy=date("Y-m-d");    
$total = base64_decode($_GET['valor3']);
$valor= $_GET['valor'];
$querY = "UPDATE oficiospenalizcion set estatus= 1
where numOficioPenalizacion = '$valor' limit 1";
$edita= mysqli_query($conexion2, $querY); 
$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);
$fecha2= base64_decode($_GET['fecha']);
$fechaLimite= base64_decode($_GET['fechaLimite']);
$totalMaximo = $_GET['totalMaximo'];
$totalMaximoPenalizar = $_GET['totalMaximoPenalizar'];

$actualizaMonto = "UPDATE oficiospenalizcion set montoIncumplimiento = $total where numOficioPenalizacion = '$valor'";
$result = mysqli_query($conexion2, $actualizaMonto);
$actualizarFecha = "UPDATE oficiospenalizcion set fechaRegistroPenalizacion ='$hoy' where numOficioPenalizacion = '$valor'";
$result = mysqli_query($conexion2, $actualizarFecha);
$actualizarClave = "UPDATE oficiospenalizcion set claveContratoPrincipal =$var where numOficioPenalizacion = '$valor'";
$result = mysqli_query($conexion2, $actualizarClave);
$querY = "UPDATE oficiospenalizcion set claveContrato= '$num'
 where numOficioPenalizacion = '$valor' limit 1";
$edita= mysqli_query($conexion2, $querY); 
$sql2 = "SELECT *, numeroorden.totalOrden, numeroorden.fechaEntrego, ordensuministro.claveHraei, ordensuministro.descripcionDelBien, ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, ordensuministro.diasVencidos, ordensuministro.procentaje, ordensuministro.totalPenalizacion from proveedores inner join numeroorden on numeroorden.claveUnicaContrato='$num' inner join ordensuministro on ordensuministro.claveUnicaOrden = '$num' and ordensuministro.claveContrato = $var and ordensuministro.penalizar = 1  where id_proveedor= $var ";
$resultado = mysqli_query($conexion2, $sql2);
//$row2 = mysqli_fetch_assoc($resultado);
$sql = "SELECT ordensuministro.partidaPresupuestal, ordensuministro.cantidadNoEntregada, ordensuministro.montoPenalizar, ordensuministro.claveHraei, ordensuministro.cuadroBasico, ordensuministro.cucop, ordensuministro.descripcionDelBien, 
ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, 
 proveedores.numero_pedido, proveedores.numero_procedimiento, numeroorden.totalOrden, numeroorden.fechaRegistro from ordensuministro inner join proveedores on proveedores.id_proveedor =$var inner join numeroorden on claveUnicaContrato = '$num' and ordensuministro.claveUnicaOrden ='$num' and ordensuministro.claveContrato =$var and ordensuministro.penalizar = 1";
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
    
   function Footer()
   {
      
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Image('imagenes/logopie.jpg' , -40 ,550, 925 , 35);
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   
      }
    
    function morepagestable($datas, $lineheight=12) {
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
      $t  = ($i == $startpage) ? $startheight : $this->tMargin;
      $lh = ($i == $maxpage)   ? $h : $this->h-$this->bMargin;
      $this->Line($l,$t,$l,$lh);
      foreach($this->tablewidths AS $width) {
       $l += $width;
       $this->Line($l,$t,$l,$lh);
      }
     }
     // Establecerlo en la última página , si no que va a causar algunos problemas
     $this->page = $maxpage;
    }
    public function DrawHeader($header, $w) {
        // Colors, line width and bold font
        // Header
        $this->SetFillColor(233, 136, 64);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');        
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
    }
    function Header()
{
    // Logo
    //$this->Image('imagenes/images.png', 25 ,20, 50 , 50);
    //$this->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Movernos a la derecha
    //$this->Cell(80);
    // Título
    //$this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    //$this->Ln(20);
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
    $fecha="QUINCE DIAS NATURALES CONTADOS A PARTIR DEL SIGUIENTE DÍA HÁBIL DE LA EMISÓN DE ESTA ÓRDEN DE SUMINISTRO";
    while($row_s=$resultado->fetch_assoc()){
         $numerocontrato = $row_s['numero_pedido'];
         $numeroproveedor = $row_s['numero_proveedor'];
        
        $sql2s = "SELECT * from datosproveedor where id_datoProveedor= $numeroproveedor ";
$resultados = mysqli_query($conexion2, $sql2s);
    $row_a = mysqli_fetch_assoc($resultados);
    $pdf = new PDF('L','pt');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 9);
    $pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
    $pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
    $pdf->Cell(260, 10, '', 0);
    $pdf->Cell(320, 30, utf8_decode('"Ricardo Flores Magón, Precursor de la Revolución Mexicana"                                      '), 0);
    $pdf->MultiCell(220, 10, utf8_decode('Hospital Regional de Alta Especialidad de Ixtapaluca.
Dirección de Operaciones.
Centro Integral del Servicios Farmacéuticos.'), 0);
    $pdf->Cell(45, 10, '', 0);
    $pdf->SetFillColor(0, 128, 0);
    $pdf->Ln(15);
    $pdf->Cell(793, 1, '',0, 0, 'C', 'true');
    $pdf->Ln(-30);
    $pdf->SetFont('Arial', '', 9);
    //$pdf->Cell(650, 35, '"ejemplo"',0);
    $pdf->Ln(43);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(570, 25, '', 0);
    $pdf->Cell(300, 20, utf8_decode('Ixtapaluca, Estado de México a ').date('d-m-Y').'', 0);
    $pdf->Ln(10);
    $pdf->Cell(570, 25, '', 0);
    $pdf->Cell(300, 25, utf8_decode('Oficio N°. ').$valor, 0);
    $pdf->Ln(10);
    $pdf->Cell(570, 25, '', 0);
    $pdf->Cell(30, 25, utf8_decode('Asunto: Cálculo para aplicación de pena convencional'), 0);
    $pdf->Ln(25);
   
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(300, 30, ' ', 0);
    $pdf->Ln(1);
    $pdf->Cell(110, 25, ''.utf8_decode($row_a['datoPersonalProveedor']), 0);
    $pdf->Ln(25);
    $pdf->MultiCell(410, 10, ('Presente: '), 0);
    $pdf->Ln(10);
    $pdf->MultiCell(800, 12, utf8_decode('Por este medio me permito externderle un cordial saludo y en relación a la orden de suministro '.$num.' emitida con fecha '.$row_s['fechaRegistro'].' derivado de la 
adjudicación en favor del proveedor '.$row_a['datoPersonalProveedor'].', relativo al contrato '.$numerocontrato.' para la entrega de los siguientes insumos.'), 0);

  
    $pdf->SetFont('Arial', 'B', 8);
   
    $pdf->Ln(10);
    $pdf->SetFillColor(0, 128, 0);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetDrawColor(0, 0, 0);
    
    $pdf->Cell(84, 15, 'PartidaPresupuestal',0, 0, 'C', 'true');
    $pdf->Cell(65, 15, 'Clave HRAEI' ,0, 0, 'C', 'true');
    $pdf->Cell(80, 15, 'Cuadro basico',0, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'CUCOP',0, 0, 'C', 'true');
    $pdf->Cell(260, 15, 'DESCRIPCION',0, 0, 'C', 'true');
    $pdf->Cell(80, 15, 'Unidad de medida',0, 0, 'C', 'true');
    $pdf->Cell(40, 15, 'Cantidad',0, 0, 'C', 'true');
    $pdf->Cell(70, 15, 'Precio unitario',0, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'Importe',0, 0, 'C', 'true');
   
    
    $pdf->Ln(16);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);
    $pdf->tablewidths = array(84,65,80,60,260,80,40,70,60);

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



$data[] = array(utf8_decode($a),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($f),utf8_decode($i),utf8_decode($j),utf8_decode($k));

 
}
  

$pdf->morepagestable($data);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);
$pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
$pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
 $pdf->Cell(260, 10, '', 0);
    $pdf->Cell(320, 30, utf8_decode('"Ricardo Flores Magón, Precursor de la Revolución Mexicana"                                      '), 0);;
$pdf->MultiCell(220, 10, utf8_decode('Hospital Regional de Alta Especialidad de Ixtapaluca.
Dirección de Operaciones.
Centro Integral del Servicios Farmacéuticos.'), 0);
$pdf->Cell(45, 10, '', 0);
$pdf->SetFillColor(0, 128, 0);
$pdf->Ln(15);
$pdf->Cell(793, 1, '',0, 0, 'C', 'true');
$pdf->Ln(-30);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(590, 5, '', 0);
$pdf->Ln(55);
$pdf->MultiCell(800, 12, utf8_decode('Al respecto me permito informale que a pesar de que el proveedor '.$row_a['datoPersonalProveedor'].' contaba con 15 dias naturales contados a partir del siguiente día
hábil de la emisión de la orden de suministro para la entrega de los insumos, se autorizó la recepción de los mismos con fecha posterior a la fecha limite de entrega, 
en virtud de que existe la necesidad de éstos para dar continuidad a los tratamientos farmacológicos de los pacientes del Hospital.



Por los anterior. se adjunta el cálculo realizado para determinar el importe de la pena convencional a que se hizo acreedor '.$row_a['datoPersonalProveedor'].', a fin de que 
se lleven a cabo las gestiones que correspondan para aplicar la sanción.



Sin otro particular quedo a sus órdenes.



Atentamente:
Encargado de los asuntos inherentes del CISFA.



QFB. Jose Antonio Flores Vargas.



c.c.p Dr. Héctor Zavala Sánchez.- Director de opreaciones
c.c.p Dr. Gilberto Adrián Gasca López.- Director Médico
c.c.p Lic. Jesús Antonio Alcaraz Granados.- Subdirector de Recursos Materiales
c.c.p Lic. Juan Manuel Rivera Garrido.- Subdirector de Recursos Financieros'), 0);


$pdf->AddPage();

$pdf->SetFont('Arial', '', 8);
$pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
$pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
 $pdf->Cell(260, 10, '', 0);
    $pdf->Cell(320, 30, utf8_decode('"Ricardo Flores Magón, Precursor de la Revolución Mexicana"                                      '), 0);
$pdf->MultiCell(220, 10, utf8_decode('Hospital Regional de Alta Especialidad de Ixtapaluca.
Dirección de Operaciones.
Centro Integral de Servicios Farmacéuticos.'), 0);
$pdf->Cell(45, 10, '', 0);
$pdf->SetFillColor(0, 128, 0);
$pdf->Ln(15);
$pdf->Cell(793, 1, '',0, 0, 'C', 'true');
$pdf->Ln(-30);
$pdf->Ln(40);
$pdf->Cell(793,15, '                                                                                                                                                                                                                                                                                                                             TOTAL '.formatMoney($total), 1,0);
$pdf->Ln(16);
$pdf->Cell(793,15, utf8_decode('                                                                                                                                                       Desgloce del monto total de penalización'),1,1);
$pdf->Ln(2);

$pdf->SetFillColor(0, 128, 0);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(0, 0, 0);

$pdf->Cell(70, 25, 'Proveedor',0, 0, 'C', 'true');
$pdf->Cell(55, 25, 'Solicitado' ,0, 0, 'C', 'true');
$pdf->Cell(80, 25, 'N de orden',0, 0, 'C', 'true');
$pdf->Cell(65, 25, 'Clave HRAEI',0, 0, 'C', 'true');
$pdf->Cell(120, 25, 'Descripcion',0, 0, 'C', 'true');
$pdf->Cell(40, 25, 'U D M',0, 0, 'C', 'true');
$pdf->Cell(40, 25, 'Cantidad',0, 0, 'C', 'true');
$pdf->Cell(50, 25, 'Precio',0, 0, 'C', 'true');
$pdf->Cell(60, 25, 'Total',0, 0, 'C', 'true');
$pdf->Cell(53, 25, 'Fecha limite',0, 0, '', 'true');
$pdf->Cell(62, 25, 'Fecha Entrego',0, 0, '', 'true');
$pdf->Cell(25, 25, 'Dias',0, 0, '', 'true');
$pdf->Cell(18, 25, '%',0, 0, '', 'true');
$pdf->Cell(57, 25, 'Monto',0, 0, '', 'true');

$pdf->Ln(26);
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(0,0,0);
$pdf->tablewidths = array(70,55,80,65,120,40,40,53,60,50,62,25,18,57);

$item = 0;





$a=$row_a['datoPersonalProveedor'];
$b=$fecha2;
$c=$num;
$d=$row_s['claveHraei'];
$e=$row_s['descripcionDelBien'];
$f=$row_s['unidadMedida'];
$i=$row_s['cantidadNoEntregada'];
$j=formatMoney($row_s['precioUnitario']);
$k=formatMoney($row_s['montoPenalizar']);
$l=$fechaLimite;
$w=$row_s['fechaEntregaInsumo'];
$m=$row_s['diasVencidos'];
$o=$row_s['procentaje'];
$p=formatMoney($row_s['totalPenalizacion']);



$data2[] = array(utf8_decode($a),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($f),utf8_decode($i),utf8_decode($j),utf8_decode($k),utf8_decode($l),($w),utf8_decode($m),utf8_decode($o),utf8_decode($p));

}

$pdf->morepagestable($data2);
$pdf->Output("$valor.pdf", 'I');
    
//Salida del documento
      
?>