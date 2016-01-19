<?php

header('Content-Type: text/html; charset=UTF-8');

require_once '../control/datos_conexion.php';

$consulta = "SELECT folio, nom_org, rep_legal, nom_proyecto, nom_resp, eje_tem, sub_eje, tipo_proyecto, 
    rec_ficha_tec, rec_arch_elec, rec_cons_insc, rec_carta, rec_cons_plat, rec_doc_term, resp_proyecto, 
    nom_per_entrega FROM registro WHERE folio = '1' ";
$query = mysqli_query(conector::conexion(), $consulta);

if ($reg = mysqli_fetch_array($query, MYSQLI_BOTH)) {
    



setlocale(LC_TIME, 'es_ES.UTF-8');

require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../images/angel.png',15,10,25);
$pdf->Image('../images/dgids.png',175,10,25);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,utf8_decode("PROGRAMA DE COINVERSIÓN PARA EL DESARROLLO SOCIAL"),0,0,'C');
$pdf->Ln(4);
$pdf->Cell(190,10,utf8_decode("DE LA CIUDAD DE MÉXICO 2016"),0,0,'C');
$pdf->Ln(5);
$pdf->Cell(190,15,utf8_decode("Dirección General de Igualdad y Diversidad Social"),0,0,'C');
$pdf->Ln(15);
$pdf->Cell(190,15,utf8_decode("COMPROBANTE DEL REGISTRO DEL PROYECTO"),0,0,'C');
$pdf->Ln(15);
$pdf->SetXY(145,55);
$pdf->Cell(41,7,strftime("%d de %B de %Y"),0,1,'C');
$pdf->Ln(15);
$pdf->SetFont('Arial','',8);
$pdf->SetXY(18,70);
$pdf->Cell(10,5,utf8_decode("Folio: "),0,0,'L');
$pdf->SetXY(32,70);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(191, 191, 191);
$pdf->Cell(15,5,$reg['folio'],1,0,'C',true);
$pdf->SetXY(18,77);
$pdf->SetFont('Arial','',8);
$pdf->Cell(45,5,utf8_decode("Nombre de la organización: "),0,0,'L');
$pdf->SetXY(63,77);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(120,5,$reg['nom_org'],0,0,'L');
$pdf->SetXY(18,84);
$pdf->SetFont('Arial','',8);
$pdf->Cell(62,5,utf8_decode("Nombre de la o el representante legal: "),0,0,'L');
$pdf->SetXY(80,84);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(90,5,$reg['rep_legal'],0,0,'L');
$pdf->SetXY(18,91);
$pdf->SetFont('Arial','',8);
$pdf->Cell(35,5,utf8_decode("Nombre del proyecto: "),0,0,'L');
$pdf->SetXY(55,91);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(130,5,$reg['nom_proyecto'],0,0,'L');
$pdf->SetXY(18,98);
$pdf->SetFont('Arial','',8);
$pdf->Cell(71,5,utf8_decode("Nombre de la o el responsable del proyecto: "),0,0,'L');
$pdf->SetXY(89,98);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(90,5,$reg['nom_resp'],0,0,'L');
$pdf->SetXY(18,105);
$pdf->SetFont('Arial','',8);
$pdf->Cell(22,5,utf8_decode("Eje temático: "),0,0,'L');
$pdf->SetXY(40,105);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(150,5,$reg['eje_tem'],0,0,'L');
$pdf->SetXY(18,112);
$pdf->SetFont('Arial','',8);
$pdf->Cell(14,5,utf8_decode("Subeje: "),0,0,'L');
$pdf->SetXY(35,112);
$pdf->SetFont('Arial','B',6);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(160,3,$reg['sub_eje'],0,'J',false);
$pdf->SetXY(18,123);
$pdf->SetFont('Arial','',8);
$pdf->Cell(48,5,utf8_decode("Proyecto nuevo / continuidad: "),0,0,'L');
$pdf->SetXY(60,123);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,5,$reg['tipo_proyecto'],0,0,'L');
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(18,132);
$pdf->SetFont('Arial','',8);
$pdf->Cell(38,5,utf8_decode("Documentación anexa: "),0,0,'L');
$pdf->SetXY(20,140);
$pdf->Cell(85,5,utf8_decode("a. Proyecto y ficha técnica (original y copia impresa)"),0,0,'L');
$pdf->SetXY(170,140);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,$reg['rec_ficha_tec'],1,0,'C');
$pdf->SetXY(20,147);
$pdf->SetFont('Arial','',8);
$pdf->Cell(100,5,utf8_decode("b. Archivo electrónico del proyecto y ficha técnica (CD o USB)"),0,0,'L');
$pdf->SetXY(170,147);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,$reg['rec_arch_elec'],1,0,'C');
$pdf->SetXY(20,154);
$pdf->SetFont('Arial','',8);
$pdf->Cell(117,5,utf8_decode("c. Copia fotostática simple de la Constancia de Inscripción en el Registro"),0,0,'L');
$pdf->SetXY(170,157);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,$reg['rec_cons_insc'],1,0,'C');
$pdf->SetXY(20,159);
$pdf->SetFont('Arial','',8);
$pdf->Cell(87,5,utf8_decode(" de Organizaciones Civiles de la Ciudad de México"),0,0,'L');
$pdf->SetXY(20,166);
$pdf->Cell(78,5,utf8_decode("d. Cartas compromiso (original y copia impresa)"),0,0,'L');
$pdf->SetXY(170,166);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,$reg['rec_carta'],1,0,'C');
$pdf->SetXY(20,173);
$pdf->SetFont('Arial','',8);
$pdf->Cell(88,5,utf8_decode("e. Constancia de participación de la plática informativa"),0,0,'L');
$pdf->SetXY(170,173);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,$reg['rec_cons_plat'],1,0,'C');
$pdf->SetXY(20,180);
$pdf->SetFont('Arial','',8);
$pdf->Cell(90,5,utf8_decode("f. En su caso documento de terminación 2015 y/o 2014"),0,0,'L');
$pdf->SetXY(170,180);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(8,5,$reg['rec_doc_term'],1,0,'C');
$pdf->SetXY(45,190);
$pdf->Cell(10,7,utf8_decode("Recibió"),0,0,'C');
$pdf->SetXY(150,190);
$pdf->Cell(10,7,utf8_decode("Entregó"),0,0,'C');
$pdf->SetXY(20,210);
$pdf->Cell(65,3,utf8_decode("_________________________________"),0,0,'C');
$pdf->SetXY(125,210);
$pdf->Cell(65,3,utf8_decode("_________________________________"),0,0,'C');
$pdf->SetXY(20,215);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(65,3,$reg['resp_proyecto'],0,0,'C');
$pdf->SetXY(125,215);
$pdf->Cell(65,3,$reg['nom_per_entrega'],0,0,'C');
$pdf->SetXY(20,220);
$pdf->Cell(65,3,utf8_decode("Dirección General de Igualdad y Diversidad Social"),0,0,'C');
$pdf->SetXY(125,220);
$pdf->Cell(65,3,utf8_decode("Responsable del proyecto"),0,0,'C');
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
