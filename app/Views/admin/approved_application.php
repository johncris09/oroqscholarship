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
                    url: 'approved/get_shs_approved_list',  
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
                    url: 'approved/get_college_approved_list',  
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
                    url: 'approved/get_tvet_approved_list',  
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

 

        });
    </script>

<?= $this->endSection() ?>
