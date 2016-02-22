<?php


require_once '../control/datos_conexion.php';

$UsId = filter_input(INPUT_GET, 'UsId');

$consulta = "SELECT registro_gral.id_folio, registro_gral.nom_org, registro_gral.rep_legal, registro_gral.nom_proyecto,
    registro_gral.nom_resp, registro_gral.tipo_proyecto, registro_gral.rec_ficha_tec, registro_gral.rec_arch_elec,
    registro_gral.rec_copia_insc, registro_gral.rec_carta, registro_gral.rec_cons_plat, registro_gral.rec_doc_term,
    registro_gral.nom_per_entrega, cat_eje_tematico.tema as eje, sub_eje.tema, usuarios.nombre FROM registro_gral, cat_eje_tematico, sub_eje, usuarios 
    WHERE registro_gral.id_usuarios = '" . $UsId . "' and cat_eje_tematico.numero = registro_gral.id_cat_eje and sub_eje.sub_eje = registro_gral.id_sub_eje and 
    registro_gral.id_usuarios = usuarios.id_usuarios ORDER BY registro_gral.id_folio DESC LIMIT 1";    
$query = mysqli_query(conector::conexion(), $consulta);

if ($reg = mysqli_fetch_array($query, MYSQLI_BOTH)) {
    



setlocale(LC_TIME, 'es_ES.UTF-8');

require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../images/letrero.png',8,5,25);
$pdf->Image('../images/dgids.png',175,8,25);
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
$pdf->Cell(5,5,$reg['id_folio'],0,0,'R',true);
$pdf->Cell(8,5,strftime("/ %Y"),0,0,'C',true);
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
$pdf->Cell(150,5,$reg['eje'],0,0,'L');
$pdf->SetXY(18,112);
$pdf->SetFont('Arial','',8);
$pdf->Cell(14,5,utf8_decode("Subeje: "),0,0,'L');
$pdf->SetXY(35,112);
$pdf->SetFont('Arial','B',6);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(160,3,$reg['tema'],0,'J',false);
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
$pdf->Cell(8,5,$reg['rec_copia_insc'],1,0,'C');
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
$pdf->Cell(90,5,utf8_decode("f. En su caso documento de terminación 2014 y/o 2015"),0,0,'L');
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
$pdf->Cell(65,3,$reg['nombre'],0,0,'C');
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
