<?= $this->extend('layout/layout') ?> 
<?=   1?> 


<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


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


        });
    </script>

<?= $this->endSection() ?>
