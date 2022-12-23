<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeModel;
use App\Models\SeniorHighModel;
use App\Models\TvetModel;

class DashboardController extends BaseController
{
    
        
    public function __construct() {
        $db = db_connect();
        $this->senior_high = new SeniorHighModel($db);
        $this->college  = new CollegeModel($db);
        $this->tvet  = new TvetModel($db);
        $this->custom_config = new \Config\Custom_config();
    }

    public function index()
    {     
        $data['tot_approved_shs'] = $this->senior_high->count_approved();
        $data['tot_approved_college'] = $this->college->count_approved();
        $data['tot_approved_tvet'] = $this->tvet->count_approved();
        $data["page_title"] = "Dashboard";
        $data["shs_gender"] = $this->scholarship_shs_gender();
        $data["college_gender"] = $this->scholarship_college_gender();
        $data["tvet_gender"] = $this->scholarship_tvet_gender();
        $data["scholarship_status"] = $this->scholarship_status();
        $data["scholarship_barangay"] = $this->scholarship_barangay();
        $data["shs_school"] = $this->get_by_shs_school(); 
        $data["college_school"] = $this->get_by_college_school(); 
        $data["tvet_school"] = $this->get_by_tvet_school();  
        return view('admin/dashboard', $data); 
    }

    


    public function scholarship_shs_gender()
    {
        $data  = $this->senior_high->get_tot_by_gender();  
        return $data; 
    }

    public function scholarship_college_gender()
    {
        $data  = $this->college->get_tot_by_gender();  
        return $data; 
    }
    public function scholarship_tvet_gender()
    {
        $data  = $this->tvet->get_tot_by_gender();  
        return $data; 
    }

    public function scholarship_status()
    { 
        $shs  = $this->senior_high->get_tot_by_status();
        $college  = $this->college->get_tot_by_status();
        $tvet  = $this->tvet->get_tot_by_status();
        foreach($shs as $row){  
            if($row->status == "Additional Approved"){ 
                $data["additional_approved"][] = $row->total; 
            }
            $data[strtolower($row->status)][] = $row->total; 
        }
        foreach($college as $row){  
            if($row->status == "Additional Approved"){ 
                $data["additional_approved"][] = $row->total; 
            }
            $data[strtolower($row->status)][] = $row->total; 
        }
        foreach($tvet as $row){  
            if($row->status == "Additional Approved"){ 
                $data["additional_approved"][] = $row->total; 
            }
            $data[strtolower($row->status)][] = $row->total; 
        } 
        
        return $data; 

    }
  
    public function get_by_shs_school()
    { 
        $shs  = $this->senior_high->get_tot_by_school(); 
        foreach($shs as $row){  
            $data['school'][] = $row->school;
            $data['total'][] = $row->total; 
        }
        return $data; 

    }

    
    public function get_by_college_school()
    {  
        $college  = $this->college->get_tot_by_school(); 
        foreach($college as $row){  
            $data['school'][] = $row->school;
            $data['total'][] = $row->total; 
        }
        return $data; 

    }
 
    
    public function get_by_tvet_school()
    {  
        $tvet  = $this->tvet->get_tot_by_school();   
        foreach($tvet as $row){  
            $data['school'][] = $row->school;
            $data['total'][] = $row->total; 
        }
        return $data; 

    }
 
 
    
    public function scholarship_barangay()
    {  
        $barangay =  $this->custom_config->barangay;
        foreach($barangay as $brgy){ 
            $data['barangay'][] = $brgy;

            $shs  = $this->senior_high->get_tot_by_barangay($brgy);
            foreach($shs as $shs){
                    $data['shs'][]  = $shs->total;
            }
            $college  = $this->college->get_tot_by_barangay($brgy);
            foreach($college as $college){
                    $data['college'][]  = $college->total;
            }
            $tvet  = $this->tvet->get_tot_by_barangay($brgy);
            foreach($tvet as $tvet){
                    $data['tvet'][]  = $tvet->total;
            } 

        }
        return $data; 

    }

    public function filter()
    { 
        
        
        $data['shs_total'] = $this->shs_filter($_GET);
        $data['college_total'] = $this->college_filter($_GET);
        $data['tvet_total'] = $this->tvet_filter($_GET);


        echo json_encode($data); 
    }

    public function shs_filter($data)
    {
        if(isset($_POST['sy']) && !empty($_POST['sy'])){
            $data['sy'] = $_POST['sy'];
        }
        if(isset($_POST['semester']) && !empty($_POST['semester'])){
            $data['semester'] = $_POST['semester'];
        }
 
        return  $this->senior_high->filter($data);
    }
    public function college_filter($data)
    {
        if(isset($_POST['sy']) && !empty($_POST['sy'])){
            $data['sy'] = $_POST['sy'];
        }
        if(isset($_POST['semester']) && !empty($_POST['semester'])){
            $data['semester'] = $_POST['semester'];
        }
 
        return  $this->college->filter($data);

    }
    public function tvet_filter($data)
    {
        if(isset($_POST['sy']) && !empty($_POST['sy'])){
            $data['sy'] = $_POST['sy'];
        }
        if(isset($_POST['semester']) && !empty($_POST['semester'])){
            $data['semester'] = $_POST['semester'];
        }
 
        return  $this->tvet->filter($data);

    } 

}
