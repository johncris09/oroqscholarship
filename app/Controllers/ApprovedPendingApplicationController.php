<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeModel;
use App\Models\SeniorHighModel;
use App\Models\TvetModel;

class ApprovedPendingApplicationController extends BaseController
{ 
        
    public function __construct() {
        $db = db_connect();
        $this->senior_high = new SeniorHighModel($db);
        $this->college  = new CollegeModel($db);
        $this->tvet  = new TvetModel($db);
    }
    public function index()
    {    
        $data["page_title"] = "Pending Application";
        return view('admin/pending_application', $data); 

    }
}
