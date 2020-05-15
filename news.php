<?php
$page='news';
date_default_timezone_set('Africa/Kigali');
include('header.php');
include('db_connection.php')
?>
<div class="container-fluid padding">
            <div class="row padding">
                <div class="col-lg-6">
                    <h3>
                        <div style="text-align: center;">Are you planing to study in Africa?<br>If so, you are in the right place!</div><hr>
                        Bellow is a breaf description of the ALU, if you still have some questions, please do not hesitate to drop your comments down and you will get answers as soon as possible.
                        ALU is a panafrican university. ALU aims to develop 3 million ethical and entrepreneurial leaders for Africa and the world by 2035. It uses a personalized, student-driven, project-based, and mission-oriented approach to create agile, lifelong learners who can adapt to a changing world. ALU's first site was inaugurated in September 2015 in Mauritius. Its second campus was inaugurated in September 2017 in Rwanda.
                    </h3>                    
                </div>
                <div class="col-lg-6">
                    <img src="study1.jpg" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="container-fluid padding">
            <div class="row padding">
                <div class="col-12">
                    <h1 style="text-align: center;"><hr>COMMENTS</h1>
                </div>
            </div>
        </div>
        <?php
        $sql="SELECT * FROM comments";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc()){
            echo "<div class='comments'>";
                echo "Posted by: ".$row['user']."<br>";
                echo $row['comment_date']."<br>";
                echo nl2br($row['message'])."<br>";
            echo "</div>";}
        echo "<form class='comment_area' method='POST' action='validations.php'>
            <input type='hidden' name='comment_date' value='".date('Y-m-d H:i:s')."'>
            <label for='commentForm'>Write your comments, thoughts, questions bellow here</label>
            <textarea name='message' class='form-control' id='commentForm' rows='3' required></textarea>
            <br>
            <button type='submit' name='submit_comment'>Comment</button>
        </form>";
        ?>
    </body>
	<?php
		include('footer.php');
	?>
</html>