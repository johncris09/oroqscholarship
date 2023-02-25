<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthGroupModel;
use App\Models\AuthIdentifierModel;
use CodeIgniter\Shield\Entities\User;
use App\Models\SchoolModel;
use Config\Custom_config;
use App\Models\CollegeSchoolModel;

class UserController extends BaseController
{
    public function index()
    {
        $data["page_title"] = "User";
        $config             = new Custom_config(); 
        $school                 = new SchoolModel();
        $college_school         = new CollegeSchoolModel(); 
        $data['school']         = $school->asArray()->orderBy('schoolname', 'ASC')->findAll();
        $data['college_school'] = $college_school->asArray()->orderBy('colschoolname', 'ASC')->findAll();
        $data['required_field'] = $config->requiredField; 
        return view('admin/user', $data);
    }


    public function get_all()
    {
        $user           = model('UserModel');
        $authgroup      = new AuthGroupModel();
        $authidentities = new AuthIdentifierModel();

        foreach ($user->asArray()->findall() as $row) {
            $data["data"][]   = [
                "id"               => $row['id'], //id
                "firstname"        => $row['firstname'], //firstname
                "middlename"       => $row['middlename'], //middlename
                "lastname"         => $row['lastname'], //lastname
                "username"         => $row['username'], //username
                "created_at"       => $row['created_at'], //created_at
                "active"           => $row['active'], //active
                "scholarship_type" => $row['scholarship_type'], //scholarship_type
                "school"           => $row['school'], //school
                "email"            => $authidentities
                    ->asArray()
                    ->where('user_id', $row['id'])
                    ->where('type ', 'email_password')
                    ->findall()[0]['secret'], //email
                "group"      => $authgroup
                    ->asArray()
                    ->where('user_id', $row['id'])
                    ->findall()[0]['group'], //group
            ];
        }
        echo Json_encode($data);
    }

    public function get($id)
    {
        $user           = model('UserModel');
        $authgroup      = new AuthGroupModel();
        $authidentities = new AuthIdentifierModel();

        foreach ($user->asArray()->where('id', $id)->findall() as $row) {
            $data   = [
                "id"         => $row['id'], //id
                "firstname"  => $row['firstname'], //firstname
                "middlename" => $row['middlename'], //middlename
                "lastname"   => $row['lastname'], //lastname
                "username"   => $row['username'], //username 
                "email"      => $authidentities
                    ->asArray()
                    ->where('user_id', $row['id'])
                    ->where('type ', 'email_password')
                    ->findall()[0]['secret'], //email
                "group"      => $authgroup
                    ->asArray()
                    ->where('user_id', $row['id'])
                    ->findall()[0]['group'], //group
            ];
        }
        echo Json_encode($data);
    }

    public function insert()
    {
        try {
            $users = model('UserModel');
            $user  = new User([
                'lastname'   => $this->request->getPost('lastname'),
                'firstname'  => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'username'   => $this->request->getPost('username'),
                'email'      => $this->request->getPost('email'),
                'password'   => $this->request->getPost('password'),
                'scholarship_type'   => $this->request->getPost('scholarship_type'),
                'school'   => $this->request->getPost('school'),
            ]);

            $users->save($user);

            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($users->getInsertID());


            // Add to default group
            $user->addGroup($this->request->getPost('group'));
            // $users->addToDefaultGroup($user);

            $res = [
                "response" => true,
                "message"  => "Data inserted successfully",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }

    public function update()
    {
        try {
            $users = model('UserModel');
            $user  = $users->findById($this->request->getPost('id'));

            $user->fill([
                'lastname'   => $this->request->getPost('lastname'),
                'firstname'  => $this->request->getPost('firstname'),
                'middlename' => $this->request->getPost('middlename'),
                'username'   => $this->request->getPost('username'),
                'email'      => $this->request->getPost('email'),
            ]);
            $users->save($user);

            $user->syncGroups($this->request->getPost('group'));

            $res = [
                "response" => true,
                "message"  => "Data updated successfully",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }

        echo Json_encode($res);
    }

    public function update_password()
    {
        try {
            $users = model('UserModel');
            $user  = $users->findById($this->request->getPost('id'));

            $user->fill([
                'password' => $this->request->getPost('password'),
            ]);
            $users->save($user);

            $res = [
                "response" => true,
                "message"  => "Password updated successfully",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }

        echo Json_encode($res);
    }

    public function delete($id)
    { 
        try { 
            $users = model('UserModel');
            $users->delete($id, true); 
            $res   = [
                "response" => true,
                "message"  => "Data deleted successfully",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }

    public function checkpassword()
    {  
        $credentials = [
            'email'    => auth()->user()->email,
            'password' => $_POST['password'],
        ];
        
        $validCreds = auth()->check($credentials);
         

        $res = [ "response" => $validCreds->isOK()];
        echo Json_encode($res); 
    }
}
