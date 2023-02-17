<?= $this->extend('layout/layout') ?>  

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?>
    <style>
        #frameShs:hover, #frameCollege:hover, #frameTvet:hover{
            cursor: pointer;
        }

        form img {
            margin-top: 50px;
            display: block;
            max-width: 260px; 
            height: 260px;
            background: transparent;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 10px; 
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
  
    </style>
<?= $this->endSection() ?> 

<?= $this->section('main') ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4"><?= $page_title; ?></h4> 
                    <?php
                        if($type == "shs"){
                    ?>     
 
                        <form id="senior-high-registration-form" class="validation-form"> 
                            <div class="row"> 
                                <div class="col-12">
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <label for="" class="form-label">App No. </label>
                                            <h1 style="text-decoration: underline"> <?= $profile['AppNoYear'] ?> - <?=  $profile['AppNoSem'] ?> -  <?= $profile['AppNoID'] ?></span> </h1> 
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                            <h1 style="text-decoration: underline" class="status <?= in_array(strtolower($profile['AppStatus']), ['pending','disapproved']) ? 'text-danger' : ''  ?>"><?= $profile['AppStatus']; ?></h1> 
                                        </div>
                                    </div>
                                </div> 
                                <hr>
                                <div class="col-9">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['AppLastName'] ?>" class="form-control text-capitalize"  name="lastname" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['AppFirstName'] ?>" class="form-control text-capitalize" name="firstname"  required>
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" value="<?= $profile['AppMidIn'] ?>" class="form-control text-capitalize"   name="middlename">
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" value="<?= $profile['AppSuffix'] ?>" class="form-control text-capitalize" name="suffix">
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-12">  
                                            <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                            <select class="form-control" name="address"   required>
                                                <option value="">Select</option> 
                                                <?php 
                                                    foreach($barangay as $row){
                                                        if($row == $profile['AppAddress']){
                                                            $selected  = "selected";
                                                        }else{ 
                                                            $selected  = "";
                                                        }
                                                ?> 
                                                    <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col"> 
                                            <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['AppDOB'] ?>"  class="form-control"   name="birthdate" required >
                                        </div>
                                        <div class="col-2">
                                            <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                            <input type="number" value="<?= $profile['AppAge'] ?>" class="form-control" name="age" readonly>
                                        </div>
                                        <div class="col">
                                            <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                            <select class="form-control"  name="civil_status" required>
                                                <option value="">Select</option> 
                                                <?php 
                                                    foreach($civil_status as $row){
                                                        if($row == $profile['AppCivilStat']){
                                                            $selected  = "selected";
                                                        }else{ 
                                                            $selected  = "";
                                                        }
                                                ?> 
                                                    <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                <?php } ?> 
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Sex <?= $required_field; ?></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select</option> 
                                                <option <?= strtolower($profile['AppGender'])=="male" ? "selected" : ""; ?>  value="Male">Male</option>
                                                <option <?= strtolower($profile['AppGender'])=="female" ? "selected" : ""; ?> value="Female">Female</option>  
                                            </select>
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="contact_no" class="form-label">Contact #</label>
                                            <input type="text" value="<?= $profile['AppContact'] ?>" class="form-control"   name="contact_no">
                                        </div>
                                        <div class="col-6">
                                            <label for="ctc_no" class="form-label">CTC # <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['AppCTC'] ?>" class="form-control"   name="ctc_no" required>
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="email" class="form-label">Facebook/Other</label>
                                            <input type="text" value="<?= $profile['AppEmailAdd'] ?>" class="form-control" name="email"  >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment <?= $required_field; ?></label>
                                            <input type="number" value="<?= $profile['AppAvailment'] ?>" class="form-control" name="availment" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-3 123123asdfasdf">    
                                    <img src="<?= !empty($profile['AppImage']) ?  base_url() .'/'. $profile['AppImage']  : base_url()."/public/img/select-image.png" ?>"  class="rounded mx-auto d-block" alt="Profile Photo"   />   
                                </div>
                            </div>
                            
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="school" class="form-label">School <?= $required_field; ?></label>
                                    <select class="form-control" id="school" name="school" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($school as $row){  
                                                if($row['SchoolName'] == $profile['AppSchool']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row['SchoolName']  ?>"><?= $row['SchoolName']  ?></option>  
                                        <?php } ?>  
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="strand" class="form-label">Strand <?= $required_field; ?></label>
                                    <select class="form-control"  name="strand" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($strand as $row){  
                                                if($row['Strand'] == $profile['AppCourse']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?>   
                                            <option <?= $selected ?> value="<?= $row['Strand']  ?>"><?= $row['Strand']  ?></option>  
                                        <?php } ?>   
                                    </select>
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="grade_level" class="form-label">Grade Level <?= $required_field; ?></label>
                                    <select class="form-control"  name="grade_level"  required>
                                        <option value="">Select</option>  
                                        <?php 
                                            foreach($grade_level as $row){  
                                                if($row  == $profile['AppYear']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?>   
                                            <option <?= $selected ?> value="<?= $row   ?>"><?= $row  ?></option>  
                                        <?php } ?>   
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="semester" class="form-label">Semester <?= $required_field; ?></label>
                                    <select class="form-control"   name="semester"  required>
                                        <option value="">Select</option>  
                                        <?php 
                                            foreach($semester as $row){  
                                                if($row  == $profile['AppSem']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?>   
                                            <option <?= $selected ?> value="<?= $row   ?>"><?= $row  ?></option>  
                                        <?php } ?>   
                                    </select>
                                </div> 
                                <div class="col">
                                    <label for="school_year" class="form-label">SY <?= $required_field; ?></label>
                                    <select class="form-control"   name="school_year"  required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach(range(2017, date('Y')) as $year){  
                                                $sy   ="SY: " . $year . "-" . ($year + 1);
                                                if($sy  == $profile['AppSY']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?>  
                                            <option <?= $selected ?> value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
                                        <?php } ?>  
                                    </select>
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="father_name" class="form-label">Father's  Name</label>
                                    <input type="text" value="<?= $profile['AppFather'] ?>" class="form-control text-capitalize"   name="father_name" >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['AppFatherOccu'] ?>" class="form-control text-capitalize"  name="father_occupation" >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" value="<?= $profile['AppMother'] ?>" class="form-control text-capitalize" name="mother_name" >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['AppMotherOccu'] ?>" class="form-control text-capitalize"  name="mother_occupation" >
                                </div> 
                            </div>  
                            <div class="row  mt-3" >  
                                <div class="col-12  float-left">  
                                    <?php
                                        if( !in_array( strtolower(auth()->user()->groups[0]), ["user"])){
                                    ?>  
                                            <button type="button" data-method="update_shs" data-id="<?= $profile["ID"] ?>"  class="btn btn-primary rounded-pill approve-applicant-button">Approved</button>  
                                            <button type="button" data-method="update_shs" data-id="<?= $profile["ID"] ?>" class="btn btn-danger rounded-pill disapprove-applicant-button">Disapproved</button>  
                                    <?php
                                        }
                                    ?>  
                                </div>
                            </div>  
                        </form>    
                <?php
                    }else if($type == "college"){
                ?>
                
                        <form id="college-registration-form" class="validation-form">
                            <div class="row"> 
                                <div class="col-12">
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <label for="" class="form-label">App No. </label> 
                                            <h1 style="text-decoration: underline"> <?= $profile['colAppNoYear'] ?> - <?=  $profile['colAppNoSem'] ?> -  <?= $profile['colAppNoID'] ?></span> </h1> 
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                            <h1 style="text-decoration: underline" class="status <?= in_array(strtolower($profile['colAppStat']), ['pending','disapproved']) ? 'text-danger' : ''  ?>"><?= $profile['colAppStat']; ?></h1> 
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <hr>
                            <div class="row"> 
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['colLastName']; ?>" class="form-control text-capitalize" name="lastname" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['colFirstName']; ?>" class="form-control text-capitalize" name="firstname" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" value="<?= $profile['colMI']; ?>" class="form-control text-capitalize" name="middlename">
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" value="<?= $profile['colSuffix']; ?>" class="form-control text-capitalize" name="suffix">
                                        </div> 
                                    </div>
                                    <div class="row"> 
                                        <div class="col-12">  
                                            <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                            <select class="form-control" name="address"   required>
                                                <option value="">Select</option> 
                                                <?php 
                                                    foreach($barangay as $row){
                                                        if($row == $profile['colAddress']){
                                                            $selected  = "selected";
                                                        }else{ 
                                                            $selected  = "";
                                                        }
                                                ?> 
                                                    <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                            <input type="text"  value="<?= $profile['colDOB'] ?>"  class="form-control" name="birthdate" required >
                                        </div>
                                        <div class="col-2">
                                            <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                            <input type="number" value="<?= $profile['colAge'] ?>" class="form-control" name="age"   readonly>
                                        </div>
                                        <div class="col">
                                            <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                            <select class="form-control"  name="civil_status" required>
                                                <option value="">Select</option> 
                                                <?php 
                                                    foreach($civil_status as $row){
                                                        if($row == $profile['colCivilStat']){
                                                            $selected  = "selected";
                                                        }else{ 
                                                            $selected  = "";
                                                        }
                                                ?> 
                                                    <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                <?php } ?> 
                                            </select> 
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Sex <?= $required_field; ?></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select</option> 
                                                <option <?= strtolower($profile['colGender'])=="male" ? "selected" : ""; ?>  value="Male">Male</option>
                                                <option <?= strtolower($profile['colGender'])=="female" ? "selected" : ""; ?> value="Female">Female</option>  
                                            </select> 
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="contact_no" class="form-label">Contact #</label>
                                            <input type="text" value="<?= $profile['colContactNo'] ?>" class="form-control"   name="contact_no">
                                        </div>
                                        <div class="col-6">
                                            <label for="ctc_no" class="form-label">CTC # <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['colCTC'] ?>" class="form-control"   name="ctc_no" required>
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="email" class="form-label">Facebook/Other</label>
                                            <input type="text" value="<?= $profile['colEmailAdd'] ?>" class="form-control" name="email"  >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment <?= $required_field; ?></label>
                                            <input type="number" value="<?= $profile['colAvailment'] ?>" class="form-control" name="availment" required>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="col-3">    
                                    <img src="<?= !empty($profile['colImage']) ?  base_url() .'/'. $profile['colImage']  : base_url()."/public/img/select-image.png" ?>"  class="rounded mx-auto d-block" alt="Profile Photo"   />   
                                </div>
                            </div>
                                
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School <?= $required_field; ?></label>
                                    <select class="form-control" id="school" name="school" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($college_school as $row){  
                                                if($row['colSchoolName'] == $profile['colSchool']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                        <?php } ?>  
                                    </select> 
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Course <?= $required_field; ?></label>
                                    <select class="form-control" name="course" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($course as $row){  
                                                if($row['colCourse'] == $profile['colCourse']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row['colCourse']  ?>"><?= $row['colCourse']  ?></option>  
                                        <?php } ?>  
                                    </select> 
                                </div> 
                            </div> 
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="school_address" class="form-label">School Address </label> 
                                    <input type="text" value="<?= $profile['colSchoolAddress'] ?>" class="form-control text-capitalize" name="school_address"  >
                                </div>
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="year_level" class="form-label">Year Level <?= $required_field; ?></label>
                                    <select class="form-control" name="year_level" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($year_level as $row){  
                                                if($row == $profile['colYearLevel']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row  ?>"><?= $row  ?></option>  
                                        <?php } ?>  
                                    </select>  
                                </div>
                                <div class="col">
                                    <label for="semester" class="form-label">Semester <?= $required_field; ?></label>
                                    <select class="form-control"  name="semester" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($semester as $row){  
                                                if($row == $profile['colSem']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row  ?>"><?= $row  ?></option>  
                                        <?php } ?>  
                                    </select>  
                                </div>
                                <div class="col">
                                    <label for="units" class="form-label">Units <?= $required_field; ?></label>
                                    <input type="number" value="<?= $profile['colUnits'] ?>" class="form-control" name="units" required>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">SY <?= $required_field; ?></label>
                                    <select class="form-control" name="school_year" required> 
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach(range(2017, date('Y')) as $year){  
                                                $sy   ="SY: " . $year . "-" . ($year + 1);
                                                if($sy  == $profile['colSY']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?>  
                                            <option <?= $selected ?> value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
                                        <?php } ?>  
                                    </select> 
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="father_name" class="form-label">Father's  Name</label>
                                    <input type="text" value="<?= $profile['colFathersName'] ?>"  class="form-control text-capitalize"   name="father_name" >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['colFatherOccu'] ?>"  class="form-control text-capitalize"  name="father_occupation" >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" value="<?= $profile['colMothersName'] ?>"  class="form-control text-capitalize" name="mother_name" >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['colMotherOccu'] ?>"  class="form-control text-capitalize"  name="mother_occupation" >
                                </div> 
                            </div> 
                            <div class="row  mt-3" >   
                                <?php
                                    if( !in_array( strtolower(auth()->user()->groups[0]), ["user"])){
                                ?>  
                                    <button type="button" data-method="update_college" data-id="<?= $profile["ID"] ?>"  class="btn btn-primary rounded-pill approve-applicant-button">Approved</button>  
                                    <button type="button" data-method="update_college" data-id="<?= $profile["ID"] ?>" class="btn btn-danger rounded-pill disapprove-applicant-button">Disapproved</button> 
                                    
                                <?php
                                    }
                                ?>   
                            </div>    
                        </form>
                <?php

                    }else if($type == "tvet"){
                ?>
                        
                        <form id="tvet-registration-form" class="validation-form">
                            <div class="row"> 
                                <div class="col-12">
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <label for="" class="form-label">App No. </label>
                                            <h1 style="text-decoration: underline"> <?= $profile['colAppNoYear'] ?> - <?=  $profile['colAppNoSem'] ?> -  <?= $profile['colAppNoID'] ?></span> </h1> 
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                            <h1 style="text-decoration: underline" class="status <?= in_array(strtolower($profile['colAppStat']), ['pending','disapproved']) ? 'text-danger' : ''  ?>"><?= $profile['colAppStat']; ?></h1> 
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <hr>
                            <div class="row"> 
                                <div class="col-9">
                                    <div class="row"> 
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['colLastName']; ?>" class="form-control text-capitalize" name="lastname" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['colFirstName']; ?>" class="form-control text-capitalize" name="firstname" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" value="<?= $profile['colMI']; ?>" class="form-control text-capitalize" name="middlename">
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" value="<?= $profile['colSuffix']; ?>" class="form-control text-capitalize" name="suffix">
                                        </div>  
                                    </div>
                                    <div class="row"> 
                                        <div class="col-12">  
                                            <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                            <select class="form-control" name="address"   required>
                                                <option value="">Select</option> 
                                                <?php 
                                                    foreach($barangay as $row){
                                                        if($row == $profile['colAddress']){
                                                            $selected  = "selected";
                                                        }else{ 
                                                            $selected  = "";
                                                        }
                                                ?> 
                                                    <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                <?php } ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                            <input type="text"  value="<?= $profile['colDOB'] ?>"  class="form-control" name="birthdate" required >
                                        </div>
                                        <div class="col-2">
                                            <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                            <input type="number" value="<?= $profile['colAge'] ?>" class="form-control" name="age"   readonly>
                                        </div>
                                        <div class="col">
                                            <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                            <select class="form-control"  name="civil_status" required>
                                                <option value="">Select</option> 
                                                <?php 
                                                    foreach($civil_status as $row){
                                                        if($row == $profile['colCivilStat']){
                                                            $selected  = "selected";
                                                        }else{ 
                                                            $selected  = "";
                                                        }
                                                ?> 
                                                    <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                <?php } ?> 
                                            </select> 
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Sex <?= $required_field; ?></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="">Select</option> 
                                                <option <?= strtolower($profile['colGender'])=="male" ? "selected" : ""; ?>  value="Male">Male</option>
                                                <option <?= strtolower($profile['colGender'])=="female" ? "selected" : ""; ?> value="Female">Female</option>  
                                            </select> 
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="contact_no" class="form-label">Contact #</label>
                                            <input type="text" value="<?= $profile['colContactNo'] ?>" class="form-control"   name="contact_no">
                                        </div>
                                        <div class="col-6">
                                            <label for="ctc_no" class="form-label">CTC # <?= $required_field; ?></label>
                                            <input type="text" value="<?= $profile['colCTC'] ?>" class="form-control"   name="ctc_no" required>
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="email" class="form-label">Facebook/Other</label>
                                            <input type="text" value="<?= $profile['colEmailAdd'] ?>" class="form-control" name="email"  >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment <?= $required_field; ?></label>
                                            <input type="number" value="<?= $profile['colAvailment'] ?>" class="form-control" name="availment" required>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="col-3 asdfasdfad">    
                                    <img src="<?= !empty($profile['colImage']) ?  base_url() .'/'. $profile['colImage']  : base_url()."/public/img/select-image.png" ?>"  class="rounded mx-auto d-block" alt="Profile Photo"   />   
                                </div>
                            </div>
                                
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School <?= $required_field; ?></label>
                                    <select class="form-control" id="school" name="school" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($college_school as $row){  
                                                if($row['colSchoolName'] == $profile['colSchool']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                        <?php } ?>  
                                    </select> 
                                </div>
                                <div class="col"> 
                                    <label for="" class="form-label">Course <?= $required_field; ?></label>
                                    <select class="form-control" name="course" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($course as $row){  
                                                if($row['colCourse'] == $profile['colCourse']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row['colCourse']  ?>"><?= $row['colCourse']  ?></option>  
                                        <?php } ?>  
                                    </select> 
                                </div> 
                            </div> 
                            <div class="row g-3" > 
                                <div class="col">
                                    <label for="year_level" class="form-label">Year Level <?= $required_field; ?></label>
                                    <select class="form-control" name="year_level" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($year_level as $row){  
                                                if($row == $profile['colYearLevel']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row  ?>"><?= $row  ?></option>  
                                        <?php } ?>  
                                    </select>  
                                </div>
                                <div class="col">
                                    <label for="semester" class="form-label">Semester <?= $required_field; ?></label>
                                    <select class="form-control"  name="semester" required>
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach($semester as $row){  
                                                if($row == $profile['colSem']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?> 
                                            <option <?= $selected ?> value="<?= $row  ?>"><?= $row  ?></option>  
                                        <?php } ?>  
                                    </select>  
                                </div>
                                <div class="col">
                                    <label for="units" class="form-label">No. of Hourse <?= $required_field; ?></label>
                                    <input type="number" value="<?= $profile['colUnits'] ?>" class="form-control" name="units" required>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">SY <?= $required_field; ?></label>
                                    <select class="form-control" name="school_year" required> 
                                        <option value="">Select</option> 
                                        <?php 
                                            foreach(range(2017, date('Y')) as $year){  
                                                $sy   ="SY: " . $year . "-" . ($year + 1);
                                                if($sy  == $profile['colSY']){
                                                    $selected  = "selected";
                                                }else{ 
                                                    $selected  = "";
                                                }
                                        ?>  
                                            <option <?= $selected ?> value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
                                        <?php } ?>  
                                    </select> 
                                </div>
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="father_name" class="form-label">Father's  Name</label>
                                    <input type="text" value="<?= $profile['colFathersName'] ?>"  class="form-control text-capitalize"   name="father_name" >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['colFatherOccu'] ?>"  class="form-control text-capitalize"  name="father_occupation" >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" value="<?= $profile['colMothersName'] ?>"  class="form-control text-capitalize" name="mother_name" >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['colMotherOccu'] ?>"  class="form-control text-capitalize"  name="mother_occupation" >
                                </div> 
                            </div>
                            <div class="row  mt-3" >   
                                <div class="col-12  float-left">  
                                    <?php
                                        if( !in_array( strtolower(auth()->user()->groups[0]), ["user"])){
                                    ?>  
                                        <button type="button" data-method="update_tvet" data-id="<?= $profile["ID"] ?>"  class="btn btn-primary rounded-pill approve-applicant-button">Approved</button>  
                                        <button type="button" data-method="update_tvet" data-id="<?= $profile["ID"] ?>" class="btn btn-danger rounded-pill disapprove-applicant-button">Disapproved</button> 
                                        
                                    <?php
                                        }
                                    ?>   
                                </div>
                            </div>   
                        </form> 
                <?php
                    }
                ?>    
                </div>
            </div> <!-- end card-->
        </div> <!-- end col --> 
    </div>
    



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() { 

            
            $('input').attr('readonly', true); 
            $('input').css("cursor","pointer"); 
            $('select option:not(:selected)').prop('disabled', true);
            $('select').attr("style", "pointer-events: none;"); 
            
            
            
            $(document).on('click', '.approve-applicant-button', function(e){ 
                e.preventDefault();   
                var id     = $(this).data('id')
                var method = $(this).data('method')  
                Swal.fire({
                    title             : "Approve Applicant?", 
                    icon              : "question",
                    showCancelButton  : !0,
                    confirmButtonText : "Yes, Approve it!",
                    cancelButtonText  : "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                    buttonsStyling    : !1
                }).then(function(e) {  
                    if(e.value){ 
                        $.ajax({
                            url     : '/pending/' + method,  
                            method  : "post",
                            dataType: "json", 
                            data    : {
                                id : id,
                                status : "Approved",
                            },  
                            success : function (data) { 
                                if(data.response){ 
                                    Swal.fire({
                                        title: "Good job!",
                                        text : data.message,
                                        icon : "success"
                                    }) 
                                    $('.status').html('Approved')
                                    $('.status').removeClass('text-danger')
                                    $('.status').addClass('text-primary')
                                }else{ 
                                    Swal.fire({
                                        title:"Update Error!",
                                        text: data.message,
                                        icon:"error"
                                    }) 
                                }

                            },
                            error   : function (xhr, status, error) { 
                                console.info(xhr.responseText);
                            }
                        });  
                     
                    }
                }) 
            });  

            
            $(document).on('click', '.disapprove-applicant-button', function(e){ 
                e.preventDefault();  

                var id = $(this).data('id')
                var method = $(this).data('method') 
                
                Swal.fire({
                    title             : "Dissaprove Applicant?", 
                    icon              : "question",
                    showCancelButton  : !0,
                    confirmButtonText : "Yes, Dissaprove it!",
                    cancelButtonText  : "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                    buttonsStyling    : !1
                }).then(function(e) {  
                    if(e.value){ 
                        $.ajax({
                            url     : '/pending/' + method,  
                            method  : "post",
                            dataType: "json", 
                            data    : {
                                id    : id,
                                status: "Disapproved",
                            },  
                            success : function (data) {  
                                console.info(data)
                                if(data.response){ 
                                    Swal.fire({
                                        title: "Good job!",
                                        text : data.message,
                                        icon : "success"
                                    }) 
                                    $('.status').html('Disapproved') 
                                }else{ 
                                    Swal.fire({
                                        title: "Update Error!",
                                        text : data.message,
                                        icon : "error"
                                    }) 
                                }
                            },
                            error   : function (xhr, status, error) { 
                                console.info(xhr.responseText);
                            }
                        });  
                     
                    }
                }) 
            });  




        });
    </script>

<?= $this->endSection() ?>
