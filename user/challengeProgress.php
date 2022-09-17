<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <?php
                if(isset($_SESSION['update_challenge'])){
                    echo $_SESSION['update_challenge'];
                    unset($_SESSION['update_challenge']);
                }
           ?>
              <?php
              //Displaying only those books which are read between only one year and then showing a progress bar accordingly
                  $sql = "select * from booksread where username='$user' and date between '2021-01-01' and '2021-12-31'";
                  $res = mysqli_query($con, $sql);
                  $count = mysqli_num_rows($res);
                  $sql2 = "select * from challenge where username='$user'";
                  $res2 = mysqli_query($con, $sql2);
                  if($res2){
                    $rows = mysqli_fetch_assoc($res2);
                    $booksnumber = $rows['booksnumber'];
                  }

                  $percent = round(($count/$booksnumber) *100);//for displaying progress bar of completed challenge
              ?>
            <div class="mx-5 my-4  text-center" style="width: 75%; height: 250px; border: 3px solid #49C9AF; border-color: #49C9AF !important;">
                  <br><br>
                  <p style="font-size: 18px;">You have read <span style="color: #49C9AF;"><?php echo $count; ?></span> out of <span style="color: #49C9AF;"><?php echo $booksnumber;?></span> books in 2021.</p><br>
                  <-- Progress bar -->
                  <div class="progress mx-3">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $percent; ?>%;" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percent; ?>%</div>
                  </div><br><br>
                  <a href="<?php echo SITEURL; ?>user/updateChallenge.php" class="btn btn-primary">Edit</a><br>
              
            </div>
      </div>
   <?php include('partials/toggle.php'); ?>
