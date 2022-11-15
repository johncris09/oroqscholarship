<?php

namespace App\Controllers;

use App\Controllers\BaseController; 
use CodeIgniter\Shield\Entities\User; 

class UserController extends BaseController
{
    public function index()
    {     
        $data["page_title"] = "User";
        return view('admin/user', $data); 
    }
 
    
    public function get_all()
    { 
        $user = model('UserModel'); 
        $data['data'] = $user->findAll();
        echo Json_encode($data);  
    } 


}
