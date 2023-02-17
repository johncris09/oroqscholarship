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
                        <li class="nav-item ">
                            <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link  active ">
                                Senior High School Registration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                College Registration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link   ">
                                TVET Registration
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content"> 
                        <div class="tab-pane show active" id="senior-high-tab">  
                            <form id="senior-high-registration-form"  class="validation-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <div class="w-50">
                                                    <label for="" class="form-label">App No. </label> 
                                                    <div class="input-group mb-3"> 
                                                        <input type="text" class="form-control text-center shs w-25" value="<?php echo $config['current_year'] ; ?>" name="app_no_year"> 
                                                        <span class="input-group-text">-</span>
                                                        <select name="app_no_sem" class="form-control shs w-25"  >
                                                            <option <?php echo ($config['current_sem'] == 1) ? "selected" : ""; ?> value="1">1</option>
                                                            <option <?php echo ($config['current_sem'] == 2) ? "selected" : ""; ?> value="2">2</option>
                                                        </select>  
                                                        <span class="input-group-text">-</span>
                                                        <input type="text" class="form-control text-center shs w-25" name="app_no_id" required readonly>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <h1 style="text-decoration: underline" class="text-danger">Pending</h1>
                                                <input type="hidden" value="Pending" name="status"   readonly>
                                                <input type="hidden" value="Active" name="manager"   readonly>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-9">
                                        <div class="row mt-3">
                                            <div class="col-4">
                                                <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                                <input type="text" class="form-control text-capitalize"  name="lastname" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                                <input type="text" class="form-control text-capitalize" name="firstname"  required>
                                            </div>
                                            <div class="col-2">
                                                <label for="middlename" class="form-label">M.I.</label>
                                                <input type="text" class="form-control text-capitalize"   name="middlename">
                                            </div>
                                            <div class="col-2">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" class="form-control text-capitalize" name="suffix">
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-12">  
                                                <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                                <select class="form-control" name="address"   required>
                                                    <option value="">Select</option> 
                                                    <?php foreach($barangay as $row):?> 
                                                        <option value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                                <input type="date" class="form-control"   name="birthdate" required >
                                            </div>
                                            <div class="col-2">
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number" class="form-control" name="age" readonly>
                                            </div>
                                            <div class="col">
                                                <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                                <select class="form-control"  name="civil_status" required>
                                                    <option value="">Select</option> 
                                                    <?php foreach($civil_status as $row):?> 
                                                        <option value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="gender" class="form-label">Sex <?= $required_field; ?></label>
                                                <select class="form-control" id="gender" name="gender" required>
                                                    <option value="">Select</option> 
                                                    <option value="Male">Male</option> 
                                                    <option value="Female">Female</option>  
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="contact_no" class="form-label">Contact #</label>
                                                <input type="text" class="form-control" name="contact_no" placeholder="0000 000 0000" data-toggle="input-mask" data-mask-format="0900 000 0000"  > 
                                                <span class="font-13 text-muted">e.g "xxxx xxx xxxx"</span>
                                            </div>
                                            <div class="col-6">
                                                <label for="ctc_no" class="form-label">CTC # <?= $required_field; ?></label>
                                                <input type="text" class="form-control"   name="ctc_no" required>
                                            </div> 
                                        </div> 
                                        <div class="row" >
                                            <div class="col-6">
                                                <label for="email" class="form-label">Facebook/Other</label>
                                                <input type="text" class="form-control" name="email"  >
                                            </div>
                                            <div class="col-6">
                                                <label for="availment" class="form-label">Availment <?= $required_field; ?></label> 
                                                <input type="number" min="1" max="8" step="1" class="form-control" name="availment" required >
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_shs">   
                                                <input type="hidden" id="photo" name="image">
                                                <img src="<?=base_url()?>/public/img/select-image.png" id="uploaded_image_shs" class="img-responsive img-circle" />
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
                                            <span style="float:right;">
                                                <button type="button" id="add-school-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm my-1" data-bs-toggle="modal" data-bs-target="#add-new-shs-school-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New School </button>
                                            </span>
                                        </div> 
                                        <select class="form-control" id="school" name="school" required>
                                            <option value="">Select</option> 
                                            <?php foreach($school as $row):?> 
                                                <?php if($row['SchoolName'] != ""):?> 
                                                    <option data-school-address="<?= $row['address']; ?>" value="<?= $row['SchoolName']  ?>"><?= $row['SchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>     
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-shs-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body shs-add-school">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Name <?= $required_field; ?></label>
                                                            <input type="text" name="shs_school_name" class="form-control "  placeholder="School Name" data-parsley-excluded="true" required> 
                                                        </div>   
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Address <?= $required_field; ?></label>
                                                            <input type="text" name="shs_school_address" class="form-control"  placeholder="School Address" data-parsley-excluded="true" required> 
                                                        </div>  
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" id="add-new-shs-school-button" class="btn btn-info waves-effect waves-light">Save changes</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col"> 
                                        <div style="text-align:left;">
                                            <label for="strand" class="form-label">Strand <?= $required_field; ?></label>  
                                            <span style="float:right;">
                                                <button type="button" id="add-strand-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm my-1" data-bs-toggle="modal" data-bs-target="#add-new-shs-strand-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New Strand</button>
                                            </span> 
                                        </div> 
                                        <select class="form-control"  name="strand" required>
                                            <option value="">Select</option> 
                                            <?php foreach($strand as $row):?> 
                                                <?php if($row['Strand'] != ""):?> 
                                                    <option value="<?= $row['Strand']  ?>"><?= $row['Strand']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
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
                                                        <button type="button" id="add-new-shs-strand-button" class="btn btn-info waves-effect waves-light">Save changes and Print</button>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                             
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="school_address" class="form-label">School Address </label> 
                                        <input type="text" class="form-control text-capitalize" name="school_address"  >
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="grade_level" class="form-label">Grade Level <?= $required_field; ?></label>
                                        <select class="form-control"  name="grade_level"  required>
                                            <option value="">Select</option> 
                                            <?php foreach($grade_level as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="semester" class="form-label">Semester <?= $required_field; ?></label> 
                                        <select class="form-control shs"   name="semester"  required>
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?> 
                                                <?Php 
                                                    if( ($config['current_sem'] == 1 ? "1st" : "2nd") == $row){ 
                                                        $selected= "selected";
                                                    }else{
                                                        $selected= "";
                                                    }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                    <div class="col">
                                        <label for="school_year" class="form-label">SY <?= $required_field; ?></label> 
                                        <select class="form-control"   name="school_year"  required>
                                            
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                <?Php 
                                                    if($config['current_sy'] == "SY: " . ($year - 1) . "-" .  $year){ 
                                                        $selected= "selected";
                                                    }else{
                                                        $selected= "";
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
                                        <input type="text" class="form-control text-capitalize"   name="father_name" >
                                    </div>
                                    <div class="col">
                                        <label for="father_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control text-capitalize"  name="father_occupation" >
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="mother_name" class="form-label">Mother's  Name</label>
                                        <input type="text" class="form-control text-capitalize" name="mother_name" >
                                    </div>
                                    <div class="col">
                                        <label for="mother_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>  
                                <div class="row g-3 mt-2" > 
                                    <?php 
                                        if(!$config['semester_closed']){ 
                                    ?>
                                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save Changes and Print</button> 
                                    <?php
                                        }
                                    ?>
                                </div>    
                            </form>  
                        </div>
                        <div class="tab-pane" id="college-tab">   
                            <form id="college-registration-form" class="validation-form">
                                <div class="row">  
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <div class="w-50">
                                                    <label for="" class="form-label">App No. </label>   
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control text-center college w-25"  value="<?php echo $config['current_year'] ; ?>" name="app_no_year"  > 
                                                        <span class="input-group-text">-</span>
                                                        <select name="app_no_sem" class="form-control college w-25"  >
                                                            <option <?php echo ($config['current_sem'] == 1) ? "selected" : ""; ?> value="1">1</option>
                                                            <option <?php echo ($config['current_sem'] == 2) ? "selected" : ""; ?> value="2">2</option>
                                                        </select>  
                                                        <span class="input-group-text">-</span>
                                                        <input type="text" class="form-control text-center college w-25" name="app_no_id" required readonly>
                                                    </div>
                                                </div> 
                                            </div> 
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <h1 style="text-decoration: underline" class="text-danger">Pending</h1>
                                                <input type="hidden" value="Pending" name="status"   readonly>
                                                <input type="hidden" value="Active" name="manager"   readonly>
                                            </div>
                                        </div>
                                    </div> 
                                </div>  
                                <div class="row"> 
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                                <input type="text" class="form-control text-capitalize" name="lastname" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                                <input type="text" class="form-control text-capitalize" name="firstname" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="middlename" class="form-label">M.I.</label>
                                                <input type="text" class="form-control text-capitalize" name="middlename">
                                            </div>
                                            <div class="col-2">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" class="form-control text-capitalize" name="suffix">
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-12">  
                                                <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                                <select class="form-control" name="address"  required>
                                                    <option value="">Select</option> 
                                                    <?php foreach($barangay as $row):?> 
                                                        <option value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                                <input type="date" class="form-control" name="birthdate" required >
                                            </div>
                                            <div class="col-2">
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number" class="form-control" name="age"   readonly>
                                            </div>
                                            <div class="col">
                                                <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                                <select class="form-control" name="civil_status"  required>
                                                    <option value="">Select</option> 
                                                    <?php foreach($civil_status as $row):?> 
                                                        <option value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="gender" class="form-label">Sex <?= $required_field; ?></label>
                                                <select class="form-control" name="gender" required>
                                                    <option value="">Select</option> 
                                                    <option value="Male">Male</option> 
                                                    <option value="Female">Female</option>  
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="contact_no" class="form-label">Contact #</label>
                                                <input type="text" class="form-control"  name="contact_no" placeholder="0000 000 0000" data-toggle="input-mask" data-mask-format="0900 000 0000"  > 
                                                <span class="font-13 text-muted">e.g "xxxx xxx xxxx"</span>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">CTC # <?= $required_field; ?></label>
                                                <input type="text" class="form-control"  name="ctc_no" required>
                                            </div> 
                                        </div> 
                                        <div class="row" >
                                            <div class="col-6">
                                                <label for="email" class="form-label">Facebook/Other</label>
                                                <input type="text" class="form-control" name="email"  >
                                            </div>
                                            <div class="col-6">
                                                <label for="availment" class="form-label">Availment <?= $required_field; ?></label> 
                                                <input type="number" min="1" max="8" step="1" class="form-control" name="availment" required >
                                            </div> 
                                        </div>
                                    </div>  
                                    
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_college">  
                                                <input type="hidden" id="photo" name="image">
                                                <img src="<?=base_url()?>/public/img/select-image.png"  id="uploaded_image_college" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Change Image</div>
                                                </div>
                                                <input type="file" name="image" class="image" id="upload_image_college" style="display:none">
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
                                            <span style="float:right;">
                                                <button type="button" id="add-school-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add-new-college-school-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New School</button>
                                            </span>
                                        </div> 
                                        <select class="form-control" name="school" required>
                                            <option value="">Select</option> 
                                            <?php foreach($college_school as $row):?> 
                                                <?php if($row['colSchoolName'] != ""):?> 
                                                    <option data-school-address="<?= $row['address']  ?>" value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select> 
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-college-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body college-add-school">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Name <?= $required_field; ?></label>
                                                            <input type="text" name="college_school_name" class="form-control"  placeholder="School Name" data-parsley-excluded="true" required> 
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Address <?= $required_field; ?></label>
                                                            <input type="text" name="college_school_address" class="form-control "  placeholder="School Address" data-parsley-excluded="true" required> 
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
                                            <span style="float:right;">
                                                <button type="button" id="add-course-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add-new-college-course-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New Course</button> 
                                            </span>
                                        </div> 
                                        <select class="form-control" name="course" required>
                                            <option value="">Select</option> 
                                            <?php foreach($course as $row):?> 
                                                <?php if($row['colCourse'] != ""):?> 
                                                    <option value="<?= $row['colCourse']  ?>"><?= $row['colCourse']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
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
                                        <label for="school_address" class="form-label">School Address </label> 
                                        <input type="text" class="form-control text-capitalize" name="school_address"  >
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="year_level" class="form-label">Year Level <?= $required_field; ?></label>
                                        <select class="form-control" name="year_level" required>
                                            <option value="">Select</option> 
                                            <?php foreach($year_level as $row):?>  
                                                <option value="<?= $row ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="semester" class="form-label">Semester <?= $required_field; ?></label>
                                        <select class="form-control college"  name="semester" required>
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <?Php 
                                                    if( ($config['current_sem'] == 1 ? "1st" : "2nd") == $row){ 
                                                        $selected= "selected";
                                                    }else{
                                                        $selected= "";
                                                    }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="units" class="form-label">Units <?= $required_field; ?></label>
                                        <input type="number" class="form-control" name="units" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">SY <?= $required_field; ?></label>
                                        <select class="form-control" name="school_year" required>
                                            <option value="">Select</option>  
                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                <?Php 
                                                    if($config['current_sy'] == "SY: " . ($year - 1) . "-" .  $year){ 
                                                        $selected= "selected";
                                                    }else{
                                                        $selected= "";
                                                    }
                                                ?>
                                                <option <?php echo $selected; ?> value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="father_name" class="form-label">Father's  Name</label>
                                        <input type="text" class="form-control text-capitalize"   name="father_name" >
                                    </div>
                                    <div class="col">
                                        <label for="father_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control text-capitalize"  name="father_occupation" >
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="mother_name" class="form-label">Mother's  Name</label>
                                        <input type="text" class="form-control text-capitalize" name="mother_name" >
                                    </div>
                                    <div class="col">
                                        <label for="mother_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>     
                                <div class="row g-3 mt-2" > 
                                    <?php 
                                        if(!$config['semester_closed']){ 
                                    ?> 
                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save Changes and Print</button> 
                                    <?php
                                        }
                                    ?>
                                </div>    
                            </form>
                        </div>
                        
                        <div class="tab-pane   " id="tvet-tab"> 
                            <form id="tvet-registration-form" class="validation-form">
                                <div class="row"> 
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <div class="w-50">
                                                    <label for="" class="form-label">App No. </label>   
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control text-center tvet w-25" value="<?php echo $config['current_year'] ; ?>"  name="app_no_year"  > 
                                                        <span class="input-group-text">-</span>
                                                        <select name="app_no_sem" class="form-control tvet w-25"  >
                                                            <option <?php echo ($config['current_sem'] == 1) ? "selected" : ""; ?> value="1">1</option>
                                                            <option <?php echo ($config['current_sem'] == 2) ? "selected" : ""; ?> value="2">2</option>
                                                        </select>  
                                                        <span class="input-group-text">-</span>
                                                        <input type="text" class="form-control text-center tvet w-25" name="app_no_id" required readonly>
                                                    </div>
                                                </div> 
                                            </div>  
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <h1 style="text-decoration: underline" class="text-danger">Pending</h1>
                                                <input type="hidden" value="Pending" name="status"   readonly>
                                                <input type="hidden" value="Active" name="manager"   readonly>
                                            </div>
                                        </div>
                                    </div> 
                                </div>  
                                <div class="row"> 
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                                <input type="text" class="form-control text-capitalize" name="lastname" required>
                                            </div>
                                            <div class="col-4">
                                                <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                                <input type="text" class="form-control text-capitalize" name="firstname" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="middlename" class="form-label">M.I.</label>
                                                <input type="text" class="form-control text-capitalize" name="middlename">
                                            </div>
                                            <div class="col-2">
                                                <label for="suffix" class="form-label">Suffix</label>
                                                <input type="text" class="form-control text-capitalize" name="suffix">
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-12">  
                                                <label for="address" class="form-label">Address <?= $required_field; ?></label>
                                                <select class="form-control" name="address"  required>
                                                    <option value="">Select</option> 
                                                    <?php foreach($barangay as $row):?> 
                                                        <option value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="birthdate"  class="form-label">Date of Birth <?= $required_field; ?></label>
                                                <input type="date" class="form-control" name="birthdate" required >
                                            </div>
                                            <div class="col-2">
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number" class="form-control" name="age"   readonly>
                                            </div>
                                            <div class="col">
                                                <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                                <select class="form-control" name="civil_status"  required>
                                                    <option value="">Select</option> 
                                                    <?php foreach($civil_status as $row):?> 
                                                        <option value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="gender" class="form-label">Sex <?= $required_field; ?></label>
                                                <select class="form-control" name="gender" required>
                                                    <option value="">Select</option> 
                                                    <option value="Male">Male</option> 
                                                    <option value="Female">Female</option>  
                                                </select>
                                            </div> 
                                        </div> 
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="contact_no" class="form-label">Contact #</label>
                                                <input type="text" class="form-control"  name="contact_no" placeholder="0000 000 0000" data-toggle="input-mask" data-mask-format="0900 000 0000"  > 
                                                <span class="font-13 text-muted">e.g "xxxx xxx xxxx"</span>
                                            </div>
                                            <div class="col-6">
                                                <label for="" class="form-label">CTC # <?= $required_field; ?></label>
                                                <input type="text" class="form-control"  name="ctc_no" required>
                                            </div> 
                                        </div> 
                                        <div class="row" >
                                            <div class="col-6">
                                                <label for="email" class="form-label">Facebook/Other</label>
                                                <input type="text" class="form-control" name="email"  >
                                            </div>
                                            <div class="col-6">
                                                <label for="availment" class="form-label">Availment <?= $required_field; ?></label>
                                                <input type="number" min="1" max="8" step="1" class="form-control" name="availment" required >
                                            </div> 
                                        </div>
                                    </div> 
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_tvet">  
                                                <input type="hidden" id="photo" name="image">
                                                <img src="<?=base_url()?>/public/img/select-image.png"  id="uploaded_image_tvet" class="img-responsive img-circle" />
                                                <div class="overlay">
                                                    <div class="text">Change Image</div>
                                                </div>
                                                <input type="file" name="image" class="image" id="upload_image_tvet" style="display:none">
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
                                            <span style="float:right;">
                                                <button type="button" id="add-course-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm my-1" data-bs-toggle="modal" data-bs-target="#add-new-tvet-school-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New School</button>  
                                            </span>
                                        </div> 
                                        <select class="form-control" name="school" required>
                                            <option value="">Select</option> 
                                            <?php foreach($college_school as $row):?> 
                                                <?php if($row['colSchoolName'] != ""):?> 
                                                    <option data-school-address="<?= $row['address']  ?>"  value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select> 
                                        <!-- add modal form -->
                                        <div class="modal fade" id="add-new-tvet-school-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Add New</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div> 
                                                    <div class="modal-body tvet-add-school">
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Name <?= $required_field; ?></label>
                                                            <input type="text" name="tvet_school_name" class="form-control"  placeholder="School Name" data-parsley-excluded="true" required> 
                                                        </div>  
                                                        <div class="form-group">
                                                            <label for="field-1" class="form-label">School Address <?= $required_field; ?></label>
                                                            <input type="text" name="tvet_school_address" class="form-control "  placeholder="School Address" data-parsley-excluded="true" required> 
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
                                            <span style="float:right;">
                                                <button type="button" id="add-course-button"  class="btn btn-outline-primary rounded-pill waves-effect waves-light btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#add-new-tvet-course-modal"> <i class="mdi mdi-plus" aria-hidden="true"></i> Add New Course </button> 
                                            </span>
                                        </div> 
                                        <select class="form-control" name="course" required>
                                            <option value="">Select</option> 
                                            <?php foreach($course as $row):?> 
                                                <?php if($row['colCourse'] != ""):?> 
                                                    <option value="<?= $row['colCourse']  ?>"><?= $row['colCourse']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
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
                                        <input type="text" class="form-control text-capitalize" name="school_address"  >
                                    </div>
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="year_level" class="form-label">Year Level <?= $required_field; ?></label>
                                        <select class="form-control" name="year_level" required>
                                            <option value="">Select</option> 
                                            <?php foreach($year_level as $row):?>  
                                                <option value="<?= $row ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="semester" class="form-label">Semester <?= $required_field; ?></label>
                                        <select class="form-control tvet"  name="semester" required>
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <?Php 
                                                    if( ($config['current_sem'] == 1 ? "1st" : "2nd") == $row){ 
                                                        $selected= "selected";
                                                    }else{
                                                        $selected= "";
                                                    }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="units" class="form-label">No. of Hours<?= $required_field; ?></label>
                                        <input type="number" class="form-control" name="units" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">SY <?= $required_field; ?></label>
                                        <select class="form-control" name="school_year" required>
                                            <option value="">Select</option> 
                                            <?php foreach(range(date('Y') + 1, $year_started) as $year):?>  
                                                <?Php 
                                                    if($config['current_sy'] == "SY: " . ($year - 1) . "-" .  $year){ 
                                                        $selected= "selected";
                                                    }else{
                                                        $selected= "";
                                                    }
                                                ?>
                                                <option <?php echo $selected; ?> value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="father_name" class="form-label">Father's  Name</label>
                                        <input type="text" class="form-control text-capitalize"   name="father_name" >
                                    </div>
                                    <div class="col">
                                        <label for="father_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control text-capitalize"  name="father_occupation" >
                                    </div> 
                                </div>
                                <div class="row g-3" >
                                    <div class="col">
                                        <label for="mother_name" class="form-label">Mother's  Name</label>
                                        <input type="text" class="form-control text-capitalize" name="mother_name" >
                                    </div>
                                    <div class="col">
                                        <label for="mother_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>     
                                <div class="row g-3 mt-2" > 
                                    <?php 
                                        if(!$config['semester_closed']){ 
                                    ?> 
                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save Changes and Print</button> 
                                    <?php
                                        }
                                    ?>
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

            $('[data-toggle="input-mask"]').each(function(a, e) {
                var t = $(e).data("maskFormat"),
                    n = $(e).data("reverse");
                null != n ? $(e).mask(t, {
                    reverse: n
                }) : $(e).mask(t)
            })


            var is_sem_closed = <?php echo $config['semester_closed'] ?>; 
            if(is_sem_closed){
                Swal.fire({
                    title            : "Semester Closed!", 
                    icon             : "error",   
                    confirmButtonText: 'Ok', 
                    allowOutsideClick: false,
                    allowEscapeKey   : false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href ="/"
                    }  
                })
            }


            var cropper;
            var base64data; 
            
            // get age using birthdate 
            $(document).on('change', 'input[name="birthdate"]', function(e){ 
                var age     = moment().diff($(this).val(), 'years',false);    
                var form_id = $(this).closest('form').attr('id') 
                $('#'+form_id+' input[name="age"]').val(age)
            });
            
            // Input validation
            $(".validation-form").parsley()
            


            //=============================================================================
            //  Senior High School Registration
            //============================================================================= 
            
            var $modal_shs    = $('#modal_shs');
            var image_shs     = document.getElementById('sample_image_shs'); 
            var shs_app_no_id = $('input[name = "app_no_id"]').val()
 

            get_latest_shs_app_no_id();
            
            function get_latest_shs_app_no_id(appYear = $('input.shs[name="app_no_year"]').val() , appSem = $('select.shs[name="app_no_sem"]').val()){

                $.ajax({
                    url   : "registration/shs_latest_app_no_id",
                    method: "POST",  
                    data  : {
                        app_year: appYear,
                        app_sem : appSem,
                    },           
                    dataType: "json",
                    success: function(data){   
                        $('input.shs[name="app_no_id"]').val(data) 
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                });
            }

            $('select.shs[name=app_no_sem]').on('change', function(){ 
                get_latest_shs_app_no_id(appYear = $('input.shs[name="app_no_year"]').val(),  appSem = $(this).val() );
                
                var sem = ($(this).val() == 1) ? "1st" : "2nd"; 
                $('select.shs[name=semester]').val(sem)

            })

            // Tippy
            tippy('#add-school-button', {
                content: 'Add New School',
            });
            tippy('#add-strand-button', {
                content: 'Add New Strand',
            }); 

            // Upload Image
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


            // Crop Image
            $("#crop_shs").click(function(e){
                canvas = cropper.getCroppedCanvas({ 
                    width: 200,
                    height: 200,
                });

                canvas.toBlob(function(blob) {
                    var reader       = new FileReader(); 
                    reader.readAsDataURL(blob);  
                    reader.onloadend = function() { 
                        base64data = reader.result;   
                        $.ajax({
                            url      : "registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){   
                                image_data = data;
                                $modal_shs.modal('hide');  
                                $('#uploaded_image_shs').attr('src', data);   
                                $('#senior-high-registration-form #photo').val(data);              
                            }
                        }); 
                        // $('#senior-high-registration-form #photo').val(base64data); 

                    }
                });
            });
 


            // Clear Image
            $(document).on('click', '#clearImageshs', function(e){  
                $('#uploaded_image_shs').attr('src', "<?=base_url()?>/public/img/select-image.png"); 
            });

            
            $(document).on('change', 'select[name="school"]', function(e){ 
                // $(this).val()
                var address = $(this).find(': selected').data('schoolAddress')
                var form    = $(this).closest("form").attr('id');  
                $("#" +form + " input[name=school_address]").val(address)
            })

            // Form Submit
            $(document).on('submit', '#senior-high-registration-form', function(e){  
                e.preventDefault();  
                
                var formData = new FormData($("#senior-high-registration-form")[0]);  
                 
                $.ajax({
                    url        : 'registration/insert_senior_high',
                    method     : "post", 
                    data       : formData,
                    processData: false,
                    contentType: false, 
                    dataType   : "json", 
                    success    : function (data) {   
                        if(data.response){   
                            Swal.fire({
                                title            : "Good job!",
                                text             : data.message,
                                icon             : "success",  
                                showCancelButton : true,
                                confirmButtonText: 'Yes',
                                denyButtonText   : 'Cancel',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open("registration/print/shs/" + data.id);
                                }  
                            })
                             
                            // clear form
                            $("#senior-high-registration-form")[0].reset()
                            $('#uploaded_image_shs').attr('src', "<?=base_url()?>/public/img/select-image.png");
 

                            // display latest shs app no id
                            $('select.shs[name="app_no_sem"]').val(data.appnosem)  
                            
                            get_latest_shs_app_no_id();
                        }else{  
                            Swal.fire({
                                title: "Insert Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });
 
            // Add New Shs School Button
            $(document).on('click', '#add-new-shs-school-button', function(e){  
                e.preventDefault(); 
                var bool = 1; 
                $(".shs-add-school").find("input[required]").each(function() {  
                    console.info()
                    if($(this).val().trim() == ''){ 
                        bool = 0;
                        return false;
                    }else{
                        bool = 1
                    } 
                })
 
                var school_name = $('input[name = "shs_school_name"]').val() 
                school_name     = school_name.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');
                var address     = $('input[name = "shs_school_address"]').val() 
                address         = address.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');
                if(!bool){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url   : 'school/insert',
                        method: "post", 
                        data  : {
                            school_name : school_name,
                            address : address,
                            manager : "Active"
                        },  
                        dataType: "json", 
                        success: function (data) {   
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                }) 
                                var option = $('<option>').val(school_name).text(school_name).attr('data-school-address', address);
                                $('#senior-high-registration-form select[name="school"]').append(option);

                                $('input[name="shs_school_name"]').val('')  
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
                        error: function (xhr, status, error) { 
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
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url   : 'strand/insert',
                        method: "post", 
                        data  : {
                            strand : strand,
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
                                $('#senior-high-registration-form select[name="strand"]').append($('<option>', {
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
                        error: function (xhr, status, error) { 
                            console.info(xhr.responseText);
                        }
                    }); 

                }
            }); 









            //=============================================================================
            //  College Registration
            //=============================================================================  
            var $modal_college = $('#modal_college');
            var image_college  = document.getElementById('sample_image_college');   
 

            get_latest_college_app_no_id();
            
            function get_latest_college_app_no_id(appYear = $('input.college[name="app_no_year"]').val() , appSem = $('select.college[name="app_no_sem"]').val()){

                $.ajax({
                    url   : "registration/college_latest_app_no_id",
                    method: "POST",  
                    data  : {
                        app_year: appYear,
                        app_sem : appSem,
                    },           
                    dataType: "json",
                    success : function(data){
                        $('input.college[name="app_no_id"]').val(data) 
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                });
            }

            $('select.college[name=app_no_sem]').on('change', function(){ 
                get_latest_college_app_no_id(appYear = $('input.college[name="app_no_year"]').val(),  appSem = $(this).val() );

                var sem = ($(this).val() == 1) ? "1st" : "2nd"; 
                $('select.college[name=semester]').val(sem)
                
            })
            
            // Tippy
            tippy('#add-course-button', {
                content: 'Add New Course',
            });

            // Upload Image
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
                    minCropBoxWidth : 360,
                    minCropBoxHeight: 360,
                    guides          : true,
                    highlight       : false,
                    dragCrop        : true,
                    cropBoxMovable  : true,
                    cropBoxResizable: true,
                    responsive      : true,
                    background      : false,
                    preview         : '.preview'
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
                    var reader       = new FileReader();
                    reader.readAsDataURL(blob); 
                    reader.onloadend = function() {
                        base64data = reader.result;  

                        $.ajax({
                            url      : "registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){   
                                $modal_college.modal('hide');
                                $('#uploaded_image_college').attr('src', data);
                                $('#college-registration-form #photo').val(data); 
                            }
                        });
                        // $('#college-registration-form #photo').val(base64data); 
                    }
                });
            });
 
  
            // Clear Image
            $(document).on('click', '#clearImagecollege', function(e){  
                $('#uploaded_image_college').attr('src', "<?=base_url()?>/public/img/select-image.png"); 
            });

            
            // Form Submit
            $(document).on('submit', '#college-registration-form', function(e){ 
                
                e.preventDefault();    
                var _this    = $(this)   
                var formData = new FormData($("#college-registration-form")[0]); 
                $.ajax({
                    url        : 'registration/insert_college',
                    method     : "post", 
                    data       : formData,
                    processData: false,
                    contentType: false, 
                    dataType   : "json",
                    success    : function (data) {
                        if(data.response){   
                            Swal.fire({
                                title            : "Good job!",
                                text             : data.message,
                                icon             : "success",  
                                showCancelButton : true,
                                confirmButtonText: 'Yes',
                                denyButtonText   : 'Cancel',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open("registration/print/college/" + data.id);
                                }  
                            })
                             
                            // clear form
                            $("#college-registration-form")[0].reset()
                            $('#uploaded_image_college').attr('src', "<?=base_url()?>/public/img/select-image.png");
 

                            // display latest college app no id
                            $('select.college[name="app_no_sem"]').val(data.appnosem) 
                            get_latest_college_app_no_id();
                        }else{  
                            Swal.fire({
                                title: "Insert Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }


                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });  

            // Add New College School Button
            $(document).on('click', '#add-new-college-school-button', function(e){  
                e.preventDefault(); 

                var bool =1; 
                $(".college-add-school").find("input[required]").each(function() {   
                    if($(this).val().trim() == ''){ 
                        bool = 0;
                        return false;
                    }else{
                        bool = 1
                    } 
                })
 

                var school_name = $('input[name = "college_school_name"]').val() 
                school_name     = school_name.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');
                var address     = $('input[name = "college_school_address"]').val() 
                address         = address.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');

                if(!bool){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url   : 'collegeschool/insert',
                        method: "post", 
                        data  : {
                            school_name: school_name,
                            address    : address,
                            manager    : "Active"
                        },  
                        dataType: "json", 
                        success: function (data) {  
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                }) 
                                var option = $('<option>').val(school_name).text(school_name).attr('data-school-address', address);
                                $('#college-registration-form select[name="school"]').append(option);

                                $('input[name="college_school_name"]').val('')  
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
                        error: function (xhr, status, error) { 
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
                        url   : 'course/insert',
                        method: "post", 
                        data  : {
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
                                $('#college-registration-form select[name="course"]').append($('<option>', {
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
                        error: function (xhr, status, error) { 
                            console.info(xhr.responseText);
                        }
                    }); 

                }
            });  

            //=============================================================================
            //  TVET Registration
            //=============================================================================
            var $modal_tvet = $('#modal_tvet');
            var image_tvet  = document.getElementById('sample_image_tvet'); 

            
            get_latest_tvet_app_no_id();
            
            function get_latest_tvet_app_no_id(appYear = $('input.tvet[name="app_no_year"]').val() , appSem = $('select.tvet[name="app_no_sem"]').val()){

                $.ajax({
                    url   : "registration/tvet_latest_app_no_id",
                    method: "POST",  
                    data  : {
                        app_year: appYear,
                        app_sem : appSem,
                    },           
                    dataType: "json",
                    success: function(data){  
                        
                        $('input.tvet[name="app_no_id"]').val(data) 
                    }
                });
            }

            $('select.tvet[name=app_no_sem]').on('change', function(){ 
                get_latest_tvet_app_no_id(appYear = $('input.tvet[name="app_no_year"]').val(),  appSem = $(this).val() );
                
                var sem = ($(this).val() == 1) ? "1st" : "2nd"; 
                $('select.tvet[name=semester]').val(sem)
            })

  
            
            // Upload Image
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
                    minCropBoxWidth : 360,
                    minCropBoxHeight: 360,
                    guides          : true,
                    highlight       : false,
                    dragCrop        : true,
                    cropBoxMovable  : true,
                    cropBoxResizable: true,
                    responsive      : true,
                    background      : false,
                    preview         : '.preview'
                });  
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });
            
            // Crop Image 
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
                            url      : "registration/upload",
                            method   : "POST",                	
                            data     : {image: base64data},
                            dadtaType: "json",
                            success  : function(data){  
                                $modal_tvet.modal('hide');
                                $('#uploaded_image_tvet').attr('src', data);
                                $('#tvet-registration-form #photo').val(data); 
                            }
                        });
                        
                        // $('#tvet-registration-form #photo').val(base64data); 
                    }
                });
            });
            
            // Clear Image
            $(document).on('click', '#clearImagetvet', function(e){  
                $('#uploaded_image_tvet').attr('src', "<?=base_url()?>/public/img/select-image.png"); 
            });  



            // Form Submit
            $(document).on('submit', '#tvet-registration-form', function(e){ 
                
                
                e.preventDefault();    
                var _this    = $(this)   
                var formData = new FormData($("#tvet-registration-form")[0]); 
                $.ajax({
                    url        : 'registration/insert_tvet',
                    method     : "post", 
                    data       : formData,
                    processData: false,
                    contentType: false, 
                    dataType   : "json", 
                    success    : function (data) {   
                        if(data.response){   
                            Swal.fire({
                                title            : "Good job!",
                                text             : data.message,
                                icon             : "success",  
                                showCancelButton : true,
                                confirmButtonText: 'Yes',
                                denyButtonText   : 'Cancel',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open("registration/print/tvet/" + data.id);
                                }  
                            })
                             
                            // clear form
                            $("#tvet-registration-form")[0].reset() 
                            $('#uploaded_image_tvet').attr('src', "<?=base_url()?>/public/img/select-image.png");
 

                            // display latest tvet app no id
                            $('select.tvet[name="app_no_sem"]').val(data.appnosem) 
                            get_latest_tvet_app_no_id();
                            
                        }else{  
                            Swal.fire({
                                title: "Insert Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }


                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });


            
            // Add New College School Button
            $(document).on('click', '#add-new-college-school-button', function(e){  
                e.preventDefault(); 

                var bool =1; 
                $(".college-add-school").find("input[required]").each(function() {   
                    if($(this).val().trim() == ''){ 
                        bool = 0;
                        return false;
                    }else{
                        bool = 1
                    } 
                })
 

                var school_name = $('input[name = "college_school_name"]').val() 
                school_name     = school_name.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');
                var address     = $('input[name = "college_school_address"]').val() 
                address         = address.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');

                if(!bool){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url:  'collegeschool/insert',
                        method: "post", 
                        data  : {
                            school_name: school_name,
                            address    : address,
                            manager    : "Active"
                        },  
                        dataType: "json", 
                        success : function (data) {  
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                }) 
                                var option = $('<option>').val(school_name).text(school_name).attr('data-school-address', address);
                                $('#college-registration-form select[name="school"]').append(option);

                                $('input[name="college_school_name"]').val('')  
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
                        error: function (xhr, status, error) { 
                            console.info(xhr.responseText);
                        }
                    });  
                } 
            });  



            // Add New TVET School Button
            $(document).on('click', '#add-new-tvet-school-button', function(e){  
                e.preventDefault(); 

                var bool =1; 
                $(".tvet-add-school").find("input[required]").each(function() {   
                    if($(this).val().trim() == ''){ 
                        bool = 0;
                        return false;
                    }else{
                        bool = 1
                    } 
                })
 

                var school_name = $('input[name = "tvet_school_name"]').val() 
                school_name     = school_name.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');
                var address     = $('input[name = "tvet_school_address"]').val() 
                address         = address.toLowerCase().split(' ').map(function(word) {
                    return word.charAt(0).toUpperCase() + word.slice(1);
                }).join(' ');

                if(!bool){
                    Swal.fire({
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url   : 'collegeschool/insert',
                        method: "post", 
                        data  : {
                            school_name: school_name,
                            address    : address,
                            manager    : "Active"
                        },  
                        dataType: "json", 
                        success : function (data) {  
                            if(data.response){ 
                                Swal.fire({
                                    title: "Good job!",
                                    text : data.message,
                                    icon : "success"
                                }) 
                                var option = $('<option>').val(school_name).text(school_name).attr('data-school-address', address);
                                $('#tvet-registration-form select[name="school"]').append(option);

                                $('input[name="tvet_school_name"]').val('')  
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
                        error: function (xhr, status, error) { 
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
                        title: "Input Field must not be empty!", 
                        icon : "error"
                    }) 
                }else{
                    $.ajax({
                        url   : 'course/insert',
                        method: "post", 
                        data  : {
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
                                $('#tvet-registration-form select[name="course"]').append($('<option>', {
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
                        error: function (xhr, status, error) { 
                            console.info(xhr.responseText);
                        }
                    }); 

                }
            });    


            
            //=============================================================================
            // APP ID
            //=============================================================================




            // shs_app_no_id();

            function shs_app_no_id(){
                $.ajax({
                    url     : 'registration/shs_app_no_id',
                    method  : "get",
                    dataType: "json", 
                    success : function (data) { 
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            }

            
            college_app_no_id();
            function college_app_no_id(){
                $.ajax({
                    url     : 'registration/college_app_no_id',
                    method  : "get",
                    dataType: "json", 
                    success : function (data) { 
                         
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            }
            
            tvet_app_no_id();
            function tvet_app_no_id(){
                $.ajax({
                    url     : 'registration/tvet_app_no_id',
                    method  : "get",
                    dataType: "json", 
                    success : function (data) {  
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            } 

            //=============================================================================
            // END
            //=============================================================================
 

        });
    </script>

<?= $this->endSection() ?>
