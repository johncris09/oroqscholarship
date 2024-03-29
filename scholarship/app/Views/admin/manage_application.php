<?= $this->extend('layout/layout') ?>  

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?> 
<?= $this->endSection() ?> 

<?= $this->section('main') ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?= $page_title; ?></h4>
                    <p class="sub-header font-13">
                        <code>To see application details, double-click the chosen row.</code>
                    </p> 
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active ">
                                Senior High School  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                College  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                TVET  
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  show active" id="senior-high-tab">   
                            <table id="senior-high-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>   
                                        <th> ID</th>  
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
                                        <th> ID</th>  
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
                                        <th> ID</th>  
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
                    // that.checked = false;   \
                    window.location.href="?view=all"
                }else{
                    window.location.href= "<?php  echo base_url('/manage') ?>"
                }
            })  
            


            var senior_high_table = $('#senior-high-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url   : 'manage/get_shs_all_list',   
                    method: "get", 
                    data  : {
                        view    : "<?php echo isset($_GET['view']) ?  $_GET['view']        : ''?>",
                        app_sem : "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']  : ''?>",
                        app_year: "<?php echo isset($_GET['app_year']) ?  $_GET['app_year']: ''?>", 
                    },
                },
                columns: [  
                    { data: 'id' }, 
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
                order: [[1, 'desc']] ,  
                "columnDefs": [{ "targets": 0, "visible": false }]
                
            });  
 
            var college_table = $('#college-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url   : 'manage/get_college_all_list',   
                    method: "get", 
                    data  : {
                        view    : "<?php echo isset($_GET['view']) ?  $_GET['view']        : ''?>",
                        app_sem : "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']  : ''?>",
                        app_year: "<?php echo isset($_GET['app_year']) ?  $_GET['app_year']: ''?>", 
                    },
                },
                columns: [  
                    { data: 'id' }, 
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
                order: [[1, 'desc']] , 
                "columnDefs": [{ "targets": 0, "visible": false }] 
            });  

            var tvet_table = $('#tvet-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url   : 'manage/get_tvet_all_list', 
                    method: "get", 
                    data  : {
                        view    : "<?php echo isset($_GET['view']) ?  $_GET['view']        : ''?>",
                        app_sem : "<?php echo isset($_GET['app_sem']) ?  $_GET['app_sem']  : ''?>",
                        app_year: "<?php echo isset($_GET['app_year']) ?  $_GET['app_year']: ''?>", 
                    },
                },
                columns: [  
                    { data: 'id' }, 
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
                order: [[1, 'desc']] , 
                "columnDefs": [{ "targets": 0, "visible": false }]
            });  

            
            
            $('#senior-high-table tbody').on( 'dblclick', 'tr', function () {
                var id               = senior_high_table.row( this ).data()['id']
                window.location.href = "manage/application/shs/" + id
            } );
            
            $('#college-table tbody').on( 'dblclick', 'tr', function () {
                var id               = college_table.row( this ).data()['id']
                window.location.href = "manage/application/college/" + id
            } );
            
            $('#tvet-table tbody').on( 'dblclick', 'tr', function () {
                var id               = tvet_table.row( this ).data()['id']
                window.location.href = "manage/application/tvet/" + id
            } );


 

        });
    </script>

<?= $this->endSection() ?>
