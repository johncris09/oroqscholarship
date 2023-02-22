<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use App\Models\TvetModel;
use Config\Custom_config;

class TvetController extends BaseController
{

    public function __construct()
    {
        $db                 = db_connect();
        $this->tvet         = new TvetModel($db);
        $this->config_model = new ConfigModel($db);
    }


    public function get_all()
    {
        $config    = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $tvet_data = [];
        if (!empty($_GET['view'])) {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $tvet_data['colAppNoSem'] = $_GET['app_sem'];
        } else {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $tvet_data['colAppNoYear'] = $_GET['app_sy'];
        } else {
            $tvet_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $tvet_data = array(
                'colSY'       => $config['current_sy'],
                'colAppNoSem' => $config['current_sem'],
            );
        }
        $data["data"] = $this->tvet->get_all($tvet_data);
        echo json_encode($data);
    }

    public function get_pending_application()
    {
        $config    = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $tvet_data = [];
        if (!empty($_GET['view'])) {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $tvet_data['colAppNoSem'] = $_GET['app_sem'];
        } else {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $tvet_data['colAppNoYear'] = $_GET['app_sy'];
        } else {
            $tvet_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $tvet_data = array(
                'colSY'       => $config['current_sy'],
                'colAppNoSem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->tvet->get_pending_application($tvet_data);
        echo Json_encode($res);
    }




    public function get_approved_application()
    {
        $config       = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $colelge_data = [];
        if (!empty($_GET['view'])) {
            $colelge_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $colelge_data['colAppNoSem'] = $_GET['app_sem'];
        } else {
            $colelge_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $colelge_data['colAppNoYear'] = $_GET['app_sy'];
        } else {
            $colelge_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $colelge_data = array(
                'colSY'       => $config['current_sy'],
                'colAppNoSem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->tvet->get_approved_application($colelge_data);
        echo Json_encode($res);
    }




    public function update_status()
    {
        try {
            $id   = $this->request->getPost('id');
            $data = [
                'colAppStat' => $this->request->getPost('status'),
            ];

            $this->tvet->update($id, $data);
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
                "colAppNoYear"     => $this->request->getPost('app_no_year'),
                "colAppNoSem"      => $this->request->getPost('app_no_sem'),
                "colAppNoID"       => $this->request->getPost('app_no_id'),
                "colAppStat"       => $this->request->getPost('status'),
                "colFirstName"     => trim($this->request->getPost('firstname')),
                "colMI"            => trim($this->request->getPost('middlename')),
                "colLastName"      => trim($this->request->getPost('lastname')),
                "colSuffix"        => trim($this->request->getPost('suffix')),
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
                "colFatherOccu"    => trim($this->request->getPost('father_occupation')),
                "colMothersName"   => trim($this->request->getPost('mother_name')),
                "colMotherOccu"    => trim($this->request->getPost('mother_occupation')),
                "colManager"       => trim($this->request->getPost('manager')),
                "colUnits"         => trim($this->request->getPost('units')),
                "colSchoolAddress" => trim($this->request->getPost('school_address')),
                'colImage'         => trim($this->request->getPost('image')),
            ];


            $this->tvet->update($id, $data);
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
                'colManager' => $this->request->getPost('manager'),
            ];

            $this->tvet->update($id, $data);
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
        $appnoidfrom              = $_POST['appnoidfrom'];
        $appnoidto                = $_POST['appnoidto'];
        $appnoyear                = $_POST['appnoyear'];
        $appnosem                 = $_POST['appnosem'];
        $school                   = $_POST['school'];
        $sem                      = $_POST['sem'];
        $sy                       = $_POST['school_year'];
        $status                   = $_POST['status'];
        $availment                = $_POST['availment'];
        $gender                   = $_POST['gender'];
        $year_level               = $_POST['year_level'];
        $address                  = $_POST['address']; 
        $data["page_title"]       = "Generated Report"; 
        $data["scholarship_type"] = "TVET";
        $data['semester']         = $_POST['sem'];
        $data['status']           = $_POST['status'];
        $data['school_year']      = $_POST['school_year']; 

        if($_POST['appnoidfrom'] == "" || $_POST['appnoidto']  == ""  ){
            $res = $this->tvet->generate($school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        }else{
            $res = $this->tvet->between($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        } 

        $data['query_string'] = 'appnoidfrom='.$appnoidfrom.'&appnoidto='.$appnoidto.'&appnoyear='.$appnoyear.'&appnosem='.$appnosem.'&school='.$school.'&status='.$status.'&school_year='.$sy.'&sem='.$sem.'&availment='.$availment.'&gender='.$gender.'&year_level='.$year_level.'&address='.$address;
        $data["result"]       = $res;  
        return view('admin/view_report', $data);  
    }



    public function print_preview()
    {
        $appnoidfrom              = $_GET['appnoidfrom'];
        $appnoidto                = $_GET['appnoidto'];
        $appnoyear                = $_GET['appnoyear'];
        $appnosem                 = $_GET['appnosem'];
        $school                   = $_GET['school'];
        $sem                      = $_GET['sem'];
        $sy                       = $_GET['school_year'];
        $status                   = $_GET['status'];
        $availment                = $_GET['availment'];
        $gender                   = $_GET['gender'];
        $year_level               = $_GET['year_level'];
        $address                  = $_GET['address']; 
        $data["page_title"]       = "Generated Report"; 
        $data["scholarship_type"] = "TVET";
        $data['semester']         = $_GET['sem'];
        $data['status']           = $_GET['status'];
        $data['school_year']      = $_GET['school_year']; 

        if($_GET['appnoidfrom'] == "" || $_GET['appnoidto']  == ""  ){ 
            $res = $this->tvet->generate($school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        }else{
            $res = $this->tvet->between($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        } 
        
        $data["result"] = $res;  
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
        $data["scholarship_type"] = "College";
        $data["school_year"]      = "";

        if (!empty($_GET['school'])) {
            $query['colSchool'] =  $_GET['school'];
        }
        if (!empty($_GET['semester'])) {
            $query['colAppNoSem'] =  $_GET['semester'];
            if ($_GET['semester'] !== "") {
                if ($_GET['semester'] == "1st") {
                    $query['colAppNoSem'] = 1;
                } else {
                    $query['colAppNoSem'] = 2;
                }
            }
            $data['semester'] =  $_GET['semester'];
        }
        if (!empty($_GET['school_year'])) {
            $query['colSY']      = $_GET['school_year'];
            $data['school_year'] = $_GET['school_year'];
        }
        // if(!empty($_GET['status'])){ 
        //     $query['colAppStat'] =  $_GET['status'];
        //     $data['status'] =  $_GET['status'];
        // }
        if (!empty($_GET['availment'])) {
            $query['colAvailment'] =  $_GET['availment'];
        }
        if (!empty($_GET['gender'])) {
            $query['colGender'] =  $_GET['gender'];
        }
        if (!empty($_GET['year_level'])) {
            $query['colYearLevel'] =  $_GET['year_level'];
        }
        if (!empty($_GET['address'])) {
            $query['colAddress'] =  $_GET['address'];
        }
        if (!empty($_GET['from'])) {
            $range['colAppNoIDFrom'] =  $_GET['from'];
        }
        if (!empty($_GET['to'])) {
            $range['colAppNoIDTo'] =  $_GET['to'];
        }


        $data["result"]     = $this->tvet->get_payroll($query, $range);
        $data['tot_record'] = count($data["result"]);
        $data['tot_page']   = ceil($data['tot_record']   / 20);
        $data['from']       = 1;
        if ($data['tot_record'] != 0) {
            return view('admin/tvet_payroll', $data);
        } else {
            echo "No record Found";
        }
    }
    public function bulk_disapproved()
    {  
        $res = $this->tvet->bulk_disapproved($_POST['applicant_id']);
        echo Json_encode($res);
    }
}
