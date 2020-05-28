<?php
include('config.php');
session_start();
if (isset($_POST['submit'])) {
	//var_dump($_SESSION['parent_id']);
	//var_dump($_POST);die();
	$email = $_POST['email'];
	$name = $_POST['username'];
	$age = $_POST['age'];
	$mobile = $_POST['mobile'];
	$birthday = $_POST['birthday'];





$target_dir = "./images/all_users_images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
	echo $imageFileType; die();
	//$_SESSION['success']='Sorry, only JPG, JPEG, PNG & GIF files are allowed';	
	header("Location:./index.php");		
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000000) 
{
			echo '<script language="javascript">';
			echo 'alert("Sorry, your file is too large.")';
			echo 'return false';
			echo '</script>';
			//header("Location:./index.html");
    
}

//$randomname=rand(10,10000000).$target_file;
if (file_exists($target_file)) 
{
	//echo "Sorry, file already exists.";
			echo '<script language="javascript">';
			echo 'alert("Sorry, your file already exists.")';
			echo 'return false';
			echo '</script>';
			//header("Location:./index.html");
}
// Check file size



    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
$target_file = "http://localhost/facedetect//images/all_users_images/".$_FILES["fileToUpload"]["name"];
        $sql = "INSERT INTO `child_details`(`name`, `age`, `mobile`, `email`, `date_of_birth`, `child_photo_path`,`parent_id`) VALUES ('".$name."','".$age."','".$mobile."','".$email."','".$birthday."','".$target_file."','".$_SESSION['parent_id']."')";

if (mysqli_query($conn, $sql)) 
        {   //$_POST=array(); // empty post array;
            
  header("Location:inquirylist.php?msg=success");
           
        }
		else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

    } else {
        	echo '<script language="javascript">';
			echo 'alert("Sorry, there was an error uploading your file.")';
			echo '</script>';
    }



	
}

 ?>