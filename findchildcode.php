<?php
include('config.php');
session_start();
if (isset($_POST['submit'])) {
	/*//var_dump($_SESSION['parent_id']);
	//var_dump($_POST);die();
	$email = $_POST['email'];
	$name = $_POST['username'];
	$age = $_POST['age'];
	$mobile = $_POST['mobile'];
	$birthday = $_POST['birthday'];
*/
	//
$target_dir = "./images/Compair_image/";
$newdir = $target_dir.'test'.rand(1,20).'/';
//mkdir($newdir, 0777, true);

$target_file = $newdir . basename($_FILES["fileToUpload"]["name"]);
//echo $target_file; die();
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
{
	//echo $imageFileType; die();
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
        /*$sql = "INSERT INTO `child_details`(`name`, `age`, `mobile`, `email`, `date_of_birth`, `child_photo_path`,`parent_id`) VALUES ('".$name."','".$age."','".$mobile."','".$email."','".$birthday."','".$target_file."','".$_SESSION['parent_id']."')";
*/
        $filcontent =  file_get_contents("output.txt");

        $sql = "SELECT * FROM `child_details` where name = '$filcontent'";
       $result = mysqli_query($conn,$sql);
        if ( mysqli_num_rows($result) > 0)
		{

    while ($row = mysqli_fetch_assoc($result) )
    {
    	echo 'Name : ' .$row['name']."<br>";
    	echo 'email ID : '. $row['email']."<br>";
    	echo 'Mobile Number : '.$row['mobile']."<br>";
    	echo 'Age Of Child :' . $row['age']."<br>";
    	echo 'Date of birthday of Child :'.$row['date_of_birth']."<br>";
    	echo 'Previously  Uploaded Photo Of Child :'."<br>";
    ?>
    	<img src="<?php echo $row['child_photo_path']; ?>" style="width: 100px;" >

  <?php   } }
  else
  {
  	echo "No Data found";
  }
  echo "<br>";
  echo "<br>";
  echo "<a href='findchild.php'>Go back</a>";
  //header("Location:inquirylist.php?msg=success");

/*if (mysqli_query($conn, $sql))
        {   //$_POST=array(); // empty post array;
  header("Location:inquirylist.php?msg=success");


        }
		else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
*/
    } else {
        	echo '<script language="javascript">';
			echo 'alert("Sorry, there was an error uploading your file.")';
			echo '</script>';
    }




}


 ?>
