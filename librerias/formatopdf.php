<?php

require_once '../control/datos_conexion.php';

$consulta = "Select nom_org from registro where folio='1' ";
$query = mysqli_query(conector::conexion(), $consulta);

if ($reg = mysqli_fetch_array($query,MYSQLI_BOTH)) {
    



setlocale(LC_TIME, 'es_ES.UTF-8');

require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
//$pdf->Image('../images/angel.png',15,10,-200);
//$pdf->Image('../images/dgids.png',175,10,-250);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,utf8_decode("PROGRAMA DE COINVERSIÓN PARA EL DESARROLLO SOCIAL"),0,0,'C');
$pdf->Ln(4);
$pdf->Cell(190,10,utf8_decode("DE LA CIUDAD DE MÉXICO 2016"),0,0,'C');
$pdf->Ln(5);
$pdf->Cell(190,15,utf8_decode("Dirección General de Igualdad y Diversidad Social"),0,0,'C');
$pdf->Ln(15);
$pdf->Cell(190,15,utf8_decode("COMPROBANTE DEL REGISTRO DEL PROYECTO"),0,0,'C');
$pdf->Ln(15);
$pdf->Cell(300,15,strftime("%d de %B de %Y"),0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->SetXY(18,70);
$pdf->Cell(10,7,utf8_decode("Folio: "),0,0,'C');
$pdf->SetXY(30,70);
$pdf->Cell(10,7,0,0,'C');
$pdf->SetXY(18,77);
$pdf->MultiCell(45,7,utf8_decode("Nombre de la organización: ".  utf8_decode($reg['nom_org'])),0,'C');
$pdf->SetXY(18,84);
$pdf->Cell(62,7,utf8_decode("Nombre de la o el representante legal: "),0,0,'C');
$pdf->SetXY(18,91);
$pdf->Cell(35,7,utf8_decode("Nombre del proyecto: "),0,0,'C');
$pdf->SetXY(18,98);
$pdf->Cell(71,7,utf8_decode("Nombre de la o el responsable del proyecto: "),0,0,'C');
$pdf->SetXY(18,105);
$pdf->Cell(22,7,utf8_decode("Eje temático: "),0,0,'C');
$pdf->SetXY(18,112);
$pdf->Cell(14,7,utf8_decode("Subeje: "),0,0,'C');
$pdf->SetXY(18,119);
$pdf->Cell(48,7,utf8_decode("Proyecto nuevo / continuidad: "),0,0,'C');
$pdf->SetXY(18,128);
$pdf->Cell(38,7,utf8_decode("Documentación anexa: "),0,0,'C');
$pdf->SetXY(20,135);
$pdf->Cell(85,7,utf8_decode("a. Proyecto y ficha técnica (original y copia impresa)"),0,0,'C');
$pdf->SetXY(20,142);
$pdf->Cell(100,7,utf8_decode("b. Archivo electrónico del proyecto y ficha técnica (CD o USB)"),0,0,'C');
$pdf->SetXY(20,149);
$pdf->Cell(117,7,utf8_decode("c. Copia fotostática simple de la Constancia de Inscripción en el Registro"),0,0,'C');
$pdf->SetXY(20,154);
$pdf->Cell(87,7,utf8_decode(" de Organizaciones Civiles de la Ciudad de México"),0,0,'C');
$pdf->SetXY(20,161);
$pdf->Cell(78,7,utf8_decode("d. Cartas compromiso (original y copia impresa)"),0,0,'C');
$pdf->SetXY(20,168);
$pdf->Cell(88,7,utf8_decode("e. Constancia de participación de la plática informativa"),0,0,'C');
$pdf->SetXY(20,175);
$pdf->Cell(90,7,utf8_decode("f. En su caso documento de terminación 2015 y/o 2014"),0,0,'C');
$pdf->SetXY(45,190);
$pdf->Cell(10,7,utf8_decode("Recibió"),0,0,'C');
$pdf->SetXY(150,190);
$pdf->Cell(10,7,utf8_decode("Entregó"),0,0,'C');
$pdf->SetXY(20,210);
$pdf->Cell(65,7,utf8_decode("_________________________________"),0,0,'C');
$pdf->SetXY(125,210);
$pdf->Cell(65,7,utf8_decode("_________________________________"),0,0,'C');
$pdf->SetXY(20,217);
$pdf->Cell(65,7,utf8_decode("Persona que recibió los documentos"),0,0,'C');
$pdf->SetXY(125,217);
$pdf->Cell(65,7,utf8_decode("Persona que entregó los documentos"),0,0,'C');
$pdf->SetXY(20,224);
$pdf->Cell(65,7,utf8_decode("Dirección General de Igualdad y Diversidad Social"),0,0,'C');
$pdf->SetXY(125,224);
$pdf->Cell(65,7,utf8_decode("Responsable del proyecto"),0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(45,237);
$pdf->Cell(120,7,utf8_decode("LA RECEPCIÓN DE LOS DOCUMENTOS, NO IMPLICA LA APROBACIÓN AUTOMÁTICA DEL PROYECTO"),0,0,'C');
$pdf->SetXY(45,247);
$pdf->Cell(120,7,utf8_decode("Artículo 38 de la Ley de Desarrollo Social para la Ciudad De México y 60 de su Reglamento"),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->SetXY(40,252);
$pdf->Cell(130,7,utf8_decode("Este programa es de carácter público no es patrocinado ni promovido por partido político alguno y sus recursos provienen de los "),0,0,'C');
$pdf->SetXY(40,255);
$pdf->Cell(130,7,utf8_decode("de los impuestos que pagan todos los contribuyentes. Esta prohibido el uso de este programa con fines políticos, electorales, de lucro y otros"),0,0,'C');
$pdf->SetXY(40,258);
$pdf->Cell(130,7,utf8_decode("distintos a los establecidos"),0,0,'C');
$pdf->SetXY(40,263);
$pdf->Cell(130,7,utf8_decode("Quien haga uso indebido de los recursos de este programa en la Ciudad de México, será sancionado de acuerdo con la ley aplicable y ante la"),0,0,'C');
$pdf->SetXY(40,266);
$pdf->Cell(130,7,utf8_decode("autoridad competente"),0,0,'C');
$pdf->Output();
}  else {
    echo 'No se puede mostrar';    
}
?>
