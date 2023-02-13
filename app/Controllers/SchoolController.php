<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SchoolModel;
use PHPUnit\Util\Json;

class SchoolController extends BaseController
{
    

    public function index()
    {     
        $data["page_title"] = "School";
        return view('admin/school', $data); 
    }
    public function add()
    {   
        return view('admin/school'); 
    }

    
    public function get_all()
    { 
        $school = new SchoolModel();   
        $data['data'] = $school->findAll();
        echo Json_encode($data);
        
    }

    
    
    public function get($id)
    {  
        $school = new SchoolModel();   
        $data = $school->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {   

        try{ 
            $school = new SchoolModel();   
            $data = [ 
                'SchoolName' => ucwords(trim($this->request->getPost('school_name'))),
                'address' => ucwords(trim($this->request->getPost('address'))),
                'Manager' => $this->request->getPost('manager'),
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
            
            $school = new SchoolModel();    
            $id = $this->request->getPost('id');

            $data = [
                'SchoolName' => ucwords(trim($this->request->getPost('school_name'))),
                'address' => ucwords(trim($this->request->getPost('address'))),
                'Manager' => $this->request->getPost('manager'),
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
            $school = new SchoolModel();            
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
