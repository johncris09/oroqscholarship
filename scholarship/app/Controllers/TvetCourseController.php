<?php

namespace App\Controllers;

use App\Controllers\BaseController; 
use App\Models\TvetCourseModel;
use Config\Custom_config;
use App\Models\UserActivityModel;

class TvetCourseController extends BaseController
{

    public function index()
    {
        $data["page_title"]     = "Tvet Course";
        $config                 = new Custom_config();
        $data['required_field'] = $config->requiredField; 
        return view('admin/tvet_course', $data);
    }


    public function get_all()
    {
        $course                 = new TvetCourseModel(); 
        $data['data'] = $course->orderBy('course', 'asc')->findAll(); 
        echo Json_encode($data);
    }



    public function get($id)
    {
        $course = new TvetCourseModel();
        $data   = $course->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {
        try {
            $course = new TvetCourseModel();
            $data = [
                'course'  => $this->request->getPost('course'),
                'manager' => $this->request->getPost('manager'),
            ];

            $res =  $course->save($data);
            $res = [
                "response" => true,
                "message"  => "Data inserted successfully",
            ];

            $activity_model = new UserActivityModel(); 
            $course = $data['course'];
            $activity_model->addLog(auth()->user()->id, 'Created a new course (\''.$course.'\')');

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
            $course = new TvetCourseModel();
            $id     = $this->request->getPost('id');
            $data = [
                'course'  => $this->request->getPost('course'),
                'manager' => $this->request->getPost('manager'),
            ];

            $course->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Data updated successfully",
            ];

            // Activty Log
            $activity_model = new UserActivityModel();
            $course = $data['course'];
            $activity_model->addLog(auth()->user()->id, 'Updated a course of \''.$course.'\'');

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
            $course = new TvetCourseModel();
            $course->delete($id);
            $res = [
                "response" => true,
                "message"  => "Data deleted successfully",
            ]; 

            // Activty Log
            $activity_model = new UserActivityModel(); 
            $activity_model->addLog(auth()->user()->id, 'Deleted a course with the id of \''.$id.'\'');
 
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }
}
