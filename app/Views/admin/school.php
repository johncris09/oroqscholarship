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
                            <th>School Name</th> 
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
                        <div class="row">
                            <div class="col-md-12"> 
                                <label for="field-1" class="form-label">School Name</label>
                                <input type="text" class="form-control"  placeholder="School Name"> 
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
