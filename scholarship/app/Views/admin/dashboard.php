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
                                <p class="text-white   text-truncate">Senior High School</p>
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
            <div class="card card-status"> 
                <div class="card-header bg-white">  
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpasebystatus" role="button" aria-expanded="false" aria-controls="cardCollpasebystatus"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    <h4 class="header-title  ">Scholarship Total Status Chart</h4>
                </div>
                <div class="card-body">   
                    <div id="cardCollpasebystatus" class="collapse show" dir="ltr"> 
                        <div id="scholarship-total-status-chart" class="apex-charts"  ></div>
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
                
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card-header bg-white">   
                            <h4 class="header-title  text-center">Total Gender</h4>
                        </div>
                        <div class="card-body">    
                            <div id="cardCollpasebygender" class="collapse show" dir="ltr">
                                <div id="total-gender-chart" class="apex-charts" data-colors="#348cd4,#f06292,#ced4da"></div>
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

             
            $('#view-all').on('change', function(){
                var that = this
                if($(this).is(':checked')){ 
                    // that.checked = false;   \
                    window.location.href="?view=all"
                }else{
                    window.location.href= "<?php  echo base_url('/') ?>"
                }
            })

            //=============================================================================
            //  Filter by School Year, Semester
            //============================================================================= 

            $(document).on('submit', '#filter-form', function(e){  
                e.preventDefault();   
                
                var formData = new FormData($("#filter-form")[0]);
                
                $.ajax({
                    url       : '/filter',
                    method    : "post", 
                    data      : $("#filter-form").serialize(),
                    dataType  : "json", 
                    beforeSend: function () { 
                        console.info('loading')
                    },
                    complete  : function () {
                        console.info('') 
                    },
                    success   : function (data) {   
                        $('#shs_total').html(data.shs_total)
                        $('#college_total').html(data.college_total)
                        $('#tvet_total').html(data.tvet_total) 
                    },
                    error     : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                });   
            });  



            //=============================================================================
            //  Scholarship by Gender Chart
            //============================================================================= 
            
            var shs_gender = {
                colors: ['#F96666', '#FD841F'],
                series: [ 
                    <?php echo isset($shs_gender[0]->total) ? $shs_gender[0]->total : 0; ?>, 
                    <?php echo isset($shs_gender[1]->total) ? $shs_gender[1]->total : 0; ?>,  
                ],
                chart: {
                    width: 380,
                    type : 'donut',
                },
                plotOptions: {
                    pie: {
                        startAngle: -90,
                        endAngle  : 270
                    }
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'gradient',
                },
                labels: [
                    '<?php echo isset($shs_gender[0]->gender)  ?  strtoupper($shs_gender[0]->gender) :  "MALE"; ?>', 
                    '<?php echo isset($shs_gender[1]->gender)  ?  strtoupper($shs_gender[1]->gender) :  "FEMALE"; ?>',  
                ],
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
            var chart      = new ApexCharts(document.querySelector("#shs-gender-chart"), shs_gender);
            chart.render(); 



            var college_gender = {
                colors: ['#ECC5FB', '#47B5FF'],
                series: [ 
                    <?php echo isset($college_gender[0]->total) ? $college_gender[0]->total : 0; ?>, 
                    <?php echo isset($college_gender[1]->total) ? $college_gender[1]->total : 0; ?>,  
                ],
                chart: {
                    width: 380,
                    type : 'donut',
                },
                plotOptions: {
                    pie: {
                        startAngle: -90,
                        endAngle  : 270
                    }
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'gradient',
                },
                labels: [
                    '<?php echo isset($college_gender[0]->gender)  ?  strtoupper($college_gender[0]->gender) :  "MALE"; ?>',  
                    '<?php echo isset($college_gender[1]->gender)  ?  strtoupper($college_gender[1]->gender) :  "FEMALE"; ?>',  
                ],
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
            var chart = new ApexCharts(document.querySelector("#college-gender-chart"), college_gender);
            chart.render();  



            var tvet_gender = {
                colors: ['#A62349', '#EE6983'],
                series: [ 
                    <?php echo isset($tvet_gender[0]->total) ? $tvet_gender[0]->total : 0; ?>, 
                    <?php echo isset($tvet_gender[1]->total) ? $tvet_gender[1]->total : 0; ?>,  
                ],
                chart: {
                    width: 380,
                    type : 'donut',
                },
                plotOptions: {
                    pie: {
                        startAngle: -90,
                        endAngle  : 270
                    }
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'gradient',
                },
                labels: [
                    '<?php echo isset($tvet_gender[0]->gender)  ?  strtoupper($tvet_gender[0]->gender) :  "FEMALE"; ?>',   
                    '<?php echo isset($tvet_gender[1]->gender)  ?  strtoupper($tvet_gender[1]->gender) :  "MALE"; ?>', 
                ],
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
            var chart = new ApexCharts(document.querySelector("#tvet-gender-chart"), tvet_gender);
            chart.render();  

 

            //=============================================================================
            //  Scholarship by Total Gender Chart
            //============================================================================= 
            
            var total_gender = {
                colors: ['#645CBB', '#CD5888'],
                series: [ 
                    <?php echo isset($total_gender[0]->total) ? $total_gender[0]->total : 0; ?>, 
                    <?php echo isset($total_gender[1]->total) ? $total_gender[1]->total : 0; ?>,  
                ],
                chart: {
                    width: 380,
                    type: 'donut',
                },
                plotOptions: {
                    pie: {
                        startAngle: -90,
                        endAngle  : 270
                    }
                },
                dataLabels: {
                    enabled: false
                },
                fill: {
                    type: 'gradient',
                },
                labels: [
                    '<?php echo isset($total_gender[0]->gender)  ?  strtoupper($total_gender[0]->gender) :  "MALE"; ?>', 
                    '<?php echo isset($total_gender[1]->gender)  ?  strtoupper($total_gender[1]->gender) :  "FEMALE"; ?>',  
                ],
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
            var chart = new ApexCharts(document.querySelector("#total-gender-chart"), total_gender);
            chart.render(); 



            //=============================================================================
            //  Scholarship Status Chart
            //============================================================================= 
            
            var scholarship_status = {
                colors: ['#3AB0FF', '#432C7A',   '#FFE15D'],
                series: [
                    {
                        name: 'Approved',
                        data: <?php echo isset($scholarship_status['approved']) ?  json_encode( $scholarship_status['approved']):  json_encode([0]); ?>
                    },  
                    {
                        name: 'Disapproved',
                        data: <?php echo isset($scholarship_status['disapproved']) ?  json_encode( $scholarship_status['disapproved']):  json_encode([0]); ?>  
                    }, {
                        name: 'Pending',
                        data: <?php echo isset($scholarship_status['pending']) ? json_encode( $scholarship_status['pending']):  json_encode([0]); ?>   
                    }
                ],
                chart: {
                    type  : 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal : false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show  : true,
                    width : 10,
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
            var chart = new ApexCharts(document.querySelector("#scholarship-status-chart"), scholarship_status);
            chart.render();


            
            //=============================================================================
            //  Total Scholarship Status Chart
            //============================================================================= 
            
            var total_scholarship_status = { 
                series: [
                    { 
                        data             : [ 
                            { 
                                x        : 'Approved',
                                y        : <?php echo isset($total_scholarship_status[0]['total']) ?  $total_scholarship_status[0]['total']: 0; ?>,
                                fillColor: '#3AB0FF', 
                            },
                            { 
                                x        : 'Pending',
                                y        : <?php echo isset($total_scholarship_status[2]['total']) ?  $total_scholarship_status[2]['total']: 0; ?>,
                                fillColor: '#FFE15D', 
                            },
                            { 
                                x        : 'Disapproved',
                                y        : <?php echo isset($total_scholarship_status[1]['total']) ?  $total_scholarship_status[1]['total']: 0; ?>,
                                fillColor: '#432C7A', 
                            }, 
                        ]
                    },  
                ],
                chart: {
                    type  : 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal : false,
                        columnWidth: '55%',
                        endingShape: 'rounded', 
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show  : true,
                    width : 10,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [ 'Approved', 'Pending',  'Disapproved', ],
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
            var chart = new ApexCharts(document.querySelector("#scholarship-total-status-chart"), total_scholarship_status);
            chart.render();




            //=============================================================================
            //  Scholarship by Barangay Chart
            //============================================================================= 

            var scholarship_barangay = {
                colors: ['#F76E11', '#FF99D7', '#3B3486'],
                series: [{
                    name: 'Senior High School',
                    data: <?php echo json_encode($scholarship_barangay['shs']); ?>
                }, {
                    name: 'College',
                    data: <?php echo json_encode($scholarship_barangay['college']); ?>
                }, {
                    name: 'TVET',
                    data: <?php echo json_encode($scholarship_barangay['tvet']); ?>
                }],
                chart: {
                    type  : 'bar',
                    height: 1500
                },
                plotOptions: {
                    bar: {
                        horizontal : false,
                        columnWidth: '50%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show  : true,
                    width : 15,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: <?php echo json_encode($scholarship_barangay['barangay']); ?>,
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
            var chart = new ApexCharts(document.querySelector("#scholarship-barangay-chart"), scholarship_barangay);
            chart.render();
            
 
            //=============================================================================
            //  Scholarship by School Chart
            //=============================================================================  
            var shs_school = { 
                colors: '#F76E11',
                series: [{ 
                    data: <?php echo isset($shs_school['total']) ? json_encode($shs_school['total']) :  0; ?>
                }],
                chart: {
                    type  : 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal  : true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories:<?php echo isset($shs_school['school']) ?  json_encode($shs_school['school']) : ""  ; ?>
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "#" + val
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#shs-school-chart"), shs_school);
            chart.render();

            
 
            var college_school = { 
                colors: '#FF99D7',
                series: [{ 
                    data: <?php echo isset($college_school['total']) ? json_encode($college_school['total']) : 0; ?> 
                }],
                chart: {
                    type  : 'bar',
                    height: 1000
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal  : true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories:<?php echo isset($college_school['school']) ?  json_encode($college_school['school']) :  "c"; ?> 
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "#" + val
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#college-school-chart"), college_school);
            chart.render();
 
            
            var tvet_school = { 
                colors: '#3B3486',
                series: [{  
                    data: <?php echo isset($tvet_school['total']) ? json_encode($tvet_school['total']) :  0; ?> 
                }],
                chart: {
                    type  : 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal  : true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: { 
                    categories:<?php echo isset($tvet_school['school']) ?  json_encode($tvet_school['school']) : "category"  ; ?> 
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return "#" + val
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#tvet-school-chart"), tvet_school);
            chart.render();

               
        });
    </script>

<?= $this->endSection() ?>  