<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;
use App\Models\CollegeModel;
use App\Models\CollegeSchoolModel;
use App\Models\ConfigModel;
use App\Models\CourseModel;
use App\Models\SchoolModel;
use App\Models\SeniorHighModel;
use App\Models\SequenceModel;
use App\Models\StrandModel;
use App\Models\TvetModel;
use Config\Custom_config;
use App\Models\SearchApplicationModel;
use App\Models\UserActivityModel;

class ScholarRegistrationController extends BaseController
{

    public function __construct()
    {
        $db                             = db_connect();
        $this->senior_high_registration = new SeniorHighModel($db);
        $this->college_registration     = new CollegeModel($db);
        $this->tvet_registration        = new TvetModel($db);
        $this->config_model             = new ConfigModel($db);
        $this->search_model             = new SearchApplicationModel($db); 
        $this->uri                      = service('uri');
    }

    public function index()
    {
        $data["page_title"]     = "Scholar Registration";
        $config                 = new Custom_config;
        $school                 = new SchoolModel();
        $course                 = new CourseModel();
        $college_school         = new CollegeSchoolModel();
        $strand                 = new StrandModel();
        $sequence               = new SequenceModel();
        $address = new AddressModel();
        $data["config"]         = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $data['year_started']   = $config->year_started;
        $data['barangay']       = $config->barangay;
        $data['semester']       = $config->semester;
        $data['civil_status']   = $config->civilStatus;
        $data['required_field'] = $config->requiredField;
        $data['grade_level']    = $config->gradeLevel;
        $data['school']         = $school->asArray()->orderBy('school_name', 'ASC')->findAll();
        $data['strand']         = $strand->asArray()->orderBy('strand', 'ASC')->findAll();
        $data['course']         = $course->asArray()->orderBy('course', 'ASC')->findAll();
        $data['college_school'] = $college_school->asArray()->orderBy('school_name', 'ASC')->findAll();
        $data['year_level']     = $config->yearLevel;
        $data['sequence_year']  = $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_year'];
        $data['seq_sem']        = $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_sem'];
        $data['address']        = $address->asArray()->findAll();
        $data['app_no_id']      = $this->senior_high_registration->count() + 1;
        $data["config"]         = $this->config_model->asArray()->where('id', 1)->findAll()[0];
         
        return view('admin/scholar_registration', $data);
    }



