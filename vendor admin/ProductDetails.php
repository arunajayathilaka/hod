<?php

    //select the vendor    
    require 'init.php';
    require 'session.php';
    $uppname=$upptype=$uppdis=$uppprice=$upurl=$in="";
    $sqlcomman = "SELECT * FROM vendor WHERE vendor_email='{$_SESSION['login_user']}'";
    $rescomman = mysqli_query($con,$sqlcomman);
    $rowcomman = mysqli_fetch_assoc($rescomman);
    
    
    //.................................................................................................................
    //for juwelery details
    
    //for update perticuler juwelery item details 
    if(isset($_POST['updateddetails'])){
        $filetmp = $_FILES['pimage']['tmp_name'];
        $filename =$_FILES['pimage']['name'];
        $filetype = $_FILES['pimage']['type'];
        $filepath = "img/vendor images/".$filename;
        //echo $_POST['pname']."</br>";
        //echo $_POST['index']."</br>";
        //echo $_POST['ptype']."</br>";
        //echo $_POST['pdis']."</br>";
        //echo $_POST['pprice']."</br>";
        //echo $filepath;
        move_uploaded_file($filetmp, $filepath);
        if(isset($_POST['pname'])&&isset($_POST['ptype'])&&isset($_POST['pprice'])&&isset($_POST['pdis'])&& $filepath){
            echo "athule";
            $sql6 = "UPDATE product_items SET product_name='{$_POST['pname']}',product_type='{$_POST['ptype']}',product_dec='{$_POST['pdis']}',product_price='{$_POST['pprice']}',image_url='$filepath' WHERE  item_id={$_POST['index']}";
                    
        
            echo "".mysqli_query($con,$sql6);
            
        }
    }
    //insert a item to juwelery page
    if(isset($_POST['upload'])){
        
        $filetmp = $_FILES['proimage']['tmp_name'];
        $filename =$_FILES['proimage']['name'];
        $filetype = $_FILES['proimage']['type'];
        $filepath = "img/vendor images/".$filename;
        move_uploaded_file($filetmp, $filepath);
        $sqlupload = "INSERT INTO  product_items (product_name,product_type,product_dec,product_price,image_url,vendor_username) VALUES('{$_POST['proname']}','{$_POST['protype']}','{$_POST['prodis']}','{$_POST['proprice']}','$filepath','{$rowcomman['vendor_name']}')";
        mysqli_query($con,$sqlupload);
        
    }
    
    //delete  product from juwelery page
    if(isset($_POST['id'])){
        $data = json_decode(stripslashes($_POST['id']));
        foreach($data as $d){
            $sql12 = "DELETE  FROM product_items WHERE item_id = $d ";
            mysqli_query($con,$sql12);
        }
            
            
        
    }
    
    
    //...................................................................................................................
    
    //for quation details
    //change database after clicking view button 
    if(isset($_POST['view'])){
        $ql4 = "UPDATE quotation set view='yes' WHERE  id= {$_POST['view']}";
        mysqli_query($con,$ql4);
    }
    //delete  product from table page
    if(isset($_POST['tid1'])){
        $data = $_POST['tid1'];
        foreach($data as $d){
            $sqldeltable = "DELETE  FROM quotation WHERE id = $d ";
            mysqli_query($con,$sqldeltable);
        }       
    }
    
?>