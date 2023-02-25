<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CollegeModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'table_collegeapp';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
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
        $this->db       =&  $db;
        $this->builder  =   $db->table($this->table);
    }



    public function count()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }
    
    public function count_application($data)
    {
        $builder = $this->db
            ->table($this->table) 
            ->where($data) 
            ->where('colManager', 'Active');
        $query = $builder->countAllResults();
        return $query;
    }


    
    // Approved 
    public function get_tot_approved($data)
    {
        $builder = $this->db
            ->table($this->table) 
            ->like('colAppStat', 'approved', 'both' )
            ->where('colAppStat !=', 'disapproved')
            ->where($data)
            ->where('colManager', 'Active');
        $query = $builder->countAllResults();
        return $query;
    }

    
    // Disapproved
    public function get_tot_disapproved($data)
    {
        $builder = $this->db
            ->table($this->table)  
            ->where('colAppStat', 'disapproved')
            ->where($data)
            ->where('colManager', 'Active');
        $query = $builder->countAllResults();
        return $query; 
    } 

    // Pending
    public function get_tot_pending($data)
    {
        $builder = $this->db
            ->table($this->table)  
            ->where('colAppStat', 'pending')
            ->where($data)
            ->where('colManager', 'Active');
        $query = $builder->countAllResults();
        return $query; 
    }




    public function count_approved($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where($data)
            ->Where('(colAppStat = "Approved" or colAppStat = "Additional Approved")');
        $query = $builder->countAllResults();
        return $query;
    }


    public function get_all($data)
    {
        $query = $this->builder
            ->select('ID, colSY, colAppNoYear, colAppNoSem, colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ')
            ->where($data)
            ->orderBy('colAppNoID', 'desc')
            ->get()
            ->getResult();
        return $query;
    }


    public function get_pending_application($data)
    {
        $query = $this->builder
            ->select('ID, colSY,  colAppNoYear, colAppNoSem, colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ')
            ->where('colAppStat', 'Pending')
            ->where('colManager', 'Active')
            ->where($data)
            ->orderBy('colAppNoID', 'asc')
            ->get()
            ->getResult();
        return $query;
    }

    public function get_approved_application($data)
    {
        $query = $this->builder
            ->select('ID, colSY, colAppNoYear, colAppNoSem, colAppNoID, colAppStat, colFirstName, colMI, colLastName, colSuffix, colAddress, colCourse, colSchool, colYearLevel, ')
            ->Where('(colAppStat = "Approved" or colAppStat = "Additional Approved")')
            ->where('colManager', 'Active')
            ->where($data)
            ->orderBy('colAppNoID', 'asc')
            ->get()
            ->getResult();
        return $query;
    }
 

    public function generate($school, $status, $sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM table_collegeapp 
            WHERE colSchool LIKE "'.$school.'%" 
            AND colAppStat LIKE "'.$status.'%"
            AND colSY LIKE "'.$sy.'%"  
            AND colSem LIKE "'.$sem.'%"  
            AND colAvailment LIKE "'.$availment.'%"
            AND colGender LIKE "'.$gender.'%"
            AND colYearLevel LIKE "'.$year_level.'%"
            AND colAddress LIKE "'.$address.'%" 
            AND colManager = "Active"
            ORDER BY colLastName, colFirstName and colMI
        '; 

        $query = $this->db->query($query_string);
        
        return $query->getResult(); 
    }

    

    public function between($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status, $sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM table_collegeapp 
            WHERE colAppnoID BETWEEN "'.$appnoidfrom.'" 
            AND "'.$appnoidto.'" 
            HAVING colAppNoYear LIKE "'.$appnoyear.'%"  
            AND colAppNoSem LIKE "'.$appnosem.'%" 
            AND colSchool LIKE "'.$school.'%" 
            AND colSem LIKE "'.$sem.'%" 
            AND colSY LIKE "'.$sy.'%"  
            AND colAvailment LIKE "'.$availment.'%"
            AND colGender LIKE "'.$gender.'%"
            AND colYearLevel LIKE "'.$year_level.'%"
            AND colAddress LIKE "'.$address.'%" 
            AND colAppStat LIKE "'.$status.'%"
            AND colManager="Active"
            ORDER BY colAppNoID
        '; 

        $query = $this->db->query($query_string);
        
        return $query->getResult(); 
    }
    
    public function generate_payroll($school, $sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM table_collegeapp 
            WHERE colSchool LIKE "'.$school.'%"  
            AND colSY LIKE "'.$sy.'%"  
            AND colSem LIKE "'.$sem.'%"  
            AND colAvailment LIKE "'.$availment.'%"
            AND colGender LIKE "'.$gender.'%"
            AND colYearLevel LIKE "'.$year_level.'%"
            AND colAddress LIKE "'.$address.'%" 
            AND (colAppStat = "Approved" or colAppStat = "Additional Approved")
            AND colManager = "Active"
            ORDER BY colLastName, colFirstName and colMI
        '; 

        $query = $this->db->query($query_string);
        
        return $query->getResult(); 
    }


    
    public function between_payroll($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school,  $sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM table_collegeapp 
            WHERE colAppnoID BETWEEN "'.$appnoidfrom.'" 
            AND "'.$appnoidto.'" 
            HAVING colAppNoYear LIKE "'.$appnoyear.'%"  
            AND colAppNoSem LIKE "'.$appnosem.'%" 
            AND colSchool LIKE "'.$school.'%" 
            AND colSem LIKE "'.$sem.'%" 
            AND colSY LIKE "'.$sy.'%"  
            AND colAvailment LIKE "'.$availment.'%"
            AND colGender LIKE "'.$gender.'%"
            AND colYearLevel LIKE "'.$year_level.'%"
            AND colAddress LIKE "'.$address.'%"  
            AND (colAppStat = "Approved" or colAppStat = "Additional Approved")
            AND colManager="Active"
            ORDER BY colAppNoID
        '; 

        $query = $this->db->query($query_string);
        
        return $query->getResult(); 
    }
    
 

    public function get_tot_by_status($data)
    {
        $query = $this->builder
            ->select('colAppStat as status, count(*) as total')
            ->where($data)
            ->groupBy('colAppStat')
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_school($data)
    {
        $query = $this->builder
            ->select('colschool as school, count(*) as total')
            ->where('colSchool != ', "")
            ->where($data)
            ->groupBy('colschool')
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_barangay($barangay, $data)
    {
        $query = $this->builder
            ->select('colAddress as barangay, count(*) as total')
            ->where($data)
            ->like('colAddress', $barangay, 'both')
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_gender($data)
    {
        $query = $this->builder
            ->select('colGender as gender, count(*) as total')
            ->where('colGender != ', "")
            ->where($data)
            ->groupBy('colGender')
            ->get()
            ->getResult();
        return $query;
    }

    public function filter($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where(isset($data['sy']) ? "colSY = '" . $data['sy'] . "'" : "colManager = 'Active'")
            ->where(isset($data['semester']) ? "colAppNoSem = " . $data['semester'] : "colManager = 'Active'")
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
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            return $query->getResultArray()[0]['colAppNoID'];
        }
        return 0;
    }

    public function get_total_gender()
    {
        $query = $this->db
            ->table($this->table)
            ->select('colGender as gender, count(colGender) as total')
            ->groupBy('colGender')
            ->get()
            ->getResult();
        return $query;
    }

    
    public function bulk_disapproved($data)
    { 
        $query = $this->db
            ->table($this->table)
            ->set('colAppStat', 'Disapproved')
            ->whereIn('id', $data)
            ->update();
        return $query;
    }

}
