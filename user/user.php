<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <?php
                  if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                  }

                if(isset($_SESSION['updation_failed'])){
                    echo $_SESSION['updation_failed'];
                    unset($_SESSION['updation_failed']);
                }
                if(isset($_SESSION['user_already_exits'])){
                    echo $_SESSION['user_already_exits'];
                    unset($_SESSION['user_already_exits']);
                }
              ?>
            <?php
              $sql = "select * from user where username='$user'";
              $res = mysqli_query($con, $sql);
              $count = mysqli_num_rows($res);
              if($res){
                  if($count==1){
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['id'];
                    $email = $row['email'];
                  }
              }
            ?>
            <div class="mx-5 my-4">
               <div>
                 <p>Username: <?php echo $user; ?></p>
                 <p>Email: <?php echo $email ;?></p>
                  <a href="<?php echo SITEURL; ?>user/updateUser.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit</a>
               </div>
            </div>  
          </div>          
      </div>
<?php include('partials/toggle.php'); ?>