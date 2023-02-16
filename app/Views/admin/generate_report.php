<?= $this->extend('layout/layout') ?>  

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?>
    <style>
        #frameShs:hover, #frameCollege:hover, #frameTvet:hover{
            cursor: pointer;
        }

        
        input[name="age"]:hover{
            cursor: not-allowed;
        } 

        .image_area {
            position: relative;
            /* border: 5px solid black; */
        }

        .close{ 
            /* display:block; */ 
            position:absolute; 
            right: 5px;
            top: 5px;
            color: red;
            border-radius: 50%; 
            font-size: 20px;
            box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;

        }

        .close:hover{
            cursor: pointer;
        }
        

        form img {
            display: block;
            max-width: 100%; 
            background: transparent;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 10px; 
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        #uploaded_image_shs, #uploaded_image_college, #uploaded_image_tvet{
            
            width: 300px; 
            height: 300px;
        }

        .preview {
            overflow: hidden;
            width: 160px; 
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg{
            max-width: 1000px !important;
        }

        .overlay {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.5);
            overflow: hidden;
            height: 0;
            transition: .5s ease;
            width: 100%;
        }

        .image_area:hover .overlay {
            height: 50%;
            cursor: pointer;
        }

        .text {
            color: #333;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

    </style>

<?= $this->endSection() ?> 

<?= $this->section('main') ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4"><?= $page_title; ?></h4>

                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link  active  ">
                                Senior High School
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                College
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                TVET
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content"> 
                        <div class="tab-pane active" id="senior-high-tab">  
                            <form action="generate_report/shs_report" method="get">
                                <div class="row justify-content-center">
                                    <div class="col-9">  
                                        <label for="school" class="form-label">School</label>
                                        <select class="form-control" id="school" name="school" >
                                            <option value="">Select</option> 
                                            <?php foreach($school as $row):?> 
                                                <?php if($row['SchoolName'] != ""):?> 
                                                    <option value="<?= $row['SchoolName']  ?>"><?= $row['SchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-3">   
                                        <label for="semester" class="form-label">Semester</label>
                                        <select class="form-control"   name="semester"  >
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                    <div class="col-3">   
                                        <label for="school_year" class="form-label">SY</label>
                                        <select class="form-control"   name="school_year"  >
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y'), $year_started) as $year):?>  
                                                <option value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-3">   
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control"  name="status" >
                                            <option value="">Select</option> 
                                            <?php  foreach($scholar_status as $row){   ?> 
                                                <option  value="<?= $row ?>"><?= $row ?></option>  
                                            <?php } ?> 
                                        </select>  
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <label for="availment" class="form-label">Availment</label>
                                        <input type="number" min="1" max="8" step="1" class="form-control" name="availment" >
                                    </div>  
                                    <div class="col-3">
                                        <label for="gender" class="form-label">Sex</label>
                                        <select class="form-control" id="gender" name="gender" >
                                            <option value="">Select</option> 
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option>  
                                        </select>
                                    </div> 
                                    <div class="col-3">
                                        <label for="year_level" class="form-label">Year Level</label>
                                        <select class="form-control" name="year_level" >
                                            <option value="">Select</option> 
                                            <?php foreach($grade_level as $row):?>  
                                                <option value="<?= $row ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <label for="address" class="form-label">Address</label>
                                        <select class="form-control" name="address"   >
                                            <option value="">Select</option> 
                                            <?php foreach($barangay as $row):?> 
                                                <option value="<?= $row ?>"><?= $row ?></option>  
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <label for="app_no_year" class="form-label">App No</label> 
                                        <select class="form-control" name="app_no_year"   >
                                            <option value="">Select</option> 
                                            <?php 
                                                $year_now = date('Y');
                                                for($i=$year_now; $i>= 2015; $i--){ ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php 
                                                }
                                            ?> 
                                        </select>   
                                    </div>  
                                    <div class="col-2">
                                        <label class="form-label">Semester </label>
                                        <input type="number" class="form-control semester" readonly>
                                    </div> 
                                    <div class="col-2">
                                        <label for="from" class="form-label">From </label>
                                        <input type="number" class="form-control" id="from" name="from" >
                                    </div> 
                                    <div class="col-2">
                                        <label for="to" class="form-label">To </label>
                                        <input type="number" class="form-control" id="to" name="to" >
                                    </div>  
                                </div> 
                                <div class="row justify-content-center mt-3">
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill">Generate</button> 
                                    </div>   
                                </div>    
                            </form>
                        </div>
                        <div class="tab-pane  " id="college-tab">   
                            <form action="generate_report/college_report" method="get">
                                <div class="row justify-content-center">
                                    <div class="col-9">  
                                        <label for="school" class="form-label">School</label>
                                        <select class="form-control" name="school" >
                                            <option value="">Select</option> 
                                            <?php foreach($college_school as $row):?> 
                                                <?php if($row['colSchoolName'] != ""):?> 
                                                    <option value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-3">   
                                        <label for="semester" class="form-label">Semester</label>
                                        <select class="form-control"   name="semester"  >
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                    <div class="col-3">   
                                        <label for="school_year" class="form-label">SY</label>
                                        <select class="form-control"   name="school_year"  >
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y'), $year_started) as $year):?>  
                                                <option value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-3">   
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control"  name="status" >
                                            <option value="">Select</option> 
                                            <?php  foreach($scholar_status as $row){   ?> 
                                                <option  value="<?= $row ?>"><?= $row ?></option>  
                                            <?php } ?> 
                                        </select>  
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <label for="availment" class="form-label">Availment</label>
                                        <input type="number" min="1" max="8" step="1" class="form-control" name="availment" >
                                    </div>  
                                    <div class="col-3">
                                        <label for="gender" class="form-label">Sex</label>
                                        <select class="form-control" id="gender" name="gender" >
                                            <option value="">Select</option> 
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option>  
                                        </select>
                                    </div> 
                                    <div class="col-3">
                                        <label for="year_level" class="form-label">Year Level</label>
                                        <select class="form-control" name="year_level" >
                                            <option value="">Select</option> 
                                            <?php foreach($year_level as $row):?>  
                                                <option value="<?= $row ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <label for="address" class="form-label">Address</label>
                                        <select class="form-control" name="address"   >
                                            <option value="">Select</option> 
                                            <?php foreach($barangay as $row):?> 
                                                <option value="<?= $row ?>"><?= $row ?></option>  
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <label for="app_no_year" class="form-label">App No</label> 
                                        <select class="form-control" name="app_no_year"   >
                                            <option value="">Select</option> 
                                            <?php 
                                                $year_now = date('Y');
                                                for($i=$year_now; $i>= 2015; $i--){ ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php 
                                                }
                                            ?> 
                                        </select>   
                                    </div>  
                                    <div class="col-2">
                                        <label class="form-label">Semester </label>
                                        <input type="number" class="form-control semester" readonly>
                                    </div> 
                                    <div class="col-2">
                                        <label for="from" class="form-label">From </label>
                                        <input type="number" class="form-control" id="from" name="from" >
                                    </div> 
                                    <div class="col-2">
                                        <label for="to" class="form-label">To </label>
                                        <input type="number" class="form-control" id="to" name="to" >
                                    </div>  
                                </div> 
                                <div class="row justify-content-center mt-3">
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill">Generate</button> 
                                    </div>   
                                </div>    
                            </form>

                        </div>
                        
                        <div class="tab-pane  show " id="tvet-tab">  
                            <form action="generate_report/tvet_report" method="get">
                                <div class="row justify-content-center">
                                    <div class="col-9">  
                                        <label for="school" class="form-label">School</label>
                                        <select class="form-control" name="school" >
                                            <option value="">Select</option> 
                                            <?php foreach($college_school as $row):?> 
                                                <?php if($row['colSchoolName'] != ""):?> 
                                                    <option value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-3">   
                                        <label for="semester" class="form-label">Semester</label>
                                        <select class="form-control"   name="semester"  >
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                    <div class="col-3">   
                                        <label for="school_year" class="form-label">SY</label>
                                        <select class="form-control"   name="school_year"  >
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y'), $year_started) as $year):?>  
                                                <option value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-3">   
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control"  name="status" >
                                            <option value="">Select</option> 
                                            <?php  foreach($scholar_status as $row){   ?> 
                                                <option  value="<?= $row ?>"><?= $row ?></option>  
                                            <?php } ?> 
                                        </select>  
                                    </div>
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <label for="availment" class="form-label">Availment</label>
                                        <input type="number" min="1" max="8" step="1" class="form-control" name="availment" >
                                    </div>  
                                    <div class="col-3">
                                        <label for="gender" class="form-label">Sex</label>
                                        <select class="form-control" id="gender" name="gender" >
                                            <option value="">Select</option> 
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option>  
                                        </select>
                                    </div> 
                                    <div class="col-3">
                                        <label for="year_level" class="form-label">Year Level</label>
                                        <select class="form-control" name="year_level" >
                                            <option value="">Select</option> 
                                            <?php foreach($year_level as $row):?>  
                                                <option value="<?= $row ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-9">
                                        <label for="address" class="form-label">Address</label>
                                        <select class="form-control" name="address"   >
                                            <option value="">Select</option> 
                                            <?php foreach($barangay as $row):?> 
                                                <option value="<?= $row ?>"><?= $row ?></option>  
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <label for="app_no_year" class="form-label">App No</label> 
                                        <select class="form-control" name="app_no_year"   >
                                            <option value="">Select</option> 
                                            <?php 
                                                $year_now = date('Y');
                                                for($i=$year_now; $i>= 2015; $i--){ ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php 
                                                }
                                            ?> 
                                        </select>   
                                    </div>  
                                    <div class="col-2">
                                        <label class="form-label">Semester </label>
                                        <input type="number" class="form-control semester" readonly>
                                    </div> 
                                    <div class="col-2">
                                        <label for="from" class="form-label">From </label>
                                        <input type="number" class="form-control" id="from" name="from" >
                                    </div> 
                                    <div class="col-2">
                                        <label for="to" class="form-label">To </label>
                                        <input type="number" class="form-control" id="to" name="to" >
                                    </div>  
                                </div> 
                                <div class="row justify-content-center mt-3">
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary btn-block rounded-pill">Generate</button> 
                                    </div>   
                                </div>    
                            </form>
                             

                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col --> 
    </div>
    



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

        
    <script> 

        $(document).ready(function(){

            $('input[name=availment]').focusout(function() { 
                var max = $(this).val();
                if (max > 9) {
                    $(this).val(1);
                    alert("Please input only 1-8");
                }
            });
            
            $('select[name="semester"]').on('change', function(){  
                $(this).closest("div.active").find('input.semester').val(
                    ($(this).val() !== "") ?
                        ($(this).val() == "1st") ? 1: 2
                    : ""
                ) 
            })
        });
    </script>

<?= $this->endSection() ?>
