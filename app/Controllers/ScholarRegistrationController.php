<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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

class ScholarRegistrationController extends BaseController
{

    public function __construct()
    {
        $db                             = db_connect();
        $this->senior_high_registration = new SeniorHighModel($db);
        $this->college_registration     = new CollegeModel($db);
        $this->tvet_registration        = new TvetModel($db);
        $this->config_model             = new ConfigModel($db);
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
        $data["config"]         = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $data['year_started']   = $config->year_started;
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
        $data['sequence_year']  = $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_year'];
        $data['seq_sem']        = $sequence->asArray()->where('Sys_ID', 1)->findAll()[0]['seq_sem'];
        $data['app_no_id']      = $this->senior_high_registration->count() + 1;
        $data["config"]         = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        return view('admin/scholar_registration', $data);
    }



    public function insert_senior_high_registration()
    {
        try {
            $data                  =  [
                'AppNoYear'        => $this->request->getPost('app_no_year'),
                'AppNoSem'         => $this->request->getPost('app_no_sem'),
                'AppNoID'          => $this->request->getPost('app_no_id'),
                'AppStatus'        => $this->request->getPost('status'),
                'AppLastName'      => ucwords(trim($this->request->getPost('lastname'))),
                'AppFirstName'     => ucwords(trim($this->request->getPost('firstname'))),
                'AppMidIn'         => ucwords(trim($this->request->getPost('middlename'))),
                'AppSuffix'        => ucwords(trim($this->request->getPost('suffix'))),
                'AppAddress'       => $this->request->getPost('address'),
                'AppDOB'           => $this->request->getPost('birthdate'),
                'AppAge'           => $this->request->getPost('age'),
                'AppCivilStat'     => $this->request->getPost('civil_status'),
                'AppGender'        => $this->request->getPost('gender'),
                'AppContact'       => trim($this->request->getPost('contact_no')),
                'AppCTC'           => trim($this->request->getPost('ctc_no')),
                'AppEmailAdd'      => trim($this->request->getPost('email')),
                'AppAvailment'     => $this->request->getPost('availment'),
                'AppSchool'        => $this->request->getPost('school'),
                'AppCourse'        => $this->request->getPost('strand'),
                "AppSchoolAddress" => $this->request->getPost('school_address'),
                'AppYear'          => $this->request->getPost('grade_level'),
                'AppSem'           => $this->request->getPost('semester'),
                'AppSy'            => $this->request->getPost('school_year'),
                'AppFather'        => ucwords(trim($this->request->getPost('father_name'))),
                'AppFatherOccu'    => ucwords(trim($this->request->getPost('father_occupation'))),
                'AppMother'        => ucwords(trim($this->request->getPost('mother_name'))),
                'AppMotherOccu'    => ucwords(trim($this->request->getPost('mother_occupation'))),
                'AppManager'       => trim($this->request->getPost('manager')),
                'AppImage'         => trim($this->request->getPost('image')),
            ];
            $this->senior_high_registration->save($data);
            $res = [
                "response" => true,
                "message"  => "Application has been saved to pending applications. Do you want to print the application form?",
                "id"       => $this->senior_high_registration->insertID(),
                "appnosem" => $data['AppNoSem'],
            ];
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
            $data                  =  [
                "colAppNoYear"     => $this->request->getPost('app_no_year'),
                "colAppNoSem"      => $this->request->getPost('app_no_sem'),
                "colAppNoID"       => $this->request->getPost('app_no_id'),
                "colAppStat"       => $this->request->getPost('status'),
                "colFirstName"     => ucwords(trim($this->request->getPost('firstname'))),
                "colMI"            => ucwords(trim($this->request->getPost('middlename'))),
                "colLastName"      => ucwords(trim($this->request->getPost('lastname'))),
                "colSuffix"        => ucwords(trim($this->request->getPost('suffix'))),
                "colAddress"       => $this->request->getPost('address'),
                "colDOB"           => $this->request->getPost('birthdate'),
                "colAge"           => $this->request->getPost('age'),
                "colCivilStat"     => $this->request->getPost('civil_status'),
                "colGender"        => $this->request->getPost('gender'),
                "colContactNo"     => trim($this->request->getPost('contact_no')),
                "colCTC"           => trim($this->request->getPost('ctc_no')),
                "colEmailAdd"      => trim($this->request->getPost('email')),
                "colAvailment"     => trim($this->request->getPost('availment')),
                "colSchool"        => $this->request->getPost('school'),
                "colCourse"        => $this->request->getPost('course'),
                "colYearLevel"     => $this->request->getPost('year_level'),
                "colSem"           => $this->request->getPost('semester'),
                "colSY"            => $this->request->getPost('school_year'),
                "colFathersName"   => trim($this->request->getPost('father_name')),
                "colFatherOccu"    => ucwords(trim($this->request->getPost('father_occupation'))),
                "colMothersName"   => ucwords(trim($this->request->getPost('mother_name'))),
                "colMotherOccu"    => ucwords(trim($this->request->getPost('mother_occupation'))),
                "colManager"       => ucwords(trim($this->request->getPost('manager'))),
                "colUnits"         => trim($this->request->getPost('units')),
                "colSchoolAddress" => trim($this->request->getPost('school_address')),
                'colImage'         => trim($this->request->getPost('image')),
            ];

            $res =  $this->college_registration->save($data);
            $res = [
                "response" => true,
                "message"  => "Application has been saved to pending applications. Do you want to print the application form?",
                "id"       => $this->college_registration->insertID(),
                "appnosem" => $data['colAppNoSem'],
            ];
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
            $data                  =  [
                "colAppNoYear"     => $this->request->getPost('app_no_year'),
                "colAppNoSem"      => $this->request->getPost('app_no_sem'),
                "colAppNoID"       => $this->request->getPost('app_no_id'),
                "colAppStat"       => $this->request->getPost('status'),
                "colFirstName"     => ucwords(trim($this->request->getPost('firstname'))),
                "colMI"            => ucwords(trim($this->request->getPost('middlename'))),
                "colLastName"      => ucwords(trim($this->request->getPost('lastname'))),
                "colSuffix"        => ucwords(trim($this->request->getPost('suffix'))),
                "colAddress"       => $this->request->getPost('address'),
                "colDOB"           => $this->request->getPost('birthdate'),
                "colAge"           => $this->request->getPost('age'),
                "colCivilStat"     => $this->request->getPost('civil_status'),
                "colGender"        => $this->request->getPost('gender'),
                "colContactNo"     => trim($this->request->getPost('contact_no')),
                "colCTC"           => trim($this->request->getPost('ctc_no')),
                "colEmailAdd"      => trim($this->request->getPost('email')),
                "colAvailment"     => trim($this->request->getPost('availment')),
                "colSchool"        => $this->request->getPost('school'),
                "colCourse"        => $this->request->getPost('course'),
                "colYearLevel"     => $this->request->getPost('year_level'),
                "colSem"           => $this->request->getPost('semester'),
                "colSY"            => $this->request->getPost('school_year'),
                "colFathersName"   => ucwords(trim($this->request->getPost('father_name'))),
                "colFatherOccu"    => ucwords(trim($this->request->getPost('father_occupation'))),
                "colMothersName"   => ucwords(trim($this->request->getPost('mother_name'))),
                "colMotherOccu"    => ucwords(trim($this->request->getPost('mother_occupation'))),
                "colManager"       => trim($this->request->getPost('manager')),
                "colUnits"         => trim($this->request->getPost('units')),
                "colSchoolAddress" => trim($this->request->getPost('school_address')),
                'colImage'         => trim($this->request->getPost('image')),
            ];

            $res =  $this->tvet_registration->save($data);
            $res = [
                "response" => true,
                "message"  => "Application has been saved to pending applications. Do you want to print the application form?",
                "id"       => $this->tvet_registration->insertID(),
                "appnosem" => $data['colAppNoSem'],
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }

        echo Json_encode($res);
    }


    public function upload()
    {
        $data          = $_POST["image"];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data          = base64_decode($image_array_2[1]);
        $imageName     = 'upload/photo/' . time() . '.png';
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
                $data['profile'] = $this->senior_high_registration->asArray()->where('id', $id)->findAll()[0];
                return view('admin/scholar_registration_shs_print', $data);
            } else if ($segment[2] == "college") {
                $data['profile']  = $this->college_registration->asArray()->where('id', $id)->findAll()[0];
                return view('admin/scholar_registration_college_tvet_print', $data);
            } else if ($segment[2] == "tvet") {
                $data['profile'] = $this->tvet_registration->asArray()->where('id', $id)->findAll()[0];
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
        $data = array(
            "AppNoYear " => $this->request->getPost('app_year'),
            "AppNoSem"   => $this->request->getPost('app_sem'),
        );

        $app_no_id = $this->senior_high_registration->get_latest_app_no_id($data);
        $app_no_id + = 1;
        echo Json_encode($app_no_id);
    }

    public function get_college_latest_app_no_id()
    {
        $data = array(
            "colAppNoYear " => $this->request->getPost('app_year'),
            "colAppNoSem"   => $this->request->getPost('app_sem'),
        );

        $app_no_id = $this->college_registration->get_latest_app_no_id($data);
        $app_no_id +=  1;
        echo Json_encode($app_no_id);
    }

    public function get_tvet_latest_app_no_id()
    {
        $data = array(
            "colAppNoYear " => $this->request->getPost('app_year'),
            "colAppNoSem"   => $this->request->getPost('app_sem'),
        );

        $app_no_id = $this->tvet_registration->get_latest_app_no_id($data);
        $app_no_id +=  1;
        echo Json_encode($app_no_id);
    }
}
