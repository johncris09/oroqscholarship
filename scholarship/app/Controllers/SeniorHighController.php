<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use App\Models\SeniorHighModel;
use Config\Custom_config;

class SeniorHighController extends BaseController
{

    public function __construct()
    {
        $db                = db_connect();
        $this->senior_high = new SeniorHighModel($db);
        $this->config_model =  new ConfigModel($db);
    }

    public function get_all()
    {
        $config   = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $shs_data = [];
        if (!empty($_GET['view'])) {
            $shs_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $shs_data['AppNoSem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['AppSY'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'AppSY'    => $config['current_sy'],
                'AppNoSem' => $config['current_sem'],
            );
        }
        $data["data"] = $this->senior_high->get_all($shs_data);
        echo json_encode($data);
    }

    public function get_pending_application()
    {
        $config   = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $shs_data = [];
        if (!empty($_GET['view'])) {
            $shs_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $shs_data['AppNoSem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['AppSY'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'AppSY'    => $config['current_sy'],
                'AppNoSem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->senior_high->get_pending_application($shs_data);
        echo Json_encode($res);
    }

    public function get_approved_application()
    {
        $config   = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $shs_data = [];
        if (!empty($_GET['view'])) {
            $shs_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $shs_data['AppNoSem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['AppSY'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'AppSY'    => $config['current_sy'],
                'AppNoSem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->senior_high->get_approved_application($shs_data);
        echo Json_encode($res);
    }

    public function update_status()
    {
        try {
            $id = $this->request->getPost('id');
            $data = [
                'AppStatus' => $this->request->getPost('status'),
            ];

            $this->senior_high->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }



    public function update()
    {
        try {
            $id   = $this->request->getPost('id');
            $data = [
                'AppSY'         => $this->request->getPost('app_no_year'),
                'AppNoSem'      => $this->request->getPost('app_no_sem'),
                'AppNoID'       => $this->request->getPost('app_no_id'),
                'AppStatus'     => $this->request->getPost('status'),
                'AppLastName'   => trim($this->request->getPost('lastname')),
                'AppFirstName'  => trim($this->request->getPost('firstname')),
                'AppMidIn'      => trim($this->request->getPost('middlename')),
                'AppSuffix'     => trim($this->request->getPost('suffix')),
                'AppAddress'    => $this->request->getPost('address'),
                'AppDOB'        => $this->request->getPost('birthdate'),
                'AppAge'        => $this->request->getPost('age'),
                'AppCivilStat'  => $this->request->getPost('civil_status'),
                'AppGender'     => $this->request->getPost('gender'),
                'AppContact'    => trim($this->request->getPost('contact_no')),
                'AppCTC'        => trim($this->request->getPost('contact_no')),
                'AppEmailAdd'   => trim($this->request->getPost('email')),
                'AppAvailment'  => trim($this->request->getPost('availment')),
                'AppSchool'     => $this->request->getPost('school'),
                'AppCourse'     => $this->request->getPost('strand'),
                'AppYear'       => $this->request->getPost('grade_level'),
                'AppSem'        => $this->request->getPost('semester'),
                'AppSy'         => $this->request->getPost('school_year'),
                'AppFather'     => trim($this->request->getPost('father_name')),
                'AppFatherOccu' => trim($this->request->getPost('father_occupation')),
                'AppMother'     => trim($this->request->getPost('mother_name')),
                'AppMotherOccu' => trim($this->request->getPost('mother_occupation')),
                'AppManager'    => trim($this->request->getPost('manager')),
                'AppImage'      => trim($this->request->getPost('image')),
            ];


            $this->senior_high->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }

        echo Json_encode($res);
    }



    public function archived_application()
    {
        try {
            $id   = $this->request->getPost('id');
            $data = [
                'AppManager' => $this->request->getPost('manager'),
            ];

            $this->senior_high->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }


    public function get_report()
    { 
        $query                    = [];
        $range                    = []; 
        $data["page_title"]       = "Generated Report";
        $data["semester"]         = "";
        $data["status"]           = "";
        $data["scholarship_type"] = "Senior High School";
        $data["school_year"] = "";

        if (!empty($_GET['school'])) {
            $query['AppSchool'] =  $_GET['school'];
        }
        if (!empty($_GET['semester'])) {
            $query['AppSem'] =  $_GET['semester'];
            if ($_GET['semester'] !== "") {
                if ($_GET['semester'] == "1st") {
                    $query['AppNoSem'] = 1;
                } else {
                    $query['AppNoSem'] = 2;
                }
            }
            $data['semester'] =  $_GET['semester'];
        }
        if (!empty($_GET['school_year'])) {
            $query['AppSY']      = $_GET['school_year'];
            $data['school_year'] = $_GET['school_year'];
        }
        if (!empty($_GET['status'])) {
            $query['AppStatus'] = $_GET['status'];
            $data['status']     = $_GET['status'];
        }
        if (!empty($_GET['availment'])) {
            $query['AppAvailment'] =  $_GET['availment'];
        }
        if (!empty($_GET['gender'])) {
            $query['AppGender'] =  $_GET['gender'];
        }
        if (!empty($_GET['year_level'])) {
            $query['AppYear'] =  $_GET['year_level'];
        }
        if (!empty($_GET['address'])) {
            $query['AppAddress'] =  $_GET['address'];
        }
        if (!empty($_GET['from'])) {
            $range['AppNoIDFrom'] =  $_GET['from'];
        }
        if (!empty($_GET['to'])) {
            $range['AppNoIDTo'] =  $_GET['to'];
        }

        $data["result"] = $this->senior_high->get_report($query, $range);
        return view('admin/view_report', $data);
    }



    public function print_preview()
    { 
        $query                    = [];
        $range                    = []; 
        $data["page_title"]       = "Generated Report";
        $data["semester"]         = "";
        $data["status"]           = "";
        $data["scholarship_type"] = "Senior High School";
        $data["school_year"]      = "";

        if (!empty($_GET['school'])) {
            $query['AppSchool'] =  $_GET['school'];
        }
        if (!empty($_GET['semester'])) {
            $query['AppSem'] =  $_GET['semester'];
            if ($_GET['semester'] !== "") {
                if ($_GET['semester'] == "1st") {
                    $query['AppNoSem'] = 1;
                } else {
                    $query['AppNoSem'] = 2;
                }
            }
            $data['semester'] =  $_GET['semester'];
        }
        if (!empty($_GET['school_year'])) {
            $query['AppSY']      = $_GET['school_year'];
            $data['school_year'] = $_GET['school_year'];
        }
        if (!empty($_GET['status'])) {
            $query['AppStatus'] = $_GET['status'];
            $data['status']     = $_GET['status'];
        }
        if (!empty($_GET['availment'])) {
            $query['AppAvailment'] =  $_GET['availment'];
        }
        if (!empty($_GET['gender'])) {
            $query['AppGender'] =  $_GET['gender'];
        }
        if (!empty($_GET['year_level'])) {
            $query['AppYear'] =  $_GET['year_level'];
        }
        if (!empty($_GET['address'])) {
            $query['AppAddress'] =  $_GET['address'];
        }
        if (!empty($_GET['from'])) {
            $range['AppNoIDFrom'] =  $_GET['from'];
        }
        if (!empty($_GET['to'])) {
            $range['AppNoIDTo'] =  $_GET['to'];
        }

        $data["result"] = $this->senior_high->get_report($query, $range);
        return view('admin/print_preview', $data);
    }



    public function payroll_print_preview()
    {
        $query                    = [];
        $range                    = []; 
        $data["page_title"]       = "Generated Payroll";
        $data["semester"]         = "";
        $data['config']           = new Custom_config;
        // $data["status"]        = ""; 
        $data["scholarship_type"] = "Senior High School";
        $data["school_year"]      = "";

        if (!empty($_GET['school'])) {
            $query['AppSchool'] =  $_GET['school'];
        }
        if (!empty($_GET['semester'])) {
            $query['AppSem'] =  $_GET['semester'];
            if ($_GET['semester'] !== "") {
                if ($_GET['semester'] == "1st") {
                    $query['AppNoSem'] = 1;
                } else {
                    $query['AppNoSem'] = 2;
                }
            }
            $data['semester'] =  $_GET['semester'];
        }
        if (!empty($_GET['school_year'])) {
            $query['AppSY']      = $_GET['school_year'];
            $data['school_year'] = $_GET['school_year'];
        }
        // if(!empty($_GET['status'])){ 
        //     $query['AppStatus'] =  $_GET['status'];
        //     $data['status'] =  $_GET['status'];
        // }
        if (!empty($_GET['availment'])) {
            $query['AppAvailment'] =  $_GET['availment'];
        }
        if (!empty($_GET['gender'])) {
            $query['AppGender'] =  $_GET['gender'];
        }
        if (!empty($_GET['year_level'])) {
            $query['AppYear'] =  $_GET['year_level'];
        }
        if (!empty($_GET['address'])) {
            $query['AppAddress'] =  $_GET['address'];
        }
        if (!empty($_GET['from'])) {
            $range['AppNoIDFrom'] =  $_GET['from'];
        }
        if (!empty($_GET['to'])) {
            $range['AppNoIDTo'] =  $_GET['to'];
        }

        $data["result"]     = $this->senior_high->get_payroll($query, $range);
        $data['tot_record'] = count($data["result"]);
        $data['tot_page']   = ceil($data['tot_record']   / 20);
        $data['from']       = 1;
        if ($data['tot_record'] != 0) {
            return view('admin/shs_payroll', $data);
        } else {
            echo "No record Found";
        }
    }
}