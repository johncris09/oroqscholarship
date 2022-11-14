<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SchoolModel;
use PHPUnit\Util\Json;

class SchoolController extends BaseController
{
    

    public function index()
    {     
        $data["page_title"] = "School";
        return view('admin/school', $data); 
    }
    public function add()
    {   
        return view('admin/school'); 
    }

    
    public function get_all()
    { 
        $school = new SchoolModel();   
        $data['data'] = $school->findAll();
        echo Json_encode($data);
        
    }
}
