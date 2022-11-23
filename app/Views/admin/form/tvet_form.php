
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