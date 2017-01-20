<?php
    require 'init.php';
    
    
    $sqlcomman = "SELECT * FROM customerlogin WHERE email='{$_SESSION['emailn']}'";
    $rescomman = mysqli_query($link,$sqlcomman);
    $rowcomman = mysqli_fetch_assoc($rescomman);
    if(isset($_POST['inputcus'])){
        $loadcustomersql = "SELECT * FROM vendor WHERE vendor_username='{$_POST['inputcus']}'";
        $rescustomer = mysqli_query($link,$loadcustomersql);
        $imgcus = mysqli_fetch_assoc($rescustomer);
        
        
        
        $sender = $rowcomman['username'];
       // echo $_POST['inputcus'];
        $receiver = $_POST['inputcus']; 
        $query ="SELECT chat.sender,chat.receiver,chat.message,chat.updated_time,chat.updated_date FROM chat WHERE chat.sender='{$sender}' AND chat.receiver='{$receiver}' OR chat.sender='{$receiver}' AND chat.receiver='{$sender}'";
        $run =mysqli_query($link,$query);

        $count = mysqli_num_rows($run);
                //echo $count;
        $messages=null; 
        while($message =mysqli_fetch_array($run)){
                $messages[] = $message; 
        }
        if($count>0){
        foreach($messages as $mess){
            if($mess['sender']==$sender){
            $me= '<li class="media">
                    <div class="media-body">

                            <div class="media">
                                    <a class="pull-right" href="#">
                                            <img class="media-object img-circle " style="height:40px;width:40px;" src="'.$rowcomman['pro_pic'].'" />
                                    </a>
                                    <div class="pull-right" class="media-body" >
                                    '.$mess['message'].'
                                    <br />
                                    <small class="text-muted">'.$mess['sender'].'| '.$mess['updated_date'].' at '.$mess['updated_time'].' </small>

                                </div>
                        </div>

                    </div>
                </li> 
	<hr />';
        $messa = "{$me}";
        echo $messa;
            
        }else{
            $me = '<li class="media">

		<div class="media-body">

			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object img-circle " style="height:40px;width:40px;" src="'.$imgcus['image_url'].'" />
				</a>
				<div class="media-body" >
				'.$mess['message'].'
				<br />
				<small class="text-muted">'.$mess['sender'].'| '.$mess['updated_date'].' at '.$mess['updated_time'].'</small>
				
			    </div>
			
		    </div>

		</div>
	</li> 
	<hr />';
            $messa = "{$me}";
            echo $messa; 
        }
      }
     }
     $queryupmessage = "UPDATE chat set view='yes' WHERE receiver='$sender'";
     $resupmessage = mysqli_query($link, $queryupmessage);
     
     
    }
    if(isset($_POST['mes'])&& isset($_POST['to'])){
        $sender =  $rowcomman['username'];
        $receiver= $_POST['to'];
        $messageinp = $_POST['mes']; 
                
        if(!empty($sender) && !empty($receiver) && !empty($messageinp)){
			$sender =mysqli_real_escape_string($link,$sender);
			$messageinp =mysqli_real_escape_string($link,$messageinp);
			$receiver =mysqli_real_escape_string($link,$receiver);
			$date=date("Y-m-d");
			date_default_timezone_set("Asia/Colombo");
			$time=date("h:i:sa");
			$query ="INSERT INTO chat(sender,receiver,message,updated_date,updated_time) VALUES('{$sender}','{$receiver}','{$messageinp}','{$date}','{$time}')";
			
			if($run=mysqli_query($link,$query)){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
    }
?>