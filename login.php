<?php 
$page='login';
$errors=array('login_validation'=>'');
include('header.php');
require_once('db_connection.php');
?>
<?php
if(!isset($_SESSION['username'])){
if (isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $userpassword = mysqli_real_escape_string($con, $_POST['userpassword']);
    $userpassword =md5($_POST['userpassword']);
	$ret= mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND userpassword='$userpassword'");
	$num=mysqli_fetch_array($ret);
	if(is_array($num))
	{
		$_SESSION['username']=$username;
     	header("location:index.php");
     	exit();
    } 
    else {
    	$errors['login_validation']="Username and password do not match, please try again!";
    }
    ?>
<?php }
}
else{
header("location:index.php");
}?>
<div class="login-page">
	<div class="form">
		<form class="login-register-form" method="POST" action="#">
			<div class="error_output">
				<?php echo $errors['login_validation']; ?>
			</div>
			<input type="text" name="username" placeholder="Enter your username" required>
			<input type="password" name="userpassword" placeholder="Enter your password" required>
			<button type="submit" name="login_user">Login</button>
			<p> Don't have an account? Please <a href="registration.php">Register</a></p>
		</form>
	</div>
</div>
	</body>
	<?php
	include('footer.php');
	?>
</html>