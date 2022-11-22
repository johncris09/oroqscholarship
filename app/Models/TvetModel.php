<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class TvetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'table_tvet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "colAppNoYear",
        "colAppNoID",
        "colAppNoSem",
        "colAppStat",
        "colFirstName",
        "colMI",
        "colLastName",
        "colSuffix",
        "colAddress",
        "colDOB",
        "colAge",
        "colCivilStat",
        "colGender",
        "colContactNo",
        "colCTC",
        "colEmailAdd",
        "colAvailment",
        "colSchool",
        "colCourse",
        "colYearLevel",
        "colSem",
        "colSY",
        "colFathersName",
        "colFatherOccu",
        "colMothersName",
        "colMotherOccu",
        "colManager",
        "colUnits",
        "colSchoolAddress"
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
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;  
    }

    public function count_approved(){  
        $builder = $this->db
            ->table($this->table)
            ->where('colAppStat', 'approved');
        $query = $builder->countAllResults();
        return $query;  

    }

    public function get_all()
    { 
        $query = $this->builder 
            ->select('ID, colAppNoYear, colAppNoSem, colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ') 
            ->orderBy('colAppNoID', 'desc')
            ->get()
            ->getResult();  
        return $query; 
    }

    public function get_pending_application()
    { 
        $query = $this->builder 
            ->select('ID, colAppNoYear, colAppNoSem, colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ')
            ->where('colAppStat', 'Pending')
            ->where('colManager', 'Active')
            ->orderBy('colAppNoID', 'asc')
            ->get()
            ->getResult();  
        return $query; 
    }

    public function get_approved_application()
    { 
        $query = $this->builder 
            ->select('ID, colAppNoYear, colAppNoSem, colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ')
            ->where('colAppStat', 'Approved')
            ->where('colManager', 'Active')
            ->orderBy('colAppNoID', 'asc')
            ->get()
            ->getResult();  
        return $query; 
    }
}
