<?php
include('config.php');
session_start();
if (isset($_POST['login'])) {
	//var_dump($_POST);
	$email = $_POST['email'];
	$password = $_POST['password'];
	//echo "string".$u;
	
	$stmt = $conn->prepare("Select parent_id,name,email,password from users where email= ? AND password = ?");
	$stmt->bind_param("ss",$email,$password);
	$stmt->execute();
	$stmt->store_result();
	$numrows=$stmt->num_rows;
	//echo $numrows;

	if($numrows == 0)
	{
		header("Location:page-login.php?msg=invalid");
	 
	}
	else
	{
		$stmt->bind_result($parentid,$name, $email,$pass);
		 while ($stmt->fetch()) {
        //printf ("%s %s\n", $name, $email,$pass);
    	}
    	$_SESSION["parent_id"] = $parentid;
		$_SESSION['user_name'] = $name;
		$_SESSION['user_email'] = $email;
		$stmt->close();
		header("Location:dashboard.php");
	}
}

 ?>