<?php
  include('partials/sidenav.php'); 
  $sql2 = "select * from challenge where username='$user'";
  $res2 = mysqli_query($con, $sql2);
  $count = mysqli_num_rows($res2);
  if($count == 1){
      header('location:'.SITEURL.'user/challengeProgress.php');
  }
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <?php
            //Displaying success and failure operation message
                if(isset($_SESSION['added'])){
                    echo $_SESSION['added'];
                    unset($_SESSION['added']);
                }
                if(isset($_SESSION['failed'])){
                    echo $_SESSION['failed'];
                    unset($_SESSION['failed']);
                }
              ?>
            <div class="mx-5 my-4  text-center" style="width: 450px; height: 250px; border: 3px solid #49C9AF; border-color: #49C9AF !important;">
              <form method="POST">
                  <br><br>
                  <p>I want to read <input type="number" name="bookNo"> in 2021.</p><br><br>
                  <input type="reset" name="reset" value="Cancel" class="btn btn-primary">
                  <input type="submit" name="submit" value="Update" class="btn btn-primary"><br>
              </form>
            </div>
      </div>
   <?php include('partials/toggle.php'); ?>
   <?php
      if(isset($_POST['submit'])){
        $booksnumber =  mysqli_real_escape_string($con, $_POST['bookNo']);

        $sql = "INSERT INTO challenge (username, booksnumber)
                    VALUES ('$user', '$booksnumber')";

        $res = mysqli_query($con, $sql);

        if($res){
          $_SESSION['challenge_set'] = "challenge set";
          $_SESSION['added'] = "<div class='alert alert-success mt-3'>Challenge Added Successfully!</div>";
          header('location:'.SITEURL.'user/challengeProgress.php');
        }
        else{
          $_SESSION['failed'] = "<div class='alert alert-danger mt-3'>Failed to add challenge!</div>";
          header('location:'.SITEURL.'user/readingChallenge.php');
        }
      }
   ?>