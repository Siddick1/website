<?php
session_start();
include('db_connection.php');
if(isset($_SESSION['username'])) {
	session_destroy( ); 
	session_unset();
	header('location:index.php');
	exit();
} 
else { 
	echo "There is no active session";

}?>