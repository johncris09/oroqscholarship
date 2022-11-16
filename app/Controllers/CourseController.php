<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class CourseController extends BaseController
{
    
    public function index()
    {     
        $data["page_title"] = "Course";
        return view('admin/course', $data); 
    } 


    public function get_all()
    { 
        $course = new CourseModel();
        $data['data'] = $course->findAll();
        echo Json_encode($data);
        
    }

    
    
    public function get($id)
    {  
        $course = new CourseModel();
        $data = $course->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {   
        try{ 
            $course = new CourseModel();
            $data = [
                'colCourse' => $this->request->getPost('course'),
                'colManager' => $this->request->getPost('manager'),
            ];

            $res =  $course->save($data); 
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
            $id = $_POST['id'];
            $course = new CourseModel();   
            $data = [
                'colCourse' => $this->request->getPost('course'),
                'colManager' => $this->request->getPost('manager'),
            ];

            $course->update($id, $data);
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
            $course = new CourseModel();         
            $course->delete($id); 
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
