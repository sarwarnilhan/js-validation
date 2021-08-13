<?php

$hostname = 'localhost';
$username ='root';
$userpass ='';
$dbname ='wtg';


$con= mysqli_connect($hostname,$username,$userpass) or die('Database Connection error');

mysqli_select_db($con,$dbname);


?>