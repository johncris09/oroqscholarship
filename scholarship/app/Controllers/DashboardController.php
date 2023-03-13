<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CollegeModel;
use App\Models\SeniorHighModel;
use App\Models\TvetModel;
use App\Models\ConfigModel;

class DashboardController extends BaseController
{


    public function __construct()
    {
        $db                  = db_connect();
        $this->senior_high   = new SeniorHighModel($db);
        $this->college       = new CollegeModel($db);
        $this->tvet          = new TvetModel($db);
        $this->custom_config = new \Config\Custom_config();
        $this->config_model  = new ConfigModel($db);
    }

    public function index()
    {
        $config   = $this->config_model->asArray()->where('id', 1)->findAll()[0];
        $shs_data = [];
        $college_tvet_data = [];
        if (isset($_GET['view'])) {
            if ($_GET['view'] == "all") {
                $shs_data          = [];
                $college_tvet_data = [];
            }
        } else {
            if (isset($_GET['app_sem'])) {
                if (!empty($_GET['app_sem'])) {
                    $shs_data['appnosem']             = $_GET['app_sem'];
                    $college_tvet_data['appnosem'] = $_GET['app_sem'];
                } else {
                    $shs_data = [];
                }
            } else {
                $shs_data['appnosem']             = $config['current_sem'];
                $shs_data['appsem']               = $config['current_sem'] == 1 ? "1st": "2nd";
                $college_tvet_data['appnosem'] = $config['current_sem'];
                $college_tvet_data['appsem']      = $config['current_sem'] == 1 ? "1st" : "2nd";
            }
            $shs_data['appsy']          = (isset($_GET['app_year'])) ? $_GET['app_year']: $config['current_sy'];
            $college_tvet_data['appsy'] = (isset($_GET['app_year'])) ? $_GET['app_year']: $config['current_sy'];
        }
        $data["page_title"]               = "Dashboard";
        $data['tot_approved_shs']         = $this->senior_high->count_application($shs_data); 
        $data['tot_approved_college']     = $this->college->count_application($college_tvet_data); 
        $data['tot_approved_tvet']        = $this->tvet->count_application($college_tvet_data); 

        $data["scholarship_status"]       = $this->scholarship_status($shs_data, $college_tvet_data);
        $data["total_scholarship_status"] = $this->get_total_scholarship_status($shs_data, $college_tvet_data);
        // print_r($data['total_scholarship_status']);
        $data["shs_gender"]               = $this->scholarship_shs_gender($shs_data);
        $data["college_gender"]           = $this->scholarship_college_gender($college_tvet_data);
        $data["tvet_gender"]              = $this->scholarship_tvet_gender($college_tvet_data);
        $data["scholarship_barangay"]     = $this->scholarship_barangay($shs_data, $college_tvet_data);
        $data["shs_school"]               = $this->get_by_shs_school($shs_data, $college_tvet_data);
        $data["college_school"]           = $this->get_by_college_school($college_tvet_data);
        $data["tvet_school"]              = $this->get_by_tvet_school($college_tvet_data);
        $data['total_gender']             = $this->get_total_gender($shs_data, $college_tvet_data);
        return view('admin/dashboard', $data);
    }


    

    public function scholarship_status($shs_data, $college_tvet_data)
    {

        $shs_approved        = $this->senior_high->get_tot_approved($shs_data);
        $shs_disapproved     = $this->senior_high->get_tot_disapproved($shs_data);
        $shs_pending         = $this->senior_high->get_tot_pending($shs_data);

        $college_approved    = $this->college->get_tot_approved($college_tvet_data);
        $college_disapproved = $this->college->get_tot_disapproved($college_tvet_data);
        $college_pending     = $this->college->get_tot_pending($college_tvet_data);

        $tvet_approved       = $this->tvet->get_tot_approved($college_tvet_data);
        $tvet_disapproved    = $this->tvet->get_tot_disapproved($college_tvet_data);
        $tvet_pending        = $this->tvet->get_tot_pending($college_tvet_data); 
 
        $data = [
            "approved"    => [$shs_approved, $college_approved, $tvet_approved],
            "disapproved" => [$shs_disapproved, $college_disapproved, $tvet_disapproved],
            "pending"     => [$shs_pending, $college_pending, $tvet_pending], 
        ];
        return $data;
    }


    

    public function get_total_scholarship_status($shs_data, $college_tvet_data)
    {

        $shs_approved        = $this->senior_high->get_tot_approved($shs_data);
        $shs_disapproved     = $this->senior_high->get_tot_disapproved($shs_data);
        $shs_pending         = $this->senior_high->get_tot_pending($shs_data);

        $college_approved    = $this->college->get_tot_approved($college_tvet_data);
        $college_disapproved = $this->college->get_tot_disapproved($college_tvet_data);
        $college_pending     = $this->college->get_tot_pending($college_tvet_data);

        $tvet_approved       = $this->tvet->get_tot_approved($college_tvet_data);
        $tvet_disapproved    = $this->tvet->get_tot_disapproved($college_tvet_data);
        $tvet_pending        = $this->tvet->get_tot_pending($college_tvet_data); 
 
        $data = [
            [
                "status" => "approved",
                "total" => $shs_approved+$college_approved+$tvet_approved,
            ],
            [
                "status" => "disapproved",
                "total" => $shs_disapproved+$college_disapproved+$tvet_disapproved,
            ],
            [
                "status" => "pending",
                "total" => $shs_pending+$college_pending+$tvet_pending,
            ], 
        ];
        return $data;
    }
 


