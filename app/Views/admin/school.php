<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>

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
                            <th>Manager</th>
                        </tr>
                    </thead> 
                </table> 
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->

    <!-- Center modal content -->
    <div class="modal fade" id="add-new-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-new-school-form"> 
                    <div class="modal-body ">
                        <div class="form-group">
                            <label for="field-1" class="form-label">School Name</label>
                            <input type="text" class="form-control"  placeholder="School Name" required> 
                        </div> 
                        <div class="form-group">
                            <label for="field-1" class="form-label">Manager</label>
                            <select class="form-control" name="" id="" required>
                                <option>Select</option>
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

<?= $this->section('schooljs') ?>

    <script>
        $(document).ready(function() {
            $('#school-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'school/get_all',  
                },
                columns: [ 
                    { data: 'ID' },  
                    { data: 'SchoolName' },  
                    { data: 'Manager' },  
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
                                            <a class="dropdown-item text-warning" href="#">\
                                                <i class="mdi mdi-grease-pencil"></i>\
                                                <span class="nav-text">Edit Details</span>\
                                            </a>\
                                            <a class="dropdown-item text-danger" href="#">\
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

        });
    </script>

<?= $this->endSection() ?>

