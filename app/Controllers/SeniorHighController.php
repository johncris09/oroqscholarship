<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeniorHighModel;

class SeniorHighController extends BaseController
{
        
    public function __construct() {
        $db = db_connect();
        $this->senior_high = new SeniorHighModel($db);
    } 

    public function get_all()
    {
        $data["data"] = $this->senior_high->get_all();
        echo json_encode($data);
    }

    public function get_pending_application()
    {
        $res["data"] = $this->senior_high->get_all();
        echo Json_encode($res);
    }

    public function get_approved_application()
    {
        $res["data"] = $this->senior_high->get_approved_application();
        echo Json_encode($res);
    }

    public function update()
    {   
        try{   
            $id = $this->request->getPost('id');
            $data = [
                'AppStatus' => $this->request->getPost('status'), 
            ]; 

            $this->senior_high->update($id, $data);
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
