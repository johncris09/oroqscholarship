<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>

    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title"><?= $page_title; ?></h4> 

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

<?= $this->endSection() ?>
