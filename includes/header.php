<?php require_once('admin/classes/init.php') ?>

<?php 
if(isset($_POST['submit'])){
$input = [$_POST['username'],$_POST['email']];
$subs =new DB();
$subs->create('users',$input);
// header('location:index.php');
  echo "  <script> alert('Subscribe Successfully!');document.location='index.php'</script>";


}

if(isset($_POST['search'])){
header("location:search.php?query={$_POST['query']}");
}

?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body style="background-image: url(http://longwallpapers.com/Desktop-Wallpaper/sky-wallpapers-hd-For-Desktop-Wallpaper.jpg)">

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: <?php echo $color ?>">
  <a class="navbar-brand" href="/cms/index.php">CMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/cms/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories     
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php $cat = DB::find_all('categories');
        while($category = $cat->fetch_object()):
        ?>
          
          <a class="dropdown-item" href="#"><?php echo $category->name ?></a>
          <div class="dropdown-divider"></div>

        <?php endwhile; ?>

        </div>

      </li>
  
    </ul>
  
    <ul class="navbar-nav pull-right">
    <?php if(isset($_SESSION['username'])):?>
        <li class="nav-item">
        <a href="logout.php" class="nav-link ">Log Out</a>
        </li>
        <?php endif;  ?>
    </ul>
      <form class="form-inline my-2 my-lg-0" method="POST">
      <input class="form-control mr-sm-2" type="search" name="query" placeholder="Type your Search" aria-label="Search">
      <button class="btn btn-light my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
</nav>
