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


    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-white">  
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    <h4 class="header-title mb-0">Scholarship Status Chart</h4>
                </div>
                <div class="card-body">  
                    <div id="cardCollpase5" class="collapse pt-3 show" dir="ltr">
                        <div id="chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                    </div>  
                </div> 
            </div> 
        </div> 
    </div>
 
<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>

    <script>
        $(document).ready(function() { 


            $.ajax({
                url:  'scholarship_status',
                method: "get",  
                dataType: "json", 
                success: function (data) { 
                    console.info(data)  
                    var options = {   
                        colors:['#3AB0FF', '#F94892', '#FFE15D'], 
                        series: [{
                            name: 'Approved',
                            data: data.Approved
                        }, {
                            name: 'Disapproved',
                            data: data.Disapproved
                        }, {
                            name: 'Pending',
                            data: data.Pending
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '55%',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 10,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: ['Senior High School', 'College', 'TVET'],
                        },
                        yaxis: {
                            title: {
                                text: '# '
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "#" + val
                                }
                            }
                        }
                    };
                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                },
                error: function (xhr, status, error) { 
                    console.info(xhr.responseText);
                }
            });  

        });
    </script>

<?= $this->endSection() ?>
