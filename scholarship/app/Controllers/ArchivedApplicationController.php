<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeModel; 
use App\Models\SeniorHighModel; 
use App\Models\TvetModel; 

class ArchivedApplicationController extends BaseController
{

    public function __construct()
    {
        $db                = db_connect();
        $this->senior_high = new SeniorHighModel($db);
        $this->college     = new CollegeModel($db);
        $this->tvet        = new TvetModel($db);
        $this->uri         = service('uri');
    }
    public function index()
    {
        $data["page_title"] = "Archived Application";
        return view('admin/archived_application', $data);
    }

     
}
