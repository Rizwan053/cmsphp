
<?php 
ob_start();
session_start();

$color = '#'.rand(1000,9999).'FF';

$col1 = rand(8,10);
$col2 = 12-$col1;

?>

<?php require_once('config.php')?>
<?php require_once('db.php')?>