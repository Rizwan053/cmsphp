<?php require_once('includes/header.php') ?>
<?php 
$posts = DB::find_all("posts");




?>

<div class="container-fluid">
<div class="jumbotron alert-success">

<h1><i class="fas fa-paste"></i> Posts</h1>
<p>Total Posts Available on this Application.</p>
<div class="pull-right">
<a href="new_post.php" class="btn btn-success">Add New Posts</a>

</div>
</div>
    <div class="row">

        <div class="col-md-2">
<?php require_once('includes/sidebar.php') ?>

            <div class="col-md-12">
            </div>
        </div>
        <div class="col-md-10">


            <div class="col-md-12">
<div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope="col">Date</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php while($post = $posts->fetch_object()) :?>
    <tr>
      <th scope="row"><?php echo $post->id ?></th>
      <?php $cate = DB::find_by_id('categories',$post->category_id)?>
      <th scope="row"><?php echo $cate->name ?></th>
      <td><?php echo $post->title ?></td>
      <td><img width=50 height=50 src="img/<?php echo $post->image ?>" alt=""> </td>
      <td><?php echo $post->date ?></td>
      <td><a href="edit_post.php?id=<?php echo $post->id?>"><i class="fas fa-edit"></i></a></td>
      <?php
        if (isset($_GET['id'])) {
            $del = new DB();
            $del->delete("posts", $_GET['id']);
            unlink("img/".$post->image);
            header('location:posts.php');


        }
      ?>
      <td><a href="posts.php?id=<?php echo $post->id?>"><i class="fas fa-trash"></i></a></td>
    </tr>
<?php endwhile; ?>
  
  </tbody>
</table></div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>
