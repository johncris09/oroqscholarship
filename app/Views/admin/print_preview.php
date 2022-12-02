
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $this->renderSection('title') ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= '/img/favicon.ico' ?>"> 
		<!-- App css -->
        <?= link_tag('css/bootstrap.min.css'); ?>
        <?= link_tag('css/app.min.css'); ?>  
		<!-- icons -->
        <?= link_tag('css/icons.min.css'); ?>  
        <style>

            
            header
            {
                text-align: center;
                padding: 40px 0;  
                border-radius: 10px;
                /* position: rela1tive; */
                width: 100%; 
                text-align: center; 
            }
            header img { 
                position: relative;
                page-break-before: auto;
                /* left: 15px;
                top: 35px; */
                width: 110px;
                height: 110px;
            } 

            header .sub-header{
                background-color: #009EFF;  
                margin-top: 20px;
                padding-top: 2px;
                padding-bottom: 2px;
            }

            table.report-container {
                page-break-after:always;
            }
            thead.report-header {
                display:table-header-group;
            }
            tfoot.report-footer {
                display:table-footer-group;
            } 
            table.report-container div.article {
                page-break-inside: avoid;
            }

            .table-header{
                background-color: #3B44F6;
                color: white;
            }

            .sub-header{
                background-color: #009EFF;  
                /* margin-top: 1px !important;  */
                padding-top: 1px;
                padding-bottom: 1px;
            }

            .img-container{
                background-image: url('<?= base_url() ?>/img/logo-sm.png');
            }
            @media print {  
                .sub-header{
                    background-color: #009EFF !important;  
                    color: red;
                    margin-top: 1px; 
                }   
                footer {
                    bottom: 0;
                    position: fixed;
                }
                body {
                    background-color: white !important;   
                    /* margin-left: -115px !important; */
                }
                .img-container{
                    background-image: url('<?= base_url() ?>/img/logo-sm.png');
                }
                @page {
                    size: auto;
                    margin-top: 0;
                    margin-bottom: 0; 
                    margin-left: -115px ;
                }
            } 

        </style>
    </head>
    <body>  
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="report-container">
                    <thead class="report-header">
                        <tr>
                            <th class="report-header-cell"> 
                                <header>
                                    <div class="img-container"></div>
                                    <h3>Republic of the Philippines</h3>
                                    <h4>Office of the City Mayor</h4> 
                                    <h5>Oroquieta City</h5>
                                    <h6 class="text-danger">City oF Good Life</h6> 
                                    <div class="sub-header"  >   
                                        <h5><?= $semester ?> Semester List of <?= $status ?> <?= $scholarship_type ?> Scholarship Applicants for SY: <?= $school_year ?></h5>
                                    </div>  

                                </header>
                            </th>
                        </tr>
                    </thead>
                    <tfoot class="report-footer">
                    <tr>
                        <td class="report-footer-cell">
                            <div class="footer-info">
                                <p>Printed By: <?= auth()->user()->firstname . " " . auth()->user()->lastname ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Printed on: <?= date('F j, Y') ?></p>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody class="report-content">
                        <tr>
                            <td class="report-content-cell">
                                <div class="main">
                                <table class="table">
                                    <thead class="table-header text-nowrap" >
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
                                                    $name = ucwords( $row->colLastName . ", "  . $row->colFirstName . " "  . $row->colMI . " " . " "  . $row->colSuffix) ; 
                                                    $address = $row->colAddress;
                                                    $course = $row->colCourse;
                                                    $year_level =  $row->colYearLevel;
                                                    $school =  $row->colSchool;
                                                    $availment =  $row->colAvailment;
                                                }else{
                                                    $contact = in_array($row->AppContact, ["-", null, "None", "" ]) ? "" : $row->AppContact;
                                                    $name = ucwords( $row->AppLastName . ", "  . $row->AppFirstName . " "  . $row->AppMidIn . " " . " "  . $row->AppSuffix ); 
                                                    $address = $row->AppAddress;
                                                    $course = $row->AppCourse;
                                                    $year_level =  $row->AppYear;
                                                    $school =  $row->AppSchool;
                                                    $availment =  $row->AppAvailment;
                                                }
                                                
                                        ?>
                                            <tr> 
                                                <tr>
                                                    <td><?= $counter++; ?></td>
                                                    <td class="text-nowrap"><?= $name ?></td> 
                                                    <td class="text-nowrap"><?= $address ?></td> 
                                                    <td class="text-nowrap"><?= $course ?></td> 
                                                    <td class="text-nowrap"><?= $year_level ?></td> 
                                                    <td class="text-nowrap"><?= $school ?></td> 
                                                    <td><?= $contact ?></td> 
                                                    <td><?= $availment ?></td> 
                                                </tr>
                                                
                                            </tr>
                                            
                                        <?php   } ?> 
                                    </tbody>
                                </table> 
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
 
            <script>
                window.print()
            </script>
    </body> 
</html>