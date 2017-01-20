<?php
require('fpdf.php');

class PDF extends FPDF
{
  function Header()
    {
      $this->Image('logo2.png',10,8,33);
      $this->SetFont('Helvetica','B',15);
      $this->SetXY(50, 10);
      $this->Cell(0,10,'This is a header',1,0,'C');
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Helvetica','I',10);
      $this->Write (5, 'HOD');
    }
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->output();
//$pdf->Output('example2.pdf','D');
?>