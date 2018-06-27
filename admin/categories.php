<?php require_once('includes/header.php') ?>
<?php 
$categories = DB::find_all("categories");


if(isset($_POST['submit'])){
    $input = [$_POST['name']];
    $cat = new DB();
    $cat->create('categories',$input);

    header('location:categories.php');
}

if(isset($_POST['update'])){
    $input = [$_POST['name']];
    $cat = new DB();
    $cat->update('categories',$input,$_POST['id']);

    header('location:categories.php');
}


?>

<div class="container-fluid">
<div class="jumbotron alert-success">

<h1><i class="fas fa-paste"></i> Categories</h1>
<p>Total Categories Available on this Application.</p>
<div class="pull-right">

<form action="" method='POST' class="form-inline">
    <div class="form-group"><input type="text" name="name" class="form-control" placeholder="Add New Category" required></div>
    <div class="form-group"><input type="submit" name="submit" value="Add" class="btn btn-success"></div>
</form>

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
      <th scope="col">Name</th>
      <th scope="col">Edit</th>
      <th scope="col"></th>
      <th scope="col">Delete</th>
   

    </tr>
  </thead>
  <tbody>
  <?php while ($category = $categories->fetch_object()) : ?>
    <tr>
      <th scope="row"><?php echo $category->id ?></th>
      <td><?php echo $category->name ?></td>

      <td>
      <button class="btn btn-dark"><i class="fas fa-edit" style="display: inline-block" ></i></button>
     </td>
     <td>
      <form action="" method="POST" id=""  class=" formid  form-inline">
          <div class="form-group">
          <input type="text" name="name" class=" form-control" value="<?php echo $category->name ?>">
          <input type="hidden" name="id" value="<?php echo $category->id?>" class=" form-control">
          </div>
          <div class="form-group"><input type="submit" value="Edit" name="update" class="btn btn-dark"></div>
      </form>
     </td>
      <?php
        if (isset($_GET['id'])) {
            $del = new DB();
            $del->cascade_delete("categories", $_GET['id']);
            header('location:categories.php');


        }
        ?>
      <td><a href="categories.php?id=<?php echo $category->id ?>"><i class="fas fa-trash"></i></a></td>
    </tr>
<?php endwhile; ?>
  
  </tbody>
</table></div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>
