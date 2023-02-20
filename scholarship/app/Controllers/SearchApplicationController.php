<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SearchApplicationModel;

class SearchApplicationController extends BaseController
{

    public function __construct()
    {
        $db                 = db_connect();
        $this->search_model = new SearchApplicationModel($db); 
    }

    
    public function index()
    { 
        $search = '';
        if(isset($_GET['search'])){ 
            $search =  trim($_GET['search']);
        }
        $data['result']     = $this->search_model->search($search); 
        $data['for']        = $search;  
        $data["page_title"] = "Search Result"; 
        return view('admin/search_result', $data);
    }


 
}
