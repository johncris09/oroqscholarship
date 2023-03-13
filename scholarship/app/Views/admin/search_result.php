<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white"> 
                    <h4 class="header-title"><?= $page_title; ?> for <i>'<?php echo $for; ?>'</i></h4>  
                </div>
                <div class="card-body"> 
                    <table id="search-result-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr> 
                                <th>Name</th> 
                                <th>School</th> 
                                <th>Address</th>
                                <th>Year Level</th>
                                <th>Availment</th>
                                <th>Semester</th>
                                <th>School Year</th>
                                <th>Status</th> 
                                <th>Source</th> 
                            </tr>
                        </thead> 
                        <tbody> 
                            <?php 
                            $shs_school_model = new \App\Models\SchoolModel(); 
                            $college_school_model = new \App\Models\CollegeSchoolModel();
                            $school_name = "";

                            if(!empty($result)){
                               
                                foreach($result as $row){
                                    $name       = ucwords( $row->lastname. ", "  . $row->firstname . " "  . $row->middlename . " " . " "  . $row->suffix); 
                                    $source     = strtoupper($row->source);
                                    $availment  = $row->availment;
                                    $sy         = $row->sy;
                                    $address    = ucwords($row->address);
                                    $year_level = $row->yearlevel;
                                    $sem        = $row->sem;
                                    $status     = $row->status;
                                    // $school     = $row->school;

                                    if(strtolower($source) == "senior high"){
                                        $school = $shs_school_model->find($row->school);
                                        $school_name = $school['school_name'];
                                    }

                                    if(strtolower($source) == "college" || strtolower($source) == "tvet" ){
                                        $school = $college_school_model->find($row->school);
                                        $school_name = $school['school_name']; 
                                    }
                            ?>
                                    <tr>
                                        <td><?php echo $name;  ?></td>
                                        <td><?php echo $school_name;  ?></td>
                                        <td><?php echo $address;  ?></td>
                                        <td><?php echo $year_level;  ?></td>
                                        <td><?php echo $availment;  ?></td> 
                                        <td><?php echo $sem;  ?></td>
                                        <td><?php echo $sy;  ?></td> 
                                        <td><?php echo $status ?></td>
                                        <td><?php echo $source ?></td>
                                    </tr>
                            <?php 
                                } 
                            }else{
                            ?>
                                <tr>
                                    <td colspan="8" class="text-center">No result</td>
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
