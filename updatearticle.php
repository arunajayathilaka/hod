<?php
require_once 'init.php';
$user=$_SESSION['username'];
$lovearr[]=array('null');
$likesarr[]=array('null');
$hahaarr[]=array('null');
if(isset($_GET['search'])){
		
	$sname=$_GET['search'];
	//echo $sname;
}
else{
	$sname=" ";
}
	$sname=preg_replace("#[^0-9a-z]#i","",$sname);
	//$name="article 3";
	$articleQuery=mysqli_query($link,"SELECT * FROM articles WHERE articles.title_name LIKE '%{$sname}%'");

$likesq=mysqli_query($link,"SELECT articles_like.article_id FROM articles_like WHERE articles_like.user='{$user}'AND articles_like.type='like'");
$loveq=mysqli_query($link,"SELECT articles_like.article_id FROM articles_like WHERE articles_like.user='{$user}'AND articles_like.type='love'");
$hahaq=mysqli_query($link,"SELECT articles_like.article_id FROM articles_like WHERE articles_like.user='{$user}'AND articles_like.type='haha'");

	while($row2=mysqli_fetch_array($likesq)){
	$likesarr[]=$row2['article_id'];
	}

while($row3=mysqli_fetch_array($loveq)){
	$lovearr[]=$row3['article_id'];
}
while($row4=mysqli_fetch_array($hahaq)){
	$hahaarr[]=$row4['article_id'];
}
	while($row=mysqli_fetch_array($articleQuery)){
		$article3[]=$row;
	}
	if(@count($article3) != 0 ){
		//echo $article3[1];
		foreach($article3 as $article1){
			//echo @count($article3);
			$ser= '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <div class="thumbnail"style="background-color: rgba(230,238,255,0.5); border: 3px solid #218dfb;">
                
                    <img class="img-responsive" src="'.$article1['image_url'].'" style="height:30%;"alt="">
                
                <div class="caption">
                    <h3> '.$article1['title_name'].'</h3>
					<h5>by sg</h5>
                    <p>';
			if(in_array($article1['id'],$likesarr)){
				$s1='<a value="like" id="'.$article1['id'].'" class="btn btn-default btn-sm active" role="button"><img class="img1" src="./img/like.png" alt="" style="width:25% height:5%"></a> 
					';
			}
			else{
				$s1='<a value="like" id="'.$article1['id'].'" class="btn btn-default btn-sm" role="button"><img class="img1" src="./img/like.png" alt="" style="width:25% height:5%"></a> 
					';
			}
			$s1.='<span id="like'.$article1['id'].'" class="badge">'.$article1['likes'].'</span>';
			if(in_array($article1['id'],$lovearr)){
				$s2='<a value="love" id="'.$article1['id'].'" class="btn btn-default btn-sm active" role="button"><img class="img1" src="./img/heart.png" alt="" style="width:25% height:5%"></a>
					';
			}
			else{
				$s2='<a value="love" id="'.$article1['id'].'" class="btn btn-default btn-sm" role="button"><img class="img1" src="./img/heart.png" alt="" style="width:25% height:5%"></a>
					';
			}
			$s2.='<span class="badge">'.$article1['loves'].'</span>';
			if(in_array($article1['id'],$hahaarr)){
				$s3='<a value="haha" id="'.$article1['id'].'" class="btn btn-default btn-sm active" role="button"><img class="img1" src="./img/smile.png" alt="" style="width:25% height:5%"></a>
					';
			}
			else{
				$s3='<a value="haha" id="'.$article1['id'].'" class="btn btn-default btn-sm" role="button"><img class="img1" src="./img/smile.png" alt="" style="width:25% height:5%"></a>
					';
			}
			$s3.='<span class="badge">'.$article1['hahas'].'</span> </p>
				<div class="fb-share-button" data-href="http://188.166.179.166/hod/" data-layout="icon_link" data-mobile-iframe="true">
                                    <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
                                        Share
                                    </a>
                                </div>	
				</div>
                                
                </div>
            </div>';
			$qw="{$ser}{$s1}{$s2}{$s3}";
			echo $qw;
		}
	}
	else{
		echo '<p>not found</p>';
	}

?>