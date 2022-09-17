<?php
  include('partials/sidenav.php'); 
    //to insert data with specific user
  $username = $_GET['username'];
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <div class="mx-5 my-4">
              <form method="POST" action="">
                  <div class="form-group">
                    <label>Book Name</label>
                    <input type="text" name="bookname" class="form-control" placeholder="Enter book" required>
                  </div>
                  <div class="form-group">
                    <label >Book Author</label>
                    <input type="text" name="author" class="form-control"placeholder="Enter author">
                  </div>
                  <div class="form-group">
                    <label >Book Genre</label>
                    <select multiple class="form-control" name="genre">
                      <option value="Action and Adventure">Action and Adventure</option>
                      <option value="Classics">Classics</option>
                      <option value="Comic Book or Graphic Novel">Comic Book or Graphic Novel</option>
                      <option value="Detective and Mystery">Detective and Mystery</option>
                      <option value="Fantasy">Fantasy</option>
                      <option value="Historical Fiction">Historical Fiction</option>
                      <option value="Horror">Horror</option>
                      <option value="Literary Fiction">Literary Fiction</option>
                      <option value="Romance">Romance</option>
                      <option value="Science Fiction (Sci-Fi)">Science Fiction (Sci-Fi)</option>
                      <option value="Short Stories">Short Stories</option>
                      <option value="Suspense and Thrillers">Suspense and Thrillers</option>
                      <option value="Womens Fiction">Women's Fiction</option>
                      <option value="Biographies and Autobiographies">Biographies and Autobiographies</option>
                      <option value="Cookbooks">Cookbooks</option>
                      <option value="Essays">Essays</option>
                      <option value="History">History</option>
                      <option value="Memoir">Memoir</option>
                      <option value="Poetry">Poetry</option>
                      <option value="Self-Help">Self-Help</option>
                      <option value="True Crime">True Crime</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Progress</label>
                    <select multiple class="form-control" name="progress">
                      <option value="In progress">In progress</option>
                      <option value="Not in progress">Not in progress</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <labe>Added On</label>
                    <input type="date" name="added_on" class="form-control">
                  </div>
                  <div class="form-group">
                    <labe>Started Reading On</label>
                    <input type="date" name="read_on" class="form-control">
                  </div>
                  <input type="hidden" name="username" value="<?php echo $user; ?>">
                  <input type="submit" name="submit" value="Add Book" class="btn" id="btn-green">
            </div>
          </div>
          
      </div>

   <?php 
        include('partials/toggle.php'); 
         //inserting book data into bookshelf table from values collected from form if inserted succesfully redirect to bookshelf.php else insert data again
        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $bookname = mysqli_real_escape_string($con, $_POST['bookname']);
            $author = mysqli_real_escape_string($con, $_POST['author']);
            $genre = mysqli_real_escape_string($con, $_POST['genre']);
            $progress = mysqli_real_escape_string($con, $_POST['progress']);
            $added_on = mysqli_real_escape_string($con, $_POST['added_on']);
            $read_on = mysqli_real_escape_string($con, $_POST['read_on']);

            $sql = "INSERT INTO bookshelf (username, bookname, author, genre, progress, added_on, read_on)
                    VALUES ('$username', '$bookname', '$author', '$genre', '$progress', '$added_on', '$read_on')";

            $res= mysqli_query($con, $sql);
            if($res){
               $_SESSION['book_added'] = "<div class='alert alert-success mt-3'>Book Added Successfully!</div>";
                header('location:'.SITEURL.'user/bookshelf.php');
            }
            else{
                $_SESSION['book_addtion_failed'] = "<div class='alert alert-danger mt-3'>Failed to add book!</div>";
                header('location:'.SITEURL.'user/bookshelf.php');
            }

        }
   ?>