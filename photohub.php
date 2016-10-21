<?php

require_once 'init.php';

$user=$_SESSION['username'];
$articlesQuery1=mysqli_query($link,"SELECT * FROM articles");

/*$articlesQuery2=mysql_query("SELECT articles.id,articles.title_name,COUNT(articles_love.id) AS loves FROM articles
LEFT JOIN articles_love ON articles.id = articles_love.article_id GROUP BY articles.id");

$articlesQuery3=mysql_query("SELECT articles.id,articles.title_name,COUNT(articles_haha.id) AS hahas FROM articles
LEFT JOIN articles_haha ON articles.id = articles_haha.article_id GROUP BY articles.id");
*/
$likesq=mysqli_query($link,"SELECT articles_like.article_id FROM articles_like WHERE articles_like.user='{$user}' AND articles_like.type='like'");
$loveq=mysqli_query($link,"SELECT articles_like.article_id FROM articles_like WHERE articles_like.user='{$user}' AND articles_like.type='love'");
$hahaq=mysqli_query($link,"SELECT articles_like.article_id FROM articles_like WHERE articles_like.user='{$user}'AND articles_like.type='haha'");

while($row1=mysqli_fetch_array($articlesQuery1)){
	$articles1[]=$row1;
}

$row2=mysqli_num_rows($likesq);
	
if($row2==0){
		$likesarr=array("null");
		echo 'kosala';
	}
	else{
	while($row2=mysqli_fetch_array($likesq)){
	$likesarr[]=$row2['article_id'];
	}
	}

$row3=mysqli_num_rows($loveq);
	if($row3==0){
		$lovearr=array("null");
		echo 'dfg';
	}
	else{
	while($row3=mysqli_fetch_array($loveq)){
	$lovearr[]=$row3['article_id'];
		}
	}

$row4=mysqli_num_rows($hahaq);
	if($row4==0){
		$hahaarr=array("null");
		echo 'sdd';
	}
	else{
		while($row4=mysqli_fetch_array($hahaq)){
	$hahaarr[]=$row4['article_id'];
	}
	}

//echo '<pre>',print_r($articles1,true),'<pre>';

