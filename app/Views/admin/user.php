<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>

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
                            <th>Username</th> 
                            <th>Created At</th>
                        </tr>
                    </thead> 
                </table> 
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <!-- add modal form -->
    <div class="modal fade" id="add-new-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-new-user-form"> 
                    <div class="modal-body ">
                        <div class="form-group">
                            <label for=" " class="form-label">Username</label>
                            <input type="text" name="username" class="form-control"  placeholder="Username" required> 
                        </div> 
                        <div class="form-group">
                            <label for=" " class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"  placeholder="Email" required> 
                        </div>  
                        <div class="form-group">
                            <label for=" " class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"  placeholder="Password" required> 
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
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="update-user-form"> 
                    <div class="modal-body ">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="field-1" class="form-label">user Name</label>
                            <input type="text" class="form-control" name="user_name"  placeholder="user Name" required> 
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
            var table = $('#user-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'user/get_all',  
                },
                columns: [ 
                    { data: 'id' }, 
                    { data: 'username' },   
                    {
                        data  : 'created_at',
                        render: function(data, type, row, meta){ 
                            return moment(data.date).format('MMM. D, YYYY H:mm:ss a');
                            
                        }
                    },
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
                                            <a data-id="'+row.ID+'" class="dropdown-item text-warning" href="#" id="edit-user-button">\
                                                <i class="mdi mdi-grease-pencil"></i>\
                                                <span class="nav-text">Edit Details</span>\
                                            </a>\
                                            <a data-id="'+row.ID+'" class="dropdown-item text-danger" href="#" id="delete-user-button">\
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
                    url:  'user/insert',
                    method: "post", 
                    data: $("#add-new-user-form").serialize(),
                    dataType: "json", 
                    success: function (data) {  
                        console.log(data)
                        // if(data.response){ 
                        //     Swal.fire({
                        //         title:"Good job!",
                        //         text: data.message,
                        //         icon:"success"
                        //     })

                        //     table.ajax.reload()
                        //     $("#add-new-user-form")[0].reset()
                        // }else{  
                        //     Swal.fire({
                        //         title:"Insert Error!",
                        //         text: data.message,
                        //         icon:"error"
                        //     }) 
                        // }
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 


            $(document).on('click', '#edit-user-button', function(e){ 
                e.preventDefault(); 
                $('#edit-user-modal').modal('show') 

                var id = $(this).data('id')
                $.ajax({
                    url:  'user/get/' + id,
                    method: "get",
                    dataType: "json", 
                    success: function (data) { 
                        $('#update-user-form input[name="id"]').val(data.ID)
                        $('#update-user-form input[name="user_name"]').val(data.userName)
                        $('#update-user-form select[name="manager"]').val(data.Manager)
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 

            
            $(document).on('submit', '#update-user-form', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url:  'user/update',
                    method: "post", 
                    data: $("#update-user-form").serialize(),
                    dataType: "json", 
                    success: function (data) { 
                        if(data.response){ 
                            Swal.fire({
                                title:"Good job!",
                                text: data.message,
                                icon:"success"
                            })
                            table.ajax.reload() 
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

            }); 

            

            $(document).on('click', '#delete-user-button', function(e){ 
                e.preventDefault();  

                var id = $(this).data('id')
                
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1
                }).then(function(e) { 
                    if(e.value){ 
                        $.ajax({
                            url:  'user/delete/' + id,
                            method: "post",  
                            dataType: "json", 
                            success: function (data) {  
                                if(data.response){ 
                                    Swal.fire({
                                        title:"Good job!",
                                        text: data.message,
                                        icon:"success"
                                    })
                                    table.ajax.reload() 
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

