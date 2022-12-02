<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?>
    <style>  
     @media print {
        thead {
            word-wrap: break-word;
            overflow-wrap: break-word;
            background-color: red;
        }
    }
    </style>

<?= $this->endSection() ?> 

<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white"> 
                    <div class=" float-end"> 
                        <?php 
                            if(strtolower($scholarship_type ) == "senior high school"){
                                $preview = "shs_print_preview";
                            }else if(strtolower($scholarship_type ) == "college"){
                                $preview = "college_print_preview";

                            }else if(strtolower($scholarship_type ) == "tvet"){
                                $preview = "tvet_print_preview"; 
                            }

                        ?>
                        <a href="<?= $preview  ?>?<?= $_SERVER["QUERY_STRING"]  ?>"  class="btn btn-primary"> <i class="mdi mdi-printer"></i> Print Preview</a>
                    </div>
                    <!-- <h4 class="header-title"><?= $page_title; ?></h4>   -->
                </div>
                <div class="card-body"> 
                    <div class="text-center">   
                        <h4><?= $semester ?> Semester List of <?= $status ?> <?= $scholarship_type ?> Scholarship Applicants for SY: <?= $school_year ?></h4>
                    </div>
                    <table id="report-table" class="table table-striped table-inverse table-responsive">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th><?= in_array( $scholarship_type  ,['College', 'TVET']) ? "Course" :  "Strand" ?></th>
                                <th>Year Level</th>
                                <th>School</th>
                                <th>Contact No.</th>
                                <th>Availment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $counter = 1; 
                                foreach($result as $row){ 
                                    if(in_array( $scholarship_type  ,['College', 'TVET'])){
                                        $contact = in_array($row->colContactNo, ["-", null, "None", "" ]) ? "" : $row->colContactNo;
                                        $name = $row->colLastName . ", "  . $row->colFirstName . " "  . $row->colMI . " " . " "  . $row->colSuffix ; 
                                        $address = $row->colAddress;
                                        $course = $row->colCourse;
                                        $year_level =  $row->colYearLevel;
                                        $school =  $row->colSchool;
                                        $availment =  $row->colAvailment;
                                    }else{
                                        $contact = in_array($row->AppContact, ["-", null, "None", "" ]) ? "" : $row->AppContact;
                                        $name = $row->AppLastName . ", "  . $row->AppFirstName . " "  . $row->AppMidIn . " " . " "  . $row->AppSuffix ;
                                        $address = $row->AppAddress;
                                        $course = $row->AppCourse;
                                        $year_level =  $row->AppYear;
                                        $school =  $row->AppSchool;
                                        $availment =  $row->AppAvailment;
                                    }
                                    
                            ?>
                                <tr>
                                    <td><?= $counter++; ?></td>
                                    <td><?= $name ?></td> 
                                    <td><?= $address ?></td> 
                                    <td><?= $course ?></td> 
                                    <td><?= $year_level ?></td> 
                                    <td><?= $school ?></td> 
                                    <td><?= $contact ?></td> 
                                    <td><?= $availment ?></td> 
                                </tr>
                                
                            <?php   } ?> 
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
            var table = $('#report-table').DataTable( {
                searching: false,   info: false
            }); 

        });
    </script>

<?= $this->endSection() ?>
