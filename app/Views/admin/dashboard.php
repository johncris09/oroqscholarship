<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('pageStyle') ?>
    <style> 
        .college-school-chart{
            width: 1000px   !important;
        } 
    </style>

<?= $this->endSection() ?> 
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
                                <h2 id="shs_total" class="text-white mt-2"><?= $tot_approved_shs; ?> </h2>
                                <p class="text-white   text-truncate">Senio High School</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-4 col-xl-4">
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
                                <h2  id="college_total"  class="text-white mt-2"><?= $tot_approved_college; ?></h2>
                                <p class="text-white   text-truncate">College</p>
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
                                <h2  id="tvet_total"  class="text-white mt-2"><?= $tot_approved_tvet; ?></h2>
                                <p class="text-white   text-truncate">TVET</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>   
    </div> <!-- end col-->

    
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-status"> 
                <div class="card-header bg-white">  
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpasebystatus" role="button" aria-expanded="false" aria-controls="cardCollpasebystatus"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    <h4 class="header-title  ">Scholarship Status Chart</h4>
                </div>
                <div class="card-body">   
                    <div id="cardCollpasebystatus" class="collapse show" dir="ltr">
                        <div id="scholarship-status-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                    </div>  
                </div> 
            </div> 
        </div> 
    </div>
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-white">  
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpasebygender" role="button" aria-expanded="false" aria-controls="cardCollpasebygender"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    <h4 class="header-title  ">Scholarship by Gender Chart</h4>
                </div>
                
                <div class="row">
                    <div class="col-md-4 col-xl-4">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  ">Senior High School</h4>
                        </div>
                        <div class="card-body">   
                            <div id="cardCollpasebygender" class="collapse show" dir="ltr">
                                <div id="shs-gender-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                            </div>  
                        </div> 
                    </div>
                    
                    <div class="col-md-4 col-xl-4">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  ">College</h4>
                        </div>
                        <div class="card-body">   
                            <div id="cardCollpasebygender" class="collapse show" dir="ltr">
                                <div id="college-gender-chart"  class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                            </div>  
                        </div> 
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  ">TVET</h4>
                        </div>
                        <div class="card-body">   
                            <div id="cardCollpasebygender" class="collapse show" dir="ltr">
                                <div id="tvet-gender-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                            </div>  
                        </div> 
                    </div>
                </div>
                
            </div> 
        </div> 
        
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-white">  
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpasebybarangay" role="button" aria-expanded="false" aria-controls="cardCollpasebybarangay"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    <h4 class="header-title  ">Scholarship by Barangay Chart</h4>
                </div>
                <div class="card-body">  
                    <div id="cardCollpasebybarangay" class="collapse show" dir="ltr">
                        <div id="scholarship-barangay-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                    </div>  
                </div> 
            </div> 
        </div> 
    </div>  

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-white">  
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpasebyschool" role="button" aria-expanded="false" aria-controls="cardCollpasebyschool"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    <h4 class="header-title  ">Scholarship by School Chart</h4>
                </div>
                
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  ">Senior High School</h4>
                        </div>
                        <div class="card-body">   
                            <div id="cardCollpasebyschool" class="collapse show" dir="ltr">
                                <div id="shs-school-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                            </div>  
                        </div> 
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  ">TVET</h4>
                        </div>
                        <div class="card-body">   
                            <div id="cardCollpasebyschool" class="collapse show" dir="ltr">
                                <div id="tvet-school-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                            </div>  
                        </div> 
                    </div>
                    
                    <div class="col-md-12 col-xl-12">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  ">College</h4>
                        </div>
                        <div class="card-body">   
                            <div id="cardCollpasebyschool" class="collapse show" dir="ltr">
                                <div id="college-school-chart"  class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
                            </div>  
                        </div> 
                    </div>
                </div>
                
            </div> 
        </div> 
        
    </div>

 
