<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeModel;
use App\Models\SearchApplicationModel;
use App\Models\SeniorHighModel;
use App\Models\TvetModel;

class SearchApplicationController extends BaseController
{

    public function __construct()
    {
        $db                 = db_connect();
        $this->search_model = new SearchApplicationModel($db); 
        $this->senior_high = new SeniorHighModel($db); 
        $this->college = new CollegeModel($db); 
        $this->tvet = new TvetModel($db);
    }

    
    public function index()
    { 
        $search = '';
        if(isset($_GET['search'])){ 
            $search =  trim($_GET['search']);
        }

        
        if(in_array( strtolower(auth()->user()->groups[0]), ["superadmin", "admin", "user"])){ 
            if(auth()->user()->scholarship_type == "shs"){ 
                $data['result']     = $this->senior_high->search_name($search);   
            }else if(auth()->user()->scholarship_type == "college"){ 
                $data['result']     = $this->college->search_name($search);  
            }else if(auth()->user()->scholarship_type == "tvet"){ 
                $data['result']     = $this->tvet->search_name($search);
            }else { 
                $data['result']     = $this->search_model->search_name($search);  
            }
        }   
        $data['for']        = $search;  
        $data["page_title"] = "Search Result";  
        return view('admin/search_result', $data);
    }


 
}
