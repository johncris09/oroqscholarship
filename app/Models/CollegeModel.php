<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CollegeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'table_collegeapp';
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
        "colSchoolAddress",
        "colImage"
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
    
    public function get_report($data, $range)
    {   
        $query = $this->builder 
            ->select('ID, colAppNoYear, colAppNoSem, colContactNo, colAvailment ,  colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ')
            ->where($data, "both")
            ->where(isset($range['colAppNoIDFrom']) ? "colAppNoID >=  " .$range['colAppNoIDFrom'] : "colManager = 'Active'")
            ->where(isset($range['colAppNoIDTo']) ? "colAppNoID <=  " .$range['colAppNoIDTo'] :  "colManager = 'Active'") 
            ->where('colManager', 'Active')
            ->orderBy('colLastName, colFirstName, colMI', 'asc') 
            // ->getCompiledSelect();
            ->get()
            ->getResult();  
        return $query;
    }

    
    public function get_tot_by_status()
    {
        $query = $this->builder 
            ->select('colAppStat as status, count(*) as total')  
            ->groupBy('colAppStat')  
            ->get()
            ->getResult();  
        return $query;
    }

    
    public function get_tot_by_school()
    {
        $query = $this->builder 
            ->select('colschool as school, count(*) as total')  
            ->where('colSchool != ', "")
            ->groupBy('colschool')  
            ->get()
            ->getResult();  
        return $query;
    }

     
    public function get_tot_by_barangay($barangay)
    {
        $query = $this->builder 
            ->select('colAddress as barangay, count(*) as total')  
            ->like('colAddress', $barangay, 'both')
            ->get()
            ->getResult();  
        return $query;
    }

    
    public function get_tot_by_gender()
    {
        $query = $this->builder 
            ->select('colGender as gender, count(*) as total')  
            ->where('colGender != ', "")
            ->groupBy('colGender')  
            ->get()
            ->getResult();  
        return $query;
    }

    public function filter($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where(isset($data['sy']) ? "colSY = '" .$data['sy'] ."'": "colManager = 'Active'")
            ->where(isset($data['semester']) ? "colAppNoSem = " .$data['semester'] : "colManager = 'Active'")
            ->where('colAppStat', 'approved');
        $query = $builder->countAllResults();
        return $query;  
    }
    
    public  function get_latest_app_no_id($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->select('colAppNoID')
            ->limit(1)
            ->orderBy('id', 'DESC')
            ->where($data); 
        $query =$builder->get() ;
        if($query->getNumRows() > 0){
            return $query->getResultArray()[0]['colAppNoID'];
        }
        return 0;
    }

}
