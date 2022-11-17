<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SchoolModel;
use App\Models\StrandModel;
use Config\Custom_config;

class ScholarRegistrationController extends BaseController
{
    
    public function index()
    {     
        $data["page_title"] = "Scholar Registration";
        $config = new Custom_config;
        $school = new SchoolModel();
        $strand = new StrandModel();
        $data['barangay'] = $config->barangay; 
        $data['semester'] = $config->semester; 
        $data['civil_status'] = $config->civilStatus; 
        $data['grade_level'] = $config->gradeLevel;
        $data['school'] = $school->asArray()->findAll();
        $data['strand'] = $strand->asArray()->findAll();
        return view('admin/scholar_registration', $data); 
    } 
} 