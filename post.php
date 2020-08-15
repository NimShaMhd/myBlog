<?php include "config/config.php"?>
<?php include "libraries/Database.php"?>
<?php include "helpers/format_helper.php"?>
<?php
    $id=$_GET['id'];

    //db object 
    $db= new Database();

    //create query
    $query="SELECT * FROM post WHERE id=".$id;

    //run query
    $post=$db->select($query)->fetch_assoc();

    //creat query
    $query="SELECT * FROM category";
    //run query
    $categories=$db->select($query);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>myBlog | <?php echo $post['title']; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&family=Special+Elite&display=swap" rel="stylesheet">
        <link href="css/blog.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php include "includes/header.php"?>
            <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
                <p class="blog-post-meta"><?php echo formatDate($post['date']); ?></p>
                <?php echo $post['body']; ?>       
            </div><!-- /.blog-post -->	      
            <?php include 'includes/footer.php'; ?>
        </div>
    </body>
</html>
