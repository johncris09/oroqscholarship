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
                    <?php    
                        if(in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin", "user"])){ 
                            if(auth()->user()->scholarship_type == "shs"){   
                    ?>
                                <table id="senior-high-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>   
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>  
                                                <th></th> 
                                            <?php
                                                }
                                            ?>
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
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>  
                                                <th></th> 
                                            <?php
                                                }
                                            ?>   
                                            <th>Application ID</th> 
                                            <th>SY</th>    
                                            <th>Name</th>  
                                            <th>Address</th>  
                                            <th>Course</th>  
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
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>  
                                                <th></th> 
                                            <?php
                                                }
                                            ?>    
                                            <th>Application ID</th>  
                                            <th>SY</th>  
                                            <th>Name</th>  
                                            <th>Address</th>  
                                            <th>Course</th>  
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
                                    <div class="tab-pane show active " id="senior-high-tab">   
                                        <table id="senior-high-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>   
                                                    <?php
                                                        if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                                    ?>  
                                                        <th></th> 
                                                    <?php
                                                        }
                                                    ?>
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
                                                    <?php
                                                        if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                                    ?>  
                                                        <th></th> 
                                                    <?php
                                                        }
                                                    ?>   
                                                    <th>Application ID</th> 
                                                    <th>SY</th>    
                                                    <th>Name</th>  
                                                    <th>Address</th>  
                                                    <th>Course</th>  
                                                    <th>School</th>  
                                                    <th>Year Level</th>  
                                                    <th>Application Status</th>  
                                                </tr>
                                            </thead> 
                                        </table> 
                                    </div> 
                                    <div class="tab-pane   " id="tvet-tab"> 
                                        <table id="tvet-table" style="cursor:pointer" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>    
                                                    <?php
                                                        if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                                    ?>  
                                                        <th></th> 
                                                    <?php
                                                        }
                                                    ?>    
                                                    <th>Application ID</th>  
                                                    <th>SY</th>  
                                                    <th>Name</th>  
                                                    <th>Address</th>  
                                                    <th>Course</th>  
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
            
            $('input.swal2-input').attr('password')


            $('#view-all').on('change', function(){
                var that = this
                if($(this).is(':checked')){ 
                    // that.checked = false;  
                    window.location.href="?view=all"
                }else{
                    window.location.href= "<?php  echo base_url('/pending') ?>"
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
                    <?php
                        if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                    ?>  
                        { data: 'id' }, 
                    <?php
                        }
                    ?>   
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
                <?php
                    if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                ?>   
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select: {
                    style: 'multi'
                },
                order: [[1, 'desc']] , 
                dom: 'Bfrtip', 
                buttons: [
                    {
                        text: '<i class="mdi mdi-trash-can-outline"></i>Bulk Disapproved', 
                        className: 'btn-danger btn-sm',
                        action: function () {
                            var rows_selected = senior_high_table.column(0).checkboxes.selected(); 
                            if(rows_selected.length > 0 ){
                                var applicant_id = [];
                                $.each(rows_selected, function(index, rowId){ 
                                    applicant_id.push(rowId)
                                }); 

                                Swal.fire({
                                    title             : "Disapproved Application(s)?", 
                                    icon              : "warning",
                                    showCancelButton  : !0,
                                    confirmButtonText : "Yes, disapproved it!",
                                    cancelButtonText  : "No, cancel!",
                                    confirmButtonClass: "btn btn-success mt-2",
                                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                                    buttonsStyling    : !1
                                }).then(function(e) {
                                    if(e.value){  
                                        Swal.fire({
                                            title: 'Please Enter your password',
                                            input: 'password',
                                            inputAttributes: {
                                                autocapitalize: 'off'
                                            },
                                            showCancelButton: true,
                                            confirmButtonText: 'Look up',
                                            showLoaderOnConfirm: true,   
                                            }).then((result) => { 
                                                if (result.isConfirmed) {
                                                    $.ajax({
                                                        url   : "<?php echo base_url('user/checkpassword') ?>",
                                                        method: "POST",  
                                                        data  : {
                                                            password: result.value
                                                        },           
                                                        dataType: "json",
                                                        success: function(data){  
                                                            if(data.response){
                                                                $.ajax({
                                                                    url   : "pending/shs_bulk_disapproved",
                                                                    method: "POST",  
                                                                    data  : {
                                                                        applicant_id: applicant_id, 
                                                                    },           
                                                                    dataType: "json",
                                                                    success: function(data){   
                                                                        if(data){ 
                                                                            Swal.fire({
                                                                                title            : "Disapproved Success!",  
                                                                                icon             : "success",   
                                                                                confirmButtonText: 'Ok',  
                                                                            })  
                                                                            senior_high_table.ajax.reload()
                                                                        }
                                                                    },
                                                                    error: function (xhr, status, error) { 
                                                                        console.info(xhr.responseText);
                                                                    }
                                                                }); 
                                                            }else{
                                                                Swal.fire({
                                                                    title            : "Invalid Credential",  
                                                                    icon             : "error",   
                                                                    confirmButtonText: 'Ok',  
                                                                })   
                                                            } 
                                                        },
                                                        error: function (xhr, status, error) { 
                                                            console.info(xhr.responseText);
                                                        }
                                                    }); 
                                                }
                                        }) 
                                    }
                                })  
                            }else{  
                                Swal.fire({
                                    title            : "Disapproved Error!", 
                                    text            : "Please select any row to complete the action", 
                                    icon             : "error",   
                                    confirmButtonText: 'Ok',  
                                }) 
                            }
                              
                        }
                    }
                ]
                <?php
                    }
                ?>
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
                    <?php
                        if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                    ?>  
                        { data: 'id' }, 
                    <?php
                        }
                    ?> 
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
                <?php
                    if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                ?>   
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select: {
                    style: 'multi'
                },
                order: [[1, 'desc']] , 
                dom: 'Bfrtip', 
                buttons: [
                    {
                        text: '<i class="mdi mdi-trash-can-outline"></i>Bulk Disapproved',
                        className: 'btn-danger btn-sm',
                        action: function () {
                            var rows_selected = college_table.column(0).checkboxes.selected(); 
                            if(rows_selected.length > 0 ){
                                var applicant_id = [];
                                $.each(rows_selected, function(index, rowId){ 
                                    applicant_id.push(rowId)
                                }); 

                                Swal.fire({
                                    title             : "Disapproved Application(s)?", 
                                    icon              : "warning",
                                    showCancelButton  : !0,
                                    confirmButtonText : "Yes, disapproved it!",
                                    cancelButtonText  : "No, cancel!",
                                    confirmButtonClass: "btn btn-success mt-2",
                                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                                    buttonsStyling    : !1
                                }).then(function(e) {
                                    if(e.value){  
                                        Swal.fire({
                                            title: 'Please Enter your password',
                                            input: 'password',
                                            inputAttributes: {
                                                autocapitalize: 'off'
                                            },
                                            showCancelButton: true,
                                            confirmButtonText: 'Look up',
                                            showLoaderOnConfirm: true,   
                                            }).then((result) => { 
                                                if (result.isConfirmed) {
                                                    $.ajax({
                                                        url   : "<?php echo base_url('user/checkpassword') ?>",
                                                        method: "POST",  
                                                        data  : {
                                                            password: result.value
                                                        },           
                                                        dataType: "json",
                                                        success: function(data){  
                                                            if(data.response){
                                                                $.ajax({
                                                                    url   : "pending/college_bulk_disapproved",
                                                                    method: "POST",  
                                                                    data  : {
                                                                        applicant_id: applicant_id, 
                                                                    },           
                                                                    dataType: "json",
                                                                    success: function(data){   
                                                                        if(data){ 
                                                                            Swal.fire({
                                                                                title            : "Disapproved Success!",  
                                                                                icon             : "success",   
                                                                                confirmButtonText: 'Ok',  
                                                                            })  
                                                                            college_table.ajax.reload()
                                                                        }
                                                                    },
                                                                    error: function (xhr, status, error) { 
                                                                        console.info(xhr.responseText);
                                                                    }
                                                                }); 
                                                            }else{
                                                                Swal.fire({
                                                                    title            : "Invalid Credential",  
                                                                    icon             : "error",   
                                                                    confirmButtonText: 'Ok',  
                                                                })   
                                                            } 
                                                        },
                                                        error: function (xhr, status, error) { 
                                                            console.info(xhr.responseText);
                                                        }
                                                    }); 
                                                }
                                        }) 
                                    }
                                })  
                            }else{  
                                Swal.fire({
                                    title            : "Disapproved Error!", 
                                    text            : "Please select any row to complete the action", 
                                    icon             : "error",   
                                    confirmButtonText: 'Ok',  
                                }) 
                            }
                              
                        }
                    }
                ]
                <?php 
                    }
                ?> 

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
                    <?php
                        if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                    ?>  
                        { data: 'id' }, 
                    <?php
                        }
                    ?> 
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
                    { data: 'course_name' },  
                    { data: 'school_name' },  
                    { data: 'appyear' },  
                    { data: 'appstatus' },   
                ],  
                 
                <?php
                    if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                ?>  
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select: {
                    style: 'multi'
                },
                order: [[1, 'desc']] ,
                dom: 'Bfrtip', 
                buttons: [
                    {
                        text: '<i class="mdi mdi-trash-can-outline"></i>Bulk Disapproved',
                        className: 'btn-danger btn-sm',
                        action: function () {
                            var rows_selected = tvet_table.column(0).checkboxes.selected(); 
                            if(rows_selected.length > 0 ){
                                var applicant_id = [];
                                $.each(rows_selected, function(index, rowId){ 
                                    applicant_id.push(rowId)
                                }); 

                                Swal.fire({
                                    title             : "Disapproved Application(s)?", 
                                    icon              : "warning",
                                    showCancelButton  : !0,
                                    confirmButtonText : "Yes, disapproved it!",
                                    cancelButtonText  : "No, cancel!",
                                    confirmButtonClass: "btn btn-success mt-2",
                                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                                    buttonsStyling    : !1
                                }).then(function(e) {
                                    if(e.value){  
                                        Swal.fire({
                                            title: 'Please Enter your password',
                                            input: 'password',
                                            inputAttributes: {
                                                autocapitalize: 'off'
                                            },
                                            showCancelButton: true,
                                            confirmButtonText: 'Look up',
                                            showLoaderOnConfirm: true, 
                                            }).then((result) => { 
                                                if (result.isConfirmed) {
                                                    $.ajax({
                                                        url   : "<?php echo base_url('user/checkpassword') ?>",
                                                        method: "POST",  
                                                        data  : {
                                                            password: result.value
                                                        },           
                                                        dataType: "json",
                                                        success: function(data){  
                                                            if(data.response){
                                                                $.ajax({
                                                                    url   : "pending/tvet_bulk_disapproved",
                                                                    method: "POST",  
                                                                    data  : {
                                                                        applicant_id: applicant_id, 
                                                                    },           
                                                                    dataType: "json",
                                                                    success: function(data){   
                                                                        if(data){ 
                                                                            Swal.fire({
                                                                                title            : "Disapproved Success!",  
                                                                                icon             : "success",   
                                                                                confirmButtonText: 'Ok',  
                                                                            })  
                                                                            tvet_table.ajax.reload()
                                                                        }
                                                                    },
                                                                    error: function (xhr, status, error) { 
                                                                        console.info(xhr.responseText);
                                                                    }
                                                                }); 
                                                            }else{
                                                                Swal.fire({
                                                                    title            : "Invalid Credential",  
                                                                    icon             : "error",   
                                                                    confirmButtonText: 'Ok',  
                                                                })   
                                                            } 
                                                        },
                                                        error: function (xhr, status, error) { 
                                                            console.info(xhr.responseText);
                                                        }
                                                    }); 
                                                }
                                        }) 
                                    }
                                })  
                            }else{  
                                Swal.fire({
                                    title            : "Disapproved Error!", 
                                    text            : "Please select any row to complete the action", 
                                    icon             : "error",   
                                    confirmButtonText: 'Ok',  
                                }) 
                            }
                              
                        }
                    }
                ] 
                <?php 
                    }
                ?> 
            });  

            $('#senior-high-table tbody').on( 'dblclick', 'tr', function () {
                var id               = senior_high_table.row( this ).data()['id']
                window.location.href = "pending/application/shs/" + id
            } ); 
            
            $('#college-table tbody').on( 'dblclick', 'tr', function () {
                var id               = college_table.row( this ).data()['id']
                window.location.href = "pending/application/college/" + id
            } );
            
            $('#tvet-table tbody').on( 'dblclick', 'tr', function () {
                var id               = tvet_table.row( this ).data()['id'] 
                window.location.href = "pending/application/tvet/" + id
            } ); 
        });
    </script>

<?= $this->endSection() ?>
