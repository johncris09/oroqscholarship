<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StrandModel;

class StrandController extends BaseController
{
    
    public function index()
    {     
        $data["page_title"] = "Strand";
        return view('admin/strand', $data); 
    }

    public function add()
    { 
        return view('admin/school');
    }

    public function get_all()
    { 
        $strand = new StrandModel();   
        $data['data'] = $strand->findAll();
        echo Json_encode($data);
        
    }
}
