<?php

namespace App\Controllers;

use App\Controllers\BaseController; 
use App\Models\CollegeModel;

class CollegeController extends BaseController
{
     
    public function __construct() {
        $db = db_connect();
        $this->college = new CollegeModel($db);
    } 

    public function get_all()
    {
        $data["data"] = $this->college->get_all();
        echo json_encode($data);
    }
    
    public function get_pending_application()
    {
        $res["data"] = $this->college->get_pending_application();
        echo Json_encode($res);
    }

    public function get_approved_application()
    {
        $res["data"] = $this->college->get_approved_application();
        echo Json_encode($res);
    }

    
    public function update_status()
    {   
        try{   
            $id = $this->request->getPost('id');
            $data = [
                'AppStatus' => $this->request->getPost('status'), 
            ]; 

            $this->college->update($id, $data);
            $res = [
                "response" =>  true,
                "message" =>  "Changes has been saved!", 
            ];

        } catch (\Exception $e) {  
            $res = [
                "response" =>  false,
                "message" =>   $e->getMessage() , 
            ]; 
        } 
        echo Json_encode($res);
    }


    
    public function update()
    {    
        try{   
            $id = $this->request->getPost('id'); 
            $data = [
                "colAppNoYear" => $this->request->getPost('app_no_year'),
                "colAppNoSem" => $this->request->getPost('app_no_sem'),
                "colAppNoID" => $this->request->getPost('app_no_id'),
                "colAppStat"  => $this->request->getPost('status'),
                "colFirstName" => trim($this->request->getPost('firstname')),
                "colMI" => trim($this->request->getPost('middlename')),
                "colLastName" => trim($this->request->getPost('lastname')),
                "colSuffix" => trim($this->request->getPost('suffix')),
                "colAddress" => $this->request->getPost('address'),
                "colDOB" => $this->request->getPost('birthdate'),
                "colAge" => $this->request->getPost('age'),
                "colCivilStat" => $this->request->getPost('civil_status'),
                "colGender"  => $this->request->getPost('gender'),
                "colContactNo"  =>  trim($this->request->getPost('contact_no')),
                "colCTC" => trim($this->request->getPost('ctc_no')),
                "colEmailAdd" => trim($this->request->getPost('email')),
                "colAvailment" => trim($this->request->getPost('availment')),
                "colSchool" => $this->request->getPost('school'),
                "colCourse"  => $this->request->getPost('course'),
                "colYearLevel" => $this->request->getPost('year_level'),
                "colSem" => $this->request->getPost('semester'),
                "colSY" => $this->request->getPost('school_year'),
                "colFathersName"=> trim($this->request->getPost('father_name')),
                "colFatherOccu" => trim($this->request->getPost('father_occupation')),
                "colMothersName" => trim($this->request->getPost('mother_name')),
                "colMotherOccu" => trim($this->request->getPost('mother_occupation')),
                "colManager"  => trim($this->request->getPost('manager')),
                "colUnits"  => trim($this->request->getPost('units')),
                "colSchoolAddress"  => trim($this->request->getPost('school_address')),
            ];


            $this->college->update($id, $data);
            $res = [
                "response" =>  true,
                "message" =>  "Changes has been saved!", 
            ];

        } catch (\Exception $e) {  
            $res = [
                "response" =>  false,
                "message" =>   $e->getMessage() , 
            ]; 
        } 
        echo Json_encode($res);
    }


    
    public function archived_application()
    {   
        try{   
            $id = $this->request->getPost('id');
            $data = [
                'colManager' => $this->request->getPost('manager'),
            ]; 

            $this->college->update($id, $data);
            $res = [
                "response" =>  true,
                "message" =>  "Changes has been saved!", 
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
