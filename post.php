<?php require_once('includes/header.php') ?>


<?php
$post = DB::find_by_id('posts',$_GET['id']);



?>

<div class="container">
<div class="jumbotron alert-info" style=" box-shadow: 3px 3px 3px black; background-image: url(http://inventor.challenges.org/wp-content/uploads/sites/25/2015/11/header-image-5.jpg)">

    <h1>CMS</h1>
</div>
    <div class="row">
        <div class="col-md-<?php echo $col1?>" >
            <div class="col-md-12 img-thumbnail" style="box-shadow: 3px 3px 3px black"> 
            <div class="content"><br>
            <h2 class="title text-center "><?php echo $post->title ?> </h2><br>
            <p class="title text-center ">On: <?php echo $post->date ?> </p>
            <?php $cate = DB::find_by_id('categories', $post->category_id) ?>
            <p class="title text-center "><em>Category: </em><?php echo $cate->name ?></p>

            <img class='img-responsive img-thumbnail' src="admin/img/<?php echo $post->image ?>" alt="Image"><br><br>
            <hr>

            <p><?php echo $post->body ?></p>
            </div>
            </div>

        </div>

 



<div class="col-md-<?php echo $col2 ?> img-thumbnail" style="box-shadow: 3px 3px 3px black">
      <?php $cat = DB::find_all('categories') ?>
<h4 class="text-center">Subscribe Now</h4>
<form action="" class="form" method="POST">
    <div class="form-group"><input type="text" name="username" placeholder="Your Name" class="form-control" required></div>
    <div class="form-group"><input type="email" name="email" placeholder="Your Email" class="form-control" required></div>
    <div class="form-group"><input type="submit" name="submit" value="Subscribe" class="form-control btn text-white" style="background-color: <?php echo $color ?>"></div>
</form>
      <hr>
    
            <h4 class="text-center">Categories</h4><hr>

            <div class="col-md-12">
<div id="list-example" class="list-group alert-success" style="">

            <?php while ($category = $cat->fetch_object()) : ?>

  <a style="background-color: <?php echo $color ?>" class="list-group-item list-group-item-action text-white" href="posts.php"><?php echo $category->name ?> </a><hr>
                <?php endwhile; ?>
</div>


            </div>

        </div>
    </div>
</div>


<?php require_once('includes/footer.php') ?>