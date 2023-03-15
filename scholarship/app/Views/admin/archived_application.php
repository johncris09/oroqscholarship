<?= $this->extend('layout/layout') ?>  

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?> 
<?= $this->endSection() ?> 

<?= $this->section('main') ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4"><?= $page_title; ?></h4> 
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active ">
                                Senior High School Pending List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                College Pending List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                TVET Pending List
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show  active" id="senior-high-tab">   
                            <table id="senior-high-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>  
                                        <th>Application ID</th>  
                                        <th>SY</th>  
                                        <th>Name</th>  
                                        <th>Address</th>  
                                        <th>Strand</th>  
                                        <th>School</th>  
                                        <th>Grade Level</th>  
                                        <th>Application Status</th>  
                                    </tr>
                                </thead> 
                            </table> 
                        </div>
                        <div class="tab-pane  " id="college-tab">
                            <table id="college-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>     
                                        <th>Application ID</th> 
                                        <th>SY</th>    
                                        <th>Name</th>  
                                        <th>Address</th>  
                                        <th>Strand</th>  
                                        <th>School</th>  
                                        <th>Year Level</th>  
                                        <th>Application Status</th>  
                                    </tr>
                                </thead> 
                            </table> 
                        </div> 
                        <div class="tab-pane  " id="tvet-tab"> 
                            <table id="tvet-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>     
                                        <th>Application ID</th>  
                                        <th>SY</th>  
                                        <th>Name</th>  
                                        <th>Address</th>  
                                        <th>Strand</th>  
                                        <th>School</th>  
                                        <th>Year Level</th>  
                                        <th>Application Status</th>  
                                    </tr>
                                </thead> 
                            </table> 
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col --> 
    </div>
    



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() {    
            
            $('input.swal2-input').attr('password')


            $('#view-all').on('change', function(){
                var that = this
                if($(this).is(':checked')){ 
                    // that.checked = false;  
                    window.location.href="?view=all"
                }else{
                    window.location.href= "<?php  echo base_url('/') ?>"
                }
            })  

            var senior_high_table = $('#senior-high-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url   : 'pending/get_shs_pending_list',   
                    method: "get", 
                    data  : {
                        view    : "<?php echo isset($_GET['view']) ?  $_GET['view']        : ''?>",
                        app_sem : "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']  : ''?>",
                        app_year: "<?php echo isset($_GET['app_year']) ?  $_GET['app_year']: ''?>", 
                    },
                },
                columns: [    
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){ 
                            return row.appnoyear + "-" + row.appnosem + "-"  + row.appnoid  
                        }
                    }, 
                    { data: 'appsy' },  
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){ 
                            var first_name  = row.firstname.toLowerCase();
                            var middle_name = row.middlename.toLowerCase();
                            var last_name   = row.lastname.toLowerCase();
                            var suffix      = row.suffix.toUpperCase();

                            return  first_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " " + 
                                    middle_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " "  + 
                                    last_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " "  + 
                                    suffix 
                        }
                    }, 
                    { data: 'address' },  
                    { data: 'course' },  
                    { data: 'school_name' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },   
                ], 
            });  
 
            var college_table = $('#college-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url   : 'pending/get_college_pending_list',  
                    method: "get", 
                    data  : {
                        view    : "<?php echo isset($_GET['view']) ?  $_GET['view']        : ''?>",
                        app_sem : "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']  : ''?>",
                        app_year: "<?php echo isset($_GET['app_year']) ?  $_GET['app_year']: ''?>", 
                    }, 
                },
                columns: [   
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){ 
                            return row.appnoyear + "-" + row.appnosem + "-"  + row.appnoid  
                        }
                    },  
                    { data: 'appsy' },  
                    {
                        data  : 'id', 
                        render: function(data, type, row, meta){ 
                            var first_name  = row.firstname.toLowerCase();
                            var middle_name = row.middlename.toLowerCase();
                            var last_name   = row.lastname.toLowerCase();
                            var suffix      = row.suffix.toUpperCase();

                            return  first_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " " + 
                                    middle_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " "  + 
                                    last_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " "  + 
                                    suffix 
                        }
                    }, 
                    { data: 'address' },  
                    { data: 'course' },  
                    { data: 'school_name' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },   
                ],  

            });  

            var tvet_table = $('#tvet-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax: {
                    url   : 'pending/get_tvet_pending_list',   
                    method: "get", 
                    data  : {
                        view    : "<?php echo isset($_GET['view']) ?  $_GET['view']        : ''?>",
                        app_sem : "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']  : ''?>",
                        app_year: "<?php echo isset($_GET['app_year']) ?  $_GET['app_year']: ''?>", 
                    },
                },
                columns: [ 
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){ 
                            return row.appnoyear + "-" + row.appnosem + "-"  + row.appnoid  
                        }
                        
                    }, 
                    { data: 'appsy' },  
                    {
                        data  : 'id', 
                        render: function(data, type, row, meta){ 
                            var first_name  = row.firstname.toLowerCase();
                            var middle_name = row.middlename.toLowerCase();
                            var last_name   = row.lastname.toLowerCase();
                            var suffix      = row.suffix.toUpperCase();

                            return  first_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " " + 
                                    middle_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " "  + 
                                    last_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ") + " "  + 
                                    suffix 
                        }
                    }, 
                    { data: 'address' },  
                    { data: 'course' },  
                    { data: 'school_name' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },   
                ],  
            });  
 
        });
    </script>

<?= $this->endSection() ?>
