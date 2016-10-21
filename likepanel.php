<?php
	require_once 'init.php';
	
	if(isset($_GET['type']) && isset($_GET['id'])){
		$type=$_GET['type'];
		$id=(int) $_GET['id'];
	
	switch($type){
			case 'like':
			$qr=mysqli_query($link,"SELECT COUNT(id) AS likes FROM articles_like WHERE user='{$_SESSION['username']}' AND article_id='{$id}' AND type='{$type}'");
								
			$row1=mysqli_fetch_array($qr);
			
			if(mysqli_query($link,"SELECT id FROM articles WHERE id='{$id}'") and $row1['likes']<1){
				@mysqli_query($link,"INSERT INTO articles_like (user,type,article_id) VALUES ('{$_SESSION['username']}','{$type}','{$id}')");
				
			}
			$articlesQuery1=mysqli_query($link,"SELECT COUNT(articles_like.id) AS likes FROM articles_like WHERE articles_like.article_id='{$id}'AND articles_like.type='like' ");
			$row2=mysqli_fetch_array($articlesQuery1);
			echo $row2['likes'];	
			break;
		
		
			case 'love':
			$qr=mysqli_query($link,"SELECT COUNT(id) AS loves FROM articles_like WHERE user='{$_SESSION['username']}' AND article_id='{$id}' AND type='{$type}'");
			
			$row1=mysqli_fetch_array($qr);
			
			if(mysqli_query($link,"SELECT id FROM articles WHERE id='{$id}'") and $row1['loves']<1){
                            mysqli_query($link,"INSERT INTO articles_like (user,type,article_id) VALUES ('{$_SESSION['username']}','{$type}','{$id}')");
				//echo $row2['loves'];
			}
			$articlesQuery1=mysqli_query($link,"SELECT COUNT(articles_like.id) AS loves FROM articles_like WHERE articles_like.article_id='{$id}'AND articles_like.type='love' ");
			$row2=mysqli_fetch_array($articlesQuery1);
			echo $row2['loves'];	
			break;
		
			case 'haha':
			$qr=mysqli_query($link,"SELECT COUNT(id) AS hahas FROM articles_like WHERE user='{$_SESSION['username']}' AND article_id='{$id}'AND type='{$type}'");
			
			$row1=mysqli_fetch_array($qr);
			
			if(mysqli_query($link,"SELECT id FROM articles WHERE id='{$id}'") and $row1['hahas']<1){
                            mysqli_query($link,"INSERT INTO articles_like (user,type,article_id) VALUES ('{$_SESSION['username']}','{$type}','{$id}')");
				//echo $row2['hahas'];
			}
			$articlesQuery1=mysqli_query($link,"SELECT COUNT(articles_like.id) AS hahas FROM articles_like WHERE articles_like.article_id='{$id}'AND articles_like.type='haha' ");
			$row2=mysqli_fetch_array($articlesQuery1);
			echo $row2['hahas'];	
			break;
		}
	}
?>