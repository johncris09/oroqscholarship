<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use App\Models\SeniorHighModel;
use Config\Custom_config;
use App\Models\UserActivityModel;

#[\AllowDynamicProperties]
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
            $shs_data['appnosem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['appsy'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'appsy'    => $config['current_sy'],
                'appnosem' => $config['current_sem'],
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
            $shs_data['appnosem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['appsy'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'appsy'    => $config['current_sy'],
                'appnosem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->senior_high->get_pending_application($shs_data);
        echo Json_encode($res);
    }

    
    public function get_archived_application()
    {
        $config   = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $shs_data = [];
        if (!empty($_GET['view'])) {
            $shs_data = [];
        }

        if (!empty($_GET['app_sem'])) {
            $shs_data['appnosem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['appsy'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'appsy'    => $config['current_sy'],
                'appnosem' => $config['current_sem'],
            );
        }
        $res["data"] = $this->senior_high->get_archived_application($shs_data);
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
            $shs_data['appnosem'] = $_GET['app_sem'];
        } else {
            $shs_data = [];
        }

        if (!empty($_GET['app_sy'])) {
            $shs_data['appsy'] = $_GET['app_sy'];
        } else {
            $shs_data = [];
        }
        if (empty($_GET['app_sy']) && empty($_GET['app_sem'])  && empty($_GET['view'])) {
            $shs_data = array(
                'appsy'    => $config['current_sy'],
                'appnosem' => $config['current_sem'],
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
                'appstatus' => $this->request->getPost('status'),
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
                'appsy'           => $this->request->getPost('app_no_year'),
                'appnosem'        => $this->request->getPost('app_no_sem'),
                'appnoid'         => $this->request->getPost('app_no_id'),
                'appstatus'       => $this->request->getPost('status'),
                'lastname'        => trim($this->request->getPost('lastname')),
                'firstname'       => trim($this->request->getPost('firstname')),
                'middlename'      => trim($this->request->getPost('middlename')),
                'suffix'          => trim($this->request->getPost('suffix')),
                'address'         => $this->request->getPost('address'),
                'birthdate'       => $this->request->getPost('birthdate'),
                'AppAge'          => $this->request->getPost('age'),
                'civil_status'    => $this->request->getPost('civil_status'),
                'gender'          => $this->request->getPost('gender'),
                'contact_no'      => trim($this->request->getPost('contact_no')),
                'ctc_no'          => trim($this->request->getPost('ctc_no')),
                'email'           => trim($this->request->getPost('email')),
                'availment'       => trim($this->request->getPost('availment')),
                'school'          => $this->request->getPost('school'),
                'course'          => $this->request->getPost('strand'),
                'appyear'         => $this->request->getPost('grade_level'),
                'appsem'          => $this->request->getPost('semester'),
                'appsy'           => $this->request->getPost('school_year'),
                'father_name'     => trim($this->request->getPost('father_name')),
                'father_nameOccu' => trim($this->request->getPost('father_occupation')),
                'mother_name'     => trim($this->request->getPost('mother_name')),
                'mother_nameOccu' => trim($this->request->getPost('mother_occupation')),
                'appmanager'      => trim($this->request->getPost('manager')),
                'profile_photo'   => trim($this->request->getPost('image')),
            ];


            $this->senior_high->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];
            
            $activity_model = new UserActivityModel(); 
            $name = ucwords($data['firstname'] . " " .  $data['middlename'] . " " .  $data['lastname'] . " " .  $data['suffix'] );
            $activity_model->addLog(auth()->user()->id, 'Updated a senior high application of \''.$name.'\'');


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
        $data["scholarship_type"] = "Senior High School";
        $data['semester']         = $_POST['sem'];
        $data['status']           = $_POST['status'];
        $data['school_year']      = $_POST['school_year']; 

        if($_POST['appnoidfrom'] == "" || $_POST['appnoidto']  == ""  ){
            $res = $this->senior_high->generate($school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        }else{
            $res = $this->senior_high->between($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        }
        $data['query_string'] = 'appnoidfrom='.$appnoidfrom.'&appnoidto='.$appnoidto.'&appnoyear='.$appnoyear.'&appnosem='.$appnosem.'&school='.$school.'&status='.$status.'&school_year='.$sy.'&sem='.$sem.'&availment='.$availment.'&gender='.$gender.'&year_level='.$year_level.'&address='.$address;
        $data["result"]       = $res;  
        $data["column"]       = $_POST['shs_column'];  
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
        $data["scholarship_type"] = "Senior High School";
        $data['semester']         = $_GET['sem'];
        $data['status']           = $_GET['status'];
        $data['school_year']      = $_GET['school_year']; 

        if($_GET['appnoidfrom'] == "" || $_GET['appnoidto']  == ""  ){ 
            $res = $this->senior_high->generate($school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        }else{
            $res = $this->senior_high->between($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status, $sy, $sem, $availment, $gender, $year_level, $address );
        }
        $data["result"] = $res;  
        $data['column'] = explode(', ', $_GET['column']); 
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
        $status                   = $_POST['status'];
        $availment                = $_POST['availment'];
        $gender                   = $_POST['gender'];
        $year_level               = $_POST['year_level'];
        $address                  = $_POST['address']; 
        $data["page_title"]       = "Generated Report"; 
        $data["scholarship_type"] = "College";
        $data['semester']         = $_POST['sem']; 
        $data['school_year']      = $_POST['school_year'];


        if($_POST['appnoidfrom'] == "" || $_POST['appnoidto']  == ""  ){ 
            $res = $this->senior_high->generate_payroll($school, $sy, $status, $sem, $availment, $gender, $year_level, $address );
        }else{
            $res = $this->senior_high->between_payroll($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $sy, $status, $sem, $availment, $gender, $year_level, $address );
        } 
         
        $data["result"]      = $res; 
        $data['tot_record']  = count($data["result"]);
        $data['tot_page']    = ceil($data['tot_record']   / 20);
        $data['from']        = 1;
        $data['sem']         = $_POST['sem'];
        $data['school_year'] = $_POST['school_year'];
        if ($data['tot_record'] != 0) {
            return view('admin/shs_payroll', $data);
        } else {
            echo "No Record found.";
            // throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }  

    } 

    public function bulk_disapproved()
    {  
        $res = $this->senior_high->bulk_disapproved($_POST['applicant_id']);
        echo Json_encode($res);
    }

    public function bulk_approved()
    {  
        $res = $this->senior_high->bulk_approved($_POST['status'], $_POST['applicant_id']);
        echo Json_encode($res);
    }
}
