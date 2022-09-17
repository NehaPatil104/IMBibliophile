<?php
  include('partials/sidenav.php'); 
 ?>
      <div class="row">
          <div class="col-5 container-fluid">
            <h1 class="mx-5 my-5">IM BIBLIOPHILE</h1>
            <?php
            //Displaying registration successfull mesaage
                if(isset($_SESSION['register_successfully'])){
                      echo $_SESSION['register_successfully'];
                      unset($_SESSION['register_successfully']);
                }
            ?>
            <div class="my-5 mx-5">           
                I opened a book and in I strode<br>
                Now nobody can find me.<br>
                I’ve left my chair, my house, my road,<br>
                My town and my world behind me.<br><br>

                I’m wearing the cloak, I’ve slipped on the ring,<br>
                I’ve swallowed the magic potion.<br>
                I’ve fought with a dragon, dined with a king<br>
                And dived in a bottomless ocean.<br><br>

                I opened a book and made some friends.<br>
                I shared their tears and laughter<br>
                And followed their road with its bumps and bends<br>
                To the happily ever after.<br><br>

                I finished my book and out I came.<br>
                The cloak can no longer hide me.<br>
                My chair and my house are just the same,<br>
                But I have a book inside me.<br><br>

                by Julia Donaldson

            </div>
          </div>
          <div class="col-5">
              <div class="my-5">
                  <img src="../Books/undraw_book_lover_mkck.png" width="100%">
              </div>
          </div>
      </div>

   <?php include('partials/toggle.php'); ?>