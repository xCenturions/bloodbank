<?php
//include library
require('autoload.php');

//make TCPDF object
$pdf = new TCPDF('P','mm','A4');

//remove default header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetFontSpacing(0.2);


//add content (student list)
//title
$pdf->SetFont('sinhala','',14);
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

/* --- Cell --- */
$pdf->SetXY(10, 11);
$pdf->SetFontSize(15);
$pdf->Cell(0, 8, 'Y%s ,xld cd;sl reêr mdrú,hk fiajh', 0, 1, 'C', false);

$pdf->SetXY(10, 18);
$pdf->SetFontSize(22);
$pdf->Cell(0, 8, 'reêr odhl m%ldYh yd jd¾;dj', 0, 1, 'C', false);

/* --- Line --- */
$pdf->SetDrawColor(255,109,107);
$pdf->Line(10, 30, 200, 30);
$pdf->SetDrawColor(0);

/* --- Text --- */
$pdf->SetFont('', 'B', 12);
$pdf->Text(10, 35, 'reêr mß;Hd.YS,S ys;j;"');

$pdf->SetY(41);
$pdf->Write(5, 'f,a oka fok Tfí;a" Tfí f,a ,nd .kakd frda.Ska f.a;a" wdrlaIdj ;yjqre lsÍu i|yd lreKdlr fuu úia;r m;%sldj ksjerÈ j" ;ks j u mqrjkak m;%sldj msrùug fmr uq,a msgqfõ i|yka —reêr odhl Wmfoia ud,dj˜ fyd¢ka lshjd f;areï .kak ta iïnkaOfhka .eg¿jla we;akï lreKdlr cd;sl reêr mdrú,hk fiajfha ld¾h uKav,fhka úuikak');

/* --- Text --- */
$pdf->Text(10, 70, '^1& w& Tn óg fmr f,a oka § ;sfí o @ ');
/* --- Text --- */
$pdf->Text(180, 70, 'value');


$pdf->Output();