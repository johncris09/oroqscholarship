<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserActivityModel;

#[\AllowDynamicProperties]
class UserActivityController extends BaseController
{
    public function index()
    {
        $data["page_title"] = "User Log";  
        return view('admin/user_activity', $data);
    } 

    
    public function get_all()
    { 
        $user_activity    = model('UserActivityModel');
        $data['data'] = $user_activity->get_all();
        echo Json_encode($data);
    }


}
