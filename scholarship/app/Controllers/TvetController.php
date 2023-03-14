<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use App\Models\TvetModel;
use Config\Custom_config;
use App\Models\UserActivityModel;

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
            $tvet_data['appnosem'] = $_GET['app_sem'];
        } else {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $tvet_data['appnoyear'] = $_GET['app_sy'];
        } else {
            $tvet_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $tvet_data = array(
                'appsy'       => $config['current_sy'],
                'appnosem' => $config['current_sem'],
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
            $tvet_data['appnosem'] = $_GET['app_sem'];
        } else {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $tvet_data['appnoyear'] = $_GET['app_sy'];
        } else {
            $tvet_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $tvet_data = array(
                'appsy'       => $config['current_sy'],
                'appnosem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->tvet->get_pending_application($tvet_data);
        echo Json_encode($res);
    }



    public function get_archived_application()
    {
        $config    = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $tvet_data = [];
        if (!empty($_GET['view'])) {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $tvet_data['appnosem'] = $_GET['app_sem'];
        } else {
            $tvet_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $tvet_data['appnoyear'] = $_GET['app_sy'];
        } else {
            $tvet_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $tvet_data = array(
                'appsy'       => $config['current_sy'],
                'appnosem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->tvet->get_archived_application($tvet_data);
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
            $colelge_data['appnosem'] = $_GET['app_sem'];
        } else {
            $colelge_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $colelge_data['appnoyear'] = $_GET['app_sy'];
        } else {
            $colelge_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $colelge_data = array(
                'appsy'       => $config['current_sy'],
                'appnosem' => $config['current_sem'],
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
                'appstatus' => $this->request->getPost('status'),
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
                "appnoyear"     => $this->request->getPost('app_no_year'),
                "appnosem"      => $this->request->getPost('app_no_sem'),
                "appnoid"       => $this->request->getPost('app_no_id'),
                "appstatus"       => $this->request->getPost('status'),
                "firstname"     => trim($this->request->getPost('firstname')),
                "middlename"            => trim($this->request->getPost('middlename')),
                "lastname"      => trim($this->request->getPost('lastname')),
                "suffix"        => trim($this->request->getPost('suffix')),
                "address"       => $this->request->getPost('address'),
                "colDOB"           => $this->request->getPost('birthdate'),
                "colAge"           => $this->request->getPost('age'),
                "civil_status"     => $this->request->getPost('civil_status'),
                "gender"        => $this->request->getPost('gender'),
                "contact_no"     => trim($this->request->getPost('contact_no')),
                "ctc_no"           => trim($this->request->getPost('ctc_no')),
                "email"      => trim($this->request->getPost('email')),
                "availment"     => trim($this->request->getPost('availment')),
                "school"        => $this->request->getPost('school'),
                "course"        => $this->request->getPost('course'),
                "appyear"     => $this->request->getPost('year_level'),
                "appsem"           => $this->request->getPost('semester'),
                "appsy"            => $this->request->getPost('school_year'),
                "father_name"   => trim($this->request->getPost('father_name')),
                "father_occupation"    => trim($this->request->getPost('father_occupation')),
                "mother_name"   => trim($this->request->getPost('mother_name')),
                "mother_occupation"    => trim($this->request->getPost('mother_occupation')),
                "appmanager"       => trim($this->request->getPost('manager')),
                "unit"         => trim($this->request->getPost('units')),
                "schoolAddress" => trim($this->request->getPost('school_address')),
                'profile_photo'         => trim($this->request->getPost('image')),
            ];


            $this->tvet->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];

            $activity_model = new UserActivityModel(); 
            $name = ucwords($data['firstname'] . " " .  $data['middlename'] . " " .  $data['lastname'] . " " .  $data['suffix'] );
            $activity_model->addLog(auth()->user()->id, 'Updated a tvet application of \''.$name.'\'');
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
                'appmanager' => $this->request->getPost('manager'),
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
        $data['config']           = new Custom_config; 
        $appnoidfrom              = $_POST['appnoidfrom'];
        $appnoidto                = $_POST['appnoidto'];
        $appnoyear                = $_POST['appnoyear'];
        $appnosem                 = $_POST['appnosem'];
        $school                   = $_POST['school'];
        $sem                      = $_POST['sem'];
        $sy                       = $_POST['school_year']; 
        $availment                = $_POST['availment'];
        $gender                   = $_POST['gender'];
        $year_level               = $_POST['year_level'];
        $address                  = $_POST['address']; 
        $data["page_title"]       = "Generated Report"; 
        $data["scholarship_type"] = "TVET";
        $data['semester']         = $_POST['sem']; 
        $data['school_year']      = $_POST['school_year'];

        if($_POST['appnoidfrom'] == "" || $_POST['appnoidto']  == ""  ){ 
            $res = $this->tvet->generate_payroll($school, $sy, $sem, $availment, $gender, $year_level, $address );
        }else{
            $res = $this->tvet->between_payroll($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $sy, $sem, $availment, $gender, $year_level, $address );
        } 

        $data["result"]      = $res; 
        $data['tot_record']  = count($data["result"]);
        $data['tot_page']    = ceil($data['tot_record']   / 20);
        $data['from']        = 1;
        $data['sem']         = $_POST['sem'];
        $data['school_year'] = $_POST['school_year'];
        if ($data['tot_record'] != 0) {
            return view('admin/tvet_payroll', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } 
    }

    public function bulk_disapproved()
    {  
        $res = $this->tvet->bulk_disapproved($_POST['applicant_id']);
        echo Json_encode($res);
    }
}
