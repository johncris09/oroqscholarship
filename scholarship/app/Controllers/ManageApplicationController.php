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
use App\Models\TvetCourseModel;
use App\Models\TvetModel;
use Config\Custom_config;

class ManageApplicationController extends BaseController
{

    public function __construct()
    {
        $db                = db_connect();
        $this->senior_high = new SeniorHighModel($db);
        $this->college     = new CollegeModel($db);
        $this->tvet        = new TvetModel($db);
        $this->uri         = service('uri');
    }
    public function index()
    {
        $data["page_title"] = "Manage Application";
        return view('admin/manage_application', $data);
    } 

    
    public function get_application()
    { 

        $strand                 = new StrandModel(); 
        $course                 = new CourseModel();
        $tvet_course            = new TvetCourseModel();
        $address                = new AddressModel();
        $college_school         = new CollegeSchoolModel();
        $config                 = new Custom_config; 
        $school                 = new SchoolModel(); 
        $segment                = $this->uri->getSegments(); 
        $data["page_title"]     = "Manage Application";
        $data['year_started']   = $config->year_started;
        $data['course']         = $course->asArray()->findAll();
        $data['tvet_course']    = $tvet_course->asArray()->findAll();
        $data['year_level']     = $config->yearLevel;
        $data['scholar_status'] = $config->scholar_status;
        $data['type']           = $segment[2];
        $data['semester']       = $config->semester;
        $data['civil_status']   = $config->civilStatus;
        $data['required_field'] = $config->requiredField;  
        $id                     = $segment[3]; 
        $data['college_school'] = $college_school->asArray()->findAll();
        $data['address']        = $address->asArray()->findAll();
        $data['school']         = $school->asArray()->findAll();
        $data['strand']         = $strand->asArray()->findAll();
        $data['grade_level']    = $config->gradeLevel;

        try {
            if ($segment[2] == "shs") { 
                $data['profile'] = $this->senior_high->get_applicant_details($id);
                return view('admin/update_application', $data);
            } else if ($segment[2] == "college") {
                $data['profile']  = $this->college->get_applicant_details($id); 
                return view('admin/update_application', $data);
            } else if ($segment[2] == "tvet") {
                $data['profile'] = $this->tvet->get_applicant_details($id); 
                return view('admin/update_application', $data);
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
 
    }

}
