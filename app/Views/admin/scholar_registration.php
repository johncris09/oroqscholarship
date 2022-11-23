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
                            <a href="#tvet-tab" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
                                TVET Registration
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="senior-high-tab">   
                            <?= include('form/shs_form.php') ?>       
                        </div>
                        <div class="tab-pane" id="college-tab">  
                            <?= include('form/college_form.php') ?>   

                        </div>
                        
                        <div class="tab-pane " id="tvet-tab">
                            <?= include('form/tvet_form.php') ?>    

                        </div>
                    </div>
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
                var _this = $(this) 
                $.ajax({
                    url:  'registration/insert_senior_high',
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

                            
                            $("#senior-high-registration-form")[0].reset()
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
