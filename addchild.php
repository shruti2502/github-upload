<?php
session_start();
if (isset($_SESSION['user_name'])) { 
include("config.php");
include('functions.php');
   
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
                                <h4 class="card-title">Add Child Infromation</h4>
                                <div class="basic-form">
                                    <form action="./addchildcode.php" method="POST"  enctype="multipart/form-data">
                                        <?php messages(); ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="username" class="form-control" placeholder="Name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="" placeholder="If child does not have won email id you can add parent email id" >
                                        </div>
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input type="number" name="mobile" class="form-control" value="" placeholder="If child does not have won  contact you can add parent contact" >
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="text" name="age" value="" class="form-control" placeholder="Age">
                                        </div>
                                         <div class="form-group">
                                            <label>Date of Birthday</label>
                                            <input type="date" name="birthday" value="" class="form-control" placeholder="Date">
                                        </div>
                                         <div class="form-group">
                                            <label>Child Photo Upload</label>
                                            <input type="file" name="fileToUpload" value="" class="form-control" placeholder="Date">
                                        </div>
                                       
                                       
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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