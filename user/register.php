<?php
    include('../config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/register.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>IM BIBLIOPHILE</title>
</head>
<body>
    <div class="form text-center">
        <br>
        <?php
            //displaying message if registration fails
            if(isset($_SESSION['register_failed'])){
                echo $_SESSION['register_failed'];
                unset($_SESSION['register_failed']);
            }
             //displaying message if user already exits
            if(isset($_SESSION['user_already_exits'])){
                echo $_SESSION['user_already_exits'];
                unset($_SESSION['user_already_exits']);
            }
        ?>
        <h1 class="my-3" style="color: #49C9AF;">IM BIBLIOPHILE</h1>
        <form method="POST" action="">
            <p>
                <input type="text" name="username" placeholder="Username" required>
            </p>
            <p>
                <input type="email" name="email" placeholder="Email" required>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password"  id="myInput" required>
            </p>
            <p>
                <input type="checkbox" name="show" onclick="myFunction()">   Show Password
            </p>
            <p>
                <input type="submit" name="submit" value="Continue" id="btn-green">
            </p>
            <p>Already have an account?</p>
            <p><a href="login.php">Log In</a></p>
            
        </form>
    </div>

</body>
</html>
<script>
//fuction to show the password to user if checked Show Password checkbox
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<?php 
    //inserting user data into database if user does not exits already
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, md5($_POST['password']));

        $sql = "select * from user where username='$username' and password='$password'";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if($count==0){
            $sql2 = "insert into user set
            username='$username',
            email='$email',
            password='$password'
            ";
            $res2 = mysqli_query($con,$sql2);
            if($res2){
                $_SESSION['register_successfully'] = "<div class='alert alert-success'>Registered Successfully!</div>";
                header('location:'.SITEURL.'user/indexSidenav.php');
            }
            else{
                $_SESSION['register_failed'] = "<div class='alert alert-danger'>Registeration Failed!</div>";
                header('location:'.SITEURL.'user/register.php');
            }
        }
        else{
             $_SESSION['user_already_exits'] = "<div class='alert alert-danger'>User already exits!</div>";
            header('location:'.SITEURL.'user/register.php');
        }
    }
    
?>