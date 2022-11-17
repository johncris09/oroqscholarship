<?= $this->extend('layout/layout') ?>  

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>

<?= $this->section('pageStyle') ?>
    <style>
        #frame:hover{
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
                        <a href="#senior-high-tab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            Senior High School Registration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#college-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
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
                    <div class="tab-pane active" id="senior-high-tab">   
                        <form id="senior-high-registration-form" class="validation-form">
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
                                        <label for="formFile" >
                                            <img id="frame" title="Select Image" class="rounded mx-auto d-block " alt="Profile Photo" src="<?=base_url()?>/img/select-image.png" style="  height: 240px !important; width: 250px !important"  /> 
                                        </label> 
                                        <input class="form-control" type="file" id="formFile" style="display: none "> 
                                    </div>
                                    <div class="text-center">
                                        <button type="button" id="clearImage" class="btn btn-primary mt-3 rounded-pill">Clear Photo</button>  
                                    </div>
                                </div>
                            </div>
                               
                            <div class="row g-3" >
                                <div class="col">
                                    <label for="" class="form-label">Schoo <?= $required_field; ?></label>
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
                                    <label for="" class="form-label">Strand <?= $required_field; ?></label>
                                    <select class="form-control" required>
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
                                    <label for="" class="form-label">Grade Level <?= $required_field; ?></label>
                                    <select class="form-control" required>
                                        <option value="">Select</option> 
                                        <?php foreach($grade_level as $row):?>  
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
                    <div class="tab-pane show " id="college-tab"> 
                        
                        

                    </div>
                    <div class="tab-pane" id="tvet-tab">
                        

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
 
            $(document).on('change', '#formFile', function(e){  

                var validExtensions = ["jpg","pdf","jpeg","gif","png"]
                var file = $(this).val().split('.').pop();
                if (validExtensions.indexOf(file) == -1) { 
                    Swal.fire({
                        title:"Upload Error!",
                        text: "Only formats are allowed : "+validExtensions.join(', '),
                        icon:"error"
                    }) 
                }else{
                    frame.src = URL.createObjectURL(event.target.files[0]);
                } 
            }); 

            $(document).on('click', '#clearImage', function(e){ 
                
                document.getElementById('formFile').value = null;
                frame.src = "<?=base_url()?>/img/select-image.png";
            }); 
            
            $(document).on('submit', '#senior-high-registration-form', function(e){ 
            });


        });
    </script>

<?= $this->endSection() ?>
