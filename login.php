<?php require_once('includes/header.php') ?>


<?php
if(isset($_POST['login'])){
    if($_POST['username']==='rizwan' && $_POST['password']==="password"){
        $_SESSION['username'] = $_POST['username'];
        header('location:admin/index.php');
    }
}





?>

<div class="container">

<div style="background-color: <?php echo $color ?> "class="jumbotron text-white">
    <h1>Login</h1>
    <p>Fill All Field Required:</p>
</div>

    <div class="row justify-content-center">
     <div class="col-md-6">
     <form action="" class="img-thumbnail" method="POST">
         <div class="form-group"><input type="text" name="username" class="form-control" placeholder="Username"></div>
         <div class="form-group"><input type="password" name="password" class="form-control" placeholder="Password"></div>
         <div class="form-group"><input type="submit" name="login" value="Login" class="form-control btn text-white" style="background-color: <?php echo $color ?>" ></div>
     </form>
     
     </div>  
    </div>
</div>


<?php require_once('includes/footer.php') ?>