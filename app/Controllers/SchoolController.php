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

        $school = new SchoolModel();   
        try{ 
            $data = [
                'SchoolName' => $_POST['school_name'],
                'Manager' => $_POST['manager'], 
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

        $school = new SchoolModel();   
        
        $id = $_POST['id'];
        try{  
            $data = [
                'SchoolName' => $_POST['school_name'],
                'Manager' => $_POST['manager'], 
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



    

}
