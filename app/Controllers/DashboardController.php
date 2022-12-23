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
        return view('admin/dashboard', $data); 
    }

    public function scholarship_status()
    { 
        $shs  = $this->senior_high->get_tot_by_status();
        $college  = $this->college->get_tot_by_status();
        $tvet  = $this->tvet->get_tot_by_status();
        foreach($shs as $row){  
            if($row->status == "Additional Approved"){ 
                $data["Additional_approved"][] = $row->total; 
            }
            $data[$row->status][] = $row->total; 
        }
        foreach($college as $row){  
            if($row->status == "Additional Approved"){ 
                $data["Additional_approved"][] = $row->total; 
            }
            $data[$row->status][] = $row->total; 
        }
        foreach($tvet as $row){  
            if($row->status == "Additional Approved"){ 
                $data["Additional_approved"][] = $row->total; 
            }
            $data[$row->status][] = $row->total; 
        }  

        echo json_encode($data);

    }
  
    public function get_by_shs_school()
    { 
        $shs  = $this->senior_high->get_tot_by_school(); 
        foreach($shs as $row){ 
            if(!$row->school== null){ 
                $data['school'][] = $row->school;
                $data['total'][] = $row->total;
            }else{ 
                $data['school'][] = "N/A";
                $data['total'][] = $row->total;
            }

        }
        echo json_encode($data);

    }

    
    public function get_by_college_school()
    {  
        $college  = $this->college->get_tot_by_school(); 
        foreach($college as $row){ 
            if(!$row->school== null){ 
                $data['school'][] = $row->school;
                $data['total'][] = $row->total;
            }else{ 
                $data['school'][] = "N/A";
                $data['total'][] = $row->total;
            } 
        }
        echo json_encode($data);

    }
 
    
    public function get_by_tvet_school()
    {  
        $tvet  = $this->tvet->get_tot_by_school();   
        foreach($tvet as $row){ 
            if(!$row->school== null){ 
                $data['school'][] = $row->school;
                $data['total'][] = $row->total;
            }else{ 
                $data['school'][] = "N/A";
                $data['total'][] = $row->total;
            } 
        }
        echo json_encode($data);

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
        echo json_encode($data); 

    }

    public function scholarship_shs_gender()
    {
        $shs  = $this->senior_high->get_tot_by_gender(); 
        foreach($shs as $row){ 
            if(!$row->gender== null){ 
                if( strtolower($row->gender) == "male"){ 
                    $data['total'][] = (int) $row->total;
                    $data['gender'][] = "male";
                }  
                if( strtolower($row->gender) == "female"){ 
                    $data['total'][] = (int) $row->total;
                    $data['gender'][] = "female";
                }
            } 
 
        } 
        echo json_encode($data); 
    }

    public function scholarship_college_gender()
    {
        $college  = $this->college->get_tot_by_gender(); 
        foreach($college as $row){ 
            if(!$row->gender== null){ 
                if( strtolower($row->gender) == "male"){ 
                    $data['total'][] = (int) $row->total;
                    $data['gender'][] = "male";
                }  
                if( strtolower($row->gender) == "female"){ 
                    $data['total'][] = (int) $row->total;
                    $data['gender'][] = "female";
                }
            } 
 
        } 
        echo json_encode($data); 
    }
    public function scholarship_tvet_gender()
    {
        $tvet  = $this->tvet->get_tot_by_gender(); 
        foreach($tvet as $row){ 
            if(!$row->gender== null){ 
                if( strtolower($row->gender) == "male"){ 
                    $data['total'][] = (int) $row->total;
                    $data['gender'][] = "male";
                }  
                if( strtolower($row->gender) == "female"){ 
                    $data['total'][] = (int) $row->total;
                    $data['gender'][] = "female";
                }
            } 
 
        } 
        echo json_encode($data); 
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