?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Photohub</title>

    <!-- Bootstrap Core CSS -->
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:#E1E1E1; background-size: 100% 100%;" >

		<?php 
		if(isset($_SESSION['er']) && $_SESSION['er']=="true"){$_SESSION['er1']="true";}
		else{$_SESSION['er1']="false";}?>
		<?php include 'template/menu.php' ?>
		
	    <?php include 'template/headnav.php';?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">
			
            <div class="col-lg-12">
                <h1 class="text-center" style="color:white;">Diamante Photohub</h1>
				
            </div>
			
			<form class="navbar-form" role="search">
								<div class="input-group">
								  <input class="form-control" id="search" style="color:"placeholder="Search">
								  <div class="input-group-btn">
									<button href=""id="go"class="btn btn-info" type="button">GO!</button>
									
								  </div>
								
								</div>
								 <button class="btn btn-info pull-right" style="margin-right:10px; margin-top:5px;">Recent</button>
								 <button class="btn btn-info pull-right" style="margin-right:10px; margin-top:5px;">Most</button>
			</form>
			<br>
			<hr>
			<div id="article">
			
			<?php foreach($articles1 as $article1):?>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <div class="thumbnail"style="background-color: rgba(230,238,255,0.5); border: 3px solid #218dfb;">
                
                    <img class="img-responsive" src="<?php echo $article1['image_url']; ?>" style="height:30%;" alt="">
                
                <div class="caption">
                    <h3><?php echo $article1['title_name']; ?></h3>
					<h5>by <?php echo $article1['username']; ?></h5>
                    <p>
					
					<?php if(in_array($article1['id'],$likesarr)):?>
					<a value="like" id="<?php echo $article1['id']; ?>" class="btn btn-default btn-sm active" role="button"><img class="img1" src="./img/like.png" alt="" style=""></a> 
					
					<?php else: ?>
					<a value="like" id="<?php echo $article1['id']; ?>" class="btn btn-default btn-sm" role="button"><img class="img1" src="./img/like.png" alt="" style=""></a> 
					
					<?php endif; ?>
					<?php $sid="like";
                                            $sid.=$article1['id'];
                                        ?>
					<span id="<?php echo $sid; ?>" class="badge"><?php echo $article1['likes']; ?> </span>
					
					<?php if(in_array($article1['id'],$lovearr)):?>
					<a value="love" id="<?php echo $article1['id']; ?>" class="btn btn-default btn-sm active" role="button"><img class="img1" src="./img/heart.png" alt="" style=""></a>
					
					<?php else: ?>
					<a value="love" id="<?php echo $article1['id']; ?>" class="btn btn-default btn-sm" role="button"><img class="img1" src="./img/heart.png" alt="" style=""></a>
					
					<?php endif; ?>
					
					<?php $sid="love";
                                            $sid.=$article1['id'];
                                        ?>
					
					<span id="<?php echo $sid; ?>" class="badge"><?php echo $article1['loves']; ?></span>
					
					<?php if(in_array($article1['id'],$hahaarr)):?>
					<a value="haha" id="<?php echo $article1['id']; ?>" class="btn btn-default btn-sm active" role="button"><img class="img1" src="./img/smile.png" alt="" style=""></a>
					
					<?php else: ?>
					<a value="haha" id="<?php echo $article1['id']; ?>" class="btn btn-default btn-sm" role="button"><img class="img1" src="./img/smile.png" alt="" style=""></a>
					
					<?php endif; ?>
					
                                        <?php $sid="haha";
                                            $sid.=$article1['id'];
                                        ?>
					<span id="<?php echo $sid; ?>" class="badge"><?php echo $article1['hahas']; ?></span>
					</p>
					
				</div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
		</div>
        <hr>
		<div class="col-md-12 text-center" id="paging" style="margin-bottom:40px">
		<ul class="pagination" >
			<?php $w=sizeof($articles1)/8;
				if(sizeof($articles1)%8!=0){
					$w++;
				}?>
			<?php for($r=1;$r<=$w;$r++):?>
			<li><a id=<?php echo $r; ?>><?php echo $r; ?></a></li>
			<?php endfor; ?>
		</ul>
		</div>
        
        

    </div>
    <!-- /.container-->
	
	<!-- Footer -->
	<footer class="container1">
		<?php include 'footer.php';?>		
	</footer>
	
	<!-- jQuery -->
	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/photohub.js"></script>
    <!-- Bootstrap Core JavaScript -->
	
    <script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
	$('#paging ul li a').on('click',function(){
		var value=$(this).attr('id');
		//alert(value);
		
		
	});
	function articlefun(){
	$('#article p a').on('click',function(){
		var value=$(this).attr('value');
		var ide=$(this).attr('id');
		var sid="#"+value;
		sid+=ide;
		 $(this).addClass('active');
		//alert(sid);
		$.ajax({
			url:'likepanel.php',
			
			data:{type: value,id: ide},
			success:function(data){
				//location.reload();
				//alert(data);
				//var ty=$(this).find('span');
				//alert(sid);
				$(sid).html(data);
                                //alert(ere);
				//alert($(sid).text());
			}
		});
		
		
		return false;
		});
	}
	articlefun();
	$('#go').on('click', function () {
	var sname=$('#search').val();
	//var path="http://localhost:81/hod/photohub.php?";
	//alert(sname);
	//var current="updatearticle.php?search=";
	//current+=sname;
	//path+=current;
	$.ajax({
				url:'updatearticle.php?search='+sname,
				method:'GET',
				//data:{sname: sname},
				success:function(data){
					
					$('#article').html(data);
					//location.href=path;
					//alert(location.href);
					articlefun();
					//window.location = url;
				}
			});
	});
	});
	</script>
    
    

</body>

</html>

