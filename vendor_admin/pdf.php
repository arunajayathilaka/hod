<?php
    include 'init.php';
    include 'session.php';
    require('WriteHTML.php');
    require 'master/PHPMailerAutoload.php';
    
    //select all vendor details from vendor table 
    
    $sqlcomman = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
    $rescomman = mysqli_query($con,$sqlcomman);
    $rowcomman = mysqli_fetch_assoc($rescomman);
    
    //make a pdf after click the  accept and send button or reject button
    $date=date("Y-m-d");
     if(isset($_POST['estprice'])){
         
         //pdf for accepted quotation................................................
         
         $sqlthisquota = "SELECT * FROM quotation WHERE  vendor = '{$rowcomman['vendor_username']}' AND id='{$_POST['num']}'";
         $resthisquota = mysqli_query($con,$sqlthisquota);
         $rowthisquota = mysqli_fetch_assoc($resthisquota);

        $pdf=new PDF_HTML();
        //$pdf->Header();
        $pdf->AliasNbPages();
        $pdf->SetAutoPageBreak(true, 15);

        $pdf->AddPage();
        $pdf->Image(''.'../'.$rowthisquota['image_url'],68,50,50);
        $pdf->SetFont('Arial','',14);


        $pdf->addSociete( "House Of Diamante",
                          "No.7\n" .
                          "Reed Avenue\n".
                          "Colombo 7\n" .
                          "Date :".$date);
        /*$pdf->WriteHTML('<para><h1>Quotation for your designed jewellery</h1><br>
        Website: <u>www.hod.lk</u></para><br><br>Follwing is the details of your design');*/
        $pdf->cell(0,50,'Dear Sir/Madam,');

        $pdf->SetFont('Arial','b','16');
        $pdf->WriteHTML('<para><h1>Quotation for your selected jewellery</h1></para>');
        $pdf->SetFont('Arial','',10); 
        $pdf->WriteHTML2("<br><br><br><br><br><br><br><br><br><br><br>");
        $htmlTable='<TABLE>
        <TR>
        <TD>Jewellery type:</TD>
        <TD>'.$rowthisquota['item_type'].'</TD>
        </TR>
        <TR>
        <TD>Size:</TD>
        <TD>'.$rowthisquota['ring_size'].'</TD>
        </TR>
        <TR>
        <TD>Metal:</TD>
        <TD>'.$rowthisquota['metal'].'</TD>
        </TR>
        <TR>
        <TD>Carrot Weight:</TD>
        <TD>'.$rowthisquota['carrot_w'].'</TD>
        </TR>
        <TR>
        <TD>Gemstone:</TD>
        <TD>'.$rowthisquota['gemstone'].'</TD>
        </TR>
        <TR>
        <TD>Center Cut:</TD>
        <TD>'.$rowthisquota['center_cut'].'</TD>
        </TR>

        </TABLE>';


        $pdf->WriteHTML2("<br><br><br><br>$htmlTable");

        $pdf->WriteHTML('<para>We are pleasure to receive your design.<br>The estimated price for your jewellery is:Rs.'.$_POST['estprice'].'.00</para>');
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(-110);
        //$pdf->SetTextColor(integer r [, integer g] [, integer b]);
        $pdf->SetTextColor(255,0,0);
        $pdf->Cell(0,50,'Special Notes: '.$_POST['additional'],0,1);
        $pdf->SetTextColor(8,2,0);
        
        $pdf->Cell(55);
        $pdf->SetFont('Arial','',20);
        $pdf->cell(0,50,'Thank You!');
        
        
        //send an email to the client with accepted quatation
        
        $pdfoutputfile = 'pdfs/'.$rowthisquota['full_name'].'pdf';
        $pdfdoc = $pdf->Output($pdfoutputfile, 'F');
        $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kosalapeiris1@gmail.com';                 // SMTP username
        $mail->Password = 'Ishangg1115191121';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->From = 'kosalapeiris1@gmail.com';
        $mail->FromName = 'Mailer';
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('kosalapeiris1@gmail.com');               // Name is optional
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        
        $mail->AddAttachment($pdfoutputfile, 'Quotaion.pdf');  // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Quataton Reply Form '.$rowcomman['vendor_name'].'';
        $mail->Body = ' ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $price = $_POST['estprice'];
        $querynoti = "INSERT INTO notification(date,vendor,customer,jewel_type,size,metal,diamond,price,jewel_image,    description) VALUES('$date','{$rowthisquota['vendor']}','{$rowthisquota['username']}','{$rowthisquota['item_type']}','{$rowthisquota['ring_size']}','{$rowthisquota['metal']}','{$rowthisquota['gemstone']}','$price','{$rowthisquota['image_url']}','We are pleasure to receive your design.')";
        mysqli_query($con, $querynoti);
        if (!$mail->send()) {
              echo 'Message could not be sent.';
           // echo 'Mailer Error: ' . $mail->ErrorInfo;
            
            
        } else {
            echo "Successfully Sent.";
        }


        

     }
     //pdf for rejected quotation
     
     if(isset($_POST['inputreject'])){
         $sqlrejectquota = "SELECT * FROM quotation WHERE  vendor = '{$rowcomman['vendor_username']}' AND id='{$_POST['inputreject']}'";
         $resrejectquota = mysqli_query($con,$sqlrejectquota);
         $rowrejectquota = mysqli_fetch_assoc($resrejectquota);
         
         $pdf=new PDF_HTML();
        //$pdf->Header();
        $pdf->AliasNbPages();
        $pdf->SetAutoPageBreak(true, 15);

        $pdf->AddPage();
        $pdf->Image(''.'../'.$rowrejectquota['image_url'],68,50,50);
        $pdf->SetFont('Arial','',14);


        $pdf->addSociete( "House Of Diamante",
                          "No.7\n" .
                          "Reed Avenue\n".
                          "Colombo 7\n" .
                          "Date :".$date);
        /*$pdf->WriteHTML('<para><h1>Quotation for your designed jewellery</h1><br>
        Website: <u>www.hod.lk</u></para><br><br>Follwing is the details of your design');*/
        $pdf->cell(0,50,'Dear Sir/Madam,');
        $pdf->SetFont('Arial','b','16');
        $pdf->WriteHTML('<para><h1>Quotation for your selected jewellery</h1></para>');
        $pdf->SetFont('Arial','',10); 
        
        


        $pdf->WriteHTML2("<br><br><br><br><br><br><br><br><br><br><br><br>");

        $pdf->WriteHTML('<para>We are sorry!!! We are unable to fulfill your requirement .</para>');
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(-110);
        $pdf->SetTextColor(8,2,0);

        $pdf->Cell(55);
        $pdf->SetFont('Arial','',20);
        $pdf->cell(0,50,'Thank You!');
         
        $pdfoutputfile = 'pdfs/'.$rowrejectquota['full_name'].'pdf';
        $pdfdoc = $pdf->Output($pdfoutputfile, 'F');
        $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        
        //send an email with rejected quotaion pdf..........................................................................
        
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kosalapeiris1@gmail.com';                 // SMTP username
        $mail->Password = 'Ishangg1115191121';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->From = 'kosalapeiris1@gmail.com';
        $mail->FromName = 'Mailer';
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('kosalapeiris1@gmail.com');               // Name is optional
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        
        $mail->AddAttachment($pdfoutputfile, 'Quotaion.pdf');  // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Quataton Reply Form '.$rowcomman['vendor_name'].'';
        $mail->Body = ' ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $querynoti = "INSERT INTO notification(date,vendor,customer,jewel_type,size,metal,diamond,price,jewel_image,    description) VALUES('$date','{$rowrejectquota['vendor']}','{$rowrejectquota['username']}','{$rowrejectquota['item_type']}','{$rowrejectquota['ring_size']}','{$rowrejectquota['metal']}','{$rowrejectquota['gemstone']}','0','{$rowrejectquota['image_url']}','We are sorry!!! We are unable to fulfill your requirement.')";
        mysqli_query($con, $querynoti);
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo "Successfully Sent";
            
            
            
        }


         
     }
    
          
?>
