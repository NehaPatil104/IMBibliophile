<?php
    include('../config/constants.php');
    include('loginCheck.php');
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IM BIBLIOPHILE</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">


</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="navbar-custom border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-light">
        <a href="#" style="text-decoration: none; color: white;"><?php echo $user; ?></a>
      </div>
      <div class="list-group list-group-flush">
        <a href="<?php echo SITEURL; ?>user/indexSidenav.php" class="list-group-item list-group-item-action navbar-custom">Home</a>
        <a href="<?php echo SITEURL; ?>user/bookshelf.php" class="list-group-item list-group-item-action navbar-custom">Bookshelf</a>
        <a href="<?php echo SITEURL; ?>user/currentlyReading.php" class="list-group-item list-group-item-action navbar-custom">Currently Reading</a>
        <a href="<?php echo SITEURL; ?>user/wantToRead.php" class="list-group-item list-group-item-action navbar-custom">Want to Read</a>
        <a href="<?php echo SITEURL; ?>user/read.php" class="list-group-item list-group-item-action navbar-custom">Read</a>
        <a href="<?php echo SITEURL; ?>user/readingChallenge.php" class="list-group-item list-group-item-action navbar-custom">Reading Challenge</a>
         <a href="<?php echo SITEURL; ?>user/yearBooks.php" class="list-group-item list-group-item-action navbar-custom">Year Books</a>
        <a href="<?php echo SITEURL; ?>user/logout.php" class="list-group-item list-group-item-action navbar-custom">Sign Out</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

       <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
        
      </nav>