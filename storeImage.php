x<?php
include("config.php");
    

    $img = $_POST['image'];
    $folderPath = "./images/Compair_image/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
   //alert("Image uploaded successfully");
    header("Location:inquirylist.php?msg=success");
   /* $file = "http://localhost/facedetect/".$file;
        $sql = "INSERT INTO `users_details`(`name`,`image_path_one` ) VALUES ('testuser','".$file."')";

if (mysqli_query($conn, $sql)) 
        {   //$_POST=array(); // empty post array;
            
  header("Location:inquirylist.php?msg=success");
           
        } */
    //print_r($fileName);
  //echo "File Uploaded successfully";
?>