<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="container-fluid">
            <h1 class="mx-5 mt-5">IM BIBLIOPHILE</h1>
            <?php
                  $sql2 = "select * from booksread where username='$user' and date between '2021-01-01' and '2021-12-31'";
                  $res2 = mysqli_query($con, $sql2);
                  $count = mysqli_num_rows($res2);
              ?>
            <br>
              <p class="mx-5" style="font-size: 18px;">You have read <span style="color: #49C9AF;"><?php echo $count; ?></span> book/s in 2021.</p>
            <div class="mx-5 my-1">
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
                
              ?>
              <div class="table-responsive">
              <table class="table table-hover my-3" id="dtBasicExample">
                  <tr>
                    <th>Sr No.</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Date</th>
                    <th>Review</th>
                    <th>Highlight</th>
                    <th>Action</th>
                  </tr>
                  <?php
                  //Displaying books read in current year
                      $sql= "select * from booksread where username='$user' and date between '2021-01-01' and '2021-12-31'";
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
                              $date = $row['date'];
                              $review = $row['review'];
                              $highlight = $row['highlight'];

                          ?>
                          <tbody id="geeks">
                            <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $bookname; ?></td>
                              <td><?php echo $author; ?></td>
                              <td><?php echo $genre; ?></td>
                              <td><?php echo $date; ?></td>
                              <td><?php echo $review; ?></td>
                              <td><?php echo $highlight; ?></td>
                              <td>
                                <a href="<?php echo SITEURL; ?>user/updateRead.php?book_id=<?php echo $book_id; ?>" class="btn btn-info">Update</a>
                                <a href="<?php echo SITEURL;?>user/deleteRead.php?book_id=<?php echo $book_id; ?>" class="btn btn-danger">Delete</a>
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