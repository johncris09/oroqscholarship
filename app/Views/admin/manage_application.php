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

                    <ul class="nav nav-tabs">
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
                                        <th>Application ID</th>  
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
                                        <th>Application ID</th>  
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

            var senior_high_table = $('#senior-high-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'manage/get_shs_all_list',  
                },
                columns: [  
                    {
                        data  : 'ID',
                        render: function(data, type, row, meta){ 
                            return row.AppNoYear + "-" + row.AppNoSem + "-"  + row.AppNoID  
                        }
                    }, 
                    {
                        data  : 'ID',
                        render: function(data, type, row, meta){   
                            return row.AppFirstName + " " + row.AppMidIn + " "  + row.AppLastName  + " "  + row.AppSuffix 
                        }
                    }, 
                    { data: 'AppAddress' },  
                    { data: 'AppCourse' },  
                    { data: 'AppSchool' },  
                    { data: 'AppYear' },  
                    { data: 'AppStatus' },   
                ],  
            });  
 
            var college_table = $('#college-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'manage/get_college_all_list',  
                },
                columns: [  
                    {
                        data  : 'ID',
                        render: function(data, type, row, meta){ 
                            return row.colAppNoYear + "-" + row.colAppNoSem + "-"  + row.colAppNoID  
                        }
                    }, 
                    {
                        data  : 'ID',
                        render: function(data, type, row, meta){   
                            return row.colFirstName + " " + row.colMI + " "  + row.colLastName  + " "  + row.colSuffix 
                        }
                    }, 
                    { data: 'colAddress' },  
                    { data: 'colCourse' },  
                    { data: 'colSchool' },  
                    { data: 'colYearLevel' },  
                    { data: 'colAppStat' },   
                ], 
            });  

            var tvet_table = $('#tvet-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'manage/get_tvet_all_list',
                },
                columns: [  
                    {
                        data  : 'ID',
                        render: function(data, type, row, meta){ 
                            return row.colAppNoYear + "-" + row.colAppNoSem + "-"  + row.colAppNoID  
                        }
                    }, 
                    {
                        data  : 'ID',
                        render: function(data, type, row, meta){   
                            return row.colFirstName + " " + row.colMI + " "  + row.colLastName  + " "  + row.colSuffix 
                        }
                    }, 
                    { data: 'colAddress' },  
                    { data: 'colCourse' },  
                    { data: 'colSchool' },  
                    { data: 'colYearLevel' },  
                    { data: 'colAppStat' },   
                ],  
            });  

            
            
            $('#senior-high-table tbody').on( 'dblclick', 'tr', function () {
                var id = senior_high_table.row( this ).data()['ID']
                window.location.href = "/manage/application/shs/" + id
            } );
            
            $('#college-table tbody').on( 'dblclick', 'tr', function () {
                var id = college_table.row( this ).data()['ID']
                window.location.href = "/manage/application/college/" + id
            } );
            
            $('#tvet-table tbody').on( 'dblclick', 'tr', function () {
                var id = tvet_table.row( this ).data()['ID']
                window.location.href = "/manage/application/tvet/" + id
            } );


 

        });
    </script>

<?= $this->endSection() ?>
