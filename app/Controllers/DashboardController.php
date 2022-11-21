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

}
