<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <?php
            //Displaying success and failure operation message
                if(isset($_SESSION['failed_update'])){
                    echo $_SESSION['failed_update'];
                    unset($_SESSION['failed_update']);
                }
            ?>
            <div class="mx-5 my-4  text-center" style="width: 450px; height: 250px; border: 3px solid #49C9AF; border-color: #49C9AF !important;">
              <form method="POST">
                  <br><br>
                  <p>I want to read <input type="number" name="bookNo"> in 2021.</p><br><br>
                  <a href="<?php echo SITEURL; ?>user/challengeProgress.php" class="btn btn-primary">Cancel</a>
                  <input type="submit" name="submit" value="Update" class="btn btn-primary"><br>
              </form>
            </div>
      </div>
   <?php include('partials/toggle.php'); ?>
   <?php
   //Displaying data of particular book into form if user clicks update button
      if(isset($_POST['submit'])){
        $booksnumber =  mysqli_real_escape_string($con, $_POST['bookNo']);

        $sql = "update challenge set booksnumber='$booksnumber' where username='$user'";

        $res = mysqli_query($con, $sql);

        if($res){
          $_SESSION['update_challenge'] = "<div class='alert alert-success mt-3'>Challenge Updated Successfully!</div>";
                header('location:'.SITEURL.'user/challengeProgress.php');
        }
        else{
          $_SESSION['failed_update'] = "<div class='alert alert-danger mt-3'>Failed to add challenge!</div>";
          header('location:'.SITEURL.'user/updateChallenge.php');
        }
      }
   ?>