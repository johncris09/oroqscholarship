<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class=" float-end"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-user-modal">Add New</button>
                    </div>
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div>
                <div class="card-body">   
                    <table id="user-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr> 
                                <th>Action</th> 
                                <th>First Name</th> 
                                <th>Middle Name</th> 
                                <th>Last Name</th> 
                                <th>Username</th> 
                                <th>Email</th> 
                                <th>Role Type</th> 
                                <th>Created At</th> 
                            </tr>
                        </thead> 
                    </table> 
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
   

    <!-- add modal form -->
    <div class="modal fade" id="add-new-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-new-user-form" class="parsley-examples"> 
                    <div class="modal-body ">
                        <div class="form-group">
                            <label for=" " class="form-label">First Name <span class="text-danger">*</span> </label>
                            <input type="text" name="firstname"  class="form-control" required   placeholder="First Name" />
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Middle Name</label>
                            <input type="text" name="middlename"  class="form-control" placeholder="Middle Name" />
                        </div>    
                        <div class="form-group">
                            <label for=" " class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text"  name="lastname" class="form-control" required   placeholder="Last Name" />
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required  parsley-type="email" placeholder="Enter a valid e-mail" />
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="username" required data-parsley-length="[8, 40]"   placeholder="Enter  username" />
                        </div> 
                        <div class="form-group">
                            <label for=" " class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" required data-parsley-type="alphanum" data-parsley-length="[8, 40]"  class="form-control"  placeholder="Password"  > 
                        </div> 
                        <div class="form-group">
                            <label for=" " class="form-label">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" required data-parsley-equalto="#password" placeholder="Re-Type Password" />
                        </div>    
                        <div class="form-group">
                            <label for="" class="form-label">Role Type <span class="text-danger">*</span></label> 
                            <select name="group"  class="form-control"  required>
                                <option value="">Select</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option> 
                                <option value="user">User</option> 
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
    <div class="modal fade" id="edit-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form id="update-user-form" class="parsley-examples"> 
                    <div class="modal-body ">
                        <input type="hidden" name="id"  class="form-control" required   />
                        <div class="form-group">
                            <label for=" " class="form-label">First Name</label>
                            <input type="text" name="firstname"  class="form-control" required   placeholder="First Name" />
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Middle Name</label>
                            <input type="text" name="middlename"  class="form-control"     placeholder="Middle Name" />
                        </div>    
                        <div class="form-group">
                            <label for=" " class="form-label">Last Name</label>
                            <input type="text"  name="lastname" class="form-control" required   placeholder="Last Name" />
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required  parsley-type="email" placeholder="Enter a valid e-mail" />
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required data-parsley-length="[8, 40]"   placeholder="Enter  username" />
                        </div>  
                        <div class="form-group">
                            <label for="" class="form-label">Role Type</label> 
                            <select name="group"  class="form-control"  required>
                                <option value="">Select</option>
                                <option value="superadmin">Super Admin</option>
                                <option value="admin">Admin</option> 
                                <option value="user">User</option> 
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
    <div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Password</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form id="update-password-form" class="parsley-examples"> 
                    <div class="modal-body ">
                        <input type="hidden" name="id"  class="form-control" required   />
                        <div class="form-group">
                            <label for=" " class="form-label">Password</label>
                            <input type="password" name="password" id="change-password" required data-parsley-type="alphanum" data-parsley-length="[8, 40]"  class="form-control"  placeholder="Password"  > 
                        </div> 
                        <div class="form-group">
                            <label for=" " class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" required data-parsley-equalto="#change-password" placeholder="Re-Type Password" />
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
                $(".parsley-examples").parsley()
            }), $(function() {
                $("#demo-form").parsley().on("field:validated", function() {
                    var e = 0 === $(".parsley-error").length;
                    $(".alert-info").toggleClass("d-none", !e), $(".alert-warning").toggleClass("d-none", e)
                }).on("form:submit", function() {
                    return !1
                })
            });
 
            var table = $('#user-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url: 'user/get_all',  
                },
                columns    : [ 
                    { data: 'id' },  
                    {
                        data  : 'firstname',
                        render: function(data, type, row, meta){  
                            var first_name  = row.firstname.toLowerCase();  
                            return  first_name.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ")  
                        }
                    }, 
                    {
                        data  : 'middlename',
                        render: function(data, type, row, meta){   
                            if(row.middlename !== null){
                                var middlename  = row.middlename.toLowerCase();  
                                return  middlename.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ")  
                            }else{
                                return "";
                            }
                                
                        }
                    },    
                    {
                        data  : 'lastname',
                        render: function(data, type, row, meta){   
                            var lastname  = row.lastname.toLowerCase();  
                            return  lastname.split(" ").map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ")  
                        }
                    }, 
                    { data: 'username' }, 
                    { data: 'email' }, 
                    { data: 'group' }, 
                    {
                        data  : 'created_at',
                        render: function(data, type, row, meta){ 
                            return moment(data.date).format('MMM. D, YYYY H:mm:ss a');
                            
                        }
                    },   
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
                                            <a data-id="'+row.id+'" class="dropdown-item text-warning" href="#" id="edit-user-button">\
                                                <i class="mdi mdi-grease-pencil"></i>\
                                                <span class="nav-text">Edit Details</span>\
                                            </a>\
                                            <a data-id="'+row.id+'" class="dropdown-item text-primary" href="#" id="change-password-button" >\
                                                <i class="mdi mdi-account-cog-outline"></i>\
                                                <span class="nav-text">Change Password</span>\
                                            </a>\
                                            <a data-id="'+row.id+'" class="dropdown-item text-danger" href="#" id="delete-user-button">\
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

            
            $(document).on('submit', '#add-new-user-form', function(e){ 
                e.preventDefault();    
                var _this = $(this) 
                $.ajax({
                    url     : 'user/insert',
                    method  : "post", 
                    data    : $("#add-new-user-form").serialize(),
                    dataType: "json", 
                    success : function (data) { 
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })

                            table.ajax.reload()
                            $("#add-new-user-form")[0].reset()
                            $('#add-new-user-modal').modal('hide')
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

            
            $(document).on('click', '#change-password-button', function(e){ 
                e.preventDefault(); 
                var id = $(this).data('id')
                $('#change-password-modal').modal('show') 
                $('#update-password-form input[name="id"]').val(id) 

            }); 

            $(document).on('click', '#edit-user-button', function(e){ 
                e.preventDefault(); 
                $('#edit-user-modal').modal('show') 

                var id = $(this).data('id')
                $.ajax({
                    url     : 'user/get/' + id,
                    method  : "get",
                    dataType: "json", 
                    success : function (data) {  
                        $('#update-user-form input[name="id"]').val(data.id)
                        $('#update-user-form input[name="firstname"]').val(data.firstname)
                        $('#update-user-form input[name="middlename"]').val(data.middlename)
                        $('#update-user-form input[name="lastname"]').val(data.lastname)
                        $('#update-user-form input[name="email"]').val(data.email)
                        $('#update-user-form input[name="username"]').val(data.username) 
                        $('#update-user-form select[name="group"]').val(data.group)
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 

            
            $(document).on('submit', '#update-user-form', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url     : 'user/update',
                    method  : "post", 
                    data    : $("#update-user-form").serialize(),
                    dataType: "json", 
                    success : function (data) {  
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })
                            table.ajax.reload() 
                            $('#edit-user-modal').modal('hide')
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

            
            $(document).on('submit', '#update-password-form', function(e){ 
                e.preventDefault();    
                var _this = $(this) 
                $.ajax({
                    url     : 'user/update_password',
                    method  : "post", 
                    data    : $("#update-password-form").serialize(),
                    dataType: "json", 
                    success : function (data) {   
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })
                            table.ajax.reload() 
                            $('#change-password-modal').modal('hide')
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

            

            $(document).on('click', '#delete-user-button', function(e){ 
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
                                                    url     : 'user/delete/' + id,
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

