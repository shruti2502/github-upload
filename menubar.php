 <!--**********************************
            Nav header start
        ***********************************-->
       <link href="css/main.css" rel="stylesheet">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="dashboard.php">
                    <b class="logo-abbr"><img src="nirajalogo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <h3></h3>
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header" >    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
               <!--  <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div> -->
                <div class="header-right">
                    <ul class="clearfix">
                      
                       
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/form-user.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="adminprofile.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                       
                                        
                                        <li><a href="logout.php"><i class="icon-key"></i> <span>Log-out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar" style="background: #dca234">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="has-arrow" href="dashboard.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="./inquirylist.php" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Child List</span>
                        </a>
                        
                    </li>
                     <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="./addchild.php" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Add Child information</span>
                        </a>
                       
                    </li>
                    <?php if($_SESSION['user_name'] == "Admin" ) { ?>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="./userpicture.php" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Take Picture</span>
                        </a>
                       
                    </li>
                    <!--  <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="./donorlist.php" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">compair photo</span>
                        </a>
                       
                    </li> -->
                     <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="./parentlist.php" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Parent List</span>
                        </a>
                       
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="./findchild.php" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Find Person(child)</span>
                        </a>
                       
                    </li>
                    <?php } ?>





                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->