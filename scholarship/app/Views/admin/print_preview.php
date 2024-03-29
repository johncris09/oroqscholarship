<!DOCTYPE html>
<html>

<head>
  
    <meta charset="utf-8" />
    <title>Print Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url( '/public/img/favicon.ico' )?>">

    <style>
        /* Styles go here */
      .page-header, .page-header-space {
        height: 130px;
      }

      .page-footer, .page-footer-space {
        height: 50px;
      }

      .page-footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        border-top: 1px solid black;
      /* for demo */;
      }

      .page-header {
        position: fixed;
        top: 0mm;
        width: 100%;
        border-bottom: 1px solid black;
      /* for demo */;
      }

      .page {
        page-break-after: always;
      }

      .UpperTitle {
        text-align: center;
        position: rela1tive;
      }

      .UpperTitle img {
        position: absolute;
        left: 15px;
        top: 0px;
      }

      .header {
        line-height: 1px;
      }

      .page-footer p {
        display: flex;
        justify-content: space-between;
      }

      .for-approval p {
        display: flex;
        justify-content: space-between;
      }

      .text-nowrap {
        white-space: nowrap!important;
      }

      #report {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        line-height: 30px;
      }

      #report td, #report th {
        border: 1px solid #ddd;
        padding-left: 5px;
      }

      #report th {
        text-align: center;
        background-color: #4B7BE5;
        color: white;
      }

      .hidden {
        display: none;
      }

      @page {
        margin: 5mm;
      }

      @media print {
        thead {
          display: table-header-group;
        }

        tfoot {
          display: table-footer-group;
        }

        body {
          margin: 0;
        }

        .hidden {
          display: block;
        }
      }
    </style>
</head>

<body>

  <div class="page-header hidden" style="text-align: center"> 
      <div class="UpperTitle">
          <img src="<?=base_url()?>/public/img/logo-sm.png" width="100" height="100" alt=""> 
          <div class="header"> 
            <h2>Republic of the Philippines</h2>
            <h3>Office of the City Mayor</h3> 
            <h4>Oroquieta City</h4>
            <h6 class="text-danger">City oF Good Life</h6> 
            <div class="sub-header"  >   
                <h4><?= $semester ?> Semester List of <?= $status ?> <?= $scholarship_type ?> Scholarship Applicants for SY: <?= $school_year ?></h4>
            </div> 
          </div>
      </div> 
  </div>

  <div class="page-footer hidden">
    <p>
      <span>Printed By: <?= auth()->user()->firstname . " " . auth()->user()->lastname ?></span>
      <span>Printed on: <?= date('F j, Y') ?></span>
    </p> 

  </div> 
  <table>

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>  
          <div class="page" style="line-height: 3; ">
            <table class="table" id="report" style="width: 100%;">
              <thead >
                  <tr class="text-nowrap"> 
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
                              $name       = ucwords( $row->lastname . ", "  . $row->firstname . " "  . (!empty($row->middlename) ? $row->middlename[0]  : "") . ". " . " "  . $row->suffix ); 
                              $address    = $row->address;
                              $course     = $row->course;
                              $year_level = $row->appyear;
                              $school     = $row->school_name;
                              $availment  = $row->availment;
                          }else{
                              $contact    = in_array($row->contact_no, ["-", null, "None", "" ]) ? ""  : $row->contact_no; 
                              $name       = ucwords( $row->lastname . ", "  . $row->firstname . " "  . (!empty($row->middlename) ? $row->middlename[0]  : "") . ". " . " "  . $row->suffix ); 
                              $address    = $row->address;
                              $course     = $row->strand;
                              $year_level = $row->appyear;
                              $school     = $row->school_name;
                              $availment  = $row->availment;
                          }
                          
                  ?>
                      <tr> 
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
                      </tr>
                      
                  <?php   } ?> 
                  <tr   >
                    <td colspan="8" style="border-left: 0px;border-right: 0px;border-bottom: 0px;">
                      <br>
                      <p style="text-align: left">Recommended for Approval: </p>
                      <p style="text-align: right; font-weight:bolder; margin-right: 50px;">LEMUEL MEYRICK M. ACOSTA</p>
                      <p style="text-align: right; margin-right: 120px; margin-top: -30px;">City Mayor</p>
                      <p style="text-align: left">In behalf of the City Scholarship Screening Committee</p> <br>
                      <p style="text-align: left; font-weight:bolder; margin-left: 50px;">MARK ANTHONY D. ARTIGAS</p>
                      <p style="text-align: left; margin-left: 80px; margin-top: -30px;">Commitee Chairperson</p>
                    </td> 
                  </tr>
              </tbody>
          </table> 
          </div> 
        </td>
      </tr> 
    </tbody>

    <tfoot>
      <tr>
        <td> 
          <div class="page-footer-space">
             
          </div>
        </td>
      </tr>
    </tfoot>

  </table>
 

</body>

</html>