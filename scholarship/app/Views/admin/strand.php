<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class=" float-end"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-strand-modal">Add New</button>
                    </div>
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div>
                <div class="card-body">
                    <table id="strand-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr> 
                                <th>Action</th> 
                                <th>Strand</th> 
                                <th>Manager</th>
                            </tr>
                        </thead> 
                    </table>
                    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    
    
    <!-- add modal form -->
    <div class="modal fade" id="add-new-strand-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-new-strand-form"> 
                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="field-1" class="form-label">Strand <span class="text-danger">*</span></label>
                            <input type="text" name="strand" class="form-control"  placeholder="Strand" required> 
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
    <div class="modal fade" id="edit-strand-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="update-strand-form"> 
                    <div class="modal-body ">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="field-1" class="form-label">Strand</label>
                            <input type="text" name="strand" class="form-control"  placeholder="Strand" required> 
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
            var table = $('#strand-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url: 'strand/get_all',  
                }, 
                columns: [ 
                    { data: 'ID' },  
                    { data: 'Strand' },  
                    { data: 'Manager' },  
                ], 
                columnDefs: [
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
                                            <a data-id="'+row.ID+'" class="dropdown-item text-warning" href="#" id="edit-strand-button">\
                                                <i class="mdi mdi-grease-pencil"></i>\
                                                <span class="nav-text">Edit Details</span>\
                                            </a>\
                                            <a data-id="'+row.ID+'" class="dropdown-item text-danger" href="#" id="delete-strand-button">\
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


            
            $(document).on('submit', '#add-new-strand-form', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url     : 'strand/insert',
                    method  : "post", 
                    data    : $("#add-new-strand-form").serialize(),
                    dataType: "json", 
                    success : function (data) {  
                        console.info(data)
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })

                            table.ajax.reload()
                            $("#add-new-strand-form")[0].reset()
                            $('#add-new-strand-modal').modal('hide')
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


            $(document).on('click', '#edit-strand-button', function(e){ 
                e.preventDefault(); 
                $('#edit-strand-modal').modal('show') 

                var id = $(this).data('id')
                $.ajax({
                    url     : 'strand/get/' + id,
                    method  : "get",
                    dataType: "json", 
                    success : function (data) {  
                        $('#update-strand-form input[name="id"]').val(data.ID)
                        $('#update-strand-form input[name="strand"]').val(data.Strand)
                        $('#update-strand-form select[name="manager"]').val(data.Manager)
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 

            
            $(document).on('submit', '#update-strand-form', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url     : 'strand/update',
                    method  : "post", 
                    data    : $("#update-strand-form").serialize(),
                    dataType: "json", 
                    success : function (data) { 
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })
                            table.ajax.reload()
                            $('#edit-strand-modal').modal('hide')
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

            

            $(document).on('click', '#delete-strand-button', function(e){ 
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
                                                    url     : 'strand/delete/' + id,
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
