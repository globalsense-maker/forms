<?php 
include('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>USER Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>


<?php

  if(isset($_POST['save']))
  {
    $sql = "INSERT INTO `user_tb` (full_name, email,pwrd,repeat_pw)
    VALUES ('".$_POST["full_name"]."','".$_POST["email"]."','".$_POST["pwrd"]."','".$_POST["repeat_pw"]."')";
  
      //$result = mysqli_query($conn,$sql);

    if(mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        //echo "<a href='connect.php'> click here to proceed</a>";
	 }else {
		echo "Error: " . $sql . " " . mysqli_error($conn);
	 }
     mysqli_close($conn);
    
  }
  
  ?>

<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>

                        <form method="POST"  form action="index.php">

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="full_name" id="name" placeholder="Your Name"/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pwrd" id="pass" placeholder="Password"/>
                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repeat_pw" id="re_pass" placeholder="Repeat your password"/>
                            </div>

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="save" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>