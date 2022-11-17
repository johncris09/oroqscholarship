<?= $this->extend('layout/layout') ?>  

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?>
    <style>
        #frameShs:hover, #frameCollege:hover, #frameTvet:hover{
            cursor: pointer;
        }
    </style>
<?= $this->endSection() ?> 

<?= $this->section('main') ?>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?= $page_title; ?></h4>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active ">
                            Senior High School Registration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link  ">
                            College Registration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            TVET Registration
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="senior-high-tab">   
                        <form id="senior-high-registration-form" class="validation-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <label for="" class="form-label">App No. </label>
                                            <h1 style="text-decoration: underline"><?= $sequence_year ?> - <?= $seq_sem ?> - <?= $app_no_id ?> </h1>
                                            <input type="hidden" value="<?= $sequence_year ?>"  name="app_no_year" readonly>
                                            <input type="hidden"  value="<?= $seq_sem ?>"  name="app_no_sem" readonly>
                                            <input type="hidden"  value="<?= $app_no_id ?>"  name="app_no_id" readonly>
                                        </div>
                                        <div class="col-6">
                                            <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                            <h1 style="text-decoration: underline">Pending</h1>
                                            <input type="hidden" class="form-control" value="Pending" name="status" required readonly>
                                        </div>
                                    </div>
                                </div> 
                                <hr>
                                <div class="col-9">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                            <input type="text" class="form-control"  name="lastname" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                            <input type="text" class="form-control" name="firstname"  required>
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" class="form-control"   name="middlename">
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" name="suffix">
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-12">  
                                            <label for="barangay" class="form-label">Address <?= $required_field; ?></label>
                                            <select class="form-control" name="barangay"   required>
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
                                            <input type="number" class="form-control"   name="age" required readonly>
                                        </div>
                                        <div class="col">
                                            <label for="civil_status" class="form-label">Civil Status <?= $required_field; ?></label>
                                            <select class="form-control" id="civil_status" name="civil_status" required>
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
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" parsley-type="email" >
                                        </div>
                                        <div class="col-6">
                                            <label for="availment" class="form-label">Availment <?= $required_field; ?></label>
                                            <input type="number" class="form-control" name="availment" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="row justify-content-center  ">   
                                        <label for="formFileShs" >
                                            <img id="frameShs" title="Select Image" class="rounded mx-auto d-block " alt="Profile Photo" src="<?=base_url()?>/img/select-image.png" style="  height: 240px !important; width: 250px !important"  /> 
                                        </label> 
                                        <input class="form-control" type="file" id="formFileShs" style="display: none "> 
                                    </div>
                                    <div class="text-center">
                                        <button type="button" id="clearImageShs" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
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
                                                <option value="<?= $row['ID']  ?>"><?= $row['SchoolName']  ?></option>  
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
                                                <option value="<?= $row['ID']  ?>"><?= $row['Strand']  ?></option>  
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
                                    <input type="text" class="form-control"   name="father_name" >
                                </div>
                                <div class="col">
                                    <label for="father_occupation" class="form-label">Occupation</label>
                                    <input type="text" class="form-control"  name="father_occupation" >
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="mother_name" class="form-label">Mother's  Name</label>
                                    <input type="text" class="form-control" name="mother_name" >
                                </div>
                                <div class="col">
                                    <label for="mother_occupation" class="form-label">Occupation</label>
                                    <input type="text" class="form-control"  name="mother_occupation" >
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
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                            <input type="text" class="form-control" id="lastname" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                            <input type="text" class="form-control" id="firstname" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" class="form-control" id="middlename">
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="suffix">
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-12">  
                                            <label for="barangay" class="form-label">Address <?= $required_field; ?></label>
                                            <select class="form-control" name="barangay" id="barangay" required>
                                                <option value="">Select</option> 
                                                <?php foreach($barangay as $row):?> 
                                                    <option value=""><?= $row ?></option>  
                                                <?php endforeach; ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for=""  class="form-label">Date of Birth <?= $required_field; ?></label>
                                            <input type="date" class="form-control" id="" required >
                                        </div>
                                        <div class="col-2">
                                            <label for="" class="form-label">Age <?= $required_field; ?></label>
                                            <input type="number" class="form-control" id="" required>
                                        </div>
                                        <div class="col">
                                            <label for="middlename" class="form-label">Civil Status <?= $required_field; ?></label>
                                            <select class="form-control" required>
                                                <option value="">Select</option> 
                                                <?php foreach($civil_status as $row):?> 
                                                    <option value=""><?= $row ?></option>  
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="suffix" class="form-label">Sex <?= $required_field; ?></label>
                                            <select class="form-control" required>
                                                <option value="">Select</option> 
                                                <option value="Male">Male</option> 
                                                <option value="Female">Female</option>  
                                            </select>
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="" class="form-label">Contact #</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-label">CTC # <?= $required_field; ?></label>
                                            <input type="text" class="form-control" id="" required>
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="" parsley-type="email" >
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-label">Availment <?= $required_field; ?></label>
                                            <input type="number" class="form-control" id="" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="row justify-content-center  ">   
                                        <label for="formFileCollege" >
                                            <img id="frameCollege" title="Select Image" class="rounded mx-auto d-block " alt="Profile Photo" src="<?=base_url()?>/img/select-image.png" style="  height: 240px !important; width: 250px !important"  /> 
                                        </label> 
                                        <input class="form-control" type="file" id="formFileCollege" style="display: none "> 
                                    </div>
                                    <div class="text-center">
                                        <button type="button" id="clearImageCollege" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($school as $row):?> 
                                            <?php if($row['SchoolName'] != ""):?> 
                                                <option value="<?= $row['ID']  ?>"><?= $row['SchoolName']  ?></option>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Course <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($course as $row):?> 
                                            <?php if($row['colCourse'] != ""):?> 
                                                <option value="<?= $row['ID']  ?>"><?= $row['colCourse']  ?></option>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                            </div> 
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School Address </label> 
                                    <input type="text" class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Year Level <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($year_level as $row):?>  
                                            <option value="<?= $row   ?>"><?= $row   ?></option>   
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Semester <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($semester as $row):?>  
                                            <option value="<?= $row   ?>"><?= $row   ?></option>   
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Units <?= $required_field; ?></label>
                                    <input type="number" class="form-control" id="" required>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">SY <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach(range(2017, date('Y')) as $year):?>  
                                            <option value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Father's  Name</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Occupation</label>
                                    <input type="text" class="form-control" id="">
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Mother's  Name</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Occupation</label>
                                    <input type="text" class="form-control" id="">
                                </div> 
                            </div>  
                            <div class="row g-3 mt-2" > 
                                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light rounded-pill">Save  Changes</button> 
                            </div>    
                        </form>

                    </div>
                    
                    <div class="tab-pane" id="tvet-tab">
                        
                        <form id="tvet-registration-form" class="validation-form">
                            <div class="row">
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="lastname" class="form-label">Last Name <?= $required_field; ?></label>
                                            <input type="text" class="form-control" id="lastname" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="firstname" class="form-label">First Name <?= $required_field; ?></label>
                                            <input type="text" class="form-control" id="firstname" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="middlename" class="form-label">M.I.</label>
                                            <input type="text" class="form-control" id="middlename">
                                        </div>
                                        <div class="col-2">
                                            <label for="suffix" class="form-label">Suffix</label>
                                            <input type="text" class="form-control" id="suffix">
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-12">  
                                            <label for="barangay" class="form-label">Address <?= $required_field; ?></label>
                                            <select class="form-control" name="barangay" id="barangay" required>
                                                <option value="">Select</option> 
                                                <?php foreach($barangay as $row):?> 
                                                    <option value=""><?= $row ?></option>  
                                                <?php endforeach; ?>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for=""  class="form-label">Date of Birth <?= $required_field; ?></label>
                                            <input type="date" class="form-control" id="" required >
                                        </div>
                                        <div class="col-2">
                                            <label for="" class="form-label">Age <?= $required_field; ?></label>
                                            <input type="number" class="form-control" id="" required>
                                        </div>
                                        <div class="col">
                                            <label for="middlename" class="form-label">Civil Status <?= $required_field; ?></label>
                                            <select class="form-control" required>
                                                <option value="">Select</option> 
                                                <?php foreach($civil_status as $row):?> 
                                                    <option value=""><?= $row ?></option>  
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="suffix" class="form-label">Sex <?= $required_field; ?></label>
                                            <select class="form-control" required>
                                                <option value="">Select</option> 
                                                <option value="Male">Male</option> 
                                                <option value="Female">Female</option>  
                                            </select>
                                        </div> 
                                    </div> 
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="" class="form-label">Contact #</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-label">CTC # <?= $required_field; ?></label>
                                            <input type="text" class="form-control" id="" required>
                                        </div> 
                                    </div> 
                                    <div class="row" >
                                        <div class="col-6">
                                            <label for="" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="" parsley-type="email" >
                                        </div>
                                        <div class="col-6">
                                            <label for="" class="form-label">Availment <?= $required_field; ?></label>
                                            <input type="number" class="form-control" id="" required>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="row justify-content-center  ">   
                                        <label for="formFileTvet" >
                                            <img id="frameTvet" title="Select Image" class="rounded mx-auto d-block " alt="Profile Photo" src="<?=base_url()?>/img/select-image.png" style="  height: 240px !important; width: 250px !important"  /> 
                                        </label> 
                                        <input class="form-control" type="file" id="formFileTvet" style="display: none "> 
                                    </div>
                                    <div class="text-center">
                                        <button type="button" id="clearImageTvet" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($school as $row):?> 
                                            <?php if($row['SchoolName'] != ""):?> 
                                                <option value="<?= $row['ID']  ?>"><?= $row['SchoolName']  ?></option>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Course <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($course as $row):?> 
                                            <?php if($row['colCourse'] != ""):?> 
                                                <option value="<?= $row['ID']  ?>"><?= $row['colCourse']  ?></option>  
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                            </div> 
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">School Address </label> 
                                    <input type="text" class="form-control" id="" required>
                                </div>
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Year Level <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($year_level as $row):?>  
                                            <option value="<?= $row   ?>"><?= $row   ?></option>   
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Semester <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($semester as $row):?>  
                                            <option value="<?= $row   ?>"><?= $row   ?></option>   
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">No. of Hours <?= $required_field; ?></label>
                                    <input type="number" class="form-control" id="" required>
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">SY <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach(range(2017, date('Y')) as $year):?>  
                                            <option value="SY: <?= $year . "-" . ($year + 1)?>">SY: <?= $year . "-" . ($year + 1)?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Father's  Name</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Occupation</label>
                                    <input type="text" class="form-control" id="">
                                </div> 
                            </div>
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Mother's  Name</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="col">
                                    <label for="" class="form-label">Occupation</label>
                                    <input type="text" class="form-control" id="">
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



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() { 

            

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
 
            $(document).on('change', '#formFileShs', function(e){   

                var validExtensions = ["jpg","pdf","jpeg","gif","png", "jfif"]
                var file = $(this).val().split('.').pop();
                if (validExtensions.indexOf(file) == -1) { 
                    Swal.fire({
                        title:"Upload Error!",
                        text: "Only formats are allowed : "+validExtensions.join(', '),
                        icon:"error"
                    }) 
                }else{
                    frameShs.src = URL.createObjectURL(event.target.files[0]);
                } 
            }); 

            $(document).on('click', '#clearImageShs', function(e){ 
                
                document.getElementById('formFileShs').value = null;
                frameShs.src = "<?=base_url()?>/img/select-image.png";
            }); 
            
            $(document).on('change', '#formFileCollege', function(e){  

                var validExtensions = ["jpg","pdf","jpeg","gif","png", "jfif"]
                var file = $(this).val().split('.').pop();
                if (validExtensions.indexOf(file) == -1) { 
                    Swal.fire({
                        title:"Upload Error!",
                        text: "Only formats are allowed : "+validExtensions.join(', '),
                        icon:"error"
                    }) 
                }else{
                    frameCollege.src = URL.createObjectURL(event.target.files[0]);
                } 
            }); 

            $(document).on('click', '#clearImageCollege', function(e){ 
                
                document.getElementById('formFileShs').value = null;
                frameCollege.src = "<?=base_url()?>/img/select-image.png";
            });

            
            $(document).on('change', '#formFileTvet', function(e){  

                var validExtensions = ["jpg","pdf","jpeg","gif","png", "jfif"]
                var file = $(this).val().split('.').pop();
                if (validExtensions.indexOf(file) == -1) { 
                    Swal.fire({
                        title:"Upload Error!",
                        text: "Only formats are allowed : "+validExtensions.join(', '),
                        icon:"error"
                    }) 
                }else{
                    frameTvet.src = URL.createObjectURL(event.target.files[0]);
                } 
            }); 
            $(document).on('click', '#clearImageTvet', function(e){ 

                document.getElementById('formFileShs').value = null;
                frameTvet.src = "<?=base_url()?>/img/select-image.png";
            });
             
            // get age using birthdate 
            $(document).on('change', 'input[name="birthdate"]', function(e){ 
                var age = moment().diff($(this).val(), 'years',false);   
                $('input[name="age"]').val(age)
            });

            $(document).on('submit', '#senior-high-registration-form', function(e){ 
                
                e.preventDefault();    
                var _this = $(this)
                console.info(_this.serializeArray())
                $.ajax({
                    url:  'registration/insert_senior_high',
                    method: "post", 
                    data: $("#senior-high-registration-form").serialize(),
                    dataType: "json", 
                    success: function (data) {  
                        console.log(data)
                        // if(data.response){ 
                        //     Swal.fire({
                        //         title:"Good job!",
                        //         text: data.message,
                        //         icon:"success"
                        //     })

                        //     table.ajax.reload()
                        //     $("#senior-high-registration-form")[0].reset()
                        // }else{  
                        //     Swal.fire({
                        //         title:"Insert Error!",
                        //         text: data.message,
                        //         icon:"error"
                        //     }) 
                        // }
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });
            $(document).on('submit', '#college-registration-form', function(e){ 
            });
            $(document).on('submit', '#tvet-registration-form', function(e){ 
            });


        });
    </script>

<?= $this->endSection() ?>
