    <?php
            $page='contact';
            include('header.php');
    ?>
    <div class="container-fluid">
        <h2 style="text-align: center;">TALK TO US</h2>
    <?php
    $errors=array('only_alphabets'=>'','valid_email'=>'');
    if (isset($_POST['contact-form-submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
        if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
            $errors['only_alphabets'] = "Username must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['valid_email'] = "Please enter a valid email";
        }
        $to="nagriblog@gmail.com";
        $subject="$username send you a message from your contact form in your website";
        $message ="Name: $username\r\n";
        $message.="Email: $email\r\n";
        $message.="Message:\r\n$message";
        $message=wordwrap($message,60);
        mail($to, $subject, $message);
        ?>

        <div class="success_output">
            <h4>We received your message, we'll respond to to you as sonn as possible</h4> 
            <button class="contact_button" href="index.php">Click here to go to home page</button>
        </div>
        <?php } 
        else {?>
  		<form class="contact_form" method="POST" action="#">
            <div class="error_output">
                        <?php echo $errors['only_alphabets']; ?>
            </div>
    		<div class="form-group">
    			<input type="text" class="form-control" name="username" placeholder="Enter your name" required>
    		</div>
            <div class="error_output">
                        <?php echo $errors['valid_email']; ?>
            </div>
    		<div class="form-group">
    			<input type="text" class="form-control" name="email" placeholder="Enter your email" required>
    		</div>
    		<div class="form-group">
    			<textarea class="form-control" rows="5" type="text" name="message" placeholder="Please type your message here" required></textarea> 
      		</div>
      		<button type="submit" name="contact-form-submit" style="align-items:center">Send</button>
  		</form>
        <?php } ?>
	</div>
</body>
	<?php
		include('footer.php');
	?>
</html>