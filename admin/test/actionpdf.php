<?php
require('WriteHTML.php');

$pdf=new PDF_HTML();
//$pdf->Header();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('img/admin.jpg',78,40,50);
$pdf->SetFont('Arial','',14);


$pdf->addSociete( "House Of Diamante",
                  "No.7\n" .
                  "Reid Avenue\n".
                  "Colombo 7\n" );
/*$pdf->WriteHTML('<para><h1>Quotation for your designed jewellery</h1><br>
Website: <u>www.hod.lk</u></para><br><br>Follwing is the details of your design');*/
$pdf->cell(0,50,'Statistics for Admin purposes,');

$pdf->SetFont('Arial','b','16');
$pdf->WriteHTML('<para><h1>Community of House of Diamante</h1></para>');
$pdf->SetFont('Arial','',10); 

$htmlTable='<TABLE>
<TR>
<TD>Number of Vendors:</TD>
<TD>'.$_POST['name'].'</TD>
</TR>
<TR>
<TD>Number Of Users:</TD>
<TD>'.$_POST['email'].'</TD>
</TR>
<TR>
<TD>Number of Necklaces:</TD>
<TD>'.$_POST['url'].'</TD>
</TR>
<TR>
<TR>
<TD>Number of Rings:</TD>
<TD>'.$_POST['diamond'].'</TD>
</TR>
<TR>
<TD>Number of Bangles:</TD>
<TD>'.$_POST['bangles'].'</TD>
</TR>

</TABLE>';


$pdf->WriteHTML2("<br><br><br><br><br><br><br><br><br><br><br>$htmlTable");

$pdf->WriteHTML('<para>We are pleased to give you the statistics.<br>Please use the statistics for noncommercial purposes only.</para>');
$pdf->SetFont('Arial','',10);

$pdf->Cell(-110);
//$pdf->SetTextColor(integer r [, integer g] [, integer b]);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,50,'Special Notes: '.$_POST["comment"],0,1);
$pdf->cell(60);
$pdf->SetTextColor(8,2,0);

$pdf->SetFont('Arial','',20);
$pdf->cell(0,50,'Thank You!');
//$pdf->WriteHTML('.$_POST['comment'].');
//echo $_POST['comment'];
//$pdf->Image('img/type1.png',50,100,33);
$pdf->Output(); 
?>