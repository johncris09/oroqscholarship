<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeSchoolModel;
use App\Models\CourseModel;
use App\Models\SchoolModel;
use App\Models\SeniorHighSchoolRegistrationModel;
use App\Models\SequenceModel;
use App\Models\StrandModel;
use Config\Custom_config;

class ScholarRegistrationController extends BaseController
{
    
    public function index()
    {     
        $data["page_title"] = "Scholar Registration";
        $config = new Custom_config;
        $school = new SchoolModel();
        $course = new CourseModel();
        $college_school = new CollegeSchoolModel();
        $strand = new StrandModel();
        $sequence = new SequenceModel();
        $senior_high_registration = new SeniorHighSchoolRegistrationModel();
        $data['barangay'] = $config->barangay; 
        $data['semester'] = $config->semester; 
        $data['civil_status'] = $config->civilStatus; 
        $data['required_field'] = $config->requiredField;  
        $data['grade_level'] = $config->gradeLevel;
        $data['school'] = $school->asArray()->findAll();
        $data['strand'] = $strand->asArray()->findAll();
        $data['course'] = $course->asArray()->findAll();
        $data['college_school'] = $college_school->asArray()->findAll();
        $data['year_level'] = $config->yearLevel;
        $data['sequence_year'] =  $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_year'];
        $data['seq_sem'] =  $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_sem'];
        $data['app_no_id'] = count($senior_high_registration->asArray()->findAll()) + 1; 
        return view('admin/scholar_registration', $data); 
    }


    
    
} 