<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Models;
class AuthLoginController extends BaseController
{
    public function index()
    {     
        $data["page_title"] = "Auth Login";
        return view('admin/authlogin', $data); 
    }
 
    
    public function get_all()
    { 
        $authlogin = model('LoginModel'); 
        $data['data'] = $authlogin->findAll();
        echo Json_encode($data);  
    } 
}
