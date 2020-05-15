<?php 
$page='registration';
$errors=array('only_alphabets'=>'','valid_email'=>'','valid_password'=>'');
include('header.php');
require_once('db_connection.php');
?>
<?php
if(!isset($_SESSION['username'])){
if (isset($_POST['register_button'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $useremail = mysqli_real_escape_string($con, $_POST['useremail']);
    $userpassword = mysqli_real_escape_string($con, $_POST['userpassword']);
    if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
        $errors['only_alphabets'] = "Username must contain only alphabets and space";
    }
    elseif(!filter_var($useremail,FILTER_VALIDATE_EMAIL)) {
        $errors['valid_email'] = "Please enter a valid email";
    }
    elseif(strlen($userpassword) < 5) {
    	$errors['valid_password']="Password must be minimum of 5 characters";
    }       
    else 
    {
        if(mysqli_query($con, "INSERT INTO users(username, useremail,userpassword) VALUES('" . $username . "', '" . $useremail . "', '" . md5($userpassword) . "')")) {
            $_SESSION['username']=$username;
            header("location: login.php");
            exit();
        } else {
           echo "Error: " . $sql . "" . mysqli_error($con);
           exit();
        }
    }
}
?>
<?php }
else{
header("location:index.php");
}?>

<div class="login-page">
	<div class="form">
		<form class="login-register-form" method="post" action="#">
			<input type="text" name="username" placeholder="Enter your username" required>
			<div class="error_output">
				<?php echo $errors['only_alphabets']; ?>
			</div>
			<input type="text" name="useremail" placeholder="Enter your email" required>
			<div class="error_output">
				<?php echo $errors['valid_email']; ?>
			</div>
			<input type="password" name="userpassword" placeholder="Enter your password" required>
			<div class="error_output">
				<?php echo $errors['valid_password']; ?>
			</div>
			<button type="submit" name="register_button">Register</button>
			<p> Don't have an account? Please <a href="login.php">Login</a></p>
		</form>
	</div>
</div>
	</body>
	<?php
	include('footer.php');
	?>
</html>