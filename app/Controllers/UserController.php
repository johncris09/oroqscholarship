<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthGroupModel;
use App\Models\AuthIdentifierModel;
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
        $authgroup = new AuthGroupModel();
        $authidentities = new AuthIdentifierModel(); 
        
        foreach($user->asArray()->findall() as $row){ 
            $data["data"][]   = [
                "id" => $row['id'], //id
                "firstname" => $row['firstname'], //firstname
                "middlename" => $row['middlename'], //middlename
                "lastname" => $row['lastname'], //lastname
                "username" => $row['username'], //username
                "created_at" => $row['created_at'], //created_at
                "active" => $row['active'], //active
                "email" => $authidentities
                            ->asArray()
                            ->where('user_id', $row['id'])
                            ->where('type ', 'email_password')
                            ->findall()[0]['secret'], //email
                "group" => $authgroup
                            ->asArray()
                            ->where('user_id', $row['id'])
                            ->findall()[0]['group'], //group
            ];  

        }
        echo Json_encode($data);  
    }
    
    public function get($id)
    {  
        $user = model('UserModel'); 
        $data = $user->findById($id); 
        echo Json_encode($data);
    }

    public function insert()
    {   
        try{ 
            $users = model('UserModel');
            $user = new User([  
                'lastname' => $this->request->getPost('lastname'),
                'firstname' => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ]);
            
            $users->save($user);

            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($users->getInsertID());
 
            
            // Add to default group
            $user->addGroup($this->request->getPost('group'));
            // $users->addToDefaultGroup($user);

            $res = [
                "response" =>  true,
                "message" =>  "Data inserted successfully", 
            ];
        } catch (\Exception $e) {  
            $res = [
                "response" =>  false,
                "message" =>   $e->getMessage() , 
            ]; 
        } 
        echo Json_encode($res); 

    }


}
