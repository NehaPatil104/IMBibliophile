<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <div class="mx-5 my-4">
              <a href="<?php echo SITEURL; ?>user/addtobookshelf.php?username=<?php echo $user;?>" class="btn  mt-1" id="btn-green" >Add Book</a>
              <input id="gfg" class="btn btn-custom mt-1" type="text"placeholder="Search here" >
              <?php
              //Displaying success and failure operation message
                  if(isset($_SESSION['book_added'])){
                    echo $_SESSION['book_added'];
                    unset($_SESSION['book_added']);
                  }

                if(isset($_SESSION['book_addtion_failed'])){
                    echo $_SESSION['book_addtion_failed'];
                    unset($_SESSION['book_addtion_failed']);
                }
                if(isset($_SESSION['updated_read'])){
                    echo $_SESSION['updated_read'];
                    unset($_SESSION['updated_read']);
                }
                if(isset($_SESSION['delete_book_successfull'])){
                    echo $_SESSION['delete_book_successfull'];
                    unset($_SESSION['delete_book_successfull']);
                }
                if(isset($_SESSION['delete_book_failed'])){
                    echo $_SESSION['delete_book_failed'];
                    unset($_SESSION['delete_book_failed']);
                }
              ?>
              <div class="table-responsive">
              <table class="table table-hover my-3" id="dtBasicExample">
                  <tr>
                    <th>Sr No.</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Progress</th>
                    <th>Added on</th>
                    <th>Started reading on</th>
                    <th>Action</th>
                  </tr>
                  <?php
                   // Displaying bookshelf table data of particular user whose books are in progress in context with reading
                      $sql= "select * from bookshelf where username='$user' and progress='In progress'";
                      $res = mysqli_query($con, $sql);
                      if($res){
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                         if($count >=1){
                            while ($row = mysqli_fetch_assoc($res)) {
                              $book_id = $row['id'];
                              $bookname = $row['bookname'];
                              $author = $row['author'];
                              $genre = $row['genre'];
                              $progress = $row['progress'];
                              $added_on = $row['added_on'];
                              $read_on = $row['read_on'];

                          ?>
                          <tbody id="geeks">
                            <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $bookname; ?></td>
                              <td><?php echo $author; ?></td>
                              <td><?php echo $genre; ?></td>
                              <td><?php echo $progress; ?></td>
                              <td><?php echo $added_on; ?></td>
                              <td><?php echo $read_on; ?></td>
                              <td>
                                <a href="<?php echo SITEURL; ?>user/updateBookshelf.php?book_id=<?php echo $book_id; ?>" class="btn btn-info">Update</a>
                                <a href="<?php echo SITEURL;?>user/deletefrombookshelf.php?book_id=<?php echo $book_id; ?>" class="btn btn-danger">Delete</a>
                              </td>
                            </tr>
                          </tbody>
                          <?php

                            }
                         }
                         else{

                         }
                      }
                      else{

                      }
                      
                      
                  ?>

              </table>
              </div>
              <!-- For search function. Searching through table -->
               <script>
                $(document).ready(function() {
                    $("#gfg").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#geeks tr").filter(function() {
                            $(this).toggle($(this).text()
                            .toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
            </div>  
          </div>
          
      </div>
   <?php include('partials/toggle.php'); ?>