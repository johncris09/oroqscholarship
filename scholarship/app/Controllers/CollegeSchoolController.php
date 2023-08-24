<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeSchoolModel;
use App\Models\UserActivityModel;
use PHPUnit\Util\Json;

#[\AllowDynamicProperties]
class CollegeSchoolController extends BaseController
{


    public function index()
    {
        $data["page_title"] = "College School";
        return view('admin/college_school', $data);
    }

    public function get_all()
    {
        $school       = new CollegeSchoolModel();
        $data['data'] = $school->orderBy('school_name', 'asc')->findAll();
        echo Json_encode($data);
    }



    public function get($id)
    {
        $school = new CollegeSchoolModel();
        $data   = $school->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {
        try {
            $school = new CollegeSchoolModel();
            $data = [
                'school_name'  => ucwords(trim($this->request->getPost('school_name'))),
                'abbreviation' => trim($this->request->getPost('abbreviation')),
                'address'      => ucwords(trim($this->request->getPost('address'))),
                'manager'      => $this->request->getPost('manager'),
            ];

            $res =  $school->save($data);
            $res = [
                "response" => true,
                "message"  => "Data inserted successfully",
            ];

            
            $activity_model = new UserActivityModel();
            $school_name = $data['school_name'];
            $activity_model->addLog(auth()->user()->id, 'Created a new college school name (\''.$school_name.'\')');


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

            $school = new CollegeSchoolModel();
            $id     = $this->request->getPost('id');

            $data = [
                'school_name' => ucwords(trim($this->request->getPost('school_name'))), 
                'abbreviation' => trim($this->request->getPost('abbreviation')),
                'address'       => ucwords(trim($this->request->getPost('address'))),
                'manager'    => $this->request->getPost('manager'),
            ];

            $school->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Data updated successfully",
            ];
 
            $activity_model = new UserActivityModel();
            $school_name = $data['school_name'];
            $activity_model->addLog(auth()->user()->id, 'Updated a new college school name (\''.$school_name.'\')');
 

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
            $school = new CollegeSchoolModel();
            $school->delete($id);
            $res = [
                "response" => true,
                "message"  => "Data deleted successfully",
            ]; 
            // Activty Log
            $activity_model = new UserActivityModel(); 
            $activity_model->addLog(auth()->user()->id, 'Deleted a college school with the id of \''.$id.'\'');
 

        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }
}
