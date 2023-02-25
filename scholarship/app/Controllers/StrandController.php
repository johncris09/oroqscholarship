<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StrandModel;
use Config\Custom_config;

class StrandController extends BaseController
{

    public function index()
    {
        $data["page_title"]     = "Strand";
        $config                 = new Custom_config();
        $data['required_field'] = $config->requiredField; 
        return view('admin/strand', $data);
    }



    public function get_all()
    {
        $strand       = new StrandModel(); 
        $data['data'] = $strand->orderBy('strand', 'asc')->findAll(); 
        echo Json_encode($data);
    }



    public function get($id)
    {
        $strand = new StrandModel();
        $data   = $strand->find($id);
        echo Json_encode($data);
    }

    public function insert()
    {
        $strand = new StrandModel();
        try {
            $data = [
                'Strand'  => $this->request->getPost('strand'),
                'Manager' => $this->request->getPost('manager'),
            ];

            $res =  $strand->save($data);
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
            $strand = new StrandModel();
            $id     = $this->request->getPost('id');
            $data   = [
                'Strand'  => $this->request->getPost('strand'),
                'Manager' => $this->request->getPost('manager'),
            ];

            $strand->update($id, $data);
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


    public function delete($id)
    {
        try {
            $strand = new StrandModel();
            $strand->delete($id);
            $res    = [
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
}
