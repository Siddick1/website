<?php
define('DB_SERVER','heroku_7e2753778461989');
define('DB_USER','baa4b258b57845');
define('DB_PASS' ,'640ff255');
define('DB_NAME', 'nagriblog');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
?>

