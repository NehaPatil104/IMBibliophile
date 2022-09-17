<?php  
    //Authorization or Access Control
    //check whether the user is logged in or not 
    if(!isset($_SESSION['user'])){
        //user is not logged in
        //redirect to login page with message
        $_SESSION['not_login'] = "<div class='alert alert-danger'>Please login to access user panel!</div>";
        header('location:'.SITEURL.'user/login.php');
    }
?>