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
                    <table id="log-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Description</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                    </table> 
                    
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
 


<?= $this->endSection() ?>


<?= $this->section('pageScript') ?>
 

<script>
        $(document).ready(function() {  

            var table = $('#log-table').DataTable({
                "scrollY"  : 450,
                "scrollX"  : true, 
                deferRender: true, 
                "order": [[ 0, "desc" ]],
                ajax       : {
                    url: 'logs/get_all',   
                },
                columns: [  
                    { data    : 'id' },  
                    { data    : 'user_id' },
                    { data    : 'description' }, 
                    {
                        data  : 'id',
                        render: function(data, type, row, meta){  
                            var date = moment( row.created_at);
                            var formattedDate = date.format('MMMM D, Y hh:mm:ss a'); 
                            return formattedDate;
                        }
                    }, 

                ],
                columnDefs: [
                    { "targets": 0, "visible": false } // Hide the first column
                ]
            }); 


             


        });
    </script>
<?= $this->endSection() ?>
