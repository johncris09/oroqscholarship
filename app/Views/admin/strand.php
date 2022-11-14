<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>

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

    
    <!-- Center modal content -->
    <div class="modal fade" id="add-new-strand-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-new-strand-form"> 
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col-md-12"> 
                                <label for="field-1" class="form-label">Strand</label>
                                <input type="text" class="form-control"  placeholder="Strand"> 
                            </div> 
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>


<?= $this->section('schooljs') ?>

    <script>
        $(document).ready(function() { 
            $('#strand-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
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
