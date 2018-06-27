<?php require_once('includes/header.php') ?>
<?php 
if(isset($_POST['submit'])){
        $name = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $input = [$_POST['category_id'],$_POST['title'], $_POST['date'], $name, $_POST['body']];
        $posts = new DB();
        $posts->create("posts", $input);
        move_uploaded_file($tmp, "img/" . $name);

        header('location:./posts.php');
}

?>

<div class="container-fluid">
<div class="jumbotron alert-success">

<h1><i class="fas fa-paste"></i> Add NewPosts</h1>
<p>Fill Required Field Given Below.</p>
<div class="pull-right">
<a href="./posts.php" class="btn btn-success">Back To Posts</a>

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
<form action="" class="img-thumbnail" method="POST" enctype=multipart/form-data>
    <div class="form-group">Title:<input type="text" name="title" class="form-control"  required></div>
    <div class="form-group">Date of Post:<input type="date" name="date" class="form-control" required></div>
    <div class="form-group">Select Category:
        <select name="category_id" id="" required>
        <option value="">Choose Property</option>
        <?php 
        $category = DB::find_all('categories');
        while($cat= $category->fetch_object()): 
        ?>
            <option value="<?php echo $cat->id?>"><?php echo $cat->name?></option>
        <?php endwhile;?>
        </select>
    </div>
    <div class="form-group">Upload Image:<input type="file" name="image" class="form-control" required></div>
    <div class="form-group">Body:<textarea name="body" id="" cols="30" rows="10" class="form-control" required></textarea></div>
    <div class="form-group"><input type="submit" name="submit" value="Add" class="btn btn-success"></div>
</form>

</div>
            </div>
        </div>
    </div>
</div>

<?php require_once('includes/footer.php') ?>
