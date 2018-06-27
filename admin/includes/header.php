<?php require_once('classes/init.php') ?>
<?php
if(empty($_SESSION['username'])){
  header('location:../login.php');
}
?> 
<style>
form.formid{
  display: none;
  
}

</style>

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
<body>

 <nav class="navbar navbar-expand-lg  navbar-dark bg-success">
      <a class="navbar-brand" href="../index.php">CMS </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">


    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <a href="index.php" class="nav-link">Dashboard</a>
      </li>
       
    </ul>
    <ul class=" navbar-nav  pull-right">
    <?php if (isset($_SESSION['username'])) : ?>
        <li class="nav-item">
        <a href="../logout.php" class="nav-link ">Log Out</a>
        </li>
        <?php endif; ?>
    </ul>
    </div>
  </nav>