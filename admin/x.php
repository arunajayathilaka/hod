<form role="form" method="post" action="updateven.php" enctype="multipart/form-data">
                           <?php
                             require_once 'database.php';
                           $v_id = $_GET['v_id'];
                           
                           $sql = "SELECT* from vendor where id=$v_id";
                           $result = $conn->query($sql);
                           
                           while($row = $result->fetch_assoc()){
                           ?>
								<div class="form-group">
									<label>Vendor name</label>
									<input class="form-control" placeholder="Vendor name" name="vname" value="<?php echo $row['vendor_name']; ?>" required="required">
								</div>
                                <div class="form-group" style="width:70px;">
									<label>Vendor ID</label>
									<input class="form-control" placeholder="ID" name="vid" required="required" value="">
                                                                                                        
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Email</label>
									<input class="form-control" placeholder="Email" name="vmail" type="email">
								</div>
                                <div class="form-group" style="width:300px;">
									<label>Telephone</label>
									<input class="form-control" placeholder="Telephone" name="vtel" required="required" type="number">
								</div>
                                <div class="form-group">
									<label>Address</label>
									<input class="form-control" placeholder="Address" name="vadd" required="required">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Username</label>
									<input class="form-control" placeholder="Username" name="uname" required="required">
								</div>
								<div class="form-group" style="width:300px;">
									<label>Password</label>
									<input type="password" class="form-control" name="vpass" required="required">
								</div>
                                <div class="form-group">
									<label>Vendor logo</label>
									<input type="file" name="logo" value="logo" required="required">
								</div>
                                <center>
                                <button type="submit" class="btn btn-primary" id="add">Edit</button>
                                </center>
                                <br>
									
									
                        </form>
                        <?php
                        
                           }
                        ?>



onclick="location.href='index.php?v_id=<?php echo $user['id']; ?>'"




 <?php
                        
                           }
                        ?>