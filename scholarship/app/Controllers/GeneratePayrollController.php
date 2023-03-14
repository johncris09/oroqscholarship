<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\AddressModel;
use App\Models\CollegeModel;
use App\Models\CollegeSchoolModel;
use App\Models\CourseModel;
use App\Models\SchoolModel;
use App\Models\SeniorHighModel;
use App\Models\SequenceModel;
use App\Models\StrandModel;
use App\Models\TvetModel;
use Config\Custom_config;  

class GeneratePayrollController extends BaseController
{
    public function __construct() {
        $db                             = db_connect();
        $this->senior_high_registration = new SeniorHighModel($db);
        $this->college_registration     = new CollegeModel($db);
        $this->tvet_registration        = new TvetModel($db);
    }


    public function index()
    {      
        $data["page_title"]     = "Generate Payroll";
        $config                 = new Custom_config;
        $school                 = new SchoolModel();
        $course                 = new CourseModel();
        $college_school         = new CollegeSchoolModel();
        $strand                 = new StrandModel();
        $sequence               = new SequenceModel(); 
        $address = new AddressModel();
        $data['address']        = $address->asArray()->findAll();
        $data['year_started']   = $config->year_started;  
        $data['barangay']       = $config->barangay; 
        $data['semester']       = $config->semester; 
        $data['civil_status']   = $config->civilStatus; 
        $data['scholar_status'] = $config->scholar_status;  
        $data['required_field'] = $config->requiredField;  
        $data['grade_level']    = $config->gradeLevel;
        $data['school']         = $school->asArray()->orderBy('school_name', 'ASC')->findAll();
        $data['strand']         = $strand->asArray()->orderBy('strand', 'ASC')->findAll();
        $data['course']         = $course->asArray()->orderBy('course', 'ASC')->findAll();
        $data['college_school'] = $college_school->asArray()->orderBy('school_name', 'ASC')->findAll();
        $data['year_level']     = $config->yearLevel;
        $data['sequence_year']  = $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_year'];
        $data['seq_sem']        = $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_sem'];
        $data['app_no_id']      = $this->senior_high_registration->count() + 1; 
        return view('admin/generate_payroll', $data);  
    }

}
