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
                    <h4 class="header-title"><?= $page_title; ?></h4> 
                    <p class="sub-header font-13">
                        <code>Note: * is requiredfield</code>
                    </p>
                    <?php
                        if($type == "shs"){
                    ?>     
                            <form id="senior-high-form" class="validation-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <label for="" class="form-label">App No. </label>
                                            <h1 style="text-decoration: underline"> <?= $profile['appnoyear'] ?> - <?=  $profile['appnosem'] ?> -  <?= $profile['appnoid'] ?></span> </h1> 
                                                <input type="hidden" value="<?= $profile['id'] ?>"  name="id" readonly>
                                                <input type="hidden" value="<?= $profile['appnoyear'] ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $profile['appnosem'] ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $profile['appnoid'] ?>"  name="app_no_id" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <select class="form-control"  name="status" required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($scholar_status as $row){
                                                            if($row == $profile['appstatus']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php } ?> 
                                                </select> 
                                                <input type="hidden" value="<?= $profile['appmanager']  ?>" name="manager"   readonly>
                                            </div>
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="col-9"> 
                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                                <input type="text" value="<?= $profile['lastname'] ?>" class="form-control text-capitalize"  name="lastname" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                                <input type="text" value="<?= $profile['firstname'] ?>" class="form-control text-capitalize" name="firstname"  required>
                                            </div>
                                            <div class="col-2">
                                                <label for="middlename" class="form-label">M.I.</label>
                                                <input type="text" value="<?= $profile['middlename'] ?>" class="form-control text-capitalize"   name="middlename">
                                            </div>
                                            <div class="col-2">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" value="<?= $profile['suffix'] ?>" class="form-control text-capitalize" name="suffix">
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-12">  
                                                <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                                <select class="form-control" name="address"   required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($address as $row){
                                                            if($row['id'] == $profile['address_id']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['barangay'] ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col"> 
                                                <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                                <input type="text" value="<?= date("Y-m-d", strtotime($profile['birthdate'])) ?>" class="form-control"   name="birthdate" required >
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
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number"  value="<?= $age ?>"  class="form-control" name="age" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                                <select class="form-control"  name="civil_status" required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($civil_status as $row){
                                                            if($row == $profile['civil_status']){
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
                                                    <option <?= strtolower($profile['gender'])=="male" ? "selected" : ""; ?>  value="Male">Male</option>
                                                    <option <?= strtolower($profile['gender'])=="female" ? "selected" : ""; ?> value="Female">Female</option>  
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="contact_no" class="form-label">Contact #</label> 
                                                <input type="text" value="<?= $profile['contact_no'] ?>" class="form-control"  name="contact_no" placeholder="0000 000 0000" data-toggle="input-mask" data-mask-format="0900 000 0000"  > 
                                                <span class="font-13 text-muted">e.g "xxxx xxx xxxx"</span>
                                            </div>
                                            <div class="col-6">
                                                <label for="ctc_no" class="form-label">CTC # <?= $required_field; ?></label>
                                                <input type="text" value="<?= $profile['ctc_no'] ?>" class="form-control" name="ctc_no" required>
                                            </div> 
                                        </div> 
                                        <div class="row" >
                                            <div class="col-6">
                                                <label for="email" class="form-label">Facebook/Other</label>
                                                <input type="text" value="<?= $profile['email'] ?>" class="form-control" name="email"  >
                                            </div>
                                            <div class="col-6">
                                                <label for="availment" class="form-label">Availment <?= $required_field; ?></label> 
                                                <input type="number"  value="<?= $profile['availment'] ?>"  min="1" max="4" step="1" class="form-control" name="availment" required >
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_shs">  
                                                <input type="hidden" value="<?= $profile["profile_photo"] ?>" id="photo" name="image">
                                                <img src="<?= !empty($profile['profile_photo']) ?  base_url()."/". $profile['profile_photo']  : base_url()."/public/img/select-image.png" ?>"   id="uploaded_image_shs" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Change Image</div>
                                                </div>
                                                <input type="file"  class="image" id="upload_image_shs" style="display:none">
                                            </label>   
                                        </div> 
                                        <div class="text-center">
                                            <button type="button" id="clearImageshs" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
                                        </div>
                                        <div class="modal fade" id="modal_shs" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="img-container">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <img src="" id="sample_image_shs" />
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" id="crop_shs">Crop</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </div>
                                
                                <div class="row g-3" >
                                    <div class="col"> 
                                        <div style="text-align:left;">
                                            <label for="school" class="form-label">School <?= $required_field; ?></label>  
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>   
                                                    <!-- <span style="float:right;">
                                                        <button type="button" id="add-school-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm my-1" data-bs-toggle="modal" data-bs-target="#add-new-shs-school-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New School </button>
                                                    </span> -->
                                            <?php 
                                                }
                                            ?>
                                            
                                        </div> 
                                        <select class="form-control" id="school" name="school" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($school as $row){  
                                                    if($row['id'] == $profile['school']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                            ?>  
                                            <option <?= $selected ?> data-school-address="<?= $row['address']; ?>" value="<?= $row['id']  ?>"><?= $row['school_name']  ?></option>   
                                            <?php } ?>  
                                        </select>    
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-shs-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Name <?= $required_field; ?></label>
                                                            <input type="text" name="shs_school_name" class="form-control"  placeholder="School Name" data-parsley-excluded="true" required> 
                                                        </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-shs-school-button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div style="text-align:left;">
                                            <label for="strand" class="form-label">Strand <?= $required_field; ?></label>  
                                            
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>    
                                                    <!-- <span style="float:right;">
                                                        <button type="button" id="add-strand-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm my-1" data-bs-toggle="modal" data-bs-target="#add-new-shs-strand-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New Strand</button>
                                                    </span>  -->
                                            <?php 
                                                }
                                            ?>

                                        </div>  
                                        <select class="form-control"  name="strand" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($strand as $row){  
                                                    if($row['id'] == $profile['course_id']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                            ?>   
                                                <option <?= $selected; ?>  value="<?= $row['id']  ?>"><?= $row['strand']  ?></option>
                                                 
                                            <?php } ?>   
                                        </select> 
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-shs-strand-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">Strand <?= $required_field; ?></label> 
                                                            <input type="text" name="new_strand" class="form-control"  placeholder="Strand" data-parsley-excluded="true" required> 
                                                        </div>  
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-shs-strand-button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                                <div class="row g-3" > 
                                    <div class="col">
                                        <label for="school_address" class="form-label">School Address </label> 
                                        <input type="text" value="<?php echo $profile['school_address']; ?>" class="form-control text-capitalize" name="school_address" readonly >
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="grade_level" class="form-label">Grade Level <?= $required_field; ?></label>
                                        <select class="form-control"  name="grade_level"  required>
                                            <option value="">Select</option>  
                                            <?php 
                                                foreach($grade_level as $row){  
                                                    if($row  == $profile['appyear']){
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
                                                    if($row  == $profile['appsem']){
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
                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                <?Php 
                                                    $sy   ="SY: " . $year . "-" . ($year + 1);
                                                    if($sy  == $profile['appsy']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                                ?>
                                                <option <?= $selected ?> value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>  
                                </div> 
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="father_name" class="form-label">Father's  Name</label>
                                        <input type="text" value="<?= $profile['father_name'] ?>" class="form-control text-capitalize"   name="father_name" >
                                    </div>
                                    <div class="col">
                                        <label for="father_occupation" class="form-label">Occupation</label>
                                        <input type="text" value="<?= $profile['father_occupation'] ?>" class="form-control text-capitalize"  name="father_occupation" >
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="mother_name" class="form-label">Mother's  Name</label>
                                        <input type="text" value="<?= $profile['mother_name'] ?>" class="form-control text-capitalize" name="mother_name" >
                                    </div>
                                    <div class="col">
                                        <label for="mother_occupation" class="form-label">Occupation</label>
                                        <input type="text"  value="<?= $profile['mother_occupation'] ?>" class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>  
                                <div class="row   mt-3" >  
                                    <div class="col-12  float-left"> 
                                        <?php
                                            if( !in_array( strtolower(auth()->user()->groups[0]), ["user"])){
                                        ?>  
                                                <button type="submit" class="btn btn-primary rounded-pill">Update</button>  
                                                <button type="button" data-id="<?= $profile["id"] ?>" id="delete-button" class="btn btn-danger rounded-pill">Delete</button> 
                                                
                                        <?php
                                            }
                                        ?>  
                                    </div>
                                </div>    
                            </form>    
                    <?php
                        }else if($type == "college"){
                    ?>
                    
                            <form id="college-form" class="validation-form">
                                <div class="row">  
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <label for="" class="form-label">App No. </label>
                                            <h1 style="text-decoration: underline"> <?= $profile['appnoyear'] ?> - <?=  $profile['appnosem'] ?> -  <?= $profile['appnoid'] ?></span> </h1> 
                                                <input type="hidden" value="<?= $profile['id'] ?>"  name="id" readonly>
                                                <input type="hidden" value="<?= $profile['appnoyear'] ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $profile['appnosem'] ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $profile['appnoid'] ?>"  name="app_no_id" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <select class="form-control"  name="status" required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($scholar_status as $row){
                                                            if($row == $profile['appstatus']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php } ?> 
                                                </select> 
                                                <input type="hidden" value="<?= $profile['appmanager']  ?>" name="manager"   readonly>
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
                                                <input type="text" value="<?= $profile['lastname']; ?>" class="form-control text-capitalize" name="lastname" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                                <input type="text" value="<?= $profile['firstname']; ?>" class="form-control text-capitalize" name="firstname" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="middlename" class="form-label">M.I.</label>
                                                <input type="text" value="<?= $profile['middlename']; ?>" class="form-control text-capitalize" name="middlename">
                                            </div>
                                            <div class="col-2">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" value="<?= $profile['suffix']; ?>" class="form-control text-capitalize" name="suffix">
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-12">   
                                                <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                                <select class="form-control" name="address"  required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($address as $row){
                                                            if($row['id'] == $profile['address_id']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['barangay'] ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                                <input type="text" value="<?= date("Y-m-d", strtotime($profile['birthdate'])) ?>" class="form-control" name="birthdate" required >
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
                                                
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number"  value="<?= $age ?>" class="form-control" name="age"   readonly>
                                            </div>
                                            <div class="col">
                                                <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                                <select class="form-control" name="civil_status"  required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($civil_status as $row){
                                                            if($row == $profile['civil_status']){
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
                                                <select class="form-control" name="gender" required>
                                                    <option value="">Select</option> 
                                                    <option <?= strtolower($profile['gender'])=="male" ? "selected" : ""; ?>  value="Male">Male</option>
                                                    <option <?= strtolower($profile['gender'])=="female" ? "selected" : ""; ?> value="Female">Female</option>  
                                                </select> 
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="contact_no" class="form-label">Contact #</label> 
                                                <input type="text" value="<?= $profile['contact_no'] ?>" class="form-control"  name="contact_no" placeholder="0000 000 0000" data-toggle="input-mask" data-mask-format="0900 000 0000"  > 
                                                <span class="font-13 text-muted">e.g "xxxx xxx xxxx"</span>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">CTC # <?= $required_field; ?></label>
                                                <input type="text"  value="<?= $profile['ctc_no'] ?>"  class="form-control"  name="ctc_no" required>
                                            </div> 
                                        </div> 
                                        <div class="row" >
                                            <div class="col-6">
                                                <label for="email" class="form-label">Facebook/Other</label>
                                                <input type="text"  value="<?= $profile['email'] ?>"  class="form-control" name="email"  >
                                            </div>
                                            <div class="col-6">
                                                <label for="availment" class="form-label">Availment <?= $required_field; ?></label> 
                                                <input type="number"  value="<?= $profile['availment'] ?>"  min="1" max="8" step="1" class="form-control" name="availment" required >
                                            </div> 
                                        </div>
                                    </div> 
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_college">  
                                                <input type="hidden" value="<?= $profile["profile_photo"] ?>" id="photo" name="image">
                                                <img src="<?= !empty($profile['profile_photo']) ? base_url()."/". $profile['profile_photo']  : base_url()."/public/img/select-image.png" ?>"   id="uploaded_image_college" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Change Image</div>
                                                </div>
                                                <input type="file"  class="image" id="upload_image_college" style="display:none">
                                            </label>   
                                        </div> 
                                        <div class="text-center">
                                            <button type="button" id="clearImagecollege" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
                                        </div>
                                        <div class="modal fade" id="modal_college" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="img-container">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <img src="" id="sample_image_college" />
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" id="crop_college">Crop</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </div>
                                    
                                <div class="row g-3" >
                                    <div class="col">
                                        <div style="text-align:left;">
                                            <label for="" class="form-label">School <?= $required_field; ?></label> 
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>     
                                                    <!-- <span style="float:right;">
                                                        <button type="button" id="add-school-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add-new-college-school-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New School</button>
                                                    </span> -->
                                            <?php 
                                                }
                                            ?>
                                            
                                        </div>  
                                        <select class="form-control" name="school" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($college_school as $row){  
                                                    if($row['id'] == $profile['school']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                            ?>  
                                            <option <?= $selected ?> data-school-address="<?= $row['address']; ?>" value="<?= $row['id']  ?>"><?= $row['school_name']  ?></option>   
                                            <?php } ?> 
                                        </select> 
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-college-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Name <?= $required_field; ?></label>
                                                            <input type="text" name="college_school_name" class="form-control"  placeholder="School Name" data-parsley-excluded="true" required> 
                                                        </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-college-school-button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col">  
                                        <div style="text-align:left;">
                                            <label for="" class="form-label">Course <?= $required_field; ?></label> 
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>     
                                                    <!-- <span style="float:right;">
                                                        <button type="button" id="add-course-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add-new-college-course-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New Course</button> 
                                                    </span> -->
                                            <?php 
                                                }
                                            ?> 
                                        </div> 
                                        <select class="form-control" name="course" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($course as $row){  
                                                    if($row['id'] == $profile['course']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                            ?> 
                                                <option <?= $selected ?> value="<?= $row['id']  ?>"><?= $row['course']  ?></option>  
                                            <?php } ?>  
                                        </select> 
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-college-course-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">Course <?= $required_field; ?></label>
                                                            <input type="text" name="college_course" class="form-control"  placeholder="Course" data-parsley-excluded="true" required> 
                                                        </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-college-course-button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>  
                                    </div> 
                                </div> 
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="school_address" class="form-label">School Address <?= $required_field; ?></label> 
                                        <input type="text" value="<?= $profile['school_address'] ?>" class="form-control text-capitalize" name="school_address"  >
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="year_level" class="form-label">Year Level <?= $required_field; ?></label>
                                        <select class="form-control" name="year_level" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($year_level as $row){  
                                                    if($row == $profile['appyear']){
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
                                                    if($row == $profile['appsem']){
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
                                        <input type="number" value="<?= $profile['unit'] ?>" class="form-control" name="units" required>
                                    </div> 
                                    <div class="col">
                                        <label for="school_year" class="form-label">SY <?= $required_field; ?></label> 
                                        <select class="form-control"   name="school_year"  required>
                                            
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                <?Php 
                                                    $sy   ="SY: " . $year . "-" . ($year + 1);
                                                    if($sy  == $profile['appsy']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                                ?>
                                                <option <?= $selected ?> value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="father_name" class="form-label">Father's  Name</label>
                                        <input type="text" value="<?= $profile['father_name'] ?>"  class="form-control text-capitalize"   name="father_name" >
                                    </div>
                                    <div class="col">
                                        <label for="father_occupation" class="form-label">Occupation</label>
                                        <input type="text" value="<?= $profile['father_occupation'] ?>"  class="form-control text-capitalize"  name="father_occupation" >
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="mother_name" class="form-label">Mother's  Name</label>
                                        <input type="text" value="<?= $profile['mother_name'] ?>"  class="form-control text-capitalize" name="mother_name" >
                                    </div>
                                    <div class="col">
                                        <label for="mother_occupation" class="form-label">Occupation</label>
                                        <input type="text" value="<?= $profile['mother_occupation'] ?>"  class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>  
                                <div class="row   mt-3" >  
                                    <div class="col-12  float-left"> 
                                        <?php
                                            if( !in_array( strtolower(auth()->user()->groups[0]), ["user"])){
                                        ?>   
                                                <button type="submit" class="btn btn-primary rounded-pill">Update</button>  
                                                <button type="button" data-id="<?= $profile["id"] ?>" id="delete-button" class="btn btn-danger rounded-pill">Delete</button> 
                                        
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>   
                            </form>
                    
                    <?php

                        }else if($type == "tvet"){
                    ?>
                            
                            <form id="tvet-form" class="validation-form">
                                <div class="row">  
                                    <div class="col-12"> 
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <label for="" class="form-label">App No. </label>
                                            <h1 style="text-decoration: underline"> <?= $profile['appnoyear'] ?> - <?=  $profile['appnosem'] ?> -  <?= $profile['appnoid'] ?></span> </h1> 
                                                <input type="hidden" value="<?= $profile['id'] ?>"  name="id" readonly>
                                                <input type="hidden" value="<?= $profile['appnoyear'] ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $profile['appnosem'] ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $profile['appnoid'] ?>"  name="app_no_id" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <select class="form-control"  name="status" required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($scholar_status as $row){
                                                            if($row == $profile['appstatus']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php } ?> 
                                                </select> 
                                                <input type="hidden" value="<?= $profile['appmanager']  ?>" name="manager"   readonly>
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
                                                <input type="text" value="<?= $profile['lastname']; ?>" class="form-control text-capitalize" name="lastname" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                                <input type="text" value="<?= $profile['firstname']; ?>" class="form-control text-capitalize" name="firstname" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="middlename" class="form-label">M.I.</label>
                                                <input type="text" value="<?= $profile['middlename']; ?>" class="form-control text-capitalize" name="middlename">
                                            </div>
                                            <div class="col-2">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" value="<?= $profile['suffix']; ?>" class="form-control text-capitalize" name="suffix">
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-12">  
                                                <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                                <select class="form-control" name="address"  required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($address as $row){
                                                            if($row['id'] == $profile['address_id']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row['id'] ?>"><?= $row['barangay'] ?></option>  
                                                    <?php } ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                                <input type="text" value="<?= date("Y-m-d", strtotime($profile['birthdate'])) ?>" class="form-control" name="birthdate" required >
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
                                                
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number"  value="<?= $age ?>" class="form-control" name="age"   readonly>
                                            </div>
                                            <div class="col">
                                                <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                                <select class="form-control" name="civil_status"  required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($civil_status as $row){
                                                            if($row == $profile['civil_status']){
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
                                                <select class="form-control" name="gender" required>
                                                    <option value="">Select</option> 
                                                    <option <?= strtolower($profile['gender'])=="male" ? "selected" : ""; ?>  value="Male">Male</option>
                                                    <option <?= strtolower($profile['gender'])=="female" ? "selected" : ""; ?> value="Female">Female</option>  
                                                </select> 
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="contact_no" class="form-label">Contact #</label> 
                                                <input type="text" value="<?= $profile['contact_no'] ?>" class="form-control"  name="contact_no" placeholder="0000 000 0000" data-toggle="input-mask" data-mask-format="0900 000 0000"  > 
                                                <span class="font-13 text-muted">e.g "xxxx xxx xxxx"</span>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">CTC # <?= $required_field; ?></label>
                                                <input type="text"  value="<?= $profile['ctc_no'] ?>"  class="form-control"  name="ctc_no" required>
                                            </div> 
                                        </div> 
                                        <div class="row" >
                                            <div class="col-6">
                                                <label for="email" class="form-label">Facebook/Other</label>
                                                <input type="text"  value="<?= $profile['email'] ?>"  class="form-control" name="email"  >
                                            </div>
                                            <div class="col-6">
                                                <label for="availment" class="form-label">Availment <?= $required_field; ?></label> 
                                                <input type="number"  value="<?= $profile['availment'] ?>"  min="1" max="8" step="1" class="form-control" name="availment" required >
                                            </div> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_tvet">  
                                                <input type="hidden" value="<?= $profile["profile_photo"] ?>" id="photo" name="image">
                                                <img src="<?= !empty($profile['profile_photo']) ? base_url()."/". $profile['profile_photo']  : base_url()."/public/img/select-image.png" ?>"   id="uploaded_image_tvet" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Change Image</div>
                                                </div>
                                                <input type="file"  class="image" id="upload_image_tvet" style="display:none">
                                            </label>   
                                        </div> 
                                        <div class="text-center">
                                            <button type="button" id="clearImagetvet" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
                                        </div>
                                        <div class="modal fade" id="modal_tvet" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="img-container">
                                                            <div class="row">
                                                                <div class="col-8">
                                                                    <img src="" id="sample_image_tvet" />
                                                                </div>
                                                                <div class="col-4">
                                                                    <div class="preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" id="crop_tvet">Crop</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                </div>
                                
                                <div class="row g-3" >
                                    <div class="col">
                                        <div style="text-align:left;">
                                            <label for="" class="form-label">School <?= $required_field; ?></label> 
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>     
                                                    <!-- <span style="float:right;">
                                                        <button type="button" id="add-course-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm my-1" data-bs-toggle="modal" data-bs-target="#add-new-tvet-school-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New School</button>  
                                                    </span> -->
                                            <?php 
                                                }
                                            ?>
                                        </div> 
                                        <select class="form-control" name="school" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($tvet_school as $row){  
                                                    if($row['id'] == $profile['school']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                            ?>  
                                            <option <?= $selected ?> data-school-address="<?= $row['address']; ?>" value="<?= $row['id']  ?>"><?= $row['school_name']  ?></option>   
                                            <?php } ?>  
                                        </select>  
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-tvet-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Name <?= $required_field; ?></label>
                                                            <input type="text" name="tvet_school_name" class="form-control"  placeholder="School Name" data-parsley-excluded="true" required> 
                                                        </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-tvet-school-button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col">
                                        <div style="text-align:left;">
                                            <label for="" class="form-label">Course <?= $required_field; ?></label>
                                            <?php
                                                if( in_array( strtolower(auth()->user()->groups[0]), ["superadmin"])){
                                            ?>      
                                                    <!-- <span style="float:right;">
                                                        <button type="button" id="add-course-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add-new-tvet-course-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New Course </button> 
                                                    </span> -->
                                            <?php 
                                                }
                                            ?>
                                        </div>
                                        <select class="form-control" name="course" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($tvet_course as $row){  
                                                    if($row['id'] == $profile['course']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                            ?> 
                                                <option <?= $selected ?> value="<?= $row['id']  ?>"><?= $row['course']  ?></option>  
                                            <?php } ?>  
                                        </select>   
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-tvet-course-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body ">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">Course</label>
                                                            <input type="text" name="tvet_course" class="form-control"  placeholder="Course" data-parsley-excluded="true" required> 
                                                        </div>   
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-tvet-course-button" class="btn btn-info waves-effect waves-light">Save  changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="school_address" class="form-label">School Address </label> 
                                        <input type="text" value="<?= $profile['school_address'] ?>" class="form-control text-capitalize" name="school_address"  >
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col"> 
                                        <label for="year_level" class="form-label">Year Level <?= $required_field; ?></label>
                                        <select class="form-control" name="year_level" required>
                                            <option value="">Select</option> 
                                            <?php 
                                                foreach($year_level as $row){  
                                                    if($row == $profile['appyear']){
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
                                                    if($row == $profile['appsem']){
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
                                        <label for="units" class="form-label">No. of Hours<?= $required_field; ?></label>
                                        <input type="number" value="<?= $profile['unit'] ?>" class="form-control" name="units" required>
                                    </div> 
                                    <div class="col">
                                        <label for="school_year" class="form-label">SY <?= $required_field; ?></label> 
                                        <select class="form-control"   name="school_year"  required>
                                            
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                <?Php 
                                                    $sy   ="SY: " . $year . "-" . ($year + 1);
                                                    if($sy  == $profile['appsy']){
                                                        $selected  = "selected";
                                                    }else{ 
                                                        $selected  = "";
                                                    }
                                                ?>
                                                <option <?= $selected ?> value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                </div><div class="row g-3" >
                                    <div class="col">
                                        <label for="father_name" class="form-label">Father's  Name</label>
                                        <input type="text" value="<?= $profile['father_name'] ?>"  class="form-control text-capitalize"   name="father_name" >
                                    </div>
                                    <div class="col">
                                        <label for="father_occupation" class="form-label">Occupation</label>
                                        <input type="text" value="<?= $profile['father_occupation'] ?>"  class="form-control text-capitalize"  name="father_occupation" >
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="mother_name" class="form-label">Mother's  Name</label>
                                        <input type="text" value="<?= $profile['mother_name'] ?>"  class="form-control text-capitalize" name="mother_name" >
                                    </div>
                                    <div class="col">
                                        <label for="mother_occupation" class="form-label">Occupation</label>
                                        <input type="text" value="<?= $profile['mother_occupation'] ?>"  class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>  
                                <div class="row   mt-3" >  
                                    <div class="col-12  float-left">
                                        <?php
                                            if( !in_array( strtolower(auth()->user()->groups[0]), ["user"])){
                                        ?>    
                                                <button type="submit" class="btn btn-primary rounded-pill">Update</button>  
                                                <button type="button" data-id="<?= $profile["id"] ?>" id="delete-button" class="btn btn-danger rounded-pill">Delete</button> 
                                        
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
            </div> 
        </div> 
    </div>
    



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() { 
            
            $('[data-toggle="input-mask"]').each(function(a, e) {
                var t = $(e).data("maskFormat"),
                    n = $(e).data("reverse");
                null != n ? $(e).mask(t, {
                    reverse: n
                }) : $(e).mask(t)
            })

             
            var cropper;
            var base64data;

            
            // get age using birthdate 
            $(document).on('change', 'input[name="birthdate"]', function(e){ 
                var age = moment().diff($(this).val(), 'years',false);    
                var form_id = $(this).closest('form').attr('id') 
                $('#'+form_id+' input[name="age"]').val(age)
            });


            // Input validation
            $(".validation-form").parsley()
            

            //=============================================================================
            //  Senior High School Update
            //============================================================================= 
 

            var $modal_shs = $('#modal_shs');
            var image_shs  = document.getElementById('sample_image_shs');  

            // Tippy
            tippy('#add-school-button', {
                content: 'Add New School',
            });
            tippy('#add-strand-button', {
                content: 'Add New Strand',
            }); 


            $('#upload_image_shs').change(function(event){
                var files = event.target.files; 
                var done  = function (url) {
                    image_shs.src = url;
                    $modal_shs.modal('show');  
                }; 
                if (files && files.length > 0)
                { 
                    reader        = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]); 
                }
            });


            $modal_shs.on('shown.bs.modal', function() {
                cropper = new Cropper(image_shs, { 
                    dragMode        : 'move',    
                    // aspectRatio  : 1,
                    // viewMode     : 3,  
                    aspectRatio     : 1,
                    minCropBoxWidth : 150,
                    minCropBoxHeight: 150,
                    cropBoxResizable: true,
                    guides          : true,
                    highlight       : true,
                    dragCrop        : true,
                    cropBoxMovable  : true,
                    cropBoxResizable: true,
                    responsive      : true,
                    background      : true,autoCropArea: 1,
                    preview         : '.preview', 
                }); 

            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            

            $("#crop_shs").click(function(e){
                canvas = cropper.getCroppedCanvas({ 
                    width : 200,
                    height: 200,
                });
                canvas.toBlob(function(blob) {
                    var reader = new FileReader(); 
                    reader.readAsDataURL(blob);  
                    reader.onloadend = function() { 
                        base64data   = reader.result;

                        $.ajax({
                            url      : "../../../registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){
                                image_data = data;
                                $modal_shs.modal('hide');    
                                $('#uploaded_image_shs').attr('src', "<?=base_url()?>/" + data);   
                                $('#senior-high-form #photo').val(data); 
                            }
                        });  

                    }
                });
            }); 
            
            // Clear Image
            $(document).on('click', '#clearImageshs', function(e){  
                $('#uploaded_image_shs').attr('src', "<?=base_url()?>/public/img/select-image.png"); 
            }); 


            
            $(document).on('change', 'select[name="school"]', function(e){  
                var address = $(this).find(':selected').data('schoolAddress') 
                var form    = $(this).closest("form").attr('id');   
                $("#" +form + " input[name=school_address]").val(address)
            })


            // Form Submit
            $(document).on('submit', '#senior-high-form', function(e){ 
                
                e.preventDefault();
                var formData = new FormData($("#senior-high-form")[0]);  
                $.ajax({
                    url        : '<?php echo base_url('manage/update_shs') ?>',
                    method     : "post", 
                    data       : formData,
                    processData: false,
                    contentType: false, 
                    dataType   : "json",   
                    beforeSend: function(xhr) {
                        Swal.fire({
                            title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                            text: 'Please wait...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            onOpen: function() {
                                swal.showLoading();
                            }
                        });
                    },
                    success    : function (data) {  
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })
 
                        }else{  
                            Swal.fire({
                                title: "Update Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }
                    },
                    error      : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            }); 

            // Add New Shs School Button
            $(document).on('click', '#add-new-shs-school-button', function(e){  
                e.preventDefault(); 
                var school_name = $('input[name="shs_school_name"]').val() 
                if(school_name == ""){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url     : '/school/insert',
                        method  : "post", 
                        dataType: "json", 
                        data    : {
                            school_name: school_name,
                            manager    : "Active"
                        },  
                        success : function (data) {  
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                })
                                
                                // append value
                                $('#senior-high-form select[name="school"]').append($('<option>', {
                                    value: school_name,
                                    text : school_name
                                }));

                                $('input[name="shs_school_name"]').val('')  
                                $('#add-new-shs-school-modal').modal('hide')
                            }else{  
                                Swal.fire({
                                    title: "Insert Error!",
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
            }); 


            // Add New Shs Strand Button
            $(document).on('click', '#add-new-shs-strand-button', function(e){  
                e.preventDefault(); 
                var strand = $('input[name="new_strand"]').val() 
                if(strand == ""){
                    Swal.fire({
                        title:"Input Field must not be empty!", 
                        icon:"error"
                    }) 
                }else{
                    $.ajax({
                        url     : '/strand/insert',
                        method  : "post", 
                        dataType: "json", 
                        data    : {
                            strand : strand,
                            manager : "Active"
                        },  
                        success : function (data) {   
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                })

                                // append value
                                $('#senior-high-form select[name="strand"]').append($('<option>', {
                                    value: strand,
                                    text : strand
                                }));

                                $('input[name="new_strand"]').val('')
                                $('#add-new-shs-strand-modal').modal('hide')
                            }else{  
                                Swal.fire({
                                    title: "Insert Error!",
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
            });  

            // Delete Senior High
            $(document).on('click', '#senior-high-form #delete-button', function(e){ 

                e.preventDefault();    
                var _this = $(this) 
                var id = _this.data('id')

                Swal.fire({
                    title: "Are you sure you want to delete this record?", 
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1
                }).then(function(e) { 
                    if(e.value){ 
                        $.ajax({ 
                            url     : '<?php echo base_url('manage/archived_shs') ?>',
                            method  : "post",  
                            dataType: "json",  
                            beforeSend: function(xhr) {
                                Swal.fire({
                                    title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                                    text: 'Please wait...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    onOpen: function() {
                                        swal.showLoading();
                                    }
                                });
                            }, 
                            data    : {
                                id: id,
                                manager: "Archived",
                            }, 
                            success : function (data) { 
                                if(data.response){ 
                                    Swal.fire({
                                        title: "Good job!",
                                        text : data.message,
                                        icon : "success"
                                    }) 
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


            //=============================================================================
            //  College Update
            //=============================================================================  
 
 
            
            var $modal_college = $('#modal_college');
            var image_college  = document.getElementById('sample_image_college');

            // Tippy
            tippy('#add-course-button', {
                content: 'Add New Course',
            });

            $('#upload_image_college').change(function(event){
                var files = event.target.files;
                var done  = function (url) {
                    image_college.src = url;
                    $modal_college.modal('show');
                }; 
                if (files && files.length > 0)
                { 
                    reader        = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]); 
                }
            }); 
            
            $modal_college.on('shown.bs.modal', function() {
                cropper = new Cropper(image_college, {
                    dragMode        : 'move',    
                    // aspectRatio  : 1,
                    // viewMode     : 3, 
                    aspectRatio     : 1,
                    minCropBoxWidth : 150,
                    minCropBoxHeight: 150,
                    cropBoxResizable: true,
                    guides          : true,
                    highlight       : true,
                    dragCrop        : true,
                    cropBoxMovable  : true,
                    cropBoxResizable: true,
                    responsive      : true,
                    background      : true,autoCropArea: 1,
                    preview         : '.preview',  
                });
 

            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            // Crop Image
            $("#crop_college").click(function(){
                canvas = cropper.getCroppedCanvas({ 
                    width : 200,
                    height: 200,
                });

                canvas.toBlob(function(blob) {
                    var reader = new FileReader();
                    reader.readAsDataURL(blob); 
                    reader.onloadend = function() {
                        base64data   = reader.result;  

                        $.ajax({
                            url      : "../../../registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){ 
                                image_data = data; 
                                $modal_college.modal('hide'); 
                                $('#uploaded_image_college').attr('src', "<?= base_url(); ?>/" + data);   
                                $('#college-form #photo').val(data); 
                            }
                        }); 
                    }
                });
            });
  
            $(document).on('click', '#clearImagecollege', function(e){  
                $('#uploaded_image_college').attr('src', "<?=base_url()?>/public/img/select-image.png"); 
            }); 

            $(document).on('submit', '#college-form', function(e){ 
                
                e.preventDefault();    
                var _this    = $(this)  
                var formData = new FormData($("#college-form")[0]);  
                $.ajax({ 
                    url        : '<?php echo base_url('manage/update_college') ?>',
                    method     : "post", 
                    data       : formData,
                    processData: false,
                    contentType: false, 
                    dataType   : "json",    
                    beforeSend: function(xhr) {
                        Swal.fire({
                            title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                            text: 'Please wait...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            onOpen: function() {
                                swal.showLoading();
                            }
                        });
                    },
                    success    : function (data) {   
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            })
 
                        }else{  
                            Swal.fire({
                                title: "Update Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }
                    },
                    error      : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            }); 
             
            // Add New College School Button
            $(document).on('click', '#add-new-college-school-button', function(e){  
                e.preventDefault(); 
                var school_name = $('input[name="college_school_name"]').val() 
                if(school_name == ""){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url     : '/collegeschool/insert',
                        method  : "post", 
                        dataType: "json", 
                        data    : {
                            school_name: school_name,
                            manager    : "Active"
                        },    
                        success : function (data) { 
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                })
                                
                                // append value
                                $('#college-form select[name="school"]').append($('<option>', {
                                    value: school_name,
                                    text : school_name
                                }));

                                $('input[name="college_school_name"]').val('')  
                                $('#add-new-college-school-modal').modal('hide')
                            }else{  
                                Swal.fire({
                                    title: "Insert Error!",
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
            });  


            // Add New College Course Button
            $(document).on('click', '#add-new-college-course-button', function(e){  
                e.preventDefault(); 
                var course = $('input[name="college_course"]').val() 
                if(course == ""){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url     : '/course/insert',
                        method  : "post", 
                        data    : {
                            course : course,
                            manager: "Active"
                        }, 
                        dataType: "json",   
                        success : function (data) {  
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                })

                                // append value
                                $('#college-form select[name="course"]').append($('<option>', {
                                    value: course,
                                    text : course
                                }));

                                $('input[name="college_course"]').val('')
                                $('#add-new-college-course-modal').modal('hide')
                            }else{  
                                Swal.fire({
                                    title: "Insert Error!",
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
            });

            
            $(document).on('click', '#college-form #delete-button', function(e){ 

                e.preventDefault();    
                var _this = $(this) 
                var id = _this.data('id')

                Swal.fire({
                    title             : "Are you sure you want to delete this record?", 
                    icon              : "warning",
                    showCancelButton  : !0,
                    confirmButtonText : "Yes, delete it!",
                    cancelButtonText  : "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                    buttonsStyling    : !1
                }).then(function(e) { 
                    if(e.value){ 
                        $.ajax({ 
                            url     : '<?php echo base_url('manage/archived_college') ?>',
                            method  : "post",  
                            dataType: "json",  
                            beforeSend: function(xhr) {
                                Swal.fire({
                                    title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                                    text: 'Please wait...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    onOpen: function() {
                                        swal.showLoading();
                                    }
                                });
                            },
                            data    : {
                                id     : id,
                                manager: "Archived",
                            },
                            success : function (data) {  
                                if(data.response){ 
                                    Swal.fire({
                                        title: "Good job!",
                                        text : data.message,
                                        icon : "success"
                                    }) 
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


            
            //=============================================================================
            //  TVET Update
            //============================================================================= 
            var $modal_tvet = $('#modal_tvet');
            var image_tvet  = document.getElementById('sample_image_tvet'); 

            $('#upload_image_tvet').change(function(event){
                var files = event.target.files;
                var done  = function (url) {
                    image_tvet.src = url;
                    $modal_tvet.modal('show');
                }; 
                if (files && files.length > 0)
                { 
                    reader        = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]); 
                }
            }); 
            
            $modal_tvet.on('shown.bs.modal', function() {
                cropper = new Cropper(image_tvet, {
                    dragMode        : 'move',    
                    // aspectRatio  : 1,
                    // viewMode     : 3, 
                    aspectRatio     : 1,
                    minCropBoxWidth : 150,
                    minCropBoxHeight: 150,
                    cropBoxResizable: true,
                    guides          : true,
                    highlight       : true,
                    dragCrop        : true,
                    cropBoxMovable  : true,
                    cropBoxResizable: true,
                    responsive      : true,
                    background      : true,autoCropArea: 1,
                    preview         : '.preview', 
                });
 

            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });


 
            $("#crop_tvet").click(function(){
                canvas = cropper.getCroppedCanvas({ 
                    width : 200,
                    height: 200,
                });

                canvas.toBlob(function(blob) {
                    var reader       = new FileReader();
                    reader.readAsDataURL(blob); 
                    reader.onloadend = function() {
                        base64data = reader.result;  
                        $.ajax({
                            url      : "../../../registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){ 
                                image_data = data; 
                                $modal_college.modal('hide'); 
                                $('#uploaded_image_college').attr('src', "<?= base_url(); ?>/" + data);   
                                $('#college-form #photo').val(data); 
                            }
                        }); 
                        $.ajax({
                            url      : "../../../registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){  
                                $modal_tvet.modal('hide');
                                image_data = data; 
                                $modal_college.modal('hide'); 
                                $('#uploaded_image_tvet').attr('src', "<?= base_url(); ?>/" + data);   
                                $('#tvet-form #photo').val(data);

                            }
                        }); 
                    }
                });
            });
  
            $(document).on('click', '#clearImagetvet', function(e){  
                $('#uploaded_image_tvet').attr('src', "<?=base_url()?>/public/img/select-image.png"); 
            });

            $(document).on('submit', '#tvet-form', function(e){  
                e.preventDefault();    
                var _this    = $(this) 
                var formData = new FormData($("#tvet-form")[0]);  
                $.ajax({
                    url        : '<?php echo base_url('manage/update_tvet') ?>',
                    method     : "post", 
                    data       : formData,
                    processData: false,
                    contentType: false, 
                    dataType   : "json",    
                    beforeSend: function(xhr) {
                        Swal.fire({
                            title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                            text: 'Please wait...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            onOpen: function() {
                                swal.showLoading();
                            }
                        });
                    },
                    success: function (data) {   
                        if(data.response){ 
                            Swal.fire({
                                title:"Good job!",
                                text: data.message,
                                icon:"success"
                            })
 
                        }else{  
                            Swal.fire({
                                title:"Update Error!",
                                text: data.message,
                                icon:"error"
                            }) 
                        }
                    },
                    error      : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });
            
            
            
            $(document).on('click', '#tvet-form #delete-button', function(e){ 

                e.preventDefault();    
                var _this = $(this) 
                var id    = _this.data('id')

                Swal.fire({
                    title             : "Are you sure you want to delete this record?", 
                    icon              : "warning",
                    showCancelButton  : !0,
                    confirmButtonText : "Yes, delete it!",
                    cancelButtonText  : "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass : "btn btn-danger ms-2 mt-2",
                    buttonsStyling    : !1
                }).then(function(e) { 
                    if(e.value){ 
                        $.ajax({ 
                            url     : '<?php echo base_url('manage/archived_tvet') ?>',
                            method  : "post",  
                            dataType: "json",   
                            beforeSend: function(xhr) {
                                Swal.fire({
                                    title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                                    text: 'Please wait...',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    onOpen: function() {
                                        swal.showLoading();
                                    }
                                });
                            },
                            data    : {
                                id: id,
                                manager: "Archived",
                            }, 
                            success : function (data) {  
                                if(data.response){ 
                                    Swal.fire({
                                        title: "Good job!",
                                        text : data.message,
                                        icon : "success"
                                    }) 
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

            

            // Add New TVET School Button
            $(document).on('click', '#add-new-tvet-school-button', function(e){  
                e.preventDefault(); 
                var school_name = $('input[name="tvet_school_name"]').val() 
                if(school_name == ""){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url     : '/collegeschool/insert',
                        method  : "post", 
                        dataType: "json", 
                        data    : {
                            school_name: school_name,
                            manager    : "Active"
                        },     
                        success : function (data) { 
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                })
                                
                                // append value
                                $('#tvet-form select[name="school"]').append($('<option>', {
                                    value: school_name,
                                    text : school_name
                                }));

                                $('input[name="tvet_school_name"]').val('')  
                                $('#add-new-tvet-school-modal').modal('hide')
                            }else{  
                                Swal.fire({
                                    title: "Insert Error!",
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
            });  


            // Add New TVET Course Button
            $(document).on('click', '#add-new-tvet-course-button', function(e){  
                e.preventDefault(); 
                var course = $('input[name="tvet_course"]').val() 
                if(course == ""){
                    Swal.fire({
                        title:"Input Field must not be empty!", 
                        icon:"error"
                    }) 
                }else{
                    $.ajax({
                        url     : '/course/insert',
                        method  : "post", 
                        dataType: "json", 
                        data    : {
                            course : course,
                            manager: "Active"
                        },   
                        success : function (data) {  
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                })

                                // append value
                                $('#tvet-form select[name="course"]').append($('<option>', {
                                    value: course,
                                    text : course
                                }));

                                $('input[name="tvet_course"]').val('')
                                $('#add-new-tvet-course-modal').modal('hide')
                            }else{  
                                Swal.fire({
                                    title: "Insert Error!",
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
            });   


            //=============================================================================
            // END
            //=============================================================================



        });
    </script>

<?= $this->endSection() ?>