    public function insert_senior_high_registration()
    {
        try {
            $data =  [
                'appnoyear'         => $this->request->getPost('app_no_year'),
                'appnosem'          => $this->request->getPost('app_no_sem'),
                'appnoid'           => $this->request->getPost('app_no_id'),
                'appstatus'         => $this->request->getPost('status'),
                'lastname'          => ucwords(trim($this->request->getPost('lastname'))),
                'firstname'         => ucwords(trim($this->request->getPost('firstname'))),
                'middlename'        => ucwords(trim($this->request->getPost('middlename'))),
                'suffix'            => ucwords(trim($this->request->getPost('suffix'))),
                'address'           => $this->request->getPost('address'),
                'birthdate'         => $this->request->getPost('birthdate'), 
                'civil_status'      => $this->request->getPost('civil_status'),
                'gender'            => $this->request->getPost('gender'),
                'contact_no'        => trim($this->request->getPost('contact_no')),
                'ctc_no'            => trim($this->request->getPost('ctc_no')),
                'email'             => trim($this->request->getPost('email')),
                'availment'         => $this->request->getPost('availment'),
                'school'            => $this->request->getPost('school'),
                'course'            => $this->request->getPost('strand'), 
                'appyear'           => $this->request->getPost('grade_level'),
                'appsem'            => $this->request->getPost('semester'),
                'appsy'             => $this->request->getPost('school_year'),
                'father_name'       => ucwords(trim($this->request->getPost('father_name'))),
                'father_occupation' => ucwords(trim($this->request->getPost('father_occupation'))),
                'mother_name'       => ucwords(trim($this->request->getPost('mother_name'))),
                'mother_occupation' => ucwords(trim($this->request->getPost('mother_occupation'))),
                'appmanager'        => trim($this->request->getPost('manager')),
                'profile_photo'     => trim($this->request->getPost('image')),
            ];
            
            $this->senior_high_registration->save($data);
            
            $res = [
                "response" => true,
                "message"  => "Application has been saved to pending applications. Do you want to print the application form?",
                "id"       => $this->senior_high_registration->insertID(),
                "appnosem" => $data['appnosem'],
            ];
            

            // Activty Log
            $activity_model = new UserActivityModel(); 
            $name = ucwords($data['firstname'] . " " .  $data['middlename'] . " " .  $data['lastname'] . " " .  $data['suffix'] );
            $activity_model->addLog(auth()->user()->id, 'Created a senior high application for \''.$name.'\'');

            
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
 
        echo Json_encode($res);
    }


    public function shs_app_no_id()
    {
        $app_no_id =  $this->senior_high_registration->count() + 1;
        echo Json_encode($app_no_id);
    }


    public function college_app_no_id()
    {
        $app_no_id =  $this->college_registration->count() + 1;
        echo Json_encode($app_no_id);
    }


    public function tvet_app_no_id()
    {
        $app_no_id =  $this->tvet_registration->count() + 1;
        echo Json_encode($app_no_id);
    }


    public function insert_college_registration()
    { 
        try {
            $data =  [
                "appnoyear"         => $this->request->getPost('app_no_year'),
                "appnosem"          => $this->request->getPost('app_no_sem'),
                "appnoid"           => $this->request->getPost('app_no_id'),
                "appstatus"         => $this->request->getPost('status'),
                "firstname"         => ucwords(trim($this->request->getPost('firstname'))),
                "middlename"        => ucwords(trim($this->request->getPost('middlename'))),
                "lastname"          => ucwords(trim($this->request->getPost('lastname'))),
                "suffix"            => ucwords(trim($this->request->getPost('suffix'))),
                "address"           => $this->request->getPost('address'),
                "birthdate"         => $this->request->getPost('birthdate'), 
                "civil_status"      => $this->request->getPost('civil_status'),
                "gender"            => $this->request->getPost('gender'),
                "contact_no"        => trim($this->request->getPost('contact_no')),
                "ctc_no"            => trim($this->request->getPost('ctc_no')),
                "emaio"             => trim($this->request->getPost('email')),
                "availment"         => trim($this->request->getPost('availment')),
                "school"            => $this->request->getPost('school'),
                "course"            => $this->request->getPost('course'),
                "appyear"           => $this->request->getPost('year_level'),
                "appsem"            => $this->request->getPost('semester'),
                "appsy"             => $this->request->getPost('school_year'),
                "father_name"       => trim($this->request->getPost('father_name')),
                "father_occupation" => ucwords(trim($this->request->getPost('father_occupation'))),
                "mother_name"       => ucwords(trim($this->request->getPost('mother_name'))),
                "mother_occupation" => ucwords(trim($this->request->getPost('mother_occupation'))),
                "appmanager"        => ucwords(trim($this->request->getPost('manager'))),
                "unit"              => trim($this->request->getPost('units')), 
                'profile_photo'     => trim($this->request->getPost('image')),
            ];

            $this->college_registration->save($data);
            $res = [
                "response" => true,
                "message"  => "Application has been saved to pending applications. Do you want to print the application form?",
                "id"       => $this->college_registration->insertID(),
                "appnosem" => $data['appnosem'],
            ];

            
            $activity_model = new UserActivityModel(); 
            $name = $data['firstname'] . " " .  $data['middlename'] . " " .  $data['lastname'] . " " .  $data['suffix'] ;
            $activity_model->addLog(auth()->user()->id, 'Created a college application for \''.$name.'\'');

        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }


        echo Json_encode($res);
    }



    public function insert_tvet_registration()
    { 
        try {
            $data =  [
                "appnoyear"         => $this->request->getPost('app_no_year'),
                "appnosem"          => $this->request->getPost('app_no_sem'),
                "appnoid"           => $this->request->getPost('app_no_id'),
                "appstatus"         => $this->request->getPost('status'),
                "firstname"         => ucwords(trim($this->request->getPost('firstname'))),
                "middlename"        => ucwords(trim($this->request->getPost('middlename'))),
                "lastname"          => ucwords(trim($this->request->getPost('lastname'))),
                "suffix"            => ucwords(trim($this->request->getPost('suffix'))),
                "address"           => $this->request->getPost('address'),
                "birthdate"         => $this->request->getPost('birthdate'), 
                "civil_status"      => $this->request->getPost('civil_status'),
                "gender"            => $this->request->getPost('gender'),
                "contact_no"        => trim($this->request->getPost('contact_no')),
                "ctc_no"            => trim($this->request->getPost('ctc_no')),
                "email"             => trim($this->request->getPost('email')),
                "availment"         => trim($this->request->getPost('availment')),
                "school"            => $this->request->getPost('school'),
                "course"            => $this->request->getPost('course'),
                "appyear"           => $this->request->getPost('year_level'),
                "appsem"            => $this->request->getPost('semester'),
                "appsy"             => $this->request->getPost('school_year'),
                "father_name"       => ucwords(trim($this->request->getPost('father_name'))),
                "father_occupation" => ucwords(trim($this->request->getPost('father_occupation'))),
                "mother_name"       => ucwords(trim($this->request->getPost('mother_name'))),
                "mother_occupation" => ucwords(trim($this->request->getPost('mother_occupation'))),
                "appmanager"        => trim($this->request->getPost('manager')),
                "unit"              => trim($this->request->getPost('units')), 
                'profile_photo'     => trim($this->request->getPost('image')),
            ];

            $res =  $this->tvet_registration->save($data);
            $res = [
                "response" => true,
                "message"  => "Application has been saved to pending applications. Do you want to print the application form?",
                "id"       => $this->tvet_registration->insertID(),
                "appnosem" => $data['appnosem'],
            ];

            $activity_model = new UserActivityModel(); 
            $name = $data['firstname'] . " " .  $data['middlename'] . " " .  $data['lastname'] . " " .  $data['suffix'] ;
            $activity_model->addLog(auth()->user()->id, 'Created a tvet application for \''.$name.'\'');
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }

        echo Json_encode($res);
    }


    public function upload_photo()
    {
        $data          = $_POST["image"];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data          = base64_decode($image_array_2[1]);
        $imageName     = 'public/upload/'.$_POST['folder'].'/' . time() . '.png';
        file_put_contents($imageName, $data);
        echo $imageName;
    }

    public function print()
    {
        $data['page_title'] = "Page Title";
        $segment            = $this->uri->getSegments();
        $id                 = $segment[3];

        try {
            if ($segment[2] == "shs") { 
                $data['profile'] = $this->senior_high_registration->get_applicant_details($id);
                return view('admin/scholar_registration_shs_print', $data);
            } else if ($segment[2] == "college") {
                $data['profile']  = $this->college_registration->get_applicant_details($id);
                 
                // print_r($data['profile']);
                return view('admin/scholar_registration_college_tvet_print', $data);
            } else if ($segment[2] == "tvet") {
                $data['profile'] = $this->tvet_registration->get_applicant_details($id);  
                // print_r($data['profile']);
                return view('admin/scholar_registration_college_tvet_print', $data);
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function get_shs_latest_app_no_id()
    {
        
        $config = $this->config_model->asArray()->where('id', 1)->findAll()[0]; 
        $data   = array(
            "appnoyear" => $this->request->getPost('app_year'),
            "appnosem"  => $this->request->getPost('app_sem'),
            "appsy"     => $config['current_sy'],
            "appsem"    => ($this->request->getPost('app_sem') == 1) ? "1st": "2nd",
        );

        $app_no_id = $this->senior_high_registration->get_latest_app_no_id($data);
        $app_no_id += 1;
        echo Json_encode($app_no_id);
    }

    public function get_college_latest_app_no_id()
    {
        $config = $this->config_model->asArray()->where('id', 1)->findAll()[0]; 
        $data   = array(
            "appnoyear " => $this->request->getPost('app_year'),
            "appnosem"   => $this->request->getPost('app_sem'),
            "appsy"         => $config['current_sy'],
            "appsem"        => ($this->request->getPost('app_sem') == 1) ? "1st": "2nd",
        );

        $app_no_id = $this->college_registration->get_latest_app_no_id($data);
        $app_no_id +=  1;
        echo Json_encode($app_no_id);
    }

    public function get_tvet_latest_app_no_id()
    {
        $config = $this->config_model->asArray()->where('id', 1)->findAll()[0]; 
        $data   = array(
            "appnoyear " => $this->request->getPost('app_year'),
            "appnosem"   => $this->request->getPost('app_sem'),
            "appsy"         => $config['current_sy'],
            "appsem"        => ($this->request->getPost('app_sem') == 1) ? "1st" : "2nd",
        );

        $app_no_id = $this->tvet_registration->get_latest_app_no_id($data);
        $app_no_id +=  1;
        echo Json_encode($app_no_id);
    }


    public function shs_autofill()
    {
        $data = $this->search_model->shs_autofill( $_POST['search']); 
        echo Json_encode($data);
    }

    
    public function college_autofill()
    {
        $data = $this->search_model->college_autofill( $_POST['search']); 
        echo Json_encode($data);
    }

    
    public function tvet_autofill()
    {
        $data = $this->search_model->tvet_autofill( $_POST['search']); 
        echo Json_encode($data);
    }
}