    public function get_total_gender($shs_data, $college_tvet_data)
    {

        $shs     = $this->senior_high->get_tot_by_gender($shs_data);
        $college = $this->college->get_tot_by_gender($college_tvet_data);
        $tvet    = $this->tvet->get_tot_by_gender($college_tvet_data); 
        $male    = $female = 0;

        foreach ($shs as $row) {
            if (strtolower($row->gender) == "male") {
                $male += $row->total;
            }
            if (strtolower($row->gender) == "female") {
                $female += $row->total;
            }
        }

        foreach ($college as $row) {
            if (strtolower($row->gender) == "male") {
                $male += $row->total;
            }
            if (strtolower($row->gender) == "female") {
                $female += $row->total;
            }
        }

        foreach ($tvet as $row) {
            if (strtolower($row->gender) == "male") {
                $male += $row->total;
            }
            if (strtolower($row->gender) == "female") {
                $female += $row->total;
            }
        }

        $data =  array(
            (object) [
                "gender" => "Male",
                "total"  => $male
            ],
            (object) [
                "gender" => "Female",
                "total"  => $female
            ],
        );
        return $data;
    }


    public function scholarship_shs_gender($data)
    {
        $data  = $this->senior_high->get_tot_by_gender($data);
        return $data;
    }

    public function scholarship_college_gender($data)
    {
        $data  = $this->college->get_tot_by_gender($data);
        return $data;
    }
    public function scholarship_tvet_gender($data)
    {
        $data  = $this->tvet->get_tot_by_gender($data);
        return $data;
    }

    public function get_by_shs_school($shs_data)
    {

        $shs  = $this->senior_high->get_tot_by_school($shs_data);
        $data = [];
        foreach ($shs as $row) {
            $data['school'][] = $row->school;
            $data['total'][]  = $row->total;
        }
        return $data;
    }


    public function get_by_college_school($college_tvet_data)
    {


        $college = $this->college->get_tot_by_school($college_tvet_data);
        $data    = [];
        foreach ($college as $row) {
            $data['school'][] = $row->school;
            $data['total'][]  = $row->total;
        }
        return $data;
    }


    public function get_by_tvet_school($college_tvet_data)
    {
        $tvet = $this->tvet->get_tot_by_school($college_tvet_data);
        $data = [];
        foreach ($tvet as $row) {
            $data['school'][] = $row->school;
            $data['total'][]  = $row->total;
        }
        return $data;
    }



    public function scholarship_barangay($shs_data, $college_tvet_data)
    { 
        $barangay = $this->custom_config->barangay;
        $data     = [];
        foreach ($barangay as $brgy) {
            $data['barangay'][] = $brgy; 
            $shs                = $this->senior_high->get_tot_by_barangay($brgy, $shs_data);
            foreach ($shs as $shs) {
                $data['shs'][]  = $shs->total;
            }
            $college  = $this->college->get_tot_by_barangay($brgy, $college_tvet_data);
            foreach ($college as $college) {
                $data['college'][]  = $college->total;
            }
            $tvet  = $this->tvet->get_tot_by_barangay($brgy, $college_tvet_data);
            foreach ($tvet as $tvet) {
                $data['tvet'][]  = $tvet->total;
            }
        }
        return $data;
    }

    public function filter()
    { 
        $data['shs_total']     = $this->shs_filter($_GET);
        $data['college_total'] = $this->college_filter($_GET);
        $data['tvet_total']    = $this->tvet_filter($_GET); 
        echo json_encode($data);
    }

    public function shs_filter($data)
    {
        if (isset($_POST['sy']) && !empty($_POST['sy'])) {
            $data['sy'] = $_POST['sy'];
        }
        if (isset($_POST['semester']) && !empty($_POST['semester'])) {
            $data['semester'] = $_POST['semester'];
        }

        return  $this->senior_high->filter($data);
    }
    public function college_filter($data)
    {
        if (isset($_POST['sy']) && !empty($_POST['sy'])) {
            $data['sy'] = $_POST['sy'];
        }
        if (isset($_POST['semester']) && !empty($_POST['semester'])) {
            $data['semester'] = $_POST['semester'];
        }

        return  $this->college->filter($data);
    }
    public function tvet_filter($data)
    {
        if (isset($_POST['sy']) && !empty($_POST['sy'])) {
            $data['sy'] = $_POST['sy'];
        }
        if (isset($_POST['semester']) && !empty($_POST['semester'])) {
            $data['semester'] = $_POST['semester'];
        }

        return  $this->tvet->filter($data);
    }
}
