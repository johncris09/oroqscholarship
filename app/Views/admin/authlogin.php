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
                    <table id="authlogin-table" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr> 
                                <th>IP Address</th>
                                <th>User Agennt</th> 
                                <th>Id Type</th> 
                                <th>Identifier</th>
                                <th>User id</th>
                                <th>Date</th>
                                <th>Success</th>
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
            var table = $('#authlogin-table').DataTable({
                "scrollY": 450,
                "scrollX": true, 
                deferRender: true, 
                ajax: {
                    url: 'authlogin/get_all',  
                },
                columns: [  
                    { data: 'ip_address' },   
                    { data: 'user_agent' },   
                    { data: 'id_type' },   
                    { data: 'identifier' },  
                    { data: 'user_id' },     
                    {
                        data  : 'date',
                        render: function(data, type, row, meta){ 
                            return moment(data.date).format('MMM. D, YYYY H:mm:ss a');
                            
                        }
                    }, 
                    { data: 'success' },
                ],  
            });  
 
             
        });
    </script>
 
 

<?= $this->endSection() ?>

