<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class=" float-end"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-school-modal">Add New</button>
                    </div>
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div>
                <div class="card-body">  
                    <table id="school-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>  
                                <th>Action</th> 
                                <th>School Name</th> 
                                <th>Abbreviation</th> 
                                <th>Address</th> 
                                <th>Manager</th>
                            </tr>
                        </thead> 
                    </table> 
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

    </div>

    <!-- add modal form -->
    <div class="modal fade" id="add-new-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-new-college-school-form" class="form-validation"> 
                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Name <span class="text-danger">*</span></label>
                            <input type="text" name="school_name" class="form-control"  placeholder="School Name" required> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Abbreviation <span class="text-danger">*</span></label>
                            <input type="text" name="abbreviation" class="form-control"  placeholder="School Abbreviation"> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control"  placeholder="School Address" required> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">Manager <span class="text-danger">*</span></label>
                            <select class="form-control" name="manager" id="" required>
                                <option value="">Select</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option> 
                            </select>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save  changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <!-- edit modal form -->
    <div class="modal fade" id="edit-college-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="update-college-school-form"  class="form-validation"> 
                    <div class="modal-body ">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Name</label>
                            <input type="text" class="form-control" name="school_name"  placeholder="School Name" required> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Abbreviation <span class="text-danger">*</span></label>
                            <input type="text" name="abbreviation" class="form-control"  placeholder="School Abbreviation"> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" class="form-control"  placeholder="School Address" required> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">Manager</label>
                            <select class="form-control" name="manager" id="" required>
                                <option value="">Select</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option> 
                            </select>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save  changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    

<?= $this->endSection() ?>

<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() {

            
            $(document).ready(function() {
                $(".form-validation").parsley()
            }), $(function() {
                $("#demo-form").parsley().on("field:validated", function() {
                    var e = 0 === $(".parsley-error").length;
                    $(".alert-info").toggleClass("d-none", !e), $(".alert-warning").toggleClass("d-none", e)
                }).on("form:submit", function() {
                    return !1
                })
            });

            var table = $('#school-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url: 'collegeschool/get_all',  
                },
                columns    : [ 
                    { data: 'id' },  
                    { data: 'school_name' },  
                    { data: 'abbreviation' },  
                    { data: 'address' },  
                    { data: 'manager' },  
                ], 
                columnDefs : [
                    {
                        targets  : 0,
                        title    : 'Actions',
                        orderable: false,
                        render   : function(data, type, row, meta) {  
                            var action = ''; 
                            action     = '\
                                    <div class="btn-group">\
                                        <button type="button" class="btn dropdown-toggle text-primary" data-bs-toggle="dropdown" aria-expanded="false"> <i class="mdi mdi-cog"></i>  <i class="mdi mdi-chevron-down"></i> </button>\
                                        <div class="dropdown-menu">\
                                            <a data-id="'+row.id+'" class="dropdown-item text-warning" href="#" id="edit-college-school-button">\
                                                <i class="mdi mdi-grease-pencil"></i>\
                                                <span class="nav-text">Edit Details</span>\
                                            </a>\
                                            <a data-id="'+row.id+'" class="dropdown-item text-danger" href="#" id="delete-college-school-button">\
                                                <i class="mdi mdi-grease-pencil"></i>\
                                                <span class="nav-text">Delete</span>\
                                            </a>\
                                        </div>\
                                    </div>\
                                '; 
                            return action;
                        }, 
                    },  
                ],
            });  

            
            $(document).on('submit', '#add-new-college-school-form', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url     : 'collegeschool/insert',
                    method  : "post", 
                    data    : $("#add-new-college-school-form").serialize(),
                    dataType: "json", 
                    success : function (data) {  
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })

                            table.ajax.reload()
                            $("#add-new-college-school-form")[0].reset()
                            $('#add-new-school-modal').modal('hide')
                        }else{  
                            Swal.fire({
                                title: "Insert Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 


            $(document).on('click', '#edit-college-school-button', function(e){ 
                e.preventDefault(); 
                $('#edit-college-school-modal').modal('show') 

                var id = $(this).data('id')
                $.ajax({
                    url     : 'collegeschool/get/' + id,
                    method  : "get",
                    dataType: "json", 
                    success : function (data) {  
                        console.info(data)
                        $('#update-college-school-form input[name="id"]').val(data.id)
                        $('#update-college-school-form input[name="school_name"]').val(data.school_name)
                        $('#update-college-school-form input[name="abbreviation"]').val(data.abbreviation)
                        $('#update-college-school-form input[name="address"]').val(data.address)
                        $('#update-college-school-form select[name="manager"]').val(data.manager)
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 

            
            $(document).on('submit', '#update-college-school-form', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url     : 'collegeschool/update',
                    method  : "post", 
                    data    : $("#update-college-school-form").serialize(),
                    dataType: "json", 
                    success : function (data) { 
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })
                            table.ajax.reload() 
                            $('#edit-college-school-modal').modal('hide')
                        }else{ 
                            Swal.fire({
                                title: "Update Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 

            

            $(document).on('click', '#delete-college-school-button', function(e){ 
                e.preventDefault();  

                var id = $(this).data('id')
                
                Swal.fire({
                    title             : "Are you sure?",
                    text              : "You won't be able to revert this!",
                    icon              : "warning",
                    showCancelButton  : !0,
                    confirmButtonText : "Yes, delete it!",
                    cancelButtonText  : "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                    buttonsStyling    : !1
                }).then(function(e) {  
                    if(e.isConfirmed){
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
                                                    url     : 'collegeschool/delete/' + id,
                                                    method  : "post",  
                                                    dataType: "json", 
                                                    success : function (data) {  
                                                        if(data.response){ 
                                                            Swal.fire({
                                                                title: "Good job!",
                                                                text : data.message,
                                                                icon : "success"
                                                            })
                                                            table.ajax.reload() 
                                                        }else{ 
                                                            Swal.fire({
                                                                title: "Update Error!",
                                                                text : data.message,
                                                                icon : "error"
                                                            }) 
                                                        }
                                                    },
                                                    error   : function (xhr, status, error) { 
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
            });  
             
        });
    </script>
 
 

<?= $this->endSection() ?>

