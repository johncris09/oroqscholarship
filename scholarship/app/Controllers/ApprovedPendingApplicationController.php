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

class ApprovedPendingApplicationController extends BaseController
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
        $data["page_title"] = "Pending Application";
        return view('admin/pending_application', $data);
    }


    public function get_application()
    { 

        $segment                = $this->uri->getSegments();
        $id                     = $segment[3];  
        $data["page_title"]     = "Pending Application";
        $data['type']           = $segment[2];
        $config                 = new Custom_config; 
        $data['civil_status']   = $config->civilStatus;
        $data['required_field'] = $config->requiredField; 
        $segment                = $this->uri->getSegments();
        $id                     = $segment[3]; 
        try {
            if ($segment[2] == "shs") { 
                $data['profile'] = $this->senior_high->get_applicant_details($id);
                return view('admin/view_pending_application', $data);
            } else if ($segment[2] == "college") {
                $data['profile']  = $this->college->get_applicant_details($id); 
                return view('admin/view_pending_application', $data);
            } else if ($segment[2] == "tvet") {
                $data['profile'] = $this->tvet->get_applicant_details($id);  
                // print_r($data['profile']);
                return view('admin/view_pending_application', $data);
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
 
    }
}
