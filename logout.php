<?php
	session_start();
	unset($_SESSION["parent_id"]); 
 	unset($_SESSION['user_name']);
 	unset($_SESSION['user_email']);
 	session_destroy();
 header("Location:index.html");

?>