<?php

$usr = $_POST['user'];
$pwrd = $_POST['pass'];


require('dbcon.php')

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);
    
?>