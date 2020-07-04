<?php
  include_once 'db_connection.php';
  if(isset($_POST['register']))
  {    
       $email = $_POST['email'];
       $password = $_POST['password'];
       
   
       $sql = "INSERT INTO db_login (email,password)
       VALUES ('$email','$password')";
   
       if (mysqli_query($conn, $sql)) {
          echo "Login successfully !";
        
       } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
       }
       mysqli_close($conn);
  }
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>The Login Form</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<?php
//background-image: url("background images/bg_img3.jpg");
?>

<div class="wrap" style="background-image: url('background images/bg_img11.jpg');">
        <form class="login-form" action="" method="post">
            <div class="form-header">
                <h3>Login Form</h3>
                <p>Login to access your dashboard</p>
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" class="form-input" name="email" placeholder="email@example.com">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" class="form-input" name="password" placeholder="password">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit" name="register">Login</button>
            </div>
            <div class="form-footer">
            Don't have an account? <a href="#">Sign Up</a>
            </div>
        </form>
    </div><!--/.wrap-->
</body>
</html>