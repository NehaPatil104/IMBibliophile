<?php
	//Deleting book with peculiar id from bookshelf table

	include('../config/constants.php');
	if(isset($_GET['book_id'])){
		//getting the book id of book to delete
		$id = $_GET['book_id'];
		//deleting book from table with particular id and redirecting to bookshelf.php 
		$sql = "delete from bookshelf where id = $id";
		$res = mysqli_query($con, $sql);
		if($res){
			$_SESSION['delete_book_successfull'] =  "<div class='alert alert-success mt-3'>Information eleted successfuly!</div>";
	        header('location:'.SITEURL.'user/bookshelf.php');
	    }
	    else{
	        $_SESSION['delete_book_failed'] = "<div class='alert alert-danger mt-3'>Deletion Failed!</div>";
	        header('location:'.SITEURL.'user/bookshelf.php');
	    }
	}
?>