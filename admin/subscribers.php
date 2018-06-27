<?php require_once('includes/header.php') ?>
<?php 
$users = DB::find_all("users");
?>

<div class="container-fluid">
<div class="jumbotron alert-success">

<h1><i class="fas fa-paste"></i> Subscribers</h1>
<p>Total Subscribers: <?php echo count($users->fetch_array())?></p>

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
      <th scope="col">Email</th>
      <th scope="col">Delete</th>
   

    </tr>
  </thead>
  <tbody>
  <?php while ($user = $users->fetch_object()) : ?>
    <tr>
      <th scope="row"><?php echo $user->id ?></th>
      <td><?php echo $user->username ?></td>
      <td><?php echo $user->email ?></td>

     
     
      <?php
        if (isset($_GET['id'])) {
            $del = new DB();
            $del->delete("users", $_GET['id']);
            header('location:users.php');


        }
        ?>
      <td><a href="users.php?id=<?php echo $user->id ?>"><i class="fas fa-trash"></i></a></td>
    </tr>
<?php endwhile; ?>
  
  </tbody>
</table></div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>
