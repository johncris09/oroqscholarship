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
                            <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link  ">
                                Senior High School Pending List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                College Pending List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                TVET Pending List
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane " id="senior-high-tab">   
                            <table id="senior-high-table" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>  
                                        <th>Action</th> 
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
                            <table id="college-table" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>  
                                        <th>Action</th> 
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
                        <div class="tab-pane show active" id="tvet-tab"> 
                            <table id="tvet-table" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>  
                                        <th>Action</th> 
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
                    url: 'pending/get_shs_pending_list',  
                },
                columns: [ 
                    { data: 'ID' }, 
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
                columnDefs: [
                    {
                        targets  : 0,
                        title    : 'Actions',
                        orderable: false,
                        render   : function(data, type, row, meta) {  
                            var action = '';
                        
                            action =  '\
                                    <div class="btn-group">\
                                        <button type="button" class="btn dropdown-toggle text-primary" data-bs-toggle="dropdown" aria-expanded="false"> <i class="mdi mdi-cog"></i>  <i class="mdi mdi-chevron-down"></i> </button>\
                                        <div class="dropdown-menu">\
                                            <a data-id="'+row.ID+'" data-method="update_shs" class="dropdown-item text-warning approve-applicant-button">\
                                                <i class="mdi mdi-check"></i>\
                                                <span class="nav-text">Approved</span>\
                                            </a>\
                                            <a data-id="'+row.ID+'" data-method="update_shs"  class="dropdown-item text-danger disapprove-applicant-button">\
                                                <i class="mdi mdi-close-thick"></i>\
                                                <span class="nav-text">Disapproved</span>\
                                            </a>\
                                        </div>\
                                    </div>\
                                '; 
                            return action;
                        }, 
                    },  
                ],
            });  
 
            var college_table = $('#college-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'pending/get_college_pending_list',  
                },
                columns: [ 
                    { data: 'ID' },  
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
                columnDefs: [
                    {
                        targets  : 0,
                        title    : 'Actions',
                        orderable: false,
                        render   : function(data, type, row, meta) {  
                            var action = '';
                        
                            action =  '\
                                    <div class="btn-group">\
                                        <button type="button" class="btn dropdown-toggle text-primary" data-bs-toggle="dropdown" aria-expanded="false"> <i class="mdi mdi-cog"></i>  <i class="mdi mdi-chevron-down"></i> </button>\
                                        <div class="dropdown-menu">\
                                            <a data-id="'+row.ID+'" data-method="update_college" class="dropdown-item text-warning approve-applicant-button">\
                                                <i class="mdi mdi-check"></i>\
                                                <span class="nav-text">Approved</span>\
                                            </a>\
                                            <a data-id="'+row.ID+'" data-method="update_college" class="dropdown-item text-danger disapprove-applicant-button">\
                                                <i class="mdi mdi-close-thick"></i>\
                                                <span class="nav-text">Disapproved</span>\
                                            </a>\
                                        </div>\
                                    </div>\
                                '; 
                            return action;
                        }, 
                    },  
                ],
            });  

            var tvet_table = $('#tvet-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'pending/get_tvet_pending_list',  
                },
                columns: [ 
                    { data: 'ID' },  
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
                columnDefs: [
                    {
                        targets  : 0,
                        title    : 'Actions',
                        orderable: false,
                        render   : function(data, type, row, meta) {  
                            var action = '';
                        
                            action =  '\
                                    <div class="btn-group">\
                                        <button type="button" class="btn dropdown-toggle text-primary" data-bs-toggle="dropdown" aria-expanded="false"> <i class="mdi mdi-cog"></i>  <i class="mdi mdi-chevron-down"></i> </button>\
                                        <div class="dropdown-menu">\
                                            <a data-id="'+row.ID+'" data-method="update_tvet" class="dropdown-item text-warning approve-applicant-button">\
                                                <i class="mdi mdi-check"></i>\
                                                <span class="nav-text">Approved</span>\
                                            </a>\
                                            <a data-id="'+row.ID+'" data-method="update_tvet" class="dropdown-item text-danger disapprove-applicant-button">\
                                                <i class="mdi mdi-close-thick"></i>\
                                                <span class="nav-text">Disapproved</span>\
                                            </a>\
                                        </div>\
                                    </div>\
                                '; 
                            return action;
                        }, 
                    },  
                ],
            });  


            
            $(document).on('click', '.approve-applicant-button', function(e){ 
                e.preventDefault();  

                var id = $(this).data('id')
                var method = $(this).data('method') 
                Swal.fire({
                    title: "Approve Applicant?", 
                    icon: "question",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, Approve it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1
                }).then(function(e) {  
                    if(e.value){ 
                        $.ajax({
                            url: 'pending/' + method,  
                            method: "post",
                            data: {
                                id : id,
                                status : "Approved",
                            },  
                            dataType: "json", 
                            success: function (data) {   
                                if(data.response){ 
                                    Swal.fire({
                                        title:"Good job!",
                                        text: data.message,
                                        icon:"success"
                                    })
                                    senior_high_table.ajax.reload()
                                    college_table.ajax.reload() 
                                    tvet_table.ajax.reload()
                                }else{ 
                                    Swal.fire({
                                        title:"Update Error!",
                                        text: data.message,
                                        icon:"error"
                                    }) 
                                }
                            },
                            error: function (xhr, status, error) { 
                                console.info(xhr.responseText);
                            }
                        });  
                     
                    }
                }) 
            });  

            
            $(document).on('click', '.disapprove-applicant-button', function(e){ 
                e.preventDefault();  

                var id = $(this).data('id')
                var method = $(this).data('method') 
                
                Swal.fire({
                    title: "Dissaprove Applicant?", 
                    icon: "question",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, Dissaprove it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1
                }).then(function(e) {  
                    if(e.value){ 
                        $.ajax({
                            url: 'pending/' + method,  
                            method: "post",
                            data: {
                                id : id,
                                status : "Disapproved",
                            },  
                            dataType: "json", 
                            success: function (data) {  
                                if(data.response){ 
                                    Swal.fire({
                                        title:"Good job!",
                                        text: data.message,
                                        icon:"success"
                                    })
                                    senior_high_table.ajax.reload()
                                    college_table.ajax.reload() 
                                    tvet_table.ajax.reload()
                                }else{ 
                                    Swal.fire({
                                        title:"Update Error!",
                                        text: data.message,
                                        icon:"error"
                                    }) 
                                }
                            },
                            error: function (xhr, status, error) { 
                                console.info(xhr.responseText);
                            }
                        });  
                     
                    }
                }) 
            });  

        });
    </script>

<?= $this->endSection() ?>
