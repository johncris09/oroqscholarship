<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeniorHighModel;

class SeniorHighController extends BaseController
{
        
    public function __construct() {
        $db = db_connect();
        $this->senior_high = new SeniorHighModel($db);
    } 

    public function get_pending_application()
    {
        $res["data"] = $this->senior_high->get_pending_application();
        echo Json_encode($res);
    }
}
