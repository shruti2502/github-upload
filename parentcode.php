<?php
include('config.php');
//session_start();
if (isset($_POST['submit'])) {
	//var_dump($_POST); die();
	$email = $_POST['email'];
	$password = $_POST['psw'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	//echo "string".$u;
	
	 
	 $sql = "INSERT INTO `parent_details`(`name`, `address`, `mobile`, `email`, `password`) VALUES ('".$name."','".$address."','".$mobile."','".$email."','".$password."')";


if (mysqli_query($conn, $sql)) 
        {   //$_POST=array(); // empty post array;
        	$t = mysqli_insert_id($conn);
//echo $t; 
            $sql1 = "INSERT INTO `users`(`name`, `email`, `password`,`parent_id`) VALUES ('".$name."','".$email."','".$password."',$t)";
  //          echo $sql1; die();
		mysqli_query($conn, $sql1);
  header("Location:page-login.php?msg=loginsuccess");
           
        }
	//echo $numrows;

	
}

 ?>