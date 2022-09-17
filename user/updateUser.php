<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
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
                 <form method="POST">
                  <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $email;?>">
                  </div>
                  <input type="submit" class="btn btn-primary" name="submit" value="Update">
                </form>
               </div>
            </div>  
          </div>          
      </div>
<?php include('partials/toggle.php'); ?>

<?php
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $sql = "select * from user where username='$username'";
        $res = mysqli_query($con, $sql);
        $count = mysqli_num_rows($res);
        if($count==0){
            $sql2 = "update user set email='$email' where id='$id'";
            $res2 = mysqli_query($con,$sql2);
            if($res2){
                $_SESSION['user'] = "<?php echo $username;?>";
                $_SESSION['update'] = "<div class='alert alert-success'>Updated Successfully!</div>";
                header('location:'.SITEURL.'user/user.php');
            }
            else{
                $_SESSION['updation_failed'] = "<div class='alert alert-danger'>Updation Failed!</div>";
                header('location:'.SITEURL.'user/user.php');
            }
        }
        else{
             $_SESSION['user_already_exits'] = "<div class='alert alert-danger'>Username already exits!</div>";
            header('location:'.SITEURL.'user/user.php');
        }
    }
?>