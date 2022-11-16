
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $this->renderSection('title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= 'img/favicon.ico' ?>">

        
        <!-- third party css -->
        <?= link_tag('assets/datatables.net-bs5/css/dataTables.bootstrap5.min.css'); ?>
        <?= link_tag('assets/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
        <?= link_tag('assets/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
        <?= link_tag('assets/datatables.net-select-bs5/css//select.bootstrap5.min.css'); ?>
        <?= link_tag('assets/sweetalert2/sweetalert2.min.css'); ?>  


		<!-- App css -->
        <?= link_tag('css/bootstrap.min.css'); ?>
        <?= link_tag('css/app.min.css'); ?> 

         

		<!-- icons -->
        <?= link_tag('css/icons.min.css'); ?>

    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">  
                
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>
                
                        
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?=base_url()?>/img/user.png" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    <?= auth()->user()->username; ?> <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome <?= auth()->user()->username; ?>!</h6>
                                </div>
                
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>
                
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    <span>Settings</span>
                                </a>
                
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    <span>Lock Screen</span>
                                </a>
                
                                <div class="dropdown-divider"></div>
                
                                <!-- item-->
                                <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                
                            </div>
                        </li>
                
                
                    </ul>
                
                    <!-- LOGO -->
                    <div class="logo-box"> 
                        <a href="/" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="<?=base_url()?>/img/logo-sm.png" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="<?=base_url()?>/img/logo-light.png" alt="" height="35">  
                            </span> 
                        </a>
                    </div>
                
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
                        
                
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="/"> 
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li> 
                            
                            <li>
                                <a href="registration"> 
                                    <i class="mdi mdi-book-plus-outline"></i>
                                    <span> Scholar Registration </span>
                                </a>
                            </li>

                            
                            <!-- <li class="menu-title mt-2">Senior High School</li> 
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-book-plus-outline"></i>
                                    <span> Scholar Registration </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#shsmanage" data-bs-toggle="collapse">
                                    <i class="mdi mdi-cog-sync-outline"></i>
                                    <span> Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="shsmanage">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#">Approved Pending Application</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete/Edit Application</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li> 
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-chart-bar"></i>
                                    <span> Generate Report </span>
                                </a>
                            </li>
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-magnify"></i>
                                    <span> Search </span>
                                </a>
                            </li>


                            <li class="menu-title">College</li>
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-book-plus-outline"></i>
                                    <span> Scholar Registration </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#cmanage" data-bs-toggle="collapse">
                                    <i class="mdi mdi-cog-sync-outline"></i>
                                    <span> Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="cmanage">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#">Approved Pending Application</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete/Edit Application</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li> 
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-chart-bar"></i>
                                    <span> Generate Report </span>
                                </a>
                            </li>
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-magnify"></i>
                                    <span> Search </span>
                                </a>
                            </li>
                            <li class="menu-title">TVET</li>
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-book-plus-outline"></i>
                                    <span> Scholar Registration </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#tvetmanage" data-bs-toggle="collapse">
                                    <i class="mdi mdi-cog-sync-outline"></i>
                                    <span> Manage </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="tvetmanage">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="#">Approved Pending Application</a>
                                        </li>
                                        <li>
                                            <a href="#">Delete/Edit Application</a>
                                        </li> 
                                    </ul>
                                </div>
                            </li> 
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-chart-bar"></i>
                                    <span> Generate Report </span>
                                </a>
                            </li>
                            <li>
                                <a href="#"> 
                                    <i class="mdi mdi-magnify"></i>
                                    <span> Search </span>
                                </a>
                            </li> -->
                            
                            <li class="menu-title mt-4">Utilities</li>
                            <li>
                                <a href="course"> 
                                    <i class="mdi mdi-book-outline"></i>
                                    <span> Course </span>
                                </a>
                            </li>
                            <li>
                                <a href="/strand"> 
                                    <i class="mdi mdi-book-outline"></i>
                                    <span> Strand </span>
                                </a>
                            </li>
                            <li>
                                <a href="/school"> 
                                    <i class="mdi mdi-school-outline"></i>
                                    <span> School </span>
                                </a>
                            </li>
                            <li>
                                <a href="/user"> 
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    <span> User </span>
                                </a>
                            </li>
                            <li>
                                <a href="/authlogin"> 
                                    <i class="mdi mdi-web"></i>
                                    <span> Auth Login </span>
                                </a>
                            </li>
                            
     
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">General Elements</h4>
                                    <!-- <div>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Codefox</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                            <li class="breadcrumb-item active">General Elements</li>
                                        </ol>
                                    </div> -->
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->   

                        <div class="row"> 
                            <?= $this->renderSection('main') ?>
                        </div>
                        <!-- end row -->  
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> &copy; MIS DIVISION 
                            </div> 
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        
        <script>
            var BASE_URL = "<?= base_url(); ?>";
        </script>

        <!-- Vendor js -->
        <?= script_tag('js/vendor.min.js'); ?>

        <!-- App js-->
        <?= script_tag('js/app.min.js'); ?>
        
        <!-- third party js -->
        <?= script_tag('assets/datatables.net/js/jquery.dataTables.min.js'); ?> 
        <?= script_tag('assets/datatables.net-bs5/js/dataTables.bootstrap5.min.js'); ?>
        <?= script_tag('assets/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>
        <?= script_tag('assets/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js'); ?>
        <?= script_tag('assets/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>
        <?= script_tag('assets/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js'); ?>
        <?= script_tag('assets/datatables.net-buttons/js/buttons.html5.min.js'); ?>
        <?= script_tag('assets/datatables.net-buttons/js/buttons.flash.min.js'); ?>
        <?= script_tag('assets/datatables.net-buttons/js/buttons.print.min.js'); ?>
        <?= script_tag('assets/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>
        <?= script_tag('assets/datatables.net-select/js/dataTables.select.min.js'); ?>
        <?= script_tag('assets/pdfmake/build/pdfmake.min.js'); ?>
        <?= script_tag('assets/pdfmake/build/vfs_fonts.js'); ?>  
        <?= script_tag('assets/sweetalert2/sweetalert2.all.min.js'); ?>    
        <?= script_tag('assets/moment.js/moment.js'); ?>    
        <?= script_tag('assets/parsleyjs/parsley.min.js'); ?>    
 
        <?= $this->renderSection('pageScript') ?> 

        
    </body>
</html>