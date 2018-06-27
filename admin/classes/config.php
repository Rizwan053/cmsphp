<?php 

$db = mysqli_connect('localhost','root','','cmsphp');
if(!$db){
    die('Problem in DB Connection '. mysqli_error($db));    
}


?>