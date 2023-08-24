<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ConfigModel;
use Config\Custom_config;

#[\AllowDynamicProperties]
class ManageScholarship extends BaseController
{
    public function __construct()
    {
        $db                 = db_connect();
        $this->config_model = new ConfigModel($db);
    }


    public function index()
    {
        $config               = new Custom_config;
        $data["page_title"]   = "Manage Scholarship";
        $data['year_started'] = $config->year_started;
        $data["config"]       = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        return view('admin/manage_scholarship', $data);
    }

    public function semester_closed()
    {
        try {
            $id = 1;
            $data = [
                "semester_closed" => $this->request->getPost('semester_closed'),
            ];
            $this->config_model->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }

    public function update_sy()
    {
        try {
            $id = 1;
            $data = [
                "current_sy" => $this->request->getPost('current_sy'),
            ];
            $this->config_model->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
            ];
        } catch (\Exception $e) {
            $res = [
                "response" => false,
                "message"  => $e->getMessage(),
            ];
        }
        echo Json_encode($res);
    }

    public function update_sem()
    {
        try {
            $id = 1;
            $data = [
                "current_sem" => $this->request->getPost('current_sem'),
            ];
            $this->config_model->update($id, $data);
            $res = [
                "response" => true,
                "message"  => "Changes has been saved!",
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
