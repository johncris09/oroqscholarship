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

                    <ul class="nav nav-tabs"> 
                        <li class="nav-item">
                            <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link   ">
                                Senior High School Registration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                                College Registration
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                TVET Registration
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content"> 
                        <div class="tab-pane " id="senior-high-tab"> 
                            <form id="senior-high-registration-form" class="validation-form"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <label for="" class="form-label">App No. </label>
                                                <h1 style="text-decoration: underline"><?= $sequence_year ?> - <?= $seq_sem ?> - <span id="app_no_id"><?= $app_no_id ?></span> </h1>
                                                <input type="hidden" value="<?= $sequence_year ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $seq_sem ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $app_no_id ?>"  name="app_no_id" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <h1 style="text-decoration: underline" class="text-danger">Pending</h1>
                                                <input type="hidden" value="Pending" name="status"   readonly>
                                                <input type="hidden" value="Active" name="manager"   readonly>
                                            </div>
                                        </div>
                                    </div> 
                                    <hr> 
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
                                                <input type="text" class="form-control"   name="contact_no">
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
                                                <input type="number" class="form-control" name="availment" required>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_shs">   
                                                <input type="hidden" id="photo" name="image">
                                                <img src="<?=base_url()?>/img/select-image.png" id="uploaded_image_shs" class="img-responsive img-circle" />
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
                                        <label for="school" class="form-label">School <?= $required_field; ?></label>
                                        <select class="form-control" id="school" name="school" required>
                                            <option value="">Select</option> 
                                            <?php foreach($school as $row):?> 
                                                <?php if($row['SchoolName'] != ""):?> 
                                                    <option value="<?= $row['SchoolName']  ?>"><?= $row['SchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="strand" class="form-label">Strand <?= $required_field; ?></label>
                                        <select class="form-control"  name="strand" required>
                                            <option value="">Select</option> 
                                            <?php foreach($strand as $row):?> 
                                                <?php if($row['Strand'] != ""):?> 
                                                    <option value="<?= $row['Strand']  ?>"><?= $row['Strand']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
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
                                        <select class="form-control"   name="semester"  required>
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div> 
                                    <div class="col">
                                        <label for="school_year" class="form-label">SY <?= $required_field; ?></label>
                                        <select class="form-control"   name="school_year"  required>
                                            <option value="">Select</option> 
                                            <?php foreach(range(2017, date('Y')) as $year):?>  
                                                <option value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
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
                                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save  Changes</button> 
                                </div>    
                            </form>
                            
                            
                        </div>
                        <div class="tab-pane  " id="college-tab">   
                            <form id="college-registration-form" class="validation-form">
                                <div class="row"> 
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <label for="" class="form-label">App No. </label>
                                                <h1 style="text-decoration: underline"><?= $sequence_year ?> - <?= $seq_sem ?> - <span id="app_no_id"><?= $app_no_id ?></span> </h1>
                                                <input type="hidden" value="<?= $sequence_year ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $seq_sem ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $app_no_id ?>"  name="app_no_id" readonly>
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
                                <hr>
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
                                                <input type="text" class="form-control"  name="contact_no">
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
                                                <input type="number" class="form-control" name="availment" required>
                                            </div> 
                                        </div>
                                    </div>  
                                    
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_college">  
                                                <input type="text" id="photo" name="image">
                                                <img src="<?=base_url()?>/img/select-image.png"  id="uploaded_image_college" class="img-responsive img-circle" />
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
                                        <label for="" class="form-label">School <?= $required_field; ?></label>
                                        <select class="form-control" name="school" required>
                                            <option value="">Select</option> 
                                            <?php foreach($college_school as $row):?> 
                                                <?php if($row['colSchoolName'] != ""):?> 
                                                    <option value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Course <?= $required_field; ?></label>
                                        <select class="form-control" name="course" required>
                                            <option value="">Select</option> 
                                            <?php foreach($course as $row):?> 
                                                <?php if($row['colCourse'] != ""):?> 
                                                    <option value="<?= $row['colCourse']  ?>"><?= $row['colCourse']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
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
                                        <select class="form-control"  name="semester" required>
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
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
                                            <?php foreach(range(2017, date('Y')) as $year):?>  
                                                <option value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
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
                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save  Changes</button> 
                                </div>    
                            </form>
                        </div>
                        
                        <div class="tab-pane show active " id="tvet-tab">
                            
                            <form id="tvet-registration-form" class="validation-form">
                                <div class="row"> 
                                    <div class="col-12">
                                        <div class="row justify-content-between">
                                            <div class="col-6">
                                                <label for="" class="form-label">App No. </label>
                                                <h1 style="text-decoration: underline"><?= $sequence_year ?> - <?= $seq_sem ?> - <span id="app_no_id"><?= $app_no_id ?></span> </h1>
                                                <input type="hidden" value="<?= $sequence_year ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $seq_sem ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $app_no_id ?>"  name="app_no_id" readonly>
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
                                <hr>
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
                                                <input type="text" class="form-control"  name="contact_no">
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
                                                <input type="number" class="form-control" name="availment" required>
                                            </div> 
                                        </div>
                                    </div> 
                                    <div class="col-3">   
                                        <div class="image_area"> 
                                            <label for="upload_image_tvet">  
                                                <input type="text" id="photo" name="image">
                                                <img src="<?=base_url()?>/img/select-image.png"  id="uploaded_image_tvet" class="img-responsive img-circle" />
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
                                        <label for="" class="form-label">School <?= $required_field; ?></label>
                                        <select class="form-control" name="school" required>
                                            <option value="">Select</option> 
                                            <?php foreach($college_school as $row):?> 
                                                <?php if($row['colSchoolName'] != ""):?> 
                                                    <option value="<?= $row['colSchoolName']  ?>"><?= $row['colSchoolName']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">Course <?= $required_field; ?></label>
                                        <select class="form-control" name="course" required>
                                            <option value="">Select</option> 
                                            <?php foreach($course as $row):?> 
                                                <?php if($row['colCourse'] != ""):?> 
                                                    <option value="<?= $row['colCourse']  ?>"><?= $row['colCourse']  ?></option>  
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
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
                                        <select class="form-control"  name="semester" required>
                                            <option value="">Select</option> 
                                            <?php foreach($semester as $row):?>  
                                                <option value="<?= $row   ?>"><?= $row   ?></option>   
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="units" class="form-label">No. of Units <?= $required_field; ?></label>
                                        <input type="number" class="form-control" name="units" required>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label">SY <?= $required_field; ?></label>
                                        <select class="form-control" name="school_year" required>
                                            <option value="">Select</option> 
                                            <?php foreach(range(2017, date('Y')) as $year):?>  
                                                <option value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
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
                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save  Changes</button> 
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
            
            var $modal_shs = $('#modal_shs');
            var image_shs = document.getElementById('sample_image_shs'); 
            var $modal_college = $('#modal_college');
            var image_college = document.getElementById('sample_image_college'); 
            var $modal_tvet = $('#modal_tvet');
            var image_tvet = document.getElementById('sample_image_tvet'); 
            var cropper;
            var base64data;
 
            $('#upload_image_shs').change(function(event){
                var files = event.target.files; 
                var done = function (url) {
                    image_shs.src = url;
                    $modal_shs.modal('show');  
                }; 
                if (files && files.length > 0)
                { 
                    reader = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]); 
                }
            });
 
 

            $('#upload_image_college').change(function(event){
                var files = event.target.files;
                var done = function (url) {
                    image_college.src = url;
                    $modal_college.modal('show');
                }; 
                if (files && files.length > 0)
                { 
                    reader = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]); 
                }
            });
            $('#upload_image_tvet').change(function(event){
                var files = event.target.files;
                var done = function (url) {
                    image_tvet.src = url;
                    $modal_tvet.modal('show');
                }; 
                if (files && files.length > 0)
                { 
                    reader = new FileReader();
                    reader.onload = function (event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]); 
                }
            });

            $modal_shs.on('shown.bs.modal', function() {
                cropper = new Cropper(image_shs, { 
                    dragMode: 'move',    
                    // aspectRatio: 1,
                    // viewMode: 3,  
                    aspectRatio: 1,
                    minCropBoxWidth: 150,
                    minCropBoxHeight: 150,
                    cropBoxResizable: true,
                    guides: true,
                    highlight: true,
                    dragCrop: true,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    responsive: true,
                    background: true,autoCropArea: 1,
                    preview: '.preview', 
                }); 

            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            
            $modal_college.on('shown.bs.modal', function() {
                cropper = new Cropper(image_college, {
                    dragMode: 'move',    
                    // aspectRatio: 1,
                    // viewMode: 3,  
                    aspectRatio: 1,
                    minCropBoxWidth: 360,
                    minCropBoxHeight: 360,
                    guides: true,
                    highlight: false,
                    dragCrop: true,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    responsive: true,
                    background: false,
                    preview: '.preview'
                });
 

            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            
            $modal_tvet.on('shown.bs.modal', function() {
                cropper = new Cropper(image_tvet, {
                    dragMode: 'move',    
                    // aspectRatio: 1,
                    // viewMode: 3,  
                    aspectRatio: 1,
                    minCropBoxWidth: 360,
                    minCropBoxHeight: 360,
                    guides: true,
                    highlight: false,
                    dragCrop: true,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    responsive: true,
                    background: false,
                    preview: '.preview'
                });
 

            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            $("#crop_shs").click(function(e){
                canvas = cropper.getCroppedCanvas({ 
                    width: 96,
                    height: 96,
                });

                canvas.toBlob(function(blob) {
                    var reader = new FileReader(); 
                    reader.readAsDataURL(blob);  
                    reader.onloadend = function() { 
                        base64data = reader.result;

                        $.ajax({
                            url: "registration/upload",
                            method: "POST",                	
                            data: {image: base64data},
                            dadtaType: "json",
                            success: function(data){ 
                                image_data = data;
                                $modal_shs.modal('hide');  
                                $('#uploaded_image_shs').attr('src', data);                
                            }
                        }); 
                        $('#senior-high-registration-form #photo').val(base64data); 

                    }
                });
            });


            $("#crop_college").click(function(){
                canvas = cropper.getCroppedCanvas({ 
                    width: 96,
                    height: 96,
                });

                canvas.toBlob(function(blob) {
                    var reader = new FileReader();
                    reader.readAsDataURL(blob); 
                    reader.onloadend = function() {
                        base64data = reader.result;  

                        $.ajax({
                            url: "registration/upload",
                            method: "POST",                	
                            data: {image: base64data},
                            dadtaType: "json",
                            success: function(data){  
                                $modal_college.modal('hide');
                                $('#uploaded_image_college').attr('src', data);
                            }
                        });
                        $('#college-registration-form #photo').val(base64data); 
                    }
                });
            });
 
            $("#crop_tvet").click(function(){
                canvas = cropper.getCroppedCanvas({ 
                    width: 96,
                    height: 96,
                });

                canvas.toBlob(function(blob) {
                    var reader = new FileReader();
                    reader.readAsDataURL(blob); 
                    reader.onloadend = function() {
                        base64data = reader.result;  

                        $.ajax({
                            url: "registration/upload",
                            method: "POST",                	
                            data: {image: base64data},
                            dadtaType: "json",
                            success: function(data){  
                                $modal_tvet.modal('hide');
                                $('#uploaded_image_tvet').attr('src', data);
                            }
                        });
                        
                        $('#tvet-registration-form #photo').val(base64data); 
                    }
                });
            });
  
  
            $(document).on('click', '#clearImageshs', function(e){  
                $('#uploaded_image_shs').attr('src', "<?=base_url()?>/img/select-image.png"); 
            });
  
            $(document).on('click', '#clearImagecollege', function(e){  
                $('#uploaded_image_college').attr('src', "<?=base_url()?>/img/select-image.png"); 
            });
            $(document).on('click', '#clearImagetvet', function(e){  
                $('#uploaded_image_tvet').attr('src', "<?=base_url()?>/img/select-image.png"); 
            }); 

            $(document).ready(function() {
                $(".validation-form").parsley()
            }), $(function() {
                $("#demo-form").parsley().on("field:validated", function() {
                    var e = 0 === $(".parsley-error").length;
                    $(".alert-info").toggleClass("d-none", !e), $(".alert-warning").toggleClass("d-none", e)
                }).on("form:submit", function() {
                    return !1
                })
            }); 
  

            shs_app_no_id();

            function shs_app_no_id(){
                $.ajax({
                    url:  'registration/shs_app_no_id',
                    method: "get",
                    dataType: "json", 
                    success: function (data) {   
                        $('#senior-high-registration-form input[name="app_no_id"]').val(data)   // shs_app_no_id
                        $('#senior-high-registration-form #app_no_id').html(data)               // shs_app_no_id 
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            }

            $(document).on('submit', '#senior-high-registration-form', function(e){  
                e.preventDefault();   
                
                
                var formData = new FormData($("#senior-high-registration-form")[0]);  
                $.ajax({
                    url:  'registration/insert_senior_high',
                    method: "post", 
                    data: formData,
                    processData: false,
                    contentType: false, 
                    dataType: "json", 
                    success: function (data) {    
                        if(data.response){   
                            Swal.fire({
                                title:"Good job!",
                                text: data.message,
                                icon:"success"
                            }) 
                            $("#senior-high-registration-form")[0].reset()
                            shs_app_no_id();
                            
                            $('#uploaded_image_shs').attr('src', "<?=base_url()?>/img/select-image.png");

                        }else{  
                            Swal.fire({
                                title:"Insert Error!",
                                text: data.message,
                                icon:"error"
                            }) 
                        }
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });


            $(document).on('submit', '#college-registration-form', function(e){ 
                
                e.preventDefault();    
                var _this = $(this)  
                
                var formData = new FormData($("#college-registration-form")[0]); 
                $.ajax({
                    url:  'registration/insert_college',
                    method: "post", 
                    data: formData,
                    processData: false,
                    contentType: false, 
                    dataType: "json",
                    success: function (data) { 
                        if(data.response){ 
                            Swal.fire({
                                title:"Good job!",
                                text: data.message,
                                icon:"success"
                            }) 

                            $("#college-registration-form")[0].reset()
                            shs_app_no_id();
                            $('#uploaded_image_college').attr('src', "<?=base_url()?>/img/select-image.png");
                        }else{  
                            Swal.fire({
                                title:"Insert Error!",
                                text: data.message,
                                icon:"error"
                            }) 
                        }
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });
            $(document).on('submit', '#tvet-registration-form', function(e){ 
                
                
                e.preventDefault();    
                var _this = $(this)  
                
                var formData = new FormData($("#tvet-registration-form")[0]); 
                $.ajax({
                    url:  'registration/insert_tvet',
                    method: "post", 
                    data: formData,
                    processData: false,
                    contentType: false, 
                    dataType: "json", 
                    success: function (data) { 
                        if(data.response){ 
                            Swal.fire({
                                title:"Good job!",
                                text: data.message,
                                icon:"success"
                            })

                            
                            $("#tvet-registration-form")[0].reset()
                            shs_app_no_id();
                            $('#uploaded_image_tvet').attr('src', "<?=base_url()?>/img/select-image.png");
                        }else{  
                            Swal.fire({
                                title:"Insert Error!",
                                text: data.message,
                                icon:"error"
                            }) 
                        }
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });
 


        });
    </script>

<?= $this->endSection() ?>
