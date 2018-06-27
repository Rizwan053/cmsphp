<?php
require_once('admin/classes/init.php');
if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    header('location:/cms/index.php');
}


?>