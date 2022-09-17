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
            //Displaying message if user not found
            if(isset($_SESSION['user_not_found'])){
                echo $_SESSION['user_not_found'];
                unset($_SESSION['user_not_found']);
            }
        ?>
        <h1 class="my-3" style="color: #49C9AF;">IM BIBLIOPHILE</h1>
        <form method="POST" action="">
            <p>
                <input type="text" name="username" placeholder="Username" required>
            </p>
            <p>
                <input type="password" name="password" placeholder="Password" id="myInput" required>
            </p>
            <p>
                <input type="checkbox" name="show"  onclick="myFunction()">   Show Password
            </p>
            <p>
                <input type="submit" name="submit" value="Continue" id="btn-green">
            </p>
            <p>Don't have an account?</p>
            <p><a href="register.php">Create Account</a></p>
            
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
    //checking whether user is registered or not
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']); 

        $sql = "select * from user where username='$username' and password='$password'";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if($count==1){
            $_SESSION['login'] = "<div class='alert alert-success'>Login Successful!</div>";
            $_SESSION['user'] = $username; // to check whether user is logged in or not
            header('location:'.SITEURL.'user/indexSidenav.php');
        }
        else{
            $_SESSION['user_not_found']= "<div class='alert alert-danger'>User Not Found! Please check if your username and password matches.</div>";
            header('location:'.SITEURL.'user/login.php');
        }
    }
?>