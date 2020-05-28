<?php
session_start();
if (isset($_SESSION['user_name'])) { 
include("config.php");
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

    <?php include("menubar.php"); 
include('functions.php');

    ?>       


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
                                <?php messages(); ?>

                                <h4 class="card-title">List</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" style="font-size: 16px;font-weight: 500;line-height: 16px;">
                                        <thead>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Date of birthday</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //var_dump($_SESSION); 
                                            if($_SESSION['user_name'] == "Admin")
                                            {
$sql ="SELECT * FROM `child_details` order by id desc" ;

                                            }
                                            else
                                            {
$sql ="SELECT * FROM `child_details` where parent_id = '".$_SESSION['parent_id']."'";
}
$result = mysqli_query($conn,$sql);
if ( mysqli_num_rows($result) > 0) 
{
    $count=1;
    while ($row = mysqli_fetch_assoc($result) ) 
    { ?>
                                            <tr>
                                                <td><?php echo $count; $count++; ?></td>
                                                
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['age']; ?></td>
                                                <td><?php echo $row['date_of_birth']; ?></td>
                                               <td><img src="<?php echo $row['child_photo_path']; ?>" style="width: 100px;" ></td>
                                            </tr>
<?php } }  ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.no.</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Date of birthday</th>
                                                <th>Image</th>
                                                
                                            </tr>
                                        </tfoot>
                                    </table>
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