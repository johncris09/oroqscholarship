<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CollegeModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'college';
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
        'unit',
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
        $this->db       =&  $db;
        $this->builder  =   $db->table($this->table);
    } 

    public function get_applicant_details($id)
    {  

        $query = $this->builder
            ->select('
                college.*,
                barangay.barangay as address,
                barangay.id as address_id,
                college_school.school_name as school_name,
                college_school.address as school_address, 
                course.course as course_name, 
            ')
            ->join('college_school', 'college.school = college_school.id')
            ->join('barangay', 'college.address = barangay.id')  
            ->join('course', 'college.course = course.id')  
            ->where('college.id', $id);
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('college.school', $school);
            }
        }
        $result = $query->get()->getResultArray();
        return $result[0];
    } 


    public function count()
    {
        $builder = $this->db->table($this->table);
        $query = $builder->countAllResults();
        return $query;
    }
    
    public function count_application($data)
    {
        $query = $this->db
            ->table($this->table) 
            ->where($data); 
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active'); 
        $result = $query->countAllResults();
        return $result;
    }


    
    // Approved
    public function get_tot_approved($data)
    {
        $query = $this->db
            ->table($this->table) 
            ->like('appstatus', 'approved', 'both' )
            ->where('appstatus !=', 'disapproved')
            ->where($data);
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active');
        $result = $query->countAllResults();
        return $result; 
    } 
    
    // Disapproved
    public function get_tot_disapproved($data)
    { 
        $query = $this->db
            ->table($this->table) 
            ->where('appstatus', 'disapproved')
            ->where($data);
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active');
        $result = $query->countAllResults();
        return $result; 
    } 

    // Pending
    public function get_tot_pending($data)
    { 
        $query = $this->db
            ->table($this->table) 
            ->where('appstatus', 'pending')
            ->where($data);
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active');
        $result = $query->countAllResults();
        return $result;
        
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
 

    
    public function get_all($data)
    {
        $query = $this->builder
            ->select('
                college.*,
                barangay.barangay as address,
                college_school.school_name as school_name,
                college_school.address as school_address,
                course.course as course,
            ')
            ->join('college_school', 'college.school = college_school.id')
            ->join('barangay', 'college.address = barangay.id')  
            ->join('course', 'college.course = course.id')  
            ->where($data)
            ->orderBy('appnoid', 'asc')
            ->get()
            ->getResultArray();
        return $query;  
 
    }

    
    public function get_pending_application($data)
    { 
        $query = $this->builder
            ->select('
                college.*,
                barangay.barangay as address,
                college_school.school_name as school_name,
                college_school.address as school_address, 
                course.course as course_name
            ')
            ->join('college_school', 'college.school = college_school.id')
            ->join('barangay', 'college.address = barangay.id')  
            ->join('course', 'college.course = course.id') 
            ->where('college.appstatus', 'pending')
            ->where('appmanager', 'Active')
            ->where($data);
            
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active'); 
        $query->orderBy('appnoid', 'asc'); 
        $result = $query->get()->getResult(); 
        return $result;
    }

    
    
    public function get_archived_application($data)
    {
        $query = $this->builder
            ->select('
                college.*,
                barangay.barangay as address,
                college_school.school_name as school_name,
                college_school.address as school_address,
                course.course as course,
            ')
            ->join('college_school', 'college.school = college_school.id')
            ->join('barangay', 'college.address = barangay.id')  
            ->join('course', 'college.course = course.id')  
            ->where('appmanager', 'Archived')
            ->where($data)
            ->orderBy('appnoid', 'asc')
            ->get()
            ->getResultArray();
        return $query;  
    }


    public function get_approved_application($data)
    {
        $query = $this->builder
            ->select('
                college.id,
                appsy,
                appnoyear,
                appnosem,
                appnoid,
                appstatus,
                firstname,
                middlename,
                lastname,
                suffix,
                barangay.barangay as address,
                course.course as course,
                college_school.school_name as school,
                appyear,'
            )
            ->join('college_school', 'college.school = college_school.id')
            ->join('barangay', 'college.address = barangay.id')  
            ->join('course', 'college.course = course.id')
            ->like('college.appstatus', 'approved', "both")
            ->where('college.appstatus !=', 'disapproved')
            ->where('appmanager', 'Active')
            ->where($data); 
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active'); 
        $query->orderBy('appnoid', 'asc'); 
        $result = $query->get()->getResult(); 
        return $result;
    } 


    public function generate(
        $school,
        $appstatus,
        $appsy,
        $appsem,
        $availment,
        $gender,
        $appyear,
        $address 
    )
    {
        
        $school    = isset($school) ? $school      : null;
        $appstatus = isset($appstatus) ? $appstatus: null; 
        $appsy     = isset($appsy) ? $appsy        : null; 
        $appsem    = isset($appsem) ? $appsem      : null; 
        $availment = isset($availment) ? $availment: null; 
        $gender    = isset($gender) ? $gender      : null; 
        $appyear   = isset($appyear) ? $appyear    : null; 
        $address   = isset($address) ? $address    : null; 



        $query = $this->db->table('college'); 
        $query->join('college_school', 'college.school = college_school.id');
        $query->join('barangay', 'college.address = barangay.id'); 
        $query->join('course', 'college.course = course.id');
        $query->select('
            college.*,
            barangay.barangay as address,
            barangay.id as address_id,
            college_school.school_name as school_name,
            college_school.address as school_address, 
            course.course as course,
        ');
        
        

        if (!empty($school)) {
            $query->where('school', $school);
        }   
        
        if (!empty($appstatus)) {
            if(strtolower($appstatus) == "all approved"){ 
                $query->like('college.appstatus', 'approved', "both");
                $query->where('college.appstatus !=', 'disapproved'); 
            }else{ 
                $query->where('college.appstatus', $appstatus);
            }
        }

        if (!empty($appsy)) {
            $query->where('college.appsy', $appsy);
        }
        
        if (!empty($appsem)) {
            $query->where('college.appsem', $appsem);
        }

        if (!empty($availment)) {
            $query->where('college.availment', $availment);
        }

        if (!empty($gender)) {
            $query->where('college.gender', $gender);
        }

        if (!empty($appyear)) {
            $query->where('college.appyear', $appyear);
        }
        
        if (!empty($address)) {
            $query->where('college.address', $address);
        }


        $query->where('appmanager', 'Active');
        $query->orderBy('lastname, firstname, middlename', 'asc');
        $results = $query->get()->getResult();  

        return $results;  

    }

    

    public function between(
        $appnoidfrom,
        $appnoidto,
        $appnoyear,
        $appnosem,
        $school,
        $appstatus,
        $appsy,
        $appsem,
        $availment,
        $gender,
        $appyear,
        $address
    )
    {

        $appnoidfrom = isset($appnoidfrom) ? $appnoidfrom: null;
        $appnoidto   = isset($appnoidto) ? $appnoidto    : null;
        $appnoyear   = isset($appnoyear) ? $appnoyear    : null;
        $appnosem    = isset($appnosem) ? $appnosem      : null;
        $school      = isset($school) ? $school          : null;
        $appstatus   = isset($appstatus) ? $appstatus    : null; 
        $appsy       = isset($appsy) ? $appsy            : null; 
        $appsem      = isset($appsem) ? $appsem          : null; 
        $availment   = isset($availment) ? $availment    : null; 
        $gender      = isset($gender) ? $gender          : null; 
        $appyear     = isset($appyear) ? $appyear        : null; 
        $address     = isset($address) ? $address        : null; 



        $query = $this->db->table('college'); 
        $query->join('college_school', 'college.school = college_school.id');
        $query->join('barangay', 'college.address = barangay.id');  
        $query->join('course', 'college.course = course.id');
        $query->select('
            college.*,
            barangay.barangay as address,
            barangay.id as address_id,
            college_school.school_name as school_name,
            college_school.address as school_address, 
            course.course as course,
        ');
        
        
        
        if (!empty($appnoidfrom)) {
            $query->where('appnoid >=', $appnoidfrom);
        } 

        
        if (!empty($appnoidto)) {
            $query->where('appnoid <=', $appnoidto);
        } 


        if (!empty($appnoyear)) {
            $query->where('appnoyear', $appnoyear);
        } 

        if (!empty($appnosem)) {
            $query->where('appnosem', $appnosem);
        }   

        if (!empty($school)) {
            $query->where('school', $school);
        } 
 
        if (!empty($appstatus)) {
            if(strtolower($appstatus) == "all approved"){ 
                $query->like('college.appstatus', 'approved', "both");
                $query->where('college.appstatus !=', 'disapproved'); 
            }else{ 
                $query->where('college.appstatus', $appstatus);
            }
        }
        
        if (!empty($appsy)) {
            $query->where('college.appsy', $appsy);
        }
        
        if (!empty($appsem)) {
            $query->where('college.appsem', $appsem);
        }

        if (!empty($availment)) {
            $query->where('college.availment', $availment);
        }

        if (!empty($gender)) {
            $query->where('college.gender', $gender);
        }

        if (!empty($appyear)) {
            $query->where('college.appyear', $appyear);
        }
        
        if (!empty($address)) {
            $query->where('college.address', $address);
        }

        $query->where('appmanager', 'Active');
        $query->orderBy('lastname, firstname, middlename', 'asc');
        $results = $query->get()->getResult();  

        return $results; 
 
    }
    
 
    public function generate_payroll(
        $school,
        $appstatus,
        $appsy,
        $appsem,
        $availment,
        $gender,
        $appyear,
        $address 
    )
    {
        
        $school    = isset($school) ? $school      : null;
        $appstatus = isset($appstatus) ? $appstatus: null; 
        $appsy     = isset($appsy) ? $appsy        : null; 
        $appsem    = isset($appsem) ? $appsem      : null; 
        $availment = isset($availment) ? $availment: null; 
        $gender    = isset($gender) ? $gender      : null; 
        $appyear   = isset($appyear) ? $appyear    : null; 
        $address   = isset($address) ? $address    : null; 



        $query = $this->db->table('college'); 
        $query->join('college_school', 'college.school = college_school.id');
        $query->join('barangay', 'college.address = barangay.id'); 
        $query->join('course', 'college.course = course.id');  
        $query->select('
            college.*,
            barangay.barangay as address,
            barangay.id as address_id,
            college_school.school_name as school_name,
            college_school.address as school_address, 
            course.course as course,
        ');
        
        

        if (!empty($school)) {
            $query->where('school', $school);
        }
        
        if (!empty($appstatus)) {
            if(strtolower($appstatus) == "all approved" || $appstatus == "" ){ 
                $query->like('college.appstatus', 'approved', "both");
                $query->where('college.appstatus !=', 'disapproved'); 
            }else{ 
                $query->where('college.appstatus', $appstatus);
            }
        }

        
        if (!empty($appsy)) {
            $query->where('college.appsy', $appsy);
        }
        
        if (!empty($appsem)) {
            $query->where('college.appsem', $appsem);
        }

        if (!empty($availment)) {
            $query->where('college.availment', $availment);
        }

        if (!empty($gender)) {
            $query->where('college.gender', $gender);
        }

        if (!empty($appyear)) {
            $query->where('college.appyear', $appyear);
        }
        
        if (!empty($address)) {
            $query->where('college.address', $address);
        }

        $query->where('appmanager', 'Active');
        $query->orderBy('lastname, firstname, middlename', 'asc');
        $results = $query->get()->getResult();  

        return $results;  

    }  
     

    public function between_payroll(
        $appnoidfrom,
        $appnoidto,
        $appnoyear,
        $appnosem,
        $school,
        $appstatus,
        $appsy,
        $appsem,
        $availment,
        $gender,
        $appyear,
        $address
    )
    {

        $appnoidfrom = isset($appnoidfrom) ? $appnoidfrom: null;
        $appnoidto   = isset($appnoidto) ? $appnoidto    : null;
        $appnoyear   = isset($appnoyear) ? $appnoyear    : null;
        $appnosem    = isset($appnosem) ? $appnosem      : null;
        $school      = isset($school) ? $school          : null;
        $appstatus   = isset($appstatus) ? $appstatus    : null; 
        $appsy       = isset($appsy) ? $appsy            : null; 
        $appsem      = isset($appsem) ? $appsem          : null; 
        $availment   = isset($availment) ? $availment    : null; 
        $gender      = isset($gender) ? $gender          : null; 
        $appyear     = isset($appyear) ? $appyear        : null; 
        $address     = isset($address) ? $address        : null; 



        $query = $this->db->table('college'); 
        $query->join('college_school', 'college.school = college_school.id');
        $query->join('barangay', 'college.address = barangay.id'); 
        $query->join('course', 'college.course = course.id');  
        $query->select('
            college.*,
            barangay.barangay as address,
            barangay.id as address_id,
            college_school.school_name as school_name,
            college_school.address as school_address, 
            course.course as course,
        ');
        
        
        
        if (!empty($appnoidfrom)) {
            $query->where('appnoid >=', $appnoidfrom);
        } 

        
        if (!empty($appnoidto)) {
            $query->where('appnoid <=', $appnoidto);
        } 


        if (!empty($appnoyear)) {
            $query->where('appnoyear', $appnoyear);
        } 

        if (!empty($appnosem)) {
            $query->where('appnosem', $appnosem);
        }   

        if (!empty($school)) {
            $query->where('school', $school);
        }  
        
        if (!empty($appstatus)) {
            if(strtolower($appstatus) == "all approved" || $appstatus == "" ){ 
                $query->like('college.appstatus', 'approved', "both");
                $query->where('college.appstatus !=', 'disapproved'); 
            }else{ 
                $query->where('college.appstatus', $appstatus);
            }
        }
        
        if (!empty($appsy)) {
            $query->where('college.appsy', $appsy);
        }
        
        if (!empty($appsem)) {
            $query->where('college.appsem', $appsem);
        }

        if (!empty($availment)) {
            $query->where('college.availment', $availment);
        }

        if (!empty($gender)) {
            $query->where('college.gender', $gender);
        }

        if (!empty($appyear)) {
            $query->where('college.appyear', $appyear);
        }
        
        if (!empty($address)) {
            $query->where('college.address', $address);
        }

        $query->where('appmanager', 'Active');
        $query->orderBy('lastname, firstname, middlename', 'asc');
        $results = $query->get()->getResult();  

        return $results; 
 
    }
    
 

    public function get_tot_by_status($data)
    {
        $query = $this->builder
            ->select('appstatus as status, count(*) as total')
            ->where($data)
            ->groupBy('appstatus')
            ->get()
            ->getResult();
        return $query;
    }
 
    
    
    public function get_tot_by_school($data)
    {  
        $query = $this->db->table('college')
            ->join('college_school', 'college.school = college_school.id')
            ->select('
                college_school.school_name as school, 
                count(*) as total,
            ')
            ->where($data)
            ->where('appmanager', 'Active')
            ->groupBy('college_school.school_name'); 

        // Get the results of the query
        $results = $query->get()->getResult(); 

        return $results;
    }  



    public function get_tot_by_barangay($barangay, $data)
    {
        $query = $this->builder
            ->select('address as barangay, count(*) as total')
            ->where($data)
            ->where('address', $barangay)
            ->get()
            ->getResult();
        return $query;
    }


    public function get_tot_by_gender($data)
    { 
        $query = $this->db
            ->table($this->table) 
            ->select('gender as gender, count(*) as total')
            ->where('gender != ', "") 
            ->where($data);
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('school', $school);
            }
        } 
        $query->where('appmanager', 'Active');
        $query->groupBy('gender');
        $result = $query->get()->getResult();
        return $result; 

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
            ->select('gender as gender, count(gender) as total')
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

    
    
    public function search_name($data)
    {  
        $query = $this->builder
            ->select('
                college.*,
                barangay.barangay as address,
                barangay.id as address_id,
                college_school.school_name as school_name,
                college_school.address as school_address, 
                course.course as course, 
                "college" AS source 
            ')
            ->join('college_school', 'college.school = college_school.id')
            ->join('barangay', 'college.address = barangay.id')  
            ->join('course', 'college.course = course.id') ;
        if(in_array( strtolower(auth()->user()->groups[0]), ["user"])){
            if(auth()->user()->scholarship_type == "college"){
                $school = auth()->user()->school; 
                $query->where('college.school', $school);
            }
        } 
        $query->groupStart()
            ->like("college.firstname ", $data, "both") 
            ->orLike("college.lastname ", $data, "both") 
            ->orLike("college.middlename", $data, "both") 
            ->orLike("college.suffix", $data, "both")  
            ->orLike("CONCAT(college.firstname, ' ', college.lastname)", $data, "both") 
            ->orLike("CONCAT(college.lastname, ' ', college.firstname)", $data, "both")
        ->groupEnd(); 
        $query->orderBy('firstname, lastname, middlename', 'asc');
        $result = $query->get()->getResult();  
        return $result; 
    } 


}
