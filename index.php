<?php include "config/config.php"?>
<?php include "libraries/Database.php"?>
<?php include "helpers/format_helper.php"?>
<?php
  $db=new Database();

  //create query
  $query="SELECT * FROM post";

  //run query
  $posts=$db->select($query);

  //create query for category
  $query="SELECT * FROM category";

  //run query for catgory
  $category=$db->select($query);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>myBlog | Nimsha Mohammed</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&family=Special+Elite&display=swap" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <?php include "includes/header.php"?>
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        <?php if($category):?> 
          <?php while($row=$category->fetch_assoc()):?> 
            <a class="p-2 text-muted" href="posts.php?category=<?php echo $row['id'];?>"><?php echo $row['name'];?></a>
          <?php endwhile;?>
        </nav>
          <?php else:?>
          <p>There is no categories yet.</p>
        <?php endif;?>
      </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>

      

    <main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">

        <?php if($posts): ?>
          <?php while($row=$posts->fetch_assoc()):?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']);?> </p>
            <p><?php echo shortenText($row['body']);?></p>
            <a class="btn btn-outline-secondary readmore"  href="post.php?id=<?php echo urlencode($row['id']);?>">Read more</a>
           </div><!-- /.blog-post -->
           
          <?php endwhile;?>
         
          
        </div><!-- /.blog-main -->
        <?php else: ?>
          <p>There are no new posts</p>
        <?php endif; ?>

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About myBlog</h4>
            <p class="mb-0"><?php echo $aboutme;?></p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
            </ol>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Find me </h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->
    <?php include "includes/footer.php"?>
  </body>
</html>
