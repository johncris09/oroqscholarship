<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white"> 
                    <h4 class="header-title"><?= $page_title; ?> for '<?php echo $for; ?>'</h4>  
                </div>
                <div class="card-body"> 
                    <table id="search-result-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr> 
                                <th>Name</th> 
                                <th>Address</th>
                                <th>Year Level</th>
                                <th>Availment</th>
                                <th>Semester</th>
                                <th>School Year</th>
                                <th>Source</th> 
                            </tr>
                        </thead> 
                        <tbody>
                            <?php 
                            if(!empty($result)){
                               
                                foreach($result as $row){
                                    $name       = ucwords( $row->AppLastName. ", "  . $row->AppFirstName . " "  . $row->AppMidIn . " " . " "  . $row->AppSuffix); 
                                    $source     = strtoupper($row->source);
                                    $availment  = $row->AppAvailment;
                                    $sy         = $row->AppSY;
                                    $address    = ucwords($row->AppAddress);
                                    $year_level = $row->AppYear;
                                    $sem        = $row->AppSem;
                            ?>
                                    <tr>
                                        <td><?php echo $name;  ?></td>
                                        <td><?php echo $address;  ?></td>
                                        <td><?php echo $year_level;  ?></td>
                                        <td><?php echo $availment;  ?></td> 
                                        <td><?php echo $sem;  ?></td>
                                        <td><?php echo $sy;  ?></td> 
                                        <td><?php echo $source ?></td>
                                    </tr>
                            <?php 
                                } 
                            }else{
                            ?>
                                <tr>
                                    <td colspan="7">No result</td>
                                </tr>
                            <?php
                            }
                            ?>
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

            var table = $('#search-result-table').DataTable({});

        });
    </script>

<?= $this->endSection() ?>