<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>
    <script> 
        $(document).ready(function(){  
            // Form Submit
            $(document).on('submit', '#filter-form', function(e){  
                e.preventDefault();   
                
                var formData = new FormData($("#filter-form")[0]);
                
                $.ajax({
                    url:  '/filter',
                    method: "post", 
                    data: $("#filter-form").serialize(),
                    dataType: "json", 
                    success: function (data) {   
                        $('#shs_total').html(data.shs_total)
                        $('#college_total').html(data.college_total)
                        $('#tvet_total').html(data.tvet_total) 
                    },
                    error: function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                });   
            });  

            
            
            $.ajax({
                url: 'scholarship_shs_gender',
                method: "get",
                dataType: "json",   
                success: function(data) { 
                    var options = {
                        colors: ['#F96666', '#FD841F'],
                        series: data.total,
                        chart: {
                            width: 380,
                            type: 'donut',
                        },
                        plotOptions: {
                            pie: {
                                startAngle: -90,
                                endAngle: 270
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            type: 'gradient',
                        },
                        labels: ['MALE', 'FEMALE' ],
                        legend: {
                            formatter: function(val, opts) {
                                return val + " - " + opts.w.globals.series[opts.seriesIndex]
                            }
                        }, 
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                    var chart = new ApexCharts(document.querySelector("#shs-gender-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });



            $.ajax({
                url: 'scholarship_college_gender',
                method: "get",
                dataType: "json", 
                success: function(data) {  
                    var options = {
                        colors: ['#ECC5FB', '#47B5FF'],
                        series: data.total,
                        chart: {
                            width: 380,
                            type: 'donut',
                        },
                        plotOptions: {
                            pie: {
                                startAngle: -90,
                                endAngle: 270
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            type: 'gradient',
                        },
                        labels: ['MALE', 'FEMALE' ],
                        legend: {
                            formatter: function(val, opts) {
                                return val + " - " + opts.w.globals.series[opts.seriesIndex]
                            }
                        }, 
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                    var chart = new ApexCharts(document.querySelector("#college-gender-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });



            $.ajax({
                url: 'scholarship_tvet_gender',
                method: "get",
                dataType: "json",
                success: function(data) {  
                    var options = {
                        colors: ['#A62349', '#EE6983'],
                        series: data.total,
                        chart: {
                            width: 380,
                            type: 'donut',
                        },
                        plotOptions: {
                            pie: {
                                startAngle: -90,
                                endAngle: 270
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            type: 'gradient',
                        },
                        labels: ['MALE', 'FEMALE' ],
                        legend: {
                            formatter: function(val, opts) {
                                return val + " - " + opts.w.globals.series[opts.seriesIndex]
                            }
                        }, 
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    };
                    var chart = new ApexCharts(document.querySelector("#tvet-gender-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            }); 

            $.ajax({
                url: 'scholarship_barangay',
                method: "get",
                dataType: "json",
                success: function(data) {
                    var options = {
                        colors: ['#F76E11', '#FF99D7', '#3B3486'],
                        series: [{
                            name: 'Senior High School',
                            data: data.shs
                        }, {
                            name: 'College',
                            data: data.college
                        }, {
                            name: 'TVET',
                            data: data.tvet
                        }],
                        chart: {
                            type: 'bar',
                            height: 1500
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '50%',
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 15,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: data.barangay,
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
                    var chart = new ApexCharts(document.querySelector("#scholarship-barangay-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });
            $.ajax({
                url: 'scholarship_status',
                method: "get",
                dataType: "json",   
                success: function(data) { 
                    var options = {
                        colors: ['#3AB0FF', '#432C7A', '#F94892', '#FFE15D'],
                        series: [{
                            name: 'Approved',
                            data: data.Approved
                        }, {
                            name: 'Additional Approved',
                            data: data.Additional_approved
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
                    var chart = new ApexCharts(document.querySelector("#scholarship-status-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });
            $.ajax({
                url: 'get_by_shs_school',
                method: "get",
                dataType: "json",
                success: function(data) {
                    var options = { 
                        series: [{
                            data: data.total
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: data.school,
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "#" + val
                                }
                            }
                        }
                    };
                    var chart = new ApexCharts(document.querySelector("#shs-school-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });
            $.ajax({
                url: 'get_by_college_school',
                method: "get",
                dataType: "json",
                success: function(data) {
                    var options = {
                        series: [{
                            data: data.total
                        }],
                        chart: {
                            type: 'bar',
                            height: 10000
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: data.school,
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "#" + val
                                }
                            }
                        }
                    };
                    var chart = new ApexCharts(document.querySelector("#college-school-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });
            $.ajax({
                url: 'get_by_tvet_school',
                method: "get",
                dataType: "json",
                success: function(data) {
                    var options = {
                        series: [{
                            data: data.total
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: data.school,
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "#" + val
                                }
                            }
                        }
                    };
                    var chart = new ApexCharts(document.querySelector("#tvet-school-chart"), options);
                    chart.render();
                },
                error: function(xhr, status, error) {
                    console.info(xhr.responseText);
                }
            });
        });
    </script>

<?= $this->endSection() ?>  