<?php require_once('includes/header.php') ?>


<?php 
if(empty($_GET['query'])){
    header('location:index.php');
}else{
    
}


?>

<?php
$posts = DB::search($_GET['query']);


?>

<div class="container ">


<?php if($posts): ?>
<div class="jumbotron alert-info" style=" box-shadow: 3px 3px 3px black; background-image: url(http://inventor.challenges.org/wp-content/uploads/sites/25/2015/11/header-image-5.jpg)">
    <h1 class="text">Result for Your Search '<?php echo $_GET['query']?>'</h1>
</div>
    <div class="row" >
        <div class="col-md-8">
        
<?php while ($post = $posts->fetch_object()) : ?>
            <div class="col-md-12 img-thumbnail" style="box-shadow: 3px 3px 3px black"> 
            <div class="content">
            <h2 class="title"><?php echo $post->title ?> </h2>
            <p class="title"><?php echo $post->date ?> </p>
      <?php $cate = DB::find_by_id('categories', $post->category_id) ?>
            <p><em>Category: </em><?php echo $cate->name ?></p>

            <img class='img-responsive img-thumbnail' src="admin/img/<?php echo $post->image ?>" alt="Image"><br><br>
            <a href="post.php?id=<?php echo $post->id ?>" class="btn text-white" style="background-color: <?php echo $color ?>">Read More</a>
            <hr>
            </div>
            </div>
            <hr>
<?php endwhile; ?>

        </div>

 




        <div class="col-md-4 img-thumbnail" style="box-shadow: 3px 3px 3px black">
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
<?php else: ?>

<div class="jumbotron alert-info" style=" box-shadow: 3px 3px 3px black; background-image: url(http://inventor.challenges.org/wp-content/uploads/sites/25/2015/11/header-image-5.jpg)">
    <h1 class="text">No Result Found for <?php echo $_GET['query']?></h1>

</div>
<?php endif; ?>
</div>


<?php require_once('includes/footer.php') ?>