<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeSchoolModel;
use PHPUnit\Util\Json;

class CollegeSchoolController extends BaseController
{
    

    public function index()
    {     
        $data["page_title"] = "College School";
        return view('admin/college_school', $data); 
    } 

    public function get_all()
    { 
        $school = new CollegeSchoolModel();
        $data['data'] = $school->findAll();
        echo Json_encode($data);
        
    }

    
    
    public function get($id)
    {  
        $school = new CollegeSchoolModel();   
        $data = $school->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {   

        try{ 
            $school = new CollegeSchoolModel();   
            $data = [
                'colSchoolName' => ucwords(trim($this->request->getPost('school_name'))),
                'address' => ucwords(trim($this->request->getPost('address'))),
                'colManager' => $this->request->getPost('manager'),
            ];

            $res =  $school->save($data); 
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

    
    public function update()
    {   

        try{  
            
            $school = new CollegeSchoolModel();    
            $id = $this->request->getPost('id');

            $data = [
                'colSchoolName' => ucwords(trim($this->request->getPost('school_name'))),
                'address' => ucwords(trim($this->request->getPost('address'))),
                'colManager' =>  $this->request->getPost('manager'),
            ]; 

            $school->update($id, $data);
            $res = [
                "response" =>  true,
                "message" =>  "Data updated successfully", 
            ];

        } catch (\Exception $e) {  
            $res = [
                "response" =>  false,
                "message" =>   $e->getMessage() , 
            ]; 
        } 
        echo Json_encode($res);
    }


    public function delete($id)
    {   

        
        try{  
            $school = new CollegeSchoolModel();            
            $school->delete($id); 
            $res = [
                "response" =>  true,
                "message" =>  "Data deleted successfully", 
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
