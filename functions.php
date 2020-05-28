<?php

	function messages(){
		if(isset($_GET['msg']))
		{
			if($_GET['msg'] == 'invalid'){
				?><div class = "alert alert-danger">Username or Password is not match</div><?php
			}else if($_GET['msg'] == 'noup'){
				?><div class = "alert alert-danger">Record Not updated </div><?php
			}else if($_GET['msg'] == 'uprofile'){
				?><div class = "alert alert-success">Profile updated successfully Please login again</div><?php
			}
			if($_GET['msg'] == 'success'){
				?><div class = "alert alert-success">Record inserted successfully</div><?php
			} 
			if($_GET['msg'] == 'loginsuccess'){
				?><div class = "alert alert-success">Registered successfully Please login and fill child information</div><?php
			} 
		}
	}


?>