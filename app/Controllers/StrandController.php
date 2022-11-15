<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StrandModel;

class StrandController extends BaseController
{
    
    public function index()
    {     
        $data["page_title"] = "Strand";
        return view('admin/strand', $data); 
    }

    public function add()
    { 
        return view('admin/school');
    }


    public function get_all()
    { 
        $strand = new StrandModel();   
        $data['data'] = $strand->findAll();
        echo Json_encode($data);
        
    }

    
    
    public function get($id)
    {  
        $strand = new StrandModel();   
        $data = $strand->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {   

        $strand = new StrandModel();   
        try{ 
            $data = [
                'Strand' => $_POST['strand'],
                'Manager' => $_POST['manager'], 
            ];

            $res =  $strand->save($data); 
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

        $strand = new StrandModel();   
        
        $id = $_POST['id'];
        try{  
            $data = [
                'Strand' => $_POST['strand'],
                'Manager' => $_POST['manager'], 
            ]; 

            $strand->update($id, $data);
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

        $strand = new StrandModel();  
        
        try{  
                        
            $strand->delete($id); 
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
