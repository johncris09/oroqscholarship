<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ScholarRegistrationController extends BaseController
{
    
    public function index()
    {     
        $data["page_title"] = "Scholar Registration";
        return view('admin/scholar_registration', $data); 
    } 
}
