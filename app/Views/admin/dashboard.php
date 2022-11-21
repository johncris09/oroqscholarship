<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>

    <div class="row">
        <div class="col-md-4 col-xl-4">
            <div class="widget-rounded-circle card bg-purple shadow-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-light">
                                <i class="mdi mdi-school-outline font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h2 class="text-white mt-2"><?= $tot_approved_shs; ?></h2>
                                <p class="text-white mb-0 text-truncate">Senio High</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-4 col-xl-3">
            <div class="widget-rounded-circle card bg-info shadow-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-light">
                                <i class="mdi mdi-school font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h2 class="text-white mt-2"><?= $tot_approved_college; ?></h2>
                                <p class="text-white mb-0 text-truncate">College</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-4 col-xl-4">
            <div class="widget-rounded-circle card bg-pink shadow-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-light">
                                <i class="fe-shuffle font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h2 class="text-white mt-2"><?= $tot_approved_tvet; ?></h2>
                                <p class="text-white mb-0 text-truncate">TVET</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>   
        </div> <!-- end col-->
    </div>
<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() {

        });
    </script>

<?= $this->endSection() ?>
