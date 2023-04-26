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
                        <a target="_blank" href="<?= $preview  ?>?<?= $query_string ?>&column=<?= implode(', ', $column) ?>"  class="btn btn-primary"> <i class="mdi mdi-printer"></i> Print Preview</a>
                    </div> 
                </div>
                <div class="card-body"> 
                    <div class="text-center">   
                        <h4><?= $semester ?> Semester List of <?= $status ?> <?= $scholarship_type ?> Scholarship Applicants for SY: <?=  str_replace("SY: ", "", $school_year);  ?></h4>
                    </div>
                    <table id="report-table" class="table table-striped table-inverse table-responsive">
                        <thead class="bg-primary text-white">
                            <tr>
                                <?php echo in_array("no", $column) ? "<th>No.</th>"  : ""  ?>
                                <?php echo in_array("name", $column) ? "<th>Name</th>"  : ""  ?>
                                <?php echo in_array("address", $column) ? "<th>Address</th>"  : ""  ?> 
                                <?php 
                                    if(in_array('strand', $column)){ 
                                        if(in_array( $scholarship_type  ,['College', 'TVET'])){
                                            echo  "<th>Course</th>" ;
                                        }else{ 
                                            echo  "<th>Strand</th>" ;
                                        }
                                    }
                                ?>
                                <?php echo in_array("year_level", $column) ? "<th>Year Level</th>"  : ""  ?>
                                <?php echo in_array("school", $column) ? "<th>School</th>"  : ""  ?> 
                                <?php echo in_array("contact_number", $column) ? "<th>Contact No.</th>"  : ""  ?>  
                                <?php echo in_array("availment", $column) ? "<th>Availment</th>"  : ""  ?>   
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $counter = 1; 
                                foreach($result as $row){ 
                                    if(in_array( $scholarship_type  ,['College', 'TVET'])){
                                        $contact    = in_array($row->contact_no, ["-", null, "None", "" ]) ? "": $row->contact_no;
                                        $name       = ucwords( $row->lastname . ", "  . $row->firstname . " "  . $row->middlename. " " . " "  . $row->suffix) ; 
                                        $address    = $row->address;
                                        $year_level = $row->appyear;
                                        $school     = $row->school_name;
                                        $availment  = $row->availment;
                                    }else{
                                        $contact    = in_array($row->contact_no, ["-", null, "None", "" ]) ? ""  : $row->contact_no;
                                        $name       = ucwords( $row->lastname . ", "  . $row->firstname . " "  . $row->middlename . " " . " "  . $row->suffix);
                                        $address    = $row->address;
                                        $course     = $row->strand;
                                        $year_level = $row->appyear;
                                        $school     = $row->school_name;
                                        $availment  = $row->availment;
                                    }

                                    if(in_array( $scholarship_type  ,['TVET'])){ 
                                        $course     = $row->course_name;
                                    }else if(in_array( $scholarship_type  ,['College'])){
                                        $course     = $row->course;
                                    }
                                    
                                    
                            ?>
                                <tr>
                                    
                                    <?php echo in_array("no", $column) ? "<td>".$counter++."</td>"  : ""  ?>
                                    <?php echo in_array("name", $column) ? "<td>".$name."</td>"  : ""  ?> 
                                    <?php echo in_array("address", $column) ? "<td>".$address."</td>"  : ""  ?>  
                                    <?php echo in_array("strand", $column) ? "<td>".$course."</td>"  : ""  ?>  
                                    <?php echo in_array("year_level", $column) ? "<td>".$year_level."</td>"  : ""  ?> 
                                    <?php echo in_array("school", $column) ? "<td>".$school."</td>"  : ""  ?> 
                                    <?php echo in_array("contact_number", $column) ? "<td>".$contact."</td>"  : ""  ?> 
                                    <?php echo in_array("availment", $column) ? "<td>".$availment."</td>"  : ""  ?>  
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
                searching: false,   
                info: false,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="mdi mdi-file-excel"></i> Excel',
                        className: 'btn btn-success btn-sm',
                        action: function ( e, dt, button, config ) {
                            if (confirm('Are you sure you want to export to Excel?')) {
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
                            }
                        }
                    }
                ]
            }); 

        });
    </script>

<?= $this->endSection() ?>
