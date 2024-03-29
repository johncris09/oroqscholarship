<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeModel;
use App\Models\CollegeSchoolModel;
use App\Models\CourseModel;
use App\Models\SchoolModel;
use App\Models\SeniorHighModel; 
use App\Models\StrandModel;
use App\Models\TvetModel;
use Config\Custom_config;

#[\AllowDynamicProperties]
class ViewApplicationController extends BaseController
{
    public function __construct()
    {
        $db = db_connect();
        $this->senior_high = new SeniorHighModel($db);
        $this->college     = new CollegeModel($db);
        $this->tvet        = new TvetModel($db);
        $this->uri         = service('uri');
    }

    public function get_shs_application($id)
    {
        $data["page_title"]     = "Manage Application";
        $config                 = new Custom_config;
        $school                 = new SchoolModel();
        $course                 = new CourseModel();
        $college_school         = new CollegeSchoolModel();
        $strand                 = new StrandModel(); 
        $data['barangay']       = $config->barangay;
        $data['semester']       = $config->semester;
        $data['civil_status']   = $config->civilStatus;
        $data['required_field'] = $config->requiredField;
        $data['grade_level']    = $config->gradeLevel;
        $data['school']         = $school->asArray()->findAll();
        $data['strand']         = $strand->asArray()->findAll();
        $data['course']         = $course->asArray()->findAll();
        $data['college_school'] = $college_school->asArray()->findAll();
        $data['year_level']     = $config->yearLevel; 
        $data['app_no_id']      = $this->senior_high->count() + 1;
        return view('admin/view_application', $data);
    }

    public function get_application()
    {
        $segment                = $this->uri->getSegments();
        $type                   = ["shs", "college", "tvet"];
        $id                     = $segment[3]; 
        $data["page_title"]     = "View Application";
        $data['type']           = $segment[2];
        $config                 = new Custom_config;
        $school                 = new SchoolModel();
        $course                 = new CourseModel();
        $college_school         = new CollegeSchoolModel();
        $strand                 = new StrandModel(); 
        $data['barangay']       = $config->barangay;
        $data['semester']       = $config->semester;
        $data['civil_status']   = $config->civilStatus;
        $data['required_field'] = $config->requiredField;
        $data['grade_level']    = $config->gradeLevel;
        $data['school']         = $school->asArray()->findAll();
        $data['strand']         = $strand->asArray()->findAll();
        $data['course']         = $course->asArray()->findAll();
        $data['college_school'] = $college_school->asArray()->findAll();
        $data['year_level']     = $config->yearLevel; 
        $data['app_no_id']      = $this->senior_high->count() + 1;


        try {
            if ($segment[2] == "shs") {
                $data['profile'] = $this->senior_high->get_applicant_details($id);
            } else if ($segment[2] == "college") {
                $data['profile']  = $this->college->get_applicant_details($id);
            } else if ($segment[2] == "tvet") {
                $data['profile'] = $this->tvet->get_applicant_details($id);
            } else {
                return redirect()->back();
            }

            return view('admin/view_application', $data);
        } catch (\Exception $e) { 
            // print_r($e->getMessage());
            echo "No Record Found!";
        }


        // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function shs_app_no_id()
    {
        $app_no_id =  $this->senior_high_registration->count() + 1;
        echo Json_encode($app_no_id);
    }
}
