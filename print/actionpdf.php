<?php
require('init.php');
require('WriteHTML.php');

if(isset($_GET['itemid'])){

 $itemid=$_GET['itemid'];
 
$desc = "select * from product_items where item_id ='{$itemid}'";
$desc_run = mysqli_query($link,$desc);
$row = mysqli_fetch_assoc($desc_run);

$p_name = $row['product_name'];
$p_type = $row['product_type'];
$p_desc = $row['product_dec'];
$p_price = $row['product_price'];
$p_image=$row['image_url'];
$p_vendor = $row['vendor_username'];

$desc1 = "select * from vendor where vendor_username ='{$p_vendor}'";
$desc_run1 = mysqli_query($link,$desc1);
$row1 = mysqli_fetch_assoc($desc_run1);

$vendor_image=$row1['image_url'];
$vendor_name=$row1['vendor_name'];


$pdf=new PDF_HTML();
//$pdf->Header();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
$pdf->Image('../'.$p_image,68,60,50);
$pdf->SetFont('Arial','',14);




$pdf->addSociete( "House Of Diamante",
                  "No.7\n" .
                  "Reed Avenue\n".
                  "Colombo 7\n" .
                  "Date : 17th Jan 2017 ");
/*$pdf->WriteHTML('<para><h1>Quotation for your designed jewellery</h1><br>
Website: <u>www.hod.lk</u></para><br><br>Follwing is the details of your design');*/
$pdf->Image('../'.$vendor_image,160,1,40);

$pdf->cell(0,50,'Dear Sir/Madam,');

$pdf->SetFont('Arial','b','16');
$pdf->WriteHTML('<para><h1>Selected Jewellery Description</h1></para>');
$pdf->SetFont('Arial','',10); 

$htmlTable='<TABLE>
<TR>
<TD>JEWELLERY VENDOR:</TD>
<TD>'.$vendor_name.'</TD>
</TR>
<TR>
<TD>PRODUCT NAME:</TD>
<TD>'.$p_name.'</TD>
</TR>
<TR>
<TD>PRODUCT TYPE:</TD>
<TD>'.$p_type.'</TD>
</TR>
<TR>
<TD>PRODUCT DESCRIPTION:</TD>
<TD>'.$p_desc.'</TD>
</TR>
<TR>
<TR>
<TD>PRODUCT PRICE:</TD>
<TD>'.$p_price.'</TD>
</TR>


</TABLE>';


$pdf->WriteHTML2("<br><br><br><br><br><br><br><br><br><br><br><br>$htmlTable");

$pdf->Cell(-110);
//$pdf->SetFont('Arial','',14);
$pdf->WriteHTML('<para>We are grateful for selecting our design. Visit our jewellery shop for more designs..!!</para>');
$pdf->SetFont('Arial','',10);

$pdf->Cell(-100);
//$pdf->SetTextColor(integer r [, integer g] [, integer b]);
$pdf->SetTextColor(255,0,0);
//$pdf->Cell(0,50,'Special Notes: ubwhbax',0,1);
$pdf->cell(60);
$pdf->SetTextColor(8,2,0);

$pdf->SetFont('Arial','',20);
$pdf->cell(-65);
$pdf->cell(0,50,'Thank You!');
//$pdf->WriteHTML('.$_POST['comment'].');
//echo $_POST['comment'];
//$pdf->Image('img/type1.png',50,100,33);
//echo 'gsf';
$pdf->Output('offer.pdf','D'); 

}
else{
    echo 'not set';
}
?>