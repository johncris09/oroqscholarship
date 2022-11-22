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

        select[name="status"]{
            font-size: 1.5em !important;
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
                                                <input type="hidden" value="<?= $profile['ID'] ?>"  name="id" readonly>
                                                <input type="hidden" value="<?= $profile['AppNoYear'] ?>"  name="app_no_year" readonly>
                                                <input type="hidden"  value="<?= $profile['AppNoSem'] ?>"  name="app_no_sem" readonly>
                                                <input type="hidden"  value="<?= $profile['AppNoID'] ?>"  name="app_no_id" readonly>
                                            </div>
                                            <div class="col-6">
                                                <label for="status" class="form-label">Status <?= $required_field; ?></label>
                                                <select class="form-control"  name="status" required>
                                                    <option value="">Select</option> 
                                                    <?php 
                                                        foreach($scholar_status as $row){
                                                            if($row == $profile['AppStatus']){
                                                                $selected  = "selected";
                                                            }else{ 
                                                                $selected  = "";
                                                            }
                                                    ?> 
                                                        <option <?= $selected ?> value="<?= $row ?>"><?= $row ?></option>  
                                                    <?php } ?> 
                                                </select> 
                                                <input type="hidden" value="<?= $profile['AppManager']  ?>" name="manager"   readonly>
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
                                                <input type="date" value="<?= date("Y-m-d", strtotime($profile['AppDOB'])) ?>" class="form-control"   name="birthdate" required >
                                            </div>
                                            <div class="col-2">
                                                <label for="age" class="form-label">Age <?= $required_field; ?></label>
                                                <input type="number"  value="<?= $profile['AppAge'] ?>"  class="form-control" name="age" readonly>
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
                                                <input type="text" value="<?= $profile['AppContact'] ?>"  class="form-control"   name="contact_no">
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
                                                <input type="number"  value="<?= $profile['AppAvailment'] ?>" class="form-control" name="availment" required>
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
                                        <input type="text"  value="<?= $profile['AppMotherOccu'] ?>" class="form-control text-capitalize"  name="mother_occupation" >
                                    </div> 
                                </div>  
                                <div class="row   mt-3" >  
                                    <div class="col-12  float-left"> 
                                        <button type="submit" class="btn btn-primary rounded-pill">Update</button>  
                                        <button type="button" data-id="<?= $profile["ID"] ?>" id="delete-button" class="btn btn-danger rounded-pill">Delete</button> 
                                        
                                    </div>
                                </div>    
                            </form>    
                    <?php
                        }else if($type == "college"){
                    ?>
                    
                    <?php

                        }else if($type == "tvet"){
                    ?>
                            
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
                var form_id = $(this).closest('form').attr('id') 
                $('#'+form_id+' input[name="age"]').val(age)
            });
 
            $(document).on('submit', '#senior-high-registration-form', function(e){ 
                
                e.preventDefault();    
                var _this = $(this) 
                $.ajax({
                    url:  '/manage/update_shs',
                    method: "post", 
                    data: $("#senior-high-registration-form").serialize(),
                    dataType: "json", 
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
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 
            });

            
            $(document).on('click', '#senior-high-registration-form #delete-button', function(e){ 

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
                            url:  '/manage/archived_shs',
                            method: "post",  
                            data: {
                                id: id,
                                manager: "Archived",
                            },
                            dataType: "json", 
                            success: function (data) {  
                                console.info(data);
                                // if(data.response){ 
                                //     Swal.fire({
                                //         title:"Good job!",
                                //         text: data.message,
                                //         icon:"success"
                                //     })
                                //     table.ajax.reload() 
                                // }else{ 
                                //     Swal.fire({
                                //         title:"Update Error!",
                                //         text: data.message,
                                //         icon:"error"
                                //     }) 
                                // }
                            },
                            error: function (xhr, status, error) { 
                                console.info(xhr.responseText);
                            }
                        });  
                     
                    }
                }) 

            });


            $(document).on('submit', '#college-registration-form', function(e){ 
                
                e.preventDefault();    
                var _this = $(this)  
                
                $.ajax({
                    url:  'registration/insert_college',
                    method: "post", 
                    data: $("#college-registration-form").serialize(),
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
                
                $.ajax({
                    url:  'registration/insert_tvet',
                    method: "post", 
                    data: $("#tvet-registration-form").serialize(),
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
