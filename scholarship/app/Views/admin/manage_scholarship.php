<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white"> 
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-6">
                            <h4>Do you want to close the semester? </h4>
                        </div>
                        <div class="col-6">
                            <input id="close-btn" type="checkbox" <?php echo ($config['semester_closed']) ? "checked" :  ""?> class="js-switch" /> Yes/No
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4>Configuration of Current School Year and Current Semester</h4>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3"> 
                                <select class="form-select" name="school_year"  >
                                    <option value="">Select</option> 
                                    <?php foreach(range(date('Y'), $year_started) as $year):?>  
                                        <option <?php echo ( "SY: " . ($year - 1) . "-" .  $year == $config['current_sy']) ? 'selected' : '' ?> value="SY: <?=  ($year - 1) . "-" .  $year ?>">SY: <?= ($year - 1) . "-" .  $year  ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select name="semester" class="form-select" id="inputGroupSelect01"> 
                                    <option <?php echo ($config['current_sem'] == 1) ? "selected" : ""; ?> value="1">1st</option>
                                    <option <?php echo ($config['current_sem'] == 2) ? "selected" : ""; ?> value="2">2nd</option> 
                                </select>
                            </div>
                        </div>
                    </div> 
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
 



<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() {   
            var semester_closed;
            var title; 


            $('#close-btn').on('click', function(){ 
                var that = this
                if($(this).is(':checked')){ 
                    that.checked = false; 
                    
                    Swal.fire({
                        title            : 'Do you want to save the changes?', 
                        showCancelButton : true,
                        confirmButtonText: 'Yes', 
                        icon             : "question"
                    }).then((result) => { 
                        if (result.isConfirmed) {
                            $.ajax({
                                url   : "manage_scholarship/semester_closed",
                                method: "POST",  
                                data  : {
                                    semester_closed: 1, 
                                }, 
                                dataType: "json",
                                success : function(data){
                                    if(data.response){ 
                                        Swal.fire({
                                            title        :" Good job!",
                                            text         :  data.message,
                                            icon         :" success"
                                        }).then((result) => { 
                                            window.location.reload();
                                        })
                                        that.checked = true
                                    }
                                }
                            }); 
                            // that.checked = true
                        } else if (result.isDenied) {
                            that.checked = false
                        }
                    }) 
                }else{
                    that.checked = true;

                    
                    Swal.fire({
                        title            : 'Do you want to save the changes?', 
                        showCancelButton : true,
                        confirmButtonText: 'Yes', 
                        icon             : "question"
                    }).then((result) => { 
                        if (result.isConfirmed) {
                            $.ajax({
                                url   : "manage_scholarship/semester_closed",
                                method: "POST",  
                                data  : {
                                    semester_closed: 0, 
                                }, 
                                dataType: "json",
                                success : function(data){
                                    if(data.response){ 
                                        Swal.fire({
                                            title: "Good job!",
                                            text : data.message,
                                            icon : "success"
                                        }).then((result) => { 
                                            window.location.reload();
                                        })
                                        that.checked = false
                                    }
                                }
                            }); 
                            // that.checked = true
                        } else if (result.isDenied) {
                            that.checked = false
                        }
                    })
                    
                }

            }) 

            $('select[name=school_year]').on('change', function(){ 
                var school_year = $('select[name=school_year]').val();
                $.ajax({
                    url   : "manage_scholarship/update_sy",
                    method: "POST",  
                    data  : {
                        current_sy: school_year 
                    }, 
                    dataType: "json",
                    success: function(data){  
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            }).then((result) => { 
                                window.location.reload();
                            })
                        }
                    }
                }); 
                
            })



            $('select[name=semester]').on('change', function(){ 
                var sem = $('select[name=semester]').val(); 
                $.ajax({
                    url   : "manage_scholarship/update_sem",
                    method: "POST",  
                    data  : {
                        current_sem: sem 
                    }, 
                    dataType: "json",
                    success: function(data){  
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            }).then((result) => { 
                                window.location.reload();
                            })
                        }
                    }
                }); 
                
            })        
        });


    </script>

<?= $this->endSection() ?>
