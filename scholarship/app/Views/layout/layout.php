<?php

use App\Models\ConfigModel;
use Config\Custom_config;

$custom_config = new Custom_config; 
$year_started  = $custom_config->year_started; 

$db = db_connect();
    $config = new ConfigModel($db);
    $config = $config->asArray()->where('id', 1)->findAll()[0];  
?>
<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8" />
        <title><?= $this->renderSection('title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('/public/img/favicon.ico') ?>">

        
        <!-- third party css --> 

        <?= link_tag('public/assets/datatables.net-bs5/css/dataTables.bootstrap5.min.css'); ?>
        <?= link_tag('public/assets/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css'); ?>
        <?= link_tag('public/assets/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css'); ?>
        <?= link_tag('public/assets/datatables.net-select-bs5/css/select.bootstrap5.min.css'); ?>
        <?= link_tag('public/assets/sweetalert2/sweetalert2.min.css'); ?>      
		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.css">
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
        
        <!-- App css -->
        <?= link_tag('public/css/bootstrap.min.css'); ?>
        <?= link_tag('public/css/app.min.css'); ?> 

         

		<!-- icons -->
        <?= link_tag('public/css/icons.min.css'); ?>  
        
        <?= $this->renderSection('pageStyle') ?> 

         

    </head>

    <!-- body start -->
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="d-none d-lg-block">
                        <form action="<?= base_url('search') ?>" method="get" class="app-search">
                            <div class="app-search-box dropdown">
                                <div class="input-group">
                                    <input type="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" name="search" class="form-control" placeholder="Search Name ..." id="top-search">
                                    <button class="btn input-group-text" type="submit">
                                        <i class="fe-search"></i>
                                    </button>
                                </div> 
                            </div>
                        </form>
                    </li>

                    <li class="dropdown d-inline-block d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="fe-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                            <form action="<?= base_url('search') ?>" name="search" method="get"  class="p-3">
                                <input type="text"  name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : "" ?>" class="form-control" placeholder="Search  Name ..." aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" href="<?= base_url('registration') ?>">
                            <i class="fe-plus noti-icon"></i> New Applicant
                        </a>
                    </li> 
                    <li class="dropdown d-none d-lg-inline-block"> 
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" href="#">
                                Scholarship Status: <i class="mdi mdi-checkbox-blank-circle text-<?php echo ($config['semester_closed']) ? "danger" : "success" ?>"></i>
                        </a>
                    </li>
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?=base_url()?>/public/img/user.png" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ms-1">
                                <?= auth()->user()->username; ?> <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown "> 
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome <?= auth()->user()->username; ?>!</h6>
                            </div>  
            
                            <div class="dropdown-divider"></div> 
                            <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
            
                        </div>
                    </li> 

                    </ul>
                
                    <!-- LOGO -->
                    <div class="logo-box"> 
                        <a href="<?= base_url('/') ?>" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="<?=base_url()?>/public/img/logo-sm.png" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="<?=base_url()?>/public/img/logo-light.png" alt="" height="35">  
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
                            
                            <?php
                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin", "user"])){
                            ?>
                                    <li class="menu-title">Navigation</li>

                                    <li>
                                        <a href="<?= base_url() ?>"> 
                                            <i class="fe-airplay"></i>
                                            <span> Dashboard </span>
                                        </a>
                                    </li>  

                                    <li>
                                        <a href="#shsmanage" data-bs-toggle="collapse">
                                            <i class="mdi mdi-cog-sync-outline"></i>
                                            <span> Manage Application </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="shsmanage">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="<?= base_url('approved') ?>">  Approved Application </a>
                                                </li> 
                                                <li>
                                                    <a href="<?= base_url('pending') ?>">  Pending Application </a>
                                                </li>
                                                <?php 
                                                    if(strtolower(auth()->user()->groups[0]) !== "user"){
                                                ?>
                                                        <li>
                                                            <a href="<?= base_url('manage') ?>">Delete/Edit Application</a>
                                                        </li> 
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </li> 


                            <?php
                                } 
                            ?>
                            
                            <?php
                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin"])){
                            ?>  
                            
                                    <li>
                                        <a href="<?= base_url('registration') ?>"> 
                                            <i class="mdi mdi-book-plus-outline"></i>
                                            <span> Scholar Registration </span>
                                        </a>
                                    </li>
                            <?php
                                }
                            ?>


                            
                            <?php
                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                            ?>  
                                    <li> 
                                        <a href="<?= base_url('manage_scholarship') ?>"> 
                                            <i class="mdi mdi-cogs"></i>
                                            <span> Manage Scholarship </span>
                                        </a>
                                    </li>
                            <?php
                                }
                            ?>
                            <?php
                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin"])){
                            ?>   
                                    <li class="menu-title">AUTOMATED REPORT</li>
                                    <li> 
                                        <a href="<?= base_url('generate_report') ?>">  
                                            <i class="mdi mdi-chart-areaspline"></i>
                                            <span> Generate Report </span>
                                        </a>
                                    </li>  
                                    <li> 
                                        <a href="<?= base_url('generate_payroll') ?>">  
                                            <i class="mdi mdi-format-list-text"></i>
                                            <span> Generate Payroll </span>
                                        </a>
                                    </li> 
                            <?php
                                }
                            ?>

                            <?php
                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                            ?>
                                <li class="menu-title mt-1">Utilities</li>
                                    <li> 
                                        <a href="<?= base_url('course') ?>">  
                                            <i class="mdi mdi-book-outline"></i>
                                            <span> Course </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('strand') ?>"> 
                                            <i class="mdi mdi-book-outline"></i>
                                            <span> Strand </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#school" data-bs-toggle="collapse">
                                            <i class="mdi mdi-cog-sync-outline"></i>
                                            <span> School </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="school">
                                            <ul class="nav-second-level">
                                                <li>
                                                    <a href="<?= base_url('school') ?>">School Name(Senior High)</a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url('collegeschool') ?>">School Name(College)</a>
                                                </li> 
                                            </ul>
                                        </div>
                                    </li> 

                                    <li>
                                        <a href="<?= base_url('user') ?>"> 
                                            <i class="mdi mdi-account-circle-outline"></i>
                                            <span> User </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('logs') ?>"> 
                                            <i class="mdi mdi-view-headline"></i>
                                            <span> User Logs </span>
                                        </a>
                                    </li>
                            <?php
                                } 
                            ?> 

                            <?php
                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin", "user"])){ 
                            ?>
                                    <li class="menu-title mt-1">
                                        <?php  
                                            $current_sy = str_replace("SY: ", "", $config['current_sy']); 
                                        ?>
                                        Current SY: <strong><u><?php echo $current_sy  ?></u></strong>
                                    </li>
                                    <li class="menu-title">Current Semester:  <strong><u><?php echo ($config['current_sem'] ==1) ? "1st" : "2nd" ?></u></strong> </li>
                            <?php
                                }
                            ?>
                                 
     
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
                                    <h4 class="page-title"><?= !isset($page_title) ? "Dashboard" : $page_title; ?></h4>
                                    <?php
                                        if( in_array(uri_string(), ["/", "approved", "pending", "manage"]) ){
                                    ?>
                                        
                                            <div> 
                                                
                                                <input <?php echo (isset($_GET['view'])) ?  "checked" : "" ?> type="checkbox" id="view-all" name=""  > 
                                                <label for="view-all">View All Data</label> 
                                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#advance-filter-modal"> <i class="mdi mdi-filter-outline"></i> Advance Filter</button> 
 
                                                <div class="modal fade" id="advance-filter-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Advance Filter</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form id="advance-filter-form" action="" method="get"> 
                                                                <div class="modal-body ">
                                                                    <div class="form-group">
                                                                        <label for="application-year" class="form-label">Application Year</label>
                                                                        <!-- <select name="app_year" class="form-select" id="application-year"> 
                                                                            <?php  
                                                                                foreach(range(date('Y') + 1, $year_started) as $year){ 
                                                                            ?>
                                                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                                            <?php

                                                                                }
                                                                            ?> 
                                                                        </select> -->
                                                                        <select class="form-select" name="app_sy" id="application-sy"> 
                                                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                                                <option value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>

                                                                        
                                                                    
                                                                    </div>  
                                                                    <div class="form-group">
                                                                        <label for=" " class="form-label">Semester</label>
                                                                        <select name="app_sem" class="form-select" id="inputGroupSelect01"> 
                                                                            <option value="">Select</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option> 
                                                                        </select>
                                                                    </div>   
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Filter</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <form id="filter-form" class="validation-form" > 
                                                    <div class="input-group "> 
                                                        <select name="sy" class="form-control">
                                                            <option value="">School Year</option>
                                                            <?php foreach(range(2017, date('Y')) as $year):?>  
                                                                <option value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
                                                            <?php endforeach; ?>
                                                        </select> 
                                                        <span class="input-group-text"> - </span>
                                                        <select name="semester" class="form-control">
                                                            <option value="">Semester</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                        </select>   
                                                        <button class="btn btn-primary" type="submit" > <i class="mdi mdi-magnify"></i> Filter</button>
                                                    </div> 
                                                </form>-->
                                               
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->   
                        <?= $this->renderSection('main') ?> 
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
        <?= script_tag('public/js/vendor.min.js'); ?>

        <!-- App js-->
        <?= script_tag('public/js/app.min.js'); ?>
        
        <!-- third party js -->
        <?= script_tag('public/assets/datatables.net/js/jquery.dataTables.min.js'); ?> 
        <?= script_tag('public/assets/datatables.net-bs5/js/dataTables.bootstrap5.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-buttons/js/buttons.html5.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-buttons/js/buttons.flash.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-buttons/js/buttons.print.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-keytable/js/dataTables.keyTable.min.js'); ?>
        <?= script_tag('public/assets/datatables.net-select/js/dataTables.select.min.js'); ?>
        <?= script_tag('public/assets/pdfmake/build/pdfmake.min.js'); ?>
        <?= script_tag('public/assets/pdfmake/build/vfs_fonts.js'); ?>  
        <?= script_tag('public/assets/jszip/jszip.min.js'); ?>  
        <?= script_tag('public/assets/sweetalert2/sweetalert2.all.min.js'); ?>    
        <?= script_tag('public/assets/moment.js/moment.js'); ?>    
        <?= script_tag('public/assets/parsleyjs/parsley.min.js'); ?>   
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script> 
        <script src="https://fengyuanchen.github.io/compressorjs/js/compressor.js"></script>
        <script src="https://jasonday.github.io/printThis/printThis.js"></script> 
        <?= script_tag('public/assets/apexcharts/apexcharts.js'); ?>  
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
        <script src="http://malsup.github.io/jquery.blockUI.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/loadingio/ldLoader@v1.0.0/dist/ldld.min.js"></script> 
        <?= script_tag('public/assets/jquery-mask-plugin/jquery.mask.min.js'); ?> 
        <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
                        
        <?= $this->renderSection('pageScript') ?> 

        
    </body>
</html>