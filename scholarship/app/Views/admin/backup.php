<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?><?= $page_title; ?><?= $this->endSection() ?>


<?= $this->section('main') ?>
    <div class="row">  
        <div class="col-12">
            <div class="card"> 
                <div class="card-header bg-white">
                    <div class=" float-end"> 
                        <button type="button" id="database-backup-btn" class="btn btn-success" >  <i class="mdi mdi-database"></i> Back Up</button>
                    </div>
                    <h4 class="header-title"><?= $page_title; ?></h4>  
                </div> 
                <div class="card-body">
                    <table id="file-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr> 
                                <th>Name</th> 
                                <th>Size</th>  
                                <th>Date Modified</th>  
                            </tr>
                        </thead> 
                    </table> 
                </div>
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> 

<?= $this->endSection() ?>
<i class="mdi mdi-folder-zip-outline"></i>

<?= $this->section('pageScript') ?>

    <script> 
        
        $(document).ready(function() { 


            
            var table = $('#file-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                ajax       : {
                    url: 'backup/files', 
                }, 
                columns: [  
                    {
                        data  : 'name',
                        render: function(data, type, row, meta){   
                            return '<u><a class="dowload-file" href="backup/download/'+row.name+'" >'+ row.name+'</a><u>'; 
                        }
                    }, 
                    { data: 'size' },  
                    { data: 'date' },  
                ],
                order: [[2, 'desc']] , 
            });  
            
            $(document).on('click', '#database-backup-btn', function(e){ 
                e.preventDefault();    
                var _this = $(this)
                $.ajax({
                    url     : 'backup/backup',
                    method  : "get",  
                    dataType: "json",  
                    beforeSend: function(xhr) {
                        Swal.fire({
                            title: '<img src="<?php echo base_url('/public/img/logo-sm.png') ?>" style="max-width:50px; max-height:50px" />', 
                            text: 'Please wait...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            onOpen: function() {
                                swal.showLoading();
                            }
                        });
                    },  
                    success : function (data) {
                        if(data.response){ 
                            Swal.fire({
                                title: "Good job!",
                                text : data.message,
                                icon : "success"
                            }) 
                        }else{  
                            Swal.fire({
                                title: "backup Error!",
                                text : data.message,
                                icon : "error"
                            }) 
                        }
                        
                        table.ajax.reload()
                    },
                    error   : function (xhr, status, error) { 
                        console.info(xhr.responseText);
                    }
                }); 

            }); 
        });
    </script>

<?= $this->endSection() ?>
