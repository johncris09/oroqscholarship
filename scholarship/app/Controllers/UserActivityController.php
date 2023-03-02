<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserActivityModel;

class UserActivityController extends BaseController
{
    public function index()
    {
        $data["page_title"] = "User Log";  
        $user_activity = new UserActivityModel();
        $data['logs'] = $user_activity->getLogs(); 
        return view('admin/user_activity', $data);
    } 

}
