<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class SeniorHighModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'table_scholarregistration';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
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
        "AppYear",
        "AppSem",
        "AppSy",
        "AppFather",
        "AppFatherOccu",
        "AppMother",
        "AppMotherOccu",
        "AppManager"
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $db; 
    
	public function __construct(ConnectionInterface &$db) {
		$this->db =& $db;
        $this->builder = $db->table($this->table);
	}



    public function count(){  
        $builder = $this->db
            ->table($this->table);
        $query = $builder->countAllResults();
        return $query;  

    }

    public function count_approved(){  
        $builder = $this->db
            ->table($this->table)
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
        if($query->countAllResults()){ 
            return $this->asArray()->where('id', $id)->get()->getResult();  
        }
    }

    
    public function get_all()
    { 
        $query = $this->builder 
            ->select('ID, AppNoYear, AppNoSem, AppNoID, AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')  
            ->orderBy('id', 'desc')
            ->get()
            ->getResult();  
        return $query; 
    }

    public function get_pending_application()
    { 
        $query = $this->builder 
            ->select('ID, AppNoYear, AppNoSem, AppNoID, AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->where('AppStatus', 'Pending')
            ->where('AppManager', 'Active')
            ->orderBy('AppNoID', 'asc')
            ->get()
            ->getResult();  
        return $query; 
    }

    public function get_approved_application()
    { 
        $query = $this->builder 
            ->select('ID, AppNoYear, AppNoSem, AppNoID, AppStatus, AppFirstName, AppMidIn, AppLastName, AppSuffix, AppAddress, AppCourse, AppSchool, AppYear, AppStatus, ')
            ->where('AppStatus', 'Approved')
            ->where('AppManager', 'Active')
            ->orderBy('AppNoID', 'asc')
            ->get()
            ->getResult();  
        return $query; 
    }

}
