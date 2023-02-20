<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class SeniorHighModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'table_scholarregistration';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "AppNoYear",
        "AppNoID",
        "AppNoSem",
        "AppStatus",
        "AppFirstName",
        "AppMidIn",
        "AppLastName",
        "AppSuffix",
        "AppAddress",
        "AppDOB",
        "AppAge",
        "AppCivilStat",
        "AppGender",
        "AppContact",
        "AppCTC",
        "AppEmailAdd",
        "AppAvailment",
        "AppSchool",
        "AppCourse",
        "AppSchoolAddress",
        "AppYear",
        "AppSem",
        "AppSy",
        "AppFather",
        "AppFatherOccu",
        "AppMother",
        "AppMotherOccu",
        "AppManager",
        "AppImage"
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db      =&   $db;
        $this->builder =    $db->table($this->table);
    }



    public function count()
    {
        $builder = $this->db
            ->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }

    public function count_approved($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where($data)
            ->where('AppStatus', 'approved');
        $query = $builder->countAllResults();
        return $query;
    }
    public function get_application($id)
    {
        // $query = $this->builder 
        //     ->where('id', $id)
        //     ->get()
        //     ->getResult();  
        $query =  $this->asArray()->where('id', $id);
        if ($query->countAllResults()) {
            return $this->asArray()->where('id', $id)->get()->getResult();
        }
    }


    public function get_all($data)
    {
        $query = $this->builder
            ->select('ID, AppSY, AppNoYear, AppNoSem, AppNoID, AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->where($data)
            ->orderBy('id', 'desc')
            ->get()
            ->getResult();
        return $query;
    }

    public function get_pending_application($data)
    {
        $query = $this->builder
            ->select('ID, AppSY,AppNoYear, AppNoSem, AppNoID, AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->where('AppStatus', 'Pending')
            ->where('AppManager', 'Active')
            ->where($data)
            ->orderBy('AppNoID', 'asc')
            ->get()
            ->getResult();
        return $query;
    }

    public function get_approved_application($data)
    {
        $query = $this->builder
            ->select('ID, AppSY, AppNoYear, AppNoSem, AppNoID, AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->Where('(AppStatus = "Approved" or AppStatus = "Additional Approved")')
            ->where('AppManager', 'Active')
            ->where($data)
            ->orderBy('ID', 'asc')  
            ->get()
            ->getResult();
        return $query;
    }


    public function get_report($data, $range)
    {
        $query = $this->builder
            ->select('ID, AppNoYear, AppNoSem, AppNoID, AppAvailment , AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, replace(AppContact," ", "")  as AppContact  , AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->Where('(AppStatus = "Approved" or AppStatus = "Additional Approved")')
            ->where($data)
            ->where(isset($range['AppNoIDFrom']) ? "AppNoID >=  " . $range['AppNoIDFrom'] : "AppManager = 'Active'")
            ->where(isset($range['AppNoIDTo']) ? "AppNoID <=  " . $range['AppNoIDTo'] :  "AppManager = 'Active'")
            ->where('AppManager', 'Active')
            ->orderBy('AppLastName, AppFirstName,AppMidIn', 'asc')
            // ->getCompiledSelect();
            ->get()
            ->getResult();
        return $query;
    }



    public function get_payroll($data, $range)
    {
        $query = $this->builder
            ->select('ID, AppNoYear, AppNoSem, AppNoID, AppAvailment , AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppContact, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->Where('(AppStatus = "Approved" or AppStatus = "Additional Approved")')
            ->where($data)
            ->where(isset($range['AppNoIDFrom']) ? "AppNoID >=  " . $range['AppNoIDFrom'] : "AppManager = 'Active'")
            ->where(isset($range['AppNoIDTo']) ? "AppNoID <=  " . $range['AppNoIDTo'] :  "AppManager = 'Active'")
            ->where('AppManager', 'Active')
            ->orderBy('AppLastName, AppFirstName,AppMidIn', 'asc')
            // ->getCompiledSelect();
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_status($data)
    {
        $query = $this->builder
            ->select('AppStatus as status, count(*) as total')
            ->where($data)
            ->where('AppStatus !=', "")
            ->groupBy('AppStatus')
            ->get()
            ->getResult();
        return $query;
    }
    public function get_tot_by_school($data)
    {
        $query = $this->builder
            ->select('Appschool as school, count(*) as total')
            ->where($data)
            ->where('Appschool !=', "")
            ->groupBy('Appschool')
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_barangay($barangay, $data)
    {
        $query = $this->builder
            ->select('AppAddress as barangay, count(*) as total')
            ->where($data)
            ->like('AppAddress', $barangay, 'both')
            ->get()
            ->getResult();
        return $query;
    }

    public function get_tot_by_gender($data)
    {
        $query = $this->builder
            ->select('AppGender as gender, count(*) as total')
            ->where('AppGender != ', "")
            ->where($data)
            ->groupBy('AppGender')
            ->get()
            ->getResult();
        return $query;
    }

    public function filter($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where(isset($data['sy']) ? "AppSY = '" . $data['sy'] . "'" : "AppManager = 'Active'")
            ->where(isset($data['semester']) ? "AppNoSem = " . $data['semester'] : "AppManager = 'Active'")
            ->where('AppStatus', 'approved');
        $query = $builder->countAllResults();
        return $query;
    }

    public  function get_latest_app_no_id($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->select('AppNoID')
            ->limit(1)
            ->orderBy('id', 'DESC')
            ->where($data);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            return $query->getResultArray()[0]['AppNoID'];
        }
        return 0;
    }

    public function get_total_gender()
    {
        $query = $this->db
            ->table($this->table)
            ->select('table_scholarregistration.AppGender as gender, count(table_scholarregistration.AppGender) as total')
            ->groupBy('AppGender')
            ->get()
            ->getResult();
        return $query;
    }
}
