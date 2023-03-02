<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class=" float-end"> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-course-modal">Add New</button>
                    </div>
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div>
                <div class="card-body">  
                    <table id="log-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Description</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                use CodeIgniter\Shield\Models\UserModel; 
                                foreach ($logs as $log): ?>
                                <tr> 
                                    <td><?= $log->id ?></td>
                                    <td>
                                        <?php                    
                                            $user      = new UserModel();
                                            $user_info = $user->where('id',  $log->user_id)->first();
                                            $name      = ucwords( $user_info->firstname ." ". $user_info->middlename ." ". $user_info->lastname );
                                            echo $name; 
                                        ?>
                                    </td>
                                    <td><?= $log->description ?></td>
                                    <td><?= date('F d, Y h:i:s a', strtotime($log->created_at))  ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
 


<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>
 

<script>
        $(document).ready(function() {  

            var table = $('#log-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true,  
            }); 


             


        });
    </script>
<?= $this->endSection() ?>
