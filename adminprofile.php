<?php
session_start();
if (isset($_SESSION['user_name'])) { 
include("config.php");
include('functions.php');
    $stmt = $conn->prepare("Select name,email,password from users where email= ?");
    $stmt->bind_param("s",$_SESSION['user_email']);
    $stmt->execute();
    $stmt->store_result();
    //$result = $stmt->get_result();   // <--- add this instead
if($stmt->num_rows == 1) { 
    $stmt->bind_result($name, $email,$pass);
    while ($stmt->fetch()) 
    {
        //printf ("%s %s\n", $name, $email,$pass);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title></title>
    <!-- Favicon icon -->
    <!-- Custom Stylesheet -->
    <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <?php include("menubar.php"); ?>       


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Admin Profile</h4>
                                <div class="basic-form">
                                    <form action="adminprofilecode.php" method="POST">
                                        <?php messages(); ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="username" class="form-control" placeholder="Name" value="<?php echo $name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" >
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" value="<?php echo $pass; ?>" class="form-control" placeholder="Password">
                                        </div>
                                       
                                       
                                        <button type="submit" name="update" class="btn btn-dark">Update</button>
                                    </form>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        <?php include("footer.php"); ?>
        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    

</body>
</html>
<?php 
}
else
{
header("Location:page-login.php");
}
?>