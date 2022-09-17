<?php
  include('partials/sidenav.php'); 
  $id = $_GET['book_id'];
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <?php
            //Displaying success and failure operation message
                if(isset($_SESSION['read_updation_failed'])){
                    echo $_SESSION['read_updation_failed'];
                    unset($_SESSION['read_updation_failed']);
                }
            ?>
            <div class="mx-5 my-4">
            <?php
            //Displaying data of particular book into form if user clicks update button
              $sql = "select * from bookshelf where id= $id";
              $res = mysqli_query($con, $sql);
              if($res){
                $count = mysqli_num_rows($res);
                if($count >0){
                  $row = mysqli_fetch_assoc($res);
                  $bookname = $row['bookname'];
                  $author = $row['author'];
                  $genre = $row['genre'];
                  $progress = $row['progress'];
                  $added_on = $row['added_on'];
                  $read_on = $row['read_on'];
                }
              }
            ?>
              <form method="POST" action="">
                  <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" class="form-control" placeholder="Enter book" required value="<?php echo $bookname; ?>">
                  </div>
                  <div class="form-group">
                    <label >Book Author</label>
                    <input type="text" name="author" class="form-control"placeholder="Enter author" value="<?php echo $author; ?>">
                  </div>
                  <div class="form-group">
                    <label >Book Genre</label>
                    <select multiple class="form-control" name="genre">
                      <option <?php if($genre == 'Action and Adventure'){ echo "selected='selected'";} ?>value="Action and Adventure" >Action and Adventure</option>
                      <option <?php if($genre == 'Classics'){ echo "selected='selected'";} ?> value="Classics">Classics</option>
                      <option <?php if($genre == 'Comic Book or Graphic Novel'){ echo "selected='selected'";} ?> value="Comic Book or Graphic Novel">Comic Book or Graphic Novel</option>
                      <option <?php if($genre == 'Detective and Mystery'){ echo "selected='selected'";} ?> value="Detective and Mystery">Detective and Mystery</option>
                      <option <?php if($genre == 'Fantasy'){ echo "selected='selected'";} ?> value="Fantasy">Fantasy</option>
                      <option <?php if($genre == 'Historical Fiction'){ echo "selected='selected'";} ?> value="Historical Fiction">Historical Fiction</option>
                      <option <?php if($genre == 'Horror'){ echo "selected='selected'";} ?> value="Horror">Horror</option>
                      <option <?php if($genre == 'Literary Fiction'){ echo "selected='selected'";} ?> value="Literary Fiction">Literary Fiction</option>
                      <option <?php if($genre == 'Romance'){ echo "selected='selected'";} ?> value="Romance">Romance</option>
                      <option <?php if($genre == 'Science Fiction (Sci-Fi)'){ echo "selected='selected'";} ?> value="Science Fiction (Sci-Fi)">Science Fiction (Sci-Fi)</option>
                      <option <?php if($genre == 'Short Stories'){ echo "selected='selected'";} ?> value="Short Stories">Short Stories</option>
                      <option <?php if($genre == 'Suspense and Thrillers'){ echo "selected='selected'";} ?> value="Suspense and Thrillers">Suspense and Thrillers</option>
                      <option <?php if($genre == 'Womens Fiction'){ echo "selected='selected'";} ?> value="Womens Fiction">Women's Fiction</option>
                      <option <?php if($genre == 'Biographies and Autobiographies'){ echo "selected='selected'";} ?> value="Biographies and Autobiographies">Biographies and Autobiographies</option>
                      <option <?php if($genre == 'Cookbooks'){ echo "selected='selected'";} ?> value="Cookbooks">Cookbooks</option>
                      <option <?php if($genre == 'Essays'){ echo "selected='selected'";} ?> value="Essays">Essays</option>
                      <option <?php if($genre == 'History'){ echo "selected='selected'";} ?> value="History">History</option>
                      <option <?php if($genre == 'Memoir'){ echo "selected='selected'";} ?> value="Memoir">Memoir</option>
                      <option <?php if($genre == 'Poetry'){ echo "selected='selected'";} ?> value="Poetry">Poetry</option>
                      <option <?php if($genre == 'Self-Help'){ echo "selected='selected'";} ?> value="Self-Help">Self-Help</option>
                      <option <?php if($genre == 'True Crime'){ echo "selected='selected'";} ?> value="True Crime">True Crime</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Progress</label>
                    <select multiple class="form-control" name="progress">
                      <option <?php if($progress == 'In progress'){ echo "selected='selected'";} ?> value="In progress">In progress</option>
                      <option <?php if($progress == 'Not in progress'){ echo "selected='selected'";} ?> value="Not in progress">Not in progress</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <labe>Added On</label>
                    <input type="date" name="added_on" class="form-control" value="<?php echo $added_on; ?>">
                  </div>
                  <div class="form-group">
                    <labe>Completed reading on</label>
                    <input type="date" name="read_on" class="form-control" value="<?php echo $read_on; ?>">
                  </div>
                  <input type="hidden" name="username" value="<?php echo $user; ?>">
                  <input type="submit" name="submit" value="Update" class="btn" id="btn-green">
            </div>
          </div>
          
      </div>

   <?php 
        include('partials/toggle.php'); 
        //updating the bookshelf table row with updated data from form and redirecting to bookshelf.php
        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $bookname = mysqli_real_escape_string($con, $_POST['bookname']);
            $author = mysqli_real_escape_string($con, $_POST['author']);
            $genre = mysqli_real_escape_string($con, $_POST['genre']);
            $progress = mysqli_real_escape_string($con, $_POST['progress']);
            $added_on = mysqli_real_escape_string($con, $_POST['added_on']);
            $read_on = mysqli_real_escape_string($con, $_POST['read_on']);

            $sql2 = "update bookshelf set
            username = '$username',
            bookname = '$bookname',
            author =  '$author',
            genre = '$genre',
            progress = '$progress',
            added_on = '$added_on',
            read_on = '$read_on'
            where id = $id
            ";
            $res2 = mysqli_query($con, $sql2);
            //redirect with success or failure message
            if($res2){
                $_SESSION['updated_read'] =  "<div class='alert alert-success mt-3'>Information Updated Successfuly!</div>";
                header('location:'.SITEURL.'user/bookshelf.php');
            }
            else{
                $_SESSION['read_updation_failed'] = "<div class='alert alert-danger mt-3'>Updation Failed!</div>";
                header('location:'.SITEURL.'user/updateBookshelf.php');
            }

        }

   ?>