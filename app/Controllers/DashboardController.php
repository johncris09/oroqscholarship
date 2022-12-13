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
        $shs  = $this->get_shs_group_by_status_tot(); 
        $college  = $this->get_college_group_by_status_tot(); 
        $tvet  = $this->get_tvet_group_by_status_tot(); 
        foreach($shs as $row){  
            $data[$row->status][] = $row->total; 
        }
        foreach($college as $row){  
            $data[$row->status][] = $row->total; 
        }
        foreach($tvet as $row){  
            $data[$row->status][] = $row->total; 
        }  

        echo json_encode($data);

    }

    // get shs scholarship status
    public function get_shs_group_by_status_tot()
    { 
        return $this->senior_high->get_tot_group_by_status();
    } 

    // get college scholarship status
    public function get_college_group_by_status_tot()
    { 
        return $this->college->get_tot_group_by_status();
    }

    
    // get tvet scholarship status
    public function get_tvet_group_by_status_tot()
    { 
        return $this->tvet->get_tot_group_by_status();
    }

    

}
