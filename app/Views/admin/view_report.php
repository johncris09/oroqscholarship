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
                        <button type="button" id="print" class="btn btn-primary"> <i class="mdi mdi-printer"></i> Print</button>
                    </div>
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div>
                <div class="card-body"> 
                    <div class="text-center">  
                        <h1 class="header">Header</h1>
                        <h4><?= $semester ?> Semester List of <?= $status ?> <?= $scholarship_type ?> Scholarship Applicants for SY: <?= $school_year ?></h4>
                    </div>
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Strand</th>
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
                                    $name = $row->AppLastName . ", "  . $row->AppLastName . " "  . $row->AppMidIn . " " . " "  . $row->AppSuffix ;
                                    $contact = in_array($row->AppContact, ["-", null, "None", "" ]) ? "" : $row->AppContact;
                                    
                            ?>
                                <tr>
                                    <td><?= $counter++; ?></td>
                                    <td><?= $name ?></td> 
                                    <td><?= $row->AppAddress ?></td> 
                                    <td><?= $row->AppCourse ?></td> 
                                    <td><?= $row->AppYear ?></td> 
                                    <td><?= $row->AppSchool ?></td> 
                                    <td><?= $contact ?></td> 
                                    <td><?= $row->AppAvailment ?></td> 
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
            $('#print').on('click', function(){ 
                $('.card-body').printThis();
            })
        });
    </script>

<?= $this->endSection() ?>
