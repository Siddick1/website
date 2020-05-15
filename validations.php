<?php 
session_start();
date_default_timezone_set('Africa/Kigali');
require_once('db_connection.php');
if(isset($_POST['submit_comment']))
{
    if(isset($_SESSION['username']))
    {
        $comment_date=$_POST['comment_date'];
        $message=$_POST['message'];
        mysqli_query($con, "INSERT INTO comments(user,comment_date,message) VALUES('".$_SESSION['username']."','".$comment_date."','".$message."')");
        header('location:index.php');
    }
    else{header('location:login.php');}
}
?>