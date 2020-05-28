<?php
include('config.php');
session_start();
if (isset($_POST['update'])) {
	//var_dump($_SESSION['email']);
	$email = $_POST['email'];
	$password = $_POST['password'];
	$uname = $_POST['username'];
	$stmt = $conn->prepare("UPDATE `users` SET `name`=?,`email`=?,`password`=? WHERE `email`=?");
	$stmt->bind_param("ssss",$uname,$email,$password,$_SESSION['user_email']);
	$stmt->execute();
	//$stmt->store_result();
	//var_dump($stmt); die();
	$numrows=$stmt->affected_rows;
	echo $numrows;
	//die();
	if($numrows == 0)
	{
		header("Location:adminprofile.php?msg=noup");
	}
	else
	{
		$stmt->close();
		session_start();
	 	unset($_SESSION['user_name']);
	 	unset($_SESSION['user_email']);
	 	session_destroy();
		header("Location:page-login.php?msg=uprofile");
	}
}

 ?>