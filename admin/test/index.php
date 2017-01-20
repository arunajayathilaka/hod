<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<title>HOD|Admin Report</title>
</head>

<body>
<h2 style="margin-left:25%; color:blue;font-family: 'Oswald', sans-serif;">Community Of House Of Diamante'</h2>
<div class="container">
    <div class="column">
      <form class="contact-us form-horizontal" action="actionpdf.php" method="post">
        <legend style="font-family: 'Oswald', sans-serif;">Submit to generate PDF</legend>        
        <div class="control-group">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('vendor_username') AS vendors FROM vendor");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Number of Vendors</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i>
                    <input type="text" class="input-xlarge" name="name" value="<?php echo $rowq['vendors']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS quotations FROM customerlogin");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Number Of Users</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" class="input-xlarge" name="email" value="<?php echo $rowq['quotations']; ?>"></span>
                </div>
            </div>    
        </div>
        <div class="control-group">
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Number of Necklaces</label>
            <div class="controls">
                <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS necklaces FROM product_items WHERE product_type='necklace'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="url" class="input-xlarge" name="url" value="<?php echo $rowq['necklaces']; ?>"></span>
                </div>
            </div>
        </div>
         <div class="control-group">
             <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS rings FROM product_items WHERE product_type='ring'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Number of Rings</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="diamond" class="input-xlarge" name="diamond" value="<?php echo $rowq['rings']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS earings FROM product_items WHERE product_type='earings'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Number of earings</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="price" class="input-xlarge" name="price" value="<?php echo $rowq['earings']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <?php 
                  require_once 'database.php';
                  $likes='';
                  $select = mysqli_query($conn,"SELECT COUNT('id') AS bangles FROM product_items WHERE product_type='bangles'");
                                            
                   while($row=mysqli_fetch_array($select)){
                       $rowq=$row;
                      }
                     ?>
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Number of bangles</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-globe"></i>
                    <input type="text" id="bangles" class="input-xlarge" name="bangles" value="<?php echo $rowq['bangles']; ?>"></span>
                </div>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" style="font-family: 'Oswald', sans-serif; font-size:15;">Additional Notes</label>
            <div class="controls">
                <div class="input-prepend">
                <span class="add-on"><i class="icon-pencil"></i></span>
                    <textarea name="comment" class="span4" rows="4" cols="80" placeholder="Comment (Max 200 characters)"></textarea>
                </div>
            </div>
        </div>
        
        
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn">Cancel</button>
          </div>    
        </div>
      </form>
</div>
    </div>
    
</body>
</html>