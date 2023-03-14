<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class SeniorHighModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'senior_high';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'appnoyear',
        'appnosem',
        'appnoid',
        'appstatus',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'address',
        'birthdate',
        'civil_status',
        'gender',
        'contact_no',
        'ctc_no',
        'email',
        'availment',
        'school',
        'course',
        'appyear',
        'appsem',
        'appsy',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'appmanager',
        'profile_photo',
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


    public function get_applicant_details($id)
    { 
        $builder = $this->db->table('senior_high'); 
        $builder->join('senior_high_school', 'senior_high.school = senior_high_school.id');
        $builder->join('barangay', 'senior_high.address = barangay.id');
        $builder->join('strand', 'senior_high.course = strand.id');  
        $builder->where('senior_high.id', $id);
        $builder->select('
            senior_high.*,
            barangay.barangay as address,
            senior_high_school.school_name as school_name,
            senior_high_school.address as school_address,
            strand.strand as course,
        ');

        // Get the results of the query
        $results = $builder->get()->getResultArray();

        return $results[0];
    }

    public function count()
    {
        $builder = $this->db
            ->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }   

    public function count_application($data)
    {
        $builder = $this->db
            ->table($this->table) 
            ->where($data)
            ->where('appmanager', 'Active');
        $query = $builder->countAllResults();
        return $query;
    }
    
    
    // Approved
    public function get_tot_approved($data)
    {
        $builder = $this->db
            ->table($this->table) 
            ->like('appstatus', 'approved', 'both' )
            ->where('appstatus !=', 'disapproved')
            ->where($data)
            ->where('appmanager', 'Active');
        $query = $builder->countAllResults();
        return $query;
    }

    
    
    // Disapproved
    public function get_tot_disapproved($data)
    {
        $builder = $this->db
            ->table($this->table)  
            ->where('appstatus', 'disapproved')
            ->where($data)
            ->where('appmanager', 'Active');
        $query = $builder->countAllResults();
        return $query; 
    } 

    // Pending
    public function get_tot_pending($data)
    {
        $builder = $this->db
            ->table($this->table)  
            ->where('appstatus', 'pending')
            ->where($data)
            ->where('appmanager', 'Active');
        $query = $builder->countAllResults();
        return $query; 
    }



    public function count_approved($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where($data)
            ->Where('(appstatus = "Approved" or appstatus = "Additional Approved")');
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

        $builder = $this->db->table('senior_high'); 
        $builder->join('senior_high_school', 'senior_high.school = senior_high_school.id');
        $builder->join('barangay', 'senior_high.address = barangay.id');
        $builder->join('strand', 'senior_high.course = strand.id'); 
        $builder->where($data);
        $builder->select('
            senior_high.*,
            barangay.barangay as address,
            senior_high_school.school_name as school_name,
            senior_high_school.address as school_address,
            strand.strand as course,
        ');
        
        // Get the results of the query
        $results = $builder->get()->getResultArray();

        return $results;
    }

    public function get_pending_application($data)
    {

        $builder = $this->db->table('senior_high'); 
        $builder->join('senior_high_school', 'senior_high.school = senior_high_school.id');
        $builder->join('barangay', 'senior_high.address = barangay.id');
        $builder->join('strand', 'senior_high.course = strand.id');  
        $builder->where('senior_high.appstatus', 'pending');  
        $builder->where('appmanager', 'Active'); 
        $builder->where($data);
        $builder->select('
            senior_high.*,
            barangay.barangay as address,
            senior_high_school.school_name as school_name,
            senior_high_school.address as school_address,
            strand.strand as course,
        ');
        
        // Get the results of the query
        $results = $builder->get()->getResultArray();

        return $results;
    }

    public function get_approved_application($data)
    {
        $query = $this->builder
            ->select('senior_high.id, appsy, appnoyear, appnosem, appnoid, appstatus, firstname, middlename, lastname, suffix, barangay.barangay as address, strand.strand as course, senior_high_school.school_name as school, appyear, appstatus, ')
            ->join('senior_high_school', 'senior_high.school = senior_high_school.id')
            ->join('barangay', 'senior_high.address = barangay.id')
            ->join('strand', 'senior_high.course = strand.id')
            ->Where('(appstatus = "Approved" or appstatus = "Additional Approved")')
            ->where('appmanager', 'Active')
            ->where($data)
            ->orderBy('senior_high.id', 'desc')  
            ->get()
            ->getResult();
        return $query;
    }  
    
    

    public function generate($school, $status, $sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM senior_high 
            WHERE school LIKE "'.$school.'%"  
            AND appstatus LIKE "'.$status.'%"
            AND appsy LIKE "'.$sy.'%"  
            AND appsem LIKE "'.$sem.'%"  
            AND availment LIKE "'.$availment.'%"
            AND gender LIKE "'.$gender.'%"
            AND appyear LIKE "'.$year_level.'%"
            AND address LIKE "'.$address.'%"  
            AND appmanager = "Active"
            ORDER BY lastname, firstname and middlename
        '; 

        $query = $this->db->query($query_string); 
        return $query->getResult(); 
    } 

    public function between($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status,$sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM senior_high 
            WHERE appnoid BETWEEN "'.$appnoidfrom.'" 
            AND "'.$appnoidto.'" 
            HAVING appnoyear LIKE "'.$appnoyear.'%"  
            AND appnosem LIKE "'.$appnosem.'%" 
            AND school LIKE "'.$school.'%" 
            AND appsem LIKE "'.$sem.'%" 
            AND appsy LIKE "'.$sy.'%"  
            AND availment LIKE "'.$availment.'%"
            AND gender LIKE "'.$gender.'%"
            AND appyear LIKE "'.$year_level.'%"
            AND address LIKE "'.$address.'%"  
            AND appstatus LIKE "'.$status.'%"
            AND appmanager="Active"
            ORDER BY appnoid
        '; 

        $query = $this->db->query($query_string);
        return $query->getResult(); 
    } 

    public function generate_payroll($school, $sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM senior_high 
            WHERE school LIKE "'.$school.'%"  
            AND appsy LIKE "'.$sy.'%"  
            AND appsem LIKE "'.$sem.'%"  
            AND availment LIKE "'.$availment.'%"
            AND gender LIKE "'.$gender.'%"
            AND appyear LIKE "'.$year_level.'%"
            AND address LIKE "'.$address.'%"  
            AND (appstatus = "Approved" or appstatus = "Additional Approved")
            AND appmanager = "Active"
            ORDER BY lastname, firstname and middlename
        '; 

        $query = $this->db->query($query_string); 
        return $query->getResult(); 
    } 

    

    public function between_payroll($appnoidfrom, $appnoidto, $appnoyear, $appnosem,  $school, $status,$sy, $sem, $availment, $gender, $year_level, $address )
    {
        $query_string =  ' 
            SELECT * 
            FROM senior_high 
            WHERE appnoid BETWEEN "'.$appnoidfrom.'" 
            AND "'.$appnoidto.'" 
            HAVING appnoyear LIKE "'.$appnoyear.'%"  
            AND appnosem LIKE "'.$appnosem.'%" 
            AND school LIKE "'.$school.'%" 
            AND appsem LIKE "'.$sem.'%" 
            AND appsy LIKE "'.$sy.'%"  
            AND availment LIKE "'.$availment.'%"
            AND gender LIKE "'.$gender.'%"
            AND appyear LIKE "'.$year_level.'%"
            AND address LIKE "'.$address.'%"  
            AND appstatus LIKE "'.$status.'%"
            AND (appstatus = "Approved" or appstatus = "Additional Approved")
            AND appmanager="Active"
            ORDER BY appnoid
        '; 

        $query = $this->db->query($query_string);
        return $query->getResult(); 
    } 


    public function get_tot_by_status($data)
    {
        $query = $this->builder
            ->select('appstatus as status, count(*) as total')
            ->where($data)
            ->where('appstatus !=', "")
            ->groupBy('appstatus')
            ->getCompiledSelect();
        //     ->get()
        //     ->getResult();
        return $query;
    }
    public function get_tot_by_school($data)
    {
        $query = $this->builder
            ->select('school as school, count(*) as total')
            ->where($data)
            ->where('school !=', "")
            ->groupBy('school')
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_barangay($barangay, $data)
    {
        $query = $this->builder
            ->select('address as barangay, count(*) as total')
            ->where($data)
            ->like('address', $barangay, 'both')
            ->get()
            ->getResult();
        return $query;
    }

    public function get_tot_by_gender($data)
    {
        $query = $this->builder
            ->select('gender as gender, count(*) as total')
            ->where('gender != ', "")
            ->where($data)
            ->groupBy('gender')
            ->get()
            ->getResult();
        return $query;
    }

    public function filter($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->where(isset($data['sy']) ? "appsy = '" . $data['sy'] . "'" : "appmanager = 'Active'")
            ->where(isset($data['semester']) ? "appnosem = " . $data['semester'] : "appmanager = 'Active'")
            ->where('appstatus', 'approved');
        $query = $builder->countAllResults();
        return $query;
    }

    public  function get_latest_app_no_id($data)
    {
        $builder = $this->db
            ->table($this->table)
            ->select('appnoid')
            ->limit(1)
            ->orderBy('id', 'DESC')
            ->where($data);
        $query = $builder->get();
        if ($query->getNumRows() > 0) {
            return $query->getResultArray()[0]['appnoid'];
        }
        return 0;
    }

    public function get_total_gender()
    {
        $query = $this->db
            ->table($this->table)
            ->select('senior_high.gender as gender, count(senior_high.gender) as total')
            ->groupBy('gender')
            ->get()
            ->getResult();
        return $query;
    }

    
    public function bulk_disapproved($data)
    { 
        $query = $this->db
            ->table($this->table)
            ->set('appstatus', 'Disapproved')
            ->whereIn('id', $data)
            ->update();
        return $query;
    }

}
