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
                    <?php    
                        if(in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin", "user"])){ 
                            if(auth()->user()->scholarship_type == "shs"){
                    ?> 
                                <table id="senior-high-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>   
                                            <th>ID</th>
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
                    <?php
                            }else    if(auth()->user()->scholarship_type == "college"){
                    ?> 
                                <table id="college-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>    
                                            <th>ID</th>  
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
                    <?php
                            }else    if(auth()->user()->scholarship_type == "tvet"){
                    ?> 
                                <table id="tvet-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>   
                                            <th>ID</th>  
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
                    <?php
                            }else{
                    ?>   
                                <ul class="nav nav-pills navtab-bg nav-justified">
                                    <li class="nav-item">
                                        <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active  ">
                                            Senior High School Approved List
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                            College Approved List
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                            TVET Approved List
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="senior-high-tab">   
                                        <table id="senior-high-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>   
                                                    <th>ID</th>
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
                                                    <th>ID</th>  
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
                                    <div class="tab-pane " id="tvet-tab"> 
                                        <table id="tvet-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>   
                                                    <th>ID</th>  
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
                    <?php
                            }
                        }
                    ?>
                </div>
            </div> 
        </div> 
    </div>
    



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() {  

            
            $('#view-all').on('change', function(){
                var that = this
                if($(this).is(':checked')){ 
                    // that.checked = false;   
                    window.location.href="?view=all"
                }else{
                    window.location.href= "<?php  echo base_url('/approved') ?>"
                }
            })  
            

            
            var senior_high_table = $('#senior-high-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                "order": [[ 0, "desc" ]],
                ajax       : {
                    url   : 'approved/get_shs_approved_list',   
                    method: "get", 
                    data  : {
                        view   : "<?php echo isset($_GET['view']) ?  $_GET['view']      : ''?>",
                        app_sem: "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']: ''?>",
                        app_sy : "<?php echo isset($_GET['app_sy']) ?  $_GET['app_sy']  : ''?>", 
                    },
                },  
                columns    : [ 
                    { data: 'id',  }, 
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
                    { data: 'school' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },   
                ],  
                columnDefs: [
                    { "targets": 0, "visible": false } // Hide the first column
                ]
            });  

 
            var college_table = $('#college-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                "order": [[ 0, "desc" ]],
                ajax       : {
                    url   : 'approved/get_college_approved_list',    
                    method: "get", 
                    data  : {
                        view   : "<?php echo isset($_GET['view']) ?  $_GET['view']      : ''?>",
                        app_sem: "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']: ''?>",
                        app_sy : "<?php echo isset($_GET['app_sy']) ?  $_GET['app_sy']  : ''?>", 
                    },
                },
                columns    : [  
                    { 
                        data  : 'id' 
                    },
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){ 
                            return row.appnoyear + "-" + row.appnosem + "-"  + row.appnoid  
                        }
                    }, 
                    { 
                        data  : 'appsy' 
                    },
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
                    { data: 'school' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },   
                ],  
                columnDefs: [
                    { "targets": 0, "visible": false } // Hide the first column
                ]
            });  

            var tvet_table = $('#tvet-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                "order": [[ 0, "desc" ]],
                ajax       : {
                    url   : 'approved/get_tvet_approved_list',    
                    method: "get",  
                    data  : {
                        view   : "<?php echo isset($_GET['view']) ?  $_GET['view']      : ''?>",
                        app_sem: "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']: ''?>",
                        app_sy : "<?php echo isset($_GET['app_sy']) ?  $_GET['app_sy']  : ''?>", 
                    },
                }, 
                columns    : [ 
                    { 
                        data  : 'id' 
                    },
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){ 
                            return row.appnoyear + "-" + row.appnosem + "-"  + row.appnoid  
                        }
                    }, 
                    { 
                        data: 'appsy' 
                    },
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
                    { data: 'school' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },
                ],  
                columnDefs: [
                    { "targets": 0, "visible": false } // Hide the first column
                ]
            });  

            
            $('#senior-high-table tbody').on( 'dblclick', 'tr', function () {
                var id               = senior_high_table.row( this ).data()['id']
                window.location.href = "view/application/shs/" + id
            } );
            
            $('#college-table tbody').on( 'dblclick', 'tr', function () {
                var id               = college_table.row( this ).data()['id']
                window.location.href = "view/application/college/" + id
            } );
            
            $('#tvet-table tbody').on( 'dblclick', 'tr', function () {
                var id               = tvet_table.row( this ).data()['id']
                window.location.href = "view/application/tvet/" + id
            } );

 

        });
    </script>

<?= $this->endSection() ?>
