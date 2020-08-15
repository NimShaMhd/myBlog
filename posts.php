<?php include "config/config.php"?>
<?php include "libraries/Database.php"?>
<?php include "helpers/format_helper.php"?>
<?php
	//Create DB Object
	$db = new Database();
	
	//Check URL For Category
	if(isset($_GET['category'])){
		$category = $_GET['category'];
		//Create Query
		$query = "SELECT * FROM post WHERE category = ".$category;
		//Run Query
		$posts = $db->select($query);
	} else {
		//Create Query
		$query = "SELECT * FROM post";
		//Run Query
		$posts = $db->select($query);
	}
	
	

   
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>myBlog  </title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&family=Special+Elite&display=swap" rel="stylesheet">
        <link href="css/blog.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
<?php include 'includes/header.php'; ?>

<?php if($posts) : ?>
	<?php while($row = $posts->fetch_assoc()) : ?>
		<div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?></p>
				<?php echo shortenText($row['body']); ?>
                <a class="btn btn-outline-secondary readmore"  href="post.php?id=<?php echo urlencode($row['id']);?>">Read more</a>
          </div><!-- /.blog-post -->
	<?php endwhile; ?>	  
       
<?php else : ?>
	<p>There are no posts yet</p>
<?php endif; ?>		  
<?php include 'includes/footer.php'; ?>
