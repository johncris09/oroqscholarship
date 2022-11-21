<?php

namespace App\Controllers;

use App\Controllers\BaseController; 
use App\Models\CollegeModel;

class CollegeController extends BaseController
{
     
    public function __construct() {
        $db = db_connect();
        $this->college = new CollegeModel($db);
    } 

    public function get_pending_application()
    {
        $res["data"] = $this->college->get_pending_application();
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

            $this->college->update($id, $data);
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
