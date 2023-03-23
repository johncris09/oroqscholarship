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
                                            <h1 style="text-decoration: underline"> <?= $profile['appnoyear'] ?> - <?=  $profile['appnosem'] ?> -  <?= $profile['appnoid'] ?></span> </h1> 
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status</label>
                                            <h1 style="text-decoration: underline" ><?= $profile['appstatus']; ?></h1> 
                                        </div>
                                    </div>
                                </div> 
                                <hr>
                                <div class="col-9">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" value="<?= $profile['lastname'] ?>" class="form-control text-capitalize"   >
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" value="<?= $profile['firstname'] ?>" class="form-control text-capitalize" >
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" value="<?= $profile['middlename'] ?>" class="form-control text-capitalize"   >
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" value="<?= $profile['suffix'] ?>" class="form-control text-capitalize" >
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-12">  
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" value="<?= $profile['address'] ?>" class="form-control text-capitalize" > 
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col"> 
                                            <label for="birthdate"  class="form-label">Date of Birth</label>
                                            <input type="text" value="<?= $profile['birthdate'] ?>"  class="form-control"    >
                                        </div>
                                        <div class="col-2">
                                            <?php  
                                                // Set the birthdate string in yyyy-mm-dd format
                                                $birthdate = date('Y-m-d', strtotime($profile['birthdate'])) ; 
                                                
                                                // Create a DateTime object from the birthdate string
                                                $birthdateObj = new DateTime($birthdate);

                                                // Get the current date as a DateTime object
                                                $currentDateObj = new DateTime();

                                                // Calculate the difference between the two dates in years
                                                $age = $birthdateObj->diff($currentDateObj)->y;

                                            ?>
                                            
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" value="<?= $age; ?>" class="form-control"  readonly>
                                        </div>
                                        <div class="col"> 
                                            <label for="civil_status" class="form-label">Civil Status</label>
                                            <input type="text" value="<?= $profile['civil_status']; ?>" class="form-control"   readonly> 
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Sex</label>
                                            <input type="text" value="<?= $profile['gender']; ?>" class="form-control"   readonly>  
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="contact_no" class="form-label">Contact #</label>
                                            <input type="text" value="<?= $profile['contact_no'] ?>" class="form-control"   >
                                        </div>
                                        <div class="col-6">
                                            <label for="ctc_no" class="form-label">CTC #</label>
                                            <input type="text" value="<?= $profile['ctc_no'] ?>" class="form-control"  >
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="email" class="form-label">Facebook/Other</label>
                                            <input type="text" value="<?= $profile['email'] ?>" class="form-control" >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment</label>
                                            <input type="number" value="<?= $profile['availment'] ?>" class="form-control"  >
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-3">    
                                    <img src="<?= !empty($profile['profile_photo']) ? base_url(). "/".  $profile['profile_photo']  : base_url()."/public/img/select-image.png" ?>"  class="rounded mx-auto d-block" alt="Profile Photo"   />   
                                </div>
                            </div> 
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="school" class="form-label">School</label>
                                    <input type="text" value="<?= $profile['school_name'] ?>" class="form-control"   > 
                                </div>
                                <div class="col">
                                    <label for="strand" class="form-label">Strand</label>
                                    <input type="text" value="<?= $profile['course'] ?>" class="form-control"   >  
                                </div> 
                            </div> 
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="school_address" class="form-label">School Address </label> 
                                    <input type="text" value="<?= $profile['school_address'] ?>" class="form-control"   >  
                                </div>
                            </div> 
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="grade_level" class="form-label">Grade Level</label>
                                    <input type="text" value="<?= $profile['appyear'] ?>" class="form-control"   >   
                                </div>
                                <div class="col">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" value="<?= $profile['appsem'] ?>" class="form-control"   >    
                                </div> 
                                <div class="col">
                                    <label for="school_year" class="form-label">SY</label>
                                    <input type="text" value="<?= $profile['appsy'] ?>" class="form-control"   >  
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="father_name" class="form-label">Father's  Name</label>
                                    <input type="text" value="<?= $profile['father_name'] ?>" class="form-control text-capitalize"   >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['father_occupation'] ?>" class="form-control text-capitalize"  >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" value="<?= $profile['mother_name'] ?>" class="form-control text-capitalize"  >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['mother_occupation'] ?>" class="form-control text-capitalize"   >
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
                                            <h1 style="text-decoration: underline"> <?= $profile['appnoyear'] ?> - <?=  $profile['appnosem'] ?> -  <?= $profile['appnoid'] ?></span> </h1> 
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status</label>
                                            <h1 style="text-decoration: underline" ><?= $profile['appstatus']; ?></h1> 
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <hr>
                            <div class="row"> 
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" value="<?= $profile['lastname']; ?>" class="form-control text-capitalize"  >
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" value="<?= $profile['firstname']; ?>" class="form-control text-capitalize">
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" value="<?= $profile['middlename']; ?>" class="form-control text-capitalize" >
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" value="<?= $profile['suffix']; ?>" class="form-control text-capitalize" >
                                        </div> 
                                    </div>
                                    <div class="row"> 
                                        <div class="col-12">  
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" value="<?= $profile['address']; ?>" class="form-control text-capitalize" > 
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="birthdate"  class="form-label">Date of Birth</label>
                                            <input type="text"  value="<?= $profile['birthdate'] ?>"  class="form-control"  >
                                        </div>
                                        <div class="col-2"> 
                                            <?php  
                                                // Set the birthdate string in yyyy-mm-dd format
                                                $birthdate = date('Y-m-d', strtotime($profile['birthdate'])) ; 
                                                
                                                // Create a DateTime object from the birthdate string
                                                $birthdateObj = new DateTime($birthdate);

                                                // Get the current date as a DateTime object
                                                $currentDateObj = new DateTime();

                                                // Calculate the difference between the two dates in years
                                                $age = $birthdateObj->diff($currentDateObj)->y;

                                            ?>
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" value="<?= $age; ?>" class="form-control"    readonly>
                                        </div>
                                        <div class="col">
                                            <label for="civil_status" class="form-label">Civil Status</label>
                                            <input type="text" value="<?= $profile['civil_status']; ?>" class="form-control text-capitalize" >  
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Sex</label>
                                            <input type="text" value="<?= $profile['gender']; ?>" class="form-control text-capitalize" >   
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="contact_no" class="form-label">Contact #</label>
                                            <input type="text" value="<?= $profile['contact_no'] ?>" class="form-control"   >
                                        </div>
                                        <div class="col-6">
                                            <label for="ctc_no" class="form-label">CTC #</label>
                                            <input type="text" value="<?= $profile['ctc_no'] ?>" class="form-control"  >
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="email" class="form-label">Facebook/Other</label>
                                            <input type="text" value="<?= $profile['email'] ?>" class="form-control" >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment</label>
                                            <input type="number" value="<?= $profile['availment'] ?>" class="form-control"  >
                                        </div> 
                                    </div> 
                                </div>
                                <div class="col-3">    
                                    <img src="<?= !empty($profile['profile_photo']) ?  base_url(). "/". $profile['profile_photo']  : base_url()."/public/img/select-image.png" ?>"  class="rounded mx-auto d-block" alt="Profile Photo"   />   
                                </div>
                            </div>
                                
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School</label>
                                    <input type="text" value="<?= $profile['school']; ?>" class="form-control text-capitalize" >    
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Course</label>
                                    <input type="text" value="<?= $profile['course']; ?>" class="form-control text-capitalize" >  
                                </div> 
                            </div> 
                            <div class="row g-3" >
                                <div class="col"> 
                                    <label for="school_address" class="form-label">School Address </label> 
                                    <input type="text" value="<?= $profile['school_address'] ?>" class="form-control text-capitalize"   >
                                </div>
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="year_level" class="form-label">Year Level</label>
                                    <input type="text" value="<?= $profile['appyear']; ?>" class="form-control text-capitalize" >     
                                </div>
                                <div class="col">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" value="<?= $profile['appsem']; ?>" class="form-control text-capitalize" >  
                                </div>
                                <div class="col">
                                    <label for="units" class="form-label">Units</label>
                                    <input type="number" value="<?= $profile['unit'] ?>" class="form-control"  >
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">SY</label>
                                    <input type="text" value="<?= $profile['appsy']; ?>" class="form-control text-capitalize" >   
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="father_name" class="form-label">Father's  Name</label>
                                    <input type="text" value="<?= $profile['father_name'] ?>"  class="form-control text-capitalize"   >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['father_occupation'] ?>"  class="form-control text-capitalize"  >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" value="<?= $profile['mother_name'] ?>"  class="form-control text-capitalize"  >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['mother_occupation'] ?>"  class="form-control text-capitalize"   >
                                </div> 
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
                                            <h1 style="text-decoration: underline"> <?= $profile['appnoyear'] ?> - <?=  $profile['appnosem'] ?> -  <?= $profile['appnoid'] ?></span> </h1> 
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status</label>
                                            <h1 style="text-decoration: underline" ><?= $profile['appstatus']; ?></h1> 
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <hr>
                            <div class="row"> 
                                <div class="col-9">
                                    <div class="row"> 
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" value="<?= $profile['lastname']; ?>" class="form-control text-capitalize"  >
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" value="<?= $profile['firstname']; ?>" class="form-control text-capitalize">
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" value="<?= $profile['middlename']; ?>" class="form-control text-capitalize" >
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" value="<?= $profile['suffix']; ?>" class="form-control text-capitalize" >
                                        </div>  
                                    </div>
                                    <div class="row"> 
                                        <div class="col-12">  
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" value="<?= $profile['address']; ?>" class="form-control text-capitalize" > 
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="birthdate"  class="form-label">Date of Birth</label>
                                            <input type="text"  value="<?= $profile['birthdate'] ?>"  class="form-control"  >
                                        </div>
                                        <div class="col-2"> 
                                            <?php  
                                                // Set the birthdate string in yyyy-mm-dd format
                                                $birthdate = date('Y-m-d', strtotime($profile['birthdate'])) ; 
                                                
                                                // Create a DateTime object from the birthdate string
                                                $birthdateObj = new DateTime($birthdate);

                                                // Get the current date as a DateTime object
                                                $currentDateObj = new DateTime();

                                                // Calculate the difference between the two dates in years
                                                $age = $birthdateObj->diff($currentDateObj)->y;

                                            ?>
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" value="<?= $age ?>" class="form-control"    readonly>
                                        </div>
                                        <div class="col">
                                            <label for="civil_status" class="form-label">Civil Status</label>
                                            <input type="text" value="<?= $profile['civil_status']; ?>" class="form-control text-capitalize" >  
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Sex</label>
                                            <input type="text" value="<?= $profile['gender']; ?>" class="form-control text-capitalize" >  
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="contact_no" class="form-label">Contact #</label>
                                            <input type="text" value="<?= $profile['contact_no'] ?>" class="form-control"   >
                                        </div>
                                        <div class="col-6">
                                            <label for="ctc_no" class="form-label">CTC #</label>
                                            <input type="text" value="<?= $profile['ctc_no'] ?>" class="form-control"  >
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="email" class="form-label">Facebook/Other</label>
                                            <input type="text" value="<?= $profile['email'] ?>" class="form-control" >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment</label>
                                            <input type="number" value="<?= $profile['availment'] ?>" class="form-control"  >
                                        </div> 
                                    </div> 
                                </div>
                                <div class="col-3">    
                                    <img src="<?= !empty($profile['profile_photo']) ? base_url(). "/". $profile['profile_photo']  : base_url()."/public/img/select-image.png" ?>"  class="rounded mx-auto d-block" alt="Profile Photo"   />   
                                </div>
                            </div>
                                
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School</label> 
                                    <input type="text" value="<?= $profile['school_name']; ?>" class="form-control text-capitalize" >   
                                </div>
                                <div class="col"> 
                                    <label for="" class="form-label">Course</label>
                                    <input type="text" value="<?= $profile['course']; ?>" class="form-control text-capitalize" >    
                                </div> 
                            </div> 
                            <div class="row g-3" > 
                                <div class="col">
                                    <label for="year_level" class="form-label">Year Level</label>
                                    <input type="text" value="<?= $profile['appyear']; ?>" class="form-control text-capitalize" >    
                                </div>
                                <div class="col">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="text" value="<?= $profile['appsem']; ?>" class="form-control text-capitalize" >  
                                </div>
                                <div class="col">
                                    <label for="units" class="form-label">No. of Hours</label>
                                    <input type="number" value="<?= $profile['unit'] ?>" class="form-control"  >
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">SY</label>
                                    <input type="text" value="<?= $profile['appsy']; ?>" class="form-control text-capitalize" >  
                                </div>
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="father_name" class="form-label">Father's  Name</label>
                                    <input type="text" value="<?= $profile['father_name'] ?>"  class="form-control text-capitalize"   >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['father_occupation'] ?>"  class="form-control text-capitalize"  >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" value="<?= $profile['mother_name'] ?>"  class="form-control text-capitalize"  >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" value="<?= $profile['mother_occupation'] ?>"  class="form-control text-capitalize"   >
                                </div> 
                            </div>  
                        </form> 
                <?php
                    }
                ?>    
                </div>
            </div> 
        </div> 
    </div>
    



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() { 

            
            $('input').attr('readonly', true); 
            $('input').css("cursor","pointer"); 
            $('select option:not(:selected)').prop('disabled', true);
            $('select').attr("style", "pointer-events: none;"); 
 
        });
    </script>

<?= $this->endSection() ?>
