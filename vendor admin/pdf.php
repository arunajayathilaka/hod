<?php
    include 'init.php';
    include 'session.php';
    require('WriteHTML.php');
    require 'master/PHPMailerAutoload.php';
    
    //select all quation details from quotation table 
    
    $sqlcomman = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
    $rescomman = mysqli_query($con,$sqlcomman);
    $rowcomman = mysqli_fetch_assoc($rescomman);
    
    //make a pdf after click the  accept and send button or reject button
    
     if(isset($_POST['clientsend'])){
         
         //pdf for accepted quotation................................................
         
         $sqlthisquota = "SELECT * FROM quotation WHERE  vendor = '{$rowcomman['vendor_name']}' AND id='{$_POST['num']}'";
         $resthisquota = mysqli_query($con,$sqlthisquota);
         $rowthisquota = mysqli_fetch_assoc($resthisquota);

        $pdf=new PDF_HTML();
        //$pdf->Header();
        $pdf->AliasNbPages();
        $pdf->SetAutoPageBreak(true, 15);

        $pdf->AddPage();
        $pdf->Image(''.$rowthisquota['image_url'],68,50,50);
        $pdf->SetFont('Arial','',14);


        $pdf->addSociete( "House Of Diamante",
                          "No.7\n" .
                          "Reed Avenue\n".
                          "Colombo 7\n" .
                          "Date : 30th Nov 2016 ");
        /*$pdf->WriteHTML('<para><h1>Quotation for your designed jewellery</h1><br>
        Website: <u>www.hod.lk</u></para><br><br>Follwing is the details of your design');*/

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
        <TD>'.$rowthisquota['metal'].'</TD>
        </TR>
        <TR>
        <TD>Metal:</TD>
        <TD>'.$rowthisquota['ring_size'].'</TD>
        </TR>
        <TR>
        <TD>Diamond:</TD>
        <TD>'.$rowthisquota['carrot_w'].'</TD>
        </TR>
        <TR>
        <TD>Jewellery type:</TD>
        <TD>'.$rowthisquota['gemstone'].'</TD>
        </TR>
        <TR>
        <TD>Jewellery type:</TD>
        <TD>'.$rowthisquota['center_cut'].'</TD>
        </TR>

        </TABLE>';


        $pdf->WriteHTML2("<br><br><br><br><br><br><br><br><br><br><br>$htmlTable");

        $pdf->WriteHTML('<para>We are pleasure to receive your design.<br>The estimated price for your jewellery is:Rs.'.$_POST['estiprice'].'.00</para>');
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(-110);
        //$pdf->SetTextColor(integer r [, integer g] [, integer b]);
        $pdf->Cell(0,50,'Special Notes: '.$_POST['additional'],0,1);
        
        
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
        $mail->Body = 'cool';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }


        

     }
     //pdf for rejected quotation
     
     if(isset($_POST['inputreject'])){
         $sqlrejectquota = "SELECT * FROM quotation WHERE  vendor = '{$rowcomman['vendor_name']}' AND id='{$_POST['inputreject']}'";
         $resrejectquota = mysqli_query($con,$sqlrejectquota);
         $rowrejectquota = mysqli_fetch_array($resrejectquota, MYSQL_ASSOC);
         
         $pdf=new PDF_HTML();
        //$pdf->Header();
        $pdf->AliasNbPages();
        $pdf->SetAutoPageBreak(true, 15);

        $pdf->AddPage();
        $pdf->Image(''.$rowrejectquota['image_url'],68,50,50);
        $pdf->SetFont('Arial','',14);


        $pdf->addSociete( "House Of Diamante",
                          "No.7\n" .
                          "Reed Avenue\n".
                          "Colombo 7\n" .
                          "Date : 30th Nov 2016 ");
        /*$pdf->WriteHTML('<para><h1>Quotation for your designed jewellery</h1><br>
        Website: <u>www.hod.lk</u></para><br><br>Follwing is the details of your design');*/

        $pdf->SetFont('Arial','b','16');
        $pdf->WriteHTML('<para><h1>Quotation for your selected jewellery</h1></para>');
        $pdf->SetFont('Arial','',10); 
        
        


        $pdf->WriteHTML2("<br><br><br><br><br><br><br><br><br><br><br>");

        $pdf->WriteHTML('<para>We are unable  to receive your design according to your quotation.</para>');
        $pdf->SetFont('Arial','',10);

        $pdf->Cell(-110);
         
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

        $mail->Subject = 'Here is the subject';
        $mail->Body = 'Price';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {
            echo '1';
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo '0';
            //echo 'Message has been sent';
        }


         
     }
    
          
?>
