<?php

namespace App\Controllers;

use App\Controllers\BaseController;  
use App\Models\TvetModel;

class TvetController extends BaseController
{
     
    public function __construct() {
        $db = db_connect();
        $this->tvet = new TvetModel($db);
    } 

    public function get_all()
    {
        $data["data"] = $this->tvet->get_all();
        echo json_encode($data);
    }

    public function get_pending_application()
    {
        $res["data"] = $this->tvet->get_pending_application();
        echo Json_encode($res);
    }

    public function get_approved_application()
    {
        $res["data"] = $this->tvet->get_approved_application();
        echo Json_encode($res);
    }

    
    public function update()
    {   
        $res = $_POST;
        try{   
            $id = $this->request->getPost('id');
            $data = [
                'colAppStat' => $this->request->getPost('status'), 
            ]; 

            $this->tvet->update($id, $data);
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
